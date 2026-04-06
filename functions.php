<?php
/**
 * Lumina Theme Functions - v2.0 FSE Edition
 * 
 * @package Lumina
 * @version 2.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Theme Setup - Full Site Editing Support
 */
function lumina_setup() {
    // Core WordPress features
    add_theme_support( 'automatic-feed-links' );
    add_theme_support( 'title-tag' );
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'custom-logo' );
    add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'style', 'script' ) );
    add_theme_support( 'responsive-embeds' );
    add_theme_support( 'wp-block-styles' );
    add_theme_support( 'align-wide' );

    // Full Site Editing support
    add_theme_support( 'block-templates' );
    add_theme_support( 'template-parts' );
    add_theme_support( 'editor-styles' );
    add_theme_support( 'editor-font-sizes' );
    add_theme_support( 'editor-color-palette' );
    add_theme_support( 'editor-gradient-presets' );

    // Gutenberg specific features
    add_theme_support( 'experimental-link-color' );
    add_theme_support( 'experimental-custom-spacing' );
    add_theme_support( 'experimental-default-spacing-sizes' );

    // Elementor compatibility
    add_theme_support( 'elementor' );
    add_theme_support( 'elementor-default-theme-templates' );
    add_theme_support( 'elementor-canvas' );
    add_theme_support( 'elementor-header-footer' );

    // Menu locations
    register_nav_menus( array(
        'primary' => esc_html__( 'Primary Menu', 'lumina' ),
        'footer'  => esc_html__( 'Footer Menu', 'lumina' ),
    ) );

    // Custom background (fallback)
    add_theme_support( 'custom-background', array(
        'default-color' => '#0A0A0A',
        'default-image' => '',
    ) );

    // Post formats for blog functionality
    add_theme_support( 'post-formats', array( 'aside', 'gallery', 'link', 'image', 'quote', 'status', 'video', 'audio', 'chat' ) );
}
add_action( 'after_setup_theme', 'lumina_setup' );

/**
 * Enqueue scripts and styles - FSE Optimized
 */
function lumina_scripts() {
    // Google Fonts - Load from theme.json but keep as fallback
    wp_enqueue_style( 'lumina-fonts', 'https://fonts.googleapis.com/css2?family=Outfit:wght@400;700&family=Plus+Jakarta+Sans:wght@400;500;700&family=Lora:wght@400;700&family=Source+Serif+Pro:wght@400;600;700&display=swap', array(), null );

    // Theme stylesheet (minimal, since most styling is in theme.json)
    wp_enqueue_style( 'lumina-style', get_stylesheet_uri(), array(), '2.0.0' );

    // Main CSS for custom components and animations
    wp_enqueue_style( 'lumina-main-css', get_template_directory_uri() . '/assets/css/main.css', array('lumina-style'), '2.0.0' );

    // Theme JavaScript for interactions and AJAX
    wp_enqueue_script( 'lumina-app-js', get_template_directory_uri() . '/assets/js/app.js', array(), '2.0.0', true );

    // Localize Script for AJAX and theme variables
    wp_localize_script( 'lumina-app-js', 'lumina_vars', array(
        'ajax_url'           => admin_url( 'admin-ajax.php' ),
        'nonce'              => wp_create_nonce( 'lumina_contact_nonce' ),
        'theme_version'      => '2.0.0',
        'is_elementor_active' => did_action( 'elementor/loaded' ),
    ) );
}
add_action( 'wp_enqueue_scripts', 'lumina_scripts' );

/**
 * Editor styles for Gutenberg
 */
function lumina_editor_styles() {
    add_editor_style( 'assets/css/editor-style.css' );
}
add_action( 'after_setup_theme', 'lumina_editor_styles' );

/**
 * Register pattern categories
 */
function lumina_pattern_categories() {
    register_block_pattern_category(
        'lumina-hero',
        array(
            'label'       => __( 'Lumina Hero Sections', 'lumina' ),
            'description' => __( 'Hero section patterns for Lumina theme.', 'lumina' ),
        )
    );

    register_block_pattern_category(
        'lumina-portfolio',
        array(
            'label'       => __( 'Lumina Portfolio', 'lumina' ),
            'description' => __( 'Portfolio and project showcase patterns.', 'lumina' ),
        )
    );

    register_block_pattern_category(
        'lumina-about',
        array(
            'label'       => __( 'Lumina About', 'lumina' ),
            'description' => __( 'About section and team patterns.', 'lumina' ),
        )
    );

    register_block_pattern_category(
        'lumina-contact',
        array(
            'label'       => __( 'Lumina Contact', 'lumina' ),
            'description' => __( 'Contact forms and information patterns.', 'lumina' ),
        )
    );
}
add_action( 'init', 'lumina_pattern_categories' );

/**
 * Elementor compatibility
 */
function lumina_elementor_compatibility() {
    // Check if Elementor is active
    if ( ! did_action( 'elementor/loaded' ) ) {
        return;
    }

    // Add Elementor theme support
    add_theme_support( 'elementor' );
    add_theme_support( 'elementor-pro' );
    add_theme_support( 'elementor-default-theme-templates' );
    
    // Register Elementor locations for header/footer
    if ( function_exists( 'elementor_theme_register_location' ) ) {
        elementor_theme_register_location( 'header' );
        elementor_theme_register_location( 'footer' );
    }
}
add_action( 'after_setup_theme', 'lumina_elementor_compatibility' );

/**
 * Block style variations
 */
function lumina_register_block_styles() {
    // Glassmorphism style for groups
    register_block_style(
        'core/group',
        array(
            'name'         => 'glassmorphism',
            'label'        => __( 'Glassmorphism', 'lumina' ),
            'inline_style' => '
                .wp-block-group.is-style-glassmorphism {
                    background: rgba(255, 255, 255, 0.03);
                    backdrop-filter: blur(10px);
                    border: 1px solid rgba(255, 255, 255, 0.1);
                    border-radius: 12px;
                }
            ',
        )
    );

    // Portfolio card style
    register_block_style(
        'core/group',
        array(
            'name'         => 'portfolio-card',
            'label'        => __( 'Portfolio Card', 'lumina' ),
            'inline_style' => '
                .wp-block-group.is-style-portfolio-card {
                    transition: transform 0.3s ease, box-shadow 0.3s ease;
                }
                .wp-block-group.is-style-portfolio-card:hover {
                    transform: translateY(-5px);
                    box-shadow: 0 20px 40px rgba(0, 0, 0, 0.3);
                }
            ',
        )
    );
}
add_action( 'init', 'lumina_register_block_styles' );

/**
 * Modular Includes
 */
require get_template_directory() . '/inc/customizer.php';
require get_template_directory() . '/inc/cpt-portfolio.php';
require get_template_directory() . '/inc/contact-handler.php';
require get_template_directory() . '/inc/seo.php';
