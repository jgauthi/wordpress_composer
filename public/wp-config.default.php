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
 * installation. You don't have to use the website, you can just copy this file
 * to "wp-config.php" and fill in the values.
 */

// ** MySQL settings - You can get this info from your web host ** //
const DB_NAME = 'wordpress';
const DB_USER = 'root';
const DB_PASSWORD = 'root';
const DB_HOST = 'localhost';
const DB_CHARSET = 'utf8mb4';
const DB_COLLATE = '';

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
const WP_DEBUG = false;

// [Wp CLI] Indiquer le domaine principal pour éviter les error notice
if (empty($_SERVER['HTTP_HOST'])) {
    $_SERVER['HTTP_HOST'] = 'www.wpdomain.com';
}

/**
 * [Optional] WordPress SMTP Configuration, please comment or remove if not use.
 *
 * SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
 * SMTP authentication (1=yes, 0=no)
 * user login, null if empty
 * user pass, null if empty
 * encryption system to use - ssl (deprecated), tls or null
 */
// const SMTP_HOST = 'smtp.domain';
// const SMTP_PORT = 25;
// const SMTP_AUTH = 0;
// const SMTP_USER = null;
// const SMTP_PASS = null;
// const SMTP_ENCRYPTION = null;

/**
 * [Optional] Proxy server, please comment or remove if not use
 * Occasionally, it’s useful to setup a test WordPress installation on a local machine, however, if this machine is on a corporate network, there’s a good chance it uses a proxy server for external requests… this is fine, until you try to install a theme, or a plugin through the built-in tools. When these pages try to access wordpress.org to find plugin/theme data, errors are going to be returned and WordPress will return something like:.
 */
// const WP_PROXY_HOST = '172.16.0.3';
// const WP_PROXY_PORT = 3128;
// const WP_PROXY_USERNAME = '';
// const WP_PROXY_PASSWORD = '';
// const WP_PROXY_BYPASS_HOSTS = 'localhost, 172.16.0.0/16, 127.0.0.0/8';

// Sets up WordPress vars and included files.
require_once __DIR__.'/wp-config-server.php';
require_once ABSPATH.'wp-settings.php';
