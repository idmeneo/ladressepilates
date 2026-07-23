<?php
/**
 * Register Formation block.
 *
 * @package Krizia
 */

if (!function_exists('acf_register_block_type')) {
    return;
}

acf_register_block_type(
    array(
        'name'        => 'krizia-formation',
        'title'       => __('Formation', 'krizia'),
        'description' => __(
            'Section formation continue.',
            'krizia'
        ),
        'category'    => 'formatting',
        'icon'        => 'welcome-learn-more',

        'keywords' => array(
            'formation',
            'pilates',
            'enseignement',
        ),

        'render_template' => get_template_directory()
            . '/blocks/formation/template.php',

        'enqueue_assets' => function () {
            krizia_enqueue_block_style('formation');
        },

        'mode' => 'preview',

        'supports' => array(
            'align'  => false,
            'anchor' => true,
            'jsx'    => true,
        ),
    )
);