<?php
/**
 * Template Name: About Page
 *
 * @package Hyvoxa
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

get_header();

$settings = hyvoxa_get_settings();
?>

<!-- Hero -->
<section class="relative overflow-hidden pt-32 pb-24 text-linen-100" style="background: #2e3532;">
    <?php hyvoxa_gradient_mesh(); ?>
    <div class="absolute inset-0 bg-grid opacity-30" aria-hidden="true"></div>
    <div class="reveal relative mx-auto max-w-4xl px-5 text-center lg:px-8">
        <span class="inline-flex items-center gap-2 rounded-full border px-4 py-1.5 text-xs font-medium text-tea-300" style="border-color: rgba(212,239,189,0.3); background: rgba(212,239,189,0.1);">
            <?php hyvoxa_the_icon( 'sparkles' ); ?>
            Our Story
        </span>
        <h1 class="mt-6 font-display text-4xl font-bold leading-tight tracking-tight sm:text-5xl lg:text-6xl text-balance">
            We build homes that
            <span class="block" style="background: linear-gradient(to right, #d3efbd, #d0677c); -webkit-background-clip: text; background-clip: text; -webkit-text-fill-color: transparent;">
                think and feel
            </span>
        </h1>
        <p class="mx-auto mt-6 max-w-2xl text-lg leading-relaxed text-linen-300 text-pretty">
            For over a decade, Hyvoxa has been designing and installing smart home systems that blend advanced technology with genuine human empathy. We believe a home should serve the people who live in it, quietly and beautifully.
        </p>
    </div>
</section>

<!-- Stats -->
<section class="bg-linen-100 py-16">
    <div class="mx-auto max-w-7xl px-5 lg:px-8">
        <div class="grid grid-cols-2 gap-8 lg:grid-cols-4">
            <?php foreach ( $settings['stats'] as $i => $stat ) :
                $raw     = $stat['value'];
                $numeric = preg_replace( '/[^0-9.]/', '', $raw );
                $suffix  = str_replace( $numeric, '', $raw );
            ?>
                <div class="reveal text-center" style="transition-delay: <?php echo esc_attr( $i * 80 ); ?>ms;">
                    <div class="font-display text-4xl font-bold text-amaranth-600 lg:text-5xl">
                        <span data-counter="<?php echo esc_attr( $numeric ); ?>" data-suffix="<?php echo esc_attr( $suffix ); ?>">0<?php echo esc_html( $suffix ); ?></span>
                    </div>
                    <div class="mt-2 text-sm font-medium text-gunmetal-500"><?php echo esc_html( $stat['label'] ); ?></div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- Mission & Vision -->
<section class="py-24" style="background: rgba(210,212,200,0.4);">
    <div class="mx-auto max-w-7xl px-5 lg:px-8">
        <div class="grid gap-8 md:grid-cols-2">
            <?php
            $mv = array(
                array( 'target', 'Our Mission', 'Make intelligent living effortless', 'We exist to remove friction from daily life through technology that anticipates, adapts and disappears. Every system we design is measured against one question: does this genuinely make life better for the people who live here?' ),
                array( 'eye',    'Our Vision',  'A world where every home is intelligent', 'We envision a future where smart homes are not a luxury but a standard, where energy efficiency, security and comfort are built into the fabric of every residence, and where the technology is so well integrated that it is felt rather than seen.' ),
            );
            foreach ( $mv as $i => $item ) :
            ?>
                <div class="reveal rounded-2xl border bg-linen-100 p-8 shadow-sm" style="border-color: rgba(46,53,50,0.1); transition-delay: <?php echo esc_attr( $i * 100 ); ?>ms;">
                    <div class="flex h-14 w-14 items-center justify-center rounded-2xl text-amaranth-600" style="background: rgba(139,38,53,0.1);">
                        <?php hyvoxa_the_icon( $item[0] ); ?>
                    </div>
                    <span class="mt-5 block text-xs font-bold uppercase tracking-wider text-amaranth-600"><?php echo esc_html( $item[1] ); ?></span>
                    <h2 class="mt-2 font-display text-2xl font-bold text-gunmetal-800"><?php echo esc_html( $item[2] ); ?></h2>
                    <p class="mt-3 text-base leading-relaxed text-gunmetal-500 text-pretty"><?php echo esc_html( $item[3] ); ?></p>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- Values -->
<section class="bg-linen-100 py-24">
    <div class="mx-auto max-w-7xl px-5 lg:px-8">
        <div class="reveal mx-auto max-w-2xl text-center">
            <span class="text-xs font-bold uppercase tracking-[0.2em] text-amaranth-600">What drives us</span>
            <h2 class="mt-3 font-display text-3xl font-bold text-gunmetal-800 sm:text-4xl text-balance">The principles behind every install</h2>
        </div>
        <div class="mt-14 grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
            <?php
            $values = array(
                array( 'heart',   'Human-Centered Design',  'Technology is only valuable when it serves people. We design around how you live, not around what devices can do.' ),
                array( 'cpu',     'Engineering Excellence', 'Concealed wiring, calibrated systems and meticulous attention to detail. We hold our work to the highest technical standard.' ),
                array( 'award',   'Uncompromising Quality', 'We use premium components and refuse to cut corners. A Hyvoxa system is built to perform flawlessly for years.' ),
                array( 'users',   'Genuine Partnership',    'We see clients as long-term relationships, not transactions. Your system evolves with your life, and we are there for every change.' ),
                array( 'leaf',    'Sustainable Practice',   'Energy-aware automation and responsible sourcing. We help you reduce your footprint without sacrificing comfort.' ),
                array( 'shield',  'Privacy First',          'Local processing and encrypted access. Your home data belongs to you, and we design our systems to keep it that way.' ),
            );
            foreach ( $values as $i => $v ) :
            ?>
                <div class="group reveal rounded-2xl border bg-white p-7 transition-all hover:shadow-lg" style="border-color: rgba(46,53,50,0.1); transition-delay: <?php echo esc_attr( $i * 80 ); ?>ms;">
                    <div class="flex h-12 w-12 items-center justify-center rounded-xl text-amaranth-600 transition-colors group-hover:bg-amaranth-600 group-hover:text-linen-100" style="background: rgba(139,38,53,0.1);">
                        <?php hyvoxa_the_icon( $v[0] ); ?>
                    </div>
                    <h3 class="mt-4 font-display font-semibold text-gunmetal-800"><?php echo esc_html( $v[1] ); ?></h3>
                    <p class="mt-2 text-sm leading-relaxed text-gunmetal-500"><?php echo esc_html( $v[2] ); ?></p>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- Journey timeline -->
<section class="relative py-24 text-linen-100" style="background: #2e3532;">
    <div class="absolute inset-0 bg-grid opacity-20" aria-hidden="true"></div>
    <div class="relative mx-auto max-w-4xl px-5 lg:px-8">
        <div class="reveal text-center">
            <span class="text-xs font-bold uppercase tracking-[0.2em] text-tea-300">Our Journey</span>
            <h2 class="mt-3 font-display text-3xl font-bold text-linen-100 sm:text-4xl text-balance">Twelve years of intelligent homes</h2>
        </div>
        <div class="mt-14 space-y-8">
            <?php
            $timeline = array(
                array( '2013', 'The first install',          'Hyvoxa begins with a single whole-home lighting project in Portland. The philosophy is set: technology should serve, never complicate.' ),
                array( '2016', 'Expansion into security',    'We integrate surveillance and access control, offering complete home protection alongside automation.' ),
                array( '2019', '500 homes automated',        'A milestone reached through word-of-mouth referrals and a reputation for meticulous, reliable work.' ),
                array( '2022', 'AI and energy intelligence', 'We introduce predictive routines and energy-aware automation, cutting average client energy use by 40%.' ),
                array( '2025', 'Matter-ready future',        'Our platforms adopt the Matter standard, ensuring every system we install remains compatible with the devices of tomorrow.' ),
            );
            foreach ( $timeline as $i => $item ) :
            ?>
                <div class="reveal relative grid grid-cols-[auto_1fr] gap-6" style="transition-delay: <?php echo esc_attr( $i * 100 ); ?>ms;">
                    <div class="flex flex-col items-center">
                        <span class="flex h-14 w-14 items-center justify-center rounded-full font-display text-sm font-bold text-linen-100" style="background: #8b2635; box-shadow: 0 0 0 4px #1d211f;"><?php echo esc_html( $item[0] ); ?></span>
                        <?php if ( $i < count( $timeline ) - 1 ) : ?>
                            <span class="mt-2 h-full w-px" style="background: rgba(224,226,219,0.2);"></span>
                        <?php endif; ?>
                    </div>
                    <div class="pb-4">
                        <h3 class="font-display text-lg font-semibold text-linen-100"><?php echo esc_html( $item[1] ); ?></h3>
                        <p class="mt-1.5 text-sm leading-relaxed text-linen-400 text-pretty"><?php echo esc_html( $item[2] ); ?></p>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- CTA -->
<section class="relative overflow-hidden py-24" style="background: #8b2635;">
    <div class="absolute inset-0 bg-grid opacity-20" aria-hidden="true"></div>
    <div class="reveal relative mx-auto max-w-3xl px-5 text-center lg:px-8">
        <h2 class="font-display text-3xl font-bold text-linen-100 sm:text-4xl text-balance">Let's build your intelligent home together</h2>
        <p class="mt-4 text-lg text-linen-200 text-pretty">Reach out for a consultation and discover what Hyvoxa can do for your home and your daily life.</p>
        <a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" class="mt-8 inline-flex items-center gap-2 rounded-full bg-linen-100 px-7 py-3.5 font-semibold text-amaranth-600 transition-all hover:bg-white hover:shadow-xl">
            Get in Touch
            <?php hyvoxa_the_icon( 'arrow-right' ); ?>
        </a>
    </div>
</section>

<?php get_footer(); ?>
