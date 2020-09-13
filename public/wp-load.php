<?php
/**
 * Using WordPress core externally (Bootstrap file for php files load on url without wordpress classic startup)
 	* Using WordPress Core externally can be quite useful when wanting to utilize WordPress functions from within another project/app.
 	* I’m setting up a cron job at server level, but I wanted to be able to leverage WordPress functionality.
 	* Because of how WP Cron works (initiated on page load, not time), I wanted to separate my cron process from the WordPress installation.
 */

require_once(__DIR__.'/app/wp-load.php');