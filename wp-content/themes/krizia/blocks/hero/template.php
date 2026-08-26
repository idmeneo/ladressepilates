<?php
/**
 * Hero block template.
 *
 * @package Krizia
 */

$default_background = get_template_directory_uri()
    . '/assets/images/hero-reformer.jpg';

/*
 * Contenu ACF.
 */
$background = get_field( 'hero_background' );
$background_mobile = get_field( 'hero_background_mobile' );
$title      = get_field( 'hero_title' ) ?: 'L’Adresse';
$label      = get_field( 'hero_label' ) ?: 'Pilates';
$heading    = get_field( 'hero_heading' ) ?: 'Le Pilates sur-mesure';
$text       = get_field( 'hero_text' )
    ?: 'L’Adresse Pilates est un lieu dédié à une pratique du Pilates, où chaque personne bénéficie d’une attention réelle et d’un accompagnement sur-mesure.';
$button     = get_field( 'hero_button' );

/*
 * Image de fond.
 *
 * Le champ ACF hero_background est configuré pour retourner
 * un tableau d’image.
 *
 * On utilise la taille personnalisée krizia-hero.
 * Si elle n’est pas disponible, on utilise l’image de secours
 * présente dans le thème.
 */
$background_id  = 0;
$background_url = '';

if ( is_array( $background ) ) {
    $background_id = ! empty( $background['ID'] )
        ? absint( $background['ID'] )
        : 0;
}

if ( $background_id ) {
    $background_url = wp_get_attachment_image_url(
        $background_id,
        'krizia-hero'
    );
}

/*
 * Sécurité supplémentaire :
 * wp_get_attachment_image_url() peut retourner false.
 */
if ( ! is_string( $background_url ) || $background_url === '' ) {
    $background_url = $default_background;
}

$background_mobile_id  = 0;
$background_mobile_url = $background_url;

if ( is_array( $background_mobile ) ) {
    $background_mobile_id = ! empty( $background_mobile['ID'] )
        ? absint( $background_mobile['ID'] )
        : 0;
} elseif ( is_numeric( $background_mobile ) ) {
    $background_mobile_id = absint( $background_mobile );
}

if ( $background_mobile_id ) {
    $background_mobile_url = wp_get_attachment_image_url(
        $background_mobile_id,
        'krizia-hero'
    );
}

if ( ! is_string( $background_mobile_url ) || $background_mobile_url === '' ) {
    $background_mobile_url = $background_url;
}

/*
 * Bouton.
 */
$button_url = is_array( $button ) && ! empty( $button['url'] )
    ? $button['url']
    : '#reservation';

$button_title = is_array( $button ) && ! empty( $button['title'] )
    ? $button['title']
    : 'Réserver ma séance';

$button_target = is_array( $button ) && ! empty( $button['target'] )
    ? $button['target']
    : '_self';

$button_rel = '_blank' === $button_target
    ? 'noopener noreferrer'
    : '';

/*
 * Identifiant du bloc.
 */
$block_id = 'krz-hero-' . uniqid();

if ( isset( $block ) && is_array( $block ) ) {
    $block_id = ! empty( $block['anchor'] )
        ? $block['anchor']
        : 'krz-hero-' . $block['id'];
}
?>

<section
    id="<?php echo esc_attr( $block_id ); ?>"
    class="krz-block krz-block--rounded krz-hero"
    style="--krz-stack:20;"
>

    <div
        class="krz-block__surface krz-hero__surface"
        style="
            --krz-hero-background: url('<?php echo esc_url( $background_url ); ?>');
            --krz-hero-background-mobile: url('<?php echo esc_url( $background_mobile_url ); ?>');
        "
    >

        <div class="container-fluid krz-hero__container">

            <div class="row justify-content-center justify-content-lg-start">

                <div class="col-12 col-lg-6">

                    <div class="krz-hero__content">

                        <?php if ( $title ) : ?>

                            <h1
                                class="krz-hero__title"
                                data-krz-animation="text-chars-up"
                            >
                                <?php echo esc_html( $title ); ?>
                            </h1>

                        <?php endif; ?>

                        <?php if ( $label ) : ?>

                            <span
                                class="krz-hero__label"
                                data-krz-animation="text-chars-up"
                                data-krz-delay="0.35"
                            >
                                <?php echo esc_html( $label ); ?>
                            </span>

                        <?php endif; ?>

                        <span
                            class="krz-hero__mark"
                            aria-hidden="true"
                            data-krz-animation="fade-up"
                            data-krz-delay="0.65"
                        ></span>

                        <?php if ( $heading ) : ?>

                            <h2
                                class="krz-hero__heading"
                                data-krz-animation="text-words-up"
                                data-krz-delay="0.80"
                            >
                                <?php echo esc_html( $heading ); ?>
                            </h2>

                        <?php endif; ?>

                        <?php if ( $text ) : ?>

                            <p
                                class="krz-hero__text"
                                data-krz-animation="text-words-up"
                                data-krz-delay="1.05"
                            >
                                <?php echo wp_kses_post( nl2br( $text ) ); ?>
                            </p>

                        <?php endif; ?>

                        <?php if ( $button_title ) : ?>

                            <a
                                class="krz-hero__button"
                                href="<?php echo esc_url( $button_url ); ?>"
                                target="<?php echo esc_attr( $button_target ); ?>"
                                <?php if ( $button_rel ) : ?>
                                    rel="<?php echo esc_attr( $button_rel ); ?>"
                                <?php endif; ?>
                                data-krz-animation="fade-up"
                                data-krz-delay="1.35"
                            >
                                <?php echo esc_html( $button_title ); ?>
                            </a>

                        <?php endif; ?>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>