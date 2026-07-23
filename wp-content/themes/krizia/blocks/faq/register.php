<?php
/**
 * Register FAQ block.
 *
 * @package Krizia
 */

if (!function_exists('acf_register_block_type')) {
    return;
}

acf_register_block_type(
    array(
        'name'        => 'krizia-faq',
        'title'       => __('FAQ', 'krizia'),
        'description' => __(
            'Section FAQ avec accordéon.',
            'krizia'
        ),
        'category'    => 'formatting',
        'icon'        => 'editor-help',

        'keywords' => array(
            'faq',
            'questions',
            'accordéon',
        ),

        'render_template' => get_template_directory()
            . '/blocks/faq/template.php',

        'enqueue_assets' => function () {
            krizia_enqueue_block_style('faq');
            krizia_enqueue_block_script('faq');
        },

        'mode' => 'preview',

        'supports' => array(
            'align'  => false,
            'anchor' => true,
            'jsx'    => true,
        ),
    )
);