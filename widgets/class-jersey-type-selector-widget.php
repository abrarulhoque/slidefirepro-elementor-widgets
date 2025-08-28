<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

/**
 * SlideFire Jersey Type Selector Widget
 *
 * Custom Elementor widget for SlideFire jersey type comparison and selection
 */
class SlideFire_Jersey_Type_Selector_Widget extends \Elementor\Widget_Base {

    public function get_name() {
        return 'slidefire_jersey_type_selector';
    }

    public function get_title() {
        return esc_html__( 'Jersey Type Selector', 'slidefire-category-widget' );
    }

    public function get_icon() {
        return 'eicon-product-info';
    }

    public function get_categories() {
        return [ 'slidefire' ];
    }

    public function get_keywords() {
        return [ 'slidefire', 'jersey', 'type', 'selector', 'comparison', 'tactical' ];
    }

    public function get_style_depends() {
        return [ 'slidefire-category-widget' ];
    }

    protected function register_controls() {
        // Main Content Section
        $this->start_controls_section(
            'content_section',
            [
                'label' => esc_html__( 'Content', 'slidefire-category-widget' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'jersey_section_title',
            [
                'label' => esc_html__( 'Jersey Section Title', 'slidefire-category-widget' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => 'Choose Your Jersey Type',
                'placeholder' => esc_html__( 'Enter jersey section title', 'slidefire-category-widget' ),
            ]
        );

        $this->add_control(
            'jersey_section_subtitle',
            [
                'label' => esc_html__( 'Jersey Section Subtitle', 'slidefire-category-widget' ),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => 'Compare our jersey options to find the perfect fit for your team\'s needs and budget',
                'placeholder' => esc_html__( 'Enter jersey section subtitle', 'slidefire-category-widget' ),
            ]
        );

        $this->add_control(
            'pants_section_title',
            [
                'label' => esc_html__( 'Pants Section Title', 'slidefire-category-widget' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => 'Choose Your Pants Type',
                'placeholder' => esc_html__( 'Enter pants section title', 'slidefire-category-widget' ),
            ]
        );

        $this->add_control(
            'pants_section_subtitle',
            [
                'label' => esc_html__( 'Pants Section Subtitle', 'slidefire-category-widget' ),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => 'Complete your tactical loadout with our professional-grade tactical pants',
                'placeholder' => esc_html__( 'Enter pants section subtitle', 'slidefire-category-widget' ),
            ]
        );

        $this->add_control(
            'cta_title',
            [
                'label' => esc_html__( 'CTA Title', 'slidefire-category-widget' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => 'Ready to Design Your Custom Gear?',
                'placeholder' => esc_html__( 'Enter CTA title', 'slidefire-category-widget' ),
            ]
        );

        $this->add_control(
            'cta_description',
            [
                'label' => esc_html__( 'CTA Description', 'slidefire-category-widget' ),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => 'All jerseys and pants include free team setup and basic customization. Work with our design team to create the perfect look for your team.',
                'placeholder' => esc_html__( 'Enter CTA description', 'slidefire-category-widget' ),
            ]
        );

        $this->add_control(
            'cta_button_text',
            [
                'label' => esc_html__( 'CTA Button Text', 'slidefire-category-widget' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => 'Start Custom Design Process',
                'placeholder' => esc_html__( 'Enter CTA button text', 'slidefire-category-widget' ),
            ]
        );

        $this->add_control(
            'cta_button_url',
            [
                'label' => esc_html__( 'CTA Button URL', 'slidefire-category-widget' ),
                'type' => \Elementor\Controls_Manager::URL,
                'default' => [
                    'url' => '#',
                    'is_external' => false,
                    'nofollow' => false,
                ],
            ]
        );

        $this->add_control(
            'cta_features',
            [
                'label' => esc_html__( 'CTA Features (one per line)', 'slidefire-category-widget' ),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => '2-3 week turnaround\nCustom Team Artwork\nSatisfaction guaranteed',
                'placeholder' => esc_html__( 'Enter CTA features, one per line', 'slidefire-category-widget' ),
            ]
        );

        $this->end_controls_section();

        // Jersey Items Section
        $this->start_controls_section(
            'jersey_items_section',
            [
                'label' => esc_html__( 'Jersey Items', 'slidefire-category-widget' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $jersey_repeater = new \Elementor\Repeater();

        $jersey_repeater->add_control(
            'jersey_image',
            [
                'label' => esc_html__( 'Jersey Image', 'slidefire-category-widget' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => '',
                ],
            ]
        );

        $jersey_repeater->add_control(
            'jersey_title',
            [
                'label' => esc_html__( 'Jersey Title', 'slidefire-category-widget' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => 'Jersey Type',
            ]
        );

        $jersey_repeater->add_control(
            'jersey_description',
            [
                'label' => esc_html__( 'Jersey Description', 'slidefire-category-widget' ),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => 'Jersey description',
            ]
        );

        $jersey_repeater->add_control(
            'is_most_popular',
            [
                'label' => esc_html__( 'Most Popular Badge', 'slidefire-category-widget' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__( 'Show', 'slidefire-category-widget' ),
                'label_off' => esc_html__( 'Hide', 'slidefire-category-widget' ),
                'return_value' => 'yes',
                'default' => '',
            ]
        );

        $jersey_repeater->add_control(
            'most_popular_text',
            [
                'label' => esc_html__( 'Most Popular Text', 'slidefire-category-widget' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => 'Most Popular',
                'condition' => [
                    'is_most_popular' => 'yes',
                ],
            ]
        );

        $jersey_repeater->add_control(
            'is_featured',
            [
                'label' => esc_html__( 'Featured Style', 'slidefire-category-widget' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__( 'Yes', 'slidefire-category-widget' ),
                'label_off' => esc_html__( 'No', 'slidefire-category-widget' ),
                'return_value' => 'yes',
                'default' => '',
            ]
        );

        // Restore textarea-based jersey_features control instead of nested repeater
        $jersey_repeater->add_control(
            'jersey_features',
            [
                'label' => esc_html__( 'Jersey Features (one per line: Feature Name | Badge Text | Icon Type)', 'slidefire-category-widget' ),
                'type'  => \Elementor\Controls_Manager::TEXTAREA,
                'default' => "Chest Padding | LIGHT FOAM | check\nShoulder Padding | LIGHT FOAM | check\nSoftshell Forearms | YES | check\nAnti-Slide Thumbs | YES | check\nBreathability | VERY HIGH | check\nDurability | DURABLE | check\nAgility | MAXIMUM | check\nMain Materials | PRO LIGHT MESH | check",
            ]
        );

        $jersey_repeater->add_control(
            'perfect_for_text',
            [
                'label' => esc_html__( 'Perfect For Text', 'slidefire-category-widget' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => 'Speedsoft â€¢ Agility Focused â€¢ Maximum Mobility',
            ]
        );

        $this->add_control(
            'jersey_items',
            [
                'label' => esc_html__( 'Jersey Items', 'slidefire-category-widget' ),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $jersey_repeater->get_controls(),
                'default' => [
                    [
                        'jersey_title' => 'Alpha Series Jersey',
                        'jersey_description' => 'Players who don\'t need any form of inbuilt padding or are running their own armor',
                        'jersey_features' => 'Chest Padding | NONE | x\nShoulder Padding | NONE | x\nSoftshell Forearms | YES | check\nAnti-Slide Thumbs | YES | check\nBreathability | VERY HIGH | check\nDurability | DURABLE | check\nAgility | MAXIMUM | check\nMain Materials | PRO LIGHT MESH | check',
                        'perfect_for_text' => 'No Padding â€¢ Custom Armor â€¢ Ultra Light',
                    ],
                    [
                        'jersey_title' => 'Pro Light Jersey',
                        'jersey_description' => 'Players who want maximum breathability with light protection.',
                        'is_most_popular' => 'yes',
                        'is_featured' => 'yes',
                        'jersey_features' => 'Chest Padding | LIGHT FOAM | check\nShoulder Padding | LIGHT FOAM | check\nSoftshell Forearms | YES | check\nAnti-Slide Thumbs | YES | check\nBreathability | VERY HIGH | check\nDurability | DURABLE | check\nAgility | MAXIMUM | check\nMain Materials | PRO LIGHT MESH | check',
                        'perfect_for_text' => 'Speedsoft â€¢ Agility Focused â€¢ Maximum Mobility',
                    ],
                    [
                        'jersey_title' => 'Juggernaut Jersey',
                        'jersey_description' => 'Players who want maximum durability with a neoprene chest plate',
                        'jersey_features' => 'Chest Padding | 3MM NEOPRENE | check\nShoulder Padding | LIGHT FOAM | check\nSoftshell Forearms | YES | check\nAnti-Slide Thumbs | YES | check\nBreathability | HIGH | check\nDurability | EXTRA DURABLE | check\nAgility | MAXIMUM | check\nMain Materials | JUGGERNAUT BODY | check',
                        'perfect_for_text' => 'Maximum Protection â€¢ Heavy Duty â€¢ Tank Mode',
                    ],
                ],
                'title_field' => '{{{ jersey_title }}}',
            ]
        );

        $this->end_controls_section();

        // Pants Items Section
        $this->start_controls_section(
            'pants_items_section',
            [
                'label' => esc_html__( 'Pants Items', 'slidefire-category-widget' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $pants_repeater = new \Elementor\Repeater();

        $pants_repeater->add_control(
            'pants_image',
            [
                'label' => esc_html__( 'Pants Image', 'slidefire-category-widget' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => '',
                ],
            ]
        );

        $pants_repeater->add_control(
            'pants_title',
            [
                'label' => esc_html__( 'Pants Title', 'slidefire-category-widget' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => 'Pants Type',
            ]
        );

        $pants_repeater->add_control(
            'pants_description',
            [
                'label' => esc_html__( 'Pants Description', 'slidefire-category-widget' ),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => 'Pants description',
            ]
        );

        $pants_repeater->add_control(
            'is_most_popular',
            [
                'label' => esc_html__( 'Most Popular Badge', 'slidefire-category-widget' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__( 'Show', 'slidefire-category-widget' ),
                'label_off' => esc_html__( 'Hide', 'slidefire-category-widget' ),
                'return_value' => 'yes',
                'default' => '',
            ]
        );

        $pants_repeater->add_control(
            'most_popular_text',
            [
                'label' => esc_html__( 'Most Popular Text', 'slidefire-category-widget' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => 'Most Popular',
                'condition' => [
                    'is_most_popular' => 'yes',
                ],
            ]
        );

        $pants_repeater->add_control(
            'is_featured',
            [
                'label' => esc_html__( 'Featured Style', 'slidefire-category-widget' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__( 'Yes', 'slidefire-category-widget' ),
                'label_off' => esc_html__( 'No', 'slidefire-category-widget' ),
                'return_value' => 'yes',
                'default' => '',
            ]
        );

        // Remove nested repeater for pants features and restore textarea control
        $pants_repeater->add_control(
            'pants_features',
            [
                'label' => esc_html__( 'Pants Features (one per line: Feature Name | Badge Text | Icon Type)', 'slidefire-category-widget' ),
                'type'  => \Elementor\Controls_Manager::TEXTAREA,
                'default' => "Crotch Padding | NONE | x\nRear and Thigh Padding | NONE | x\nKnee Padding | NONE | x\nSoftshell Knees | YES | check\nBreathable Side Panels | YES | check",
            ]
        );

        $pants_repeater->add_control(
            'perfect_for_text',
            [
                'label' => esc_html__( 'Perfect For Text', 'slidefire-category-widget' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => 'Ultra Light â€¢ Maximum Mobility â€¢ Speed Focused',
            ]
        );

        $this->add_control(
            'pants_items',
            [
                'label' => esc_html__( 'Pants Items', 'slidefire-category-widget' ),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $pants_repeater->get_controls(),
                'default' => [
                    [
                        'pants_title' => 'Pro Light Pants',
                        'pants_description' => 'Lightweight tactical pants with minimal padding for maximum mobility',
                        'is_most_popular' => 'yes',
                        'is_featured' => 'yes',
                        'pants_features' => 'Crotch Padding | NONE | x\nRear and Thigh Padding | NONE | x\nKnee Padding | NONE | x\nSoftshell Knees | YES | check\nBreathable Side Panels | YES | check',
                        'perfect_for_text' => 'Ultra Light â€¢ Maximum Mobility â€¢ Speed Focused',
                    ],
                    [
                        'pants_title' => 'Juggernaut Pants',
                        'pants_description' => 'Maximum protection tactical pants with comprehensive padding system',
                        'pants_features' => 'Crotch Padding | YES | check\nRear and Thigh Padding | YES | check\nKnee Padding | YES | check\nSoftshell Knees | YES | check\nBreathable Side Panels | YES | check',
                        'perfect_for_text' => 'Full Protection â€¢ Heavy Duty â€¢ Maximum Coverage',
                    ],
                ],
                'title_field' => '{{{ pants_title }}}',
            ]
        );

        $this->end_controls_section();

        // Style Section
        $this->start_controls_section(
            'style_section',
            [
                'label' => esc_html__( 'Style', 'slidefire-category-widget' ),
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
                    '{{WRAPPER}} .jersey-type-selector' => 'background-color: {{VALUE}}',
                ],
            ]
        );

        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        
        if ( empty( $settings['jersey_section_title'] ) ) {
            return;
        }

        ?>

        <section class="jersey-type-selector">
            <div class="jersey-container">
                
                <!-- Jersey Types Section -->
                <div class="jersey-types-section">
                    <div class="jersey-section-header">
                        <h2 class="jersey-section-title">
                            Choose Your
                            <span class="gradient-text"> Jersey Type</span>
                        </h2>
                        <p class="jersey-section-subtitle">
                            <?php echo esc_html( $settings['jersey_section_subtitle'] ); ?>
                        </p>
                    </div>

                    <div class="jersey-grid">
                        <?php 
                        if ( !empty( $settings['jersey_items'] ) ) {
                            foreach ( $settings['jersey_items'] as $index => $jersey ) {
                                $is_featured = !empty( $jersey['is_featured'] ) && $jersey['is_featured'] === 'yes';
                                $is_popular = !empty( $jersey['is_most_popular'] ) && $jersey['is_most_popular'] === 'yes';
                                $jersey_image_url = !empty( $jersey['jersey_image']['url'] ) ? $jersey['jersey_image']['url'] : '';
                                
                                $item_classes = 'jersey-item';
                                if ( $is_featured ) $item_classes .= ' featured';
                                if ( strpos( strtolower( $jersey['jersey_title'] ), 'juggernaut' ) !== false ) {
                                    $card_classes = 'jersey-card juggernaut-card';
                                } else {
                                    $card_classes = 'jersey-card';
                                }
                        ?>
                        <div class="<?php echo esc_attr( $item_classes ); ?>">
                            <div class="jersey-image-wrapper">
                                <?php if ( $jersey_image_url ): ?>
                                    <img src="<?php echo esc_url( $jersey_image_url ); ?>" alt="<?php echo esc_attr( $jersey['jersey_title'] ); ?>" class="jersey-image">
                                <?php endif; ?>
                            </div>
                            <div class="<?php echo esc_attr( $card_classes ); ?>">
                                <?php if ( $is_popular ): ?>
                                    <span class="most-popular-badge"><?php echo esc_html( !empty( $jersey['most_popular_text'] ) ? $jersey['most_popular_text'] : 'Most Popular' ); ?></span>
                                <?php endif; ?>
                                
                                <div class="jersey-card-header">
                                    <h3 class="jersey-card-title"><?php echo esc_html( $jersey['jersey_title'] ); ?></h3>
                                    <p class="jersey-card-description"><?php echo esc_html( $jersey['jersey_description'] ); ?></p>
                                </div>
                                
                                <div class="jersey-features">
                                    <?php 
                                    if ( ! empty( $jersey['jersey_features'] ) ) {
                                        // Parse features string (supports newlines and <br> tags)
                                        $raw = $jersey['jersey_features'];
                                        $raw = str_replace( ['<br />','<br/>','<br>','<p>','</p>'], "\n", $raw );
                                        $lines = preg_split( '/\r?\n/', $raw );
                                        
                                        $features_arr = []; // Initialize the array
                                        foreach ( $lines as $line ) {
                                            $parts = explode( '|', $line );
                                            if ( count( $parts ) === 3 ) {
                                                $features_arr[] = [
                                                    'feature_name' => trim( $parts[0] ),
                                                    'badge_text'   => trim( $parts[1] ),
                                                    'icon_type'    => trim( $parts[2] ),
                                                ];
                                            }
                                        }
                                        
                                        if ( $features_arr ) { // Guard the loop
                                            foreach ( $features_arr as $f ) {
                                                $name = $f['feature_name'];
                                                $badge = $f['badge_text'];
                                                $icon_type = $f['icon_type'];

                                                $text_class = ( $icon_type === 'check' ) ? 'jersey-feature-name' : 'muted-feature-name';
                                                $svg = ( $icon_type === 'check' ) ? '<svg class="jersey-icon check-icon" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 6 9 17l-5-5"></path></svg>' : '<svg class="jersey-icon x-icon" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 6 6 18"></path><path d="m6 6 12 12"></path></svg>';
                                                ?>
                                                    <div class="jersey-feature">
                                                        <div class="jersey-feature-info">
                                                            <?php echo $svg; ?>
                                                            <span class="<?php echo esc_attr( $text_class ); ?>"><?php echo esc_html( $name ); ?></span>
                                                        </div>
                                                        <span class="jersey-feature-badge"><?php echo esc_html( $badge ); ?></span>
                                                    </div>
                                                <?php
                                            }
                                        }
                                    }
                                    ?>
                                </div>
                                
                                <div class="jersey-card-footer">
                                    <div class="jersey-perfect-for">
                                        <div class="perfect-for-label">Perfect for:</div>
                                        <div class="perfect-for-text"><?php echo esc_html( $jersey['perfect_for_text'] ); ?></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php 
                            }
                        } 
                        ?>
                    </div>
                </div>

                <!-- Pants Types Section -->
                <div class="pants-types-section">
                    <div class="pants-section-header">
                        <h2 class="pants-section-title">
                            Choose Your
                            <span class="gradient-text"> Pants Type</span>
                        </h2>
                        <p class="pants-section-subtitle">
                            <?php echo esc_html( $settings['pants_section_subtitle'] ); ?>
                        </p>
                    </div>

                    <div class="pants-grid">
                        <?php 
                        if ( !empty( $settings['pants_items'] ) ) {
                            foreach ( $settings['pants_items'] as $index => $pants ) {
                                $is_featured = !empty( $pants['is_featured'] ) && $pants['is_featured'] === 'yes';
                                $is_popular = !empty( $pants['is_most_popular'] ) && $pants['is_most_popular'] === 'yes';
                                $pants_image_url = !empty( $pants['pants_image']['url'] ) ? $pants['pants_image']['url'] : '';
                                
                                $item_classes = 'pants-item';
                                if ( $is_featured ) $item_classes .= ' featured';
                                if ( strpos( strtolower( $pants['pants_title'] ), 'juggernaut' ) !== false ) {
                                    $card_classes = 'pants-card juggernaut-card';
                                } else {
                                    $card_classes = 'pants-card';
                                }
                        ?>
                        <div class="<?php echo esc_attr( $item_classes ); ?>">
                            <div class="pants-image-wrapper">
                                <?php if ( $pants_image_url ): ?>
                                    <img src="<?php echo esc_url( $pants_image_url ); ?>" alt="<?php echo esc_attr( $pants['pants_title'] ); ?>" class="pants-image">
                                <?php endif; ?>
                            </div>
                            <div class="<?php echo esc_attr( $card_classes ); ?>">
                                <?php if ( $is_popular ): ?>
                                    <span class="most-popular-badge"><?php echo esc_html( !empty( $pants['most_popular_text'] ) ? $pants['most_popular_text'] : 'Most Popular' ); ?></span>
                                <?php endif; ?>
                                
                                <div class="pants-card-header">
                                    <h3 class="pants-card-title"><?php echo esc_html( $pants['pants_title'] ); ?></h3>
                                    <p class="pants-card-description"><?php echo esc_html( $pants['pants_description'] ); ?></p>
                                </div>
                                
                                <div class="pants-features">
                                    <?php 
                                    if ( ! empty( $pants['pants_features'] ) ) {
                                        // Parse features string (supports newlines and <br> tags)
                                        $raw = $pants['pants_features'];
                                        $raw = str_replace( ['<br />','<br/>','<br>','<p>','</p>'], "\n", $raw );
                                        $lines = preg_split( '/\r?\n/', $raw );
                                        
                                        $features_arr = []; // Initialize the array
                                        foreach ( $lines as $line ) {
                                            $parts = explode( '|', $line );
                                            if ( count( $parts ) === 3 ) {
                                                $features_arr[] = [
                                                    'feature_name' => trim( $parts[0] ),
                                                    'badge_text'   => trim( $parts[1] ),
                                                    'icon_type'    => trim( $parts[2] ),
                                                ];
                                            }
                                        }
                                        
                                        if ( $features_arr ) { // Guard the loop
                                            foreach ( $features_arr as $f ) {
                                                $name = $f['feature_name'];
                                                $badge = $f['badge_text'];
                                                $icon_type = $f['icon_type'];

                                                $text_class = ( $icon_type === 'check' ) ? 'pants-feature-name' : 'muted-feature-name';
                                                $svg = ( $icon_type === 'check' ) ? '<svg class="pants-icon check-icon" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 6 9 17l-5-5"></path></svg>' : '<svg class="pants-icon x-icon" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 6 6 18"></path><path d="m6 6 12 12"></path></svg>';
                                                ?>
                                                    <div class="pants-feature">
                                                        <div class="pants-feature-info">
                                                            <?php echo $svg; ?>
                                                            <span class="<?php echo esc_attr( $text_class ); ?>"><?php echo esc_html( $name ); ?></span>
                                                        </div>
                                                        <span class="pants-feature-badge"><?php echo esc_html( $badge ); ?></span>
                                                    </div>
                                                <?php
                                            }
                                        }
                                    }
                                    ?>
                                </div>
                                
                                <div class="pants-card-footer">
                                    <div class="pants-perfect-for">
                                        <div class="perfect-for-label">Perfect for:</div>
                                        <div class="perfect-for-text"><?php echo esc_html( $pants['perfect_for_text'] ); ?></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php 
                            }
                        } 
                        ?>
                    </div>
                </div>

                <!-- CTA Section -->
                <div class="cta-section">
                    <div class="cta-content">
                        <h3 class="cta-title"><?php echo esc_html( $settings['cta_title'] ); ?></h3>
                        <p class="cta-description"><?php echo esc_html( $settings['cta_description'] ); ?></p>
                    </div>
                    <?php 
                    $target = $settings['cta_button_url']['is_external'] ? ' target="_blank"' : '';
                    $nofollow = $settings['cta_button_url']['nofollow'] ? ' rel="nofollow"' : '';
                    ?>
                    <a href="<?php echo esc_url( $settings['cta_button_url']['url'] ); ?>"<?php echo $target . $nofollow; ?> class="cta-button">
                        <?php echo esc_html( $settings['cta_button_text'] ); ?>
                    </a>
                    <div class="cta-features">
                        <?php 
                        $features = explode( "\n", $settings['cta_features'] );
                        foreach ( $features as $feature ) {
                            if ( !empty( trim( $feature ) ) ) {
                                echo '<span>â€¢ ' . esc_html( trim( $feature ) ) . '</span>';
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </section>

        <?php
    }

    protected function content_template() {
        ?>
        <section class="jersey-type-selector">
            <div class="jersey-container">
                <!-- Jersey Types Section -->
                <div class="jersey-types-section">
                    <div class="jersey-section-header">
                        <h2 class="jersey-section-title">
                            Choose Your
                            <span class="gradient-text"> Jersey Type</span>
                        </h2>
                        <p class="jersey-section-subtitle">{{{ settings.jersey_section_subtitle }}}</p>
                    </div>
                    
                    <div class="jersey-grid">
                        <# _.each( settings.jersey_items, function( jersey, index ) { 
                            var itemClasses = 'jersey-item';
                            var cardClasses = 'jersey-card';
                            if ( jersey.is_featured === 'yes' ) itemClasses += ' featured';
                            if ( jersey.jersey_title.toLowerCase().indexOf('juggernaut') !== -1 ) cardClasses += ' juggernaut-card';
                        #>
                        <div class="{{ itemClasses }}">
                            <div class="jersey-image-wrapper">
                                <# if ( jersey.jersey_image.url ) { #>
                                    <img src="{{ jersey.jersey_image.url }}" alt="{{ jersey.jersey_title }}" class="jersey-image">
                                <# } #>
                            </div>
                            <div class="{{ cardClasses }}">
                                <# if ( jersey.is_most_popular === 'yes' ) { #>
                                    <span class="most-popular-badge">{{{ jersey.most_popular_text || 'Most Popular' }}}</span>
                                <# } #>
                                
                                <div class="jersey-card-header">
                                    <h3 class="jersey-card-title">{{{ jersey.jersey_title }}}</h3>
                                    <p class="jersey-card-description">{{{ jersey.jersey_description }}}</p>
                                </div>
                                
                                <div class="jersey-features">
                                    <# if ( jersey.jersey_features ) {
                                        var features = jersey.jersey_features;
                                        if ( typeof features === 'string' ) {
                                            features = features.split('\\n');
                                        }
                                        _.each( features, function( feature ) {
                                            var parts = feature.split('|');
                                            if ( parts.length === 3 ) {
                                                var name = parts[0].trim();
                                                var badge = parts[1].trim();
                                                var icon = parts[2].trim();
                                                var textClass = icon === 'check' ? 'jersey-feature-name' : 'muted-feature-name';
                                                var svgIcon = icon === 'check' ? 
                                                    '<svg class="jersey-icon check-icon" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 6 9 17l-5-5"></path></svg>' :
                                                    '<svg class="jersey-icon x-icon" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 6 6 18"></path><path d="m6 6 12 12"></path></svg>';
                                    #>
                                    <div class="jersey-feature">
                                        <div class="jersey-feature-info">
                                            {{{ svgIcon }}}
                                            <span class="{{ textClass }}">{{{ name }}}</span>
                                        </div>
                                        <span class="jersey-feature-badge">{{{ badge }}}</span>
                                    </div>
                                    <# } }); } #>
                                </div>
                                
                                <div class="jersey-card-footer">
                                    <div class="jersey-perfect-for">
                                        <div class="perfect-for-label">Perfect for:</div>
                                        <div class="perfect-for-text">{{{ jersey.perfect_for_text }}}</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <# }); #>
                    </div>
                </div>

                <!-- Pants Types Section -->
                <div class="pants-types-section">
                    <div class="pants-section-header">
                        <h2 class="pants-section-title">
                            Choose Your
                            <span class="gradient-text"> Pants Type</span>
                        </h2>
                        <p class="pants-section-subtitle">{{{ settings.pants_section_subtitle }}}</p>
                    </div>
                    
                    <div class="pants-grid">
                        <# _.each( settings.pants_items, function( pants, index ) { 
                            var itemClasses = 'pants-item';
                            var cardClasses = 'pants-card';
                            if ( pants.is_featured === 'yes' ) itemClasses += ' featured';
                            if ( pants.pants_title.toLowerCase().indexOf('juggernaut') !== -1 ) cardClasses += ' juggernaut-card';
                        #>
                        <div class="{{ itemClasses }}">
                            <div class="pants-image-wrapper">
                                <# if ( pants.pants_image.url ) { #>
                                    <img src="{{ pants.pants_image.url }}" alt="{{ pants.pants_title }}" class="pants-image">
                                <# } #>
                            </div>
                            <div class="{{ cardClasses }}">
                                <# if ( pants.is_most_popular === 'yes' ) { #>
                                    <span class="most-popular-badge">{{{ pants.most_popular_text || 'Most Popular' }}}</span>
                                <# } #>
                                
                                <div class="pants-card-header">
                                    <h3 class="pants-card-title">{{{ pants.pants_title }}}</h3>
                                    <p class="pants-card-description">{{{ pants.pants_description }}}</p>
                                </div>
                                
                                <div class="pants-features">
                                    <# if ( pants.pants_features ) {
                                        var features = pants.pants_features;
                                        if ( typeof features === 'string' ) {
                                            features = features.split('\\n');
                                        }
                                        _.each( features, function( feature ) {
                                            var parts = feature.split('|');
                                            if ( parts.length === 3 ) {
                                                var name = parts[0].trim();
                                                var badge = parts[1].trim();
                                                var icon = parts[2].trim();
                                                var textClass = icon === 'check' ? 'pants-feature-name' : 'muted-feature-name';
                                                var svgIcon = icon === 'check' ? 
                                                    '<svg class="pants-icon check-icon" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 6 9 17l-5-5"></path></svg>' :
                                                    '<svg class="pants-icon x-icon" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 6 6 18"></path><path d="m6 6 12 12"></path></svg>';
                                    #>
                                    <div class="pants-feature">
                                        <div class="pants-feature-info">
                                            {{{ svgIcon }}}
                                            <span class="{{ textClass }}">{{{ name }}}</span>
                                        </div>
                                        <span class="pants-feature-badge">{{{ badge }}}</span>
                                    </div>
                                    <# } }); } #>
                                </div>
                                
                                <div class="pants-card-footer">
                                    <div class="pants-perfect-for">
                                        <div class="perfect-for-label">Perfect for:</div>
                                        <div class="perfect-for-text">{{{ pants.perfect_for_text }}}</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <# }); #>
                    </div>
                </div>

                <!-- CTA Section -->
                <div class="cta-section">
                    <div class="cta-content">
                        <h3 class="cta-title">{{{ settings.cta_title }}}</h3>
                        <p class="cta-description">{{{ settings.cta_description }}}</p>
                    </div>
                    <a href="#" class="cta-button">{{{ settings.cta_button_text }}}</a>
                    <div class="cta-features">
                        <# if ( settings.cta_features ) {
                            var features = settings.cta_features;
                            if ( typeof features === 'string' ) {
                                features = features.split('\\n');
                            }
                            _.each( features, function( feature ) {
                                if ( feature.trim() ) { #>
                                    <span>â€¢ {{{ feature.trim() }}}</span>
                                <# }
                            });
                        } #>
                    </div>
                </div>
            </div>
        </section>
        <?php
    }
}