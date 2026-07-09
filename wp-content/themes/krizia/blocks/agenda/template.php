<?php
/**
 * Agenda block template.
 *
 * @package Krizia
 */

$default_logo = get_template_directory_uri() . '/assets/images/logo-brown.png';

$logo   = get_field('agenda_logo') ?: $default_logo;
$title  = get_field('agenda_title') ?: 'Agenda';
$events = get_field('agenda_events');

if (!$events) {
    $events = [
        [
            'day'      => '12',
            'month'    => 'JUIN',
            'year'     => '2025',
            'label'    => 'Workshop',
            'title'    => 'Formation continue',
            'text'     => 'Une journée dédiée à l’approfondissement de la pratique et à la précision du mouvement.',
            'duration' => '1 journée',
            'price'    => '180 €',
            'button'   => [
                'url'    => '#reservation',
                'title'  => 'M’inscrire',
                'target' => '',
            ],
        ],
    ];
}

$block_id = 'krz-agenda-' . uniqid();

if (isset($block) && is_array($block)) {
    $block_id = !empty($block['anchor']) ? $block['anchor'] : 'krz-agenda-' . $block['id'];
}
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
                    <h2 class="krz-agenda__title"><?php echo esc_html($title); ?></h2>
                <?php endif; ?>

                <?php if ($events) : ?>
                    <div class="krz-agenda__list">
                        <?php foreach ($events as $event) : ?>
                            <?php
                            $day      = $event['day'] ?? '';
                            $month    = $event['month'] ?? '';
                            $year     = $event['year'] ?? '';
                            $label    = $event['label'] ?? '';
                            $name     = $event['title'] ?? '';
                            $text     = $event['text'] ?? '';
                            $duration = $event['duration'] ?? '';
                            $price    = $event['price'] ?? '';
                            $button   = $event['button'] ?? null;

                            $button_url    = is_array($button) && !empty($button['url']) ? $button['url'] : '#reservation';
                            $button_title  = is_array($button) && !empty($button['title']) ? $button['title'] : 'M’inscrire';
                            $button_target = is_array($button) && !empty($button['target']) ? $button['target'] : '_self';
                            ?>

                            <article class="krz-agenda__event">
                                <div class="krz-agenda__date">
                                    <?php if ($day) : ?>
                                        <strong><?php echo esc_html($day); ?></strong>
                                    <?php endif; ?>

                                    <?php if ($month) : ?>
                                        <span><?php echo esc_html($month); ?></span>
                                    <?php endif; ?>

                                    <?php if ($year) : ?>
                                        <small><?php echo esc_html($year); ?></small>
                                    <?php endif; ?>

                                    <?php if ($label) : ?>
                                        <em><?php echo esc_html($label); ?></em>
                                    <?php endif; ?>
                                </div>

                                <div class="krz-agenda__content">
                                    <?php if ($name) : ?>
                                        <h3 class="krz-agenda__event-title"><?php echo esc_html($name); ?></h3>
                                    <?php endif; ?>

                                    <?php if ($text) : ?>
                                        <div class="krz-agenda__text">
                                            <?php echo wp_kses_post(wpautop($text)); ?>
                                        </div>
                                    <?php endif; ?>

                                    <?php if ($duration) : ?>
                                        <p class="krz-agenda__duration"><?php echo esc_html($duration); ?></p>
                                    <?php endif; ?>
                                </div>

                                <div class="krz-agenda__action">
                                    <?php if ($price) : ?>
                                        <p class="krz-agenda__price"><?php echo esc_html($price); ?></p>
                                    <?php endif; ?>

                                    <?php if ($button_title) : ?>
                                        <a
                                            class="krz-agenda__button"
                                            href="<?php echo esc_url($button_url); ?>"
                                            target="<?php echo esc_attr($button_target); ?>"
                                        >
                                            <?php echo esc_html($button_title); ?>
                                        </a>
                                    <?php endif; ?>
                                </div>
                            </article>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>