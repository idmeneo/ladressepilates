<?php
/**
 * Register Team block.
 *
 * @package Krizia
 */

if (!function_exists('acf_register_block_type')) {
    return;
}

acf_register_block_type(
    array(
        'name'        => 'krizia-team',
        'title'       => __('Formateurs', 'krizia'),
        'description' => __(
            'Section de présentation des formateurs.',
            'krizia'
        ),
        'category'    => 'formatting',
        'icon'        => 'groups',

        'keywords' => array(
            'formateurs',
            'équipe',
            'team',
        ),

        'render_template' => get_template_directory()
            . '/blocks/team/template.php',

        'enqueue_assets' => static function () {
            krizia_enqueue_block_style('team');
        },

        'mode' => 'preview',

        'supports' => array(
            'align'  => false,
            'anchor' => true,
            'jsx'    => true,
        ),
    )
);