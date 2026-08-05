<?php
/**
 * Header template.
 *
 * @package Hyvoxa
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#2e3532">
    <link rel="icon" type="image/svg+xml" href="<?php echo esc_url( HYVOXA_URI . '/assets/images/favicon.svg' ); ?>">
    <?php wp_head(); ?>
</head>
<body <?php body_class( 'bg-linen-100' ); ?>>
<?php wp_body_open(); ?>
<div class="flex min-h-screen flex-col">

    <header id="hyvoxa-navbar" class="fixed inset-x-0 top-0 z-50 transition-all duration-500">
        <nav class="mx-auto flex max-w-7xl items-center justify-between px-5 py-4 lg:px-8">
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="group flex items-center gap-2.5" aria-label="Hyvoxa home">
                <span class="relative flex h-10 w-10 items-center justify-center rounded-xl transition-transform duration-300 group-hover:scale-110" style="background: linear-gradient(135deg, #8b2635, #7a212e);">
                    <?php hyvoxa_the_icon( 'cpu' ); ?>
                    <span class="absolute inset-0 rounded-xl ring-1 ring-inset" style="ring-color: rgba(224,226,219,0.2);"></span>
                </span>
                <span class="font-display text-xl font-bold tracking-tight text-linen-100">
                    Hyvo<span class="text-tea-300">xa</span>
                </span>
            </a>

            <ul class="hidden items-center gap-1 md:flex" id="hyvoxa-nav-menu">
                <?php
                if ( has_nav_menu( 'primary' ) ) {
                    wp_nav_menu( array(
                        'theme_location' => 'primary',
                        'container'      => false,
                        'items_wrap'     => '%3$s',
                        'fallback_cb'    => false,
                    ) );
                } else {
                    $fallback = array(
                        array( 'Home',     home_url( '/' ) ),
                        array( 'Services', home_url( '/services/' ) ),
                        array( 'Blog',     home_url( '/blog/' ) ),
                        array( 'About',    home_url( '/about/' ) ),
                        array( 'Contact',  home_url( '/contact/' ) ),
                    );
                    foreach ( $fallback as $item ) {
                        echo '<li><a href="' . esc_url( $item[1] ) . '" class="relative rounded-lg px-4 py-2 text-sm font-medium text-linen-300 hover:text-linen-100 transition-colors">' . esc_html( $item[0] ) . '</a></li>';
                    }
                }
                ?>
            </ul>

            <a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" class="hidden rounded-full bg-tea-300 px-5 py-2.5 text-sm font-semibold text-gunmetal-800 transition-all duration-300 hover:bg-tea-400 hover:shadow-lg md:block">
                Get a Consultation
            </a>

            <button id="hyvoxa-menu-toggle" class="rounded-lg p-2 text-linen-100 md:hidden" aria-label="Toggle menu" aria-expanded="false">
                <svg id="hyvoxa-menu-icon" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="4" x2="20" y1="12" y2="12"/><line x1="4" x2="20" y1="6" y2="6"/><line x1="4" x2="20" y1="18" y2="18"/></svg>
                <svg id="hyvoxa-close-icon" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="display:none;"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg>
            </button>
        </nav>

        <div id="hyvoxa-mobile-menu" class="md:hidden" style="display:none;">
            <div class="animate-slide-down border-t" style="background: rgba(46,53,50,0.95); backdrop-filter: blur(16px); border-color: rgba(224,226,219,0.1);">
                <ul class="flex flex-col gap-1 px-5 py-4">
                    <?php
                    $fallback = array(
                        array( 'Home',     home_url( '/' ) ),
                        array( 'Services', home_url( '/services/' ) ),
                        array( 'Blog',     home_url( '/blog/' ) ),
                        array( 'About',    home_url( '/about/' ) ),
                        array( 'Contact',  home_url( '/contact/' ) ),
                    );
                    foreach ( $fallback as $item ) {
                        echo '<li><a href="' . esc_url( $item[1] ) . '" class="block w-full rounded-lg px-4 py-3 text-base font-medium text-linen-200 hover:bg-white/5 transition-colors">' . esc_html( $item[0] ) . '</a></li>';
                    }
                    ?>
                    <li class="mt-2">
                        <a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" class="block w-full rounded-full bg-tea-300 px-5 py-3 text-center text-sm font-semibold text-gunmetal-800">
                            Get a Consultation
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </header>

    <main class="flex-1">
