<?php
/**
 * Private Course block template.
 *
 * @package Krizia
 */

$default_image_left  = get_template_directory_uri() . '/assets/images/reformer-portrait.png';
$default_image_right = get_template_directory_uri() . '/assets/images/movement-detail.png';

$title       = get_field('private_course_title') ?: 'Les cours privés';
$kicker      = get_field('private_course_kicker') ?: 'La promesse d’un accompagnement';
$text        = get_field('private_course_text') ?: 'La promesse d’un accompagnement sérieux, efficace et adapté à chaque corps. Les cours privés offrent une prise en charge totalement individualisée. Chaque séance repose sur une analyse du corps et une programmation évolutive, pensée pour construire une progression durable.';
$text_small  = get_field('private_course_text_small') ?: 'Les enseignants de L’Adresse Pilates suivent une formation continue afin de maintenir un haut niveau d’exigence et de précision dans leur pratique.';
$image_left  = get_field('private_course_image_left') ?: $default_image_left;
$image_right = get_field('private_course_image_right') ?: $default_image_right;

$block_id = 'krz-private-course-' . uniqid();

if (isset($block) && is_array($block)) {
    $block_id = !empty($block['anchor']) ? $block['anchor'] : 'krz-private-course-' . $block['id'];
}
?>

<section id="<?php echo esc_attr($block_id); ?>" class="krz-private-course">
    <div class="krz-private-course__floating krz-private-course__floating--left" aria-hidden="true">
        <img src="<?php echo esc_url($image_left); ?>" alt="">
    </div>

    <div class="krz-private-course__floating krz-private-course__floating--right" aria-hidden="true">
        <img src="<?php echo esc_url($image_right); ?>" alt="">
    </div>

    <div class="container krz-private-course__container">
        <div class="row justify-content-center text-center">
            <div class="col-12 col-lg-6">
                <?php if ($title) : ?>
                    <h2 class="krz-private-course__title"><?php echo esc_html($title); ?></h2>
                <?php endif; ?>

                <?php if ($kicker) : ?>
                    <p class="krz-private-course__kicker"><?php echo esc_html($kicker); ?></p>
                <?php endif; ?>

                <?php if ($text) : ?>
                    <p class="krz-private-course__text">
                        <?php echo wp_kses_post($text); ?>
                    </p>
                <?php endif; ?>

                <?php if ($text_small) : ?>
                    <p class="krz-private-course__text krz-private-course__text--small">
                        <?php echo wp_kses_post($text_small); ?>
                    </p>
                <?php endif; ?>

                <span class="krz-private-course__dot" aria-hidden="true"></span>
            </div>
        </div>

        <div class="row d-lg-none justify-content-center krz-private-course__mobile-images" aria-hidden="true">
            <div class="col-5">
                <div class="krz-private-course__mobile-image">
                    <img src="<?php echo esc_url($image_right); ?>" alt="">
                </div>
            </div>

            <div class="col-5">
                <div class="krz-private-course__mobile-image">
                    <img src="<?php echo esc_url($image_left); ?>" alt="">
                </div>
            </div>
        </div>
    </div>
</section>