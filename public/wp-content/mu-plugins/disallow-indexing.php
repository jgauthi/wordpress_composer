<?php
/*
Plugin Name:  Disallow Indexing
Plugin URI:   http://roots.io/wordpress-stack/
Description:  Disallow indexing of your site on non-production environments.
Version:      1.0.0
Author:       Roots
Author URI:   http://roots.io/
License:      MIT License
*/

// Register Theme directory
register_theme_directory(ABSPATH.'wp-content/themes');

// Front Office Hook
if (!is_admin()) {
    // Filter
    remove_action('wp_head', 'wp_generator');

    // Automatically move JavaScript code to page footer, speeding up page loading time.
    add_action( 'wp_enqueue_scripts', function (): void {
        remove_action( 'wp_head', 'wp_enqueue_scripts', 1 );
        remove_action( 'wp_head', 'wp_print_scripts' );
        remove_action( 'wp_head', 'wp_print_head_scripts', 9 );
        remove_action( 'wp_head', 'print_emoji_detection_script', 7 );

        add_action( 'wp_footer', 'wp_enqueue_scripts', 1 );
        add_action( 'wp_footer', 'wp_print_scripts', 5 );
        add_action( 'wp_footer', 'wp_print_head_scripts', 5 );
        add_action( 'wp_footer', 'print_emoji_detection_script', 7 );

        // Plugin "popup-maker"
        if ( function_exists( 'popmake_render_popup_theme_styles' ) ) {
            remove_action( 'wp_head', 'popmake_render_popup_theme_styles' );
            add_action( 'wp_footer', 'popmake_render_popup_theme_styles', 500 );
        }
    } );

    // Debug options
    if (defined('WP_DEBUG') && WP_DEBUG) {
        add_action('pre_option_blog_public', '__return_zero');

        // Force rewrite rules URL
        if (isset($_REQUEST['flush_url'])) {
            add_action('init', function (): void {
                flush_rewrite_rules();
            });
        }

        // Add template filename in admin bar on front office
        add_action('admin_bar_menu', function (): void {
            global $wp_admin_bar, $template;

            if (!is_super_admin() || !is_admin_bar_showing()) {
                return;
            }

            // clean up path
            $template_name = str_replace(get_template_directory() . '/', '', $template);

            // Add as a parent menu
            $wp_admin_bar->add_menu([
                'title' => $template_name,
                'href' => false,
                'id' => 's9_links',
            ]);
        }, 500);
    }

// BackOffice Hook
} else {
    // Hide update notifications (wordpress + WooCommerce) to all but admin users
    add_action('admin_head', function (): void {
        remove_action('admin_notices', 'woothemes_updater_notice');

        // Remove WPML Update notices
        if (function_exists('WP_Installer')) {
            remove_action('admin_notices', [WP_Installer(), 'show_site_key_nags']);
            remove_action('admin_notices', [WP_Installer(), 'setup_plugins_page_notices']);
            remove_submenu_page('options-general.php', 'installer');
        }

        if (current_user_can('update_core')) {
            return;
        }

        remove_action('admin_notices', 'update_nag', 3);
        remove_action('init', 'wp_version_check');
        add_filter('pre_option_update_core', '__return_null');
        add_filter('pre_site_transient_update_core', '__return_null');
    }, 1);
}

// Disable wp emojicons
add_action('init', function (): void {
    // all actions related to emojis
    remove_action('admin_print_styles', 'print_emoji_styles');
    remove_action('wp_head', 'print_emoji_detection_script', 7);
    remove_action('admin_print_scripts', 'print_emoji_detection_script');
    remove_action('wp_print_styles', 'print_emoji_styles');
    remove_filter('wp_mail', 'wp_staticize_emoji_for_email');
    remove_filter('the_content_feed', 'wp_staticize_emoji');
    remove_filter('comment_text_rss', 'wp_staticize_emoji');

    // filter to remove TinyMCE emojis
    add_filter('tiny_mce_plugins', function (array $plugins): array {
        if (is_array($plugins)) {
            return array_diff($plugins, ['wpemoji']);
        }

        return [];
    });
});

// Wordpress SMTP CONF
if (defined('SMTP_HOST')) {
    add_action('phpmailer_init', function (PHPMailer\PHPMailer\PHPMailer $phpmailer): void {
        $phpmailer->isSMTP();
        $phpmailer->Host = SMTP_HOST;
        $phpmailer->SMTPAuth = SMTP_AUTH;
        $phpmailer->Port = SMTP_PORT;
        $phpmailer->Username = SMTP_USER;
        $phpmailer->Password = SMTP_PASS;
        $phpmailer->SMTPSecure = SMTP_ENCRYPTION;
    });
}
