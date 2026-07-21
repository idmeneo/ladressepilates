<?php
/**
 * Register Articles block.
 *
 * @package Krizia
 */

if ( ! function_exists( 'acf_register_block_type' ) ) {
    return;
}

acf_register_block_type(
    array(
        'name'            => 'krizia-articles',
        'title'           => __( 'Articles', 'krizia' ),
        'description'     => __( 'Section articles avec slider horizontal.', 'krizia' ),
        'category'        => 'formatting',
        'icon'            => 'admin-post',
        'keywords'        => array( 'articles', 'blog', 'swiper' ),
        'render_template' => get_template_directory() . '/blocks/articles/template.php',
        'enqueue_style'   => get_template_directory_uri() . '/blocks/articles/style.css',
        'mode'            => 'preview',
        'supports'        => array(
            'align'  => false,
            'anchor' => true,
            'jsx'    => true,
        ),
        'enqueue_assets'  => function () {
            wp_enqueue_style(
                'krizia-swiper',
                'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css',
                array(),
                '11.1.14'
            );

            wp_enqueue_script(
                'krizia-swiper',
                'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js',
                array(),
                '11.1.14',
                true
            );

            wp_enqueue_script(
                'krizia-articles',
                get_template_directory_uri() . '/blocks/articles/script.js',
                array( 'krizia-swiper' ),
                filemtime( get_template_directory() . '/blocks/articles/script.js' ),
                true
            );
        },
    )
);