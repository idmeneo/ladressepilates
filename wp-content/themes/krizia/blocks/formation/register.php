<?php
/**
 * Register Formation block.
 *
 * @package Krizia
 */

if (!function_exists('acf_register_block_type')) {
    return;
}

acf_register_block_type([
    'name'            => 'krizia-formation',
    'title'           => __('Formation', 'krizia'),
    'description'     => __('Section formation continue.', 'krizia'),
    'category'        => 'formatting',
    'icon'            => 'welcome-learn-more',
    'keywords'        => ['formation', 'pilates', 'enseignement'],
    'render_template' => get_template_directory() . '/blocks/formation/template.php',
    'mode'            => 'preview',
    'supports'        => [
        'align'  => false,
        'anchor' => true,
        'jsx'    => true,
    ],
]);