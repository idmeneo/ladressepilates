<?php
/**
 * Register FAQ block.
 *
 * @package Krizia
 */

if (!function_exists('acf_register_block_type')) {
    return;
}

acf_register_block_type([
    'name'            => 'krizia-faq',
    'title'           => __('FAQ', 'krizia'),
    'description'     => __('Section FAQ avec accordéon.', 'krizia'),
    'category'        => 'formatting',
    'icon'            => 'editor-help',
    'keywords'        => ['faq', 'questions', 'accordeon'],
    'render_template' => get_template_directory() . '/blocks/faq/template.php',
    'enqueue_style' => get_template_directory_uri() . '/blocks/faq/style.css',
    'mode'            => 'preview',
    'supports'        => [
        'align'  => false,
        'anchor' => true,
        'jsx'    => true,
    ],
    'enqueue_assets'  => function () {
        wp_enqueue_script(
            'krizia-faq',
            get_template_directory_uri() . '/blocks/faq/script.js',
            [],
            filemtime(get_template_directory() . '/blocks/faq/script.js'),
            true
        );
    },
]);