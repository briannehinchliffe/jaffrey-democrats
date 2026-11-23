<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package jaffrey-democrats
 */

get_header();

$recent_posts = new WP_Query(
        array(
                'post_type'           => 'post',
                'posts_per_page'      => 3,
                'post_status'         => 'publish',
                'ignore_sticky_posts' => true,
        )
);

$popular_links = array(
        array( 'label' => __( 'Events', 'jaffrey-democrats' ), 'url' => home_url( '/events/' ) ),
        array( 'label' => __( 'Our People', 'jaffrey-democrats' ), 'url' => home_url( '/our-people/' ) ),
        array( 'label' => __( 'Get Involved', 'jaffrey-democrats' ), 'url' => home_url( '/get-involved/' ) ),
);
?>

    <main id="primary" class="site-main">
        <!-- Hero + Search Card -->
        <section class="relative overflow-hidden bg-slate-50 py-16 lg:py-24">
            <div class="mx-auto max-w-6xl px-4 sm:px-6 lg:px-8">
                <div class="grid items-center gap-12 lg:grid-cols-12">
                    <!-- Left Column -->
                    <div class="lg:col-span-6">
                        <p class="text-xs font-bold tracking-[0.2em] text-red-800 uppercase">
                            <?php esc_html_e( 'Error 404', 'jaffrey-democrats' ); ?>
                        </p>
                        <h1 class="mt-3 font-serif text-4xl font-bold tracking-tight text-slate-950 sm:text-5xl lg:text-6xl">
                            <?php esc_html_e( 'Unanimously tabled.', 'jaffrey-democrats' ); ?>
                        </h1>
                        <p class="mt-5 max-w-xl text-base leading-relaxed text-slate-600 sm:text-lg">
                            <?php esc_html_e( 'That page has been moved, archived, or adjourned indefinitely. Here’s where you can find what’s actually on the agenda.', 'jaffrey-democrats' ); ?>
                        </p>

                        <div class="mt-8 flex flex-wrap items-center gap-3">
                            <a
                                    href="<?php echo esc_url( home_url( '/' ) ); ?>"
                                    class="inline-flex items-center gap-2 rounded-md bg-red-800 px-5 py-2.5 text-sm font-semibold text-white shadow-sm transition hover:bg-red-900 hover:no-underline"
                            >
                                <svg class="h-4 w-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 10.5L12 3l9 7.5V20a1 1 0 01-1 1h-5v-6H9v6H4a1 1 0 01-1-1v-9.5z" />
                                </svg>
                                <?php esc_html_e( 'Back to home', 'jaffrey-democrats' ); ?>
                            </a>
                        </div>
                    </div>

                    <!-- Right Column: Search Card -->
                    <div class="lg:col-span-6 lg:pl-6">
                        <div class="rounded-2xl border border-slate-200/80 bg-white p-7 shadow-lg sm:p-8">
                            <div class="flex h-10 w-10 items-center justify-center rounded-lg bg-slate-100 text-slate-700">
                                <svg class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-4.35-4.35m0 0A7.5 7.5 0 103.5 10.5a7.5 7.5 0 0013.15 6.15z" />
                                </svg>
                            </div>

                            <h2 class="mt-4 font-serif text-2xl font-bold text-slate-950">
                                <?php esc_html_e( 'Search the site', 'jaffrey-democrats' ); ?>
                            </h2>
                            <p class="mt-1.5 text-sm text-slate-600">
                                <?php esc_html_e( 'Try searching for an issue, event, person, or way to get involved.', 'jaffrey-democrats' ); ?>
                            </p>

                            <div class="mt-5">
                                <p class="mb-2 text-xs font-semibold text-slate-800">
                                    <?php esc_html_e( 'What are you looking for?', 'jaffrey-democrats' ); ?>
                                </p>
                                <?php get_search_form( array( 'variant' => 'card' ) ); ?>
                            </div>

