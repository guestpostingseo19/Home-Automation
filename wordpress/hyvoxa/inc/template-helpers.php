<?php
/**
 * Template helper functions for Hyvoxa theme.
 *
 * @package Hyvoxa
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Get a service icon SVG by icon key.
 */
function hyvoxa_icon_svg( $icon ) {
    $icons = array(
        'lightbulb'    => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 18h6"/><path d="M10 22h4"/><path d="M15.09 14c.18-.98.65-1.74 1.41-2.5A4.65 4.65 0 0 0 18 8 6 6 0 0 0 6 8c0 1 .23 2.23 1.5 3.5A4.61 4.61 0 0 1 8.91 14"/></svg>',
        'thermometer'  => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M14 4v10.54a4 4 0 1 1-4 0V4a2 2 0 0 1 4 0Z"/></svg>',
        'shield'       => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 13c0 5-3.5 7.5-7.66 8.95a1 1 0 0 1-.67-.01C7.5 20.5 4 18 4 13V6a1 1 0 0 1 1-1c2 0 4.5-1.2 6.24-2.72a1.17 1.17 0 0 1 1.52 0C14.51 3.81 17 5 19 5a1 1 0 0 1 1 1z"/><path d="m9 12 2 2 4-4"/></svg>',
        'clapperboard' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20.2 6 3 11l-.9-2.4c-.3-1.1.3-2.2 1.3-2.5l13.5-4c1.1-.3 2.2.3 2.5 1.3Z"/><path d="m6.2 5.3 3.1 3.9"/><path d="m12.4 3.4 3.1 4"/><path d="M3 11h18v3a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2Z"/></svg>',
        'mic'          => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 2a3 3 0 0 0-3 3v7a3 3 0 0 0 6 0V5a3 3 0 0 0-3-3Z"/><path d="M19 10v2a7 7 0 0 1-14 0v-2"/><line x1="12" x2="12" y1="19" y2="22"/></svg>',
        'trees'        => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M10 10v.2A3 3 0 0 1 8.9 16v0H5v0h0a3 3 0 0 1-1-5.8V10a3 3 0 0 1 6 0Z"/><path d="M7 16v6"/><path d="M13 19h6"/><path d="M16 22V11a4 4 0 0 0-4-4 4 4 0 0 0-4 4"/></svg>',
        'cpu'          => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect width="16" height="16" x="4" y="4" rx="2"/><rect width="6" height="6" x="8" y="8" rx="1"/><path d="M15 2v2"/><path d="M15 20v2"/><path d="M2 15h2"/><path d="M2 9h2"/><path d="M20 15h2"/><path d="M20 9h2"/><path d="M9 2v2"/><path d="M9 20v2"/></svg>',
        'arrow-right'  => '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg>',
        'arrow-left'   => '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m12 19-7-7 7-7"/><path d="M19 12H5"/></svg>',
        'check'        => '<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 6 9 17l-5-5"/></svg>',
        'chevron-down' => '<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m6 9 6 6 6-6"/></svg>',
        'mail'         => '<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect width="20" height="16" x="2" y="4" rx="2"/><path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"/></svg>',
        'phone'        => '<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92Z"/></svg>',
        'map-pin'      => '<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0Z"/><circle cx="12" cy="10" r="3"/></svg>',
        'clock'        => '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>',
        'calendar'     => '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M8 2v4"/><path d="M16 2v4"/><rect width="18" height="18" x="3" y="4" rx="2"/><path d="M3 10h18"/></svg>',
        'user'         => '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>',
        'search'       => '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="11" cy="11" r="8"/><path d="m21 21-4.3-4.3"/></svg>',
        'menu'         => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="4" x2="20" y1="12" y2="12"/><line x1="4" x2="20" y1="6" y2="6"/><line x1="4" x2="20" y1="18" y2="18"/></svg>',
        'x'            => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg>',
        'sparkles'     => '<svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m12 3-1.912 5.813a2 2 0 0 1-1.275 1.275L3 12l5.813 1.912a2 2 0 0 1 1.275 1.275L12 21l1.912-5.813a2 2 0 0 1 1.275-1.275L21 12l-5.813-1.912a2 2 0 0 1-1.275-1.275L12 3Z"/><path d="M5 3v4"/><path d="M19 17v4"/><path d="M3 5h4"/><path d="M17 19h4"/></svg>',
        'quote'        => '<svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M16 3a2 2 0 0 0-2 2v6a2 2 0 0 0 2 2 1 1 0 0 1 1 1v1a2 2 0 0 1-2 2 1 1 0 0 0-1 1v1a1 1 0 0 0 1 1 6 6 0 0 0 6-6V5a2 2 0 0 0-2-2z"/><path d="M5 3a2 2 0 0 0-2 2v6a2 2 0 0 0 2 2 1 1 0 0 1 1 1v1a2 2 0 0 1-2 2 1 1 0 0 0-1 1v1a1 1 0 0 0 1 1 6 6 0 0 0 6-6V5a2 2 0 0 0-2-2z"/></svg>',
        'zap'          => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 14a1 1 0 0 1-.78-1.63l9.9-10.2a.5.5 0 0 1 .86.46l-1.92 6.02A1 1 0 0 0 13 10h7a1 1 0 0 1 .78 1.63l-9.9 10.2a.5.5 0 0 1-.86-.46l1.92-6.02A1 1 0 0 0 11 14z"/></svg>',
        'leaf'         => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M11 20A7 7 0 0 1 9.8 6.1C15.5 5 17 4.48 19 2c1 2 2 4.18 2 8 0 5.5-4.78 10-10 10Z"/><path d="M2 21c0-3 1.85-5.36 5.08-6"/></svg>',
        'lock'         => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect width="18" height="11" x="3" y="11" rx="2" ry="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>',
        'heart'        => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M19 14c1.49-1.46 3-3.21 3-5.5A5.5 5.5 0 0 0 16.5 3c-1.76 0-3 .5-4.5 2-1.5-1.5-2.74-2-4.5-2A5.5 5.5 0 0 0 2 8.5c0 2.29 1.51 4.04 3 5.5l7 7Z"/></svg>',
        'award'        => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="8" r="6"/><path d="M15.477 12.89 17 22l-5-3-5 3 1.523-9.11"/></svg>',
        'users'        => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M22 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>',
        'target'       => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><circle cx="12" cy="12" r="6"/><circle cx="12" cy="12" r="2"/></svg>',
        'eye'          => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M2.062 12.348a1 1 0 0 1 0-.696 10.75 10.75 0 0 1 19.876 0 1 1 0 0 1 0 .696 10.75 10.75 0 0 1-19.876 0"/><circle cx="12" cy="12" r="3"/></svg>',
        'file-text'    => '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M15 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7Z"/><path d="M14 2v4a2 2 0 0 0 2 2h4"/><path d="M10 9H8"/><path d="M16 13H8"/><path d="M16 17H8"/></svg>',
        'shield-check' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 13c0 5-3.5 7.5-7.66 8.95a1 1 0 0 1-.67-.01C7.5 20.5 4 18 4 13V6a1 1 0 0 1 1-1c2 0 4.5-1.2 6.24-2.72a1.17 1.17 0 0 1 1.52 0C14.51 3.81 17 5 19 5a1 1 0 0 1 1 1z"/></svg>',
    );
    return isset( $icons[ $icon ] ) ? $icons[ $icon ] : $icons['cpu'];
}

