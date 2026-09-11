<?php
$label        = $attributes['label'] ?? 'GENERAL ELECTION';
$target_date  = $attributes['targetDate'] ?? '2026-11-03T00:07:00';
$expired_text = $attributes['expiredText'] ?? 'Go vote today!';

$wp_timezone = wp_timezone();
if ( $wp_timezone->getName() === 'UTC' ) {
    $wp_timezone = new DateTimeZone( 'America/New_York' );
}

$target_time  = new DateTime( $target_date, $wp_timezone );
$current_time = new DateTime( 'now', $wp_timezone );

$diff   = max( 0, $target_time->getTimestamp() - $current_time->getTimestamp() );
$passed = $diff <= 0;

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
    'class' => 'wp-block-jaffrey-democrats-countdown',
) );
?>

<div
    <?php echo $wrapper_attributes; ?>
        data-target-date="<?php echo esc_attr( $target_time->format( 'c' ) ); ?>"
        style="display: flex; align-items: center; justify-content: inherit; gap: 2rem; flex-wrap: wrap; width: 100%;"
>
    <!-- Left Side: Event Details & Calendar Icon -->
    <div style="display: flex; align-items: center; gap: 0.85rem;">
        <!-- Calendar Icon Badge -->
        <div>
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#74aaff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                <line x1="16" y1="2" x2="16" y2="6"></line>
                <line x1="8" y1="2" x2="8" y2="6"></line>
                <line x1="3" y1="10" x2="21" y2="10"></line>
            </svg>
        </div>

        <div>
            <?php if ( ! empty( $label ) ) : ?>
                <div style="color: #74aaff; font-size: 0.72rem; font-weight: 800; letter-spacing: 0.12em; text-transform: uppercase; line-height: 1.2; margin-bottom: 0.2rem;">
                    <?php echo esc_html( $label ); ?>
                </div>
            <?php endif; ?>
            <div style="color: #ffffff; font-size: 1.25rem; font-weight: 700; line-height: 1.2; letter-spacing: -0.01em;">
                <?php echo esc_html( $target_time->format( 'F j, Y' ) ); ?>
            </div>
        </div>
    </div>

    <!-- Right Side: Timer Blocks -->
    <span
            class="countdown-expired"
            style="color: #74aaff; font-weight: 700; font-size: 1rem; display: <?php echo $passed ? 'inline' : 'none'; ?>;"
    >
		<?php echo esc_html( $expired_text ); ?>
	</span>

    <div
            class="countdown-timer"
            style="display: <?php echo $passed ? 'none' : 'flex'; ?>; align-items: flex-start; gap: 0.6rem;"
    >
        <?php foreach ( $units as $i => $unit ) : ?>
            <div style="display: flex; align-items: flex-start; gap: 0.6rem;">
                <div style="text-align: center;">
                    <!-- Pill Box -->
                    <div style="background-color: rgba(255, 255, 255, 0.07); border: 1px solid rgba(255, 255, 255, 0.2); border-radius: 12px; padding: 0.85rem 0.75rem; min-width: 68px; display: flex; align-items: center; justify-content: center;">
						<span
                                class="countdown-num countdown-<?php echo esc_attr( $unit['key'] ); ?>"
                                style="display: block; font-family: 'Merriweather', serif; font-size: 2.1rem; font-weight: 900; color: #ffffff; line-height: 1; font-variant-numeric: tabular-nums;"
                        ><?php echo esc_html( $unit['val'] ); ?></span>
                    </div>
                    <!-- Label below pill -->
                    <div style="color: rgba(255, 255, 255, 0.5); font-size: 0.65rem; font-weight: 700; letter-spacing: 0.12em; text-transform: uppercase; margin-top: 0.5rem;">
                        <?php echo esc_html( $unit['label'] ); ?>
                    </div>
                </div>

                <?php if ( $i < count( $units ) - 1 ) : ?>
                    <span style="color: rgba(255, 255, 255, 0.25); font-size: 1.5rem; font-weight: 300; margin-top: 0.6rem;">:</span>
                <?php endif; ?>
            </div>
        <?php endforeach; ?>
    </div>
</div>