<?php
/**
 * Lumina SEO & Social Integration - Market Success Edition
 * 
 * @package Lumina
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Output Meta Description, Open Graph & Twitter Cards
 */
function lumina_seo_tags() {
    $description = get_bloginfo( 'description' );
    $site_name   = get_bloginfo( 'name' );
    $url         = ( is_single() || is_page() ) ? get_permalink() : home_url( '/' );
    $type        = 'website';
    $title       = get_bloginfo( 'name' );
    $image       = '';

    // Handle Singular Content
    if ( is_single() || is_page() ) {
        $post = get_post();
        if ( ! empty( $post->post_excerpt ) ) {
            $description = wp_strip_all_tags( $post->post_excerpt );
        } else {
            $description = wp_trim_words( $post->post_content, 25 );
        }
        $type = 'article';
        $title = get_the_title() . ' | ' . $site_name;
    }

    // Image Logic (Featured -> Logo -> Placeholder)
    if ( has_post_thumbnail() ) {
        $img_data = wp_get_attachment_image_src( get_post_thumbnail_id(), 'large' );
        if ( $img_data ) $image = $img_data[0];
    } elseif ( has_custom_logo() ) {
        $logo_id = get_theme_mod( 'custom_logo' );
        $logo_data = wp_get_attachment_image_src( $logo_id, 'full' );
        if ( $logo_data ) $image = $logo_data[0];
    }

    // Encoding
    $description = esc_attr( $description );
    $title       = esc_attr( $title );
    $url         = esc_url( $url );
    $image       = esc_url( $image );

    // Standard Meta
    echo '<meta name="description" content="' . $description . '">' . "\n";

    // Open Graph
    echo '<meta property="og:title" content="' . $title . '">' . "\n";
    echo '<meta property="og:description" content="' . $description . '">' . "\n";
    echo '<meta property="og:url" content="' . $url . '">' . "\n";
    echo '<meta property="og:site_name" content="' . esc_attr( $site_name ) . '">' . "\n";
    echo '<meta property="og:type" content="' . esc_attr( $type ) . '">' . "\n";
    if ( $image ) echo '<meta property="og:image" content="' . $image . '">' . "\n";

    // Twitter Cards (Summary Large Image)
    echo '<meta name="twitter:card" content="summary_large_image">' . "\n";
    echo '<meta name="twitter:title" content="' . $title . '">' . "\n";
    echo '<meta name="twitter:description" content="' . $description . '">' . "\n";
    if ( $image ) echo '<meta name="twitter:image" content="' . $image . '">' . "\n";
}
add_action( 'wp_head', 'lumina_seo_tags', 1 );
