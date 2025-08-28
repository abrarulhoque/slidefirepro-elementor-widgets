<?php
/**
 * SlideFire Product Features Widget Class
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

class SlideFire_Product_Features_Widget extends \Elementor\Widget_Base {

    /**
     * Get widget name
     */
    public function get_name() {
        return 'slidefire_product_features';
    }

    /**
     * Get widget title
     */
    public function get_title() {
        return esc_html__( 'SlideFire Product Features', 'slidefire-category-widget' );
    }

    /**
     * Get widget icon
     */
    public function get_icon() {
        return 'eicon-featured-image';
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
        return [ 'product', 'features', 'slidefire', 'excellence', 'specs' ];
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
            'main_title',
            [
                'label' => esc_html__( 'Main Title', 'slidefire-category-widget' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( 'Engineered for Excellence', 'slidefire-category-widget' ),
                'placeholder' => esc_html__( 'Enter main title', 'slidefire-category-widget' ),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'title_highlight',
            [
                'label' => esc_html__( 'Highlighted Word', 'slidefire-category-widget' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( 'Excellence', 'slidefire-category-widget' ),
                'placeholder' => esc_html__( 'Enter word to highlight', 'slidefire-category-widget' ),
                'description' => esc_html__( 'This word will be highlighted in primary color', 'slidefire-category-widget' ),
            ]
        );

        $this->add_control(
            'description_text',
            [
                'label' => esc_html__( 'Description', 'slidefire-category-widget' ),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html__( 'Every piece is crafted with precision, featuring cutting-edge technology and premium materials', 'slidefire-category-widget' ),
                'placeholder' => esc_html__( 'Enter description text', 'slidefire-category-widget' ),
                'rows' => 3,
            ]
        );

        $this->end_controls_section();

        // Content Tab - Product Image
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
                'default' => esc_html__( 'SlideFire Pro Jersey', 'slidefire-category-widget' ),
                'placeholder' => esc_html__( 'Enter alt text', 'slidefire-category-widget' ),
            ]
        );

        $this->end_controls_section();

        // Content Tab - Features List
        $this->start_controls_section(
            'features_content_section',
            [
                'label' => esc_html__( 'Features List', 'slidefire-category-widget' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'features_title',
            [
                'label' => esc_html__( 'Features Section Title', 'slidefire-category-widget' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( 'Premium Features', 'slidefire-category-widget' ),
                'placeholder' => esc_html__( 'Enter features title', 'slidefire-category-widget' ),
            ]
        );

        // Repeater for features
        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'feature_icon',
            [
                'label' => esc_html__( 'Feature Icon SVG', 'slidefire-category-widget' ),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-zap" aria-hidden="true"><path d="M4 14a1 1 0 0 1-.78-1.63l9.9-10.2a.5.5 0 0 1 .86.46l-1.92 6.02A1 1 0 0 0 13 10h7a1 1 0 0 1 .78 1.63l-9.9 10.2a.5.5 0 0 1-.86-.46l1.92-6.02A1 1 0 0 0 11 14z"></path></svg>',
                'placeholder' => esc_html__( 'Enter SVG icon code', 'slidefire-category-widget' ),
                'rows' => 3,
            ]
        );

        $repeater->add_control(
            'feature_title',
            [
                'label' => esc_html__( 'Feature Title', 'slidefire-category-widget' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( 'Feature Title', 'slidefire-category-widget' ),
                'placeholder' => esc_html__( 'Enter feature title', 'slidefire-category-widget' ),
            ]
        );

        $repeater->add_control(
            'feature_description',
            [
                'label' => esc_html__( 'Feature Description', 'slidefire-category-widget' ),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html__( 'Description of this amazing feature', 'slidefire-category-widget' ),
                'placeholder' => esc_html__( 'Enter feature description', 'slidefire-category-widget' ),
                'rows' => 2,
            ]
        );

        $this->add_control(
            'features_list',
            [
                'label' => esc_html__( 'Features', 'slidefire-category-widget' ),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'feature_icon' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-zap" aria-hidden="true"><path d="M4 14a1 1 0 0 1-.78-1.63l9.9-10.2a.5.5 0 0 1 .86.46l-1.92 6.02A1 1 0 0 0 13 10h7a1 1 0 0 1 .78 1.63l-9.9 10.2a.5.5 0 0 1-.86-.46l1.92-6.02A1 1 0 0 0 11 14z"></path></svg>',
                        'feature_title' => 'Moisture-Wicking',
                        'feature_description' => 'Advanced fabric keeps you dry during intense performance',
                    ],
                    [
                        'feature_icon' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-shield" aria-hidden="true"><path d="M20 13c0 5-3.5 7.5-7.66 8.95a1 1 0 0 1-.67-.01C7.5 20.5 4 18 4 13V6a1 1 0 0 1 1-1c2 0 4.5-1.2 6.24-2.72a1.17 1.17 0 0 1 1.52 0C14.51 3.81 17 5 19 5a1 1 0 0 1 1 1z"></path></svg>',
                        'feature_title' => 'Durable Construction',
                        'feature_description' => 'Built to withstand the toughest training sessions',
                    ],
                    [
                        'feature_icon' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-wind" aria-hidden="true"><path d="M17.7 7.7a2.5 2.5 0 1 1 1.8 4.3H2"></path><path d="M9.6 4.6A2 2 0 1 1 11 8H2"></path><path d="M12.6 19.4A2 2 0 1 0 14 16H2"></path></svg>',
                        'feature_title' => 'Breathable Design',
                        'feature_description' => 'Strategic ventilation for optimal temperature control',
                    ],
                    [
                        'feature_icon' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-layers" aria-hidden="true"><path d="M12.83 2.18a2 2 0 0 0-1.66 0L2.6 6.08a1 1 0 0 0 0 1.83l8.58 3.91a2 2 0 0 0 1.66 0l8.58-3.9a1 1 0 0 0 0-1.83z"></path><path d="M2 12a1 1 0 0 0 .58.91l8.6 3.91a2 2 0 0 0 1.65 0l8.58-3.9A1 1 0 0 0 22 12"></path><path d="M2 17a1 1 0 0 0 .58.91l8.6 3.91a2 2 0 0 0 1.65 0l8.58-3.9A1 1 0 0 0 22 17"></path></svg>',
                        'feature_title' => 'Padded Options',
                        'feature_description' => 'Various padding levels to suit your gameplay style',
                    ],
                    [
                        'feature_icon' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-palette" aria-hidden="true"><circle cx="13.5" cy="6.5" r=".5" fill="currentColor"></circle><circle cx="17.5" cy="10.5" r=".5" fill="currentColor"></circle><circle cx="8.5" cy="7.5" r=".5" fill="currentColor"></circle><circle cx="6.5" cy="12.5" r=".5" fill="currentColor"></circle><path d="M12 2C6.5 2 2 6.5 2 12s4.5 10 10 10c.926 0 1.648-.746 1.648-1.688 0-.437-.18-.835-.437-1.125-.29-.289-.438-.652-.438-1.125a1.64 1.64 0 0 1 1.668-1.668h1.996c3.051 0 5.555-2.503 5.555-5.554C21.965 6.012 17.461 2 12 2z"></path></svg>',
                        'feature_title' => 'Custom Design',
                        'feature_description' => 'Unlimited design options tailored to your team\'s exact specifications',
                    ],
                ],
                'title_field' => '{{{ feature_title }}}',
            ]
        );

        $this->end_controls_section();

        // Content Tab - Detail Images
        $this->start_controls_section(
            'detail_images_section',
            [
                'label' => esc_html__( 'Detail Images', 'slidefire-category-widget' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        // Repeater for detail images
        $detail_repeater = new \Elementor\Repeater();

        $detail_repeater->add_control(
            'detail_image',
            [
                'label' => esc_html__( 'Detail Image', 'slidefire-category-widget' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => 'https://via.placeholder.com/300x200',
                ],
            ]
        );

        $detail_repeater->add_control(
            'detail_title',
            [
                'label' => esc_html__( 'Detail Title', 'slidefire-category-widget' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( 'Detail Feature', 'slidefire-category-widget' ),
                'placeholder' => esc_html__( 'Enter detail title', 'slidefire-category-widget' ),
            ]
        );

        $this->add_control(
            'detail_images',
            [
                'label' => esc_html__( 'Detail Images', 'slidefire-category-widget' ),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $detail_repeater->get_controls(),
                'default' => [
                    [
                        'detail_image' => ['url' => 'https://via.placeholder.com/300x200'],
                        'detail_title' => 'Chest Padding',
                    ],
                    [
                        'detail_image' => ['url' => 'https://via.placeholder.com/300x200'],
                        'detail_title' => 'Anti-Slide Thumbs',
                    ],
                    [
                        'detail_image' => ['url' => 'https://via.placeholder.com/300x200'],
                        'detail_title' => 'Shoulder Padding',
                    ],
                    [
                        'detail_image' => ['url' => 'https://via.placeholder.com/300x200'],
                        'detail_title' => 'Durable Material Forearms',
                    ],
                    [
                        'detail_image' => ['url' => 'https://via.placeholder.com/300x200'],
                        'detail_title' => 'Breathable Side Panels',
                    ],
                ],
                'title_field' => '{{{ detail_title }}}',
            ]
        );

        $this->end_controls_section();

        // Content Tab - Call to Action
        $this->start_controls_section(
            'cta_section',
            [
                'label' => esc_html__( 'Call to Action', 'slidefire-category-widget' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'cta_button_text',
            [
                'label' => esc_html__( 'Button Text', 'slidefire-category-widget' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( 'Start Custom Design', 'slidefire-category-widget' ),
                'placeholder' => esc_html__( 'Enter button text', 'slidefire-category-widget' ),
            ]
        );

        $this->add_control(
            'cta_button_link',
            [
                'label' => esc_html__( 'Button Link', 'slidefire-category-widget' ),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => esc_html__( 'https://your-link.com', 'slidefire-category-widget' ),
                'default' => [
                    'url' => '#',
                ],
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

        $this->add_control(
            'section_background_color',
            [
                'label' => esc_html__( 'Background Color', 'slidefire-category-widget' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#000000',
                'selectors' => [
                    '{{WRAPPER}} .slidefire-product-features' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'section_padding',
            [
                'label' => esc_html__( 'Padding', 'slidefire-category-widget' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'default' => [
                    'top' => '80',
                    'right' => '20',
                    'bottom' => '80',
                    'left' => '20',
                    'unit' => 'px',
                ],
                'selectors' => [
                    '{{WRAPPER}} .slidefire-product-features' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                'name' => 'main_title_typography',
                'label' => esc_html__( 'Main Title Typography', 'slidefire-category-widget' ),
                'selector' => '{{WRAPPER}} .features-main-title',
            ]
        );

        $this->add_control(
            'main_title_color',
            [
                'label' => esc_html__( 'Main Title Color', 'slidefire-category-widget' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#ffffff',
                'selectors' => [
                    '{{WRAPPER}} .features-main-title' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'title_highlight_color',
            [
                'label' => esc_html__( 'Title Highlight Color', 'slidefire-category-widget' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#23B2EE',
                'selectors' => [
                    '{{WRAPPER}} .title-highlight' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'description_typography',
                'label' => esc_html__( 'Description Typography', 'slidefire-category-widget' ),
                'selector' => '{{WRAPPER}} .features-description',
            ]
        );

        $this->add_control(
            'description_color',
            [
                'label' => esc_html__( 'Description Color', 'slidefire-category-widget' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#888888',
                'selectors' => [
                    '{{WRAPPER}} .features-description' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();

        // Style Tab - Features
        $this->start_controls_section(
            'features_style',
            [
                'label' => esc_html__( 'Features', 'slidefire-category-widget' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'feature_icon_color',
            [
                'label' => esc_html__( 'Icon Color', 'slidefire-category-widget' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#23B2EE',
                'selectors' => [
                    '{{WRAPPER}} .feature-icon' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'feature_title_color',
            [
                'label' => esc_html__( 'Feature Title Color', 'slidefire-category-widget' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#ffffff',
                'selectors' => [
                    '{{WRAPPER}} .feature-title' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'feature_description_color',
            [
                'label' => esc_html__( 'Feature Description Color', 'slidefire-category-widget' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#888888',
                'selectors' => [
                    '{{WRAPPER}} .feature-description' => 'color: {{VALUE}};',
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
     * Render widget output on the frontend
     */
    protected function render() {
        $settings = $this->get_settings_for_display();

        // Get image URL
        $image_url = $settings['product_image']['url'] ?? 'https://via.placeholder.com/600x600';
        $image_alt = $settings['product_image_alt'] ?? 'Product Image';

        // Process title with highlight
        $title = $settings['main_title'];
        $highlight = $settings['title_highlight'];
        if ( ! empty( $highlight ) && strpos( $title, $highlight ) !== false ) {
            $title = str_replace( $highlight, '<span class="title-highlight">' . esc_html( $highlight ) . '</span>', esc_html( $title ) );
        } else {
            $title = esc_html( $title );
        }

        ?>
        <section class="slidefire-product-features">
            <div class="features-container">
                <!-- Header Section -->
                <div class="features-header">
                    <h2 class="features-main-title"><?php echo $title; ?></h2>
                    <p class="features-description"><?php echo esc_html( $settings['description_text'] ); ?></p>
                </div>

                <!-- Main Content Grid -->
                <div class="features-main-grid">
                    <!-- Product Image -->
                    <div class="features-image-section">
                        <div class="features-image-wrapper">
                            <img src="<?php echo esc_url( $image_url ); ?>" alt="<?php echo esc_attr( $image_alt ); ?>" class="features-product-image">
                            <div class="image-decoration-dot"></div>
                        </div>
                    </div>

                    <!-- Features List -->
                    <div class="features-list-section">
                        <h3 class="features-list-title"><?php echo esc_html( $settings['features_title'] ); ?></h3>
                        <div class="features-list">
                            <?php foreach ( $settings['features_list'] as $index => $feature ) : ?>
                                <div class="feature-item">
                                    <div class="feature-icon">
                                        <?php echo $this->sanitize_svg( $feature['feature_icon'] ); ?>
                                    </div>
                                    <div class="feature-content">
                                        <h4 class="feature-title"><?php echo esc_html( $feature['feature_title'] ); ?></h4>
                                        <p class="feature-description"><?php echo esc_html( $feature['feature_description'] ); ?></p>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>

                        <!-- CTA Button -->
                        <?php 
                        $cta_button_key = 'cta_button_link';
                        $this->add_link_attributes( $cta_button_key, $settings['cta_button_link'] );
                        ?>
                        <a <?php echo $this->get_render_attribute_string( $cta_button_key ); ?> class="features-cta-button">
                            <?php echo esc_html( $settings['cta_button_text'] ); ?>
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="cta-icon"><path d="M5 12h14"></path><path d="m12 5 7 7-7 7"></path></svg>
                        </a>
                    </div>
                </div>

                <!-- Detail Images Grid -->
                <?php if ( ! empty( $settings['detail_images'] ) ) : ?>
                    <div class="features-detail-images">
                        <?php foreach ( $settings['detail_images'] as $index => $detail ) : ?>
                            <div class="detail-image-card">
                                <img src="<?php echo esc_url( $detail['detail_image']['url'] ); ?>" alt="<?php echo esc_attr( $detail['detail_title'] ); ?>" class="detail-image">
                                <h5 class="detail-title"><?php echo esc_html( $detail['detail_title'] ); ?></h5>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
            </div>
        </section>
        <?php
    }

    /**
     * Render widget output in the editor
     */
    protected function content_template() {
        ?>
        <#
        var imageUrl = settings.product_image.url || 'https://via.placeholder.com/600x600';
        var imageAlt = settings.product_image_alt || 'Product Image';
        
        // Process title with highlight
        var title = settings.main_title;
        var highlight = settings.title_highlight;
        if ( highlight && title.indexOf(highlight) !== -1 ) {
            title = title.replace(highlight, '<span class="title-highlight">' + highlight + '</span>');
        }
        #>
        <section class="slidefire-product-features">
            <div class="features-container">
                <!-- Header Section -->
                <div class="features-header">
                    <h2 class="features-main-title">{{{ title }}}</h2>
                    <p class="features-description">{{{ settings.description_text }}}</p>
                </div>

                <!-- Main Content Grid -->
                <div class="features-main-grid">
                    <!-- Product Image -->
                    <div class="features-image-section">
                        <div class="features-image-wrapper">
                            <img src="{{{ imageUrl }}}" alt="{{{ imageAlt }}}" class="features-product-image">
                            <div class="image-decoration-dot"></div>
                        </div>
                    </div>

                    <!-- Features List -->
                    <div class="features-list-section">
                        <h3 class="features-list-title">{{{ settings.features_title }}}</h3>
                        <div class="features-list">
                            <# _.each( settings.features_list, function( feature, index ) { #>
                                <div class="feature-item">
                                    <div class="feature-icon">
                                        {{{ feature.feature_icon }}}
                                    </div>
                                    <div class="feature-content">
                                        <h4 class="feature-title">{{{ feature.feature_title }}}</h4>
                                        <p class="feature-description">{{{ feature.feature_description }}}</p>
                                    </div>
                                </div>
                            <# }); #>
                        </div>

                        <!-- CTA Button -->
                        <a href="{{{ settings.cta_button_link.url }}}" class="features-cta-button">
                            {{{ settings.cta_button_text }}}
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="cta-icon"><path d="M5 12h14"></path><path d="m12 5 7 7-7 7"></path></svg>
                        </a>
                    </div>
                </div>

                <!-- Detail Images Grid -->
                <# if ( settings.detail_images.length ) { #>
                    <div class="features-detail-images">
                        <# _.each( settings.detail_images, function( detail, index ) { #>
                            <div class="detail-image-card">
                                <img src="{{{ detail.detail_image.url }}}" alt="{{{ detail.detail_title }}}" class="detail-image">
                                <h5 class="detail-title">{{{ detail.detail_title }}}</h5>
                            </div>
                        <# }); #>
                    </div>
                <# } #>
            </div>
        </section>
        <?php
    }
}