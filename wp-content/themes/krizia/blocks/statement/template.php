<?php
/**
 * Statement block template.
 *
 * @package Krizia
 */

$default_background = get_template_directory_uri()
    . '/assets/images/statement-background.jpg';

$default_logo = get_template_directory_uri()
    . '/assets/images/logo-white.png';

/*
 * Champs ACF.
 */
$background = get_field( 'statement_background' );
$logo       = get_field( 'statement_logo' );
$kicker     = get_field( 'statement_kicker' )
    ?: 'Un lieu pensé pour le corps';
$text       = get_field( 'statement_text' )
    ?: 'Chaque séance est pensée comme une rencontre entre précision, respiration et mouvement.';

/*
 * Image de fond.
 *
 * Le champ ACF retourne un tableau.
 * On utilise la taille krizia-hero.
 */
$background_id = is_array( $background ) && ! empty( $background['ID'] )
    ? absint( $background['ID'] )
    : 0;

$background_url = $background_id
    ? wp_get_attachment_image_url( $background_id, 'krizia-hero' )
    : '';

if ( ! is_string( $background_url ) || '' === $background_url ) {
    $background_url = $default_background;
}

/*
 * Logo.
 *
 * Le champ ACF retourne un tableau.
 * On utilise la taille medium_large.
 */
$logo_id = is_array( $logo ) && ! empty( $logo['ID'] )
    ? absint( $logo['ID'] )
    : 0;

/*
 * Identifiant du bloc.
 */
$block_id = 'krz-statement-' . uniqid();

if ( isset( $block ) && is_array( $block ) ) {
    $block_id = ! empty( $block['anchor'] )
        ? $block['anchor']
        : 'krz-statement-' . $block['id'];
}
?>

<section
    id="<?php echo esc_attr( $block_id ); ?>"
    class="krz-block krz-block--rounded krz-statement"
    style="--krz-stack:17;"
    data-krz-animation-section
>
    <div
        class="krz-block__surface krz-statement__surface"
        style="
            --krz-statement-background-image:
                linear-gradient(
                    rgba(53, 40, 31, 0.42),
                    rgba(53, 40, 31, 0.42)
                ),
                url('<?php echo esc_url( $background_url ); ?>');
        "
    >
        <?php if ( $logo_id ) : ?>

            <?php
            echo wp_get_attachment_image(
                $logo_id,
                'medium_large',
                false,
                array(
                    'class'       => 'krz-statement__logo',
                    'alt'         => '',
                    'aria-hidden' => 'true',
                    'loading'     => 'lazy',
                    'decoding'    => 'async',
                )
            );
            ?>

        <?php else : ?>

            <img
                src="<?php echo esc_url( $default_logo ); ?>"
                alt=""
                class="krz-statement__logo"
                aria-hidden="true"
                loading="lazy"
                decoding="async"
            >

        <?php endif; ?>

        <div class="container krz-statement__container">

            <div class="krz-statement__content">

                <?php if ( $kicker ) : ?>

                    <p
                        class="krz-statement__kicker"
                        data-krz-animation="text-chars-up"
                    >
                        <?php echo esc_html( $kicker ); ?>
                    </p>

                <?php endif; ?>

                <?php if ( $text ) : ?>

                    <div
                        class="krz-statement__text"
                        data-krz-animation="text-words-up"
                        data-krz-delay="0.15"
                    >
                        <?php echo wp_kses_post( nl2br( $text ) ); ?>
                    </div>

                <?php endif; ?>

            </div>

        </div>

    </div>

</section>