<?php
/**
 * SlideFire Category Nav Widget Class
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

class SlideFire_Category_Nav_Widget extends \Elementor\Widget_Base {

    /**
     * Get widget name
     */
    public function get_name() {
        return 'slidefire_category_nav';
    }

    /**
     * Get widget title
     */
    public function get_title() {
        return esc_html__( 'SlideFire Category Nav', 'slidefire-category-widget' );
    }

    /**
     * Get widget icon
     */
    public function get_icon() {
        return 'eicon-navigation-horizontal';
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
        return [ 'navigation', 'category', 'slidefire', 'menu', 'icons', 'nav' ];
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

        // Content Tab - Categories Section
        $this->start_controls_section(
            'categories_content_section',
            [
                'label' => esc_html__( 'Categories', 'slidefire-category-widget' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        // Repeater for categories
        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'category_title',
            [
                'label' => esc_html__( 'Title', 'slidefire-category-widget' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( 'Category', 'slidefire-category-widget' ),
                'placeholder' => esc_html__( 'Enter category title', 'slidefire-category-widget' ),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'category_icon',
            [
                'label' => esc_html__( 'Icon SVG', 'slidefire-category-widget' ),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-shirt" aria-hidden="true"><path d="M20.38 3.46 16 2a4 4 0 0 1-8 0L3.62 3.46a2 2 0 0 0-1.34 2.23l.58 3.47a1 1 0 0 0 .99.84H6v10c0 1.1.9 2 2 2h8a2 2 0 0 0 2-2V10h2.15a1 1 0 0 0 .99-.84l.58-3.47a2 2 0 0 0-1.34-2.23z"></path></svg>',
                'placeholder' => esc_html__( 'Enter SVG icon code', 'slidefire-category-widget' ),
                'rows' => 5,
            ]
        );

        $repeater->add_control(
            'category_link',
            [
                'label' => esc_html__( 'Link', 'slidefire-category-widget' ),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => esc_html__( 'https://your-link.com', 'slidefire-category-widget' ),
                'default' => [
                    'url' => '#',
                ],
            ]
        );

        $repeater->add_control(
            'is_coming_soon',
            [
                'label' => esc_html__( 'Coming Soon Badge', 'slidefire-category-widget' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__( 'Show', 'slidefire-category-widget' ),
                'label_off' => esc_html__( 'Hide', 'slidefire-category-widget' ),
                'return_value' => 'yes',
                'default' => '',
            ]
        );

        $repeater->add_control(
            'coming_soon_text',
            [
                'label' => esc_html__( 'Coming Soon Text', 'slidefire-category-widget' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( 'Coming Soon', 'slidefire-category-widget' ),
                'condition' => [
                    'is_coming_soon' => 'yes',
                ],
            ]
        );

        $this->add_control(
            'categories',
            [
                'label' => esc_html__( 'Categories', 'slidefire-category-widget' ),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'category_title' => esc_html__( 'Jerseys', 'slidefire-category-widget' ),
                        'category_icon' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-shirt" aria-hidden="true"><path d="M20.38 3.46 16 2a4 4 0 0 1-8 0L3.62 3.46a2 2 0 0 0-1.34 2.23l.58 3.47a1 1 0 0 0 .99.84H6v10c0 1.1.9 2 2 2h8a2 2 0 0 0 2-2V10h2.15a1 1 0 0 0 .99-.84l.58-3.47a2 2 0 0 0-1.34-2.23z"></path></svg>',
                        'category_link' => ['url' => '#'],
                    ],
                    [
                        'category_title' => esc_html__( 'Pants', 'slidefire-category-widget' ),
                        'category_icon' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-zap" aria-hidden="true"><path d="M4 14a1 1 0 0 1-.78-1.63l9.9-10.2a.5.5 0 0 1 .86.46l-1.92 6.02A1 1 0 0 0 13 10h7a1 1 0 0 1 .78 1.63l-9.9 10.2a.5.5 0 0 1-.86-.46l1.92-6.02A1 1 0 0 0 11 14z"></path></svg>',
                        'category_link' => ['url' => '#'],
                    ],
                    [
                        'category_title' => esc_html__( 'Headbands', 'slidefire-category-widget' ),
                        'category_icon' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-crown" aria-hidden="true"><path d="M11.562 3.266a.5.5 0 0 1 .876 0L15.39 8.87a1 1 0 0 0 1.516.294L21.183 5.5a.5.5 0 0 1 .798.519l-2.834 10.246a1 1 0 0 1-.956.734H5.81a1 1 0 0 1-.957-.734L2.02 6.02a.5.5 0 0 1 .798-.519l4.276 3.664a1 1 0 0 0 1.516-.294z"></path><path d="M5 21h14"></path></svg>',
                        'category_link' => ['url' => '#'],
                    ],
                    [
                        'category_title' => esc_html__( 'Hoodies', 'slidefire-category-widget' ),
                        'category_icon' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-layers" aria-hidden="true"><path d="M12.83 2.18a2 2 0 0 0-1.66 0L2.6 6.08a1 1 0 0 0 0 1.83l8.58 3.91a2 2 0 0 0 1.66 0l8.58-3.9a1 1 0 0 0 0-1.83z"></path><path d="M2 12a1 1 0 0 0 .58.91l8.6 3.91a2 2 0 0 0 1.65 0l8.58-3.9A1 1 0 0 0 22 12"></path><path d="M2 17a1 1 0 0 0 .58.91l8.6 3.91a2 2 0 0 0 1.65 0l8.58-3.9A1 1 0 0 0 22 17"></path></svg>',
                        'category_link' => ['url' => '#'],
                    ],
                    [
                        'category_title' => esc_html__( 'Team Apparel', 'slidefire-category-widget' ),
                        'category_icon' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-users" aria-hidden="true"><path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"></path><path d="M16 3.128a4 4 0 0 1 0 7.744"></path><path d="M22 21v-2a4 4 0 0 0-3-3.87"></path><circle cx="9" cy="7" r="4"></circle></svg>',
                        'category_link' => ['url' => '#'],
                    ],
                    [
                        'category_title' => esc_html__( 'Basketball', 'slidefire-category-widget' ),
                        'category_icon' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-dribbble" aria-hidden="true"><circle cx="12" cy="12" r="10"></circle><path d="M19.13 5.09C15.22 9.14 10 10.44 2.25 10.94"></path><path d="M21.75 12.84c-6.62-1.41-12.14 1-16.38 6.32"></path><path d="M8.56 2.75c4.37 6 6 9.42 8 17.72"></path></svg>',
                        'category_link' => ['url' => '#'],
                        'is_coming_soon' => 'yes',
                        'coming_soon_text' => 'Coming Soon',
                    ],
                    [
                        'category_title' => esc_html__( 'Soccer', 'slidefire-category-widget' ),
                        'category_icon' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-trophy" aria-hidden="true"><path d="M10 14.66v1.626a2 2 0 0 1-.976 1.696A5 5 0 0 0 7 21.978"></path><path d="M14 14.66v1.626a2 2 0 0 0 .976 1.696A5 5 0 0 1 17 21.978"></path><path d="M18 9h1.5a1 1 0 0 0 0-5H18"></path><path d="M4 22h16"></path><path d="M6 9a6 6 0 0 0 12 0V3a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1z"></path><path d="M6 9H4.5a1 1 0 0 1 0-5H6"></path></svg>',
                        'category_link' => ['url' => '#'],
                        'is_coming_soon' => 'yes',
                        'coming_soon_text' => 'Coming Soon',
                    ],
                ],
                'title_field' => '{{{ category_title }}}',
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
                'default' => 'rgba(26, 26, 26, 0.2)',
                'selectors' => [
                    '{{WRAPPER}} .slidefire-category-nav' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'section_border_color',
            [
                'label' => esc_html__( 'Border Color', 'slidefire-category-widget' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => 'rgba(51, 51, 51, 0.5)',
                'selectors' => [
                    '{{WRAPPER}} .slidefire-category-nav' => 'border-bottom-color: {{VALUE}};',
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
                    'top' => '32',
                    'right' => '0',
                    'bottom' => '32',
                    'left' => '0',
                    'unit' => 'px',
                ],
                'selectors' => [
                    '{{WRAPPER}} .slidefire-category-nav' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();

        // Style Tab - Card Styles
        $this->start_controls_section(
            'card_style',
            [
                'label' => esc_html__( 'Cards', 'slidefire-category-widget' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'card_background_color',
            [
                'label' => esc_html__( 'Background Color', 'slidefire-category-widget' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#111111',
                'selectors' => [
                    '{{WRAPPER}} .category-nav-icon-wrapper' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'card_border_color',
            [
                'label' => esc_html__( 'Border Color', 'slidefire-category-widget' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#333333',
                'selectors' => [
                    '{{WRAPPER}} .category-nav-icon-wrapper' => 'border-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'primary_color',
            [
                'label' => esc_html__( 'Primary Color', 'slidefire-category-widget' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#23B2EE',
                'selectors' => [
                    '{{WRAPPER}} .category-nav-item:hover .category-nav-title' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .category-nav-item:hover .category-nav-icon-wrapper' => 'border-color: {{VALUE}}50; background-color: {{VALUE}}1a;',
                ],
            ]
        );

        $this->add_control(
            'coming_soon_color',
            [
                'label' => esc_html__( 'Coming Soon Color', 'slidefire-category-widget' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#ef4444',
                'selectors' => [
                    '{{WRAPPER}} .category-nav-item.coming-soon:hover .category-nav-title' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .category-nav-item.coming-soon:hover .category-nav-icon-wrapper' => 'border-color: {{VALUE}}80; background-color: {{VALUE}}1a;',
                    '{{WRAPPER}} .coming-soon-badge' => 'background-color: {{VALUE}};',
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
                'name' => 'title_typography',
                'label' => esc_html__( 'Title Typography', 'slidefire-category-widget' ),
                'selector' => '{{WRAPPER}} .category-nav-title',
            ]
        );

        $this->add_control(
            'title_color',
            [
                'label' => esc_html__( 'Title Color', 'slidefire-category-widget' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#ffffff',
                'selectors' => [
                    '{{WRAPPER}} .category-nav-title' => 'color: {{VALUE}};',
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

        if ( empty( $settings['categories'] ) ) {
            return;
        }

        ?>
        <section class="slidefire-category-nav">
            <div class="category-nav-container">
                <div class="category-nav-scroll-wrapper">
                    <div class="category-nav-items">
                        <?php foreach ( $settings['categories'] as $index => $item ) : ?>
                            <?php
                            $link_key = 'link_' . $index;
                            $this->add_link_attributes( $link_key, $item['category_link'] );
                            
                            $is_coming_soon = $item['is_coming_soon'] === 'yes';
                            $button_class = 'category-nav-item';
                            
                            if ( $is_coming_soon ) {
                                $button_class .= ' coming-soon';
                            }
                            ?>
                            <button class="<?php echo esc_attr( $button_class ); ?>" onclick="window.location.href='<?php echo esc_url( $item['category_link']['url'] ); ?>'">
                                <div class="category-nav-icon-wrapper">
                                    <?php echo $this->sanitize_svg( $item['category_icon'] ); ?>
                                </div>
                                <div class="category-nav-content">
                                    <span class="category-nav-title"><?php echo esc_html( $item['category_title'] ); ?></span>
                                    <?php if ( $is_coming_soon && ! empty( $item['coming_soon_text'] ) ) : ?>
                                        <span class="coming-soon-badge">
                                            <?php echo esc_html( $item['coming_soon_text'] ); ?>
                                        </span>
                                    <?php endif; ?>
                                </div>
                            </button>
                        <?php endforeach; ?>
                    </div>
                </div>
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
        if ( settings.categories.length ) {
        #>
        <section class="slidefire-category-nav">
            <div class="category-nav-container">
                <div class="category-nav-scroll-wrapper">
                    <div class="category-nav-items">
                        <# _.each( settings.categories, function( item, index ) {
                            var isComingSoon = item.is_coming_soon === 'yes';
                            var buttonClass = 'category-nav-item';
                            
                            if ( isComingSoon ) {
                                buttonClass += ' coming-soon';
                            }
                        #>
                            <button class="{{{ buttonClass }}}">
                                <div class="category-nav-icon-wrapper">
                                    {{{ item.category_icon }}}
                                </div>
                                <div class="category-nav-content">
                                    <span class="category-nav-title">{{{ item.category_title }}}</span>
                                    <# if ( isComingSoon && item.coming_soon_text ) { #>
                                        <span class="coming-soon-badge">
                                            {{{ item.coming_soon_text }}}
                                        </span>
                                    <# } #>
                                </div>
                            </button>
                        <# }); #>
                    </div>
                </div>
            </div>
        </section>
        <#
        }
        #>
        <?php
    }
}
