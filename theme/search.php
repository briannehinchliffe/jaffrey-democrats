<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package jaffrey-democrats
 */

get_header();

global $wp_query;
$search_query  = trim( get_search_query() );
$has_query     = '' !== $search_query;
$total_results = (int) $wp_query->found_posts;

$suggested_terms = array(
        __( 'events', 'jaffrey-democrats' ),
        __( 'education', 'jaffrey-democrats' ),
        __( 'volunteer', 'jaffrey-democrats' ),
        __( 'election results', 'jaffrey-democrats' ),
);
?>

    <main id="primary" class="site-main bg-slate-50">
        <!-- Navy Search Hero -->
        <section class="relative overflow-hidden bg-[#0c2340] py-16 text-white sm:py-20">
            <!-- Subtle decorative ring on right -->
            <div
                    aria-hidden="true"
                    class="pointer-events-none absolute top-1/2 -right-24 h-96 w-96 -translate-y-1/2 rounded-full border-[36px] border-white/[0.04]"
            ></div>

            <div class="relative mx-auto max-w-4xl px-4 text-center sm:px-6 lg:px-8">
                <p class="text-xs font-bold tracking-[0.2em] text-white uppercase">
                    <?php esc_html_e( 'Find What You Need', 'jaffrey-democrats' ); ?>
                </p>
                <h1 class="mt-3 font-serif text-4xl font-bold tracking-tight text-white sm:text-5xl">
                    <?php esc_html_e( 'Search our site', 'jaffrey-democrats' ); ?>
                </h1>
                <p class="mx-auto mt-3 max-w-2xl text-base text-slate-200">
                    <?php esc_html_e( 'Search for local issues, events, news, elected officials, and ways to get involved.', 'jaffrey-democrats' ); ?>
                </p>

                <div class="mx-auto mt-8 max-w-2xl text-left">
                    <?php get_search_form( array( 'variant' => 'hero' ) ); ?>
                </div>
            </div>
        </section>

        <!-- Results / Prompt Body -->
        <section class="py-14 sm:py-16">
            <div class="mx-auto max-w-4xl px-4 sm:px-6 lg:px-8">
                <?php if ( ! $has_query ) : ?>
                    <!-- Initial / Empty Query State -->
                    <div class="py-8 text-center">
                        <div class="mx-auto flex h-14 w-14 items-center justify-center rounded-full bg-slate-200/80 text-[#0c2340]">
                            <svg class="h-6 w-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-4.35-4.35m0 0A7.5 7.5 0 103.5 10.5a7.5 7.5 0 0013.15 6.15z" />
                            </svg>
                        </div>

                        <h2 class="mt-5 font-serif text-2xl font-bold text-[#0c2340]">
                            <?php esc_html_e( 'Start with a search above', 'jaffrey-democrats' ); ?>
                        </h2>
                        <p class="mt-2 text-sm text-slate-600">
                            <?php esc_html_e( 'Try a topic below:', 'jaffrey-democrats' ); ?>
                        </p>

                        <div class="mt-4 flex flex-wrap items-center justify-center gap-2">
                            <?php foreach ( $suggested_terms as $term ) : ?>
                                <a
                                        href="<?php echo esc_url( add_query_arg( 's', $term, home_url( '/' ) ) ); ?>"
                                        class="rounded-full border border-slate-300 bg-white px-3.5 py-1 text-xs font-medium text-slate-700 transition hover:border-red-800 hover:text-red-800"
                                >
                                    &ldquo;<?php echo esc_html( $term ); ?>&rdquo;
                                </a>
                            <?php endforeach; ?>
                        </div>
                    </div>

                <?php elseif ( have_posts() ) : ?>
                    <!-- Results Header -->
                    <div class="mb-6 flex flex-wrap items-center justify-between gap-3 border-b border-slate-200 pb-4">
                        <div>
                            <p class="text-sm text-slate-600">
                                <?php
                                printf(
                                /* translators: 1: number of results, 2: search term */
                                        esc_html( _n( '%1$s result for &ldquo;%2$s&rdquo;', '%1$s results for &ldquo;%2$s&rdquo;', $total_results, 'jaffrey-democrats' ) ),
                                        '<strong>' . esc_html( number_format_i18n( $total_results ) ) . '</strong>',
                                        esc_html( $search_query )
                                );
                                ?>
                            </p>
                        </div>
                        <a
                                href="<?php echo esc_url( home_url( '/?s=' ) ); ?>"
                                class="text-xs font-semibold text-red-800 hover:underline"
                        >
                            <?php esc_html_e( 'Clear search', 'jaffrey-democrats' ); ?>
                        </a>
                    </div>

                    <!-- Results List -->
                    <div class="space-y-4">
                        <?php
                        while ( have_posts() ) :
                            the_post();
                            get_template_part( 'template-parts/content/content', 'search' );
                        endwhile;
                        ?>
                    </div>

                    <!-- Pagination -->
                    <?php
                    $pagination = paginate_links(
                            array(
                                    'prev_text' => '&larr; ' . __( 'Previous', 'jaffrey-democrats' ),
                                    'next_text' => __( 'Next', 'jaffrey-democrats' ) . ' &rarr;',
                                    'type'      => 'array',
                            )
                    );

                    if ( ! empty( $pagination ) ) :
                        ?>
                        <nav aria-label="<?php esc_attr_e( 'Search results pagination', 'jaffrey-democrats' ); ?>" class="mt-10 flex flex-wrap items-center justify-center gap-2">
                            <?php foreach ( $pagination as $page_link ) : ?>
                                <span class="[&>a]:inline-flex [&>a]:rounded-md [&>a]:border [&>a]:border-slate-300 [&>a]:bg-white [&>a]:px-3.5 [&>a]:py-2 [&>a]:text-sm [&>a]:font-medium [&>a]:text-slate-700 [&>a]:hover:border-red-800 [&>a]:hover:text-red-800 [&>span.current]:inline-flex [&>span.current]:rounded-md [&>span.current]:bg-red-800 [&>span.current]:px-3.5 [&>span.current]:py-2 [&>span.current]:text-sm [&>span.current]:font-semibold [&>span.current]:text-white">
								<?php echo wp_kses_post( $page_link ); ?>
							</span>
                            <?php endforeach; ?>
                        </nav>
                    <?php endif; ?>

                <?php else : ?>
                    <?php get_template_part( 'template-parts/content/content', 'none' ); ?>
                <?php endif; ?>
            </div>
        </section>
    </main>

<?php
get_footer();