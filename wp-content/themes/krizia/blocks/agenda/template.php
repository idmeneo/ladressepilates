<?php
/**
 * Agenda block template.
 *
 * Displays future events synchronized from Amelia.
 *
 * @package Krizia
 */

$default_logo = get_template_directory_uri() . '/assets/images/logo-brown.png';

$logo           = get_field('agenda_logo') ?: $default_logo;
$title          = get_field('agenda_title') ?: 'Agenda';
$button_text    = get_field('agenda_button_text') ?: 'M’inscrire';
$maximum_events = absint(get_field('agenda_maximum_events'));
$empty_message  = get_field('agenda_empty_message');

$events = function_exists('krizia_get_amelia_events')
    ? krizia_get_amelia_events(true, true)
    : [];

if ($maximum_events > 0) {
    $events = array_slice($events, 0, $maximum_events);
}

$block_id = 'krz-agenda-' . uniqid();

if (isset($block) && is_array($block)) {
    $block_id = !empty($block['anchor'])
        ? $block['anchor']
        : 'krz-agenda-' . $block['id'];
}

$timezone = wp_timezone();

/**
 * Format an Amelia price.
 *
 * @param mixed $price Price.
 * @return string
 */
$format_price = static function ($price) {
    $price = (float) $price;
    $decimals = floor($price) === $price ? 0 : 2;

    return number_format_i18n($price, $decimals) . ' €';
};

/**
 * Format an event duration.
 *
 * @param string $start Start date.
 * @param string $end   End date.
 * @return string
 */
$format_duration = static function ($start, $end) use ($timezone) {
    if (!$start || !$end) {
        return '';
    }

    try {
        $start_date = new DateTimeImmutable($start, $timezone);
        $end_date   = new DateTimeImmutable($end, $timezone);
    } catch (Exception $exception) {
        return '';
    }

    $seconds = $end_date->getTimestamp() - $start_date->getTimestamp();

    if ($seconds <= 0) {
        return '';
    }

    $hours   = floor($seconds / HOUR_IN_SECONDS);
    $minutes = floor(($seconds % HOUR_IN_SECONDS) / MINUTE_IN_SECONDS);

    if ($hours && $minutes) {
        return sprintf('%d h %02d', $hours, $minutes);
    }

    if ($hours) {
        return sprintf('%d h', $hours);
    }

    return sprintf('%d min', $minutes);
};
?>

<section id="<?php echo esc_attr($block_id); ?>" class="krz-agenda">
    <div class="container krz-agenda__container">
        <div class="krz-agenda__card">
            <div class="krz-agenda__body">
                <?php if ($logo) : ?>
                    <img
                        class="krz-agenda__logo"
                        src="<?php echo esc_url($logo); ?>"
                        alt=""
                        aria-hidden="true"
                        loading="lazy"
                    >
                <?php endif; ?>

                <?php if ($title) : ?>
                    <h2 class="krz-agenda__title">
                        <?php echo esc_html($title); ?>
                    </h2>
                <?php endif; ?>

                <?php if ($events) : ?>
                    <div class="krz-agenda__list">
                        <?php foreach ($events as $event) : ?>
                            <?php
                            $event_id = absint($event['id'] ?? 0);
                            $name     = $event['name'] ?? '';
                            $text     = $event['description'] ?? '';
                            $start    = $event['start'] ?? '';
                            $end      = $event['end'] ?? '';
                            $price    = $event['price'] ?? 0;
                            $duration = $format_duration($start, $end);
                            $trigger  = 'krz-amelia-event-' . $block_id . '-' . $event_id;

                            $start_date = null;
                            $end_date   = null;

                            if ($start) {
                                try {
                                    $start_date = new DateTimeImmutable($start, $timezone);
                                } catch (Exception $exception) {
                                    $start_date = null;
                                }
                            }

                            if ($end) {
                                try {
                                    $end_date = new DateTimeImmutable($end, $timezone);
                                } catch (Exception $exception) {
                                    $end_date = null;
                                }
                            }

                            $day = $start_date
                                ? wp_date('d', $start_date->getTimestamp(), $timezone)
                                : '';

                            $month = $start_date
                                ? wp_date('M', $start_date->getTimestamp(), $timezone)
                                : '';

                            $year = $start_date
                                ? wp_date('Y', $start_date->getTimestamp(), $timezone)
                                : '';

                            $start_time = $start_date
                                ? wp_date('H\hi', $start_date->getTimestamp(), $timezone)
                                : '';

                            $end_time = $end_date
                                ? wp_date('H\hi', $end_date->getTimestamp(), $timezone)
                                : '';

                            $time_range = '';

                            if ($start_time && $end_time) {
                                $time_range = $start_time . ' - ' . $end_time;
                            } elseif ($start_time) {
                                $time_range = $start_time;
                            }
                            ?>

                            <article class="krz-agenda__event">
                                <div class="krz-agenda__date">
                                    <?php if ($day) : ?>
                                        <strong><?php echo esc_html($day); ?></strong>
                                    <?php endif; ?>

                                    <?php if ($month) : ?>
                                        <span>
                                            <?php echo esc_html(mb_strtoupper($month)); ?>
                                        </span>
                                    <?php endif; ?>

                                    <?php if ($year) : ?>
                                        <small><?php echo esc_html($year); ?></small>
                                    <?php endif; ?>

                                    <?php if ($time_range) : ?>
                                        <em><?php echo esc_html($time_range); ?></em>
                                    <?php endif; ?>
                                </div>

                                <div class="krz-agenda__content">
                                    <?php if ($name) : ?>
                                        <h3 class="krz-agenda__event-title">
                                            <?php echo esc_html($name); ?>
                                        </h3>
                                    <?php endif; ?>

                                    <?php if ($text) : ?>
                                        <div class="krz-agenda__text">
                                            <?php echo wp_kses_post(wpautop($text)); ?>
                                        </div>
                                    <?php endif; ?>

                                    <?php if ($duration) : ?>
                                        <p class="krz-agenda__duration">
                                            <?php echo esc_html('Durée : ' . $duration); ?>
                                        </p>
                                    <?php endif; ?>
                                </div>

                                <div class="krz-agenda__action">
                                    <p class="krz-agenda__price">
                                        <?php
                                        echo $price > 0
                                            ? esc_html($format_price($price))
                                            : esc_html__('Gratuit', 'krizia');
                                        ?>
                                    </p>

                                    <?php if ($event_id) : ?>
                                        <button
                                            class="krz-agenda__button <?php echo esc_attr($trigger); ?>"
                                            type="button"
                                        >
                                            <?php echo esc_html($button_text); ?>
                                        </button>

                                        <div
                                            class="krz-agenda__amelia"
                                            aria-hidden="true"
                                        >
                                            <?php
                                            echo do_shortcode(
                                                sprintf(
                                                    '[ameliaeventslistbooking event=%1$d trigger="%2$s" trigger_type="class" in_dialog=1]',
                                                    $event_id,
                                                    esc_attr($trigger)
                                                )
                                            );
                                            ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </article>
                        <?php endforeach; ?>
                    </div>
                <?php elseif ($empty_message) : ?>
                    <p class="krz-agenda__empty">
                        <?php echo esc_html($empty_message); ?>
                    </p>
                <?php elseif (current_user_can('edit_posts')) : ?>
                    <p class="krz-agenda__empty">
                        Aucun événement Amelia futur et visible n’est synchronisé.
                    </p>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>