<?php
/**
 * Hero block template.
 *
 * @package Krizia
 */

$default_background = get_template_directory_uri() . '/assets/images/hero-reformer.jpg';

$background = get_field('hero_background');
$title      = get_field('hero_title') ?: 'L’Adresse';
$label      = get_field('hero_label') ?: 'Pilates';
$heading    = get_field('hero_heading') ?: 'Le Pilates sur-mesure';
$text       = get_field('hero_text') ?: 'L’Adresse Pilates est un lieu dédié à une pratique du Pilates, où chaque personne bénéficie d’une attention réelle et d’un accompagnement sur-mesure.';
$button     = get_field('hero_button');

$background_url = $background ?: $default_background;

$button_url    = is_array($button) && !empty($button['url']) ? $button['url'] : '#reservation';
$button_title  = is_array($button) && !empty($button['title']) ? $button['title'] : 'Réserver ma séance';
$button_target = is_array($button) && !empty($button['target']) ? $button['target'] : '_self';

$block_id = 'krizia-hero-' . uniqid();

if (isset($block) && is_array($block)) {
    $block_id = !empty($block['anchor']) ? $block['anchor'] : 'krizia-hero-' . $block['id'];
}
?>

<section
    id="<?php echo esc_attr($block_id); ?>"
    class="kf-hero"
    style="background-image: linear-gradient(90deg, rgba(53, 40, 31, 0.64) 0%, rgba(53, 40, 31, 0.5) 50%, rgba(53, 40, 31, 0.28) 100%), url('<?php echo esc_url($background_url); ?>');"
>
    <div class="kf-hero__container">
        <div class="kf-hero__content">
            <h1 class="kf-hero__title">
                <?php echo esc_html($title); ?>

                <?php if ($label) : ?>
                    <span><?php echo esc_html($label); ?></span>
                <?php endif; ?>
            </h1>

            <span class="kf-hero__mark" aria-hidden="true"></span>

            <?php if ($heading) : ?>
                <h2 class="kf-hero__heading"><?php echo esc_html($heading); ?></h2>
            <?php endif; ?>

            <?php if ($text) : ?>
                <p class="kf-hero__text"><?php echo wp_kses_post(nl2br($text)); ?></p>
            <?php endif; ?>

            <?php if ($button_title) : ?>
                <a
                    class="kf-hero__button"
                    href="<?php echo esc_url($button_url); ?>"
                    target="<?php echo esc_attr($button_target); ?>"
                >
                    <?php echo esc_html($button_title); ?>
                </a>
            <?php endif; ?>
        </div>
    </div>
</section>