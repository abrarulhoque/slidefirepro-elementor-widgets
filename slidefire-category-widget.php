<?php
/**
 * Plugin Name: SlideFirePro Widgets
 * Description: Professional Elementor widgets suite for SlideFirePro - tactical gear customization, product showcase, and navigation widgets
 * Version: 1.6.0
 * Author: Abrar
 * Text Domain: slidefire-category-widget
 * Elementor tested up to: 3.25.0
 * Elementor Pro tested up to: 3.25.0
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

// Define plugin constants
define( 'SLIDEFIRE_CATEGORY_WIDGET_URL', plugin_dir_url( __FILE__ ) );
define( 'SLIDEFIRE_CATEGORY_WIDGET_PATH', plugin_dir_path( __FILE__ ) );

/**
 * Main SlideFire Category Widget Class
 */
class SlideFire_Category_Widget_Plugin {

    /**
     * Instance
     */
    private static $_instance = null;

    /**
     * Instance
     */
    public static function instance() {
        if ( is_null( self::$_instance ) ) {
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    /**
     * Constructor
     */
    public function __construct() {
        add_action( 'init', [ $this, 'init' ] );
    }

    /**
     * Initialize the plugin
     */
    public function init() {
        // Check if Elementor is active
        if ( ! did_action( 'elementor/loaded' ) ) {
            add_action( 'admin_notices', [ $this, 'admin_notice_missing_main_plugin' ] );
            return;
        }

        // Check for required Elementor version
        if ( ! version_compare( ELEMENTOR_VERSION, '3.0.0', '>=' ) ) {
            add_action( 'admin_notices', [ $this, 'admin_notice_minimum_elementor_version' ] );
            return;
        }

        // Check for required PHP version
        if ( version_compare( PHP_VERSION, '7.4', '<' ) ) {
            add_action( 'admin_notices', [ $this, 'admin_notice_minimum_php_version' ] );
            return;
        }

        // Register widgets
        add_action( 'elementor/widgets/register', [ $this, 'register_widgets' ] );

        // Register widget styles
        add_action( 'elementor/frontend/after_enqueue_styles', [ $this, 'widget_styles' ] );
        
        // Register widget scripts
        add_action( 'elementor/frontend/after_register_scripts', [ $this, 'widget_scripts' ] );

        // Allow SVG content in widgets
        add_filter( 'wp_kses_allowed_html', [ $this, 'allow_svg_tags' ], 10, 2 );
    }

    /**
     * Admin notice for missing Elementor
     */
    public function admin_notice_missing_main_plugin() {
        if ( isset( $_GET['activate'] ) ) unset( $_GET['activate'] );

        $message = sprintf(
            esc_html__( '"%1$s" requires "%2$s" to be installed and activated.', 'slidefire-category-widget' ),
            '<strong>' . esc_html__( 'SlideFire Category Widget', 'slidefire-category-widget' ) . '</strong>',
            '<strong>' . esc_html__( 'Elementor', 'slidefire-category-widget' ) . '</strong>'
        );

        printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );
    }

    /**
     * Admin notice for minimum Elementor version
     */
    public function admin_notice_minimum_elementor_version() {
        if ( isset( $_GET['activate'] ) ) unset( $_GET['activate'] );

        $message = sprintf(
            esc_html__( '"%1$s" requires "%2$s" version %3$s or greater.', 'slidefire-category-widget' ),
            '<strong>' . esc_html__( 'SlideFire Category Widget', 'slidefire-category-widget' ) . '</strong>',
            '<strong>' . esc_html__( 'Elementor', 'slidefire-category-widget' ) . '</strong>',
            '3.0.0'
        );

        printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );
    }

