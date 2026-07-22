<?php
/**
 * Articles block template.
 *
 * @package Krizia
 */

$title  = get_field( 'articles_title' ) ?: 'Articles';
$kicker = get_field( 'articles_kicker' ) ?: 'À lire';
$mode   = get_field( 'articles_mode' ) ?: 'latest';
$limit  = get_field( 'articles_limit' ) ?: 6;
$manual = get_field( 'articles_manual_posts' );

$posts = array();

if ( 'manual' === $mode && $manual ) {
    $posts = $manual;
} else {
    $query = new WP_Query(
        array(
            'post_type'           => 'post',
            'posts_per_page'      => (int) $limit,
            'post_status'         => 'publish',
            'ignore_sticky_posts' => true,
        )
    );

    if ( $query->have_posts() ) {
        $posts = $query->posts;
    }

    wp_reset_postdata();
}

$block_id = 'krz-articles-' . uniqid();

if ( isset( $block ) && is_array( $block ) ) {
    $block_id = ! empty( $block['anchor'] )
        ? $block['anchor']
        : 'krz-articles-' . $block['id'];
}
?>

<section
    id="<?php echo esc_attr( $block_id ); ?>"
    class="krz-block krz-block--rounded krz-articles"
    style="--krz-stack:11;"
    data-krz-animation-section
>
    <div class="krz-block__surface krz-articles__surface">
        <div class="container-fluid krz-articles__container">
            <div class="krz-articles__heading">
                <?php if ( $title ) : ?>
                    <h2
                        class="krz-articles__title"
                        data-krz-animation="text-chars-up"
                    >
                        <?php echo esc_html( $title ); ?>
                    </h2>
                <?php endif; ?>

                <?php if ( $kicker ) : ?>
                    <p
                        class="krz-articles__kicker"
                        data-krz-animation="text-words-up"
                        data-krz-delay="0.16"
                    >
                        <?php echo esc_html( $kicker ); ?>
                    </p>
                        <?php echo esc_html( $kicker ); ?>
                    </p>
                <?php endif; ?>
            </div>

            <?php if ( $posts ) : ?>
                <div
                    class="krz-articles__swiper swiper"
                    data-krz-animation="fade-up"
                    data-krz-delay="0.30"
                >
                    <div class="krz-articles__row swiper-wrapper">
                        <?php foreach ( $posts as $post_item ) : ?>
                            <?php
                            $post_id    = is_object( $post_item ) ? $post_item->ID : (int) $post_item;
                            $post_title = get_the_title( $post_id );
                            $post_url   = get_permalink( $post_id );
                            $excerpt    = get_the_excerpt( $post_id );
                            $image      = get_the_post_thumbnail_url( $post_id, 'large' );
                            $date       = get_the_date( 'd.m.Y', $post_id );

                            if ( ! $image ) {
                                $image = get_template_directory_uri() . '/assets/images/studio-wide.jpg';
                            }
                            ?>

                            <article class="col-12 col-md-6 col-lg-4 mb-4 mb-lg-0 krz-articles__slide swiper-slide">
                                <a class="krz-articles__card" href="<?php echo esc_url( $post_url ); ?>">
                                    <span class="krz-articles__image-wrap">
                                        <img
                                            class="krz-articles__image"
                                            src="<?php echo esc_url( $image ); ?>"
                                            alt="<?php echo esc_attr( $post_title ); ?>"
                                            loading="lazy"
                                            decoding="async"
                                        >
                                    </span>

                                    <span class="krz-articles__content">
                                        <time
                                            class="krz-articles__date"
                                            datetime="<?php echo esc_attr( get_the_date( 'c', $post_id ) ); ?>"
                                        >
                                            <?php echo esc_html( $date ); ?>
                                        </time>

                                        <h3 class="krz-articles__card-title">
                                            <?php echo esc_html( $post_title ); ?>
                                        </h3>

                                        <?php if ( $excerpt ) : ?>
                                            <span class="krz-articles__excerpt">
                                                <?php echo esc_html( wp_trim_words( $excerpt, 18, '...' ) ); ?>
                                            </span>
                                        <?php endif; ?>

                                        <span class="krz-articles__link">
                                            <?php echo esc_html__( 'Lire l’article', 'krizia' ); ?>
                                        </span>
                                    </span>
                                </a>
                            </article>
                        <?php endforeach; ?>
                    </div>

                    <div class="krz-articles__pagination" aria-hidden="true">
                        <span></span>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>