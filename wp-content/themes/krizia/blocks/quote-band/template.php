<?php
/**
 * Quote Band block template.
 *
 * @package Krizia
 */

$default_background = get_template_directory_uri()
    . '/assets/images/studio-wide.jpg';

$background = get_field( 'quote_band_background' );
$items      = get_field( 'quote_band_items' );

/*
 * Image de fond principale.
 *
 * Le champ ACF retourne un tableau.
 * On utilise la taille krizia-hero.
 */
$background_id = is_array( $background ) && ! empty( $background['ID'] )
    ? absint( $background['ID'] )
    : 0;

$background_url = '';

if ( $background_id ) {
    $background_url = wp_get_attachment_image_url(
        $background_id,
        'krizia-hero'
    );
}

if ( ! is_string( $background_url ) || '' === $background_url ) {
    $background_url = $default_background;
}

/*
 * Convertit une image ACF en URL krizia-hero.
 *
 * @param mixed  $image        Valeur du champ ACF.
 * @param string $fallback_url URL utilisée en fallback.
 *
 * @return string
 */
$get_background_url = static function ( $image, $fallback_url ) {
    $image_id = is_array( $image ) && ! empty( $image['ID'] )
        ? absint( $image['ID'] )
        : 0;

    $image_url = '';

    if ( $image_id ) {
        $image_url = wp_get_attachment_image_url(
            $image_id,
            'krizia-hero'
        );
    }

    if ( ! is_string( $image_url ) || '' === $image_url ) {
        $image_url = $fallback_url;
    }

    return $image_url;
};

if ( ! $items ) {
    $items = array(
        array(
            'title' => 'Reformer',
            'text'  => 'Lorem ipsum dolor sit amet consectetur. Risus pharetra neque urna nulla odio.',
        ),
        array(
            'title' => 'Cadillac',
            'text'  => 'Lorem ipsum dolor sit amet consectetur. Risus pharetra neque urna nulla odio.',
        ),
        array(
            'title' => 'Chair',
            'text'  => 'Lorem ipsum dolor sit amet consectetur. Risus pharetra neque urna nulla odio.',
        ),
        array(
            'title' => 'Barrel',
            'text'  => 'Lorem ipsum dolor sit amet consectetur. Risus pharetra neque urna nulla odio.',
        ),
    );
}

/*
 * Identifiant du bloc.
 */
$block_id = 'krz-quote-band-' . uniqid();

if ( isset( $block ) && is_array( $block ) ) {
    $block_id = ! empty( $block['anchor'] )
        ? $block['anchor']
        : 'krz-quote-band-' . $block['id'];
}

/*
 * Première image affichée.
 */
$first_item       = $items[0] ?? array();
$first_background = $first_item['background'] ?? null;

$first_background_url = $get_background_url(
    $first_background,
    $background_url
);

$background_style = sprintf(
    'background-image:linear-gradient(rgba(50,35,27,.44),rgba(50,35,27,.44)),url(\'%s\');',
    esc_url( $first_background_url )
);
?>

<section
    id="<?php echo esc_attr( $block_id ); ?>"
    class="krz-block krz-block--rounded krz-quote-band"
    style="--krz-stack:14;"
    data-krz-animation-section
>
    <div class="krz-block__surface krz-quote-band__surface">

        <div
            class="krz-quote-band__background krz-quote-band__background--first is-active"
            style="<?php echo esc_attr( $background_style ); ?>"
            aria-hidden="true"
        ></div>

        <div
            class="krz-quote-band__background krz-quote-band__background--second"
            aria-hidden="true"
        ></div>

        <div class="container krz-quote-band__container">

            <ul
                class="krz-quote-band__nav"
                aria-label="<?php echo esc_attr__( 'Équipements', 'krizia' ); ?>"
                data-krz-animation="fade-up"
            >
                <?php foreach ( $items as $index => $item ) : ?>
                    <?php $title = $item['title'] ?? ''; ?>

                    <?php if ( $title ) : ?>
                        <li>
                            <button
                                class="krz-quote-band__nav-button<?php echo 0 === $index ? ' is-active' : ''; ?>"
                                type="button"
                                data-quote-index="<?php echo esc_attr( $index ); ?>"
                            >
                                <?php echo esc_html( $title ); ?>
                            </button>
                        </li>
                    <?php endif; ?>
                <?php endforeach; ?>
            </ul>

            <div
                class="krz-quote-band__swiper swiper"
                data-krz-animation="fade-up"
                data-krz-delay="0.18"
            >
                <div class="swiper-wrapper">

                    <?php foreach ( $items as $item ) : ?>
                        <?php
                        $text            = $item['text'] ?? '';
                        $item_background = $item['background'] ?? null;

                        $item_background_url = $get_background_url(
                            $item_background,
                            $background_url
                        );
                        ?>

                        <div
                            class="swiper-slide"
                            data-quote-background="<?php echo esc_url( $item_background_url ); ?>"
                        >
                            <?php if ( $text ) : ?>
                                <div class="krz-quote-band__text">
                                    <?php echo wp_kses_post( wpautop( $text ) ); ?>
                                </div>
                            <?php endif; ?>
                        </div>

                    <?php endforeach; ?>

                </div>
            </div>

            <div
                class="krz-quote-band__pagination"
                aria-hidden="true"
            >
                <span></span>
            </div>

        </div>

    </div>
</section>