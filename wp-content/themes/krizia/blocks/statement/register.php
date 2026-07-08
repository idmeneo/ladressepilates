<?php
/**
 * Register Statement block.
 *
 * @package Krizia
 */

if (!function_exists('acf_register_block_type')) {
    return;
}

acf_register_block_type([
    'name'            => 'krizia-statement',
    'title'           => __('Statement', 'krizia'),
    'description'     => __('Section statement avec image de fond et logo en filigrane.', 'krizia'),
    'category'        => 'formatting',
    'icon'            => 'format-quote',
    'keywords'        => ['statement', 'citation', 'image'],
    'render_template' => get_template_directory() . '/blocks/statement/template.php',
    'mode'            => 'preview',
    'supports'        => [
        'align'  => false,
        'anchor' => true,
        'jsx'    => true,
    ],
]);