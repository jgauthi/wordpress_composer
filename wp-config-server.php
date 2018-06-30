<?php
/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',			'?2P ?P$z~l}8xW21GcMy2Z8U=|Hk@uAJYwa//^>sN+y(s`Ag-T+_1+4cPd%,|CbB');
define('SECURE_AUTH_KEY', 	'ng)Bs*O~daA5m6 Wp`+FyV%k*MPK b5I@NJ5(P258^pnq h5nNGb^`e6yzhF*0EE');
define('LOGGED_IN_KEY',		'10x2lU!{@_efo|(5x{-3A()?OTis|FRSe# Sw}wU]x[J>E:e:<5m^tWOwm+S[M0^');
define('NONCE_KEY',			'n{.;~gk&^5JE=w7y|)ewK}}_jHt3;| Md2hH}H6TCh<+?=;a/QhW*Q719Yr,)3?2');
define('AUTH_SALT',			')-b|K!IVgF,S6bf#I4DU27Fo(?f_Fkd|+g9=e|@ot6|h|wKmM[1b$dFIumW#PolQ');
define('SECURE_AUTH_SALT',	'I68ArEMC@0@Ns y:B*GT#N^{ocNy$Rma ,nD2%ezvR:J|vKAI:/#;RRdWmZ20l5L');
define('LOGGED_IN_SALT',	'2{EYF{HRh4;QLQc-Y16Z5]a#_{553#FmxgJZt.Z%7TG&jZ25oS3+e00/?UCd|P?5');
define('NONCE_SALT',		'_+b8Cer4eNAWS`;Y9U;`_;Y#2 yWBKgmpbdLD=t.JBr%=5} PO^52f90 Cj>/6g5');

// Contactform7 - Loading JavaScript and Stylesheet Only When it is Necessary (Controlling Behavior by Setting Constants)
//	http://contactform7.com/loading-javascript-and-stylesheet-only-when-it-is-necessary/
define('WPCF7_LOAD_JS', false);
define('WPCF7_LOAD_CSS', false);

// Wordpress content
define('WP_CONTENT_DIR', __DIR__ . '/wp-content');
define('WP_CONTENT_URL', '/wp-content');

// Absolute path to the WordPress directory
if(!defined('ABSPATH'))
	define('ABSPATH', __DIR__ . '/app/');

/**
 * Composer Autoloader
 */
require(__DIR__ . '/vendor/autoload.php');


/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
if(defined('WP_DEBUG') && WP_DEBUG)
{
	// Debug mode
	ini_set('display_errors', true);
	ini_set('error_reporting', E_ALL & ~E_NOTICE);
	define('WP_DEBUG_LOG', true);
	define('WP_DEBUG_DISPLAY', true);
	define('SCRIPT_DEBUG', true);
	if(class_exists('Symfony\Component\Debug\Debug'))
		\Symfony\Component\Debug\Debug::enable(ini_get('error_reporting'));

	// Desactive auto update + cache
	define('WP_AUTO_UPDATE_CORE', false);
}
else
{
	define('WP_AUTO_UPDATE_CORE', 'minor');	// Auto updates
	define('ACF_LITE', true); // Hide ACF conf
}

// Localhost manual update
if($_SERVER['REMOTE_ADDR'] == '127.0.0.1')
	define('FS_METHOD', 'direct');

// Wordpress setting
define('WP_POST_REVISIONS', 10);	// Specify maximum number of Revisions
define('MEDIA_TRASH', true);		// Media Trash
define('EMPTY_TRASH_DAYS', 30);		// Trash Days


/**
 * Alternate cron method ( http://wordpress-hackers.1065353.n5.nabble.com/ALTERNATE-WP-CRON-Is-it-worth-it-td39843.html )
 * - User visits the site.
 * - Cron determines that it needs to run and ALTERNATE_WP_CRON is enabled.
 * - User gets a redirect to the same page that they're seeing right now,
 *   but with an added doing_wp_cron=... parameter added to the URL.
 * - User goes to the new address and gets the page. Completely
 *   transparent redirect.
 * - Meanwhile, the original process that sent the redirect goes off and
 *   does the wp-cron stuff instead, in the background.
 *
 *  So, user won't notice a thing. The redirect is smart, and only happens
 *  when there's actual jobs to be run. It doesn't redirect 1-in-20 or
 *  something like that, or on-the-hour.. it only redirects when there's a
 *  job that needs to get done. No jobs = no redirects.
 *
 *  There is an extremely thin chance that the doing_wp_cron could show up
 *  in the link for a search engine bot, however, WordPress includes the
 *  canonical link in the meta data by default to prevent that additional
 *  query variable from being an issue in search results. No SEO impact.
 */
// define('ALTERNATE_WP_CRON', true); // By default: no use, so false


?>