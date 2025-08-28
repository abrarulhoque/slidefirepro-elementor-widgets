<?php
/**
 * SlideFire Hero Section Widget Class
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

class SlideFire_Hero_Section_Widget extends \Elementor\Widget_Base {

    /**
     * Get widget name
     */
    public function get_name() {
        return 'slidefire_hero_section';
    }

    /**
     * Get widget title
     */
    public function get_title() {
        return esc_html__( 'SlideFire Hero Section', 'slidefire-category-widget' );
    }

    /**
     * Get widget icon
     */
    public function get_icon() {
        return 'eicon-banner';
    }

    /**
     * Get widget categories
     */
    public function get_categories() {
        return [ 'general' ];
    }

    /**
     * Get widget keywords
     */
    public function get_keywords() {
        return [ 'hero', 'banner', 'slidefire', 'header', 'section' ];
    }

    /**
     * Get style dependencies
     */
    public function get_style_depends() {
        return [ 'slidefire-category-widget' ];
    }

    /**
     * Get script dependencies
     */
    public function get_script_depends() {
        return [ 'slidefire-category-widget' ];
    }

    /**
     * Register widget controls
     */
    protected function register_controls() {

        // Content Tab - Header Section
        $this->start_controls_section(
            'header_content_section',
            [
                'label' => esc_html__( 'Header Content', 'slidefire-category-widget' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'tagline_icon',
            [
                'label' => esc_html__( 'Tagline Icon SVG', 'slidefire-category-widget' ),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-zap h-6 w-6 text-primary" aria-hidden="true"><path d="M4 14a1 1 0 0 1-.78-1.63l9.9-10.2a.5.5 0 0 1 .86.46l-1.92 6.02A1 1 0 0 0 13 10h7a1 1 0 0 1 .78 1.63l-9.9 10.2a.5.5 0 0 1-.86-.46l1.92-6.02A1 1 0 0 0 11 14z"></path></svg>',
                'placeholder' => esc_html__( 'Enter SVG icon code', 'slidefire-category-widget' ),
                'rows' => 3,
            ]
        );

        $this->add_control(
            'tagline_text',
            [
                'label' => esc_html__( 'Tagline Text', 'slidefire-category-widget' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( 'Custom Speedsoft, Airsoft & SpeedQB Apparel', 'slidefire-category-widget' ),
                'placeholder' => esc_html__( 'Enter tagline text', 'slidefire-category-widget' ),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'main_title',
            [
                'label' => esc_html__( 'Main Title', 'slidefire-category-widget' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( 'STYLE, COMFORT, PROTECTION', 'slidefire-category-widget' ),
                'placeholder' => esc_html__( 'Enter main title', 'slidefire-category-widget' ),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'description_text',
            [
                'label' => esc_html__( 'Description', 'slidefire-category-widget' ),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html__( 'When it comes to SpeedSoft and Airsoft apparel, SlideFirePro stands apart as the ultimate choice for players who demand nothing but the best.', 'slidefire-category-widget' ),
                'placeholder' => esc_html__( 'Enter description text', 'slidefire-category-widget' ),
                'rows' => 3,
            ]
        );

        $this->end_controls_section();

        // Content Tab - Buttons Section
        $this->start_controls_section(
            'buttons_content_section',
            [
                'label' => esc_html__( 'Buttons', 'slidefire-category-widget' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'primary_button_text',
            [
                'label' => esc_html__( 'Primary Button Text', 'slidefire-category-widget' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( 'Start Custom Design', 'slidefire-category-widget' ),
                'placeholder' => esc_html__( 'Enter button text', 'slidefire-category-widget' ),
            ]
        );

        $this->add_control(
            'primary_button_link',
            [
                'label' => esc_html__( 'Primary Button Link', 'slidefire-category-widget' ),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => esc_html__( 'https://your-link.com', 'slidefire-category-widget' ),
                'default' => [
                    'url' => '#',
                ],
            ]
        );

        $this->add_control(
            'secondary_button_text',
            [
                'label' => esc_html__( 'Secondary Button Text', 'slidefire-category-widget' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( 'View Portfolio', 'slidefire-category-widget' ),
                'placeholder' => esc_html__( 'Enter button text', 'slidefire-category-widget' ),
            ]
        );

        $this->add_control(
            'secondary_button_link',
            [
                'label' => esc_html__( 'Secondary Button Link', 'slidefire-category-widget' ),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => esc_html__( 'https://your-link.com', 'slidefire-category-widget' ),
                'default' => [
                    'url' => '#',
                ],
            ]
        );

        $this->end_controls_section();

        // Content Tab - Team Icons Section
        $this->start_controls_section(
            'teams_content_section',
            [
                'label' => esc_html__( 'Custom Teams Section', 'slidefire-category-widget' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'teams_title',
            [
                'label' => esc_html__( 'Teams Section Title', 'slidefire-category-widget' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( 'Custom Teams from Around the World', 'slidefire-category-widget' ),
                'placeholder' => esc_html__( 'Enter teams section title', 'slidefire-category-widget' ),
                'label_block' => true,
            ]
        );

        // Repeater for team icons
        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'team_icon',
            [
                'label' => esc_html__( 'Team Icon SVG', 'slidefire-category-widget' ),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-shield w-8 h-8 text-primary opacity-70 hover:opacity-100 transition-opacity" aria-hidden="true"><path d="M20 13c0 5-3.5 7.5-7.66 8.95a1 1 0 0 1-.67-.01C7.5 20.5 4 18 4 13V6a1 1 0 0 1 1-1c2 0 4.5-1.2 6.24-2.72a1.17 1.17 0 0 1 1.52 0C14.51 3.81 17 5 19 5a1 1 0 0 1 1 1z"></path></svg>',
                'placeholder' => esc_html__( 'Enter SVG icon code', 'slidefire-category-widget' ),
                'rows' => 4,
            ]
        );

        $repeater->add_control(
            'icon_color',
            [
                'label' => esc_html__( 'Icon Color', 'slidefire-category-widget' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'primary',
                'options' => [
                    'primary' => esc_html__( 'Primary', 'slidefire-category-widget' ),
                    'orange' => esc_html__( 'Orange', 'slidefire-category-widget' ),
                    'blue' => esc_html__( 'Blue', 'slidefire-category-widget' ),
                    'yellow' => esc_html__( 'Yellow', 'slidefire-category-widget' ),
                    'purple' => esc_html__( 'Purple', 'slidefire-category-widget' ),
                ],
            ]
        );

        $this->add_control(
            'team_icons',
            [
                'label' => esc_html__( 'Team Icons', 'slidefire-category-widget' ),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'team_icon' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-shield w-8 h-8 opacity-70 hover:opacity-100 transition-opacity" aria-hidden="true"><path d="M20 13c0 5-3.5 7.5-7.66 8.95a1 1 0 0 1-.67-.01C7.5 20.5 4 18 4 13V6a1 1 0 0 1 1-1c2 0 4.5-1.2 6.24-2.72a1.17 1.17 0 0 1 1.52 0C14.51 3.81 17 5 19 5a1 1 0 0 1 1 1z"></path></svg>',
                        'icon_color' => 'primary',
                    ],
                    [
                        'team_icon' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-target w-8 h-8 opacity-70 hover:opacity-100 transition-opacity" aria-hidden="true"><circle cx="12" cy="12" r="10"></circle><circle cx="12" cy="12" r="6"></circle><circle cx="12" cy="12" r="2"></circle></svg>',
                        'icon_color' => 'orange',
                    ],
                    [
                        'team_icon' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-crosshair w-8 h-8 opacity-70 hover:opacity-100 transition-opacity" aria-hidden="true"><circle cx="12" cy="12" r="10"></circle><line x1="22" x2="18" y1="12" y2="12"></line><line x1="6" x2="2" y1="12" y2="12"></line><line x1="12" x2="12" y1="6" y2="2"></line><line x1="12" x2="12" y1="22" y2="18"></line></svg>',
                        'icon_color' => 'blue',
                    ],
                    [
                        'team_icon' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-trophy w-8 h-8 opacity-70 hover:opacity-100 transition-opacity" aria-hidden="true"><path d="M10 14.66v1.626a2 2 0 0 1-.976 1.696A5 5 0 0 0 7 21.978"></path><path d="M14 14.66v1.626a2 2 0 0 0 .976 1.696A5 5 0 0 1 17 21.978"></path><path d="M18 9h1.5a1 1 0 0 0 0-5H18"></path><path d="M4 22h16"></path><path d="M6 9a6 6 0 0 0 12 0V3a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1z"></path><path d="M6 9H4.5a1 1 0 0 1 0-5H6"></path></svg>',
                        'icon_color' => 'yellow',
                    ],
                    [
                        'team_icon' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-users w-8 h-8 opacity-70 hover:opacity-100 transition-opacity" aria-hidden="true"><path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"></path><path d="M16 3.128a4 4 0 0 1 0 7.744"></path><path d="M22 21v-2a4 4 0 0 0-3-3.87"></path><circle cx="9" cy="7" r="4"></circle></svg>',
                        'icon_color' => 'purple',
                    ],
                ],
                'title_field' => '{{{ icon_color }}} Icon',
            ]
        );

        $this->end_controls_section();

        // Content Tab - Product Image Section
        $this->start_controls_section(
            'product_image_section',
            [
                'label' => esc_html__( 'Product Image', 'slidefire-category-widget' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'product_image',
            [
                'label' => esc_html__( 'Product Image', 'slidefire-category-widget' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => '/_assets/v11/9344f54b9ec487293e2a22836e4f1d3bbca733e2.png',
                ],
            ]
        );

        $this->add_control(
            'product_image_alt',
            [
                'label' => esc_html__( 'Image Alt Text', 'slidefire-category-widget' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( 'SlideFirePro Custom Blue Jersey', 'slidefire-category-widget' ),
                'placeholder' => esc_html__( 'Enter alt text', 'slidefire-category-widget' ),
            ]
        );

        $this->end_controls_section();

        // Style Tab - Section Styles
        $this->start_controls_section(
            'section_style',
            [
                'label' => esc_html__( 'Section', 'slidefire-category-widget' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_responsive_control(
            'section_min_height',
            [
                'label' => esc_html__( 'Minimum Height', 'slidefire-category-widget' ),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => [ 'vh', 'px' ],
                'range' => [
                    'vh' => [
                        'min' => 50,
                        'max' => 100,
                    ],
                    'px' => [
                        'min' => 400,
                        'max' => 1000,
                    ],
                ],
                'default' => [
                    'unit' => 'vh',
                    'size' => 65,
                ],
                'selectors' => [
                    '{{WRAPPER}} .slidefire-hero-section' => 'min-height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'section_background_color',
            [
                'label' => esc_html__( 'Background Color', 'slidefire-category-widget' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#000000',
                'selectors' => [
                    '{{WRAPPER}} .slidefire-hero-section' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();

        // Style Tab - Typography
        $this->start_controls_section(
            'typography_style',
            [
                'label' => esc_html__( 'Typography', 'slidefire-category-widget' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'tagline_typography',
                'label' => esc_html__( 'Tagline Typography', 'slidefire-category-widget' ),
                'selector' => '{{WRAPPER}} .hero-tagline',
            ]
        );

        $this->add_control(
            'tagline_color',
            [
                'label' => esc_html__( 'Tagline Color', 'slidefire-category-widget' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#23B2EE',
                'selectors' => [
                    '{{WRAPPER}} .hero-tagline' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'title_typography',
                'label' => esc_html__( 'Title Typography', 'slidefire-category-widget' ),
                'selector' => '{{WRAPPER}} .hero-title',
            ]
        );

        $this->add_control(
            'title_color',
            [
                'label' => esc_html__( 'Title Color', 'slidefire-category-widget' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#ffffff',
                'selectors' => [
                    '{{WRAPPER}} .hero-title' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'description_typography',
                'label' => esc_html__( 'Description Typography', 'slidefire-category-widget' ),
                'selector' => '{{WRAPPER}} .hero-description',
            ]
        );

        $this->add_control(
            'description_color',
            [
                'label' => esc_html__( 'Description Color', 'slidefire-category-widget' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#888888',
                'selectors' => [
                    '{{WRAPPER}} .hero-description' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'teams_title_typography',
                'label' => esc_html__( 'Teams Title Typography', 'slidefire-category-widget' ),
                'selector' => '{{WRAPPER}} .teams-title',
            ]
        );

        $this->end_controls_section();

        // Style Tab - Buttons
        $this->start_controls_section(
            'buttons_style',
            [
                'label' => esc_html__( 'Buttons', 'slidefire-category-widget' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'primary_button_bg_color',
            [
                'label' => esc_html__( 'Primary Button Background', 'slidefire-category-widget' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#23B2EE',
                'selectors' => [
                    '{{WRAPPER}} .hero-primary-btn' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'primary_button_text_color',
            [
                'label' => esc_html__( 'Primary Button Text Color', 'slidefire-category-widget' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#000000',
                'selectors' => [
                    '{{WRAPPER}} .hero-primary-btn' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'secondary_button_border_color',
            [
                'label' => esc_html__( 'Secondary Button Border Color', 'slidefire-category-widget' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#23B2EE',
                'selectors' => [
                    '{{WRAPPER}} .hero-secondary-btn' => 'border-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'secondary_button_text_color',
            [
                'label' => esc_html__( 'Secondary Button Text Color', 'slidefire-category-widget' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#23B2EE',
                'selectors' => [
                    '{{WRAPPER}} .hero-secondary-btn' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();
    }

    /**
     * Sanitize SVG content for safe output
     */
    private function sanitize_svg( $svg ) {
        // Allow SVG elements and attributes
        $allowed_tags = array(
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

        return wp_kses( $svg, $allowed_tags );
    }

    /**
     * Get icon color class
     */
    private function get_icon_color_class( $color ) {
        $color_classes = [
            'primary' => 'text-primary',
            'orange' => 'text-orange-400',
            'blue' => 'text-blue-400',
            'yellow' => 'text-yellow-400',
            'purple' => 'text-purple-400',
        ];

        return isset( $color_classes[ $color ] ) ? $color_classes[ $color ] : 'text-primary';
    }

    /**
     * Render widget output on the frontend
     */
    protected function render() {
        $settings = $this->get_settings_for_display();
        
        // Get image URL
        $image_url = $settings['product_image']['url'] ?? '/_assets/v11/9344f54b9ec487293e2a22836e4f1d3bbca733e2.png';
        $image_alt = $settings['product_image_alt'] ?? 'SlideFirePro Custom Blue Jersey';
        
        ?>
        <section class="slidefire-hero-section relative min-h-[65vh] flex items-center justify-center overflow-hidden">
            <!-- Background gradients -->
            <div class="absolute inset-0 z-0">
                <div class="absolute inset-0 bg-gradient-to-br from-black via-background/80 to-background/60"></div>
                <div class="absolute inset-0 bg-gradient-to-r from-primary/20 via-transparent to-primary/10"></div>
                <div class="absolute inset-0 bg-gradient-to-b from-transparent via-primary/5 to-transparent"></div>
            </div>

            <!-- Floating animation dots -->
            <div class="absolute inset-0 z-5">
                <div class="absolute top-20 left-20 w-2 h-2 bg-primary/60 rounded-full animate-float-slow"></div>
                <div class="absolute top-40 right-32 w-1 h-1 bg-primary/40 rounded-full animate-float-medium"></div>
                <div class="absolute bottom-32 left-40 w-3 h-3 bg-primary/30 rounded-full animate-float-slow"></div>
                <div class="absolute top-60 left-60 w-1 h-1 bg-primary/50 rounded-full animate-float-fast"></div>
                <div class="absolute bottom-40 right-20 w-2 h-2 bg-primary/35 rounded-full animate-float-medium"></div>
                <div class="absolute top-32 left-80 w-1 h-1 bg-primary/45 rounded-full animate-float-medium"></div>
                <div class="absolute bottom-60 left-20 w-1 h-1 bg-primary/40 rounded-full animate-float-fast"></div>
                <div class="absolute top-80 right-60 w-2 h-2 bg-primary/30 rounded-full animate-float-slow"></div>
                <div class="absolute bottom-20 right-80 w-1 h-1 bg-primary/50 rounded-full animate-float-medium"></div>
                <div class="absolute top-16 right-16 w-0.5 h-0.5 bg-primary/60 rounded-full animate-float-fast"></div>
                <div class="absolute top-72 left-32 w-0.5 h-0.5 bg-primary/55 rounded-full animate-float-medium"></div>
                <div class="absolute bottom-16 left-80 w-0.5 h-0.5 bg-primary/40 rounded-full animate-float-slow"></div>
                <div class="absolute top-96 right-40 w-0.5 h-0.5 bg-primary/45 rounded-full animate-float-fast"></div>
                <div class="absolute bottom-80 right-16 w-0.5 h-0.5 bg-primary/50 rounded-full animate-float-medium"></div>
                <div class="absolute top-48 left-96 w-1 h-1 bg-primary/35 rounded-full animate-float-slow"></div>
                <div class="absolute bottom-48 right-96 w-1 h-1 bg-primary/40 rounded-full animate-float-fast"></div>
                <div class="absolute top-24 right-72 w-0.5 h-0.5 bg-primary/45 rounded-full animate-float-medium"></div>
            </div>

            <div class="container mx-auto px-4 relative z-10">
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                    <!-- Content Column -->
                    <div class="max-w-2xl pt-8">
                        <!-- Tagline -->
                        <div class="flex items-center space-x-2 mb-6">
                            <?php echo $this->sanitize_svg( $settings['tagline_icon'] ); ?>
                            <span class="hero-tagline text-primary uppercase tracking-wider"><?php echo esc_html( $settings['tagline_text'] ); ?></span>
                        </div>

                        <!-- Main Title -->
                        <h1 class="hero-title text-5xl md:text-7xl mb-6 leading-tight title-industry">
                            <span class="text-white"><?php echo esc_html( $settings['main_title'] ); ?></span>
                        </h1>

                        <!-- Description -->
                        <p class="hero-description text-xl text-muted-foreground mb-8"><?php echo esc_html( $settings['description_text'] ); ?></p>

                        <!-- Mobile Image (hidden on large screens) -->
                        <div class="lg:hidden mb-8">
                            <div class="relative bg-card/50 border-2 border-dashed border-primary/30 rounded-2xl p-6 aspect-square max-w-sm mx-auto backdrop-blur-sm">
                                <div class="absolute inset-4 bg-gradient-to-br from-primary/10 to-transparent rounded-xl"></div>
                                <div class="relative h-full flex items-center justify-center">
                                    <div class="w-full h-full flex items-center justify-center">
                                        <img src="<?php echo esc_url( $image_url ); ?>" alt="<?php echo esc_attr( $image_alt ); ?>" class="w-full h-full object-contain rounded-lg">
                                    </div>
                                </div>
                                <div class="absolute top-4 right-4 w-2 h-2 bg-primary rounded-full animate-pulse"></div>
                                <div class="absolute bottom-4 left-4 w-1 h-1 bg-primary rounded-full animate-ping"></div>
                            </div>
                        </div>

                        <!-- Buttons -->
                        <div class="flex flex-col sm:flex-row gap-4 mb-12">
                            <?php 
                            $primary_button_key = 'primary_button_link';
                            $this->add_link_attributes( $primary_button_key, $settings['primary_button_link'] );
                            ?>
                            <a <?php echo $this->get_render_attribute_string( $primary_button_key ); ?> class="hero-primary-btn inline-flex items-center justify-center gap-2 whitespace-nowrap text-sm font-medium transition-all disabled:pointer-events-none disabled:opacity-50 [&_svg]:pointer-events-none [&_svg:not([class*='size-'])]:size-4 shrink-0 [&_svg]:shrink-0 outline-none focus-visible:border-ring focus-visible:ring-ring/50 focus-visible:ring-[3px] aria-invalid:ring-destructive/20 dark:aria-invalid:ring-destructive/40 aria-invalid:border-destructive h-10 rounded-md px-6 has-[>svg]:px-4 bg-primary hover:bg-primary/90 text-primary-foreground">
                                <?php echo esc_html( $settings['primary_button_text'] ); ?>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-arrow-right ml-2 h-5 w-5" aria-hidden="true"><path d="M5 12h14"></path><path d="m12 5 7 7-7 7"></path></svg>
                            </a>

                            <?php 
                            $secondary_button_key = 'secondary_button_link';
                            $this->add_link_attributes( $secondary_button_key, $settings['secondary_button_link'] );
                            ?>
                            <a <?php echo $this->get_render_attribute_string( $secondary_button_key ); ?> class="hero-secondary-btn inline-flex items-center justify-center gap-2 whitespace-nowrap text-sm font-medium transition-all disabled:pointer-events-none disabled:opacity-50 [&_svg]:pointer-events-none [&_svg:not([class*='size-'])]:size-4 shrink-0 [&_svg]:shrink-0 outline-none focus-visible:border-ring focus-visible:ring-ring/50 focus-visible:ring-[3px] aria-invalid:ring-destructive/20 dark:aria-invalid:ring-destructive/40 aria-invalid:border-destructive border bg-background hover:text-accent-foreground dark:bg-input/30 dark:border-input dark:hover:bg-input/50 h-10 rounded-md px-6 has-[>svg]:px-4 border-primary text-primary hover:bg-primary/10">
                                <?php echo esc_html( $settings['secondary_button_text'] ); ?>
                            </a>
                        </div>

                        <!-- Teams Section -->
                        <div class="text-left">
                            <h3 class="teams-title text-2xl md:text-3xl mb-6 title-industry">
                                <span class="bg-gradient-to-r from-primary to-blue-400 bg-clip-text text-transparent"><?php echo esc_html( $settings['teams_title'] ); ?></span>
                            </h3>
                            <div class="relative overflow-hidden">
                                <div class="flex space-x-8 animate-[scroll_25s_linear_infinite]">
                                    <?php foreach ( $settings['team_icons'] as $index => $item ) : ?>
                                        <div class="flex-shrink-0 w-16 h-16 rounded-lg bg-card border border-border flex items-center justify-center hover:border-primary/50 transition-all duration-300 hover:scale-105">
                                            <div class="<?php echo esc_attr( $this->get_icon_color_class( $item['icon_color'] ) ); ?> opacity-70 hover:opacity-100 transition-opacity">
                                                <?php echo $this->sanitize_svg( $item['team_icon'] ); ?>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                    
                                    <!-- Duplicate icons for seamless scroll -->
                                    <?php foreach ( $settings['team_icons'] as $index => $item ) : ?>
                                        <div class="flex-shrink-0 w-16 h-16 rounded-lg bg-card border border-border flex items-center justify-center hover:border-primary/50 transition-all duration-300 hover:scale-105">
                                            <div class="<?php echo esc_attr( $this->get_icon_color_class( $item['icon_color'] ) ); ?> opacity-70 hover:opacity-100 transition-opacity">
                                                <?php echo $this->sanitize_svg( $item['team_icon'] ); ?>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Image Column (hidden on mobile, shown on large screens) -->
                    <div class="relative hidden lg:block">
                        <div class="relative bg-card/50 border-2 border-dashed border-primary/30 rounded-2xl p-8 aspect-square max-w-md mx-auto backdrop-blur-sm">
                            <div class="absolute inset-4 bg-gradient-to-br from-primary/10 to-transparent rounded-xl"></div>
                            <div class="relative h-full flex items-center justify-center">
                                <div class="w-full h-full flex items-center justify-center">
                                    <img src="<?php echo esc_url( $image_url ); ?>" alt="<?php echo esc_attr( $image_alt ); ?>" class="w-full h-full object-contain rounded-lg">
                                </div>
                            </div>
                            <div class="absolute top-4 right-4 w-2 h-2 bg-primary rounded-full animate-pulse"></div>
                            <div class="absolute bottom-4 left-4 w-1 h-1 bg-primary rounded-full animate-ping"></div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Additional decorative elements -->
            <div class="absolute top-20 right-20 w-2 h-2 bg-primary rounded-full animate-pulse"></div>
            <div class="absolute bottom-40 left-20 w-1 h-1 bg-primary rounded-full animate-ping"></div>
            <div class="absolute top-1/2 right-40 w-3 h-3 border border-primary rounded-full animate-pulse"></div>

            <!-- Animation CSS -->
            <style>
                @keyframes scroll {
                  from {
                    transform: translateX(0);
                  }
                  to {
                    transform: translateX(-50%);
                  }
                }
            </style>
        </section>
        <?php
    }

    /**
     * Render widget output in the editor
     */
    protected function content_template() {
        ?>
        <#
        var imageUrl = settings.product_image.url || '/_assets/v11/9344f54b9ec487293e2a22836e4f1d3bbca733e2.png';
        var imageAlt = settings.product_image_alt || 'SlideFirePro Custom Blue Jersey';
        
        function getIconColorClass(color) {
            var colorClasses = {
                'primary': 'text-primary',
                'orange': 'text-orange-400',
                'blue': 'text-blue-400',
                'yellow': 'text-yellow-400',
                'purple': 'text-purple-400'
            };
            return colorClasses[color] || 'text-primary';
        }
        #>
        <section class="slidefire-hero-section relative min-h-[65vh] flex items-center justify-center overflow-hidden">
            <!-- Background gradients -->
            <div class="absolute inset-0 z-0">
                <div class="absolute inset-0 bg-gradient-to-br from-black via-background/80 to-background/60"></div>
                <div class="absolute inset-0 bg-gradient-to-r from-primary/20 via-transparent to-primary/10"></div>
                <div class="absolute inset-0 bg-gradient-to-b from-transparent via-primary/5 to-transparent"></div>
            </div>

            <!-- Floating animation dots -->
            <div class="absolute inset-0 z-5">
                <div class="absolute top-20 left-20 w-2 h-2 bg-primary/60 rounded-full animate-float-slow"></div>
                <div class="absolute top-40 right-32 w-1 h-1 bg-primary/40 rounded-full animate-float-medium"></div>
                <div class="absolute bottom-32 left-40 w-3 h-3 bg-primary/30 rounded-full animate-float-slow"></div>
                <div class="absolute top-60 left-60 w-1 h-1 bg-primary/50 rounded-full animate-float-fast"></div>
                <div class="absolute bottom-40 right-20 w-2 h-2 bg-primary/35 rounded-full animate-float-medium"></div>
                <div class="absolute top-32 left-80 w-1 h-1 bg-primary/45 rounded-full animate-float-medium"></div>
                <div class="absolute bottom-60 left-20 w-1 h-1 bg-primary/40 rounded-full animate-float-fast"></div>
                <div class="absolute top-80 right-60 w-2 h-2 bg-primary/30 rounded-full animate-float-slow"></div>
                <div class="absolute bottom-20 right-80 w-1 h-1 bg-primary/50 rounded-full animate-float-medium"></div>
                <div class="absolute top-16 right-16 w-0.5 h-0.5 bg-primary/60 rounded-full animate-float-fast"></div>
                <div class="absolute top-72 left-32 w-0.5 h-0.5 bg-primary/55 rounded-full animate-float-medium"></div>
                <div class="absolute bottom-16 left-80 w-0.5 h-0.5 bg-primary/40 rounded-full animate-float-slow"></div>
                <div class="absolute top-96 right-40 w-0.5 h-0.5 bg-primary/45 rounded-full animate-float-fast"></div>
                <div class="absolute bottom-80 right-16 w-0.5 h-0.5 bg-primary/50 rounded-full animate-float-medium"></div>
                <div class="absolute top-48 left-96 w-1 h-1 bg-primary/35 rounded-full animate-float-slow"></div>
                <div class="absolute bottom-48 right-96 w-1 h-1 bg-primary/40 rounded-full animate-float-fast"></div>
                <div class="absolute top-24 right-72 w-0.5 h-0.5 bg-primary/45 rounded-full animate-float-medium"></div>
            </div>

            <div class="container mx-auto px-4 relative z-10">
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                    <!-- Content Column -->
                    <div class="max-w-2xl pt-8">
                        <!-- Tagline -->
                        <div class="flex items-center space-x-2 mb-6">
                            {{{ settings.tagline_icon }}}
                            <span class="hero-tagline text-primary uppercase tracking-wider">{{{ settings.tagline_text }}}</span>
                        </div>

                        <!-- Main Title -->
                        <h1 class="hero-title text-5xl md:text-7xl mb-6 leading-tight title-industry">
                            <span class="text-white">{{{ settings.main_title }}}</span>
                        </h1>

                        <!-- Description -->
                        <p class="hero-description text-xl text-muted-foreground mb-8">{{{ settings.description_text }}}</p>

                        <!-- Mobile Image (hidden on large screens) -->
                        <div class="lg:hidden mb-8">
                            <div class="relative bg-card/50 border-2 border-dashed border-primary/30 rounded-2xl p-6 aspect-square max-w-sm mx-auto backdrop-blur-sm">
                                <div class="absolute inset-4 bg-gradient-to-br from-primary/10 to-transparent rounded-xl"></div>
                                <div class="relative h-full flex items-center justify-center">
                                    <div class="w-full h-full flex items-center justify-center">
                                        <img src="{{{ imageUrl }}}" alt="{{{ imageAlt }}}" class="w-full h-full object-contain rounded-lg">
                                    </div>
                                </div>
                                <div class="absolute top-4 right-4 w-2 h-2 bg-primary rounded-full animate-pulse"></div>
                                <div class="absolute bottom-4 left-4 w-1 h-1 bg-primary rounded-full animate-ping"></div>
                            </div>
                        </div>

                        <!-- Buttons -->
                        <div class="flex flex-col sm:flex-row gap-4 mb-12">
                            <a href="{{{ settings.primary_button_link.url }}}" class="hero-primary-btn inline-flex items-center justify-center gap-2 whitespace-nowrap text-sm font-medium transition-all disabled:pointer-events-none disabled:opacity-50 [&_svg]:pointer-events-none [&_svg:not([class*='size-'])]:size-4 shrink-0 [&_svg]:shrink-0 outline-none focus-visible:border-ring focus-visible:ring-ring/50 focus-visible:ring-[3px] aria-invalid:ring-destructive/20 dark:aria-invalid:ring-destructive/40 aria-invalid:border-destructive h-10 rounded-md px-6 has-[>svg]:px-4 bg-primary hover:bg-primary/90 text-primary-foreground">
                                {{{ settings.primary_button_text }}}
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-arrow-right ml-2 h-5 w-5" aria-hidden="true"><path d="M5 12h14"></path><path d="m12 5 7 7-7 7"></path></svg>
                            </a>

                            <a href="{{{ settings.secondary_button_link.url }}}" class="hero-secondary-btn inline-flex items-center justify-center gap-2 whitespace-nowrap text-sm font-medium transition-all disabled:pointer-events-none disabled:opacity-50 [&_svg]:pointer-events-none [&_svg:not([class*='size-'])]:size-4 shrink-0 [&_svg]:shrink-0 outline-none focus-visible:border-ring focus-visible:ring-ring/50 focus-visible:ring-[3px] aria-invalid:ring-destructive/20 dark:aria-invalid:ring-destructive/40 aria-invalid:border-destructive border bg-background hover:text-accent-foreground dark:bg-input/30 dark:border-input dark:hover:bg-input/50 h-10 rounded-md px-6 has-[>svg]:px-4 border-primary text-primary hover:bg-primary/10">
                                {{{ settings.secondary_button_text }}}
                            </a>
                        </div>

                        <!-- Teams Section -->
                        <div class="text-left">
                            <h3 class="teams-title text-2xl md:text-3xl mb-6 title-industry">
                                <span class="bg-gradient-to-r from-primary to-blue-400 bg-clip-text text-transparent">{{{ settings.teams_title }}}</span>
                            </h3>
                            <div class="relative overflow-hidden">
                                <div class="flex space-x-8 animate-[scroll_25s_linear_infinite]">
                                    <# _.each( settings.team_icons, function( item, index ) { #>
                                        <div class="flex-shrink-0 w-16 h-16 rounded-lg bg-card border border-border flex items-center justify-center hover:border-primary/50 transition-all duration-300 hover:scale-105">
                                            <div class="{{{ getIconColorClass(item.icon_color) }}} opacity-70 hover:opacity-100 transition-opacity">
                                                {{{ item.team_icon }}}
                                            </div>
                                        </div>
                                    <# }); #>
                                    
                                    <!-- Duplicate icons for seamless scroll -->
                                    <# _.each( settings.team_icons, function( item, index ) { #>
                                        <div class="flex-shrink-0 w-16 h-16 rounded-lg bg-card border border-border flex items-center justify-center hover:border-primary/50 transition-all duration-300 hover:scale-105">
                                            <div class="{{{ getIconColorClass(item.icon_color) }}} opacity-70 hover:opacity-100 transition-opacity">
                                                {{{ item.team_icon }}}
                                            </div>
                                        </div>
                                    <# }); #>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Image Column (hidden on mobile, shown on large screens) -->
                    <div class="relative hidden lg:block">
                        <div class="relative bg-card/50 border-2 border-dashed border-primary/30 rounded-2xl p-8 aspect-square max-w-md mx-auto backdrop-blur-sm">
                            <div class="absolute inset-4 bg-gradient-to-br from-primary/10 to-transparent rounded-xl"></div>
                            <div class="relative h-full flex items-center justify-center">
                                <div class="w-full h-full flex items-center justify-center">
                                    <img src="{{{ imageUrl }}}" alt="{{{ imageAlt }}}" class="w-full h-full object-contain rounded-lg">
                                </div>
                            </div>
                            <div class="absolute top-4 right-4 w-2 h-2 bg-primary rounded-full animate-pulse"></div>
                            <div class="absolute bottom-4 left-4 w-1 h-1 bg-primary rounded-full animate-ping"></div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Additional decorative elements -->
            <div class="absolute top-20 right-20 w-2 h-2 bg-primary rounded-full animate-pulse"></div>
            <div class="absolute bottom-40 left-20 w-1 h-1 bg-primary rounded-full animate-ping"></div>
            <div class="absolute top-1/2 right-40 w-3 h-3 border border-primary rounded-full animate-pulse"></div>

            <!-- Animation CSS -->
            <style>
                @keyframes scroll {
                  from {
                    transform: translateX(0);
                  }
                  to {
                    transform: translateX(-50%);
                  }
                }
            </style>
        </section>
        <?php
    }
}
