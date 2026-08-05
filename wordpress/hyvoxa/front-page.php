<?php
/**
 * Front page template (Home).
 *
 * @package Hyvoxa
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

get_header();

$settings   = hyvoxa_get_settings();
$services_q = hyvoxa_get_services_query();
$blog_q     = hyvoxa_get_blog_posts_query( 3 );
?>

<!-- Hero -->
<section class="relative flex min-h-screen items-center overflow-hidden pt-20" style="background: #2e3532;">
    <?php hyvoxa_gradient_mesh(); ?>
    <div class="absolute inset-0 bg-grid opacity-40" aria-hidden="true"></div>
    <div class="relative mx-auto grid max-w-7xl items-center gap-12 px-5 py-20 lg:grid-cols-2 lg:px-8">
        <div class="reveal">
            <span class="inline-flex items-center gap-2 rounded-full border px-4 py-1.5 text-xs font-medium text-tea-300" style="border-color: rgba(212,239,189,0.3); background: rgba(212,239,189,0.1);">
                <?php hyvoxa_the_icon( 'sparkles' ); ?>
                Premium Home Automation, End to End
            </span>
            <h1 class="mt-6 font-display text-5xl font-bold leading-[1.05] tracking-tight text-linen-100 sm:text-6xl lg:text-7xl text-balance">
                Your home,<br>
                <span style="background: linear-gradient(to right, #d3efbd, #b4e294, #d0677c); -webkit-background-clip: text; background-clip: text; -webkit-text-fill-color: transparent;">
                    intelligently yours
                </span>
            </h1>
            <p class="mt-6 max-w-xl text-lg leading-relaxed text-linen-300 text-pretty">
                Hyvoxa designs, installs and maintains smart home systems that adapt to how you live. Lighting, climate, security, entertainment and voice control, orchestrated as one seamless experience.
            </p>
            <div class="mt-8 flex flex-wrap gap-4">
                <a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" class="group inline-flex items-center gap-2 rounded-full bg-tea-300 px-7 py-3.5 font-semibold text-gunmetal-800 transition-all duration-300 hover:bg-tea-400 hover:shadow-xl">
                    Book a Consultation
                    <?php hyvoxa_the_icon( 'arrow-right' ); ?>
                </a>
                <a href="<?php echo esc_url( get_post_type_archive_link( 'hyvoxa_service' ) ?: home_url( '/services/' ) ); ?>" class="inline-flex items-center gap-2 rounded-full border px-7 py-3.5 font-semibold text-linen-100 transition-all duration-300 hover:bg-white/5" style="border-color: rgba(224,226,219,0.2);">
                    Explore Services
                </a>
            </div>
            <div class="mt-10 flex items-center gap-6 text-sm text-linen-400">
                <div class="flex items-center gap-2">
                    <?php hyvoxa_the_icon( 'check' ); ?>
                    <span style="color: #b4e294;">12+ years experience</span>
                </div>
                <div class="flex items-center gap-2">
                    <?php hyvoxa_the_icon( 'check' ); ?>
                    <span style="color: #b4e294;">850+ homes automated</span>
                </div>
            </div>
        </div>
        <div class="relative animate-fade-in-up">
            <?php hyvoxa_hero_illustration(); ?>
        </div>
    </div>
    <div class="absolute inset-x-0 bottom-0 h-24" style="background: linear-gradient(to top, #e0e2db, transparent);" aria-hidden="true"></div>
</section>

<!-- Stats bar -->
<section class="relative -mt-16 z-10 bg-linen-100">
    <div class="reveal mx-auto max-w-7xl px-5 lg:px-8">
        <div class="grid grid-cols-2 gap-px overflow-hidden rounded-2xl shadow-xl lg:grid-cols-4" style="background: rgba(46,53,50,0.1); border: 1px solid rgba(46,53,50,0.1);">
            <?php foreach ( $settings['stats'] as $stat ) :
                $raw     = $stat['value'];
                $numeric = preg_replace( '/[^0-9.]/', '', $raw );
                $suffix  = str_replace( $numeric, '', $raw );
            ?>
                <div class="group relative flex flex-col items-center justify-center bg-linen-100 p-8 text-center transition-colors hover:bg-white">
                    <div class="font-display text-4xl font-bold text-amaranth-600 lg:text-5xl">
                        <span data-counter="<?php echo esc_attr( $numeric ); ?>" data-suffix="<?php echo esc_attr( $suffix ); ?>">0<?php echo esc_html( $suffix ); ?></span>
                    </div>
                    <div class="mt-2 text-sm font-medium text-gunmetal-500">
                        <?php echo esc_html( $stat['label'] ); ?>
                    </div>
                    <span class="absolute inset-x-0 bottom-0 h-0.5 origin-left scale-x-0 bg-amaranth-600 transition-transform duration-500 group-hover:scale-x-100"></span>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- Intro / Value -->
<section class="bg-linen-100 py-24">
    <div class="mx-auto max-w-7xl px-5 lg:px-8">
        <div class="grid gap-12 lg:grid-cols-2 lg:items-center">
            <div class="reveal">
                <span class="text-xs font-bold uppercase tracking-[0.2em] text-amaranth-600">The Hyvoxa Difference</span>
                <h2 class="mt-3 font-display text-3xl font-bold tracking-tight text-gunmetal-800 sm:text-4xl lg:text-5xl text-balance">
                    A home that anticipates you
                </h2>
                <p class="mt-5 text-lg leading-relaxed text-gunmetal-500 text-pretty">
                    We believe the best technology is the kind you stop noticing. When your lighting shifts as the sun sets, when the house is warm the moment you walk in, when the doors lock themselves at night, you stop managing your home and start simply living in it.
                </p>
                <p class="mt-4 text-base leading-relaxed text-gunmetal-500 text-pretty">
                    That effortless feeling is what Hyvoxa engineers into every project. Not a collection of gadgets, but a single, intelligent system designed around the way you actually live.
                </p>
            </div>
            <div class="reveal grid gap-5 sm:grid-cols-2" style="transition-delay: 120ms;">
                <?php
                $values = array(
                    array( 'sparkles', 'Tailored to You',          'No two homes or families are alike. Every system is designed around your routines.' ),
                    array( 'cpu',      'Professionally Engineered', 'Certified technicians, concealed wiring and meticulous calibration on every install.' ),
                    array( 'leaf',     'Sustainable by Design',     'Energy-aware automation that lowers bills and your environmental footprint.' ),
                    array( 'shield',   'Secure & Private',          'Local processing and encrypted access keep your home responsive and your data yours.' ),
                );
                foreach ( $values as $v ) :
                ?>
                    <div class="group rounded-2xl border p-6 transition-all hover:shadow-lg" style="border-color: rgba(46,53,50,0.1);">
                        <div class="flex h-12 w-12 items-center justify-center rounded-xl text-amaranth-600 transition-colors group-hover:bg-amaranth-600 group-hover:text-linen-100" style="background: rgba(139,38,53,0.1);">
                            <?php hyvoxa_the_icon( $v[0] ); ?>
                        </div>
                        <h3 class="mt-4 font-display font-semibold text-gunmetal-800"><?php echo esc_html( $v[1] ); ?></h3>
                        <p class="mt-1.5 text-sm leading-relaxed text-gunmetal-500"><?php echo esc_html( $v[2] ); ?></p>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>

<!-- Services preview -->
<section class="py-24" style="background: rgba(210,212,200,0.4);">
    <div class="mx-auto max-w-7xl px-5 lg:px-8">
        <div class="reveal mx-auto max-w-2xl text-center">
            <span class="text-xs font-bold uppercase tracking-[0.2em] text-amaranth-600">What We Do</span>
            <h2 class="mt-3 font-display text-3xl font-bold sm:text-4xl lg:text-5xl text-gunmetal-800 text-balance">Six pillars of a smarter home</h2>
            <p class="mt-4 text-lg leading-relaxed text-gunmetal-500 text-pretty">
                Every Hyvoxa system is built from these core services. Choose one or combine them all into a single, unified platform.
            </p>
        </div>
        <div class="mt-14 grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
            <?php if ( $services_q->have_posts() ) : $i = 0; while ( $services_q->have_posts() ) : $services_q->the_post(); $i++; ?>
                <?php
                $meta = hyvoxa_get_service_meta( get_the_ID() );
                $img  = hyvoxa_get_post_image( get_the_ID(), '_hyvoxa_service_image_url' );
                ?>
                <a href="<?php the_permalink(); ?>" class="group reveal relative overflow-hidden rounded-2xl bg-linen-100 shadow-lg transition-all duration-500 hover:-translate-y-1.5 hover:shadow-2xl" style="transition-delay: <?php echo esc_attr( $i * 100 ); ?>ms; box-shadow: 0 4px 20px rgba(46,53,50,0.05);">
                    <div class="relative h-48 overflow-hidden">
                        <?php if ( $img ) : ?>
                            <img src="<?php echo esc_url( $img ); ?>" alt="<?php the_title_attribute(); ?>" class="h-full w-full object-cover transition-transform duration-700 group-hover:scale-110" loading="lazy">
                        <?php endif; ?>
                        <div class="absolute inset-0" style="background: linear-gradient(to top, rgba(29,33,31,0.7), transparent);"></div>
                        <div class="absolute left-4 top-4 flex h-11 w-11 items-center justify-center rounded-xl text-amaranth-600" style="background: rgba(224,226,219,0.9); backdrop-filter: blur(4px);">
                            <span style="color: #8b2635;"><?php hyvoxa_the_icon( $meta['icon'] ); ?></span>
                        </div>
                    </div>
                    <div class="p-6">
                        <h3 class="font-display text-lg font-semibold text-gunmetal-800"><?php the_title(); ?></h3>
                        <p class="mt-2 text-sm leading-relaxed text-gunmetal-500"><?php echo esc_html( $meta['short'] ); ?></p>
                        <span class="mt-4 inline-flex items-center gap-1.5 text-sm font-semibold text-amaranth-600">
                            Learn more
                            <?php hyvoxa_the_icon( 'arrow-right' ); ?>
                        </span>
                    </div>
                </a>
            <?php endwhile; wp_reset_postdata(); endif; ?>
        </div>
        <div class="mt-12 text-center">
            <a href="<?php echo esc_url( get_post_type_archive_link( 'hyvoxa_service' ) ?: home_url( '/services/' ) ); ?>" class="group inline-flex items-center gap-2 rounded-full bg-gunmetal-800 px-7 py-3.5 font-semibold text-linen-100 transition-all hover:shadow-xl">
                View All Services
                <?php hyvoxa_the_icon( 'arrow-right' ); ?>
            </a>
        </div>
    </div>
</section>

<!-- Process -->
<section class="relative py-24 text-linen-100" style="background: #2e3532;">
    <div class="absolute inset-0 bg-grid opacity-30" aria-hidden="true"></div>
    <div class="relative mx-auto max-w-7xl px-5 lg:px-8">
        <div class="reveal mx-auto max-w-2xl text-center">
            <span class="text-xs font-bold uppercase tracking-[0.2em] text-tea-300">How It Works</span>
            <h2 class="mt-3 font-display text-3xl font-bold sm:text-4xl lg:text-5xl text-linen-100 text-balance">From first conversation to effortless living</h2>
            <p class="mt-4 text-lg leading-relaxed text-linen-300 text-pretty">
                A refined, four-step process that ensures every system we install is tailored, reliable and genuinely life-improving.
            </p>
        </div>
        <div class="mt-14 grid gap-6 md:grid-cols-2 lg:grid-cols-4">
            <?php foreach ( $settings['process'] as $i => $p ) : ?>
                <div class="group reveal relative rounded-2xl border p-6 transition-colors hover:border-tea-300/30" style="border-color: rgba(224,226,219,0.1); background: rgba(29,33,31,0.4); transition-delay: <?php echo esc_attr( $i * 120 ); ?>ms;">
                    <div class="font-display text-5xl font-bold" style="color: rgba(212,239,189,0.3);"><?php echo esc_html( $p['step'] ); ?></div>
                    <h3 class="mt-3 font-display text-lg font-semibold text-linen-100"><?php echo esc_html( $p['title'] ); ?></h3>
                    <p class="mt-2 text-sm leading-relaxed text-linen-400"><?php echo esc_html( $p['desc'] ); ?></p>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- Why choose us -->
<section class="bg-linen-100 py-24">
    <div class="mx-auto max-w-7xl px-5 lg:px-8">
        <div class="grid gap-16 lg:grid-cols-2 lg:items-center">
            <div class="relative reveal">
                <img src="https://images.pexels.com/photos/16423103/pexels-photo-16423103.jpeg?auto=compress&cs=tinysrgb&h=650&w=940" alt="A hand using a tablet to control a smart home system" class="rounded-2xl shadow-2xl" loading="lazy" style="box-shadow: 0 20px 40px rgba(46,53,50,0.2);">
                <div class="absolute -bottom-6 -right-6 hidden rounded-2xl p-6 text-linen-100 shadow-xl sm:block" style="background: #8b2635;">
                    <div class="font-display text-3xl font-bold">100%</div>
                    <div class="text-sm text-linen-200">Bespoke Design</div>
                </div>
            </div>
            <div class="reveal">
                <span class="text-xs font-bold uppercase tracking-[0.2em] text-amaranth-600">Why Hyvoxa</span>
                <h2 class="mt-3 font-display text-3xl font-bold sm:text-4xl text-gunmetal-800 text-balance">Engineering meets empathy</h2>
                <p class="mt-4 text-lg leading-relaxed text-gunmetal-500 text-pretty">
                    We are not just integrators. We are designers who believe technology should disappear into the background of a well-lived life.
                </p>
                <div class="mt-8 space-y-5">
                    <?php
                    $reasons = array(
                        array( 'cpu',    'Local processing, zero cloud dependency', 'Your home responds instantly and privately, even when the internet is down.' ),
                        array( 'zap',    'One platform, every device',               'No more juggling a dozen manufacturer apps. A single, polished interface for everything.' ),
                        array( 'leaf',   'Energy-aware automation',                  'Sensors and schedules cut energy waste by up to 40% without changing your habits.' ),
                        array( 'lock',   'Security as a foundation',                 'Network segmentation, encrypted access and AI-driven surveillance built into every install.' ),
                    );
                    foreach ( $reasons as $r ) :
                    ?>
                        <div class="flex gap-4">
                            <div class="flex h-11 w-11 flex-shrink-0 items-center justify-center rounded-xl text-amaranth-600" style="background: rgba(212,239,189,0.3);">
                                <?php hyvoxa_the_icon( $r[0] ); ?>
                            </div>
                            <div>
                                <h3 class="font-display font-semibold text-gunmetal-800"><?php echo esc_html( $r[1] ); ?></h3>
                                <p class="mt-1 text-sm leading-relaxed text-gunmetal-500"><?php echo esc_html( $r[2] ); ?></p>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Testimonial -->
<section class="py-24" style="background: rgba(210,212,200,0.4);">
    <div class="mx-auto max-w-4xl px-5 text-center lg:px-8 reveal">
        <div style="color: rgba(139,38,53,0.4);"><?php hyvoxa_the_icon( 'quote' ); ?></div>
        <blockquote class="mt-6 font-display text-2xl font-medium leading-relaxed text-gunmetal-800 sm:text-3xl text-balance">
            &ldquo;Hyvoxa transformed our house into something that anticipates us. We never think about lights, temperature or security anymore, it just works, beautifully.&rdquo;
        </blockquote>
        <div class="mt-6">
            <div class="font-semibold text-gunmetal-800">Sarah &amp; David Chen</div>
            <div class="text-sm text-gunmetal-500">Portland, OR &middot; Whole-home automation client</div>
        </div>
    </div>
</section>

<!-- Blog preview -->
<section class="bg-linen-100 py-24">
    <div class="mx-auto max-w-7xl px-5 lg:px-8">
        <div class="reveal mx-auto max-w-2xl text-center">
            <span class="text-xs font-bold uppercase tracking-[0.2em] text-amaranth-600">Insights</span>
            <h2 class="mt-3 font-display text-3xl font-bold sm:text-4xl lg:text-5xl text-gunmetal-800 text-balance">Latest from the Hyvoxa blog</h2>
            <p class="mt-4 text-lg leading-relaxed text-gunmetal-500 text-pretty">
                Practical guides and forward-looking analysis on smart home technology, energy efficiency and secure living.
            </p>
        </div>
        <div class="mt-14 grid gap-8 md:grid-cols-3">
            <?php if ( $blog_q->have_posts() ) : $i = 0; while ( $blog_q->have_posts() ) : $blog_q->the_post(); $i++; ?>
                <?php $meta = hyvoxa_get_blog_meta( get_the_ID() ); $img = hyvoxa_get_post_image( get_the_ID(), '_hyvoxa_blog_image_url' ); ?>
                <a href="<?php the_permalink(); ?>" class="group reveal flex flex-col overflow-hidden rounded-2xl bg-linen-100 shadow-lg transition-all duration-500 hover:-translate-y-1.5 hover:shadow-xl" style="transition-delay: <?php echo esc_attr( $i * 100 ); ?>ms; box-shadow: 0 4px 20px rgba(46,53,50,0.05);">
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
                            <span><?php echo esc_html( $meta['read_time'] ); ?> read</span>
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
            <?php endwhile; wp_reset_postdata(); endif; ?>
        </div>
        <div class="mt-12 text-center">
            <a href="<?php echo esc_url( home_url( '/blog/' ) ); ?>" class="group inline-flex items-center gap-2 rounded-full border px-7 py-3.5 font-semibold text-gunmetal-800 transition-all hover:bg-gunmetal-800 hover:text-linen-100" style="border-color: rgba(46,53,50,0.2);">
                Read the Blog
                <?php hyvoxa_the_icon( 'arrow-right' ); ?>
            </a>
        </div>
    </div>
</section>

<!-- CTA -->
<section class="relative overflow-hidden py-24" style="background: #8b2635;">
    <div class="absolute inset-0 bg-grid opacity-20" aria-hidden="true"></div>
    <div class="absolute -right-32 -top-32 w-96 h-96 rounded-full" style="background: rgba(208,103,124,0.3); filter: blur(120px);" aria-hidden="true"></div>
    <div class="reveal relative mx-auto max-w-4xl px-5 text-center lg:px-8">
        <h2 class="font-display text-3xl font-bold tracking-tight text-linen-100 sm:text-4xl lg:text-5xl text-balance">
            Ready to live in a home that thinks?
        </h2>
        <p class="mt-4 text-lg text-linen-200 text-pretty">
            Book a no-obligation consultation. We will visit your home, listen to how you live and design a system that fits your life perfectly.
        </p>
        <div class="mt-8 flex flex-wrap justify-center gap-4">
            <a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" class="group inline-flex items-center gap-2 rounded-full bg-linen-100 px-7 py-3.5 font-semibold text-amaranth-600 transition-all hover:bg-white hover:shadow-xl">
                Get in Touch
                <?php hyvoxa_the_icon( 'arrow-right' ); ?>
            </a>
            <a href="mailto:<?php echo esc_attr( $settings['email'] ); ?>" class="inline-flex items-center gap-2 rounded-full border px-7 py-3.5 font-semibold text-linen-100 transition-all hover:bg-white/10" style="border-color: rgba(224,226,219,0.3);">
                <?php hyvoxa_the_icon( 'mail' ); ?>
                <?php echo esc_html( $settings['email'] ); ?>
            </a>
        </div>
    </div>
</section>

<?php get_footer(); ?>
