<?php
/**
 * Private Formula block template.
 *
 * @package Krizia
 */

$title = get_field('private_formula_title') ?: 'Les formules';
$items = get_field('private_formula_items');

if (!$items) {
    $items = [
        [
            'title'       => 'Visiteur',
            'tagline'     => 'Découvrir l’Adresse Pilates',
            'details'     => '3 cours privés',
            'price'       => '285 €',
            'button'      => [
                'url'    => '#reservation',
                'title'  => 'M’inscrire',
                'target' => '',
            ],
            'is_featured' => false,
            'badge'       => '',
        ],
        [
            'title'       => 'Régulier',
            'tagline'     => 'Prendre ses repères',
            'details'     => '10 cours privés',
            'price'       => '900 €',
            'button'      => [
                'url'    => '#reservation',
                'title'  => 'M’inscrire',
                'target' => '',
            ],
            'is_featured' => true,
            'badge'       => 'Coup de coeur',
        ],
        [
            'title'       => 'Résident',
            'tagline'     => 'Approfondir sa pratique',
            'details'     => '20 cours privés',
            'price'       => '1 700 €',
            'button'      => [
                'url'    => '#reservation',
                'title'  => 'M’inscrire',
                'target' => '',
            ],
            'is_featured' => false,
            'badge'       => '',
        ],
    ];
}

$block_id = 'krz-private-formula-' . uniqid();

if (isset($block) && is_array($block)) {
    $block_id = !empty($block['anchor']) ? $block['anchor'] : 'krz-private-formula-' . $block['id'];
}
?>

<section id="<?php echo esc_attr($block_id); ?>" class="krz-private-formula">
    <div class="container-fluid krz-private-formula__container">
        <?php if ($title) : ?>
            <div class="row justify-content-center text-center">
                <div class="col-12">
                    <h2 class="krz-private-formula__title"><?php echo esc_html($title); ?></h2>
                </div>
            </div>
        <?php endif; ?>

        <div class="krz-private-formula__swiper swiper">
            <div class="row justify-content-center krz-private-formula__row swiper-wrapper">
                <?php foreach ($items as $item) : ?>
                    <?php
                    $item_title   = $item['title'] ?? '';
                    $tagline      = $item['tagline'] ?? '';
                    $details      = $item['details'] ?? '';
                    $price        = $item['price'] ?? '';
                    $button       = $item['button'] ?? null;
                    $is_featured  = !empty($item['is_featured']);
                    $badge        = $item['badge'] ?? '';

                    $button_url    = is_array($button) && !empty($button['url']) ? $button['url'] : '#reservation';
                    $button_title  = is_array($button) && !empty($button['title']) ? $button['title'] : 'M’inscrire';
                    $button_target = is_array($button) && !empty($button['target']) ? $button['target'] : '_self';
                    ?>

                    <div class="col-12 col-md-6 col-lg-4 mb-4 mb-lg-0 swiper-slide">
                        <article class="krz-private-formula__card<?php echo $is_featured ? ' is-featured' : ''; ?>">
                            <?php if ($is_featured && $badge) : ?>
                                <span class="krz-private-formula__badge"><?php echo esc_html($badge); ?></span>
                            <?php endif; ?>

                            <div class="krz-private-formula__card-inner">
                                <?php if ($item_title) : ?>
                                    <h3 class="krz-private-formula__card-title"><?php echo esc_html($item_title); ?></h3>
                                <?php endif; ?>

                                <span class="krz-private-formula__line" aria-hidden="true"></span>

                                <?php if ($tagline) : ?>
                                    <p class="krz-private-formula__tagline"><?php echo esc_html($tagline); ?></p>
                                <?php endif; ?>

                                <span class="krz-private-formula__separator" aria-hidden="true"></span>

                                <?php if ($details) : ?>
                                    <span class="krz-private-formula__details"><?php echo esc_html($details); ?></span>
                                <?php endif; ?>

                                <?php if ($price) : ?>
                                    <span class="krz-private-formula__price"><?php echo esc_html($price); ?></span>
                                <?php endif; ?>

                                <?php if ($button_title) : ?>
                                    <a
                                        class="krz-private-formula__button"
                                        href="<?php echo esc_url($button_url); ?>"
                                        target="<?php echo esc_attr($button_target); ?>"
                                    >
                                        <?php echo esc_html($button_title); ?>
                                    </a>
                                <?php endif; ?>
                            </div>
                        </article>
                    </div>
                <?php endforeach; ?>
            </div>

            <div class="krz-private-formula__pagination swiper-pagination" aria-hidden="true"></div>
        </div>
    </div>
</section>