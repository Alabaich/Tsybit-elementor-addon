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

	require_once( __DIR__ . '/widgets/richText.php' );
	require_once( __DIR__ . '/widgets/heroSection.php' );
	require_once( __DIR__ . '/widgets/recepies.php' );
	require_once( __DIR__ . '/widgets/bestSellers.php' );
	require_once( __DIR__ . '/widgets/blockThreeInRow.php' );
	require_once( __DIR__ . '/widgets/productTypes.php' );
	require_once( __DIR__ . '/widgets/breadCrumbs.php' );
	require_once( __DIR__ . '/widgets/homepageFirstView.php' );
	require_once( __DIR__ . '/widgets/precookedBestSellers.php' );
	require_once( __DIR__ . '/widgets/fullWidthImage.php' );
	require_once( __DIR__ . '/widgets/listTitleLeft.php' );
	require_once( __DIR__ . '/widgets/blocksOnImage.php' );
	require_once( __DIR__ . '/widgets/banner.php' );

	$widgets_manager->register( new \Rich_Text() );
	$widgets_manager->register( new \Hero_Section() );
	$widgets_manager->register( new \Recipes_Widget() );
	$widgets_manager->register( new \Best_Sellers() );
	$widgets_manager->register( new \Best_Sellers() );
	$widgets_manager->register( new \Three_In_Row() );
	$widgets_manager->register( new \Product_Types() );
	$widgets_manager->register( new \Bread_Crumbs() );
	$widgets_manager->register( new \Homepage_Firstview() );
	$widgets_manager->register( new \Precooked_Best_Sellers() );
	$widgets_manager->register( new \Full_Width_Image() );
	$widgets_manager->register( new \List_Title_Left() );
	$widgets_manager->register( new \Blocks_On_Image() );
	$widgets_manager->register( new \Banner() );

}
add_action( 'elementor/widgets/register', 'register_hello_world_widget' );