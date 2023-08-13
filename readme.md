# WordPress with composer project

## Prerequisites
* The PHP version must be greater than or equal to PHP 7.4
* The date.timezone parameter must be defined in php.ini or `public/wp-config.php`
* If composer is not installed, install it following the instructions for [Linux/Unix/OSX](https://getcomposer.org/doc/00-intro.md#installation-linux-unix-osx) or [Windows](https://getcomposer.org/doc/00-intro.md#installation-windows).

More information on [WordPress website](https://wordpress.org/about/requirements/).

_(Optional)_ For Makefile usage:
* Make command: Under linux `sudo apt install build-essential` or for [Windows users](https://stackoverflow.com/questions/32127524/how-to-install-and-use-make-in-windows/54086635)
* [wp-cli](https://wp-cli.org)


## Installation
Clone project into your own directory.

```bash
make install

# Without makefile
cp public/wp-config.default.php public/wp-config.php
composer install

# You can add more WordPress plugin by completing the composer.json
composer require wpackagist-plugin/plugin-name
```


## Configuration
Edit the file `public/wp-config.php` with your own values for the following variables :

* Database variables
    * DB_NAME
    * DB_USER
    * DB_PASSWORD
    * DB_HOST
    * DB_CHARSET
    * DB_COLLATE

On server configuration, set the DocumentRoot on Apache or Nginx to `public/` folder.

Bonus, you can edit some options on `public/wp-config.php`:
* **Smtp configuration:** Uncomment the lines `SMTP_*` and complete the values.
* **Proxy support:** Uncomment the lines `WP_PROXY_*` and complete values.
* **Debug support:** On dev environnement, you can use the functions and features provided by the [component debug](https://github.com/jgauthi/component_debug), require `WP_DEBUG` to `true`.


## Maintenance mode
To pass the site into maintenance mode,

* Rename file: `.htaccess` to `.htaccess_standby`
* Rename file: `.htaccess_maintenance` to `.htaccess`
* Edit `.htaccess` file
	* Replace the domain (current platform)
	* Add Authorized IP

To stop maintenance mode, reverse rename `.htaccess` files.


## Done
Enjoy coding or just viewing the site
