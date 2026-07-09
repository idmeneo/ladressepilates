<?php
/**
 * Team block template.
 *
 * @package Krizia
 */

$title   = get_field('team_title') ?: 'Formateurs';
$kicker  = get_field('team_kicker') ?: 'La promesse d’un accompagnement';
$members = get_field('team_members');
$text    = get_field('team_text') ?: 'Lorem ipsum dolor sit amet consectetur. Eget velit non ipsum commodo quis mauris metus. Cursus praesent pellentesque ultricies eu nisi. Facilisi in est in at mollis eget. Nec amet viverra consectetur quis. Aliquam quisque urna mi enim lectus faucibus sit.';

if (!$members) {
    $members = [
        [
            'image' => get_template_directory_uri() . '/assets/images/coach-amelie.jpg',
            'alt'   => 'Portrait d’Amelie, formatrice pilates',
        ],
        [
            'image' => get_template_directory_uri() . '/assets/images/coach-elise.jpg',
            'alt'   => 'Portrait d’Elise, formatrice pilates',
        ],
        [
            'image' => get_template_directory_uri() . '/assets/images/coach-marc.jpg',
            'alt'   => 'Portrait de Marc, formateur pilates',
        ],
    ];
}

$block_id = 'krz-team-' . uniqid();

if (isset($block) && is_array($block)) {
    $block_id = !empty($block['anchor']) ? $block['anchor'] : 'krz-team-' . $block['id'];
}
?>

<section id="<?php echo esc_attr($block_id); ?>" class="krz-team">
    <div class="container krz-team__container">
        <?php if ($title) : ?>
            <h2 class="krz-team__title"><?php echo esc_html($title); ?></h2>
        <?php endif; ?>

        <?php if ($kicker) : ?>
            <p class="krz-team__kicker"><?php echo esc_html($kicker); ?></p>
        <?php endif; ?>

        <?php if ($members) : ?>
            <div class="row justify-content-center krz-team__grid">
                <?php foreach ($members as $member) : ?>
                    <?php
                    $image = $member['image'] ?? '';
                    $alt   = $member['alt'] ?? '';
                    ?>

                    <?php if ($image) : ?>
                        <div class="col-10 col-sm-4 col-lg-3 mb-4 mb-sm-0">
                            <article class="krz-team__card">
                                <img
                                    src="<?php echo esc_url($image); ?>"
                                    alt="<?php echo esc_attr($alt); ?>"
                                    loading="lazy"
                                >
                            </article>
                        </div>
                    <?php endif; ?>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>

        <?php if ($text) : ?>
            <div class="krz-team__text">
                <?php echo wp_kses_post(wpautop($text)); ?>
            </div>
        <?php endif; ?>
    </div>
</section>