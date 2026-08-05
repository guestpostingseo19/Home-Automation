<?php
/**
 * Theme setup: supports, menus, image sizes.
 *
 * @package Hyvoxa
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

function hyvoxa_setup() {
    add_theme_support( 'title-tag' );
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'automatic-feed-links' );
    add_theme_support( 'custom-logo', array(
        'height'      => 40,
        'width'       => 160,
        'flex-height' => true,
        'flex-width'  => true,
    ) );
    add_theme_support( 'html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
        'style',
        'script',
    ) );
    add_theme_support( 'responsive-embeds' );
    add_theme_support( 'align-wide' );
    add_theme_support( 'editor-styles' );
    add_theme_support( 'wp-block-styles' );

    register_nav_menus( array(
        'primary' => __( 'Primary Menu', 'hyvoxa' ),
        'footer'  => __( 'Footer Menu', 'hyvoxa' ),
    ) );

    add_image_size( 'hyvoxa-card', 940, 560, true );
    add_image_size( 'hyvoxa-hero', 1920, 1080, true );
}
add_action( 'after_setup_theme', 'hyvoxa_setup' );

function hyvoxa_content_width() {
    $GLOBALS['content_width'] = 1200;
}
add_action( 'after_setup_theme', 'hyvoxa_content_width', 0 );
