<?php
$label        = $attributes['label'] ?? 'GENERAL ELECTION';
$target_date  = $attributes['targetDate'] ?? '2026-11-03T00:07:00';
$expired_text = $attributes['expiredText'] ?? 'Go vote today!';

$wp_timezone = wp_timezone();

try {
    $target_time = new DateTime( $target_date, $wp_timezone );
} catch ( Exception $e ) {
    $target_time = false;
}

$current_time = new DateTime( 'now', $wp_timezone );

if ( $target_time === false ) {
    $diff   = 0;
    $passed = true;
} else {
    $diff   = max( 0, $target_time->getTimestamp() - $current_time->getTimestamp() );
    $passed = $diff <= 0;
}

$target_iso     = $target_time ? $target_time->format( DateTime::ATOM ) : '';
$target_display = $target_time ? $target_time->format( 'F j, Y' ) : '';

$days    = str_pad( (string) floor( $diff / 86400 ), 2, '0', STR_PAD_LEFT );
$hours   = str_pad( (string) floor( ( $diff % 86400 ) / 3600 ), 2, '0', STR_PAD_LEFT );
$minutes = str_pad( (string) floor( ( $diff % 3600 ) / 60 ), 2, '0', STR_PAD_LEFT );
$seconds = str_pad( (string) floor( $diff % 60 ), 2, '0', STR_PAD_LEFT );
$units = array(
        array( 'label' => 'DAYS', 'key' => 'days', 'val' => $days ),
        array( 'label' => 'HRS',  'key' => 'hours', 'val' => $hours ),
        array( 'label' => 'MIN',  'key' => 'minutes', 'val' => $minutes ),
        array( 'label' => 'SEC',  'key' => 'seconds', 'val' => $seconds ),
);

$wrapper_attributes = get_block_wrapper_attributes( array(
        'class' => 'wp-block-jaffrey-democrats-countdown flex items-center justify-[inherit] gap-8 flex-wrap w-full',
) );
?>

<div
        <?php echo $wrapper_attributes; ?>
        data-target-date="<?php echo esc_attr( $target_iso ); ?>"
>
    <!-- Left Side: Event Details & Calendar Icon -->
    <div class="flex items-center gap-3.5">
        <!-- Calendar Icon Badge -->
        <div>
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#74aaff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" focusable="false">
                <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                <line x1="16" y1="2" x2="16" y2="6"></line>
                <line x1="8" y1="2" x2="8" y2="6"></line>
                <line x1="3" y1="10" x2="21" y2="10"></line>
            </svg>
        </div>

        <div>
            <?php if ( ! empty( $label ) ) : ?>
                <div class="mb-[0.2rem] text-[0.72rem] leading-tight font-extrabold tracking-[0.12em] text-[#74aaff] uppercase">
                    <?php echo esc_html( $label ); ?>
                </div>
            <?php endif; ?>
            <div class="text-xl leading-tight font-bold tracking-[-0.01em] text-white">
                <?php echo esc_html( $target_display ); ?>
            </div>
        </div>
    </div>

    <!-- Right Side: Timer Blocks -->
    <span
            class="countdown-expired <?php echo $passed ? 'inline' : 'hidden'; ?> text-base font-bold text-[#74aaff]"
    >
		<?php echo esc_html( $expired_text ); ?>
	</span>

    <div
            class="countdown-timer <?php echo $passed ? 'hidden' : 'flex'; ?> items-start gap-2.5"
    >
        <?php foreach ( $units as $i => $unit ) : ?>
            <div class="flex items-start gap-2.5">
                <div class="text-center">
                    <!-- Pill Box -->
                    <div class="flex min-w-[68px] items-center justify-center rounded-xl border border-white/20 bg-white/[0.07] px-3 py-3.5">
						<span
                                class="countdown-num countdown-<?php echo esc_attr( $unit['key'] ); ?> block font-serif text-[2.1rem] leading-none font-black text-white [font-variant-numeric:tabular-nums]"
                        ><?php echo esc_html( $unit['val'] ); ?></span>
                    </div>
                    <!-- Label below pill -->
                    <div class="mt-2 text-[0.65rem] font-bold tracking-[0.12em] text-white/50 uppercase">
                        <?php echo esc_html( $unit['label'] ); ?>
                    </div>
                </div>

                <?php if ( $i < count( $units ) - 1 ) : ?>
                    <span class="mt-2.5 text-2xl font-light text-white/25">:</span>
                <?php endif; ?>
            </div>
        <?php endforeach; ?>
    </div>
</div>