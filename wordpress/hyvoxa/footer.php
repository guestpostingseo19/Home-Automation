<?php
/**
 * Footer template.
 *
 * @package Hyvoxa
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$settings   = hyvoxa_get_settings();
$services_q = hyvoxa_get_services_query();
$legal_q    = hyvoxa_get_legal_query();
?>
    </main>

    <footer class="relative overflow-hidden text-linen-200" style="background: #1d211f;">
        <div class="absolute inset-0 bg-grid opacity-30" aria-hidden="true"></div>
        <div class="relative mx-auto max-w-7xl px-5 py-16 lg:px-8">
            <div class="grid gap-12 lg:grid-cols-4">
                <!-- Brand -->
                <div>
                    <div class="flex items-center gap-2.5">
                        <span class="flex h-10 w-10 items-center justify-center rounded-xl" style="background: linear-gradient(135deg, #8b2635, #7a212e);">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#e0e2db" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect width="16" height="16" x="4" y="4" rx="2"/><rect width="6" height="6" x="8" y="8" rx="1"/><path d="M15 2v2"/><path d="M15 20v2"/><path d="M2 15h2"/><path d="M2 9h2"/><path d="M20 15h2"/><path d="M20 9h2"/><path d="M9 2v2"/><path d="M9 20v2"/></svg>
                        </span>
                        <span class="font-display text-xl font-bold text-linen-100">
                            Hyvo<span class="text-tea-300">xa</span>
                        </span>
                    </div>
                    <p class="mt-4 max-w-xs text-sm leading-relaxed text-linen-400">
                        Premium smart home automation, designed and installed with obsessive attention to detail. Your home, intelligently yours.
                    </p>
                    <p class="mt-4 text-sm text-linen-500">
                        <span class="text-linen-300">Email:</span>
                        <a href="mailto:<?php echo esc_attr( $settings['email'] ); ?>" class="text-tea-300 hover:text-tea-400 transition-colors ml-1">
                            <?php echo esc_html( $settings['email'] ); ?>
                        </a>
                    </p>
                </div>

                <!-- Services -->
                <div>
                    <h4 class="font-display text-sm font-semibold uppercase tracking-wider text-linen-300">Services</h4>
                    <ul class="mt-4 space-y-2.5">
                        <?php if ( $services_q->have_posts() ) : ?>
                            <?php while ( $services_q->have_posts() ) : $services_q->the_post(); ?>
                                <li>
                                    <a href="<?php the_permalink(); ?>" class="text-sm text-linen-400 transition-colors hover:text-tea-300">
                                        <?php the_title(); ?>
                                    </a>
                                </li>
                            <?php endwhile; wp_reset_postdata(); ?>
                        <?php endif; ?>
                    </ul>
                </div>

                <!-- Company -->
                <div>
                    <h4 class="font-display text-sm font-semibold uppercase tracking-wider text-linen-300">Company</h4>
                    <ul class="mt-4 space-y-2.5">
                        <li><a href="<?php echo esc_url( home_url( '/about/' ) ); ?>" class="text-sm text-linen-400 hover:text-tea-300 transition-colors">About Us</a></li>
                        <li><a href="<?php echo esc_url( home_url( '/blog/' ) ); ?>" class="text-sm text-linen-400 hover:text-tea-300 transition-colors">Blog</a></li>
                        <li><a href="<?php echo esc_url( get_post_type_archive_link( 'hyvoxa_service' ) ?: home_url( '/services/' ) ); ?>" class="text-sm text-linen-400 hover:text-tea-300 transition-colors">All Services</a></li>
                        <li><a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" class="text-sm text-linen-400 hover:text-tea-300 transition-colors">Contact</a></li>
                    </ul>
                </div>

                <!-- Legal -->
                <div>
                    <h4 class="font-display text-sm font-semibold uppercase tracking-wider text-linen-300">Legal</h4>
                    <ul class="mt-4 space-y-2.5">
                        <?php if ( $legal_q->have_posts() ) : ?>
                            <?php while ( $legal_q->have_posts() ) : $legal_q->the_post(); ?>
                                <li>
                                    <a href="<?php the_permalink(); ?>" class="text-sm text-linen-400 hover:text-tea-300 transition-colors">
                                        <?php the_title(); ?>
                                    </a>
                                </li>
                            <?php endwhile; wp_reset_postdata(); ?>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>

            <div class="mt-14 flex flex-col items-center justify-between gap-4 border-t pt-8 sm:flex-row" style="border-color: rgba(224,226,219,0.1);">
                <p class="text-xs text-linen-500">
                    &copy; <?php echo esc_html( date( 'Y' ) ); ?> <?php bloginfo( 'name' ); ?>. All rights reserved.
                </p>
                <p class="text-xs text-linen-500">
                    Designed for intelligent living.
                </p>
            </div>
        </div>
    </footer>

    <?php wp_footer(); ?>
</div>
</body>
</html>
