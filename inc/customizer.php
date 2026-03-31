<?php
/**
 * Lumina Customizer Functionality - Premium Features
 * 
 * @package Lumina
 */

function lumina_customize_register( $wp_customize ) {

    // --- Section: Hero Options ---
    $wp_customize->add_section( 'lumina_hero_options', array(
        'title'    => esc_html__( 'Hero Section', 'lumina' ),
        'priority' => 30,
    ) );

    $wp_customize->add_setting( 'hero_title', array(
        'default'           => esc_html__( 'I Create Digital Aura for Bold Brands.', 'lumina' ),
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'refresh',
    ) );
    $wp_customize->add_control( 'hero_title', array(
        'label'    => esc_html__( 'Hero Title', 'lumina' ),
        'section'  => 'lumina_hero_options',
        'type'     => 'text',
    ) );

    $wp_customize->add_setting( 'hero_subtitle', array(
        'default'           => esc_html__( 'Independent designer and developer focusing on premium web experiences.', 'lumina' ),
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'refresh',
    ) );
    $wp_customize->add_control( 'hero_subtitle', array(
        'label'    => esc_html__( 'Hero Subtitle', 'lumina' ),
        'section'  => 'lumina_hero_options',
        'type'     => 'textarea',
    ) );

    // --- Section: Visibility Toggles ---
    $wp_customize->add_section( 'lumina_visibility_options', array(
        'title'    => esc_html__( 'Section Visibility', 'lumina' ),
        'priority' => 35,
    ) );

    $sections = array(
        'show_about'     => esc_html__( 'Show About Section', 'lumina' ),
        'show_portfolio' => esc_html__( 'Show Portfolio Section', 'lumina' ),
        'show_contact'   => esc_html__( 'Show Contact Section', 'lumina' ),
    );

    foreach ( $sections as $id => $label ) {
        $wp_customize->add_setting( $id, array(
            'default'           => true,
            'sanitize_callback' => 'lumina_sanitize_checkbox',
            'transport'         => 'refresh',
        ) );
        $wp_customize->add_control( $id, array(
            'label'    => $label,
            'section'  => 'lumina_visibility_options',
            'type'     => 'checkbox',
        ) );
    }

    // --- Section: General Options (Typography & Layout) ---
    $wp_customize->add_section( 'lumina_general_options', array(
        'title'    => esc_html__( 'General Design Settings', 'lumina' ),
        'priority' => 40,
    ) );

    // Font Selection
    $wp_customize->add_setting( 'typography_mode', array(
        'default'           => 'sans',
        'sanitize_callback' => 'lumina_sanitize_select',
        'transport'         => 'refresh',
    ) );
    $wp_customize->add_control( 'typography_mode', array(
        'label'    => esc_html__( 'Typography Style', 'lumina' ),
        'section'  => 'lumina_general_options',
        'type'     => 'select',
        'choices'  => array(
            'sans'  => esc_html__( 'Modern Sans-Serif', 'lumina' ),
            'serif' => esc_html__( 'Classic Serif', 'lumina' ),
        ),
    ) );

    // Layout Switch
    $wp_customize->add_setting( 'layout_mode', array(
        'default'           => 'full',
        'sanitize_callback' => 'lumina_sanitize_select',
        'transport'         => 'refresh',
    ) );
    $wp_customize->add_control( 'layout_mode', array(
        'label'    => esc_html__( 'Site Layout', 'lumina' ),
        'section'  => 'lumina_general_options',
        'type'     => 'radio',
        'choices'  => array(
            'full'  => esc_html__( 'Full Width', 'lumina' ),
            'boxed' => esc_html__( 'Boxed', 'lumina' ),
        ),
    ) );

    // Accent Color (Move to General)
    $wp_customize->add_setting( 'lumina_accent_color', array(
        'default'           => '#6366F1',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport'         => 'refresh',
    ) );
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'lumina_accent_color', array(
        'label'    => esc_html__( 'Accent Color', 'lumina' ),
        'section'  => 'lumina_general_options',
    ) ) );

    // Cursor (Move to General)
    $wp_customize->add_setting( 'lumina_magnetic_cursor', array(
        'default'           => true,
        'sanitize_callback' => 'lumina_sanitize_checkbox',
        'transport'         => 'refresh',
    ) );
    $wp_customize->add_control( 'lumina_magnetic_cursor', array(
        'label'    => esc_html__( 'Enable Magnetic Cursor', 'lumina' ),
        'section'  => 'lumina_general_options',
        'type'     => 'checkbox',
    ) );
}
add_action( 'customize_register', 'lumina_customize_register' );

/**
 * Sanitize Select
 */
function lumina_sanitize_select( $input, $setting ) {
    $choices = $setting->manager->get_control( $setting->id )->choices;
    return ( array_key_exists( $input, $choices ) ? $input : $setting->default );
}

/**
 * Sanitize Checkbox
 */
function lumina_sanitize_checkbox( $checked ) {
    return ( ( isset( $checked ) && true == $checked ) ? true : false );
}

/**
 * Output Customizer CSS - Dynamic Styles
 */
function lumina_customizer_css() {
    $accent_color = get_theme_mod( 'lumina_accent_color', '#6366F1' );
    $font_mode = get_theme_mod( 'typography_mode', 'sans' );
    $layout_mode = get_theme_mod( 'layout_mode', 'full' );
    
    ?>
    <style type="text/css">
        :root {
            --color-accent: <?php echo esc_attr( $accent_color ); ?>;
            <?php if ( $font_mode === 'serif' ) : ?>
                --font-heading: 'Lora', serif;
                --font-body: 'Source Serif Pro', serif;
            <?php endif; ?>
        }
        
        <?php if ( $layout_mode === 'boxed' ) : ?>
        .site {
            max-width: 1320px;
            margin: 0 auto;
            box-shadow: 0 0 50px rgba(0,0,0,0.4);
            background: var(--color-bg);
        }
        body { background: #000; }
        <?php endif; ?>
    </style>
    <?php
}
add_action( 'wp_head', 'lumina_customizer_css' );
