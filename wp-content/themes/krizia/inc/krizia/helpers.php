<?php
/**
 * Shared Krizia helper functions.
 *
 * @package WP_Bootstrap_Starter
 */

defined( 'ABSPATH' ) || exit;

/**
 * Return a file modification time for cache busting.
 *
 * @param string $relative_path Path relative to the theme directory.
 * @return string|null
 */
function krizia_asset_version( $relative_path ) {
    $path = get_template_directory() . '/' . ltrim( $relative_path, '/' );

    return file_exists( $path ) ? (string) filemtime( $path ) : null;
}

/**
 * Read a value from the ACF options page.
 *
 * @param string $field   Field name.
 * @param mixed  $default Default value.
 * @return mixed
 */
function krizia_get_option( $field, $default = '' ) {
    if ( ! function_exists( 'get_field' ) ) {
        return $default;
    }

    $value = get_field( $field, 'option' );

    return null !== $value && false !== $value && '' !== $value
        ? $value
        : $default;
}

/**
 * Read a URL from an ACF Link field.
 *
 * @param mixed  $link    ACF Link value.
 * @param string $default Default URL.
 * @return string
 */
function krizia_get_link_url( $link, $default = '#' ) {
    return is_array( $link ) && ! empty( $link['url'] )
        ? $link['url']
        : $default;
}

/**
 * Read a target from an ACF Link field.
 *
 * @param mixed $link ACF Link value.
 * @return string
 */
function krizia_get_link_target( $link ) {
    return is_array( $link ) && ! empty( $link['target'] )
        ? $link['target']
        : '_self';
}

/**
 * Enqueue a block stylesheet.
 *
 * @param string $block_name Block directory name.
 */
function krizia_enqueue_block_style( $block_name ) {
    $block_name   = sanitize_key( $block_name );
    $relative_path = 'blocks/' . $block_name . '/style.css';
    $absolute_path = get_template_directory() . '/' . $relative_path;

    if ( ! file_exists( $absolute_path ) ) {
        return;
    }

    wp_enqueue_style(
        'krizia-block-' . $block_name,
        get_template_directory_uri() . '/' . $relative_path,
        array(
            'wp-bootstrap-starter-style',
            'krizia-header',
            'krizia-footer',
        ),
        krizia_asset_version( $relative_path )
    );
}

/**
 * Enqueue a block script.
 *
 * @param string $block_name   Block directory name.
 * @param array  $dependencies Script dependencies.
 */
function krizia_enqueue_block_script( $block_name, $dependencies = array() ) {
    $block_name    = sanitize_key( $block_name );
    $relative_path = 'blocks/' . $block_name . '/script.js';
    $absolute_path = get_template_directory() . '/' . $relative_path;

    if ( ! file_exists( $absolute_path ) ) {
        return;
    }

    wp_enqueue_script(
        'krizia-block-' . $block_name,
        get_template_directory_uri() . '/' . $relative_path,
        $dependencies,
        krizia_asset_version( $relative_path ),
        true
    );
}
