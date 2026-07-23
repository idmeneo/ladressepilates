<?php
/**
 * Front-end and editor assets.
 *
 * @package WP_Bootstrap_Starter
 */

defined( 'ABSPATH' ) || exit;

/**
 * Register reusable vendor assets without loading them globally.
 */
function krizia_register_vendor_assets() {
    wp_register_style(
        'krizia-swiper',
        'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css',
        array(),
        '11.1.14'
    );

    wp_register_script(
        'krizia-swiper',
        'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js',
        array(),
        '11.1.14',
        true
    );

    wp_register_script(
        'krizia-gsap',
        'https://cdn.jsdelivr.net/npm/gsap@3.13.0/dist/gsap.min.js',
        array(),
        '3.13.0',
        true
    );

    wp_register_script(
        'krizia-scroll-trigger',
        'https://cdn.jsdelivr.net/npm/gsap@3.13.0/dist/ScrollTrigger.min.js',
        array( 'krizia-gsap' ),
        '3.13.0',
        true
    );

    wp_register_script(
        'krizia-split-text',
        'https://cdn.jsdelivr.net/npm/gsap@3.13.0/dist/SplitText.min.js',
        array( 'krizia-gsap' ),
        '3.13.0',
        true
    );
}
add_action( 'wp_enqueue_scripts', 'krizia_register_vendor_assets', 1 );

/**
 * Enqueue Bootstrap and Font Awesome.
 */
function krizia_enqueue_framework_assets() {
    $use_cdn = 'yes' === get_theme_mod( 'cdn_assets_setting' );

    if ( $use_cdn ) {
        wp_enqueue_style(
            'wp-bootstrap-starter-bootstrap-css',
            'https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css',
            array(),
            '4.5.3'
        );

        wp_enqueue_style(
            'wp-bootstrap-starter-fontawesome-cdn',
            'https://use.fontawesome.com/releases/v5.15.1/css/all.css',
            array(),
            '5.15.1'
        );

        wp_enqueue_script(
            'wp-bootstrap-starter-popper',
            'https://cdn.jsdelivr.net/npm/popper.js@1/dist/umd/popper.min.js',
            array(),
            '1',
            true
        );

        wp_enqueue_script(
            'wp-bootstrap-starter-bootstrapjs',
            'https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js',
            array( 'jquery', 'wp-bootstrap-starter-popper' ),
            '4.5.3',
            true
        );

        return;
    }

    wp_enqueue_style(
        'wp-bootstrap-starter-bootstrap-css',
        get_template_directory_uri() . '/inc/assets/css/bootstrap.min.css',
        array(),
        krizia_asset_version( 'inc/assets/css/bootstrap.min.css' )
    );

    wp_enqueue_style(
        'wp-bootstrap-starter-fontawesome-cdn',
        get_template_directory_uri() . '/inc/assets/css/fontawesome.min.css',
        array(),
        krizia_asset_version( 'inc/assets/css/fontawesome.min.css' )
    );

    wp_enqueue_script(
        'wp-bootstrap-starter-popper',
        get_template_directory_uri() . '/inc/assets/js/popper.min.js',
        array(),
        krizia_asset_version( 'inc/assets/js/popper.min.js' ),
        true
    );

    wp_enqueue_script(
        'wp-bootstrap-starter-bootstrapjs',
        get_template_directory_uri() . '/inc/assets/js/bootstrap.min.js',
        array( 'jquery', 'wp-bootstrap-starter-popper' ),
        krizia_asset_version( 'inc/assets/js/bootstrap.min.js' ),
        true
    );
}

/**
 * Enqueue global theme styles.
 */