    /**
     * Admin notice for minimum PHP version
     */
    public function admin_notice_minimum_php_version() {
        if ( isset( $_GET['activate'] ) ) unset( $_GET['activate'] );

        $message = sprintf(
            esc_html__( '"%1$s" requires "%2$s" version %3$s or greater.', 'slidefire-category-widget' ),
            '<strong>' . esc_html__( 'SlideFire Category Widget', 'slidefire-category-widget' ) . '</strong>',
            '<strong>' . esc_html__( 'PHP', 'slidefire-category-widget' ) . '</strong>',
            '7.4'
        );

        printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );
    }

    /**
     * Register widgets
     */
    public function register_widgets( $widgets_manager ) {
        require_once( SLIDEFIRE_CATEGORY_WIDGET_PATH . 'widgets/class-category-navigation-widget.php' );
        require_once( SLIDEFIRE_CATEGORY_WIDGET_PATH . 'widgets/class-hero-section-widget.php' );
        require_once( SLIDEFIRE_CATEGORY_WIDGET_PATH . 'widgets/class-category-nav-widget.php' );
        require_once( SLIDEFIRE_CATEGORY_WIDGET_PATH . 'widgets/class-product-features-widget.php' );
        require_once( SLIDEFIRE_CATEGORY_WIDGET_PATH . 'widgets/class-jersey-type-selector-widget.php' );
        require_once( SLIDEFIRE_CATEGORY_WIDGET_PATH . 'widgets/class-navbar-widget.php' );
        $widgets_manager->register( new \SlideFire_Category_Navigation_Widget() );
        $widgets_manager->register( new \SlideFire_Hero_Section_Widget() );
        $widgets_manager->register( new \SlideFire_Category_Nav_Widget() );
        $widgets_manager->register( new \SlideFire_Product_Features_Widget() );
        $widgets_manager->register( new \SlideFire_Jersey_Type_Selector_Widget() );
        $widgets_manager->register( new \SlideFire_Navbar_Widget() );
    }

    /**
     * Enqueue widget styles
     */
    public function widget_styles() {
        wp_enqueue_style(
            'slidefire-category-widget',
            SLIDEFIRE_CATEGORY_WIDGET_URL . 'assets/css/style.css',
            [],
            '1.6.0'
        );
    }

    /**
     * Register widget scripts
     */
    public function widget_scripts() {
        wp_register_script(
            'slidefire-category-widget',
            SLIDEFIRE_CATEGORY_WIDGET_URL . 'assets/js/script.js',
            [ 'jquery' ],
            '1.6.0',
            true
        );
    }

    /**
     * Allow SVG tags in wp_kses for our widget content
     */
    public function allow_svg_tags( $allowed_html, $context ) {
        // Only apply to our widget content
        if ( $context === 'post' || $context === 'slidefire_svg' ) {
            $svg_tags = array(
                'svg' => array(
                    'xmlns' => true,
                    'width' => true,
                    'height' => true,
                    'viewbox' => true,
                    'viewBox' => true,
                    'fill' => true,
                    'stroke' => true,
                    'stroke-width' => true,
                    'stroke-linecap' => true,
                    'stroke-linejoin' => true,
                    'class' => true,
                    'aria-hidden' => true,
                    'role' => true,
                ),
                'path' => array(
                    'd' => true,
                    'fill' => true,
                    'stroke' => true,
                    'stroke-width' => true,
                    'stroke-linecap' => true,
                    'stroke-linejoin' => true,
                    'class' => true,
                ),
                'circle' => array(
                    'cx' => true,
                    'cy' => true,
                    'r' => true,
                    'fill' => true,
                    'stroke' => true,
                    'stroke-width' => true,
                    'class' => true,
                ),
                'rect' => array(
                    'x' => true,
                    'y' => true,
                    'width' => true,
                    'height' => true,
                    'rx' => true,
                    'ry' => true,
                    'fill' => true,
                    'stroke' => true,
                    'stroke-width' => true,
                    'class' => true,
                ),
                'line' => array(
                    'x1' => true,
                    'y1' => true,
                    'x2' => true,
                    'y2' => true,
                    'stroke' => true,
                    'stroke-width' => true,
                    'stroke-linecap' => true,
                    'class' => true,
                ),
                'polyline' => array(
                    'points' => true,
                    'fill' => true,
                    'stroke' => true,
                    'stroke-width' => true,
                    'stroke-linecap' => true,
                    'stroke-linejoin' => true,
                    'class' => true,
                ),
                'polygon' => array(
                    'points' => true,
                    'fill' => true,
                    'stroke' => true,
                    'stroke-width' => true,
                    'stroke-linecap' => true,
                    'stroke-linejoin' => true,
                    'class' => true,
                ),
                'g' => array(
                    'fill' => true,
                    'stroke' => true,
                    'stroke-width' => true,
                    'transform' => true,
                    'class' => true,
                ),
                'defs' => array(),
                'clipPath' => array(
                    'id' => true,
                ),
                'use' => array(
                    'href' => true,
                    'xlink:href' => true,
                ),
            );

            $allowed_html = array_merge( $allowed_html, $svg_tags );
        }

        return $allowed_html;
    }
}

// Initialize the plugin
SlideFire_Category_Widget_Plugin::instance();