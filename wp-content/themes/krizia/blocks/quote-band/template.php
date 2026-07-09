<?php
/**
 * Quote Band block template.
 *
 * @package Krizia
 */

$default_background = get_template_directory_uri() . '/assets/images/studio-wide.jpg';

$background = get_field('quote_band_background') ?: $default_background;
$items      = get_field('quote_band_items');

if (!$items) {
    $items = [
        [
            'title' => 'Reformer',
            'text'  => 'Lorem ipsum dolor sit amet consectetur. Risus pharetra neque urna nulla odio.',
        ],
        [
            'title' => 'Cadillac',
            'text'  => 'Lorem ipsum dolor sit amet consectetur. Risus pharetra neque urna nulla odio.',
        ],
        [
            'title' => 'Chair',
            'text'  => 'Lorem ipsum dolor sit amet consectetur. Risus pharetra neque urna nulla odio.',
        ],
        [
            'title' => 'Barrel',
            'text'  => 'Lorem ipsum dolor sit amet consectetur. Risus pharetra neque urna nulla odio.',
        ],
    ];
}

$block_id = 'krz-quote-band-' . uniqid();

if (isset($block) && is_array($block)) {
    $block_id = !empty($block['anchor']) ? $block['anchor'] : 'krz-quote-band-' . $block['id'];
}
?>

<section
    id="<?php echo esc_attr($block_id); ?>"
    class="krz-quote-band"
    style="background-image: linear-gradient(rgba(50, 35, 27, 0.44), rgba(50, 35, 27, 0.44)), url('<?php echo esc_url($background); ?>');"
>
    <div class="container krz-quote-band__container">
        <ul class="krz-quote-band__nav" aria-label="<?php echo esc_attr__('Équipements', 'krizia'); ?>">
            <?php foreach ($items as $index => $item) : ?>
                <?php $title = $item['title'] ?? ''; ?>

                <?php if ($title) : ?>
                    <li>
                        <button
                            class="krz-quote-band__nav-button<?php echo $index === 0 ? ' is-active' : ''; ?>"
                            type="button"
                            data-quote-index="<?php echo esc_attr($index); ?>"
                        >
                            <?php echo esc_html($title); ?>
                        </button>
                    </li>
                <?php endif; ?>
            <?php endforeach; ?>
        </ul>

        <div class="krz-quote-band__swiper swiper">
            <div class="swiper-wrapper">
                <?php foreach ($items as $item) : ?>
                    <?php $text = $item['text'] ?? ''; ?>

                    <div class="swiper-slide">
                        <?php if ($text) : ?>
                            <div class="krz-quote-band__text">
                                <?php echo wp_kses_post(wpautop($text)); ?>
                            </div>
                        <?php endif; ?>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
        <div class="krz-quote-band__pagination" aria-hidden="true">
            <span></span>
        </div>
    </div>
</section>