function krizia_enqueue_global_styles() {
    wp_enqueue_style(
        'krizia-google-fonts',
        'https://fonts.googleapis.com/css2?family=Manrope:wght@300;400;500;600;700&family=Spectral:wght@200;400;500;600;700&display=swap',
        array(),
        null
    );

    wp_enqueue_style(
        'wp-bootstrap-starter-style',
        get_stylesheet_uri(),
        array( 'wp-bootstrap-starter-bootstrap-css' ),
        file_exists( get_stylesheet_directory() . '/style.css' )
            ? (string) filemtime( get_stylesheet_directory() . '/style.css' )
            : null
    );

    wp_enqueue_style(
        'krizia-header',
        get_template_directory_uri() . '/assets/css/header.css',
        array( 'wp-bootstrap-starter-style' ),
        krizia_asset_version( 'assets/css/header.css' )
    );

    wp_enqueue_style(
        'krizia-footer',
        get_template_directory_uri() . '/assets/css/footer.css',
        array( 'krizia-header' ),
        krizia_asset_version( 'assets/css/footer.css' )
    );

    if ( is_single() ) {
        wp_enqueue_style(
            'krizia-single',
            get_template_directory_uri() . '/assets/css/single.css',
            array( 'krizia-header', 'krizia-footer' ),
            krizia_asset_version( 'assets/css/single.css' )
        );
    }
}

/**
 * Enqueue optional starter-theme presets.
 */
function krizia_enqueue_theme_presets() {
    $theme_option = get_theme_mod( 'theme_option_setting' );

    if ( $theme_option && 'default' !== $theme_option ) {
        wp_enqueue_style(
            'wp-bootstrap-starter-theme-option-' . sanitize_key( $theme_option ),
            get_template_directory_uri()
                . '/inc/assets/css/presets/theme-option/'
                . rawurlencode( $theme_option )
                . '.css',
            array( 'krizia-header' ),
            null
        );
    }

    $font_presets = array(
        'poppins-lora' => array(
            'handle' => 'wp-bootstrap-starter-poppins-lora-font',
            'url'    => 'https://fonts.googleapis.com/css?family=Lora:400,400i,700,700i|Poppins:300,400,500,600,700',
        ),
        'montserrat-merriweather' => array(
            'handle' => 'wp-bootstrap-starter-montserrat-merriweather-font',
            'url'    => 'https://fonts.googleapis.com/css?family=Merriweather:300,400,400i,700,900|Montserrat:300,400,400i,500,700,800',
        ),
        'poppins-poppins' => array(
            'handle' => 'wp-bootstrap-starter-poppins-font',
            'url'    => 'https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700',
        ),
        'roboto-roboto' => array(
            'handle' => 'wp-bootstrap-starter-roboto-font',
            'url'    => 'https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i,900,900i',
        ),
        'arbutusslab-opensans' => array(
            'handle' => 'wp-bootstrap-starter-arbutusslab-opensans-font',
            'url'    => 'https://fonts.googleapis.com/css?family=Arbutus+Slab|Open+Sans:300,300i,400,400i,600,600i,700,800',
        ),
        'oswald-muli' => array(
            'handle' => 'wp-bootstrap-starter-oswald-muli-font',
            'url'    => 'https://fonts.googleapis.com/css?family=Muli:300,400,600,700,800|Oswald:300,400,500,600,700',
        ),
        'montserrat-opensans' => array(
            'handle' => 'wp-bootstrap-starter-montserrat-opensans-font',
            'url'    => 'https://fonts.googleapis.com/css?family=Montserrat|Open+Sans:300,300i,400,400i,600,600i,700,800',
        ),
        'robotoslab-roboto' => array(
            'handle' => 'wp-bootstrap-starter-robotoslab-roboto',
            'url'    => 'https://fonts.googleapis.com/css?family=Roboto+Slab:100,300,400,700|Roboto:300,300i,400,400i,500,700,700i',
        ),
    );

    $font_preset = get_theme_mod( 'preset_style_setting' );

    if ( isset( $font_presets[ $font_preset ] ) ) {
        wp_enqueue_style(
            $font_presets[ $font_preset ]['handle'],
            $font_presets[ $font_preset ]['url'],
            array(),
            null
        );
    }

    if ( $font_preset && 'default' !== $font_preset ) {
        wp_enqueue_style(
            'wp-bootstrap-starter-typography-' . sanitize_key( $font_preset ),
            get_template_directory_uri()
                . '/inc/assets/css/presets/typography/'
                . rawurlencode( $font_preset )
                . '.css',
            array( 'krizia-header' ),
            null
        );
    }
}

/**
 * Enqueue global theme scripts.
 */
