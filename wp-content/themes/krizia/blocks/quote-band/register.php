<?php
/**
 * Register Quote Band block.
 *
 * @package Krizia
 */

if ( ! function_exists( 'acf_register_block_type' ) ) {
    return;
}

acf_register_block_type(
    array(
        'name'            => 'krizia-quote-band',
        'title'           => __( 'Quote Band', 'krizia' ),
        'description'     => __( 'Bandeau avec image de fond et citations interactives.', 'krizia' ),
        'category'        => 'formatting',
        'icon'            => 'format-quote',
        'keywords'        => array(
            'quote',
            'citation',
            'slider',
            'equipement',
        ),
        'render_template' => get_template_directory() . '/blocks/quote-band/template.php',
        'enqueue_style'   => get_template_directory_uri() . '/blocks/quote-band/style.css',
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
                'krizia-quote-band',
                get_template_directory_uri() . '/blocks/quote-band/script.js',
                array( 'krizia-swiper' ),
                filemtime( get_template_directory() . '/blocks/quote-band/script.js' ),
                true
            );
        },
    )
);