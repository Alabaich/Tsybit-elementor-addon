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
	require_once( __DIR__ . '/widgets/richText.php' );
	require_once( __DIR__ . '/widgets/customerReviews.php' );
	require_once( __DIR__ . '/widgets/heroShadowText.php' );
	require_once( __DIR__ . '/widgets/services.php' );


	$widgets_manager->register( new \Banner() );
	$widgets_manager->register( new \richText() );
	$widgets_manager->register( new \customerReviews() );
	$widgets_manager->register( new \heroShadowText() );
	$widgets_manager->register( new \Services() );

}
add_action( 'elementor/widgets/register', 'register_hello_world_widget' );