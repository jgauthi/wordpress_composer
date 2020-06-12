# Wordpress with composer project

## Installation
If composer is not installed, install it following the instructions for [Linux/Unix/OSX](https://getcomposer.org/doc/00-intro.md#installation-linux-unix-osx) or [Windows](https://getcomposer.org/doc/00-intro.md#installation-windows).

Clone project into your own directory.
Once done, run `composer install`. You can add more wordpress plugin by completing the composer.json (composer require wpackagist-plugin/plugin-name).


## Configuration
Rename file wp-config.default.php to wp-config.php and modify it with your own values for the following variables :

* Database variables
    * DB_NAME
    * DB_USER
    * DB_PASSWORD
    * DB_HOST
    * DB_CHARSET
    * DB_COLLATE

You can complete the wordpress smtp configuration: Uncomment the lines SMTP_* and complete the values.


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


## WP Rocket config
An example json file can be use on import rocket settings, on "/wp-content/wp-rocket-config/wp-rocket-settings-2017-10-13-59e0dab973327.json". **Don't forget** to remove this file before deploy this plugin.


## Done
Enjoy coding or just viewing the site