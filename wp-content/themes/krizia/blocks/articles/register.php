<?php
/**
 * Register Articles block.
 *
 * @package Krizia
 */

wp_register_script(
    'krizia-articles-script',
    get_template_directory_uri() . '/blocks/articles/script.js',
    array('krizia-swiper'),
    null,
    true
);

register_block_type(
    __DIR__,
    array(
        'script' => 'krizia-articles-script',
    )
);