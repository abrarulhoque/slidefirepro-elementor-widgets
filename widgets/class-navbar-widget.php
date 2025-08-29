<?php
/**
 * SlideFire Navbar Widget Class
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

class SlideFire_Navbar_Widget extends \Elementor\Widget_Base {

    /**
     * Get widget name
     */
    public function get_name() {
        return 'slidefire_navbar';
    }

    /**
     * Get widget title
     */
    public function get_title() {
        return esc_html__( 'SlideFire Navbar', 'slidefire-category-widget' );
    }

    /**
     * Get widget icon
     */
    public function get_icon() {
        return 'eicon-nav-menu';
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
        return [ 'navbar', 'navigation', 'header', 'menu', 'slidefire' ];
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

        // Promo Banner Section
        $this->start_controls_section(
            'promo_banner_section',
            [
                'label' => esc_html__( 'Promo Banner', 'slidefire-category-widget' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'show_promo_banner',
            [
                'label' => esc_html__( 'Show Promo Banner', 'slidefire-category-widget' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__( 'Show', 'slidefire-category-widget' ),
                'label_off' => esc_html__( 'Hide', 'slidefire-category-widget' ),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

        $this->add_control(
            'promo_text',
            [
                'label' => esc_html__( 'Promo Text', 'slidefire-category-widget' ),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => '🎉 <span class="font-bold text-primary">FREE Design for new teams in 2025</span> - Start your custom apparel journey today!',
                'condition' => [
                    'show_promo_banner' => 'yes',
                ],
            ]
        );

        $this->end_controls_section();

        // Logo Section
        $this->start_controls_section(
            'logo_section',
            [
                'label' => esc_html__( 'Logo', 'slidefire-category-widget' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'logo_text',
            [
                'label' => esc_html__( 'Logo Text', 'slidefire-category-widget' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => 'SLIDEFIRE',
            ]
        );

        $this->add_control(
            'logo_tagline',
            [
                'label' => esc_html__( 'Logo Tagline', 'slidefire-category-widget' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => 'PRO',
            ]
        );

        $this->add_control(
            'logo_link',
            [
                'label' => esc_html__( 'Logo Link', 'slidefire-category-widget' ),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => esc_html__( 'https://your-link.com', 'slidefire-category-widget' ),
                'default' => [
                    'url' => '#',
                ],
            ]
        );

        $this->end_controls_section();

        // Navigation Menu Section
        $this->start_controls_section(
            'navigation_section',
            [
                'label' => esc_html__( 'Navigation Menu', 'slidefire-category-widget' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        // Repeater for menu items
        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'menu_text',
            [
                'label' => esc_html__( 'Menu Text', 'slidefire-category-widget' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( 'Menu Item', 'slidefire-category-widget' ),
            ]
        );

        $repeater->add_control(
            'menu_link',
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
            'has_dropdown',
            [
                'label' => esc_html__( 'Has Dropdown', 'slidefire-category-widget' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__( 'Yes', 'slidefire-category-widget' ),
                'label_off' => esc_html__( 'No', 'slidefire-category-widget' ),
                'return_value' => 'yes',
                'default' => '',
            ]
        );

        // Sub-menu repeater
        $submenu_repeater = new \Elementor\Repeater();

        $submenu_repeater->add_control(
            'submenu_text',
            [
                'label' => esc_html__( 'Submenu Text', 'slidefire-category-widget' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( 'Submenu Item', 'slidefire-category-widget' ),
            ]
        );

        $submenu_repeater->add_control(
            'submenu_link',
            [
                'label' => esc_html__( 'Link', 'slidefire-category-widget' ),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => esc_html__( 'https://your-link.com', 'slidefire-category-widget' ),
                'default' => [
                    'url' => '#',
                ],
            ]
        );

        $submenu_repeater->add_control(
            'is_coming_soon',
            [
                'label' => esc_html__( 'Coming Soon', 'slidefire-category-widget' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__( 'Yes', 'slidefire-category-widget' ),
                'label_off' => esc_html__( 'No', 'slidefire-category-widget' ),
                'return_value' => 'yes',
                'default' => '',
            ]
        );

        $repeater->add_control(
            'submenu_items',
            [
                'label' => esc_html__( 'Submenu Items', 'slidefire-category-widget' ),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $submenu_repeater->get_controls(),
                'default' => [
                    [
                        'submenu_text' => esc_html__( 'Speedsoft', 'slidefire-category-widget' ),
                        'submenu_link' => ['url' => '#'],
                    ],
                    [
                        'submenu_text' => esc_html__( 'Airsoft', 'slidefire-category-widget' ),
                        'submenu_link' => ['url' => '#'],
                    ],
                    [
                        'submenu_text' => esc_html__( 'Basketball', 'slidefire-category-widget' ),
                        'submenu_link' => ['url' => '#'],
                        'is_coming_soon' => 'yes',
                    ],
                    [
                        'submenu_text' => esc_html__( 'Soccer', 'slidefire-category-widget' ),
                        'submenu_link' => ['url' => '#'],
                        'is_coming_soon' => 'yes',
                    ],
                ],
                'condition' => [
                    'has_dropdown' => 'yes',
                ],
                'title_field' => '{{{ submenu_text }}}',
            ]
        );

        $this->add_control(
            'menu_items',
            [
                'label' => esc_html__( 'Menu Items', 'slidefire-category-widget' ),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'menu_text' => esc_html__( 'Store', 'slidefire-category-widget' ),
                        'menu_link' => ['url' => '#'],
                    ],
                    [
                        'menu_text' => esc_html__( 'Sports', 'slidefire-category-widget' ),
                        'menu_link' => ['url' => '#'],
                        'has_dropdown' => 'yes',
                    ],
                    [
                        'menu_text' => esc_html__( 'Go Custom', 'slidefire-category-widget' ),
                        'menu_link' => ['url' => '#'],
                    ],
                    [
                        'menu_text' => esc_html__( 'View Portfolio', 'slidefire-category-widget' ),
                        'menu_link' => ['url' => '#'],
                    ],
                    [
                        'menu_text' => esc_html__( 'Contact Us', 'slidefire-category-widget' ),
                        'menu_link' => ['url' => '#'],
                    ],
                ],
                'title_field' => '{{{ menu_text }}}',
            ]
        );

        $this->end_controls_section();

        // Search Section
        $this->start_controls_section(
            'search_section',
            [
                'label' => esc_html__( 'Search', 'slidefire-category-widget' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'show_search',
            [
                'label' => esc_html__( 'Show Search', 'slidefire-category-widget' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__( 'Show', 'slidefire-category-widget' ),
                'label_off' => esc_html__( 'Hide', 'slidefire-category-widget' ),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

        $this->add_control(
            'search_placeholder',
            [
                'label' => esc_html__( 'Search Placeholder', 'slidefire-category-widget' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => 'Search designs...',
                'condition' => [
                    'show_search' => 'yes',
                ],
            ]
        );

        $this->end_controls_section();

        // Social Links Section
        $this->start_controls_section(
            'social_section',
            [
                'label' => esc_html__( 'Social Links', 'slidefire-category-widget' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'instagram_url',
            [
                'label' => esc_html__( 'Instagram URL', 'slidefire-category-widget' ),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => esc_html__( 'https://instagram.com/yourusername', 'slidefire-category-widget' ),
                'default' => [
                    'url' => 'https://instagram.com/slidefirepro',
                ],
            ]
        );

        $this->end_controls_section();

        // Cart Section
        $this->start_controls_section(
            'cart_section',
            [
                'label' => esc_html__( 'Cart', 'slidefire-category-widget' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'show_cart',
            [
                'label' => esc_html__( 'Show Cart', 'slidefire-category-widget' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__( 'Show', 'slidefire-category-widget' ),
                'label_off' => esc_html__( 'Hide', 'slidefire-category-widget' ),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

        $this->add_control(
            'cart_count',
            [
                'label' => esc_html__( 'Cart Items Count', 'slidefire-category-widget' ),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'default' => 3,
                'min' => 0,
                'condition' => [
                    'show_cart' => 'yes',
                ],
            ]
        );

        $this->end_controls_section();

        // Style Tab - General Styles
        $this->start_controls_section(
            'navbar_style',
            [
                'label' => esc_html__( 'Navbar Styles', 'slidefire-category-widget' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'navbar_background_color',
            [
                'label' => esc_html__( 'Background Color', 'slidefire-category-widget' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => 'rgba(0, 0, 0, 0.8)',
                'selectors' => [
                    '{{WRAPPER}} .slidefire-navbar-header' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'navbar_border_color',
            [
                'label' => esc_html__( 'Border Color', 'slidefire-category-widget' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#333333',
                'selectors' => [
                    '{{WRAPPER}} .slidefire-navbar-header' => 'border-color: {{VALUE}};',
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
                    '{{WRAPPER}}' => '--navbar-primary: {{VALUE}};',
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
        <div class="slidefire-navbar">
            <?php if ( $settings['show_promo_banner'] === 'yes' && !empty( $settings['promo_text'] ) ) : ?>
                <!-- Promo Banner -->
                <div class="navbar-promo-banner">
                    <div class="navbar-promo-background"></div>
                    <div class="navbar-promo-content">
                        <p><?php echo wp_kses_post( $settings['promo_text'] ); ?></p>
                    </div>
                    <div class="navbar-promo-dot navbar-promo-dot-1"></div>
                    <div class="navbar-promo-dot navbar-promo-dot-2"></div>
                    <div class="navbar-promo-dot navbar-promo-dot-3"></div>
                    <div class="navbar-promo-dot navbar-promo-dot-4"></div>
                </div>
            <?php endif; ?>

            <!-- Main Header -->
            <header class="slidefire-navbar-header">
                <div class="navbar-container">
                    <div class="navbar-content">
                        <div class="navbar-left">
                            <!-- Mobile Menu Button -->
                            <button class="navbar-mobile-menu-btn" data-mobile-menu-toggle>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="navbar-mobile-menu-icon" aria-hidden="true">
                                    <path d="M18 6 6 18"></path>
                                    <path d="m6 6 12 12"></path>
                                </svg>
                            </button>

                            <!-- Logo -->
                            <?php if ( !empty( $settings['logo_text'] ) ) : ?>
                                <?php
                                $logo_link_key = 'logo_link';
                                $this->add_link_attributes( $logo_link_key, $settings['logo_link'] );
                                ?>
                                <a <?php echo $this->get_render_attribute_string( $logo_link_key ); ?> class="navbar-logo">
                                    <div class="navbar-logo-content">
                                        <svg class="navbar-logo-icon" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <rect x="2" y="2" width="44" height="44" rx="8" stroke="currentColor" stroke-width="1.5" class="logo-border"></rect>
                                            <rect x="6" y="6" width="36" height="36" rx="4" fill="currentColor" class="logo-bg"></rect>
                                            <path d="M24 12L32 20L28 24L32 28L24 36L16 28L20 24L16 20L24 12Z" fill="currentColor" class="logo-shape"></path>
                                            <path d="M10 16L14 16M10 20L16 20M10 24L14 24M10 28L16 28M10 32L14 32" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" class="logo-lines"></path>
                                            <path d="M34 16L38 16M32 20L38 20M34 24L38 24M32 28L38 28M34 32L38 32" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" class="logo-lines"></path>
                                            <circle cx="8" cy="8" r="1.5" fill="currentColor" class="logo-dots"></circle>
                                            <circle cx="40" cy="8" r="1.5" fill="currentColor" class="logo-dots"></circle>
                                            <circle cx="8" cy="40" r="1.5" fill="currentColor" class="logo-dots"></circle>
                                            <circle cx="40" cy="40" r="1.5" fill="currentColor" class="logo-dots"></circle>
                                        </svg>
                                        <div class="navbar-logo-text">
                                            <div class="navbar-logo-title"><?php echo esc_html( $settings['logo_text'] ); ?></div>
                                            <?php if ( !empty( $settings['logo_tagline'] ) ) : ?>
                                                <div class="navbar-logo-tagline"><?php echo esc_html( $settings['logo_tagline'] ); ?></div>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </a>
                            <?php endif; ?>
                        </div>

                        <!-- Desktop Navigation -->
                        <nav class="navbar-nav">
                            <?php foreach ( $settings['menu_items'] as $index => $item ) : ?>
                                <?php
                                $menu_link_key = 'menu_link_' . $index;
                                $this->add_link_attributes( $menu_link_key, $item['menu_link'] );
                                ?>
                                <?php if ( $item['has_dropdown'] === 'yes' && !empty( $item['submenu_items'] ) ) : ?>
                                    <div class="navbar-dropdown">
                                        <button class="navbar-nav-item navbar-dropdown-trigger" data-dropdown-toggle="dropdown-<?php echo $index; ?>">
                                            <span><?php echo esc_html( $item['menu_text'] ); ?></span>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="navbar-dropdown-icon" aria-hidden="true">
                                                <path d="m6 9 6 6 6-6"></path>
                                            </svg>
                                        </button>
                                        <div class="navbar-dropdown-menu" id="dropdown-<?php echo $index; ?>">
                                            <?php foreach ( $item['submenu_items'] as $subindex => $subitem ) : ?>
                                                <?php
                                                $submenu_link_key = 'submenu_link_' . $index . '_' . $subindex;
                                                $this->add_link_attributes( $submenu_link_key, $subitem['submenu_link'] );
                                                ?>
                                                <?php if ( $subitem['is_coming_soon'] === 'yes' ) : ?>
                                                    <div class="navbar-dropdown-item navbar-coming-soon">
                                                        <span class="navbar-dropdown-text"><?php echo esc_html( $subitem['submenu_text'] ); ?></span>
                                                        <span class="navbar-coming-soon-badge">Coming Soon</span>
                                                    </div>
                                                <?php else : ?>
                                                    <a <?php echo $this->get_render_attribute_string( $submenu_link_key ); ?> class="navbar-dropdown-item">
                                                        <?php echo esc_html( $subitem['submenu_text'] ); ?>
                                                    </a>
                                                <?php endif; ?>
                                            <?php endforeach; ?>
                                        </div>
                                    </div>
                                <?php else : ?>
                                    <a <?php echo $this->get_render_attribute_string( $menu_link_key ); ?> class="navbar-nav-item">
                                        <?php echo esc_html( $item['menu_text'] ); ?>
                                    </a>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </nav>

                        <!-- Search Bar (Desktop) -->
                        <?php if ( $settings['show_search'] === 'yes' ) : ?>
                            <div class="navbar-search">
                                <div class="navbar-search-wrapper">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="navbar-search-icon" aria-hidden="true">
                                        <path d="m21 21-4.34-4.34"></path>
                                        <circle cx="11" cy="11" r="8"></circle>
                                    </svg>
                                    <input type="text" class="navbar-search-input" placeholder="<?php echo esc_attr( $settings['search_placeholder'] ); ?>">
                                </div>
                            </div>
                        <?php endif; ?>

                        <!-- Right Side Icons -->
                        <div class="navbar-actions">
                            <!-- Mobile Search Button -->
                            <?php if ( $settings['show_search'] === 'yes' ) : ?>
                                <button class="navbar-action-btn navbar-mobile-search-btn">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="navbar-action-icon" aria-hidden="true">
                                        <path d="m21 21-4.34-4.34"></path>
                                        <circle cx="11" cy="11" r="8"></circle>
                                    </svg>
                                </button>
                            <?php endif; ?>

                            <!-- Instagram Link -->
                            <?php if ( !empty( $settings['instagram_url']['url'] ) ) : ?>
                                <?php
                                $instagram_link_key = 'instagram_link';
                                $this->add_link_attributes( $instagram_link_key, $settings['instagram_url'] );
                                ?>
                                <a <?php echo $this->get_render_attribute_string( $instagram_link_key ); ?> class="navbar-instagram-link" title="Follow us on Instagram">
                                    <div class="navbar-instagram-bg"></div>
                                    <div class="navbar-instagram-content">
                                        <div class="navbar-instagram-gradient"></div>
                                        <div class="navbar-instagram-sparkles">
                                            <div class="navbar-instagram-sparkle navbar-instagram-sparkle-1"></div>
                                            <div class="navbar-instagram-sparkle navbar-instagram-sparkle-2"></div>
                                            <div class="navbar-instagram-sparkle navbar-instagram-sparkle-3"></div>
                                        </div>
                                        <div class="navbar-instagram-icon-wrapper">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="navbar-instagram-icon" aria-hidden="true">
                                                <rect width="20" height="20" x="2" y="2" rx="5" ry="5"></rect>
                                                <path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path>
                                                <line x1="17.5" x2="17.51" y1="6.5" y2="6.5"></line>
                                            </svg>
                                        </div>
                                        <div class="navbar-instagram-shimmer"></div>
                                        <div class="navbar-instagram-border"></div>
                                    </div>
                                </a>
                            <?php endif; ?>

                            <!-- User Account Button -->
                            <button class="navbar-action-btn">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="navbar-action-icon" aria-hidden="true">
                                    <path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2"></path>
                                    <circle cx="12" cy="7" r="4"></circle>
                                </svg>
                            </button>

                            <!-- Shopping Cart -->
                            <?php if ( $settings['show_cart'] === 'yes' ) : ?>
                                <button class="navbar-action-btn navbar-cart-btn">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="navbar-action-icon" aria-hidden="true">
                                        <circle cx="8" cy="21" r="1"></circle>
                                        <circle cx="19" cy="21" r="1"></circle>
                                        <path d="M2.05 2.05h2l2.66 12.42a2 2 0 0 0 2 1.58h9.78a2 2 0 0 0 1.95-1.57l1.65-7.43H5.12"></path>
                                    </svg>
                                    <?php if ( $settings['cart_count'] > 0 ) : ?>
                                        <span class="navbar-cart-badge"><?php echo esc_html( $settings['cart_count'] ); ?></span>
                                    <?php endif; ?>
                                </button>
                            <?php endif; ?>
                        </div>
                    </div>

                    <!-- Mobile Navigation -->
                    <div class="navbar-mobile-nav" data-mobile-nav>
                        <nav class="navbar-mobile-nav-content">
                            <!-- Mobile Search -->
                            <?php if ( $settings['show_search'] === 'yes' ) : ?>
                                <div class="navbar-mobile-search">
                                    <div class="navbar-search-wrapper">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="navbar-search-icon" aria-hidden="true">
                                            <path d="m21 21-4.34-4.34"></path>
                                            <circle cx="11" cy="11" r="8"></circle>
                                        </svg>
                                        <input type="text" class="navbar-search-input" placeholder="<?php echo esc_attr( $settings['search_placeholder'] ); ?>">
                                    </div>
                                </div>
                            <?php endif; ?>

                            <!-- Mobile Menu Items -->
                            <div class="navbar-mobile-menu">
                                <?php foreach ( $settings['menu_items'] as $index => $item ) : ?>
                                    <?php
                                    $mobile_menu_link_key = 'mobile_menu_link_' . $index;
                                    $this->add_link_attributes( $mobile_menu_link_key, $item['menu_link'] );
                                    ?>
                                    <?php if ( $item['has_dropdown'] === 'yes' && !empty( $item['submenu_items'] ) ) : ?>
                                        <div class="navbar-mobile-menu-group">
                                            <a <?php echo $this->get_render_attribute_string( $mobile_menu_link_key ); ?> class="navbar-mobile-menu-item navbar-mobile-menu-main">
                                                <?php echo esc_html( $item['menu_text'] ); ?>
                                            </a>
                                            <div class="navbar-mobile-submenu">
                                                <?php foreach ( $item['submenu_items'] as $subindex => $subitem ) : ?>
                                                    <?php
                                                    $mobile_submenu_link_key = 'mobile_submenu_link_' . $index . '_' . $subindex;
                                                    $this->add_link_attributes( $mobile_submenu_link_key, $subitem['submenu_link'] );
                                                    ?>
                                                    <?php if ( $subitem['is_coming_soon'] === 'yes' ) : ?>
                                                        <div class="navbar-mobile-submenu-item navbar-mobile-coming-soon">
                                                            <span class="navbar-mobile-submenu-text"><?php echo esc_html( $subitem['submenu_text'] ); ?></span>
                                                            <span class="navbar-coming-soon-badge">Coming Soon</span>
                                                        </div>
                                                    <?php else : ?>
                                                        <a <?php echo $this->get_render_attribute_string( $mobile_submenu_link_key ); ?> class="navbar-mobile-submenu-item">
                                                            <?php echo esc_html( $subitem['submenu_text'] ); ?>
                                                        </a>
                                                    <?php endif; ?>
                                                <?php endforeach; ?>
                                            </div>
                                        </div>
                                    <?php else : ?>
                                        <a <?php echo $this->get_render_attribute_string( $mobile_menu_link_key ); ?> class="navbar-mobile-menu-item">
                                            <?php echo esc_html( $item['menu_text'] ); ?>
                                        </a>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                                <a href="#" class="navbar-mobile-menu-item">My Account</a>
                            </div>
                        </nav>
                    </div>
                </div>
            </header>
        </div>
        <?php
    }

    /**
     * Render widget output in the editor
     */
    protected function content_template() {
        ?>
        <#
        view.addInlineEditingAttributes( 'promo_text', 'basic' );
        view.addInlineEditingAttributes( 'logo_text', 'none' );
        view.addInlineEditingAttributes( 'logo_tagline', 'none' );
        #>
        <div class="slidefire-navbar">
            <# if ( settings.show_promo_banner === 'yes' && settings.promo_text ) { #>
                <!-- Promo Banner -->
                <div class="navbar-promo-banner">
                    <div class="navbar-promo-background"></div>
                    <div class="navbar-promo-content">
                        <p {{{ view.getRenderAttributeString( 'promo_text' ) }}}>{{{ settings.promo_text }}}</p>
                    </div>
                    <div class="navbar-promo-dot navbar-promo-dot-1"></div>
                    <div class="navbar-promo-dot navbar-promo-dot-2"></div>
                    <div class="navbar-promo-dot navbar-promo-dot-3"></div>
                    <div class="navbar-promo-dot navbar-promo-dot-4"></div>
                </div>
            <# } #>

            <!-- Main Header -->
            <header class="slidefire-navbar-header">
                <div class="navbar-container">
                    <div class="navbar-content">
                        <div class="navbar-left">
                            <!-- Mobile Menu Button -->
                            <button class="navbar-mobile-menu-btn">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="navbar-mobile-menu-icon" aria-hidden="true">
                                    <path d="M18 6 6 18"></path>
                                    <path d="m6 6 12 12"></path>
                                </svg>
                            </button>

                            <!-- Logo -->
                            <# if ( settings.logo_text ) { #>
                                <a href="{{{ settings.logo_link.url }}}" class="navbar-logo">
                                    <div class="navbar-logo-content">
                                        <svg class="navbar-logo-icon" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <rect x="2" y="2" width="44" height="44" rx="8" stroke="currentColor" stroke-width="1.5" class="logo-border"></rect>
                                            <rect x="6" y="6" width="36" height="36" rx="4" fill="currentColor" class="logo-bg"></rect>
                                            <path d="M24 12L32 20L28 24L32 28L24 36L16 28L20 24L16 20L24 12Z" fill="currentColor" class="logo-shape"></path>
                                            <path d="M10 16L14 16M10 20L16 20M10 24L14 24M10 28L16 28M10 32L14 32" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" class="logo-lines"></path>
                                            <path d="M34 16L38 16M32 20L38 20M34 24L38 24M32 28L38 28M34 32L38 32" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" class="logo-lines"></path>
                                            <circle cx="8" cy="8" r="1.5" fill="currentColor" class="logo-dots"></circle>
                                            <circle cx="40" cy="8" r="1.5" fill="currentColor" class="logo-dots"></circle>
                                            <circle cx="8" cy="40" r="1.5" fill="currentColor" class="logo-dots"></circle>
                                            <circle cx="40" cy="40" r="1.5" fill="currentColor" class="logo-dots"></circle>
                                        </svg>
                                        <div class="navbar-logo-text">
                                            <div class="navbar-logo-title" {{{ view.getRenderAttributeString( 'logo_text' ) }}}>{{{ settings.logo_text }}}</div>
                                            <# if ( settings.logo_tagline ) { #>
                                                <div class="navbar-logo-tagline" {{{ view.getRenderAttributeString( 'logo_tagline' ) }}}>{{{ settings.logo_tagline }}}</div>
                                            <# } #>
                                        </div>
                                    </div>
                                </a>
                            <# } #>
                        </div>

                        <!-- Preview notice for Editor -->
                        <div class="navbar-nav" style="display: flex; align-items: center; gap: 2rem; color: #23B2EE;">
                            <span>Navigation Menu (Preview)</span>
                        </div>

                        <!-- Search Bar (Desktop) -->
                        <# if ( settings.show_search === 'yes' ) { #>
                            <div class="navbar-search">
                                <div class="navbar-search-wrapper">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="navbar-search-icon" aria-hidden="true">
                                        <path d="m21 21-4.34-4.34"></path>
                                        <circle cx="11" cy="11" r="8"></circle>
                                    </svg>
                                    <input type="text" class="navbar-search-input" placeholder="{{{ settings.search_placeholder }}}">
                                </div>
                            </div>
                        <# } #>

                        <!-- Right Side Icons -->
                        <div class="navbar-actions">
                            <# if ( settings.instagram_url.url ) { #>
                                <a href="{{{ settings.instagram_url.url }}}" class="navbar-instagram-link" title="Follow us on Instagram">
                                    <div class="navbar-instagram-bg"></div>
                                    <div class="navbar-instagram-content">
                                        <div class="navbar-instagram-gradient"></div>
                                        <div class="navbar-instagram-icon-wrapper">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="navbar-instagram-icon" aria-hidden="true">
                                                <rect width="20" height="20" x="2" y="2" rx="5" ry="5"></rect>
                                                <path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path>
                                                <line x1="17.5" x2="17.51" y1="6.5" y2="6.5"></line>
                                            </svg>
                                        </div>
                                    </div>
                                </a>
                            <# } #>

                            <button class="navbar-action-btn">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="navbar-action-icon" aria-hidden="true">
                                    <path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2"></path>
                                    <circle cx="12" cy="7" r="4"></circle>
                                </svg>
                            </button>

                            <# if ( settings.show_cart === 'yes' ) { #>
                                <button class="navbar-action-btn navbar-cart-btn">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="navbar-action-icon" aria-hidden="true">
                                        <circle cx="8" cy="21" r="1"></circle>
                                        <circle cx="19" cy="21" r="1"></circle>
                                        <path d="M2.05 2.05h2l2.66 12.42a2 2 0 0 0 2 1.58h9.78a2 2 0 0 0 1.95-1.57l1.65-7.43H5.12"></path>
                                    </svg>
                                    <# if ( settings.cart_count > 0 ) { #>
                                        <span class="navbar-cart-badge">{{{ settings.cart_count }}}</span>
                                    <# } #>
                                </button>
                            <# } #>
                        </div>
                    </div>
                </div>
            </header>
        </div>
        <?php
    }
}
