<?php
/**
 * Formation block template.
 *
 * @package Krizia
 */

$default_image = get_template_directory_uri() . '/assets/images/formation.jpg';

$title      = get_field( 'formation_title' ) ?: 'Formation continue';
$kicker     = get_field( 'formation_kicker' ) ?: 'Approfondir sa pratique';
$text       = get_field( 'formation_text' ) ?: 'La formation continue s’adresse aux enseignants souhaitant enrichir leur pratique, affiner leur regard et approfondir leur compréhension du mouvement.';
$text_alt   = get_field( 'formation_text_alt' ) ?: '';
$image      = get_field( 'formation_image' ) ?: $default_image;
$image_side = get_field( 'formation_image_side' ) ?: 'right';

$block_id = 'krz-formation-' . uniqid();

if ( isset( $block ) && is_array( $block ) ) {
    $block_id = ! empty( $block['anchor'] )
        ? $block['anchor']
        : 'krz-formation-' . $block['id'];
}

$image_first_class = 'left' === $image_side ? ' order-lg-1' : ' order-lg-2';
$text_first_class  = 'left' === $image_side ? ' order-lg-2' : ' order-lg-1';
?>

<section
    id="<?php echo esc_attr( $block_id ); ?>"
    class="krz-block krz-block--rounded krz-formation"
    style="--krz-stack:16;"
    data-krz-animation-section
>
    <div class="krz-block__surface krz-formation__surface">

        <div class="container-fluid krz-formation__container">
            <div class="row no-gutters align-items-stretch krz-formation__row">

                <div class="col-12 col-lg-6<?php echo esc_attr( $text_first_class ); ?>">
                    <div class="krz-formation__content">

                        <?php if ( $title ) : ?>
                            <h2
                                class="krz-formation__title"
                                data-krz-animation="text-chars-up"
                            >
                                <?php echo esc_html( $title ); ?>
                            </h2>
                        <?php endif; ?>

                        <?php if ( $kicker ) : ?>
                            <p
                                class="krz-formation__kicker"
                                data-krz-animation="text-words-up"
                                data-krz-delay="0.18"
                            >
                                <?php echo esc_html( $kicker ); ?>
                            </p>
                        <?php endif; ?>

                        <?php if ( $text ) : ?>
                            <div
                                class="krz-formation__text"
                                data-krz-animation="fade-up"
                                data-krz-delay="0.34"
                            >
                                <?php echo wp_kses_post( wpautop( $text ) ); ?>
                            </div>
                        <?php endif; ?>

                        <?php if ( $text_alt ) : ?>
                            <div
                                class="krz-formation__text krz-formation__text--alt"
                                data-krz-animation="fade-up"
                                data-krz-delay="0.52"
                            >
                                <?php echo wp_kses_post( wpautop( $text_alt ) ); ?>
                            </div>
                        <?php endif; ?>

                    </div>
                </div>

                <div class="col-12 col-lg-6<?php echo esc_attr( $image_first_class ); ?>">
                    <?php if ( $image ) : ?>
                        <img
                            class="krz-formation__image"
                            src="<?php echo esc_url( $image ); ?>"
                            alt=""
                            loading="lazy"
                            decoding="async"
                        >
                    <?php endif; ?>
                </div>

            </div>
        </div>

    </div>
</section>