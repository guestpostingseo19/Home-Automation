<?php
/**
 * Theme activation: auto-create all pages, CPT entries, blog posts, menu.
 *
 * @package Hyvoxa
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Create or update a post by slug + type.
 */
function hyvoxa_upsert_post( $slug, $type, $args ) {
    $existing = get_page_by_path( $slug, OBJECT, $type );
    if ( $existing ) {
        $args['ID'] = $existing->ID;
        wp_update_post( $args );
        return $existing->ID;
    }
    $args['post_name']  = $slug;
    $args['post_type']  = $type;
    $args['post_status'] = 'publish';
    return wp_insert_post( $args );
}

/**
 * Sideload an image from a URL and set it as the featured image.
 */
function hyvoxa_set_featured_image( $post_id, $image_url ) {
    if ( empty( $image_url ) ) {
        return;
    }
    if ( has_post_thumbnail( $post_id ) ) {
        return;
    }
    require_once ABSPATH . 'wp-admin/includes/media.php';
    require_once ABSPATH . 'wp-admin/includes/file.php';
    require_once ABSPATH . 'wp-admin/includes/image.php';

    $tmp = download_url( $image_url );
    if ( is_wp_error( $tmp ) ) {
        return;
    }

    $file_array = array(
        'name'     => 'hyvoxa-' . $post_id . '.jpg',
        'tmp_name' => $tmp,
    );

    $attachment_id = media_handle_sideload( $file_array, $post_id );
    if ( is_wp_error( $attachment_id ) ) {
        @unlink( $tmp );
        return;
    }
    set_post_thumbnail( $post_id, $attachment_id );
}

/**
 * Convert markdown-style content (## headings) to HTML.
 */
function hyvoxa_markdown_to_html( $content ) {
    $blocks = explode( "\n\n", $content );
    $html   = '';
    foreach ( $blocks as $block ) {
        $block = trim( $block );
        if ( '' === $block ) {
            continue;
        }
        if ( 0 === strpos( $block, '## ' ) ) {
            $heading = substr( $block, 3 );
            $html   .= '<h2>' . esc_html( $heading ) . "</h2>\n\n";
        } elseif ( 0 === strpos( $block, '### ' ) ) {
            $heading = substr( $block, 4 );
            $html   .= '<h3>' . esc_html( $heading ) . "</h3>\n\n";
        } else {
            $html .= '<p>' . nl2br( esc_html( $block ) ) . "</p>\n\n";
        }
    }
    return $html;
}

/**
 * Build HTML content for a service CPT from structured data.
 */
function hyvoxa_build_service_content( $service ) {
    $html = '<p>' . esc_html( $service['intro'] ) . "</p>\n\n";

    $html .= "<h2>Benefits</h2>\n\n";
    foreach ( $service['benefits'] as $benefit ) {
        $html .= '<h3>' . esc_html( $benefit['title'] ) . "</h3>\n";
        $html .= '<p>' . esc_html( $benefit['desc'] ) . "</p>\n\n";
    }

    $html .= "<h2>Features</h2>\n\n<ul>\n";
    foreach ( $service['features'] as $feature ) {
        $html .= '<li>' . esc_html( $feature ) . "</li>\n";
    }
    $html .= "</ul>\n\n";

    $html .= "<h2>Our Process</h2>\n\n";
    foreach ( $service['process'] as $step ) {
        $html .= '<h3>' . esc_html( $step['step'] . '. ' . $step['title'] ) . "</h3>\n";
        $html .= '<p>' . esc_html( $step['desc'] ) . "</p>\n\n";
    }

    $html .= "<h2>FAQ</h2>\n\n";
    foreach ( $service['faqs'] as $faq ) {
        $html .= '<h3>' . esc_html( $faq['q'] ) . "</h3>\n";
        $html .= '<p>' . esc_html( $faq['a'] ) . "</p>\n\n";
    }

    return $html;
}

/**
 * Build HTML content for a legal CPT from structured data.
 */
function hyvoxa_build_legal_content( $legal ) {
    $html = '<p>' . esc_html( $legal['intro'] ) . "</p>\n\n";
    foreach ( $legal['sections'] as $section ) {
        $html .= '<h2>' . esc_html( $section['heading'] ) . "</h2>\n\n";
        foreach ( $section['body'] as $para ) {
            $html .= '<p>' . esc_html( $para ) . "</p>\n\n";
        }
    }
    return $html;
}

/**
 * Store structured data as post meta for use in templates.
 */
function hyvoxa_store_service_meta( $post_id, $service ) {
    update_post_meta( $post_id, '_hyvoxa_service_icon',      $service['icon'] );
    update_post_meta( $post_id, '_hyvoxa_service_short',     $service['short'] );
    update_post_meta( $post_id, '_hyvoxa_service_tagline',   $service['tagline'] );
    update_post_meta( $post_id, '_hyvoxa_service_image_url', $service['image'] );
    update_post_meta( $post_id, '_hyvoxa_service_benefits',  $service['benefits'] );
    update_post_meta( $post_id, '_hyvoxa_service_features',  $service['features'] );
    update_post_meta( $post_id, '_hyvoxa_service_process',   $service['process'] );
    update_post_meta( $post_id, '_hyvoxa_service_faqs',      $service['faqs'] );
    update_post_meta( $post_id, '_hyvoxa_service_meta_desc', $service['meta_description'] );
}

