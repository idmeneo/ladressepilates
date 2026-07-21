<?php
/**
 * Register Hero block.
 *
 * @package Krizia
 */

if ( ! function_exists( 'acf_register_block_type' ) ) {
    return;
}

acf_register_block_type( array(
    'name'            => 'krizia-hero',
    'title'           => __( 'Hero', 'krizia' ),
    'description'     => __( 'Section hero de la page d’accueil.', 'krizia' ),
    'category'        => 'formatting',
    'icon'            => 'cover-image',
    'keywords'        => array(
        'hero',
        'accueil',
        'bannière',
    ),

    'render_template' => get_template_directory() . '/blocks/hero/template.php',

    'enqueue_style'   => get_template_directory_uri() . '/blocks/hero/style.css',

    'mode'            => 'preview',

    'supports'        => array(
        'align'  => false,
        'anchor' => true,
    ),
) );