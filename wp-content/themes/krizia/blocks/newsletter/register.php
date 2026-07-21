<?php
/**
 * Register Newsletter block.
 *
 * @package Krizia
 */

if ( ! function_exists( 'acf_register_block_type' ) ) {
    return;
}

acf_register_block_type(
    array(
        'name'            => 'krizia-newsletter',
        'title'           => __( 'Newsletter', 'krizia' ),
        'description'     => __( 'Section newsletter avec image de fond.', 'krizia' ),
        'category'        => 'formatting',
        'icon'            => 'email-alt',
        'keywords'        => array(
            'newsletter',
            'email',
            'inscription',
        ),
        'render_template' => get_template_directory() . '/blocks/newsletter/template.php',
        'enqueue_style'   => get_template_directory_uri() . '/blocks/newsletter/style.css',
        'mode'            => 'preview',
        'supports'        => array(
            'align'  => false,
            'anchor' => true,
            'jsx'    => true,
        ),
    )
);