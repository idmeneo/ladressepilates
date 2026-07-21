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

$button_url    = is_array($button) && ! empty($button['url']) ? $button['url'] : '#reservation';
$button_title  = is_array($button) && ! empty($button['title']) ? $button['title'] : 'Réserver ma séance';
$button_target = is_array($button) && ! empty($button['target']) ? $button['target'] : '_self';

$block_id = 'krz-hero-' . uniqid();

if (isset($block) && is_array($block)) {
    $block_id = ! empty($block['anchor'])
        ? $block['anchor']
        : 'krz-hero-' . $block['id'];
}
?>

<section
    id="<?php echo esc_attr($block_id); ?>"
    class="krz-block krz-block--rounded krz-hero"
    style="--krz-stack:20;"
    data-krz-animation-section
>

    <div
        class="krz-block__surface krz-hero__surface"
        style="
            background-image:
                linear-gradient(
                    90deg,
                    rgba(53,40,31,.64) 0%,
                    rgba(53,40,31,.50) 50%,
                    rgba(53,40,31,.28) 100%
                ),
                url('<?php echo esc_url($background_url); ?>');
        "
    >

        <div class="container-fluid krz-hero__container">

            <div class="row justify-content-center justify-content-lg-start">

                <div class="col-12 col-lg-6">

                    <div class="krz-hero__content">

                        <h1
                            class="krz-hero__title"
                            data-krz-animate="bounceInLeft"
                            data-krz-delay="0"
                        >

                            <?php echo esc_html($title); ?>

                            <?php if ($label) : ?>

                                <span
                                    class="krz-hero__label"
                                    data-krz-animate="bounceInLeft"
                                    data-krz-delay="120"
                                >
                                    <?php echo esc_html($label); ?>
                                </span>

                            <?php endif; ?>

                        </h1>

                        <span
                            class="krz-hero__mark"
                            aria-hidden="true"
                            data-krz-animate="bounceInLeft"
                            data-krz-delay="240"
                        ></span>

                        <?php if ($heading) : ?>

                            <h2
                                class="krz-hero__heading"
                                data-krz-animate="bounceInLeft"
                                data-krz-delay="360"
                            >
                                <?php echo esc_html($heading); ?>
                            </h2>

                        <?php endif; ?>

                        <?php if ($text) : ?>

                            <p
                                class="krz-hero__text"
                                data-krz-animate="bounceInLeft"
                                data-krz-delay="480"
                            >
                                <?php echo wp_kses_post(nl2br($text)); ?>
                            </p>

                        <?php endif; ?>

                        <?php if ($button_title) : ?>

                            <a
                                class="krz-hero__button"
                                href="<?php echo esc_url($button_url); ?>"
                                target="<?php echo esc_attr($button_target); ?>"
                                data-krz-animate="bounceInLeft"
                                data-krz-delay="600"
                            >
                                <?php echo esc_html($button_title); ?>
                            </a>

                        <?php endif; ?>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>