<?php
/**
 * Register Quote Band block.
 *
 * @package Krizia
 */

wp_enqueue_style('krizia-swiper');

wp_register_script(
    'krizia-quote-band-script',
    get_template_directory_uri() . '/blocks/quote-band/script.js',
    array('krizia-swiper'),
    null,
    true
);

register_block_type(
    __DIR__,
    array(
        'script' => 'krizia-quote-band-script',
    )
);