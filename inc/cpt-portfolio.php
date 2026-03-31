<?php
/**
 * Lumina Portfolio Custom Post Type & Meta Boxes
 * 
 * @package Lumina
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Register Portfolio Post Type & Taxonomy
 */
function lumina_register_portfolio() {
    $labels = array(
        'name'               => _x( 'Projects', 'post type general name', 'lumina' ),
        'singular_name'      => _x( 'Project', 'post type singular name', 'lumina' ),
        'menu_name'          => _x( 'Portfolio', 'admin menu', 'lumina' ),
        'name_admin_bar'     => _x( 'Project', 'add new on admin bar', 'lumina' ),
        'add_new'            => _x( 'Add New', 'project', 'lumina' ),
        'add_new_item'       => __( 'Add New Project', 'lumina' ),
        'new_item'           => __( 'New Project', 'lumina' ),
        'edit_item'          => __( 'Edit Project', 'lumina' ),
        'view_item'          => __( 'View Project', 'lumina' ),
        'all_items'          => __( 'All Projects', 'lumina' ),
        'search_items'       => __( 'Search Projects', 'lumina' ),
        'not_found'          => __( 'No projects found.', 'lumina' ),
        'not_found_in_trash' => __( 'No projects found in Trash.', 'lumina' )
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'portfolio' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => 5,
        'menu_icon'          => 'dashicons-portfolio',
        'supports'           => array( 'title', 'editor', 'thumbnail', 'excerpt' ),
        'show_in_rest'       => true,
    );
    register_post_type( 'portfolio', $args );

    // Category Taxonomy
    register_taxonomy( 'portfolio_category', 'portfolio', array(
        'label'        => __( 'Project Categories', 'lumina' ),
        'rewrite'      => array( 'slug' => 'portfolio-category' ),
        'hierarchical' => true,
        'show_in_rest' => true,
    ) );
}
add_action( 'init', 'lumina_register_portfolio' );

/**
 * Meta Boxes logic
 */
function lumina_portfolio_meta_boxes() {
    add_meta_box( 'lumina_project_details', __( 'Project Details', 'lumina' ), 'lumina_render_portfolio_meta', 'portfolio', 'side', 'default' );
}
add_action( 'add_meta_boxes', 'lumina_portfolio_meta_boxes' );

function lumina_render_portfolio_meta( $post ) {
    wp_nonce_field( 'lumina_save_metabox', 'lumina_meta_nonce' );
    $client = get_post_meta( $post->ID, '_project_client', true );
    $year   = get_post_meta( $post->ID, '_project_year', true );
    $tech   = get_post_meta( $post->ID, '_project_tech', true );

    echo '<p><label>' . esc_html__( 'Client', 'lumina' ) . '</label><br><input type="text" name="project_client" value="' . esc_attr( $client ) . '" style="width:100%;"></p>';
    echo '<p><label>' . esc_html__( 'Year', 'lumina' ) . '</label><br><input type="text" name="project_year" value="' . esc_attr( $year ) . '" style="width:100%;"></p>';
    echo '<p><label>' . esc_html__( 'Technologies', 'lumina' ) . '</label><br><input type="text" name="project_tech" value="' . esc_attr( $tech ) . '" style="width:100%;"></p>';
}

function lumina_save_portfolio_meta( $post_id ) {
    if ( ! isset( $_POST['lumina_meta_nonce'] ) || ! wp_verify_nonce( $_POST['lumina_meta_nonce'], 'lumina_save_metabox' ) ) return;
    if ( ! current_user_can( 'edit_post', $post_id ) ) return;
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;

    $fields = array( 'project_client' => '_project_client', 'project_year' => '_project_year', 'project_tech' => '_project_tech' );
    foreach ( $fields as $key => $meta_key ) {
        if ( isset( $_POST[$key] ) ) update_post_meta( $post_id, $meta_key, sanitize_text_field( $_POST[$key] ) );
    }
}
add_action( 'save_post', 'lumina_save_portfolio_meta' );
