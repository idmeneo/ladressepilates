<?php
/**
 * Register Private Course block.
 *
 * @package Krizia
 */

if (!function_exists('acf_register_block_type')) {
    return;
}

acf_register_block_type(
    array(
        'name'        => 'krizia-private-course',
        'title'       => __('Cours privés', 'krizia'),
        'description' => __(
            'Présentation des cours privés et des formules Amelia.',
            'krizia'
        ),
        'category'    => 'formatting',
        'icon'        => 'groups',

        'keywords' => array(
            'cours',
            'privés',
            'pilates',
            'formules',
            'tarifs',
        ),

        'render_template' => get_template_directory()
            . '/blocks/private-course/template.php',

        'enqueue_assets' => static function () {
            wp_enqueue_style('krizia-swiper');
            wp_enqueue_script('krizia-swiper');

            krizia_enqueue_block_style('private-course');

            krizia_enqueue_block_script(
                'private-course',
                array('krizia-swiper')
            );
        },

        'mode' => 'preview',

        'supports' => array(
            'align'  => false,
            'anchor' => true,
            'jsx'    => true,
        ),
    )
);