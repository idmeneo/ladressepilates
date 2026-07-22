<?php
/**
 * Statement block template.
 *
 * @package Krizia
 */

$default_background = get_template_directory_uri() . '/assets/images/statement-background.jpg';
$default_logo       = get_template_directory_uri() . '/assets/images/logo-white.png';

$background = get_field( 'statement_background' ) ?: $default_background;
$logo       = get_field( 'statement_logo' ) ?: $default_logo;
$kicker     = get_field( 'statement_kicker' ) ?: 'Un lieu pensé pour le corps';
$text       = get_field( 'statement_text' ) ?: 'Chaque séance est pensée comme une rencontre entre précision, respiration et mouvement.';

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
        style="--krz-statement-background-image: linear-gradient(rgba(53, 40, 31, 0.42), rgba(53, 40, 31, 0.42)), url('<?php echo esc_url( $background ); ?>');"
    >
        <?php if ( $logo ) : ?>
            <img
                src="<?php echo esc_url( $logo ); ?>"
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
                    >
                        <?php echo wp_kses_post( nl2br( $text ) ); ?>
                    </div>
                <?php endif; ?>

            </div>
        </div>
    </div>
</section>