<?php
/**
 * Register Statement block.
 *
 * @package Krizia
 */

if ( ! function_exists( 'acf_register_block_type' ) ) {
    return;
}

acf_register_block_type(
    array(
        'name'            => 'krizia-statement',
        'title'           => __( 'Statement', 'krizia' ),
        'description'     => __( 'Section statement avec image de fond et logo en filigrane.', 'krizia' ),
        'category'        => 'formatting',
        'icon'            => 'format-quote',
        'keywords'        => array(
            'statement',
            'citation',
            'image',
        ),
        'render_template' => get_template_directory() . '/blocks/statement/template.php',
        'enqueue_style'   => get_template_directory_uri() . '/blocks/statement/style.css',
        'mode'            => 'preview',
        'supports'        => array(
            'align'  => false,
            'anchor' => true,
            'jsx'    => true,
        ),
    )
);