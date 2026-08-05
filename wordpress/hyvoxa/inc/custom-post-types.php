<?php
/**
 * Custom post types: hyvoxa_service, hyvoxa_legal
 *
 * @package Hyvoxa
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

function hyvoxa_register_post_types() {

    // Services
    register_post_type( 'hyvoxa_service', array(
        'labels' => array(
            'name'               => __( 'Services', 'hyvoxa' ),
            'singular_name'      => __( 'Service', 'hyvoxa' ),
            'add_new'            => __( 'Add New Service', 'hyvoxa' ),
            'add_new_item'       => __( 'Add New Service', 'hyvoxa' ),
            'edit_item'          => __( 'Edit Service', 'hyvoxa' ),
            'new_item'           => __( 'New Service', 'hyvoxa' ),
            'view_item'          => __( 'View Service', 'hyvoxa' ),
            'search_items'       => __( 'Search Services', 'hyvoxa' ),
            'not_found'          => __( 'No services found', 'hyvoxa' ),
            'not_found_in_trash' => __( 'No services found in Trash', 'hyvoxa' ),
            'menu_name'          => __( 'Services', 'hyvoxa' ),
        ),
        'public'        => true,
        'has_archive'   => true,
        'rewrite'       => array( 'slug' => 'services', 'with_front' => false ),
        'menu_icon'     => 'dashicons-admin-generic',
        'menu_position' => 5,
        'supports'      => array( 'title', 'editor', 'thumbnail', 'excerpt', 'page-attributes' ),
        'show_in_rest'  => true,
    ) );

    // Legal documents
    register_post_type( 'hyvoxa_legal', array(
        'labels' => array(
            'name'               => __( 'Legal Documents', 'hyvoxa' ),
            'singular_name'      => __( 'Legal Document', 'hyvoxa' ),
            'add_new'            => __( 'Add New Document', 'hyvoxa' ),
            'add_new_item'       => __( 'Add New Legal Document', 'hyvoxa' ),
            'edit_item'          => __( 'Edit Legal Document', 'hyvoxa' ),
            'new_item'           => __( 'New Legal Document', 'hyvoxa' ),
            'view_item'          => __( 'View Legal Document', 'hyvoxa' ),
            'search_items'       => __( 'Search Legal Documents', 'hyvoxa' ),
            'not_found'          => __( 'No legal documents found', 'hyvoxa' ),
            'not_found_in_trash' => __( 'No legal documents found in Trash', 'hyvoxa' ),
            'menu_name'          => __( 'Legal', 'hyvoxa' ),
        ),
        'public'        => true,
        'has_archive'   => true,
        'rewrite'       => array( 'slug' => 'legal', 'with_front' => false ),
        'menu_icon'     => 'dashicons-privacy',
        'menu_position' => 20,
        'supports'      => array( 'title', 'editor', 'page-attributes' ),
        'show_in_rest'  => true,
    ) );

    // Blog category taxonomy for services (optional organizational tool)
    register_taxonomy( 'hyvoxa_service_cat', 'hyvoxa_service', array(
        'labels' => array(
            'name'          => __( 'Service Categories', 'hyvoxa' ),
            'singular_name' => __( 'Service Category', 'hyvoxa' ),
        ),
        'hierarchical'      => true,
        'show_admin_column' => true,
        'show_in_rest'      => true,
        'rewrite'           => array( 'slug' => 'service-category' ),
    ) );
}
add_action( 'init', 'hyvoxa_register_post_types' );

function hyvoxa_rewrite_flush() {
    hyvoxa_register_post_types();
    flush_rewrite_rules();
}
