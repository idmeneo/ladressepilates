<?php
/**
 * Register Quote Band block.
 *
 * @package Krizia
 */

if (!function_exists('acf_register_block_type')) {
    return;
}

acf_register_block_type(
    array(
        'name'        => 'krizia-quote-band',
        'title'       => __('Quote Band', 'krizia'),
        'description' => __(
            'Bandeau avec image de fond et citations interactives.',
            'krizia'
        ),
        'category'    => 'formatting',
        'icon'        => 'format-quote',

        'keywords' => array(
            'quote',
            'citation',
            'slider',
            'équipement',
        ),

        'render_template' => get_template_directory()
            . '/blocks/quote-band/template.php',

        'enqueue_assets' => static function () {
            wp_enqueue_style('krizia-swiper');
            wp_enqueue_script('krizia-swiper');

            krizia_enqueue_block_style('quote-band');

            krizia_enqueue_block_script(
                'quote-band',
                array('krizia-swiper')
            );
        },

        'mode' => 'preview',

        'supports' => array(
            'align'  => false,
            'anchor' => true,
            'jsx'    => true,
        ),
    )
);