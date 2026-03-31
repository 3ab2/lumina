<?php
/**
 * Lumina Theme Functions - Final Polished Edition
 * 
 * @package Lumina
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Theme Setup
 */
function lumina_setup() {
    add_theme_support( 'automatic-feed-links' );
    add_theme_support( 'title-tag' );
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'custom-logo' );

    register_nav_menus( array(
        'primary' => esc_html__( 'Primary Menu', 'lumina' ),
    ) );

    add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'style', 'script' ) );
    add_theme_support( 'responsive-embeds' );
    add_theme_support( 'wp-block-styles' );
    add_theme_support( 'align-wide' );
}
add_action( 'after_setup_theme', 'lumina_setup' );

/**
 * Enqueue scripts and styles.
 */
function lumina_scripts() {
    // Fonts - Conditional based on Customizer
    $font_mode = get_theme_mod( 'typography_mode', 'sans' );
    if ( $font_mode === 'serif' ) {
        wp_enqueue_style( 'lumina-fonts', 'https://fonts.googleapis.com/css2?family=Lora:wght@400;700&family=Source+Serif+Pro:wght@400;600;700&display=swap', array(), null );
    } else {
        wp_enqueue_style( 'lumina-fonts', 'https://fonts.googleapis.com/css2?family=Outfit:wght@400;700&family=Plus+Jakarta+Sans:wght@400;500;700&display=swap', array(), null );
    }

    wp_enqueue_style( 'lumina-style', get_stylesheet_uri(), array(), '1.1.0' );
    wp_enqueue_style( 'lumina-main-css', get_template_directory_uri() . '/assets/css/main.css', array('lumina-style'), '1.1.0' );

    wp_enqueue_script( 'lumina-app-js', get_template_directory_uri() . '/assets/js/app.js', array(), '1.1.2', true );

    // Localize Script for AJAX
    wp_localize_script( 'lumina-app-js', 'lumina_vars', array(
        'ajax_url' => admin_url( 'admin-ajax.php' ),
        'nonce'    => wp_create_nonce( 'lumina_contact_nonce' )
    ) );
}
add_action( 'wp_enqueue_scripts', 'lumina_scripts' );

/**
 * Modular Includes
 */
require get_template_directory() . '/inc/customizer.php';
require get_template_directory() . '/inc/cpt-portfolio.php';
require get_template_directory() . '/inc/contact-handler.php';
require get_template_directory() . '/inc/seo.php';
