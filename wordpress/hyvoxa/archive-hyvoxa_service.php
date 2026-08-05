<?php
/**
 * Services archive page (Services Hub).
 *
 * @package Hyvoxa
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

get_header();

$settings   = hyvoxa_get_settings();
$services_q = hyvoxa_get_services_query();
?>

<!-- Hero -->
<section class="relative overflow-hidden pt-32 pb-20 text-linen-100" style="background: #2e3532;">
    <?php hyvoxa_gradient_mesh(); ?>
    <div class="absolute inset-0 bg-grid opacity-30" aria-hidden="true"></div>
    <div class="reveal relative mx-auto max-w-4xl px-5 text-center lg:px-8">
        <span class="inline-flex items-center gap-2 rounded-full border px-4 py-1.5 text-xs font-medium text-tea-300" style="border-color: rgba(212,239,189,0.3); background: rgba(212,239,189,0.1);">
            <?php hyvoxa_the_icon( 'cpu' ); ?>
            Our Services
        </span>
        <h1 class="mt-6 font-display text-4xl font-bold leading-tight tracking-tight sm:text-5xl lg:text-6xl text-balance">
            Everything your home needs,<br>
            <span style="background: linear-gradient(to right, #d3efbd, #d0677c); -webkit-background-clip: text; background-clip: text; -webkit-text-fill-color: transparent;">
                intelligently connected
            </span>
        </h1>
        <p class="mx-auto mt-6 max-w-2xl text-lg leading-relaxed text-linen-300 text-pretty">
            Six core services that can be deployed individually or woven into a single, unified smart home platform. Every solution is designed around your home and installed by certified professionals.
        </p>
    </div>
</section>

<!-- Services grid -->
<section class="bg-linen-100 py-24">
    <div class="mx-auto max-w-7xl px-5 lg:px-8">
        <div class="grid gap-8 md:grid-cols-2 lg:grid-cols-3">
            <?php if ( $services_q->have_posts() ) : $i = 0; while ( $services_q->have_posts() ) : $services_q->the_post(); $i++; ?>
                <?php
                $meta = hyvoxa_get_service_meta( get_the_ID() );
                $img  = hyvoxa_get_post_image( get_the_ID(), '_hyvoxa_service_image_url' );
                ?>
                <a href="<?php the_permalink(); ?>" class="group reveal flex flex-col overflow-hidden rounded-2xl bg-white text-left shadow-lg transition-all duration-500 hover:-translate-y-2 hover:shadow-2xl" style="transition-delay: <?php echo esc_attr( $i * 80 ); ?>ms; box-shadow: 0 4px 20px rgba(46,53,50,0.05);">
                    <div class="relative h-56 overflow-hidden">
                        <?php if ( $img ) : ?>
                            <img src="<?php echo esc_url( $img ); ?>" alt="<?php the_title_attribute(); ?>" class="h-full w-full object-cover transition-transform duration-700 group-hover:scale-110" loading="lazy">
                        <?php endif; ?>
                        <div class="absolute inset-0" style="background: linear-gradient(to top, rgba(29,33,31,0.6), transparent);"></div>
                        <div class="absolute left-5 top-5 flex h-12 w-12 items-center justify-center rounded-xl text-amaranth-600 transition-transform group-hover:scale-110" style="background: rgba(224,226,219,0.9); backdrop-filter: blur(4px);">
                            <?php hyvoxa_the_icon( $meta['icon'] ); ?>
                        </div>
                    </div>
                    <div class="flex flex-1 flex-col p-7">
                        <span class="text-xs font-bold uppercase tracking-wider text-amaranth-600"><?php echo esc_html( $meta['tagline'] ); ?></span>
                        <h2 class="mt-2 font-display text-xl font-semibold text-gunmetal-800"><?php the_title(); ?></h2>
                        <p class="mt-2 flex-1 text-sm leading-relaxed text-gunmetal-500"><?php echo esc_html( $meta['short'] ); ?></p>
                        <ul class="mt-4 space-y-1.5">
                            <?php foreach ( array_slice( $meta['features'], 0, 3 ) as $feature ) : ?>
                                <li class="flex items-start gap-2 text-sm text-gunmetal-600">
                                    <span style="color: #71b347; flex-shrink: 0; margin-top: 2px;"><?php hyvoxa_the_icon( 'check' ); ?></span>
                                    <?php echo esc_html( $feature ); ?>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                        <span class="mt-5 inline-flex items-center gap-1.5 text-sm font-semibold text-amaranth-600">
                            Explore service
                            <?php hyvoxa_the_icon( 'arrow-right' ); ?>
                        </span>
                    </div>
                </a>
            <?php endwhile; wp_reset_postdata(); endif; ?>
        </div>
    </div>
</section>

<!-- Process strip -->
<section class="relative py-20 text-linen-100" style="background: #2e3532;">
    <div class="absolute inset-0 bg-grid opacity-20" aria-hidden="true"></div>
    <div class="relative mx-auto max-w-7xl px-5 lg:px-8">
        <div class="grid gap-8 md:grid-cols-4">
            <?php foreach ( $settings['process'] as $i => $p ) : ?>
                <div class="reveal" style="transition-delay: <?php echo esc_attr( $i * 100 ); ?>ms;">
                    <div class="font-display text-4xl font-bold" style="color: rgba(212,239,189,0.4);"><?php echo esc_html( $p['step'] ); ?></div>
                    <h3 class="mt-2 font-display text-lg font-semibold text-linen-100"><?php echo esc_html( $p['title'] ); ?></h3>
                    <p class="mt-1.5 text-sm leading-relaxed text-linen-400"><?php echo esc_html( $p['desc'] ); ?></p>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- CTA -->
<section class="relative overflow-hidden py-20" style="background: #8b2635;">
    <div class="absolute inset-0 bg-grid opacity-20" aria-hidden="true"></div>
    <div class="reveal relative mx-auto max-w-3xl px-5 text-center lg:px-8">
        <h2 class="font-display text-3xl font-bold text-linen-100 sm:text-4xl text-balance">Not sure which services you need?</h2>
        <p class="mt-4 text-lg text-linen-200 text-pretty">
            Our consultation covers your whole home. We will recommend the right combination of services for your space, lifestyle and budget.
        </p>
        <a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" class="mt-8 inline-flex items-center gap-2 rounded-full bg-linen-100 px-7 py-3.5 font-semibold text-amaranth-600 transition-all hover:bg-white hover:shadow-xl">
            Book a Consultation
            <?php hyvoxa_the_icon( 'arrow-right' ); ?>
        </a>
    </div>
</section>

<?php get_footer(); ?>
