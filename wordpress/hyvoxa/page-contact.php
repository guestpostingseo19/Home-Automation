<?php
/**
 * Template Name: Contact Page (no form, email only)
 *
 * @package Hyvoxa
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

get_header();

$settings = hyvoxa_get_settings();

$contact_methods = array(
    array( 'mail',    'Email Us',  $settings['email'],   'mailto:' . $settings['email'], 'The best way to reach us. We reply within one business day.' ),
    array( 'phone',   'Call Us',   $settings['phone'],   'tel:' . preg_replace( '/[^0-9+]/', '', $settings['phone'] ), 'Speak directly with our team during business hours.' ),
    array( 'map-pin', 'Visit Us',  $settings['address'], '#', 'Our showroom and office in Portland, Oregon.' ),
);
?>

<!-- Hero -->
<section class="relative overflow-hidden pt-32 pb-20 text-linen-100" style="background: #2e3532;">
    <?php hyvoxa_gradient_mesh(); ?>
    <div class="absolute inset-0 bg-grid opacity-30" aria-hidden="true"></div>
    <div class="reveal relative mx-auto max-w-4xl px-5 text-center lg:px-8">
        <span class="inline-flex items-center gap-2 rounded-full border px-4 py-1.5 text-xs font-medium text-tea-300" style="border-color: rgba(212,239,189,0.3); background: rgba(212,239,189,0.1);">
            <?php hyvoxa_the_icon( 'mail' ); ?>
            Get in Touch
        </span>
        <h1 class="mt-6 font-display text-4xl font-bold leading-tight tracking-tight sm:text-5xl lg:text-6xl text-balance">
            Let's talk about your
            <span class="block" style="background: linear-gradient(to right, #d3efbd, #d0677c); -webkit-background-clip: text; background-clip: text; -webkit-text-fill-color: transparent;">
                intelligent home
            </span>
        </h1>
        <p class="mx-auto mt-6 max-w-2xl text-lg leading-relaxed text-linen-300 text-pretty">
            Whether you are planning a full whole-home automation project or exploring a single service, we would love to hear from you. Reach out by email or phone and we will guide you from there.
        </p>
    </div>
</section>

<!-- Contact methods -->
<section class="bg-linen-100 py-20">
    <div class="mx-auto max-w-7xl px-5 lg:px-8">
        <div class="grid gap-6 md:grid-cols-3">
            <?php foreach ( $contact_methods as $i => $m ) : ?>
                <a href="<?php echo esc_url( $m[3] ); ?>" class="group reveal flex flex-col items-start rounded-2xl border bg-white p-8 transition-all duration-300 hover:shadow-xl <?php echo '#' === $m[3] ? 'cursor-default' : 'cursor-pointer'; ?>" style="border-color: rgba(46,53,50,0.1); transition-delay: <?php echo esc_attr( $i * 80 ); ?>ms;">
                    <div class="flex h-14 w-14 items-center justify-center rounded-2xl text-amaranth-600 transition-colors group-hover:bg-amaranth-600 group-hover:text-linen-100" style="background: rgba(139,38,53,0.1);">
                        <?php hyvoxa_the_icon( $m[0] ); ?>
                    </div>
                    <h2 class="mt-5 font-display text-lg font-semibold text-gunmetal-800"><?php echo esc_html( $m[1] ); ?></h2>
                    <p class="mt-1 text-base font-medium text-amaranth-600"><?php echo esc_html( $m[2] ); ?></p>
                    <p class="mt-3 text-sm leading-relaxed text-gunmetal-500"><?php echo esc_html( $m[4] ); ?></p>
                </a>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- Email CTA + info -->
<section class="py-20" style="background: rgba(210,212,200,0.4);">
    <div class="mx-auto max-w-7xl px-5 lg:px-8">
        <div class="grid gap-12 lg:grid-cols-2 lg:items-center">
            <!-- Email CTA -->
            <div class="reveal rounded-2xl p-8 text-linen-100 shadow-xl lg:p-12" style="background: #2e3532;">
                <h2 class="font-display text-2xl font-bold sm:text-3xl text-balance">Email is the fastest way to reach us</h2>
                <p class="mt-4 text-base leading-relaxed text-linen-300 text-pretty">
                    Send us a note with a few details about your home and what you are looking for. We will get back to you within one business day with next steps and availability for a consultation.
                </p>
                <div class="mt-6 space-y-3">
                    <?php
                    $tips = array(
                        'Tell us about your property and location',
                        'Mention which services interest you',
                        'Share your timeline and any questions',
                    );
                    foreach ( $tips as $tip ) :
                    ?>
                        <div class="flex items-start gap-3 text-sm text-linen-200">
                            <span style="color: #d3efbd; flex-shrink: 0; margin-top: 2px;"><?php hyvoxa_the_icon( 'check' ); ?></span>
                            <?php echo esc_html( $tip ); ?>
                        </div>
                    <?php endforeach; ?>
                </div>
                <a href="mailto:<?php echo esc_attr( $settings['email'] ); ?>" class="mt-8 inline-flex items-center gap-2 rounded-full bg-tea-300 px-7 py-3.5 font-semibold text-gunmetal-800 transition-all hover:bg-tea-400 hover:shadow-xl">
                    <?php hyvoxa_the_icon( 'mail' ); ?>
                    <?php echo esc_html( $settings['email'] ); ?>
                </a>
            </div>

            <!-- Business info -->
            <div class="reveal">
                <h2 class="font-display text-2xl font-bold text-gunmetal-800 sm:text-3xl">Business hours &amp; location</h2>
                <div class="mt-8 space-y-6">
                    <?php
                    $info = array(
                        array( 'clock',   'Hours',             $settings['hours'] ),
                        array( 'map-pin', 'Office & Showroom', $settings['address'] ),
                        array( 'phone',   'Phone',             $settings['phone'] ),
                    );
                    foreach ( $info as $item ) :
                    ?>
                        <div class="flex gap-4">
                            <div class="flex h-12 w-12 flex-shrink-0 items-center justify-center rounded-xl text-amaranth-600 bg-linen-100"><?php hyvoxa_the_icon( $item[0] ); ?></div>
                            <div>
                                <h3 class="font-display font-semibold text-gunmetal-800"><?php echo esc_html( $item[1] ); ?></h3>
                                <p class="mt-1 text-sm leading-relaxed text-gunmetal-500"><?php echo esc_html( $item[2] ); ?></p>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
                <div class="mt-8 rounded-xl bg-white p-5" style="box-shadow: 0 1px 3px rgba(46,53,50,0.05); border: 1px solid rgba(46,53,50,0.05);">
                    <h3 class="font-display text-sm font-semibold text-gunmetal-800">What happens after you reach out?</h3>
                    <ol class="mt-3 space-y-2 text-sm text-gunmetal-500">
                        <li class="flex gap-2"><span class="font-semibold text-amaranth-600">1.</span> We reply within one business day to acknowledge your inquiry.</li>
                        <li class="flex gap-2"><span class="font-semibold text-amaranth-600">2.</span> We schedule a no-obligation consultation at your home.</li>
                        <li class="flex gap-2"><span class="font-semibold text-amaranth-600">3.</span> You receive a tailored proposal with scope and pricing.</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Service area -->
<section class="bg-linen-100 py-20">
    <div class="mx-auto max-w-7xl px-5 lg:px-8">
        <div class="reveal relative overflow-hidden rounded-2xl p-12 text-center text-linen-100" style="background: #2e3532;">
            <div class="absolute inset-0 bg-grid opacity-30" aria-hidden="true"></div>
            <div class="relative">
                <div class="mx-auto text-tea-300"><?php hyvoxa_the_icon( 'map-pin' ); ?></div>
                <h2 class="mt-4 font-display text-2xl font-bold sm:text-3xl">Serving the greater Portland area</h2>
                <p class="mx-auto mt-3 max-w-xl text-linen-300 text-pretty">
                    Our team serves homes across the Portland metropolitan area and surrounding regions. Contact us to confirm we cover your location.
                </p>
                <a href="<?php echo esc_url( get_post_type_archive_link( 'hyvoxa_service' ) ?: home_url( '/services/' ) ); ?>" class="mt-6 inline-flex items-center gap-2 rounded-full border px-6 py-3 font-semibold text-linen-100 transition-all hover:bg-white/5" style="border-color: rgba(224,226,219,0.2);">
                    Explore Our Services
                    <?php hyvoxa_the_icon( 'arrow-right' ); ?>
                </a>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>
