<?php
/**
 * Theme setup and general WordPress hooks.
 *
 * @package WP_Bootstrap_Starter
 */

defined( 'ABSPATH' ) || exit;

/**
 * Add a JavaScript-enabled class to the document.
 */
function krz_add_js_class() {
    echo "<script>document.documentElement.classList.add('krz-js');</script>\n";
}
add_action( 'wp_head', 'krz_add_js_class', 1 );

if ( ! function_exists( 'wp_bootstrap_starter_setup' ) ) {
    /**
     * Configure theme supports and menus.
     */
    function wp_bootstrap_starter_setup() {
        load_theme_textdomain(
            'wp-bootstrap-starter',
            get_template_directory() . '/languages'
        );

        add_theme_support( 'automatic-feed-links' );
        add_theme_support( 'title-tag' );
        add_theme_support( 'post-thumbnails' );
        add_theme_support( 'customize-selective-refresh-widgets' );

        add_theme_support(
            'html5',
            array(
                'comment-form',
                'comment-list',
                'caption',
            )
        );

        add_theme_support(
            'custom-background',
            apply_filters(
                'wp_bootstrap_starter_custom_background_args',
                array(
                    'default-color' => 'ffffff',
                    'default-image' => '',
                )
            )
        );

        register_nav_menus(
            array(
                'primary' => esc_html__(
                    'Primary',
                    'wp-bootstrap-starter'
                ),
            )
        );

        add_editor_style( 'custom-editor-style.css' );
    }
}
add_action( 'after_setup_theme', 'wp_bootstrap_starter_setup' );

/**
 * Set the theme content width.
 */
function wp_bootstrap_starter_content_width() {
    $GLOBALS['content_width'] = apply_filters(
        'wp_bootstrap_starter_content_width',
        1170
    );
}
add_action( 'after_setup_theme', 'wp_bootstrap_starter_content_width', 0 );

/**
 * Register widget areas.
 */
function wp_bootstrap_starter_widgets_init() {
    $sidebars = array(
        array( 'name' => 'Sidebar', 'id' => 'sidebar-1' ),
        array( 'name' => 'Footer 1', 'id' => 'footer-1' ),
        array( 'name' => 'Footer 2', 'id' => 'footer-2' ),
        array( 'name' => 'Footer 3', 'id' => 'footer-3' ),
    );

    foreach ( $sidebars as $sidebar ) {
        register_sidebar(
            array(
                'name'          => esc_html__( $sidebar['name'], 'wp-bootstrap-starter' ),
                'id'            => $sidebar['id'],
                'description'   => esc_html__( 'Add widgets here.', 'wp-bootstrap-starter' ),
                'before_widget' => '<section id="%1$s" class="widget %2$s">',
                'after_widget'  => '</section>',
                'before_title'  => '<h3 class="widget-title">',
                'after_title'   => '</h3>',
            )
        );
    }
}
add_action( 'widgets_init', 'wp_bootstrap_starter_widgets_init' );

/**
 * Display the original starter-theme notice once.
 */
function wp_bootstrap_starter_reminder() {
    if ( get_option( 'triggered_welcomet' ) ) {
        return;
    }

    $theme_page_url = 'https://afterimagedesigns.com/wp-bootstrap-starter/?dashboard=1';

    $message = sprintf(
        /* translators: %s: starter-theme documentation URL. */
        __(
            'Welcome to WP Bootstrap Starter Theme! Before diving in to your new theme, please visit the <a style="color:#fff;font-weight:bold;" href="%s" target="_blank" rel="noopener noreferrer">theme documentation</a>.',
            'wp-bootstrap-starter'
        ),
        esc_url( $theme_page_url )
    );

    printf(
        '<div class="notice is-dismissible" style="background-color:#6c2eb9;color:#fff;border-left:none;"><p>%s</p></div>',
        wp_kses_post( $message )
    );

    add_option( 'triggered_welcomet', '1', '', 'yes' );
}
add_action( 'admin_notices', 'wp_bootstrap_starter_reminder' );

/**
 * Custom password-protected post form.
 *
 * @return string
 */
function wp_bootstrap_starter_password_form() {
    global $post;

    $label = 'pwbox-' . ( empty( $post->ID ) ? wp_rand() : $post->ID );

    return '<form action="'
        . esc_url( home_url( 'wp-login.php?action=postpass', 'login_post' ) )
        . '" method="post">
        <div class="d-block mb-3">'
        . esc_html__(
            'To view this protected post, enter the password below:',
            'wp-bootstrap-starter'
        )
        . '</div>
        <div class="form-group form-inline">
            <label for="' . esc_attr( $label ) . '" class="mr-2">'
        . esc_html__( 'Password:', 'wp-bootstrap-starter' )
        . '</label>
            <input name="post_password" id="' . esc_attr( $label ) . '" type="password" size="20" maxlength="20" class="form-control mr-2">
            <input type="submit" name="Submit" value="'
        . esc_attr__( 'Submit', 'wp-bootstrap-starter' )
        . '" class="btn btn-primary">
        </div>
    </form>';
}
add_filter( 'the_password_form', 'wp_bootstrap_starter_password_form' );

function krizia_setup() {
    add_theme_support( 'post-thumbnails' );

    add_image_size(
        'krizia-hero',
        1920,
        1080,
        true
    );
}

add_action( 'after_setup_theme', 'krizia_setup' );