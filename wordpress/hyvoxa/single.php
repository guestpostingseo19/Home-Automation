<?php
/**
 * Single blog post page.
 *
 * @package Hyvoxa
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

get_header();

while ( have_posts() ) :
    the_post();

    $meta   = hyvoxa_get_blog_meta( get_the_ID() );
    $img    = hyvoxa_get_post_image( get_the_ID(), '_hyvoxa_blog_image_url' );
    $related_q = hyvoxa_get_blog_posts_query( 4 );

    // Exclude current post from related
    $related_posts = array();
    while ( $related_q->have_posts() ) {
        $related_q->the_post();
        if ( get_the_ID() !== get_queried_object_id() && count( $related_posts ) < 3 ) {
            $related_posts[] = array(
                'id'      => get_the_ID(),
                'title'   => get_the_title(),
                'img'     => hyvoxa_get_post_image( get_the_ID(), '_hyvoxa_blog_image_url' ),
                'cat'     => get_post_meta( get_the_ID(), '_hyvoxa_blog_category', true ),
            );
        }
    }
    wp_reset_postdata();
?>

<!-- Hero -->
<section class="relative overflow-hidden pt-32 pb-20 text-linen-100" style="background: #2e3532;">
    <?php hyvoxa_gradient_mesh(); ?>
    <div class="absolute inset-0 bg-grid opacity-30" aria-hidden="true"></div>
    <div class="reveal relative mx-auto max-w-3xl px-5 lg:px-8">
        <a href="<?php echo esc_url( home_url( '/blog/' ) ); ?>" class="group inline-flex items-center gap-2 text-sm text-linen-400 transition-colors hover:text-tea-300">
            <?php hyvoxa_the_icon( 'arrow-left' ); ?>
            Back to Blog
        </a>
        <span class="mt-6 inline-block rounded-full px-3 py-1 text-xs font-semibold text-tea-300" style="background: rgba(212,239,189,0.15);">
            <?php echo esc_html( $meta['category'] ); ?>
        </span>
        <h1 class="mt-4 font-display text-3xl font-bold leading-tight tracking-tight sm:text-4xl lg:text-5xl text-balance"><?php the_title(); ?></h1>
        <div class="mt-6 flex flex-wrap items-center gap-5 text-sm text-linen-400">
            <span class="inline-flex items-center gap-1.5"><?php hyvoxa_the_icon( 'user' ); ?> <?php echo esc_html( $meta['author'] ); ?></span>
            <span class="inline-flex items-center gap-1.5"><?php hyvoxa_the_icon( 'calendar' ); ?> <?php echo esc_html( get_the_date( 'F j, Y' ) ); ?></span>
            <span class="inline-flex items-center gap-1.5"><?php hyvoxa_the_icon( 'clock' ); ?> <?php echo esc_html( $meta['read_time'] ); ?> read</span>
        </div>
    </div>
</section>

<!-- Cover image -->
<div style="background: #2e3532;">
    <div class="mx-auto -mt-4 max-w-4xl px-5 lg:px-8">
        <?php if ( $img ) : ?>
            <div class="overflow-hidden rounded-2xl shadow-2xl" style="border: 1px solid rgba(224,226,219,0.1);">
                <img src="<?php echo esc_url( $img ); ?>" alt="<?php the_title_attribute(); ?>" class="aspect-[16/9] w-full object-cover">
            </div>
        <?php endif; ?>
    </div>
</div>

<!-- Content -->
<article class="bg-linen-100 py-16">
    <div class="reveal mx-auto max-w-3xl px-5 lg:px-8">
        <p class="mb-8 text-xl font-medium leading-relaxed text-gunmetal-700 text-pretty border-l-4 border-amaranth-600 pl-6">
            <?php echo esc_html( wp_strip_all_tags( get_the_excerpt() ) ); ?>
        </p>
        <div class="prose-hyvoxa max-w-none">
            <?php the_content(); ?>
        </div>

        <!-- Share / contact strip -->
        <div class="mt-12 rounded-2xl p-8 text-center text-linen-100" style="background: #2e3532;">
            <h3 class="font-display text-xl font-bold">Have questions about your smart home?</h3>
            <p class="mt-2 text-sm text-linen-300">Our team is happy to help. Reach out any time.</p>
            <a href="mailto:<?php echo esc_attr( hyvoxa_get_settings()['email'] ); ?>" class="mt-5 inline-flex items-center gap-2 rounded-full bg-tea-300 px-6 py-3 font-semibold text-gunmetal-800 transition-all hover:bg-tea-400">
                <?php hyvoxa_the_icon( 'mail' ); ?>
                <?php echo esc_html( hyvoxa_get_settings()['email'] ); ?>
            </a>
        </div>
    </div>
</article>

<!-- Related -->
<?php if ( ! empty( $related_posts ) ) : ?>
<section class="py-20" style="background: rgba(210,212,200,0.4);">
    <div class="mx-auto max-w-7xl px-5 lg:px-8">
        <h2 class="font-display text-2xl font-bold text-gunmetal-800 sm:text-3xl">Keep reading</h2>
        <div class="mt-8 grid gap-8 md:grid-cols-3">
            <?php foreach ( $related_posts as $i => $rp ) : ?>
                <a href="<?php echo esc_url( get_permalink( $rp['id'] ) ); ?>" class="group reveal flex flex-col overflow-hidden rounded-2xl bg-white text-left shadow-lg transition-all duration-500 hover:-translate-y-1.5 hover:shadow-xl" style="transition-delay: <?php echo esc_attr( $i * 80 ); ?>ms; box-shadow: 0 4px 20px rgba(46,53,50,0.05);">
                    <div class="relative h-44 overflow-hidden">
                        <?php if ( $rp['img'] ) : ?>
                            <img src="<?php echo esc_url( $rp['img'] ); ?>" alt="<?php echo esc_attr( $rp['title'] ); ?>" class="h-full w-full object-cover transition-transform duration-700 group-hover:scale-110" loading="lazy">
                        <?php endif; ?>
                        <span class="absolute left-4 top-4 rounded-full px-3 py-1 text-xs font-semibold text-amaranth-600" style="background: rgba(224,226,219,0.9); backdrop-filter: blur(4px);">
                            <?php echo esc_html( $rp['cat'] ); ?>
                        </span>
                    </div>
                    <div class="p-5">
                        <h3 class="font-display text-base font-semibold leading-snug text-gunmetal-800 group-hover:text-amaranth-600 transition-colors"><?php echo esc_html( $rp['title'] ); ?></h3>
                        <span class="mt-3 inline-flex items-center gap-1.5 text-sm font-semibold text-amaranth-600">
                            Read
                            <?php hyvoxa_the_icon( 'arrow-right' ); ?>
                        </span>
                    </div>
                </a>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<?php endif; ?>

<?php
endwhile;
get_footer();
