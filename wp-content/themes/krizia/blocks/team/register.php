<?php
/**
 * Register Team block.
 *
 * @package Krizia
 */

if (!function_exists('acf_register_block_type')) {
    return;
}

acf_register_block_type([
    'name'            => 'krizia-team',
    'title'           => __('Formateurs', 'krizia'),
    'description'     => __('Section de présentation des formateurs.', 'krizia'),
    'category'        => 'formatting',
    'icon'            => 'groups',
    'keywords'        => ['formateurs', 'équipe', 'team'],
    'render_template' => get_template_directory() . '/blocks/team/template.php',
    'mode'            => 'preview',
    'supports'        => [
        'align'  => false,
        'anchor' => true,
        'jsx'    => true,
    ],
]);