<!--                            <div class="mt-6 border-t border-slate-100 pt-5">-->
<!--                                <p class="text-[11px] font-bold uppercase tracking-wider text-slate-400">-->
<!--                                    --><?php //esc_html_e( 'Popular pages', 'jaffrey-democrats' ); ?>
<!--                                </p>-->
<!--                                <div class="mt-3 flex flex-wrap gap-2">-->
<!--                                    --><?php //foreach ( $popular_links as $item ) : ?>
<!--                                        <a-->
<!--                                                href="--><?php //echo esc_url( $item['url'] ); ?><!--"-->
<!--                                                class="rounded-md bg-slate-100 px-3 py-1.5 text-xs font-semibold text-slate-700 transition hover:bg-red-50 hover:text-red-800"-->
<!--                                        >-->
<!--                                            --><?php //echo esc_html( $item['label'] ); ?>
<!--                                        </a>-->
<!--                                    --><?php //endforeach; ?>
<!--                                </div>-->
<!--                            </div>-->
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Latest News Strip -->
        <?php if ( $recent_posts->have_posts() ) : ?>
            <section class="border-t border-slate-200 bg-white py-14">
                <div class="mx-auto max-w-6xl px-4 sm:px-6 lg:px-8">
                    <div class="flex items-end justify-between gap-4">
                        <div>
                            <p class="text-xs font-bold tracking-[0.18em] text-red-800 uppercase">
                                <?php esc_html_e( 'Stay Informed', 'jaffrey-democrats' ); ?>
                            </p>
                            <h2 class="mt-1 font-serif text-2xl font-bold text-slate-950 sm:text-3xl">
                                <?php esc_html_e( 'Recent updates from Jaffrey', 'jaffrey-democrats' ); ?>
                            </h2>
                        </div>
                    </div>

                    <div class="mt-8 grid gap-6 md:grid-cols-3">
                        <?php
                        while ( $recent_posts->have_posts() ) :
                            $recent_posts->the_post();
                            ?>
                            <article class="flex flex-col justify-between rounded-xl border border-slate-200 bg-slate-50/50 p-6 transition hover:border-slate-300 hover:bg-white">
                                <div>
                                    <time datetime="<?php echo esc_attr( get_the_date( 'c' ) ); ?>" class="text-xs font-medium text-slate-500">
                                        <?php echo esc_html( get_the_date() ); ?>
                                    </time>
                                    <h3 class="mt-2 font-serif text-lg leading-snug font-bold text-slate-950">
                                        <a href="<?php the_permalink(); ?>" class="hover:text-red-800">
                                            <?php the_title(); ?>
                                        </a>
                                    </h3>
                                    <p class="mt-2.5 text-sm leading-relaxed text-slate-600">
                                        <?php echo esc_html( wp_trim_words( get_the_excerpt(), 22 ) ); ?>
                                    </p>
                                </div>
                                <a href="<?php the_permalink(); ?>" class="mt-5 inline-flex items-center gap-1 text-sm font-semibold text-red-800 hover:text-red-900">
                                    <?php esc_html_e( 'Read more', 'jaffrey-democrats' ); ?>
                                    <span aria-hidden="true">&rarr;</span>
                                </a>
                            </article>
                        <?php
                        endwhile;
                        wp_reset_postdata();
                        ?>
                    </div>
                </div>
            </section>
        <?php endif; ?>

        <!-- Bottom CTA Banner -->
<!--        <section class="bg-red-800 py-14 text-center text-white">-->
<!--            <div class="mx-auto max-w-3xl px-4 sm:px-6 lg:px-8">-->
<!--                <h2 class="font-serif text-3xl font-bold tracking-tight sm:text-4xl">-->
<!--                    --><?php //esc_html_e( 'Ready to Make a Difference?', 'jaffrey-democrats' ); ?>
<!--                </h2>-->
<!--                <p class="mt-3 text-base text-red-100">-->
<!--                    --><?php //esc_html_e( 'Join the Jaffrey Democrats and help build a better future for our community.', 'jaffrey-democrats' ); ?>
<!--                </p>-->
<!--                <div class="mt-7 flex flex-wrap items-center justify-center gap-3">-->
<!--                    <a-->
<!--                            href="--><?php //echo esc_url( home_url( '/volunteer/' ) ); ?><!--"-->
<!--                            class="rounded-md bg-white px-6 py-2.5 text-sm font-semibold text-red-900 shadow-sm transition hover:bg-red-50"-->
<!--                    >-->
<!--                        --><?php //esc_html_e( 'Volunteer', 'jaffrey-democrats' ); ?>
<!--                    </a>-->
<!--                    <a-->
<!--                            href="--><?php //echo esc_url( home_url( '/donate/' ) ); ?><!--"-->
<!--                            class="rounded-md border border-white/70 px-6 py-2.5 text-sm font-semibold text-white transition hover:border-white hover:bg-white/10"-->
<!--                    >-->
<!--                        --><?php //esc_html_e( 'Donate', 'jaffrey-democrats' ); ?>
<!--                    </a>-->
<!--                </div>-->
<!--            </div>-->
<!--        </section>-->
    </main>

<?php
get_footer();