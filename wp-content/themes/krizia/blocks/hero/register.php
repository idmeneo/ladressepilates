<?php
/**
 * Register Hero block.
 *
 * @package Krizia
 */

if (!function_exists('acf_register_block_type')) {
    return;
}

acf_register_block_type([
    'name'              => 'krizia-hero',
    'title'             => __('Hero', 'krizia'),
    'description'       => __('Section hero de la page d’accueil.', 'krizia'),
    'category'          => 'formatting',
    'icon'              => 'cover-image',
    'keywords'          => ['hero', 'accueil', 'bannière'],
    'render_template'   => get_template_directory() . '/blocks/hero/template.php',
    'enqueue_style'     => get_template_directory_uri() . '/blocks/hero/style.css',
    'enqueue_script'    => get_template_directory_uri() . '/blocks/hero/script.js',
    'enqueue_assets'    => static function () {
        wp_enqueue_style(
            'animate-css',
            'https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css',
            [],
            '4.1.1'
        );
    },
    'mode'              => 'preview',
    'supports'          => [
        'align'  => false,
        'anchor' => true,
    ],
]);