<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, and ABSPATH. You can find more information by visiting
 * {@link http://codex.wordpress.org/Editing_wp-config.php Editing wp-config.php}
 * Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 */

// ** MySQL settings - You can get this info from your web host ** //
define('DB_NAME', 'wordpress');
define('DB_USER', 'root');
define('DB_PASSWORD', 'root');
define('DB_HOST', 'localhost');
define('DB_CHARSET', 'utf8mb4');
define('DB_COLLATE', '');

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';

/*
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

// [Wp CLI] Indiquer le domaine principal pour éviter les error notice
if (empty($_SERVER['HTTP_HOST'])) {
    $_SERVER['HTTP_HOST'] = 'www.wpdomain.com';
}

/**
 * [Optional] Wordpress SMTP Configuration, please comment or remove if not use.
 *
 * SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
 * SMTP authentication (1=yes, 0=no)
 * user login, null if empty
 * user pass, null if empty
 * encryption system to use - ssl (deprecated), tls or null
 */
// define('SMTP_HOST', 'smtp.domain');
// define('SMTP_PORT', 25);
// define('SMTP_AUTH', 0);
// define('SMTP_USER', null);
// define('SMTP_PASS', null);
// define('SMTP_ENCRYPTION', null);

/**
 * [Optional] Proxy server, please comment or remove if not use
 * Occasionally, it’s useful to setup a test WordPress installation on a local machine, however, if this machine is on a corporate network, there’s a good chance it uses a proxy server for external requests… this is fine, until you try to install a theme, or a plugin through the built in tools. When these pages try to access wordpress.org to find plugin/theme data, errors are going to be returned and WordPress will return something like:.
 */
// define('WP_PROXY_HOST', '172.16.0.3');
// define('WP_PROXY_PORT', 3128);
// define('WP_PROXY_USERNAME', '');
// define('WP_PROXY_PASSWORD', '');
// define('WP_PROXY_BYPASS_HOSTS', 'localhost, 172.16.0.0/16, 127.0.0.0/8');

// Sets up WordPress vars and included files.
require_once __DIR__.'/wp-config-server.php';
require_once ABSPATH.'wp-settings.php';
