<?php
/**
 * FAQ block template.
 *
 * @package Krizia
 */

$title  = get_field('faq_title') ?: 'FAQ';
$kicker = get_field('faq_kicker') ?: 'Vos questions';
$items  = get_field('faq_items');

if (!$items) {
    $items = [
        [
            'question' => 'À qui s’adressent les cours ?',
            'answer'   => 'Les cours s’adressent à toutes les personnes souhaitant pratiquer le Pilates avec un accompagnement précis et individualisé.',
        ],
        [
            'question' => 'Faut-il avoir déjà pratiqué ?',
            'answer'   => 'Non, les séances sont adaptées au niveau, aux besoins et aux objectifs de chaque personne.',
        ],
    ];
}

$block_id = 'krz-faq-' . uniqid();

if (isset($block) && is_array($block)) {
    $block_id = !empty($block['anchor']) ? $block['anchor'] : 'krz-faq-' . $block['id'];
}
?>

<section id="<?php echo esc_attr($block_id); ?>" class="krz-faq">
    <div class="container krz-faq__container">
        <?php if ($title) : ?>
            <h2 class="krz-faq__title"><?php echo esc_html($title); ?></h2>
        <?php endif; ?>

        <?php if ($kicker) : ?>
            <p class="krz-faq__kicker"><?php echo esc_html($kicker); ?></p>
        <?php endif; ?>

        <?php if ($items) : ?>
            <div class="krz-faq__accordion">
                <?php foreach ($items as $index => $item) : ?>
                    <?php
                    $question = $item['question'] ?? '';
                    $answer   = $item['answer'] ?? '';
                    $item_id  = $block_id . '-item-' . $index;
                    ?>

                    <article class="krz-faq__item<?php echo $index === 0 ? ' is-open' : ''; ?>">
                        <?php if ($question) : ?>
                            <button
                                class="krz-faq__question"
                                type="button"
                                aria-expanded="<?php echo $index === 0 ? 'true' : 'false'; ?>"
                                aria-controls="<?php echo esc_attr($item_id); ?>"
                            >
                                <?php echo esc_html($question); ?>
                            </button>
                        <?php endif; ?>

                        <div
                            id="<?php echo esc_attr($item_id); ?>"
                            class="krz-faq__answer"
                            <?php echo $index === 0 ? '' : 'hidden'; ?>
                        >
                            <div class="krz-faq__answer-inner">
                                <?php echo wp_kses_post(wpautop($answer)); ?>
                            </div>
                        </div>
                    </article>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</section>