/**
 * Echo an icon SVG safely.
 */
function hyvoxa_the_icon( $icon ) {
    echo hyvoxa_icon_svg( $icon ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- static SVG strings
}

/**
 * Get site settings with caching.
 */
function hyvoxa_get_settings() {
    static $settings = null;
    if ( null === $settings ) {
        $settings = hyvoxa_site_settings();
    }
    return $settings;
}

/**
 * Get the service meta for a post.
 */
function hyvoxa_get_service_meta( $post_id ) {
    return array(
        'icon'      => get_post_meta( $post_id, '_hyvoxa_service_icon', true ),
        'short'     => get_post_meta( $post_id, '_hyvoxa_service_short', true ),
        'tagline'   => get_post_meta( $post_id, '_hyvoxa_service_tagline', true ),
        'image_url' => get_post_meta( $post_id, '_hyvoxa_service_image_url', true ),
        'benefits'  => get_post_meta( $post_id, '_hyvoxa_service_benefits', true ),
        'features'  => get_post_meta( $post_id, '_hyvoxa_service_features', true ),
        'process'   => get_post_meta( $post_id, '_hyvoxa_service_process', true ),
        'faqs'      => get_post_meta( $post_id, '_hyvoxa_service_faqs', true ),
        'meta_desc' => get_post_meta( $post_id, '_hyvoxa_service_meta_desc', true ),
    );
}

/**
 * Get the legal meta for a post.
 */
function hyvoxa_get_legal_meta( $post_id ) {
    return array(
        'last_updated' => get_post_meta( $post_id, '_hyvoxa_legal_last_updated', true ),
        'intro'        => get_post_meta( $post_id, '_hyvoxa_legal_intro', true ),
        'sections'     => get_post_meta( $post_id, '_hyvoxa_legal_sections', true ),
    );
}

/**
 * Get the blog post meta.
 */
function hyvoxa_get_blog_meta( $post_id ) {
    return array(
        'category'  => get_post_meta( $post_id, '_hyvoxa_blog_category', true ),
        'read_time' => get_post_meta( $post_id, '_hyvoxa_blog_read_time', true ),
        'image_url' => get_post_meta( $post_id, '_hyvoxa_blog_image_url', true ),
        'author'    => get_post_meta( $post_id, '_hyvoxa_blog_author', true ),
    );
}

/**
 * Get the fallback image URL for a post (featured image or stored URL).
 */
function hyvoxa_get_post_image( $post_id, $meta_key = '' ) {
    if ( has_post_thumbnail( $post_id ) ) {
        $img = wp_get_attachment_image_src( get_post_thumbnail_id( $post_id ), 'hyvoxa-card' );
        if ( $img ) {
            return $img[0];
        }
    }
    if ( $meta_key ) {
        $url = get_post_meta( $post_id, $meta_key, true );
        if ( $url ) {
            return $url;
        }
    }
    return '';
}

/**
 * Output the animated hero SVG illustration.
 */
function hyvoxa_hero_illustration() {
    ?>
    <svg viewBox="0 0 500 420" class="h-full w-full animate-fade-in-up" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
        <ellipse cx="250" cy="380" rx="200" ry="30" fill="#d3efbd" opacity="0.08" />
        <path d="M120 210 L250 110 L380 210 L380 350 L120 350 Z" stroke="#d3efbd" stroke-width="2" opacity="0.35" />
        <path d="M120 210 L250 110 L380 210" stroke="#d3efbd" stroke-width="3" opacity="0.6" />
        <path d="M250 110 L250 80 M235 90 L250 80 L265 90" stroke="#8b2635" stroke-width="2.5" stroke-linecap="round" />
        <g opacity="0.5" style="transform-origin: 250px 80px;">
            <circle cx="250" cy="80" r="12" stroke="#d3efbd" stroke-width="1.5" class="animate-ping" />
            <circle cx="250" cy="80" r="20" stroke="#d3efbd" stroke-width="1" class="animate-ping animation-delay-150" opacity="0.6" />
            <circle cx="250" cy="80" r="28" stroke="#d3efbd" stroke-width="1" class="animate-ping animation-delay-300" opacity="0.3" />
        </g>
        <rect x="150" y="240" width="50" height="50" rx="4" fill="#d3efbd" opacity="0.3" stroke="#d3efbd" stroke-width="1.5">
            <animate attributeName="opacity" values="0.15;0.45;0.15" dur="3s" repeatCount="indefinite" begin="1s" />
        </rect>
        <rect x="300" y="240" width="50" height="50" rx="4" fill="#d3efbd" opacity="0.3" stroke="#d3efbd" stroke-width="1.5">
            <animate attributeName="opacity" values="0.45;0.15;0.45" dur="3s" repeatCount="indefinite" begin="1s" />
        </rect>
        <rect x="225" y="280" width="50" height="70" rx="4" fill="#8b2635" opacity="0.3" stroke="#8b2635" stroke-width="2" />
        <circle cx="265" cy="318" r="2" fill="#d3efbd" />
        <g class="animate-float">
            <circle cx="80" cy="160" r="14" fill="#2e3532" stroke="#d3efbd" stroke-width="1.5" />
            <path d="M74 160 L86 160 M80 154 L80 166" stroke="#d3efbd" stroke-width="1.5" stroke-linecap="round" />
        </g>
        <g class="animate-float animation-delay-150">
            <circle cx="420" cy="170" r="14" fill="#2e3532" stroke="#d3efbd" stroke-width="1.5" />
            <circle cx="420" cy="170" r="5" fill="none" stroke="#d3efbd" stroke-width="1.5" />
        </g>
        <g class="animate-float animation-delay-300">
            <rect x="38" y="280" width="28" height="28" rx="6" fill="#2e3532" stroke="#8b2635" stroke-width="1.5" />
            <circle cx="52" cy="294" r="4" fill="#8b2635" />
        </g>
        <g class="animate-float" style="animation-delay: 2s;">
            <rect x="438" y="280" width="28" height="28" rx="6" fill="#2e3532" stroke="#d3efbd" stroke-width="1.5" />
            <path d="M446 294 L458 294" stroke="#d3efbd" stroke-width="1.5" stroke-linecap="round" />
        </g>
        <g stroke="#d3efbd" stroke-width="1" opacity="0.2" stroke-dasharray="4 4">
            <line x1="94" y1="160" x2="150" y2="240" />
            <line x1="406" y1="170" x2="350" y2="240" />
            <line x1="66" y1="294" x2="120" y2="310" />
            <line x1="438" y1="294" x2="380" y2="310" />
        </g>
    </svg>
    <?php
}

/**
 * Output the gradient mesh background divs.
 */
function hyvoxa_gradient_mesh() {
    ?>
    <div class="pointer-events-none absolute inset-0 overflow-hidden" aria-hidden="true">
        <div class="absolute -left-32 -top-32 w-96 h-96 rounded-full" style="background: rgba(139,38,53,0.2); filter: blur(120px); animation: hyvoxa-pulse-soft 3s ease-in-out infinite;"></div>
        <div class="absolute -right-32 top-1/3 w-96 h-96 rounded-full" style="background: rgba(212,239,189,0.1); filter: blur(120px); animation: hyvoxa-pulse-soft 3s ease-in-out infinite 1.5s;"></div>
        <div class="absolute bottom-0 left-1/3 w-80 h-80 rounded-full" style="background: rgba(185,67,87,0.1); filter: blur(100px); animation: hyvoxa-pulse-soft 3s ease-in-out infinite 0.8s;"></div>
    </div>
    <?php
}

/**
 * Meta description hook for SEO.
 */
function hyvoxa_meta_description() {
    $desc = '';
    if ( is_front_page() ) {
        $settings = hyvoxa_get_settings();
        $desc = $settings['description'];
    } elseif ( is_singular( 'hyvoxa_service' ) ) {
        $desc = get_post_meta( get_the_ID(), '_hyvoxa_service_meta_desc', true );
    } elseif ( is_singular( 'post' ) ) {
        $desc = wp_strip_all_tags( get_the_excerpt() );
    } elseif ( is_singular( 'hyvoxa_legal' ) ) {
        $intro = get_post_meta( get_the_ID(), '_hyvoxa_legal_intro', true );
        $desc = wp_strip_all_tags( $intro );
    } elseif ( is_post_type_archive( 'hyvoxa_service' ) ) {
        $desc = 'Explore Hyvoxa\'s full range of home automation services: intelligent lighting, climate control, security, entertainment, voice control and outdoor automation.';
    } elseif ( is_home() ) {
        $desc = 'Practical guides and expert insights on smart home automation, energy efficiency, security and the future of connected living from the Hyvoxa team.';
    }
    if ( empty( $desc ) ) {
        $desc = hyvoxa_get_settings()['description'];
    }
    echo '<meta name="description" content="' . esc_attr( wp_trim_words( $desc, 30, '' ) ) . '" />' . "\n";
}
add_action( 'wp_head', 'hyvoxa_meta_description', 1 );

/**
 * Format a date for display.
 */
function hyvoxa_format_date( $date_string ) {
    $timestamp = strtotime( $date_string );
    return date_i18n( 'M j, Y', $timestamp );
}

/**
 * Get all services as WP_Query.
 */
function hyvoxa_get_services_query() {
    return new WP_Query( array(
        'post_type'      => 'hyvoxa_service',
        'posts_per_page' => -1,
        'orderby'        => 'menu_order',
        'order'          => 'ASC',
    ) );
}

/**
 * Get recent blog posts.
 */
function hyvoxa_get_blog_posts_query( $limit = 6 ) {
    return new WP_Query( array(
        'post_type'      => 'post',
        'posts_per_page' => $limit,
        'orderby'        => 'date',
        'order'          => 'DESC',
    ) );
}

/**
 * Get all legal documents.
 */
function hyvoxa_get_legal_query() {
    return new WP_Query( array(
        'post_type'      => 'hyvoxa_legal',
        'posts_per_page' => -1,
        'orderby'        => 'menu_order',
        'order'          => 'ASC',
    ) );
}

/**
 * Get the next service in order.
 */
function hyvoxa_get_next_service( $current_id ) {
    $services = hyvoxa_get_services_query();
    $next     = null;
    $found    = false;
    while ( $services->have_posts() ) {
        $services->the_post();
        if ( $found ) {
            $next = array(
                'id'    => get_the_ID(),
                'title' => get_the_title(),
                'slug'  => get_post_field( 'post_name', get_the_ID() ),
                'short' => get_post_meta( get_the_ID(), '_hyvoxa_service_short', true ),
            );
            break;
        }
        if ( get_the_ID() === $current_id ) {
            $found = true;
        }
    }
    wp_reset_postdata();
    if ( ! $next ) {
        // Wrap to first
        $services = hyvoxa_get_services_query();
        if ( $services->have_posts() ) {
            $services->the_post();
            $next = array(
                'id'    => get_the_ID(),
                'title' => get_the_title(),
                'slug'  => get_post_field( 'post_name', get_the_ID() ),
                'short' => get_post_meta( get_the_ID(), '_hyvoxa_service_short', true ),
            );
            wp_reset_postdata();
        }
    }
    return $next;
}
