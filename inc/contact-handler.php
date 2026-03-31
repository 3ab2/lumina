<?php
/**
 * Lumina Contact Form AJAX Handler
 * 
 * @package Lumina
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Register Messages Post Type (Data Persistence)
 */
function lumina_register_messages_cpt() {
    register_post_type( 'lumina_messages', array(
        'labels'      => array( 'name' => __( 'Messages', 'lumina' ), 'singular_name' => __( 'Message', 'lumina' ) ),
        'public'      => false,
        'show_ui'     => true,
        'menu_icon'   => 'dashicons-email',
        'supports'    => array( 'title', 'editor' ),
        'show_in_rest' => false,
    ) );
}
add_action( 'init', 'lumina_register_messages_cpt' );

/**
 * AJAX Handler
 */
function lumina_handle_contact_ajax() {
    // Nonce Check
    if ( ! isset( $_POST['nonce'] ) || ! wp_verify_nonce( $_POST['nonce'], 'lumina_contact_nonce' ) ) {
        wp_send_json_error( array( 'message' => __( 'Security verification failed.', 'lumina' ) ) );
    }

    // Sanitize Inputs
    $name    = sanitize_text_field( $_POST['name'] );
    $email   = sanitize_email( $_POST['email'] );
    $message = sanitize_textarea_field( $_POST['message'] );

    if ( empty( $name ) || empty( $email ) || empty( $message ) ) {
        wp_send_json_error( array( 'message' => __( 'All fields are required.', 'lumina' ) ) );
    }

    // 1. Send Email
    $to      = get_option( 'admin_email' );
    $subject = sprintf( __( 'New Message from %s', 'lumina' ), $name );
    $body    = "Name: $name\nEmail: $email\n\nMessage:\n$message";
    $headers = array( 'Content-Type: text/plain; charset=UTF-8', "Reply-To: $name <$email>" );

    $mail_sent = wp_mail( $to, $subject, $body, $headers );
    
    if ( ! $mail_sent ) {
        error_log( 'Lumina Contact: Email failed to ' . $to . ' from ' . $email );
    }

    // 2. Optional: Save to Database
    $post_id = wp_insert_post( array(
        'post_title'   => sprintf( __( 'Message from %s', 'lumina' ), $name ),
        'post_content' => $body,
        'post_type'    => 'lumina_messages',
        'post_status'  => 'private',
    ) );

    if ( is_wp_error( $post_id ) ) {
        error_log( 'Lumina Contact: DB insert failed - ' . $post_id->get_error_message() );
    }

    if ( $mail_sent || $post_id ) {
        wp_send_json_success( array( 'message' => __( 'Your message has been sent successfully.', 'lumina' ) ) );
    } else {
        wp_send_json_error( array( 'message' => __( 'There was an error sending your message.', 'lumina' ) ) );
    }

    wp_die();
}
add_action( 'wp_ajax_lumina_contact_submit', 'lumina_handle_contact_ajax' );
add_action( 'wp_ajax_nopriv_lumina_contact_submit', 'lumina_handle_contact_ajax' );
