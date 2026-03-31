<?php
/**
 * Lumina Demo Content Installer
 * 
 * @package Lumina
 */

function lumina_install_demo_content() {
    // Only run this if we are in admin and manually triggered (e.g. via a button)
    // For this prototype, we'll check if a certain flag exists in the database
    if ( get_option( 'lumina_demo_content_installed' ) ) {
        return;
    }

    // Projects to create
    $projects = array(
        array(
            'title'   => 'Aura Branding',
            'excerpt' => 'Brand Identity & Strategy',
            'content' => 'Full-scale branding for a high-end fashion label.',
        ),
        array(
            'title'   => 'Lumina Dashboard',
            'excerpt' => 'SaaS Product Design',
            'content' => 'Modern dashboard interface and experience design.',
        ),
        array(
            'title'   => 'Ethos Mobile App',
            'excerpt' => 'iOS & Android Development',
            'content' => 'A clean, minimalist fitness tracking application.',
        ),
        array(
            'title'   => 'Prism Portfolio',
            'excerpt' => 'Web Design & Animation',
            'content' => 'An award-winning interactive portfolio for a photographer.',
        ),
    );

    foreach ( $projects as $project ) {
        $post_id = wp_insert_post( array(
            'post_title'   => $project['title'],
            'post_excerpt' => $project['excerpt'],
            'post_content' => $project['content'],
            'post_status'  => 'publish',
            'post_type'    => 'portfolio',
        ) );
    }

    // Mark as installed
    update_option( 'lumina_demo_content_installed', true );
}

// In a real Envato theme, this would be triggered by a "Import Demo" button.
// For now, I'll hook it to admin_init for demonstration if the user wants.
// add_action( 'admin_init', 'lumina_install_demo_content' );
