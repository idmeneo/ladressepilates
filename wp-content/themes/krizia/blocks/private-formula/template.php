<?php
/**
 * Private Formula block template.
 *
 * Displays packages synchronized from Amelia.
 *
 * @package Krizia
 */

$title             = get_field('private_formula_title') ?: 'Les formules';
$button_text       = get_field('private_formula_button_text') ?: 'M’inscrire';
$featured_package  = absint(get_field('private_formula_featured_package'));
$featured_badge    = get_field('private_formula_featured_badge') ?: 'Coup de cœur';
$maximum_packages  = absint(get_field('private_formula_maximum_packages'));

$packages = function_exists('krizia_get_amelia_packages')
    ? krizia_get_amelia_packages(true)
    : [];

if ($maximum_packages > 0) {
    $packages = array_slice($packages, 0, $maximum_packages);
}

$block_id = 'krz-private-formula-' . uniqid();

if (isset($block) && is_array($block)) {
    $block_id = !empty($block['anchor'])
        ? $block['anchor']
        : 'krz-private-formula-' . $block['id'];
}

/**
 * Format an Amelia price without unnecessary decimals.
 *
 * @param mixed $price Price.
 * @return string
 */
$format_price = static function ($price) {
    $price = (float) $price;
    $decimals = floor($price) === $price ? 0 : 2;

    return number_format_i18n($price, $decimals) . ' €';
};
?>

<section
    id="<?php echo esc_attr($block_id); ?>"
    class="krz-private-formula"
>
    <div class="container-fluid krz-private-formula__container">
        <?php if ($title) : ?>
            <div class="row justify-content-center text-center">
                <div class="col-12">
                    <h2 class="krz-private-formula__title">
                        <?php echo esc_html($title); ?>
                    </h2>
                </div>
            </div>
        <?php endif; ?>

        <?php if ($packages) : ?>
            <div class="krz-private-formula__swiper swiper">
                <div class="krz-private-formula__row swiper-wrapper">
                    <?php foreach ($packages as $package) : ?>
                        <?php
                        $package_id   = absint($package['id'] ?? 0);
                        $name         = $package['name'] ?? '';
                        $description  = $package['description'] ?? '';
                        $quantity     = absint($package['quantity'] ?? 0);
                        $price        = $package['price'] ?? 0;
                        $services     = $package['services'] ?? [];
                        $is_featured  = $featured_package === $package_id;
                        $trigger      = 'krz-amelia-package-' . $block_id . '-' . $package_id;

                        $service_name = '';

                        if (!empty($services[0]['name'])) {
                            $service_name = $services[0]['name'];
                        }

                        if ($quantity === 1) {
                            $quantity_label = '1 cours privé';
                        } elseif ($quantity > 1) {
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
                                class="krz-private-formula__card<?php echo $is_featured ? ' is-featured' : ''; ?>"
                            >
                                <?php if ($is_featured && $featured_badge) : ?>
                                    <span class="krz-private-formula__badge">
                                        <?php echo esc_html($featured_badge); ?>
                                    </span>
                                <?php endif; ?>

                                <div class="krz-private-formula__card-inner">
                                    <?php if ($name) : ?>
                                        <h3 class="krz-private-formula__card-title">
                                            <?php echo esc_html($name); ?>
                                        </h3>
                                    <?php endif; ?>

                                    <span
                                        class="krz-private-formula__line"
                                        aria-hidden="true"
                                    ></span>

                                    <?php if ($description) : ?>
                                        <div class="krz-private-formula__tagline">
                                            <?php echo wp_kses_post(wpautop($description)); ?>
                                        </div>
                                    <?php elseif ($service_name) : ?>
                                        <p class="krz-private-formula__tagline">
                                            <?php echo esc_html($service_name); ?>
                                        </p>
                                    <?php endif; ?>

                                    <span
                                        class="krz-private-formula__separator"
                                        aria-hidden="true"
                                    ></span>

                                    <?php if ($quantity_label) : ?>
                                        <span class="krz-private-formula__details">
                                            <?php echo esc_html($quantity_label); ?>
                                        </span>
                                    <?php endif; ?>

                                    <span class="krz-private-formula__price">
                                        <?php echo esc_html($format_price($price)); ?>
                                    </span>

                                    <?php if ($package_id) : ?>
                                        <button
                                            class="krz-private-formula__button <?php echo esc_attr($trigger); ?>"
                                            type="button"
                                        >
                                            <?php echo esc_html($button_text); ?>
                                        </button>

                                        <div
                                            class="krz-private-formula__amelia"
                                            aria-hidden="true"
                                        >
                                            <?php
                                            echo do_shortcode(
                                                sprintf(
                                                    '[ameliacatalogbooking package=%1$d trigger="%2$s" trigger_type="class" in_dialog=1]',
                                                    $package_id,
                                                    esc_attr($trigger)
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
                    class="krz-private-formula__pagination swiper-pagination"
                    aria-hidden="true"
                ></div>
            </div>
        <?php elseif (current_user_can('edit_posts')) : ?>
            <p class="krz-private-formula__empty">
                Aucun package Amelia synchronisé. Enregistre un package visible dans Amelia.
            </p>
        <?php endif; ?>
    </div>
</section>