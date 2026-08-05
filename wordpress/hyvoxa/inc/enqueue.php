<?php
/**
 * Enqueue scripts and styles.
 *
 * @package Hyvoxa
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

function hyvoxa_enqueue_assets() {
    // Tailwind compiled utilities
    wp_enqueue_style(
        'hyvoxa-tailwind',
        HYVOXA_URI . '/assets/css/tailwind.css',
        array(),
        HYVOXA_VERSION
    );

    // Theme base styles (style.css — also needed for theme metadata)
    wp_enqueue_style(
        'hyvoxa-style',
        get_stylesheet_uri(),
        array( 'hyvoxa-tailwind' ),
        HYVOXA_VERSION
    );

    // Google Fonts
    wp_enqueue_style(
        'hyvoxa-fonts',
        'https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&family=Space+Grotesk:wght@400;500;600;700&display=swap',
        array(),
        null
    );

    // Main script
    wp_enqueue_script(
        'hyvoxa-main',
        HYVOXA_URI . '/assets/js/main.js',
        array(),
        HYVOXA_VERSION,
        true
    );

    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
}
add_action( 'wp_enqueue_scripts', 'hyvoxa_enqueue_assets' );

function hyvoxa_preconnect_fonts( $html, $handle ) {
    if ( 'hyvoxa-fonts' === $handle ) {
        return '<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>'
             . '<link rel="preconnect" href="https://fonts.googleapis.com">'
             . $html;
    }
    return $html;
}
add_filter( 'style_loader_tag', 'hyvoxa_preconnect_fonts', 10, 2 );
