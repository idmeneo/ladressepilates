<?php
/**
 * Private Course block template.
 *
 * Combines the private-course presentation and Amelia packages
 * in a single Gutenberg/ACF block.
 *
 * @package Krizia
 */

$default_image_left  = get_template_directory_uri() . '/assets/images/reformer-portrait.png';
$default_image_right = get_template_directory_uri() . '/assets/images/movement-detail.png';

$title       = get_field( 'private_course_title' ) ?: 'Les cours privés';
$kicker      = get_field( 'private_course_kicker' ) ?: 'La promesse d’un accompagnement';
$text        = get_field( 'private_course_text' ) ?: '';
$text_small  = get_field( 'private_course_text_small' ) ?: '';
$image_left  = get_field( 'private_course_image_left' );
$image_right = get_field( 'private_course_image_right' );

$formula_title     = get_field( 'private_formula_title' ) ?: 'Les formules';
$button_text       = get_field( 'private_formula_button_text' ) ?: 'M’inscrire';
$featured_package  = absint( get_field( 'private_formula_featured_package' ) );
$featured_badge    = get_field( 'private_formula_featured_badge' ) ?: 'Coup de cœur';
$maximum_packages  = absint( get_field( 'private_formula_maximum_packages' ) );

$packages = function_exists( 'krizia_get_amelia_packages' )
    ? krizia_get_amelia_packages( true )
    : array();

if ( $maximum_packages > 0 ) {
    $packages = array_slice( $packages, 0, $maximum_packages );
}

/**
 * Normalize an ACF image field.
 *
 * @param mixed  $image       ACF image value.
 * @param string $default_url Default image URL.
 *
 * @return array
 */
$image_left_id = is_array( $image_left ) && ! empty( $image_left['ID'] )
    ? absint( $image_left['ID'] )
    : 0;

$image_right_id = is_array( $image_right ) && ! empty( $image_right['ID'] )
    ? absint( $image_right['ID'] )
    : 0;

/**
 * Format an Amelia price without unnecessary decimals.
 *
 * @param mixed $price Package price.
 *
 * @return string
 */
$format_price = static function ( $price ) {
    $price    = (float) $price;
    $decimals = floor( $price ) === $price ? 0 : 2;

    return number_format_i18n( $price, $decimals ) . ' €';
};

$block_id = 'krz-private-course-' . uniqid();

if ( isset( $block ) && is_array( $block ) ) {
    $block_id = ! empty( $block['anchor'] )
        ? $block['anchor']
        : 'krz-private-course-' . $block['id'];
}
?>

<div
    class="krz-private-course__overflow-layer"
    data-krz-animation-section
    aria-hidden="true"
>
    <div
        class="krz-private-course__floating krz-private-course__floating--right"
        data-krz-animation="fade-up"
        data-krz-delay="0.1"
    >
        <?php if ( $image_right_id ) : ?>

            <?php
            echo wp_get_attachment_image(
                $image_right_id,
                'medium_large',
                false,
                array(
                    'loading'  => 'lazy',
                    'decoding' => 'async',
                )
            );
            ?>

        <?php else : ?>

            <img
                src="<?php echo esc_url( $default_image_right ); ?>"
                alt=""
                loading="lazy"
                decoding="async"
            >

        <?php endif; ?>
    </div>
</div>

<section
    id="<?php echo esc_attr( $block_id ); ?>"
    class="krz-block krz-block--rounded krz-private-course"
    style="--krz-stack:18;"
    data-krz-animation-section
>
<div
    class="krz-private-course__floating-layer"
    aria-hidden="true"
>
    <div
        class="krz-private-course__floating krz-private-course__floating--left"
        data-krz-animation="fade-up"
        data-krz-delay="0.2"
    >
        <?php if ( $image_left_id ) : ?>

            <?php
            echo wp_get_attachment_image(
                $image_left_id,
                'medium_large',
                false,
                array(
                    'loading'            => 'lazy',
                    'decoding'           => 'async',
                )
            );
            ?>

        <?php else : ?>

            <img
                src="<?php echo esc_url( $default_image_left ); ?>"
                alt=""
                loading="lazy"
                decoding="async"
            >

        <?php endif; ?>
    </div>

