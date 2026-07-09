<?php
/**
 * Register Newsletter block.
 *
 * @package Krizia
 */

if (!function_exists('acf_register_block_type')) {
    return;
}

acf_register_block_type([
    'name'            => 'krizia-newsletter',
    'title'           => __('Newsletter', 'krizia'),
    'description'     => __('Section newsletter avec image de fond.', 'krizia'),
    'category'        => 'formatting',
    'icon'            => 'email-alt',
    'keywords'        => ['newsletter', 'email', 'inscription'],
    'render_template' => get_template_directory() . '/blocks/newsletter/template.php',
    'mode'            => 'preview',
    'supports'        => [
        'align'  => false,
        'anchor' => true,
        'jsx'    => true,
    ],
]);