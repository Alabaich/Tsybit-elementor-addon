<?php
/**
 * Plugin Name: Elementor Addon
 * Description: Widgets for elementor.
 * Version:     1.0.0
 * Author:      Oleksandr Tsybulskyi The Great
 * Author URI:  https://developers.elementor.com/
 * Text Domain: elementor-addon
 */

function register_hello_world_widget( $widgets_manager ) {


	require_once( __DIR__ . '/widgets/banner.php' );


	$widgets_manager->register( new \Banner() );

}
add_action( 'elementor/widgets/register', 'register_hello_world_widget' );