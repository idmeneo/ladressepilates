<?php
/**
 * Register Private Course block.
 *
 * @package Krizia
 */

if ( ! function_exists( 'acf_register_block_type' ) ) {
    return;
}

acf_register_block_type(
    array(
        'name'            => 'krizia-private-course',
        'title'           => __( 'Cours privés', 'krizia' ),
        'description'     => __( 'Présentation des cours privés et des formules Amelia.', 'krizia' ),
        'category'        => 'formatting',
        'icon'            => 'groups',
        'keywords'        => array(
            'cours',
            'privés',
            'pilates',
            'formules',
            'tarifs',
        ),
        'render_template' => get_template_directory() . '/blocks/private-course/template.php',
        'enqueue_style'   => get_template_directory_uri() . '/blocks/private-course/style.css',
        'mode'            => 'preview',
        'supports'        => array(
            'align'  => false,
            'anchor' => true,
            'jsx'    => true,
        ),
        'enqueue_assets'  => static function () {
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

            $script_path = get_template_directory() . '/blocks/private-course/script.js';

            wp_enqueue_script(
                'krizia-private-course',
                get_template_directory_uri() . '/blocks/private-course/script.js',
                array( 'krizia-swiper' ),
                file_exists( $script_path ) ? filemtime( $script_path ) : null,
                true
            );
        },
    )
);