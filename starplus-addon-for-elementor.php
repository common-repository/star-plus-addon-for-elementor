<?php
/**
 * Plugin Name:       Star Plus Addon For Elementor
 * Description:       Enhance your Elementor experience with the Star Plus Addon For Elementor. This versatile addon offers custom widgets, including stylish button widgets and eye-catching icon cards, enabling you to create professional and interactive website designs effortlessly. Unlock new design possibilities with Star Plus Addon For Elementor
 * Version:           1.0.2
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            Kashif Watto
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       star-plus-addon-for-elementor
 */
if( ! defined ('ABSPATH') ) {
    exit;
}

/**
 * Widgets Loader
 */

function starplus_addon_for_elementor_widget_categories( $elements_manager ) {

    $elements_manager->add_category(
        'starplus-addon',
        [
            'title' => esc_html__( 'Star Plus', 'star-plus-addon-for-elementor' ),
            'icon' => 'fa fa-plug',
        ]
    );


}
add_action( 'elementor/elements/categories_registered', 'starplus_addon_for_elementor_widget_categories' );

require plugin_dir_path(__FILE__).'widgets-loader.php';
