<?php
/**
 * SlideFire Category Navigation Widget Class
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

class SlideFire_Category_Navigation_Widget extends \Elementor\Widget_Base {

    /**
     * Get widget name
     */
    public function get_name() {
        return 'slidefire_category_navigation';
    }

    /**
     * Get widget title
     */
    public function get_title() {
        return esc_html__( 'SlideFire Category Navigation', 'slidefire-category-widget' );
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
        return [ 'navigation', 'category', 'slidefire', 'menu', 'icons' ];
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

        // Content Tab
        $this->start_controls_section(
            'content_section',
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
                'default' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20.38 3.46 16 2a4 4 0 0 1-8 0L3.62 3.46a2 2 0 0 0-1.34 2.23l.58 3.47a1 1 0 0 0 .99.84H6v10c0 1.1.9 2 2 2h8a2 2 0 0 0 2-2V10h2.15a1 1 0 0 0 .99-.84l.58-3.47a2 2 0 0 0-1.34-2.23z"></path></svg>',
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
                        'category_icon' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-shirt"><path d="M20.38 3.46 16 2a4 4 0 0 1-8 0L3.62 3.46a2 2 0 0 0-1.34 2.23l.58 3.47a1 1 0 0 0 .99.84H6v10c0 1.1.9 2 2 2h8a2 2 0 0 0 2-2V10h2.15a1 1 0 0 0 .99-.84l.58-3.47a2 2 0 0 0-1.34-2.23z"></path></svg>',
                        'category_link' => ['url' => '#'],
                    ],
                    [
                        'category_title' => esc_html__( 'Pants', 'slidefire-category-widget' ),
                        'category_icon' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-zap"><path d="M4 14a1 1 0 0 1-.78-1.63l9.9-10.2a.5.5 0 0 1 .86.46l-1.92 6.02A1 1 0 0 0 13 10h7a1 1 0 0 1 .78 1.63l-9.9 10.2a.5.5 0 0 1-.86-.46l1.92-6.02A1 1 0 0 0 11 14z"></path></svg>',
                        'category_link' => ['url' => '#'],
                    ],
                    [
                        'category_title' => esc_html__( 'Headbands', 'slidefire-category-widget' ),
                        'category_icon' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-crown"><path d="M11.562 3.266a.5.5 0 0 1 .876 0L15.39 8.87a1 1 0 0 0 1.516.294L21.183 5.5a.5.5 0 0 1 .798.519l-2.834 10.246a1 1 0 0 1-.956.734H5.81a1 1 0 0 1-.957-.734L2.02 6.02a.5.5 0 0 1 .798-.519l4.276 3.664a1 1 0 0 0 1.516-.294z"></path><path d="M5 21h14"></path></svg>',
                        'category_link' => ['url' => '#'],
                    ],
                    [
                        'category_title' => esc_html__( 'Hoodies', 'slidefire-category-widget' ),
                        'category_icon' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-layers"><path d="M12.83 2.18a2 2 0 0 0-1.66 0L2.6 6.08a1 1 0 0 0 0 1.83l8.58 3.91a2 2 0 0 0 1.66 0l8.58-3.9a1 1 0 0 0 0-1.83z"></path><path d="M2 12a1 1 0 0 0 .58.91l8.6 3.91a2 2 0 0 0 1.65 0l8.58-3.9A1 1 0 0 0 22 12"></path><path d="M2 17a1 1 0 0 0 .58.91l8.6 3.91a2 2 0 0 0 1.65 0l8.58-3.9A1 1 0 0 0 22 17"></path></svg>',
                        'category_link' => ['url' => '#'],
                    ],
                    [
                        'category_title' => esc_html__( 'Team Apparel', 'slidefire-category-widget' ),
                        'category_icon' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-users"><path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"></path><path d="M16 3.128a4 4 0 0 1 0 7.744"></path><path d="M22 21v-2a4 4 0 0 0-3-3.87"></path><circle cx="9" cy="7" r="4"></circle></svg>',
                        'category_link' => ['url' => '#'],
                    ],
                    [
                        'category_title' => esc_html__( 'Basketball', 'slidefire-category-widget' ),
                        'category_icon' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-dribbble"><circle cx="12" cy="12" r="10"></circle><path d="M19.13 5.09C15.22 9.14 10 10.44 2.25 10.94"></path><path d="M21.75 12.84c-6.62-1.41-12.14 1-16.38 6.32"></path><path d="M8.56 2.75c4.37 6 6 9.42 8 17.72"></path></svg>',
                        'category_link' => ['url' => '#'],
                        'is_coming_soon' => 'yes',
                        'coming_soon_text' => 'Coming Soon',
                    ],
                    [
                        'category_title' => esc_html__( 'Soccer', 'slidefire-category-widget' ),
                        'category_icon' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-trophy"><path d="M10 14.66v1.626a2 2 0 0 1-.976 1.696A5 5 0 0 0 7 21.978"></path><path d="M14 14.66v1.626a2 2 0 0 0 .976 1.696A5 5 0 0 1 17 21.978"></path><path d="M18 9h1.5a1 1 0 0 0 0-5H18"></path><path d="M4 22h16"></path><path d="M6 9a6 6 0 0 0 12 0V3a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1z"></path><path d="M6 9H4.5a1 1 0 0 1 0-5H6"></path></svg>',
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
                'default' => '#1a1a1a',
                'selectors' => [
                    '{{WRAPPER}} .slidefire-category-navigation' => 'background-color: {{VALUE}};',
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
                    '{{WRAPPER}} .slidefire-category-navigation' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    '{{WRAPPER}} .category-icon-wrapper' => 'background-color: {{VALUE}};',
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
                    '{{WRAPPER}} .category-icon-wrapper' => 'border-color: {{VALUE}};',
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
                    '{{WRAPPER}} .category-item:hover .category-title' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .category-item:hover .category-icon-wrapper' => 'border-color: {{VALUE}}50; background-color: {{VALUE}}1a;',
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
                'selector' => '{{WRAPPER}} .category-title',
            ]
        );

        $this->add_control(
            'title_color',
            [
                'label' => esc_html__( 'Title Color', 'slidefire-category-widget' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#ffffff',
                'selectors' => [
                    '{{WRAPPER}} .category-title' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();
    }

    /**
     * Sanitize SVG content for safe output
     */
    private function sanitize_svg( $svg ) {
        // First, ensure the SVG has proper classes
        $svg = $this->add_svg_classes( $svg );
        
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
     * Add proper CSS classes to SVG elements
     */
    private function add_svg_classes( $svg ) {
        // Add the mobile/desktop responsive classes if not present
        if ( strpos( $svg, 'h-8 w-8 md:h-10 md:w-10' ) === false ) {
            $svg = str_replace(
                '<svg',
                '<svg class="h-8 w-8 md:h-10 md:w-10"',
                $svg
            );
        }

        // Ensure aria-hidden is set for accessibility
        if ( strpos( $svg, 'aria-hidden' ) === false ) {
            $svg = str_replace(
                '<svg',
                '<svg aria-hidden="true"',
                $svg
            );
        }

        return $svg;
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
        <section class="slidefire-category-navigation border-b border-border/50 bg-secondary/20 py-8">
            <div class="container mx-auto px-0 md:px-4">
                <div class="overflow-x-auto scrollbar-hide">
                    <div class="category-items-wrapper flex items-center justify-start md:justify-center space-x-8 md:space-x-12 min-w-max px-4 md:px-0">
                        <?php foreach ( $settings['categories'] as $index => $item ) : ?>
                            <?php
                            $link_key = 'link_' . $index;
                            $this->add_link_attributes( $link_key, $item['category_link'] );
                            
                            $is_coming_soon = $item['is_coming_soon'] === 'yes';
                            $button_class = 'category-item group flex flex-col items-center space-y-3 transition-all duration-300 relative';
                            
                            if ( $is_coming_soon ) {
                                $button_class .= ' opacity-75 hover:opacity-90 coming-soon-item';
                            } else {
                                $button_class .= ' hover:text-primary';
                            }
                            ?>
                            <a <?php echo $this->get_render_attribute_string( $link_key ); ?> class="<?php echo esc_attr( $button_class ); ?>">
                                <div class="category-icon-wrapper p-4 rounded-xl bg-card border border-border transition-all duration-300 shadow-lg group-hover:scale-105">
                                    <div class="category-icon h-8 w-8 md:h-10 md:w-10">
                                        <?php echo $this->sanitize_svg( $item['category_icon'] ); ?>
                                    </div>
                                </div>
                                <div class="flex flex-col items-center space-y-1">
                                    <span class="category-title text-sm md:text-base font-medium uppercase tracking-wide transition-colors">
                                        <?php echo esc_html( $item['category_title'] ); ?>
                                    </span>
                                    <?php if ( $is_coming_soon && ! empty( $item['coming_soon_text'] ) ) : ?>
                                        <span class="coming-soon-badge inline-flex items-center justify-center rounded-md border font-medium w-fit whitespace-nowrap shrink-0 gap-1 focus-visible:border-ring focus-visible:ring-ring/50 focus-visible:ring-[3px] border-transparent bg-red-500 text-white text-xs px-2 py-1">
                                            <?php echo esc_html( $item['coming_soon_text'] ); ?>
                                        </span>
                                    <?php endif; ?>
                                </div>
                            </a>
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
        <section class="slidefire-category-navigation border-b border-border/50 bg-secondary/20 py-8">
            <div class="container mx-auto px-0 md:px-4">
                <div class="overflow-x-auto scrollbar-hide">
                    <div class="category-items-wrapper flex items-center justify-start md:justify-center space-x-8 md:space-x-12 min-w-max px-4 md:px-0">
                        <# _.each( settings.categories, function( item, index ) {
                            var isComingSoon = item.is_coming_soon === 'yes';
                            var buttonClass = 'category-item group flex flex-col items-center space-y-3 transition-all duration-300 relative';
                            
                            if ( isComingSoon ) {
                                buttonClass += ' opacity-75 hover:opacity-90 coming-soon-item';
                            } else {
                                buttonClass += ' hover:text-primary';
                            }
                        #>
                            <a href="{{{ item.category_link.url }}}" class="{{{ buttonClass }}}">
                                <div class="category-icon-wrapper p-4 rounded-xl bg-card border border-border transition-all duration-300 shadow-lg group-hover:scale-105">
                                    <div class="category-icon h-8 w-8 md:h-10 md:w-10">
                                        {{{ item.category_icon }}}
                                    </div>
                                </div>
                                <div class="flex flex-col items-center space-y-1">
                                    <span class="category-title text-sm md:text-base font-medium uppercase tracking-wide transition-colors">
                                        {{{ item.category_title }}}
                                    </span>
                                    <# if ( isComingSoon && item.coming_soon_text ) { #>
                                        <span class="coming-soon-badge inline-flex items-center justify-center rounded-md border font-medium w-fit whitespace-nowrap shrink-0 gap-1 focus-visible:border-ring focus-visible:ring-ring/50 focus-visible:ring-[3px] border-transparent bg-red-500 text-white text-xs px-2 py-1">
                                            {{{ item.coming_soon_text }}}
                                        </span>
                                    <# } #>
                                </div>
                            </a>
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