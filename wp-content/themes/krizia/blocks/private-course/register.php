<?php
/**
 * Register Private Course block.
 *
 * @package Krizia
 */

wp_enqueue_style('krizia-swiper');

wp_register_script(
    'krizia-private-course-script',
    get_template_directory_uri() . '/blocks/private-course/script.js',
    array('krizia-swiper'),
    null,
    true
);

register_block_type(
    __DIR__,
    array(
        'script' => 'krizia-private-course-script',
    )
);