<?php
/**
 * Blog list page.
 *
 * @package Hyvoxa
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

get_header();

// Get all categories from our blog posts meta
$blog_q = hyvoxa_get_blog_posts_query( -1 );
$categories = array( 'All' );
if ( $blog_q->have_posts() ) {
    while ( $blog_q->have_posts() ) {
        $blog_q->the_post();
        $cat = get_post_meta( get_the_ID(), '_hyvoxa_blog_category', true );
        if ( $cat && ! in_array( $cat, $categories, true ) ) {
            $categories[] = $cat;
        }
    }
    wp_reset_postdata();
}

// Featured post = first
$featured_q = hyvoxa_get_blog_posts_query( 1 );
$blog_q     = hyvoxa_get_blog_posts_query( -1 );
?>

<!-- Hero -->
<section class="relative overflow-hidden pt-32 pb-20 text-linen-100" style="background: #2e3532;">
    <?php hyvoxa_gradient_mesh(); ?>
    <div class="absolute inset-0 bg-grid opacity-30" aria-hidden="true"></div>
    <div class="reveal relative mx-auto max-w-4xl px-5 text-center lg:px-8">
        <span class="inline-flex items-center gap-2 rounded-full border px-4 py-1.5 text-xs font-medium text-tea-300" style="border-color: rgba(212,239,189,0.3); background: rgba(212,239,189,0.1);">
            Hyvoxa Blog
        </span>
        <h1 class="mt-6 font-display text-4xl font-bold leading-tight tracking-tight sm:text-5xl lg:text-6xl text-balance">
            Insights for intelligent living
        </h1>
        <p class="mx-auto mt-6 max-w-2xl text-lg leading-relaxed text-linen-300 text-pretty">
            Expert guides on smart home technology, energy savings, security and the trends shaping the future of home automation.
        </p>
    </div>
</section>

<!-- Featured post -->
<?php if ( $featured_q->have_posts() ) : $featured_q->the_post(); $fmeta = hyvoxa_get_blog_meta( get_the_ID() ); $fimg = hyvoxa_get_post_image( get_the_ID(), '_hyvoxa_blog_image_url' ); ?>
<section class="bg-linen-100 py-16">
    <div class="mx-auto max-w-7xl px-5 lg:px-8">
        <a href="<?php the_permalink(); ?>" class="group grid overflow-hidden rounded-2xl bg-white text-left shadow-xl transition-all duration-500 hover:shadow-2xl lg:grid-cols-2" style="box-shadow: 0 10px 40px rgba(46,53,50,0.1);">
            <div class="relative h-64 overflow-hidden lg:h-full">
                <?php if ( $fimg ) : ?>
                    <img src="<?php echo esc_url( $fimg ); ?>" alt="<?php the_title_attribute(); ?>" class="h-full w-full object-cover transition-transform duration-700 group-hover:scale-105">
                <?php endif; ?>
                <span class="absolute left-5 top-5 rounded-full px-3 py-1 text-xs font-semibold text-linen-100" style="background: #8b2635;">Featured</span>
            </div>
            <div class="flex flex-col justify-center p-8 lg:p-12">
                <div class="flex items-center gap-3 text-xs text-gunmetal-400">
                    <span class="font-semibold text-amaranth-600"><?php echo esc_html( $fmeta['category'] ); ?></span>
                    <span>&middot;</span>
                    <span><?php echo esc_html( get_the_date( 'M j, Y' ) ); ?></span>
                    <span>&middot;</span>
                    <span class="inline-flex items-center gap-1"><?php hyvoxa_the_icon( 'clock' ); ?> <?php echo esc_html( $fmeta['read_time'] ); ?></span>
                </div>
                <h2 class="mt-4 font-display text-2xl font-bold leading-snug text-gunmetal-800 group-hover:text-amaranth-600 transition-colors sm:text-3xl text-balance">
                    <?php the_title(); ?>
                </h2>
                <p class="mt-4 text-base leading-relaxed text-gunmetal-500 text-pretty"><?php echo esc_html( wp_strip_all_tags( get_the_excerpt() ) ); ?></p>
                <span class="mt-6 inline-flex items-center gap-2 text-sm font-semibold text-amaranth-600">
                    Read the full article
                    <?php hyvoxa_the_icon( 'arrow-right' ); ?>
                </span>
            </div>
        </a>
    </div>
</section>
<?php wp_reset_postdata(); endif; ?>

<!-- Filter + grid -->
<section class="bg-linen-100 pb-24">
    <div class="mx-auto max-w-7xl px-5 lg:px-8">
        <!-- Controls -->
        <div class="mb-10 flex flex-col gap-6 sm:flex-row sm:items-center sm:justify-between">
            <div class="flex flex-wrap gap-2">
                <?php foreach ( $categories as $cat ) : ?>
                    <button class="hyvoxa-cat-btn <?php echo 'All' === $cat ? 'hyvoxa-cat-active' : ''; ?> rounded-full px-4 py-2 text-sm font-medium transition-all" data-category="<?php echo esc_attr( $cat ); ?>"
                        <?php echo 'All' === $cat ? 'style="background: #2e3532; color: #e0e2db;"' : 'style="background: #fff; color: #5c6360; border: 1px solid rgba(46,53,50,0.1);"' ?>>
                        <?php echo esc_html( $cat ); ?>
                    </button>
                <?php endforeach; ?>
            </div>
            <div class="relative">
                <span class="absolute left-3 top-1/2 -translate-y-1/2 text-gunmetal-400"><?php hyvoxa_the_icon( 'search' ); ?></span>
                <input type="text" id="hyvoxa-blog-search" placeholder="Search articles..." class="w-full rounded-full border bg-white py-2.5 pl-10 pr-4 text-sm text-gunmetal-700 placeholder:text-gunmetal-400 focus:outline-none sm:w-64" style="border-color: rgba(46,53,50,0.1);">
            </div>
        </div>

        <!-- Grid -->
        <?php if ( $blog_q->have_posts() ) : ?>
        <div class="grid gap-8 md:grid-cols-2 lg:grid-cols-3">
            <?php $i = 0; while ( $blog_q->have_posts() ) : $blog_q->the_post(); $i++; ?>
                <?php $meta = hyvoxa_get_blog_meta( get_the_ID() ); $img = hyvoxa_get_post_image( get_the_ID(), '_hyvoxa_blog_image_url' ); ?>
                <a href="<?php the_permalink(); ?>" class="hyvoxa-blog-card group reveal flex flex-col overflow-hidden rounded-2xl bg-white text-left shadow-lg transition-all duration-500 hover:-translate-y-1.5 hover:shadow-xl"
                   data-title="<?php echo esc_attr( get_the_title() ); ?>"
                   data-excerpt="<?php echo esc_attr( wp_strip_all_tags( get_the_excerpt() ) ); ?>"
                   data-category="<?php echo esc_attr( $meta['category'] ); ?>"
                   style="transition-delay: <?php echo esc_attr( min( $i * 80, 400 ) ); ?>ms; box-shadow: 0 4px 20px rgba(46,53,50,0.05);">
                    <div class="relative h-52 overflow-hidden">
                        <?php if ( $img ) : ?>
                            <img src="<?php echo esc_url( $img ); ?>" alt="<?php the_title_attribute(); ?>" class="h-full w-full object-cover transition-transform duration-700 group-hover:scale-110" loading="lazy">
                        <?php endif; ?>
                        <span class="absolute left-4 top-4 rounded-full px-3 py-1 text-xs font-semibold text-amaranth-600" style="background: rgba(224,226,219,0.9); backdrop-filter: blur(4px);">
                            <?php echo esc_html( $meta['category'] ); ?>
                        </span>
                    </div>
                    <div class="flex flex-1 flex-col p-6">
                        <div class="flex items-center gap-3 text-xs text-gunmetal-400">
                            <span><?php echo esc_html( get_the_date( 'M j, Y' ) ); ?></span>
                            <span>&middot;</span>
                            <span class="inline-flex items-center gap-1"><?php hyvoxa_the_icon( 'clock' ); ?> <?php echo esc_html( $meta['read_time'] ); ?></span>
                        </div>
                        <h3 class="mt-3 font-display text-lg font-semibold leading-snug text-gunmetal-800 group-hover:text-amaranth-600 transition-colors">
                            <?php the_title(); ?>
                        </h3>
                        <p class="mt-2 flex-1 text-sm leading-relaxed text-gunmetal-500 line-clamp-3"><?php echo esc_html( wp_strip_all_tags( get_the_excerpt() ) ); ?></p>
                        <span class="mt-4 inline-flex items-center gap-1.5 text-sm font-semibold text-amaranth-600">
                            Read article
                            <?php hyvoxa_the_icon( 'arrow-right' ); ?>
                        </span>
                    </div>
                </a>
            <?php endwhile; wp_reset_postdata(); ?>
        </div>
        <?php endif; ?>

        <!-- No results -->
        <div id="hyvoxa-no-results" class="py-20 text-center" style="display:none;">
            <p class="text-lg text-gunmetal-500">No articles match your search.</p>
            <button id="hyvoxa-clear-filters" class="mt-4 text-sm font-semibold text-amaranth-600 hover:underline">
                Clear filters
            </button>
        </div>
    </div>
</section>

<?php get_footer(); ?>
