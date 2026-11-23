<?php
/**
 * Custom search form for jaffrey-democrats
 *
 * @package jaffrey-democrats
 */

$unique_id = wp_unique_id( 'search-form-' );
$variant   = $args['variant'] ?? 'hero'; // 'hero' | 'card'
$query_val = get_search_query();
?>

<form role="search" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>" class="w-full">
    <label for="<?php echo esc_attr( $unique_id ); ?>" class="sr-only">
        <?php esc_html_e( 'What are you looking for?', 'jaffrey-democrats' ); ?>
    </label>

    <?php if ( 'card' === $variant ) : ?>
        <div class="flex items-stretch overflow-hidden rounded-lg border border-slate-300 bg-white focus-within:border-red-800 focus-within:ring-2 focus-within:ring-red-800/20">
            <input
                id="<?php echo esc_attr( $unique_id ); ?>"
                type="search"
                name="s"
                value="<?php echo esc_attr( $query_val ); ?>"
                placeholder="<?php esc_attr_e( 'Search...', 'jaffrey-democrats' ); ?>"
                class="w-full border-0 bg-transparent px-3.5 py-2.5 text-sm text-slate-900 placeholder-slate-400 focus:ring-0 focus:outline-none"
            />
            <button
                type="submit"
                aria-label="<?php esc_attr_e( 'Submit search', 'jaffrey-democrats' ); ?>"
                class="inline-flex items-center justify-center px-4 text-slate-600 transition hover:bg-slate-50 hover:text-slate-900"
            >
                <svg class="h-4 w-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-4.35-4.35m0 0A7.5 7.5 0 103.5 10.5a7.5 7.5 0 0013.15 6.15z" />
                </svg>
            </button>
        </div>
    <?php else : ?>
        <div class="flex items-center gap-2 rounded-xl bg-white p-2 pl-4 shadow-xl ring-1 ring-black/5">
            <svg class="h-5 w-5 shrink-0 text-slate-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-4.35-4.35m0 0A7.5 7.5 0 103.5 10.5a7.5 7.5 0 0013.15 6.15z" />
            </svg>
            <input
                id="<?php echo esc_attr( $unique_id ); ?>"
                type="search"
                name="s"
                value="<?php echo esc_attr( $query_val ); ?>"
                placeholder="<?php esc_attr_e( 'What are you looking for?', 'jaffrey-democrats' ); ?>"
                class="w-full min-w-0 border-0 bg-transparent py-2.5 text-base text-slate-900 placeholder-slate-400"
            />
            <button
                type="submit"
                class="shrink-0 rounded-lg bg-red-800 px-6 py-2.5 text-sm font-semibold text-white transition hover:bg-red-900 focus:ring-2 focus:ring-red-800 focus:ring-offset-2 focus:outline-none"
            >
                <?php esc_html_e( 'Search', 'jaffrey-democrats' ); ?>
            </button>
        </div>
    <?php endif; ?>
</form>