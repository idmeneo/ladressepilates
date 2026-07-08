<?php
/**
 * Studio block template.
 *
 * @package Krizia
 */

$default_image_1 = get_template_directory_uri() . '/assets/images/studio-main.jpg';
$default_image_2 = get_template_directory_uri() . '/assets/images/reformer-detail.jpg';

$title   = get_field('studio_title') ?: 'Le studio';
$image_1 = get_field('studio_image_1') ?: $default_image_1;
$image_2 = get_field('studio_image_2') ?: $default_image_2;
$text    = get_field('studio_text') ?: 'Lorem ipsum dolor sit amet consectetur. Eget velit non ipsum commodo quis mauris metus. Cursus praesent pellentesque ultricies eu nisi. Facilisi in est in at mollis eget. Nec amet viverra consectetur quis. Aliquam quisque urna mi enim lectus faucibus sit.';

$block_id = 'krz-studio-' . uniqid();

if (isset($block) && is_array($block)) {
    $block_id = !empty($block['anchor']) ? $block['anchor'] : 'krz-studio-' . $block['id'];
}
?>

<section id="<?php echo esc_attr($block_id); ?>" class="krz-studio">
    <div class="container krz-studio__container">
        <?php if ($title) : ?>
            <h2 class="krz-studio__title"><?php echo esc_html($title); ?></h2>
        <?php endif; ?>

        <div class="row no-gutters justify-content-center align-items-stretch krz-studio__gallery">
            <div class="col-6 col-md-5 col-lg-4 px-2">
                <img
                    src="<?php echo esc_url($image_1); ?>"
                    alt=""
                    class="krz-studio__image"
                    loading="lazy"
                >
            </div>

            <div class="col-6 col-md-5 col-lg-4 px-2">
                <img
                    src="<?php echo esc_url($image_2); ?>"
                    alt=""
                    class="krz-studio__image"
                    loading="lazy"
                >
            </div>
        </div>

        <?php if ($text) : ?>
            <p class="krz-studio__text"><?php echo wp_kses_post(nl2br($text)); ?></p>
        <?php endif; ?>
    </div>
</section>