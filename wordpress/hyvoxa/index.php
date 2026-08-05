<?php
/**
 * Main index template (fallback).
 *
 * @package Hyvoxa
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

get_header();
?>
<section class="pt-32 pb-20 text-linen-100" style="background: #2e3532;">
    <div class="absolute inset-0 bg-grid opacity-20" aria-hidden="true"></div>
    <div class="relative mx-auto max-w-4xl px-5 text-center lg:px-8">
        <h1 class="font-display text-4xl font-bold sm:text-5xl text-balance">
            <?php
            if ( is_home() ) {
                esc_html_e( 'Blog', 'hyvoxa' );
            } else {
                esc_html_e( 'Hyvoxa', 'hyvoxa' );
            }
            ?>
        </h1>
    </div>
</section>

<section class="bg-linen-100 py-16">
    <div class="mx-auto max-w-7xl px-5 lg:px-8">
        <?php if ( have_posts() ) : ?>
            <div class="grid gap-8 md:grid-cols-2 lg:grid-cols-3">
                <?php while ( have_posts() ) : the_post(); ?>
                    <a href="<?php the_permalink(); ?>" class="group flex flex-col overflow-hidden rounded-2xl bg-white text-left shadow-lg transition-all hover:-translate-y-1.5 hover:shadow-xl" style="box-shadow: 0 4px 20px rgba(46,53,50,0.05);">
                        <?php if ( has_post_thumbnail() ) : ?>
                            <div class="relative h-52 overflow-hidden">
                                <img src="<?php echo esc_url( wp_get_attachment_image_src( get_post_thumbnail_id(), 'hyvoxa-card' )[0] ); ?>" alt="<?php the_title_attribute(); ?>" class="h-full w-full object-cover transition-transform duration-700 group-hover:scale-110" loading="lazy">
                            </div>
                        <?php endif; ?>
                        <div class="p-6">
                            <h2 class="font-display text-lg font-semibold text-gunmetal-800 group-hover:text-amaranth-600 transition-colors"><?php the_title(); ?></h2>
                            <p class="mt-2 text-sm text-gunmetal-500 line-clamp-3"><?php echo esc_html( wp_strip_all_tags( get_the_excerpt() ) ); ?></p>
                        </div>
                    </a>
                <?php endwhile; ?>
            </div>
            <div class="mt-12 flex justify-center">
                <?php
                echo paginate_links( array(
                    'prev_text' => __( '&larr; Previous', 'hyvoxa' ),
                    'next_text' => __( 'Next &rarr;', 'hyvoxa' ),
                ) );
                ?>
            </div>
        <?php else : ?>
            <p class="text-center text-gunmetal-500"><?php esc_html_e( 'No posts found.', 'hyvoxa' ); ?></p>
        <?php endif; ?>
    </div>
</section>

<?php get_footer(); ?>
