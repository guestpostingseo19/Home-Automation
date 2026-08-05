<?php
/**
 * 404 template.
 *
 * @package Hyvoxa
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

get_header();
?>
<section class="flex min-h-screen items-center justify-center px-5 text-center text-linen-100" style="background: #2e3532;">
    <div class="reveal">
        <div class="font-display text-7xl font-bold text-tea-300">404</div>
        <h1 class="mt-4 font-display text-2xl font-bold">Page not found</h1>
        <p class="mt-3 text-linen-400">The page you are looking for does not exist or has moved.</p>
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="mt-8 inline-flex items-center gap-2 rounded-full bg-tea-300 px-6 py-3 font-semibold text-gunmetal-800 transition-all hover:bg-tea-400">
            Back to Home
        </a>
    </div>
</section>
<?php
get_footer();
