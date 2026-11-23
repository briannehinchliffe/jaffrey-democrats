<?php
/**
 * Template part for displaying results in search pages
 *
 * @package jaffrey-democrats
 */

$post_type_obj = get_post_type_object( get_post_type() );
$type_label    = $post_type_obj ? $post_type_obj->labels->singular_name : get_post_type();
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'rounded-xl border border-slate-200 bg-white p-6 shadow-xs transition hover:border-slate-300' ); ?>>
    <div class="flex flex-wrap items-center gap-2 text-xs">
		<span class="rounded-md bg-slate-100 px-2.5 py-0.5 font-semibold tracking-wide text-[#0c2340] uppercase">
			<?php echo esc_html( $type_label ); ?>
		</span>
        <?php if ( 'post' === get_post_type() || 'tribe_events' === get_post_type() ) : ?>
            <time datetime="<?php echo esc_attr( get_the_date( 'c' ) ); ?>" class="text-slate-500">
                <?php echo esc_html( get_the_date() ); ?>
            </time>
        <?php endif; ?>
    </div>

    <h2 class="mt-2.5 font-serif text-xl font-bold text-slate-950">
        <a href="<?php the_permalink(); ?>" class="hover:text-red-800">
            <?php the_title(); ?>
        </a>
    </h2>

    <?php if ( get_the_excerpt() ) : ?>
        <p class="mt-2 text-sm leading-relaxed text-slate-600">
            <?php echo esc_html( wp_trim_words( get_the_excerpt(), 30 ) ); ?>
        </p>
    <?php endif; ?>

    <a href="<?php the_permalink(); ?>" class="mt-4 inline-flex items-center gap-1 text-sm font-semibold text-red-800 hover:text-red-900">
        <?php esc_html_e( 'View page', 'jaffrey-democrats' ); ?>
        <span aria-hidden="true">&rarr;</span>
    </a>
</article>