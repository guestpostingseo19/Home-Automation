<?php
/**
 * Single legal document page.
 *
 * @package Hyvoxa
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

get_header();

while ( have_posts() ) :
    the_post();

    $meta       = hyvoxa_get_legal_meta( get_the_ID() );
    $sections   = $meta['sections'];
    $legal_q    = hyvoxa_get_legal_query();
    $other_pages = array();
    while ( $legal_q->have_posts() ) {
        $legal_q->the_post();
        if ( get_the_ID() !== get_queried_object_id() ) {
            $other_pages[] = array(
                'id'    => get_the_ID(),
                'title' => get_the_title(),
                'slug'  => get_post_field( 'post_name', get_the_ID() ),
            );
        }
    }
    wp_reset_postdata();
?>

<!-- Header -->
<section class="pt-32 pb-16 text-linen-100" style="background: #2e3532;">
    <div class="absolute inset-0 bg-grid opacity-20" aria-hidden="true"></div>
    <div class="reveal relative mx-auto max-w-4xl px-5 lg:px-8">
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="group inline-flex items-center gap-2 text-sm text-linen-400 transition-colors hover:text-tea-300">
            <?php hyvoxa_the_icon( 'arrow-left' ); ?>
            Back to Home
        </a>
        <div class="mt-6 flex items-center gap-3">
            <div class="flex h-12 w-12 items-center justify-center rounded-xl text-tea-300" style="background: rgba(139,38,53,0.2); border: 1px solid rgba(212,239,189,0.2);">
                <?php hyvoxa_the_icon( 'shield-check' ); ?>
            </div>
            <span class="text-xs font-bold uppercase tracking-[0.2em] text-tea-300">Legal</span>
        </div>
        <h1 class="mt-4 font-display text-3xl font-bold leading-tight tracking-tight sm:text-4xl lg:text-5xl text-balance"><?php the_title(); ?></h1>
        <p class="mt-3 text-sm text-linen-400">Last updated: <?php echo esc_html( $meta['last_updated'] ); ?></p>
    </div>
</section>

<!-- Content + sidebar -->
<section class="bg-linen-100 py-16">
    <div class="mx-auto max-w-7xl px-5 lg:px-8">
        <div class="grid gap-12 lg:grid-cols-[1fr_280px]">
            <!-- Article -->
            <div class="reveal min-w-0">
                <p class="mb-10 text-lg leading-relaxed text-gunmetal-600 text-pretty border-l-4 border-amaranth-600 pl-6">
                    <?php echo esc_html( $meta['intro'] ); ?>
                </p>
                <div class="prose-hyvoxa max-w-none">
                    <?php if ( is_array( $sections ) ) : foreach ( $sections as $section ) : ?>
                        <h2><?php echo esc_html( $section['heading'] ); ?></h2>
                        <?php if ( is_array( $section['body'] ) ) : foreach ( $section['body'] as $para ) : ?>
                            <p><?php echo esc_html( $para ); ?></p>
                        <?php endforeach; endif; ?>
                    <?php endforeach; endif; ?>
                </div>
                <div class="mt-12 rounded-xl p-6 text-center" style="background: rgba(210,212,200,0.4);">
                    <p class="text-sm text-gunmetal-500">
                        Questions about this policy? Email us at
                        <a href="mailto:<?php echo esc_attr( hyvoxa_get_settings()['email'] ); ?>" class="font-semibold text-amaranth-600 hover:underline"><?php echo esc_html( hyvoxa_get_settings()['email'] ); ?></a>
                    </p>
                </div>
            </div>

            <!-- Sidebar -->
            <aside class="lg:sticky lg:top-28 lg:self-start">
                <div class="rounded-2xl border bg-white p-6" style="border-color: rgba(46,53,50,0.1);">
                    <h3 class="flex items-center gap-2 font-display text-sm font-semibold uppercase tracking-wider text-gunmetal-800">
                        <span class="text-amaranth-600"><?php hyvoxa_the_icon( 'file-text' ); ?></span>
                        Legal Documents
                    </h3>
                    <ul class="mt-4 space-y-1.5">
                        <?php
                        $legal_q2 = hyvoxa_get_legal_query();
                        while ( $legal_q2->have_posts() ) :
                            $legal_q2->the_post();
                            $active = get_the_ID() === get_queried_object_id();
                        ?>
                            <li>
                                <a href="<?php the_permalink(); ?>" class="block w-full rounded-lg px-3 py-2 text-left text-sm transition-colors <?php echo $active ? 'font-semibold text-amaranth-600' : 'text-gunmetal-500 hover:bg-gunmetal-800/5 hover:text-gunmetal-800'; ?>" <?php echo $active ? 'style="background: rgba(139,38,53,0.1);"' : ''; ?>>
                                    <?php the_title(); ?>
                                </a>
                            </li>
                        <?php endwhile; wp_reset_postdata(); ?>
                    </ul>
                </div>
                <div class="mt-6 rounded-2xl p-6 text-linen-100" style="background: #2e3532;">
                    <h3 class="font-display text-sm font-semibold uppercase tracking-wider text-tea-300">Need help?</h3>
                    <p class="mt-2 text-sm leading-relaxed text-linen-300">Our team is happy to clarify any of our policies.</p>
                    <a href="mailto:<?php echo esc_attr( hyvoxa_get_settings()['email'] ); ?>" class="mt-4 inline-block text-sm font-semibold text-tea-300 hover:text-tea-400"><?php echo esc_html( hyvoxa_get_settings()['email'] ); ?></a>
                </div>
                <?php if ( ! empty( $other_pages ) ) : $np = $other_pages[0]; ?>
                    <a href="<?php echo esc_url( get_permalink( $np['id'] ) ); ?>" class="mt-6 flex w-full items-center justify-between rounded-2xl border bg-white p-5 text-left transition-all hover:shadow-md" style="border-color: rgba(46,53,50,0.1);">
                        <div>
                            <span class="text-xs text-gunmetal-400">Next document</span>
                            <p class="mt-1 font-display text-sm font-semibold text-gunmetal-800"><?php echo esc_html( $np['title'] ); ?></p>
                        </div>
                        <span class="rotate-180 text-amaranth-600"><?php hyvoxa_the_icon( 'arrow-left' ); ?></span>
                    </a>
                <?php endif; ?>
            </aside>
        </div>
    </div>
</section>

<?php
endwhile;
get_footer();
