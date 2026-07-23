<?php
/**
 * ACF options and block registration.
 *
 * @package WP_Bootstrap_Starter
 */

defined( 'ABSPATH' ) || exit;

/**
 * Register the ACF options page.
 */
function krizia_register_options_page() {
    if ( ! function_exists( 'acf_add_options_page' ) ) {
        return;
    }

    acf_add_options_page(
        array(
            'page_title' => 'Options du thème',
            'menu_title' => 'Options du thème',
            'menu_slug'  => 'theme-options',
            'capability' => 'edit_posts',
            'redirect'   => false,
        )
    );
}
add_action( 'acf/init', 'krizia_register_options_page' );

/**
 * Register all ACF blocks.
 */
function krizia_register_acf_blocks() {
    if ( ! function_exists( 'acf_register_block_type' ) ) {
        return;
    }

    $blocks = array(
        'hero',
        'studio',
        'private-course',
        'statement',
        'formation',
        'agenda',
        'faq',
        'articles',
        'newsletter',
        'quote-band',
        'team',
    );

    foreach ( $blocks as $block ) {
        $register_file = get_template_directory()
            . '/blocks/'
            . $block
            . '/register.php';

        if ( file_exists( $register_file ) ) {
            require_once $register_file;
        }
    }
}
add_action( 'acf/init', 'krizia_register_acf_blocks' );
