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
 * Les champs image ACF peuvent retourner une URL,
 * un tableau ou un identifiant selon leur configuration.
 */
$image_1_url = $default_image_1;
$image_1_alt = '';

if ( is_array( $image_1 ) ) {
    $image_1_url = ! empty( $image_1['url'] )
        ? $image_1['url']
        : $default_image_1;

    $image_1_alt = ! empty( $image_1['alt'] )
        ? $image_1['alt']
        : '';
} elseif ( is_numeric( $image_1 ) ) {
    $attachment_url = wp_get_attachment_image_url(
        (int) $image_1,
        'full'
    );

    $image_1_url = $attachment_url ?: $default_image_1;
    $image_1_alt = get_post_meta(
        (int) $image_1,
        '_wp_attachment_image_alt',
        true
    );
} elseif ( is_string( $image_1 ) && $image_1 !== '' ) {
    $image_1_url = $image_1;
}

$image_2_url = $default_image_2;
$image_2_alt = '';

if ( is_array( $image_2 ) ) {
    $image_2_url = ! empty( $image_2['url'] )
        ? $image_2['url']
        : $default_image_2;

    $image_2_alt = ! empty( $image_2['alt'] )
        ? $image_2['alt']
        : '';
} elseif ( is_numeric( $image_2 ) ) {
    $attachment_url = wp_get_attachment_image_url(
        (int) $image_2,
        'full'
    );

    $image_2_url = $attachment_url ?: $default_image_2;
    $image_2_alt = get_post_meta(
        (int) $image_2,
        '_wp_attachment_image_alt',
        true
    );
} elseif ( is_string( $image_2 ) && $image_2 !== '' ) {
    $image_2_url = $image_2;
}

$block_id = 'krz-studio-' . uniqid();

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

                    <img
                        src="<?php echo esc_url( $image_1_url ); ?>"
                        alt="<?php echo esc_attr( $image_1_alt ); ?>"
                        class="krz-studio__image"
                        loading="lazy"
                        decoding="async"
                        data-krz-animation="fade-up"
                        data-krz-delay="0.15"
                    >

                </div>

                <div class="col-6 col-md-5 px-2">

                    <img
                        src="<?php echo esc_url( $image_2_url ); ?>"
                        alt="<?php echo esc_attr( $image_2_alt ); ?>"
                        class="krz-studio__image"
                        loading="lazy"
                        decoding="async"
                        data-krz-animation="fade-up"
                        data-krz-delay="0.35"
                    >

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