</div>

    <div class="krz-block__surface krz-private-course__surface">

        <div class="container krz-private-course__intro-container">

            <div class="row justify-content-center text-center">
                <div class="col-12 col-lg-6">

                    <?php if ( $title ) : ?>
                        <h2
                            class="krz-private-course__title"
                            data-krz-animation="text-chars-up"
                        >
                            <?php echo esc_html( $title ); ?>
                        </h2>
                    <?php endif; ?>

                    <?php if ( $kicker ) : ?>
                        <p
                            class="krz-private-course__kicker"
                            data-krz-animation="text-words-up"
                            data-krz-delay="0.16"
                        >
                            <?php echo esc_html( $kicker ); ?>
                        </p>
                    <?php endif; ?>

                    <?php if ( $text ) : ?>
                        <div
                            class="krz-private-course__text"
                            data-krz-animation="text-words-up"
                            data-krz-delay="0.3"
                        >
                            <?php echo wp_kses_post( $text ); ?>
                        </div>
                    <?php endif; ?>

                    <?php if ( $text_small ) : ?>
                        <div
                            class="krz-private-course__text krz-private-course__text--small"
                            data-krz-animation="text-words-up"
                            data-krz-delay="0.44"
                        >
                            <?php echo wp_kses_post( wpautop( $text_small ) ); ?>
                        </div>
                    <?php endif; ?>

                    <span
                        class="krz-private-course__dot"
                        aria-hidden="true"
                        data-krz-animation="fade-up"
                        data-krz-delay="0.56"
                    ></span>

                </div>
            </div>

            <div
                class="d-lg-none krz-private-course__mobile-images"
                aria-hidden="true"
            >
                <div
                    class="krz-private-course__mobile-image"
                    data-krz-animation="fade-up"
                    data-krz-delay="0.1"
                >
                    <?php if ( $image_left_id ) : ?>

                        <?php
                        echo wp_get_attachment_image(
                            $image_left_id,
                            'medium_large',
                            false,
                            array(
                                'loading'  => 'lazy',
                                'decoding' => 'async',
                            )
                        );
                        ?>

                    <?php else : ?>

                        <img
                            src="<?php echo esc_url( $default_image_left ); ?>"
                            alt=""
                            loading="lazy"
                            decoding="async"
                        >

                    <?php endif; ?>
                </div>

                <div
                    class="krz-private-course__mobile-image"
                    data-krz-animation="fade-up"
                    data-krz-delay="0.24"
                >
                    <?php if ( $image_right_id ) : ?>

                        <?php
                        echo wp_get_attachment_image(
                            $image_right_id,
                            'medium_large',
                            false,
                            array(
                                'loading'  => 'lazy',
                                'decoding' => 'async',
                            )
                        );
                        ?>

                    <?php else : ?>

                        <img
                            src="<?php echo esc_url( $default_image_right ); ?>"
                            alt=""
                            loading="lazy"
                            decoding="async"
                        >

                    <?php endif; ?>
                </div>
            </div>

        </div>

        <div class="container-fluid krz-private-course__formula-container">

            <?php if ( $formula_title ) : ?>
                <div class="row justify-content-center text-center">
                    <div class="col-12">
                        <h2
                            class="krz-private-course__formula-title"
                            data-krz-animation="text-chars-up"
                        >
                            <?php echo esc_html( $formula_title ); ?>
                        </h2>
                    </div>
                </div>
            <?php endif; ?>

            <?php if ( $packages ) : ?>
                <div
                    class="krz-private-course__swiper swiper"
                    data-krz-animation="fade-up"
                    data-krz-delay="0.18"
                >
                    <div class="krz-private-course__packages swiper-wrapper">

                        <?php foreach ( $packages as $package ) : ?>
                            <?php
                            $package_id  = absint( $package['id'] ?? 0 );
                            $name        = $package['name'] ?? '';
                            $description = $package['description'] ?? '';
                            $quantity    = absint( $package['quantity'] ?? 0 );
                            $price       = $package['price'] ?? 0;
                            $services    = $package['services'] ?? array();
                            $is_featured = $featured_package === $package_id;
                            $trigger     = 'krz-amelia-package-' . $block_id . '-' . $package_id;

                            $service_name = '';

                            if ( ! empty( $services[0]['name'] ) ) {
                                $service_name = $services[0]['name'];
                            }

                            if ( 1 === $quantity ) {
                                $quantity_label = '1 cours privé';
                            } elseif ( $quantity > 1 ) {
                                $quantity_label = sprintf(
                                    '%d cours privés',
                                    $quantity
                                );
                            } else {
                                $quantity_label = $service_name;
                            }
                            ?>

                            <div class="swiper-slide">
                                <article
                                    class="krz-private-course__card<?php echo $is_featured ? ' is-featured' : ''; ?>"
                                >
                                    <?php if ( $is_featured && $featured_badge ) : ?>
                                        <span class="krz-private-course__badge">
                                            <?php echo esc_html( $featured_badge ); ?>
                                        </span>
                                    <?php endif; ?>

                                    <div class="krz-private-course__card-inner">

                                        <?php if ( $name ) : ?>
                                            <h3 class="krz-private-course__card-title">
                                                <?php echo esc_html( $name ); ?>
                                            </h3>
                                        <?php endif; ?>

                                        <span
                                            class="krz-private-course__card-line"
                                            aria-hidden="true"
                                        ></span>

                                        <?php if ( $description ) : ?>
                                            <div class="krz-private-course__tagline">
                                                <?php echo wp_kses_post( wpautop( $description ) ); ?>
                                            </div>
                                        <?php elseif ( $service_name ) : ?>
                                            <p class="krz-private-course__tagline">
                                                <?php echo esc_html( $service_name ); ?>
                                            </p>
                                        <?php endif; ?>

                                        <span
                                            class="krz-private-course__separator"
                                            aria-hidden="true"
                                        ></span>

                                        <?php if ( $quantity_label ) : ?>
                                            <span class="krz-private-course__details">
                                                <?php echo esc_html( $quantity_label ); ?>
                                            </span>
                                        <?php endif; ?>

                                        <span class="krz-private-course__price">
                                            <?php echo esc_html( $format_price( $price ) ); ?>
                                        </span>

                                        <?php if ( $package_id ) : ?>
                                            <button
                                                class="krz-private-course__button <?php echo esc_attr( $trigger ); ?>"
                                                type="button"
                                            >
                                                <?php echo esc_html( $button_text ); ?>
                                            </button>

                                            <div
                                                class="krz-private-course__amelia"
                                                aria-hidden="true"
                                            >
                                                <?php
                                                echo do_shortcode(
                                                    sprintf(
                                                        '[ameliacatalogbooking package=%1$d trigger="%2$s" trigger_type="class" in_dialog=1]',
                                                        $package_id,
                                                        esc_attr( $trigger )
                                                    )
                                                );
                                                ?>
                                            </div>
                                        <?php endif; ?>

                                    </div>
                                </article>
                            </div>

                        <?php endforeach; ?>

                    </div>

                    <div
                        class="krz-private-course__pagination"
                        aria-hidden="true"
                    >
                        <span></span>
                    </div>
                </div>

            <?php elseif ( current_user_can( 'edit_posts' ) ) : ?>

                <p class="krz-private-course__empty">
                    Aucun package Amelia synchronisé. Enregistre un package visible dans Amelia.
                </p>

            <?php endif; ?>

        </div>

    </div>
</section>