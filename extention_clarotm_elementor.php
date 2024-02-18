<?php
/**
 * Plugin Name: Elementor widgets clarotm
 * Description: Attractive widgets for Elementor.
 * Version:     1.0.0
 * Author:      Amirreza Heydari
 * Author URI:  https://clarotm.ir/
 * Text Domain:
 */
function add_elementor_widget_categories_claro( $elements_manager ) {

	$elements_manager->add_category(
		'clarotm-category',
		[
			'title' => esc_html__( 'ویجت های اختصاصی کلارو', 'elementor' ),
			'icon' => 'fa fa-plug',
			'active'=>true,
		]
	);

}
add_action( 'elementor/elements/categories_registered', 'add_elementor_widget_categories_claro' );
// add style file
function register_styles_clarotm(){
    wp_register_style('widget_ctm_style',plugins_url('css/ex_ctm_style.css',__FILE__));
	wp_enqueue_style('widget_ctm_style');
}
add_action('wp_enqueue_scripts','register_styles_clarotm');
function register_new_widgets( $widgets_manager ) {

	require_once( __DIR__ . '/widgets/btns/wd_btn1.php' );
	require_once( __DIR__ . '/widgets/btns/wd_btn2.php' );

	$widgets_manager->register( new \widget_button_1() );
	$widgets_manager->register( new \widget_button_2() );

}
add_action( 'elementor/widgets/register', 'register_new_widgets' );