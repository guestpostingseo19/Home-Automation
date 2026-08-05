<?php
/**
 * Single service detail page.
 *
 * @package Hyvoxa
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

get_header();

while ( have_posts() ) :
    the_post();

    $meta = hyvoxa_get_service_meta( get_the_ID() );
    $img  = hyvoxa_get_post_image( get_the_ID(), '_hyvoxa_service_image_url' );
    $next = hyvoxa_get_next_service( get_the_ID() );
    $benefits = $meta['benefits'];
    $features = $meta['features'];
    $process  = $meta['process'];
    $faqs     = $meta['faqs'];
    $services_link = get_post_type_archive_link( 'hyvoxa_service' ) ?: home_url( '/services/' );
?>

<!-- Hero -->
<section class="relative overflow-hidden pt-32 pb-24 text-linen-100" style="background: #2e3532;">
    <?php hyvoxa_gradient_mesh(); ?>
    <div class="absolute inset-0 bg-grid opacity-30" aria-hidden="true"></div>
    <div class="reveal relative mx-auto max-w-7xl px-5 lg:px-8">
        <a href="<?php echo esc_url( $services_link ); ?>" class="group inline-flex items-center gap-2 text-sm text-linen-400 transition-colors hover:text-tea-300">
            <?php hyvoxa_the_icon( 'arrow-left' ); ?>
            All Services
        </a>
        <div class="mt-8 grid items-center gap-12 lg:grid-cols-2">
            <div>
                <div class="flex h-14 w-14 items-center justify-center rounded-2xl text-tea-300" style="background: rgba(139,38,53,0.2); border: 1px solid rgba(212,239,189,0.2);">
                    <?php hyvoxa_the_icon( $meta['icon'] ); ?>
                </div>
                <span class="mt-5 block text-xs font-bold uppercase tracking-[0.2em] text-tea-300"><?php echo esc_html( $meta['tagline'] ); ?></span>
                <h1 class="mt-3 font-display text-4xl font-bold leading-tight tracking-tight sm:text-5xl lg:text-6xl text-balance"><?php the_title(); ?></h1>
                <p class="mt-5 max-w-xl text-lg leading-relaxed text-linen-300 text-pretty"><?php echo esc_html( $meta['short'] ); ?></p>
                <a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" class="mt-8 inline-flex items-center gap-2 rounded-full bg-tea-300 px-6 py-3 font-semibold text-gunmetal-800 transition-all hover:bg-tea-400 hover:shadow-xl">
                    Get a Quote
                    <?php hyvoxa_the_icon( 'arrow-right' ); ?>
                </a>
            </div>
            <div class="relative">
                <?php if ( $img ) : ?>
                    <div class="overflow-hidden rounded-2xl shadow-2xl" style="border: 1px solid rgba(224,226,219,0.1);">
                        <img src="<?php echo esc_url( $img ); ?>" alt="<?php the_title_attribute(); ?>" class="aspect-[4/3] w-full object-cover">
                    </div>
                <?php endif; ?>
                <div class="absolute -bottom-5 -left-5 hidden rounded-2xl bg-linen-100 p-5 shadow-xl sm:block">
                    <div class="flex items-center gap-2 text-gunmetal-800">
                        <span class="text-amaranth-600"><?php hyvoxa_the_icon( $meta['icon'] ); ?></span>
                        <span class="font-display font-semibold"><?php the_title(); ?></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Benefits -->
<section class="bg-linen-100 py-24">
    <div class="mx-auto max-w-7xl px-5 lg:px-8">
        <div class="reveal mx-auto max-w-2xl text-center">
            <span class="text-xs font-bold uppercase tracking-[0.2em] text-amaranth-600">Benefits</span>
            <h2 class="mt-3 font-display text-3xl font-bold text-gunmetal-800 sm:text-4xl text-balance">Why it transforms your home</h2>
        </div>
        <div class="mt-14 grid gap-6 sm:grid-cols-2 lg:grid-cols-4">
            <?php if ( is_array( $benefits ) ) : foreach ( $benefits as $i => $b ) : ?>
                <div class="group reveal rounded-2xl border bg-white p-6 transition-all hover:shadow-lg" style="border-color: rgba(46,53,50,0.1); transition-delay: <?php echo esc_attr( $i * 80 ); ?>ms;">
                    <div class="font-display text-3xl font-bold transition-colors" style="color: rgba(139,38,53,0.2);">0<?php echo esc_html( $i + 1 ); ?></div>
                    <h3 class="mt-3 font-display font-semibold text-gunmetal-800"><?php echo esc_html( $b['title'] ); ?></h3>
                    <p class="mt-2 text-sm leading-relaxed text-gunmetal-500"><?php echo esc_html( $b['desc'] ); ?></p>
                </div>
            <?php endforeach; endif; ?>
        </div>
    </div>
</section>

<!-- Features + Process -->
<section class="py-24" style="background: rgba(210,212,200,0.4);">
    <div class="mx-auto max-w-7xl px-5 lg:px-8">
        <div class="grid gap-16 lg:grid-cols-2">
            <div class="reveal">
                <span class="text-xs font-bold uppercase tracking-[0.2em] text-amaranth-600">What is included</span>
                <h2 class="mt-3 font-display text-3xl font-bold text-gunmetal-800 sm:text-4xl text-balance">Capabilities &amp; components</h2>
                <ul class="mt-8 space-y-3">
                    <?php if ( is_array( $features ) ) : foreach ( $features as $i => $f ) : ?>
                        <li class="reveal flex items-start gap-3 rounded-xl bg-linen-100 px-5 py-3.5 shadow-sm transition-transform hover:translate-x-1" style="transition-delay: <?php echo esc_attr( $i * 60 ); ?>ms;">
                            <span style="color: #71b347; flex-shrink: 0; margin-top: 2px;"><?php hyvoxa_the_icon( 'check' ); ?></span>
                            <span class="text-gunmetal-700"><?php echo esc_html( $f ); ?></span>
                        </li>
                    <?php endforeach; endif; ?>
                </ul>
            </div>
            <div class="reveal">
                <span class="text-xs font-bold uppercase tracking-[0.2em] text-amaranth-600">How we deliver</span>
                <h2 class="mt-3 font-display text-3xl font-bold text-gunmetal-800 sm:text-4xl text-balance">Our process</h2>
                <div class="mt-8 space-y-4">
                    <?php if ( is_array( $process ) ) : foreach ( $process as $i => $p ) : ?>
                        <div class="group reveal relative rounded-2xl border bg-white p-6 transition-all hover:shadow-md" style="border-color: rgba(46,53,50,0.1); transition-delay: <?php echo esc_attr( $i * 80 ); ?>ms;">
                            <div class="flex items-center gap-3">
                                <span class="flex h-10 w-10 items-center justify-center rounded-xl font-display text-sm font-bold text-linen-100" style="background: #8b2635;"><?php echo esc_html( $p['step'] ); ?></span>
                                <h3 class="font-display font-semibold text-gunmetal-800"><?php echo esc_html( $p['title'] ); ?></h3>
                            </div>
                            <p class="mt-3 text-sm leading-relaxed text-gunmetal-500" style="padding-left: 3.25rem;"><?php echo esc_html( $p['desc'] ); ?></p>
                        </div>
                    <?php endforeach; endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- FAQ -->
<section class="bg-linen-100 py-24">
    <div class="mx-auto max-w-3xl px-5 lg:px-8">
        <div class="reveal text-center">
            <span class="text-xs font-bold uppercase tracking-[0.2em] text-amaranth-600">FAQ</span>
            <h2 class="mt-3 font-display text-3xl font-bold text-gunmetal-800 sm:text-4xl text-balance">Common questions</h2>
        </div>
        <div class="hyvoxa-faq-group mt-10 space-y-3">
            <?php if ( is_array( $faqs ) ) : foreach ( $faqs as $faq ) : ?>
                <div class="reveal overflow-hidden rounded-xl border bg-white transition-shadow hover:shadow-md" style="border-color: rgba(46,53,50,0.1);">
                    <button class="hyvoxa-faq-toggle flex w-full items-center justify-between gap-4 px-6 py-5 text-left">
                        <span class="font-display font-semibold text-gunmetal-800"><?php echo esc_html( $faq['q'] ); ?></span>
                        <span class="hyvoxa-faq-chevron flex-shrink-0 text-amaranth-600 transition-transform duration-300" style="transform: rotate(0deg);"><?php hyvoxa_the_icon( 'chevron-down' ); ?></span>
                    </button>
                    <div class="overflow-hidden transition-all duration-300" style="max-height: 0; opacity: 0;">
                        <p class="px-6 pb-5 text-sm leading-relaxed text-gunmetal-500"><?php echo esc_html( $faq['a'] ); ?></p>
                    </div>
                </div>
            <?php endforeach; endif; ?>
        </div>
    </div>
</section>

<!-- CTA + next service -->
<section class="relative overflow-hidden py-24 text-linen-100" style="background: #2e3532;">
    <div class="absolute inset-0 bg-grid opacity-20" aria-hidden="true"></div>
    <div class="reveal relative mx-auto max-w-7xl px-5 lg:px-8">
        <div class="grid gap-8 lg:grid-cols-[1.5fr_1fr] lg:items-center">
            <div>
                <h2 class="font-display text-3xl font-bold text-linen-100 sm:text-4xl text-balance">
                    Ready to add <?php echo esc_html( strtolower( get_the_title() ) ); ?> to your home?
                </h2>
                <p class="mt-4 max-w-xl text-lg text-linen-300 text-pretty">
                    Reach out for a personalized consultation. We will assess your space and design a solution tailored to your needs.
                </p>
                <div class="mt-8 flex flex-wrap gap-4">
                    <a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" class="inline-flex items-center gap-2 rounded-full bg-tea-300 px-7 py-3.5 font-semibold text-gunmetal-800 transition-all hover:bg-tea-400 hover:shadow-xl">
                        Get a Consultation
                        <?php hyvoxa_the_icon( 'arrow-right' ); ?>
                    </a>
                    <a href="mailto:<?php echo esc_attr( hyvoxa_get_settings()['email'] ); ?>" class="inline-flex items-center gap-2 rounded-full border px-7 py-3.5 font-semibold text-linen-100 transition-all hover:bg-white/5" style="border-color: rgba(224,226,219,0.2);">
                        <?php hyvoxa_the_icon( 'mail' ); ?>
                        Email Us
                    </a>
                </div>
            </div>
            <?php if ( $next ) : ?>
                <a href="<?php echo esc_url( get_permalink( $next['id'] ) ); ?>" class="group rounded-2xl border p-6 text-left transition-all hover:border-tea-300/30" style="border-color: rgba(224,226,219,0.1); background: rgba(29,33,31,0.4);">
                    <span class="text-xs text-linen-400">Next service</span>
                    <h3 class="mt-1 font-display text-lg font-semibold text-linen-100 group-hover:text-tea-300 transition-colors"><?php echo esc_html( $next['title'] ); ?></h3>
                    <p class="mt-1 text-sm text-linen-400"><?php echo esc_html( $next['short'] ); ?></p>
                    <span class="mt-3 inline-flex items-center gap-1.5 text-sm font-semibold text-tea-300">
                        Continue
                        <?php hyvoxa_the_icon( 'arrow-right' ); ?>
                    </span>
                </a>
            <?php endif; ?>
        </div>
    </div>
</section>

<?php
endwhile;
get_footer();
