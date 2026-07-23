<?php
/**
 * Single post template.
 *
 * @package Krizia
 */

get_header();

$post_id = get_the_ID();

$related_query = new WP_Query([
    'post_type'           => 'post',
    'posts_per_page'      => 6,
    'post_status'         => 'publish',
    'post__not_in'        => [$post_id],
    'ignore_sticky_posts' => true,
]);
?>

<main id="primary" class="krz-single">
    <?php while (have_posts()) : the_post(); ?>
        <article <?php post_class('krz-single__article'); ?>>
            <header class="krz-single__hero">
                <div class="container krz-single__hero-container">
                    <a class="krz-single__back" href="<?php echo esc_url(get_permalink(get_option('page_for_posts')) ?: home_url('/')); ?>">
                        Retour
                    </a>

                    <p class="krz-single__date"><?php echo esc_html(get_the_date('d.m.Y')); ?></p>

                    <h1 class="krz-single__title"><?php the_title(); ?></h1>

                    <?php if (has_excerpt()) : ?>
                        <p class="krz-single__excerpt"><?php echo esc_html(get_the_excerpt()); ?></p>
                    <?php endif; ?>
                </div>
            </header>

            <?php if (has_post_thumbnail()) : ?>
                <div class="container krz-single__image-container">
                    <?php the_post_thumbnail('full', ['class' => 'krz-single__image']); ?>
                </div>
            <?php endif; ?>

            <div class="container krz-single__content-container">
                <div class="krz-single__content">
                    <?php the_content(); ?>
                </div>
            </div>
        </article>
    <?php endwhile; ?>

    <?php if ($related_query->have_posts()) : ?>
        <section class="krz-articles krz-single__related">
            <div class="krz-articles__surface">
                <div class="container-fluid krz-articles__container">
                    <div class="krz-articles__heading">
                        <h2 class="krz-articles__title">
                            Articles
                        </h2>

                        <p class="krz-articles__kicker">
                            À lire aussi
                        </p>
                    </div>

                    <div class="krz-articles__swiper swiper">
                        <div class="krz-articles__row swiper-wrapper">
                            <?php
                            while ($related_query->have_posts()) :
                                $related_query->the_post();

                                $related_id = get_the_ID();
                                $related_title = get_the_title();
                                $related_image = get_the_post_thumbnail_url(
                                    $related_id,
                                    'large'
                                );

                                if (!$related_image) {
                                    $related_image =
                                        get_template_directory_uri()
                                        . '/assets/images/studio-wide.jpg';
                                }
                                ?>

                                <article class="krz-articles__slide swiper-slide">
                                    <a
                                        class="krz-articles__card"
                                        href="<?php the_permalink(); ?>"
                                    >
                                        <span class="krz-articles__image-wrap">
                                            <img
                                                class="krz-articles__image"
                                                src="<?php echo esc_url($related_image); ?>"
                                                alt="<?php echo esc_attr($related_title); ?>"
                                                loading="lazy"
                                            >
                                        </span>

                                        <span class="krz-articles__content">
                                            <time
                                                class="krz-articles__date"
                                                datetime="<?php echo esc_attr(
                                                    get_the_date('c')
                                                ); ?>"
                                            >
                                                <?php
                                                echo esc_html(
                                                    get_the_date('d.m.Y')
                                                );
                                                ?>
                                            </time>

                                            <h3 class="krz-articles__card-title">
                                                <?php echo esc_html($related_title); ?>
                                            </h3>

                                            <span class="krz-articles__excerpt">
                                                <?php
                                                echo esc_html(
                                                    wp_trim_words(
                                                        get_the_excerpt(),
                                                        18,
                                                        '…'
                                                    )
                                                );
                                                ?>
                                            </span>

                                            <span class="krz-articles__link">
                                                Lire l’article
                                            </span>
                                        </span>
                                    </a>
                                </article>
                            <?php endwhile; ?>
                        </div>

                        <div
                            class="krz-articles__pagination"
                            aria-hidden="true"
                        >
                            <span></span>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <?php wp_reset_postdata(); ?>
    <?php endif; ?>
</main>

<?php
get_footer();