<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly 

final class starplus_addon_for_elementor_widget_loader {

    
    const VERSION = '1.0.0';

    
    const MINIMUM_ELEMENTOR_VERSION = '2.0.0';

    
    const MINIMUM_PHP_VERSION = '7.0';

    
    private static $_instance = null;

    
    public static function instance() {

        if ( is_null( self::$_instance ) ) {
            self::$_instance = new self();
        }
        return self::$_instance;

    }

    
    public function __construct() {

        add_action( 'plugins_loaded', [ $this, 'starplus_addon_for_elementor_on_plugins_load' ] );
        add_action( 'wp_enqueue_scripts', [ $this, 'starplus_addon_for_elementor_load_scripts' ] );

    }


    public function i18n() {

        load_plugin_textdomain( 'star-plus-addon-for-elementor' );

    }

   

     public function starplus_addon_for_elementor_load_scripts(){
         wp_enqueue_script('jquery');
    wp_enqueue_style('bootstrap-css', plugins_url( 'css/bootstrap.css', __FILE__ ), array(), '1.0.0' );
         wp_enqueue_style('font-awesome');
     }
    
    public function starplus_addon_for_elementor_on_plugins_load() {

        if ( $this->is_compatible() ) {
            add_action( 'elementor/init', [ $this, 'init' ] );
        }

    }

   
    public function is_compatible() {

        // Check if Elementor installed and activated
        if ( ! did_action( 'elementor/loaded' ) ) {
            add_action( 'admin_notices', [ $this, 'admin_notice_missing_main_plugin' ] );
            return false;
        }

        // Check for required Elementor version
        if ( ! version_compare( ELEMENTOR_VERSION, self::MINIMUM_ELEMENTOR_VERSION, '>=' ) ) {
            add_action( 'admin_notices', [ $this, 'admin_notice_minimum_elementor_version' ] );
            return false;
        }

        // Check for required PHP version
        if ( version_compare( PHP_VERSION, self::MINIMUM_PHP_VERSION, '<' ) ) {
            add_action( 'admin_notices', [ $this, 'admin_notice_minimum_php_version' ] );
            return false;
        }

        return true;

    }

    
    public function init() {
    
        $this->i18n();

        // Add Plugin actions
        add_action( 'elementor/widgets/widgets_registered', [ $this, 'init_widgets' ] );

    }


    public function init_widgets() {

        // Include Widget files
        require_once( plugin_dir_path(__FILE__). 'starplus-addon-button.php' );
        require_once( plugin_dir_path(__FILE__). 'starplus-addon-for-elementor-cardicons.php' );

        // Register widget
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \starplus_addon_for_elementor_button() );
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \starplus_addon_for_elementor_cardicon() );

    }
    
   
    public function admin_notice_missing_main_plugin() {

        if ( isset( $_GET['activate'] ) ) unset( $_GET['activate'] );

        $message = sprintf(
            /* translators: 1: Plugin name 2: Elementor */
            esc_html__( '"%1$s" requires "%2$s" to be installed and activated.', 'star-plus-addon-for-elementor' ),
            '<strong>' . esc_html__( 'Elementor Test Extension', 'star-plus-addon-for-elementor' ) . '</strong>',
            '<strong>' . esc_html__( 'Elementor', 'star-plus-addon-for-elementor' ) . '</strong>'
        );

        printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', esc_html( $message ) );

    }

    
    public function admin_notice_minimum_elementor_version() {

        if ( isset( $_GET['activate'] ) ) unset( $_GET['activate'] );

        $message = sprintf(
            /* translators: 1: Plugin name 2: Elementor 3: Required Elementor version */
            esc_html__( '"%1$s" requires "%2$s" version %3$s or greater.', 'star-plus-addon-for-elementor' ),
            '<strong>' . esc_html__( 'Elementor Test Extension', 'star-plus-addon-for-elementor' ) . '</strong>',
            '<strong>' . esc_html__( 'Elementor', 'star-plus-addon-for-elementor' ) . '</strong>',
             self::MINIMUM_ELEMENTOR_VERSION
        );

        printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', esc_html( $message ) );

    }

   
    public function admin_notice_minimum_php_version() {

        if ( isset( $_GET['activate'] ) ) unset( $_GET['activate'] );

        $message = sprintf(
            /* translators: 1: Plugin name 2: PHP 3: Required PHP version */
            esc_html__( '"%1$s" requires "%2$s" version %3$s or greater.', 'star-plus-addon-for-elementor' ),
            '<strong>' . esc_html__( 'Elementor Test Extension', 'star-plus-addon-for-elementor' ) . '</strong>',
            '<strong>' . esc_html__( 'PHP', 'star-plus-addon-for-elementor' ) . '</strong>',
             self::MINIMUM_PHP_VERSION
        );

        printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>',esc_html( $message ) );

    }

}

starplus_addon_for_elementor_widget_loader::instance();