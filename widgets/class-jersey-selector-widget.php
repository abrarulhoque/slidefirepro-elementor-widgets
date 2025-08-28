<?php
/**
 * SlideFire Jersey Selector Widget Class
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

class SlideFire_Jersey_Selector_Widget extends \Elementor\Widget_Base {

    /**
     * Get widget name
     */
    public function get_name() {
        return 'slidefire_jersey_selector';
    }

    /**
     * Get widget title
     */
    public function get_title() {
        return esc_html__( 'SlideFire Jersey Selector', 'slidefire-jersey-widget' );
    }

    /**
     * Get widget icon
     */
    public function get_icon() {
        return 'eicon-products';
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
        return [ 'jersey', 'selector', 'slidefire', 'product', 'comparison', 'type' ];
    }

    /**
     * Get style dependencies
     */
    public function get_style_depends() {
        return [ 'slidefire-jersey-widget' ];
    }

    /**
     * Get script dependencies
     */
    public function get_script_depends() {
        return [ 'slidefire-jersey-widget' ];
    }

    /**
     * Register widget controls
     */
    protected function register_controls() {

        // Content Tab - Header Section
        $this->start_controls_section(
            'header_section',
            [
                'label' => esc_html__( 'Header', 'slidefire-jersey-widget' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'jersey_main_title',
            [
                'label' => esc_html__( 'Jersey Section Title', 'slidefire-jersey-widget' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => 'Choose Your',
                'label_block' => true,
            ]
        );

        $this->add_control(
            'jersey_highlight_title',
            [
                'label' => esc_html__( 'Jersey Highlight Title', 'slidefire-jersey-widget' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => ' Jersey Type',
                'label_block' => true,
            ]
        );

        $this->add_control(
            'jersey_subtitle',
            [
                'label' => esc_html__( 'Jersey Subtitle', 'slidefire-jersey-widget' ),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => 'Compare our jersey options to find the perfect fit for your team\'s needs and budget',
                'label_block' => true,
            ]
        );

        $this->add_control(
            'pants_main_title',
            [
                'label' => esc_html__( 'Pants Section Title', 'slidefire-jersey-widget' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => 'Choose Your',
                'label_block' => true,
            ]
        );

        $this->add_control(
            'pants_highlight_title',
            [
                'label' => esc_html__( 'Pants Highlight Title', 'slidefire-jersey-widget' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => ' Pants Type',
                'label_block' => true,
            ]
        );

        $this->add_control(
            'pants_subtitle',
            [
                'label' => esc_html__( 'Pants Subtitle', 'slidefire-jersey-widget' ),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => 'Complete your tactical loadout with our professional-grade tactical pants',
                'label_block' => true,
            ]
        );

        $this->end_controls_section();

        // Content Tab - Jerseys
        $this->start_controls_section(
            'jerseys_section',
            [
                'label' => esc_html__( 'Jerseys', 'slidefire-jersey-widget' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        // Repeater for jerseys
        $jersey_repeater = new \Elementor\Repeater();

        $jersey_repeater->add_control(
            'jersey_title',
            [
                'label' => esc_html__( 'Jersey Title', 'slidefire-jersey-widget' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => 'Jersey Name',
                'label_block' => true,
            ]
        );

        $jersey_repeater->add_control(
            'jersey_subtitle',
            [
                'label' => esc_html__( 'Jersey Subtitle', 'slidefire-jersey-widget' ),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => 'Jersey description',
                'label_block' => true,
            ]
        );

        $jersey_repeater->add_control(
            'jersey_image',
            [
                'label' => esc_html__( 'Jersey Image', 'slidefire-jersey-widget' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => '',
                ],
            ]
        );

        $jersey_repeater->add_control(
            'is_most_popular',
            [
                'label' => esc_html__( 'Most Popular Badge', 'slidefire-jersey-widget' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__( 'Show', 'slidefire-jersey-widget' ),
                'label_off' => esc_html__( 'Hide', 'slidefire-jersey-widget' ),
                'return_value' => 'yes',
                'default' => '',
            ]
        );

        $jersey_repeater->add_control(
            'jersey_features_heading',
            [
                'label' => esc_html__( 'Features', 'slidefire-jersey-widget' ),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        // Jersey Features Repeater
        $jersey_repeater->add_control(
            'jersey_features',
            [
                'label' => esc_html__( 'Jersey Features', 'slidefire-jersey-widget' ),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => [
                    [
                        'name' => 'feature_name',
                        'label' => esc_html__( 'Feature Name', 'slidefire-jersey-widget' ),
                        'type' => \Elementor\Controls_Manager::TEXT,
                        'default' => 'Feature Name',
                    ],
                    [
                        'name' => 'feature_value',
                        'label' => esc_html__( 'Feature Value', 'slidefire-jersey-widget' ),
                        'type' => \Elementor\Controls_Manager::TEXT,
                        'default' => 'YES',
                    ],
                    [
                        'name' => 'has_feature',
                        'label' => esc_html__( 'Has Feature', 'slidefire-jersey-widget' ),
                        'type' => \Elementor\Controls_Manager::SWITCHER,
                        'label_on' => esc_html__( 'Yes', 'slidefire-jersey-widget' ),
                        'label_off' => esc_html__( 'No', 'slidefire-jersey-widget' ),
                        'return_value' => 'yes',
                        'default' => 'yes',
                    ],
                ],
                'default' => [
                    [
                        'feature_name' => 'Chest Padding',
                        'feature_value' => 'NONE',
                        'has_feature' => '',
                    ],
                    [
                        'feature_name' => 'Shoulder Padding', 
                        'feature_value' => 'NONE',
                        'has_feature' => '',
                    ],
                ],
                'title_field' => '{{{ feature_name }}}',
            ]
        );

        $jersey_repeater->add_control(
            'jersey_perfect_for',
            [
                'label' => esc_html__( 'Perfect For', 'slidefire-jersey-widget' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => 'No Padding • Custom Armor • Ultra Light',
                'label_block' => true,
            ]
        );

        $this->add_control(
            'jerseys',
            [
                'label' => esc_html__( 'Jerseys', 'slidefire-jersey-widget' ),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $jersey_repeater->get_controls(),
                'default' => [
                    [
                        'jersey_title' => 'Alpha Series Jersey',
                        'jersey_subtitle' => 'Players who don\'t need any form of inbuilt padding or are running their own armor',
                        'jersey_perfect_for' => 'No Padding • Custom Armor • Ultra Light',
                    ],
                    [
                        'jersey_title' => 'Pro Light Jersey',
                        'jersey_subtitle' => 'Players who want maximum breathability with light protection.',
                        'is_most_popular' => 'yes',
                        'jersey_perfect_for' => 'Speedsoft • Agility Focused • Maximum Mobility',
                    ],
                    [
                        'jersey_title' => 'Juggernaut Jersey',
                        'jersey_subtitle' => 'Players who want maximum durability with a neoprene chest plate',
                        'jersey_perfect_for' => 'Maximum Protection • Heavy Duty • Tank Mode',
                    ],
                ],
                'title_field' => '{{{ jersey_title }}}',
            ]
        );

        $this->end_controls_section();

        // Content Tab - Pants
        $this->start_controls_section(
            'pants_section',
            [
                'label' => esc_html__( 'Pants', 'slidefire-jersey-widget' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        // Repeater for pants
        $pants_repeater = new \Elementor\Repeater();

        $pants_repeater->add_control(
            'pants_title',
            [
                'label' => esc_html__( 'Pants Title', 'slidefire-jersey-widget' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => 'Pants Name',
                'label_block' => true,
            ]
        );

        $pants_repeater->add_control(
            'pants_subtitle',
            [
                'label' => esc_html__( 'Pants Subtitle', 'slidefire-jersey-widget' ),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => 'Pants description',
                'label_block' => true,
            ]
        );

        $pants_repeater->add_control(
            'pants_image',
            [
                'label' => esc_html__( 'Pants Image', 'slidefire-jersey-widget' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => '',
                ],
            ]
        );

        $pants_repeater->add_control(
            'pants_is_most_popular',
            [
                'label' => esc_html__( 'Most Popular Badge', 'slidefire-jersey-widget' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__( 'Show', 'slidefire-jersey-widget' ),
                'label_off' => esc_html__( 'Hide', 'slidefire-jersey-widget' ),
                'return_value' => 'yes',
                'default' => '',
            ]
        );

        $pants_repeater->add_control(
            'pants_features_heading',
            [
                'label' => esc_html__( 'Features', 'slidefire-jersey-widget' ),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        // Pants Features Repeater
        $pants_repeater->add_control(
            'pants_features',
            [
                'label' => esc_html__( 'Pants Features', 'slidefire-jersey-widget' ),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => [
                    [
                        'name' => 'feature_name',
                        'label' => esc_html__( 'Feature Name', 'slidefire-jersey-widget' ),
                        'type' => \Elementor\Controls_Manager::TEXT,
                        'default' => 'Feature Name',
                    ],
                    [
                        'name' => 'feature_value',
                        'label' => esc_html__( 'Feature Value', 'slidefire-jersey-widget' ),
                        'type' => \Elementor\Controls_Manager::TEXT,
                        'default' => 'YES',
                    ],
                    [
                        'name' => 'has_feature',
                        'label' => esc_html__( 'Has Feature', 'slidefire-jersey-widget' ),
                        'type' => \Elementor\Controls_Manager::SWITCHER,
                        'label_on' => esc_html__( 'Yes', 'slidefire-jersey-widget' ),
                        'label_off' => esc_html__( 'No', 'slidefire-jersey-widget' ),
                        'return_value' => 'yes',
                        'default' => 'yes',
                    ],
                ],
                'default' => [
                    [
                        'feature_name' => 'Crotch Padding',
                        'feature_value' => 'NONE',
                        'has_feature' => '',
                    ],
                    [
                        'feature_name' => 'Rear and Thigh Padding',
                        'feature_value' => 'NONE',
                        'has_feature' => '',
                    ],
                ],
                'title_field' => '{{{ feature_name }}}',
            ]
        );

        $pants_repeater->add_control(
            'pants_perfect_for',
            [
                'label' => esc_html__( 'Perfect For', 'slidefire-jersey-widget' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => 'Ultra Light • Maximum Mobility • Speed Focused',
                'label_block' => true,
            ]
        );

        $this->add_control(
            'pants',
            [
                'label' => esc_html__( 'Pants', 'slidefire-jersey-widget' ),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $pants_repeater->get_controls(),
                'default' => [
                    [
                        'pants_title' => 'Pro Light Pants',
                        'pants_subtitle' => 'Lightweight tactical pants with minimal padding for maximum mobility',
                        'pants_is_most_popular' => 'yes',
                        'pants_perfect_for' => 'Ultra Light • Maximum Mobility • Speed Focused',
                    ],
                    [
                        'pants_title' => 'Juggernaut Pants',
                        'pants_subtitle' => 'Maximum protection tactical pants with comprehensive padding system',
                        'pants_perfect_for' => 'Full Protection • Heavy Duty • Maximum Coverage',
                    ],
                ],
                'title_field' => '{{{ pants_title }}}',
            ]
        );

        $this->end_controls_section();

        // Content Tab - CTA Section
        $this->start_controls_section(
            'cta_section',
            [
                'label' => esc_html__( 'Call to Action', 'slidefire-jersey-widget' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'cta_title',
            [
                'label' => esc_html__( 'CTA Title', 'slidefire-jersey-widget' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => 'Ready to Design Your Custom Gear?',
                'label_block' => true,
            ]
        );

        $this->add_control(
            'cta_subtitle',
            [
                'label' => esc_html__( 'CTA Subtitle', 'slidefire-jersey-widget' ),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => 'All jerseys and pants include free team setup and basic customization. Work with our design team to create the perfect look for your team.',
                'label_block' => true,
            ]
        );

        $this->add_control(
            'cta_button_text',
            [
                'label' => esc_html__( 'Button Text', 'slidefire-jersey-widget' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => 'Start Custom Design Process',
                'label_block' => true,
            ]
        );

        $this->add_control(
            'cta_button_link',
            [
                'label' => esc_html__( 'Button Link', 'slidefire-jersey-widget' ),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => esc_html__( 'https://your-link.com', 'slidefire-jersey-widget' ),
                'default' => [
                    'url' => '#',
                ],
            ]
        );

        $this->add_control(
            'cta_features',
            [
                'label' => esc_html__( 'CTA Features', 'slidefire-jersey-widget' ),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => [
                    [
                        'name' => 'feature_text',
                        'label' => esc_html__( 'Feature Text', 'slidefire-jersey-widget' ),
                        'type' => \Elementor\Controls_Manager::TEXT,
                        'default' => 'Feature',
                    ],
                ],
                'default' => [
                    ['feature_text' => '2-3 week turnaround'],
                    ['feature_text' => 'Custom Team Artwork'],
                    ['feature_text' => 'Satisfaction guaranteed'],
                ],
                'title_field' => '{{{ feature_text }}}',
            ]
        );

        $this->end_controls_section();

        // Style Tab - Section Styles
        $this->start_controls_section(
            'section_style',
            [
                'label' => esc_html__( 'Section', 'slidefire-jersey-widget' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'section_background_color',
            [
                'label' => esc_html__( 'Background Color', 'slidefire-jersey-widget' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .slidefire-jersey-selector' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'section_padding',
            [
                'label' => esc_html__( 'Padding', 'slidefire-jersey-widget' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'default' => [
                    'top' => '80',
                    'right' => '0',
                    'bottom' => '80',
                    'left' => '0',
                    'unit' => 'px',
                ],
                'selectors' => [
                    '{{WRAPPER}} .slidefire-jersey-selector' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();

        // Style Tab - Typography
        $this->start_controls_section(
            'typography_style',
            [
                'label' => esc_html__( 'Typography', 'slidefire-jersey-widget' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'main_title_typography',
                'label' => esc_html__( 'Main Title Typography', 'slidefire-jersey-widget' ),
                'selector' => '{{WRAPPER}} .jersey-selector-main-title',
            ]
        );

        $this->add_control(
            'main_title_color',
            [
                'label' => esc_html__( 'Main Title Color', 'slidefire-jersey-widget' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#ffffff',
                'selectors' => [
                    '{{WRAPPER}} .jersey-selector-main-title' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'highlight_color',
            [
                'label' => esc_html__( 'Highlight Color', 'slidefire-jersey-widget' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#23B2EE',
                'selectors' => [
                    '{{WRAPPER}} .jersey-selector-highlight' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();
    }

    /**
     * Render widget output on the frontend
     */
    protected function render() {
        $settings = $this->get_settings_for_display();
        ?>
        <section class="slidefire-jersey-selector py-20 bg-secondary/20">
            <div class="container mx-auto px-4">
                
                <!-- Jerseys Section -->
                <div class="mb-20">
                    <div class="text-center mb-16">
                        <h2 class="jersey-selector-main-title text-4xl md:text-5xl font-bold mb-4">
                            <?php echo esc_html( $settings['jersey_main_title'] ); ?>
                            <span class="jersey-selector-highlight bg-gradient-to-r from-primary to-blue-400 bg-clip-text text-transparent">
                                <?php echo esc_html( $settings['jersey_highlight_title'] ); ?>
                            </span>
                        </h2>
                        <p class="text-xl text-muted-foreground max-w-2xl mx-auto">
                            <?php echo esc_html( $settings['jersey_subtitle'] ); ?>
                        </p>
                    </div>
                    
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-8 max-w-6xl mx-auto">
                        <?php foreach ( $settings['jerseys'] as $jersey ) : ?>
                            <div class="flex flex-col items-center">
                                <div class="w-32 h-40 mb-4 rounded-lg overflow-hidden border border-border">
                                    <?php if ( ! empty( $jersey['jersey_image']['url'] ) ) : ?>
                                        <img src="<?php echo esc_url( $jersey['jersey_image']['url'] ); ?>" 
                                             alt="<?php echo esc_attr( $jersey['jersey_title'] ); ?>" 
                                             class="w-full h-full object-cover">
                                    <?php endif; ?>
                                </div>
                                
                                <div class="jersey-card bg-card border border-border rounded-xl p-6 w-full transition-all duration-300 hover:shadow-xl relative <?php echo $jersey['is_most_popular'] === 'yes' ? 'border-primary shadow-lg scale-105' : 'border-muted'; ?>">
                                    
                                    <?php if ( $jersey['is_most_popular'] === 'yes' ) : ?>
                                        <span class="absolute -top-3 left-1/2 transform -translate-x-1/2 bg-primary text-primary-foreground px-3 py-1 rounded-md text-xs font-medium">
                                            Most Popular
                                        </span>
                                    <?php endif; ?>
                                    
                                    <div class="text-center mb-6">
                                        <h3 class="text-2xl font-bold mb-2 text-foreground"><?php echo esc_html( $jersey['jersey_title'] ); ?></h3>
                                        <p class="text-sm text-muted-foreground"><?php echo esc_html( $jersey['jersey_subtitle'] ); ?></p>
                                    </div>
                                    
                                    <div class="space-y-4">
                                        <?php if ( ! empty( $jersey['jersey_features'] ) ) : ?>
                                            <?php foreach ( $jersey['jersey_features'] as $feature ) : ?>
                                                <div class="flex items-center justify-between space-x-3">
                                                    <div class="flex items-center space-x-3">
                                                        <?php if ( $feature['has_feature'] === 'yes' ) : ?>
                                                            <svg class="h-5 w-5 text-primary flex-shrink-0" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                                <path d="M20 6 9 17l-5-5"></path>
                                                            </svg>
                                                            <span class="text-sm text-foreground"><?php echo esc_html( $feature['feature_name'] ); ?></span>
                                                        <?php else : ?>
                                                            <svg class="h-5 w-5 text-muted-foreground flex-shrink-0" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                                <path d="M18 6 6 18"></path>
                                                                <path d="m6 6 12 12"></path>
                                                            </svg>
                                                            <span class="text-sm text-muted-foreground"><?php echo esc_html( $feature['feature_name'] ); ?></span>
                                                        <?php endif; ?>
                                                    </div>
                                                    <span class="text-xs font-semibold text-primary bg-primary/10 px-2 py-1 rounded">
                                                        <?php echo esc_html( $feature['feature_value'] ); ?>
                                                    </span>
                                                </div>
                                            <?php endforeach; ?>
                                        <?php endif; ?>
                                    </div>
                                    
                                    <div class="mt-8 pt-6 border-t border-border">
                                        <div class="text-center">
                                            <div class="text-sm text-muted-foreground mb-2">Perfect for:</div>
                                            <div class="text-sm font-medium text-foreground"><?php echo esc_html( $jersey['jersey_perfect_for'] ); ?></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
                
                <!-- Pants Section -->
                <div class="mb-20">
                    <div class="text-center mb-16">
                        <h2 class="jersey-selector-main-title text-4xl md:text-5xl font-bold mb-4">
                            <?php echo esc_html( $settings['pants_main_title'] ); ?>
                            <span class="jersey-selector-highlight bg-gradient-to-r from-primary to-blue-400 bg-clip-text text-transparent">
                                <?php echo esc_html( $settings['pants_highlight_title'] ); ?>
                            </span>
                        </h2>
                        <p class="text-xl text-muted-foreground max-w-2xl mx-auto">
                            <?php echo esc_html( $settings['pants_subtitle'] ); ?>
                        </p>
                    </div>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8 max-w-4xl mx-auto">
                        <?php foreach ( $settings['pants'] as $pants ) : ?>
                            <div class="flex flex-col items-center">
                                <div class="w-32 h-40 mb-4 rounded-lg overflow-hidden border border-border">
                                    <?php if ( ! empty( $pants['pants_image']['url'] ) ) : ?>
                                        <img src="<?php echo esc_url( $pants['pants_image']['url'] ); ?>" 
                                             alt="<?php echo esc_attr( $pants['pants_title'] ); ?>" 
                                             class="w-full h-full object-cover">
                                    <?php endif; ?>
                                </div>
                                
                                <div class="pants-card bg-card border border-border rounded-xl p-6 w-full transition-all duration-300 hover:shadow-xl relative <?php echo $pants['pants_is_most_popular'] === 'yes' ? 'border-primary shadow-lg scale-105' : 'border-chart-3'; ?>">
                                    
                                    <?php if ( $pants['pants_is_most_popular'] === 'yes' ) : ?>
                                        <span class="absolute -top-3 left-1/2 transform -translate-x-1/2 bg-primary text-primary-foreground px-3 py-1 rounded-md text-xs font-medium">
                                            Most Popular
                                        </span>
                                    <?php endif; ?>
                                    
                                    <div class="text-center mb-6">
                                        <h3 class="text-2xl font-bold mb-2 text-foreground"><?php echo esc_html( $pants['pants_title'] ); ?></h3>
                                        <p class="text-sm text-muted-foreground"><?php echo esc_html( $pants['pants_subtitle'] ); ?></p>
                                    </div>
                                    
                                    <div class="space-y-4">
                                        <?php if ( ! empty( $pants['pants_features'] ) ) : ?>
                                            <?php foreach ( $pants['pants_features'] as $feature ) : ?>
                                                <div class="flex items-center justify-between space-x-3">
                                                    <div class="flex items-center space-x-3">
                                                        <?php if ( $feature['has_feature'] === 'yes' ) : ?>
                                                            <svg class="h-5 w-5 text-primary flex-shrink-0" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                                <path d="M20 6 9 17l-5-5"></path>
                                                            </svg>
                                                            <span class="text-sm text-foreground"><?php echo esc_html( $feature['feature_name'] ); ?></span>
                                                        <?php else : ?>
                                                            <svg class="h-5 w-5 text-muted-foreground flex-shrink-0" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                                <path d="M18 6 6 18"></path>
                                                                <path d="m6 6 12 12"></path>
                                                            </svg>
                                                            <span class="text-sm text-muted-foreground"><?php echo esc_html( $feature['feature_name'] ); ?></span>
                                                        <?php endif; ?>
                                                    </div>
                                                    <span class="text-xs font-semibold text-primary bg-primary/10 px-2 py-1 rounded">
                                                        <?php echo esc_html( $feature['feature_value'] ); ?>
                                                    </span>
                                                </div>
                                            <?php endforeach; ?>
                                        <?php endif; ?>
                                    </div>
                                    
                                    <div class="mt-8 pt-6 border-t border-border">
                                        <div class="text-center">
                                            <div class="text-sm text-muted-foreground mb-2">Perfect for:</div>
                                            <div class="text-sm font-medium text-foreground"><?php echo esc_html( $pants['pants_perfect_for'] ); ?></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
                
                <!-- CTA Section -->
                <div class="text-center">
                    <div class="mb-8">
                        <h3 class="text-2xl font-bold mb-4 text-foreground"><?php echo esc_html( $settings['cta_title'] ); ?></h3>
                        <p class="text-muted-foreground mb-6 max-w-2xl mx-auto"><?php echo esc_html( $settings['cta_subtitle'] ); ?></p>
                    </div>
                    
                    <?php
                    $button_link = $settings['cta_button_link'];
                    $this->add_link_attributes( 'cta_button', $button_link );
                    ?>
                    <a <?php echo $this->get_render_attribute_string( 'cta_button' ); ?> class="inline-flex items-center justify-center gap-2 whitespace-nowrap text-sm font-medium transition-all h-10 rounded-md px-6 bg-primary hover:bg-primary/90 text-primary-foreground mb-6">
                        <?php echo esc_html( $settings['cta_button_text'] ); ?>
                    </a>
                    
                    <?php if ( ! empty( $settings['cta_features'] ) ) : ?>
                        <div class="flex flex-wrap justify-center gap-4 text-sm text-muted-foreground">
                            <?php foreach ( $settings['cta_features'] as $feature ) : ?>
                                <span>• <?php echo esc_html( $feature['feature_text'] ); ?></span>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>
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
        <section class="slidefire-jersey-selector py-20 bg-secondary/20">
            <div class="container mx-auto px-4">
                
                <!-- Jerseys Section -->
                <div class="mb-20">
                    <div class="text-center mb-16">
                        <h2 class="jersey-selector-main-title text-4xl md:text-5xl font-bold mb-4">
                            {{{ settings.jersey_main_title }}}
                            <span class="jersey-selector-highlight bg-gradient-to-r from-primary to-blue-400 bg-clip-text text-transparent">
                                {{{ settings.jersey_highlight_title }}}
                            </span>
                        </h2>
                        <p class="text-xl text-muted-foreground max-w-2xl mx-auto">
                            {{{ settings.jersey_subtitle }}}
                        </p>
                    </div>
                    
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-8 max-w-6xl mx-auto">
                        <# _.each( settings.jerseys, function( jersey, index ) { #>
                            <div class="flex flex-col items-center">
                                <div class="w-32 h-40 mb-4 rounded-lg overflow-hidden border border-border">
                                    <# if ( jersey.jersey_image && jersey.jersey_image.url ) { #>
                                        <img src="{{{ jersey.jersey_image.url }}}" alt="{{{ jersey.jersey_title }}}" class="w-full h-full object-cover">
                                    <# } #>
                                </div>
                                
                                <div class="jersey-card bg-card border border-border rounded-xl p-6 w-full transition-all duration-300 hover:shadow-xl relative <# if ( jersey.is_most_popular === 'yes' ) { #>border-primary shadow-lg scale-105<# } else { #>border-muted<# } #>">
                                    
                                    <# if ( jersey.is_most_popular === 'yes' ) { #>
                                        <span class="absolute -top-3 left-1/2 transform -translate-x-1/2 bg-primary text-primary-foreground px-3 py-1 rounded-md text-xs font-medium">
                                            Most Popular
                                        </span>
                                    <# } #>
                                    
                                    <div class="text-center mb-6">
                                        <h3 class="text-2xl font-bold mb-2 text-foreground">{{{ jersey.jersey_title }}}</h3>
                                        <p class="text-sm text-muted-foreground">{{{ jersey.jersey_subtitle }}}</p>
                                    </div>
                                    
                                    <div class="space-y-4">
                                        <# _.each( jersey.jersey_features, function( feature ) { #>
                                            <div class="flex items-center justify-between space-x-3">
                                                <div class="flex items-center space-x-3">
                                                    <# if ( feature.has_feature === 'yes' ) { #>
                                                        <svg class="h-5 w-5 text-primary flex-shrink-0" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                            <path d="M20 6 9 17l-5-5"></path>
                                                        </svg>
                                                        <span class="text-sm text-foreground">{{{ feature.feature_name }}}</span>
                                                    <# } else { #>
                                                        <svg class="h-5 w-5 text-muted-foreground flex-shrink-0" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                            <path d="M18 6 6 18"></path>
                                                            <path d="m6 6 12 12"></path>
                                                        </svg>
                                                        <span class="text-sm text-muted-foreground">{{{ feature.feature_name }}}</span>
                                                    <# } #>
                                                </div>
                                                <span class="text-xs font-semibold text-primary bg-primary/10 px-2 py-1 rounded">
                                                    {{{ feature.feature_value }}}
                                                </span>
                                            </div>
                                        <# }); #>
                                    </div>
                                    
                                    <div class="mt-8 pt-6 border-t border-border">
                                        <div class="text-center">
                                            <div class="text-sm text-muted-foreground mb-2">Perfect for:</div>
                                            <div class="text-sm font-medium text-foreground">{{{ jersey.jersey_perfect_for }}}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <# }); #>
                    </div>
                </div>
                
                <!-- Pants Section -->
                <div class="mb-20">
                    <div class="text-center mb-16">
                        <h2 class="jersey-selector-main-title text-4xl md:text-5xl font-bold mb-4">
                            {{{ settings.pants_main_title }}}
                            <span class="jersey-selector-highlight bg-gradient-to-r from-primary to-blue-400 bg-clip-text text-transparent">
                                {{{ settings.pants_highlight_title }}}
                            </span>
                        </h2>
                        <p class="text-xl text-muted-foreground max-w-2xl mx-auto">
                            {{{ settings.pants_subtitle }}}
                        </p>
                    </div>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8 max-w-4xl mx-auto">
                        <# _.each( settings.pants, function( pants, index ) { #>
                            <div class="flex flex-col items-center">
                                <div class="w-32 h-40 mb-4 rounded-lg overflow-hidden border border-border">
                                    <# if ( pants.pants_image && pants.pants_image.url ) { #>
                                        <img src="{{{ pants.pants_image.url }}}" alt="{{{ pants.pants_title }}}" class="w-full h-full object-cover">
                                    <# } #>
                                </div>
                                
                                <div class="pants-card bg-card border border-border rounded-xl p-6 w-full transition-all duration-300 hover:shadow-xl relative <# if ( pants.pants_is_most_popular === 'yes' ) { #>border-primary shadow-lg scale-105<# } else { #>border-chart-3<# } #>">
                                    
                                    <# if ( pants.pants_is_most_popular === 'yes' ) { #>
                                        <span class="absolute -top-3 left-1/2 transform -translate-x-1/2 bg-primary text-primary-foreground px-3 py-1 rounded-md text-xs font-medium">
                                            Most Popular
                                        </span>
                                    <# } #>
                                    
                                    <div class="text-center mb-6">
                                        <h3 class="text-2xl font-bold mb-2 text-foreground">{{{ pants.pants_title }}}</h3>
                                        <p class="text-sm text-muted-foreground">{{{ pants.pants_subtitle }}}</p>
                                    </div>
                                    
                                    <div class="space-y-4">
                                        <# _.each( pants.pants_features, function( feature ) { #>
                                            <div class="flex items-center justify-between space-x-3">
                                                <div class="flex items-center space-x-3">
                                                    <# if ( feature.has_feature === 'yes' ) { #>
                                                        <svg class="h-5 w-5 text-primary flex-shrink-0" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                            <path d="M20 6 9 17l-5-5"></path>
                                                        </svg>
                                                        <span class="text-sm text-foreground">{{{ feature.feature_name }}}</span>
                                                    <# } else { #>
                                                        <svg class="h-5 w-5 text-muted-foreground flex-shrink-0" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                            <path d="M18 6 6 18"></path>
                                                            <path d="m6 6 12 12"></path>
                                                        </svg>
                                                        <span class="text-sm text-muted-foreground">{{{ feature.feature_name }}}</span>
                                                    <# } #>
                                                </div>
                                                <span class="text-xs font-semibold text-primary bg-primary/10 px-2 py-1 rounded">
                                                    {{{ feature.feature_value }}}
                                                </span>
                                            </div>
                                        <# }); #>
                                    </div>
                                    
                                    <div class="mt-8 pt-6 border-t border-border">
                                        <div class="text-center">
                                            <div class="text-sm text-muted-foreground mb-2">Perfect for:</div>
                                            <div class="text-sm font-medium text-foreground">{{{ pants.pants_perfect_for }}}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <# }); #>
                    </div>
                </div>
                
                <!-- CTA Section -->
                <div class="text-center">
                    <div class="mb-8">
                        <h3 class="text-2xl font-bold mb-4 text-foreground">{{{ settings.cta_title }}}</h3>
                        <p class="text-muted-foreground mb-6 max-w-2xl mx-auto">{{{ settings.cta_subtitle }}}</p>
                    </div>
                    
                    <a href="{{{ settings.cta_button_link.url }}}" class="inline-flex items-center justify-center gap-2 whitespace-nowrap text-sm font-medium transition-all h-10 rounded-md px-6 bg-primary hover:bg-primary/90 text-primary-foreground mb-6">
                        {{{ settings.cta_button_text }}}
                    </a>
                    
                    <# if ( settings.cta_features.length ) { #>
                        <div class="flex flex-wrap justify-center gap-4 text-sm text-muted-foreground">
                            <# _.each( settings.cta_features, function( feature ) { #>
                                <span>• {{{ feature.feature_text }}}</span>
                            <# }); #>
                        </div>
                    <# } #>
                </div>
            </div>
        </section>
        <?php
    }
}