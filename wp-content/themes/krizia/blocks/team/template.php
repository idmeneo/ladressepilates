<?php
/**
 * Team block template.
 *
 * @package Krizia
 */

$title   = get_field( 'team_title' ) ?: 'Formateurs';
$kicker  = get_field( 'team_kicker' ) ?: 'La promesse d’un accompagnement';
$members = get_field( 'team_members' );
$text    = get_field( 'team_text' ) ?: 'Lorem ipsum dolor sit amet consectetur. Eget velit non ipsum commodo quis mauris metus. Cursus praesent pellentesque ultricies eu nisi. Facilisi in est in at mollis eget. Nec amet viverra consectetur quis. Aliquam quisque urna mi enim lectus faucibus sit.';

if ( ! $members ) {
    $members = array(
        array(
            'image' => get_template_directory_uri() . '/assets/images/coach-amelie.jpg',
            'alt'   => 'Portrait d’Amelie, formatrice pilates',
        ),
        array(
            'image' => get_template_directory_uri() . '/assets/images/coach-elise.jpg',
            'alt'   => 'Portrait d’Elise, formatrice pilates',
        ),
        array(
            'image' => get_template_directory_uri() . '/assets/images/coach-marc.jpg',
            'alt'   => 'Portrait de Marc, formateur pilates',
        ),
    );
}

$block_id = 'krz-team-' . uniqid();

if ( isset( $block ) && is_array( $block ) ) {
    $block_id = ! empty( $block['anchor'] )
        ? $block['anchor']
        : 'krz-team-' . $block['id'];
}
?>

<section
    id="<?php echo esc_attr( $block_id ); ?>"
    class="krz-block krz-block--rounded krz-team"
    style="--krz-stack:13;"
    data-krz-animation-section
>
    <div class="krz-block__surface krz-team__surface">
        <div class="container krz-team__container">

            <?php if ( $title ) : ?>
                <h2
                    class="krz-team__title"
                    data-krz-animation="text-chars-up"
                >
                    <?php echo esc_html( $title ); ?>
                </h2>
            <?php endif; ?>

            <?php if ( $kicker ) : ?>
                <p
                    class="krz-team__kicker"
                    data-krz-animation="text-words-up"
                    data-krz-delay="0.16"
                >
                    <?php echo esc_html( $kicker ); ?>
                </p>
            <?php endif; ?>

            <?php if ( $members ) : ?>
                <div
                    class="row justify-content-center krz-team__grid"
                    data-krz-animation="fade-up"
                    data-krz-delay="0.30"
                >
                    <?php foreach ( $members as $member ) : ?>
                        <?php
                        $image = $member['image'] ?? null;

                        $image_id = is_array( $image ) && ! empty( $image['ID'] )
                            ? absint( $image['ID'] )
                            : 0;

                        $fallback_url = is_string( $image ) ? $image : '';
                        ?>

                        <?php if ( $image_id || $fallback_url ) : ?>

                            <div class="col-12 col-sm-4 col-lg-3 krz-team__member">

                                <article class="krz-team__card">

                                    <?php if ( $image_id ) : ?>

                                        <?php
                                        echo wp_get_attachment_image(
                                            $image_id,
                                            'medium',
                                            false,
                                            array(
                                                'loading'  => 'lazy',
                                                'decoding' => 'async',
                                                'sizes'    => '(min-width: 992px) 25vw, (min-width: 576px) 33vw, 100vw',
                                            )
                                        );
                                        ?>

                                    <?php else : ?>

                                        <img
                                            src="<?php echo esc_url( $fallback_url ); ?>"
                                            alt="<?php echo esc_attr( $member['alt'] ?? '' ); ?>"
                                            loading="lazy"
                                            decoding="async"
                                        >

                                    <?php endif; ?>

                                </article>

                            </div>

                        <?php endif; ?>

                    <?php endforeach; ?>
                </div>
            <?php endif; ?>

            <?php if ( $text ) : ?>
                <div
                    class="krz-team__text"
                    data-krz-animation="fade-up"
                    data-krz-delay="0.48"
                >
                    <?php echo wp_kses_post( wpautop( $text ) ); ?>
                </div>
            <?php endif; ?>

        </div>
    </div>
</section>