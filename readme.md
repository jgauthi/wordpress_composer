# Wordpress with composer project

## Installation
If composer is not installed, install it following the instructions for [Linux/Unix/OSX](https://getcomposer.org/doc/00-intro.md#installation-linux-unix-osx) or [Windows](https://getcomposer.org/doc/00-intro.md#installation-windows).

Clone project into your own directory.
Once done, run `composer install`. You can add more wordpress plugin by completing the composer.json (composer require wpackagist-plugin/plugin-name).


## Configuration
Rename file `public/wp-config.default.php` to `public/wp-config.php` and modify it with your own values for the following variables :

* Database variables
    * DB_NAME
    * DB_USER
    * DB_PASSWORD
    * DB_HOST
    * DB_CHARSET
    * DB_COLLATE

You can complete the wordpress smtp configuration: Uncomment the lines SMTP_* and complete the values.

On server configuration, set the DocumentRoot on Apache or Nginx to `public/` folder.


## Multisite
On Wordpress BackOffice, go to tools > Network to create multisite network. You must turn off extensions before do this operation.

Tips: For site use plugins specifics functions (ACF/Polylang/...), switch the custom current theme to classic wordpress theme during this migration to avoid php error (function not exists...).

After install and the sites creation, go to BackOffice > Network
* Settings > Domain mapping, uncheck all options, then check options 2 (Permanent redirect ) and 3 (User domain mapping page).
* Settings > Domain, add all sites except the primary.
* Extensions > Enable extensions that will be used on ALL sites (you can turn on specific(s) plugin(s) by site settings extensions)
* Theme > Theme list, enable theme that will be used on any site


## Maintenance mode
To pass the site into maintenance mode,

* Rename file: .htaccess to .htaccess_standby
* Rename file: .htaccess_maintenance to .htaccess
* Edit .htaccess file
	* Replace the domain (current platform)
	* Add Authorized IP

To stop maintenance mode, reverse rename .htaccess files.


## Proxy support
You can add proxy support on `wp-config.php`: Uncomment the lines "WP_PROXY_*" and complete values.

## Debug support
On dev environnement, you can use the functions and features provided by the [component debug](https://github.com/jgauthi/component_debug), require `WP_DEBUG` to `true`. 


## Done
Enjoy coding or just viewing the site