function krizia_enqueue_global_scripts() {
    wp_enqueue_script( 'jquery' );

    wp_enqueue_script(
        'krizia-animations',
        get_template_directory_uri() . '/assets/js/krz-animations.js',
        array(
            'krizia-gsap',
            'krizia-scroll-trigger',
            'krizia-split-text',
        ),
        krizia_asset_version( 'assets/js/krz-animations.js' ),
        true
    );

    wp_enqueue_script(
        'html5hiv',
        get_template_directory_uri() . '/inc/assets/js/html5.js',
        array(),
        '3.7.0',
        false
    );
    wp_script_add_data( 'html5hiv', 'conditional', 'lt IE 9' );

    wp_enqueue_script(
        'wp-bootstrap-starter-themejs',
        get_template_directory_uri() . '/inc/assets/js/theme-script.min.js',
        array( 'jquery', 'wp-bootstrap-starter-bootstrapjs' ),
        krizia_asset_version( 'inc/assets/js/theme-script.min.js' ),
        true
    );

    wp_enqueue_script(
        'wp-bootstrap-starter-skip-link-focus-fix',
        get_template_directory_uri() . '/inc/assets/js/skip-link-focus-fix.min.js',
        array(),
        '20151215',
        true
    );

    if ( is_front_page() ) {
        krizia_add_scroll_header_script();
    }

    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
}

/**
 * Add the homepage sticky-header behavior.
 */
function krizia_add_scroll_header_script() {
    wp_add_inline_script(
        'wp-bootstrap-starter-themejs',
        "(function(){
            var hero = document.querySelector('.krz-hero, .kf-hero');
            var scrollHeader = document.querySelector('.krizia-scroll-header');
            var body = document.body;

            if (!hero || !scrollHeader || !body) {
                return;
            }

            function updateScrollHeader() {
                var triggerPoint = hero.offsetTop + hero.offsetHeight - 24;
                var shouldShow = window.scrollY >= triggerPoint;

                body.classList.toggle(
                    'krizia-scroll-header-visible',
                    shouldShow
                );

                scrollHeader.setAttribute(
                    'aria-hidden',
                    shouldShow ? 'false' : 'true'
                );
            }

            updateScrollHeader();
            window.addEventListener('scroll', updateScrollHeader, { passive: true });
            window.addEventListener('resize', updateScrollHeader);
        })();"
    );
}

/**
 * Main front-end asset dispatcher.
 */
function wp_bootstrap_starter_scripts() {
    krizia_enqueue_framework_assets();
    krizia_enqueue_global_styles();
    krizia_enqueue_theme_presets();
    krizia_enqueue_global_scripts();
}
add_action( 'wp_enqueue_scripts', 'wp_bootstrap_starter_scripts', 10 );

/**
 * Add useful connection hints for external assets.
 *
 * @param array  $hints         Existing hints.
 * @param string $relation_type Resource-hint type.
 * @return array
 */
function wp_bootstrap_starter_preload( $hints, $relation_type ) {
    if ( 'preconnect' !== $relation_type ) {
        return $hints;
    }

    $hints[] = array(
        'href'        => 'https://fonts.googleapis.com',
        'crossorigin' => 'anonymous',
    );

    $hints[] = array(
        'href'        => 'https://fonts.gstatic.com',
        'crossorigin' => 'anonymous',
    );

    $hints[] = array(
        'href'        => 'https://cdn.jsdelivr.net',
        'crossorigin' => 'anonymous',
    );

    if ( 'yes' === get_theme_mod( 'cdn_assets_setting' ) ) {
        $hints[] = array(
            'href'        => 'https://use.fontawesome.com',
            'crossorigin' => 'anonymous',
        );
    }

    return $hints;
}
add_filter( 'wp_resource_hints', 'wp_bootstrap_starter_preload', 10, 2 );

/**
 * Load the animation engine in the block editor.
 */
function krizia_editor_assets() {
    krizia_register_vendor_assets();

    wp_enqueue_script(
        'krizia-animations-editor',
        get_template_directory_uri() . '/assets/js/krz-animations.js',
        array(
            'krizia-gsap',
            'krizia-scroll-trigger',
            'krizia-split-text',
        ),
        krizia_asset_version( 'assets/js/krz-animations.js' ),
        true
    );
}
add_action( 'enqueue_block_editor_assets', 'krizia_editor_assets' );
