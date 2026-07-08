<?php
/**
 * Register Private Formula block.
 *
 * @package Krizia
 */

if (!function_exists('acf_register_block_type')) {
    return;
}

acf_register_block_type([
    'name'            => 'krizia-private-formula',
    'title'           => __('Formules privées', 'krizia'),
    'description'     => __('Cartes de formules avec slider mobile.', 'krizia'),
    'category'        => 'formatting',
    'icon'            => 'tickets-alt',
    'keywords'        => ['formules', 'cours', 'tarifs'],
    'render_template' => get_template_directory() . '/blocks/private-formula/template.php',
    'mode'            => 'preview',
    'supports'        => [
        'align'  => false,
        'anchor' => true,
        'jsx'    => true,
    ],
    'enqueue_assets'  => function () {
        wp_enqueue_style(
            'krizia-swiper',
            'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css',
            [],
            '11.1.14'
        );

        wp_enqueue_script(
            'krizia-swiper',
            'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js',
            [],
            '11.1.14',
            true
        );

        wp_enqueue_script(
            'krizia-private-formula',
            get_template_directory_uri() . '/blocks/private-formula/script.js',
            ['krizia-swiper'],
            filemtime(get_template_directory() . '/blocks/private-formula/script.js'),
            true
        );
    },
]);