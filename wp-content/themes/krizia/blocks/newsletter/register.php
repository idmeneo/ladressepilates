<?php
/**
 * Register Newsletter block.
 *
 * @package Krizia
 */

if (!function_exists('acf_register_block_type')) {
    return;
}

acf_register_block_type(
    array(
        'name'        => 'krizia-newsletter',
        'title'       => __('Newsletter', 'krizia'),
        'description' => __(
            'Section newsletter avec image de fond.',
            'krizia'
        ),
        'category'    => 'formatting',
        'icon'        => 'email-alt',

        'keywords' => array(
            'newsletter',
            'email',
            'inscription',
        ),

        'render_template' => get_template_directory()
            . '/blocks/newsletter/template.php',

        'enqueue_assets' => function () {
            krizia_enqueue_block_style('newsletter');
        },

        'mode' => 'preview',

        'supports' => array(
            'align'  => false,
            'anchor' => true,
            'jsx'    => true,
        ),
    )
);