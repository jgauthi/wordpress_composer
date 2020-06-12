<?php
defined( 'ABSPATH' ) or die( 'Cheatin\' uh?' );

define( 'WP_ROCKET_ADVANCED_CACHE', true );
$rocket_cache_path = __DIR__.'/cache/wp-rocket/';
$rocket_config_path = __DIR__.'/wp-rocket-config/';

if ( file_exists( __DIR__.'/plugins/wp-rocket/inc/front/process.php' ) ) {
	include( __DIR__.'/plugins/wp-rocket/inc/front/process.php' );
} else {
	define( 'WP_ROCKET_ADVANCED_CACHE_PROBLEM', true );
}