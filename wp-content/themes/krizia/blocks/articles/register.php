<?php
/**
 * Register Articles block.
 *
 * @package Krizia
 */

if (!function_exists('acf_register_block_type')) {
    return;
}

acf_register_block_type(
    array(
        'name'        => 'krizia-articles',
        'title'       => __('Articles', 'krizia'),
        'description' => __(
            'Section articles avec slider horizontal.',
            'krizia'
        ),
        'category'    => 'formatting',
        'icon'        => 'admin-post',

        'keywords' => array(
            'articles',
            'blog',
            'swiper',
        ),

        'render_template' => get_template_directory()
            . '/blocks/articles/template.php',

        'enqueue_assets' => function () {
            wp_enqueue_style('krizia-swiper');
            wp_enqueue_script('krizia-swiper');

            krizia_enqueue_block_style('articles');

            krizia_enqueue_block_script(
                'articles',
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