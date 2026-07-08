<?php
/**
 * Register Private Course block.
 *
 * @package Krizia
 */

if (!function_exists('acf_register_block_type')) {
    return;
}

acf_register_block_type([
    'name'            => 'krizia-private-course',
    'title'           => __('Cours privés', 'krizia'),
    'description'     => __('Section de présentation des cours privés.', 'krizia'),
    'category'        => 'formatting',
    'icon'            => 'groups',
    'keywords'        => ['cours', 'privés', 'pilates'],
    'render_template' => get_template_directory() . '/blocks/private-course/template.php',
    'mode'            => 'preview',
    'supports'        => [
        'align'  => false,
        'anchor' => true,
        'jsx'    => true,
    ],
]);