function hyvoxa_store_legal_meta( $post_id, $legal ) {
    update_post_meta( $post_id, '_hyvoxa_legal_last_updated', $legal['last_updated'] );
    update_post_meta( $post_id, '_hyvoxa_legal_intro',        $legal['intro'] );
    update_post_meta( $post_id, '_hyvoxa_legal_sections',     $legal['sections'] );
}

function hyvoxa_store_blog_meta( $post_id, $post_data ) {
    update_post_meta( $post_id, '_hyvoxa_blog_category',  $post_data['category'] );
    update_post_meta( $post_id, '_hyvoxa_blog_read_time', $post_data['read_time'] );
    update_post_meta( $post_id, '_hyvoxa_blog_image_url', $post_data['image'] );
    update_post_meta( $post_id, '_hyvoxa_blog_author',    $post_data['author'] );
}

/**
 * Run the full content creation routine.
 */
function hyvoxa_create_all_content() {
    // Set up site identity
    if ( empty( get_option( 'blogname' ) ) || 'A WordPress Site' === get_option( 'blogname' ) ) {
        update_option( 'blogname', 'Hyvoxa' );
    }
    update_option( 'blogdescription', 'Intelligent homes, effortlessly lived in' );

    // Create static pages
    $pages = array(
        'about'   => array( 'title' => 'About Hyvoxa',        'template' => 'page-about.php' ),
        'contact' => array( 'title' => 'Contact',             'template' => 'page-contact.php' ),
        'blog'    => array( 'title' => 'Blog',                'template' => '' ),
    );

    foreach ( $pages as $slug => $info ) {
        $pid = hyvoxa_upsert_post( $slug, 'page', array(
            'post_title' => $info['title'],
            'post_content' => '',
        ) );
        if ( $info['template'] ) {
            update_post_meta( $pid, '_wp_page_template', $info['template'] );
        }
    }

    // Set blog page as the posts page
    $blog_page = get_page_by_path( 'blog' );
    if ( $blog_page ) {
        update_option( 'page_for_posts', $blog_page->ID );
        update_option( 'show_on_front', 'page' );
    }

    // Create services
    $services = hyvoxa_services_data();
    foreach ( $services as $service ) {
        $pid = hyvoxa_upsert_post( $service['slug'], 'hyvoxa_service', array(
            'post_title'   => $service['title'],
            'post_content' => hyvoxa_build_service_content( $service ),
            'post_excerpt' => $service['excerpt'],
        ) );
        hyvoxa_store_service_meta( $pid, $service );
        hyvoxa_set_featured_image( $pid, $service['image'] );
    }

    // Create blog posts
    $blog_posts = hyvoxa_blog_posts_data();
    foreach ( $blog_posts as $post_data ) {
        $pid = hyvoxa_upsert_post( $post_data['slug'], 'post', array(
            'post_title'    => $post_data['title'],
            'post_content'  => hyvoxa_markdown_to_html( $post_data['content'] ),
            'post_excerpt'  => $post_data['excerpt'],
            'post_date'     => $post_data['date'],
            'post_date_gmt' => $post_data['date'],
            'post_status'   => 'publish',
        ) );
        hyvoxa_store_blog_meta( $pid, $post_data );
        hyvoxa_set_featured_image( $pid, $post_data['image'] );
    }

    // Create legal documents
    $legals = hyvoxa_legal_data();
    foreach ( $legals as $legal ) {
        $pid = hyvoxa_upsert_post( $legal['slug'], 'hyvoxa_legal', array(
            'post_title'   => $legal['title'],
            'post_content' => hyvoxa_build_legal_content( $legal ),
        ) );
        hyvoxa_store_legal_meta( $pid, $legal );
    }

    // Create nav menu
    $menu_name = 'Primary Menu';
    $menu_exists = wp_get_nav_menu_object( $menu_name );
    if ( ! $menu_exists ) {
        $menu_id = wp_create_nav_menu( $menu_name );

        $menu_items = hyvoxa_menu_items();
        foreach ( $menu_items as $item ) {
            wp_update_nav_menu_item( $menu_id, 0, array(
                'menu-item-title'  => $item['title'],
                'menu-item-url'    => $item['url'],
                'menu-item-status' => 'publish',
            ) );
        }

        // Assign to primary location
        $locations = get_theme_mod( 'nav_menu_locations' );
        $locations['primary'] = $menu_id;
        set_theme_mod( 'nav_menu_locations', $locations );
    }

    // Set front page to show latest posts on home (front-page.php handles display)
    update_option( 'show_on_front', 'page' );
    $front_page = get_page_by_path( 'home' );
    if ( ! $front_page ) {
        $front_page_id = wp_insert_post( array(
            'post_title'  => 'Home',
            'post_name'   => 'home',
            'post_type'   => 'page',
            'post_status' => 'publish',
            'post_content' => '',
        ) );
    } else {
        $front_page_id = $front_page->ID;
    }
    update_option( 'page_on_front', $front_page_id );

    flush_rewrite_rules();
}

/**
 * Hook into after_switch_theme to auto-create content.
 */
function hyvoxa_after_switch_theme() {
    hyvoxa_create_all_content();
}
add_action( 'after_switch_theme', 'hyvoxa_after_switch_theme' );
