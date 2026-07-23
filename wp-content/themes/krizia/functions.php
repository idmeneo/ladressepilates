<?php
/**
 * Krizia theme bootstrap.
 *
 * @package WP_Bootstrap_Starter
 */

defined( 'ABSPATH' ) || exit;

/**
 * Core starter-theme files.
 */
require get_template_directory() . '/inc/custom-header.php';
require get_template_directory() . '/inc/template-tags.php';
require get_template_directory() . '/inc/extras.php';
require get_template_directory() . '/inc/customizer.php';
require get_template_directory() . '/inc/plugin-compatibility/plugin-compatibility.php';

if ( ! class_exists( 'wp_bootstrap_navwalker' ) ) {
    require_once get_template_directory() . '/inc/wp_bootstrap_navwalker.php';
}

/**
 * Krizia modules.
 */
require get_template_directory() . '/inc/krizia/helpers.php';
require get_template_directory() . '/inc/krizia/setup.php';
require get_template_directory() . '/inc/krizia/assets.php';
require get_template_directory() . '/inc/krizia/acf.php';

/**
 * Optional Amelia synchronization.
 */
$krizia_amelia_sync_file = get_template_directory() . '/inc/amelia-sync.php';

if ( file_exists( $krizia_amelia_sync_file ) ) {
    require_once $krizia_amelia_sync_file;
}
