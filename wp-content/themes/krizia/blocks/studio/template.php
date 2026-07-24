<?php
/**
 * Studio block template.
 *
 * @package Krizia
 */

$default_image_1 = get_template_directory_uri() . '/assets/images/studio-main.jpg';
$default_image_2 = get_template_directory_uri() . '/assets/images/reformer-detail.jpg';

$title   = get_field( 'studio_title' ) ?: 'Le studio';
$image_1 = get_field( 'studio_image_1' );
$image_2 = get_field( 'studio_image_2' );
$text    = get_field( 'studio_text' ) ?: 'Lorem ipsum dolor sit amet consectetur. Eget velit non ipsum commodo quis mauris metus. Cursus praesent pellentesque ultricies eu nisi. Facilisi in est in at mollis eget. Nec amet viverra consectetur quis. Aliquam quisque urna mi enim lectus faucibus sit.';

/*
 * Images.
 *
 * Les champs ACF retournent un tableau.
 * On affiche la taille medium_large.
 */

$image_1_id = is_array( $image_1 ) && ! empty( $image_1['ID'] )
    ? absint( $image_1['ID'] )
    : 0;

$image_2_id = is_array( $image_2 ) && ! empty( $image_2['ID'] )
    ? absint( $image_2['ID'] )
    : 0;

if ( isset( $block ) && is_array( $block ) ) {
    $block_id = ! empty( $block['anchor'] )
        ? $block['anchor']
        : 'krz-studio-' . $block['id'];
}
?>

<section
    id="<?php echo esc_attr( $block_id ); ?>"
    class="krz-block krz-block--rounded krz-studio"
    style="--krz-stack:52;"
    data-krz-animation-section
>
    <div class="krz-block__surface krz-studio__surface">

        <div class="container krz-studio__container">

            <?php if ( $title ) : ?>

                <h2
                    class="krz-studio__title"
                    data-krz-animation="text-chars-up"
                >
                    <?php echo esc_html( $title ); ?>
                </h2>

            <?php endif; ?>

            <div
                class="row no-gutters justify-content-center align-items-stretch krz-studio__gallery"
            >

                <div class="col-6 col-md-5 px-2">

                    <?php if ( $image_1_id ) : ?>

                        <?php
                        echo wp_get_attachment_image(
                            $image_1_id,
                            'medium_large',
                            false,
                            array(
                                'class'              => 'krz-studio__image',
                                'loading'            => 'lazy',
                                'decoding'           => 'async',
                                'data-krz-animation' => 'fade-up',
                                'data-krz-delay'     => '0.15',
                            )
                        );
                        ?>

                    <?php else : ?>

                        <img
                            src="<?php echo esc_url( $default_image_1 ); ?>"
                            alt=""
                            class="krz-studio__image"
                            loading="lazy"
                            decoding="async"
                            data-krz-animation="fade-up"
                            data-krz-delay="0.15"
                        >

                    <?php endif; ?>

                </div>

                <div class="col-6 col-md-5 px-2">

                    <?php if ( $image_2_id ) : ?>

                        <?php
                        echo wp_get_attachment_image(
                            $image_2_id,
                            'medium_large',
                            false,
                            array(
                                'class'              => 'krz-studio__image',
                                'loading'            => 'lazy',
                                'decoding'           => 'async',
                                'data-krz-animation' => 'fade-up',
                                'data-krz-delay'     => '0.35',
                            )
                        );
                        ?>

                    <?php else : ?>

                        <img
                            src="<?php echo esc_url( $default_image_2 ); ?>"
                            alt=""
                            class="krz-studio__image"
                            loading="lazy"
                            decoding="async"
                            data-krz-animation="fade-up"
                            data-krz-delay="0.35"
                        >

                    <?php endif; ?>

                </div>

            </div>

            <?php if ( $text ) : ?>

                <p
                    class="krz-studio__text"
                    data-krz-animation="text-words-up"
                    data-krz-delay="0.45"
                >
                    <?php echo wp_kses_post( nl2br( $text ) ); ?>
                </p>

            <?php endif; ?>

        </div>

    </div>
</section>