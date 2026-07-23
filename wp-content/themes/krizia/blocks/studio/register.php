<?php
/**
 * Register Studio block.
 *
 * @package Krizia
 */

if (!function_exists('acf_register_block_type')) {
    return;
}

acf_register_block_type(
    array(
        'name'        => 'krizia-studio',
        'title'       => __('Studio', 'krizia'),
        'description' => __(
            'Section Studio de la page d’accueil.',
            'krizia'
        ),
        'category'    => 'formatting',
        'icon'        => 'format-gallery',

        'keywords' => array(
            'studio',
            'images',
            'pilates',
        ),

        'render_template' => get_template_directory()
            . '/blocks/studio/template.php',

        'enqueue_assets' => static function () {
            krizia_enqueue_block_style('studio');
        },

        'mode' => 'preview',

        'supports' => array(
            'align'  => false,
            'anchor' => true,
            'jsx'    => true,
        ),
    )
);