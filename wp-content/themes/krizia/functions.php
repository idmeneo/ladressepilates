<?php
/**
 * WP Bootstrap Starter functions and definitions
 *
 * @package WP_Bootstrap_Starter
 */

/**
 * Indique immédiatement que JavaScript est actif.
 */
function krz_add_js_class() {
    echo "<script>document.documentElement.classList.add('krz-js');</script>\n";
}
add_action('wp_head', 'krz_add_js_class', 1);

if ( ! function_exists( 'wp_bootstrap_starter_setup' ) ) :
function wp_bootstrap_starter_setup() {
    load_theme_textdomain( 'wp-bootstrap-starter', get_template_directory() . '/languages' );

    add_theme_support( 'automatic-feed-links' );
    add_theme_support( 'title-tag' );
    add_theme_support( 'post-thumbnails' );

    register_nav_menus( array(
        'primary' => esc_html__( 'Primary', 'wp-bootstrap-starter' ),
    ) );

    add_theme_support( 'html5', array(
        'comment-form',
        'comment-list',
        'caption',
    ) );

    add_theme_support( 'custom-background', apply_filters( 'wp_bootstrap_starter_custom_background_args', array(
        'default-color' => 'ffffff',
        'default-image' => '',
    ) ) );

    add_theme_support( 'customize-selective-refresh-widgets' );
    add_editor_style( 'custom-editor-style.css' );
}
endif;
add_action( 'after_setup_theme', 'wp_bootstrap_starter_setup' );


function wp_bootstrap_starter_reminder() {
    $theme_page_url = 'https://afterimagedesigns.com/wp-bootstrap-starter/?dashboard=1';

    if ( ! get_option( 'triggered_welcomet' ) ) {
        $message = sprintf(
            __( 'Welcome to WP Bootstrap Starter Theme! Before diving in to your new theme, please visit the <a style="color: #fff; font-weight: bold;" href="%1$s" target="_blank">theme\'s</a> page for access to dozens of tips and in-depth tutorials.', 'wp-bootstrap-starter' ),
            esc_url( $theme_page_url )
        );

        printf(
            '<div class="notice is-dismissible" style="background-color: #6C2EB9; color: #fff; border-left: none;"><p>%1$s</p></div>',
            $message
        );

        add_option( 'triggered_welcomet', '1', '', 'yes' );
    }
}
add_action( 'admin_notices', 'wp_bootstrap_starter_reminder' );


function wp_bootstrap_starter_content_width() {
    $GLOBALS['content_width'] = apply_filters( 'wp_bootstrap_starter_content_width', 1170 );
}
add_action( 'after_setup_theme', 'wp_bootstrap_starter_content_width', 0 );


function wp_bootstrap_starter_widgets_init() {
    $sidebars = array(
        array( 'name' => 'Sidebar', 'id' => 'sidebar-1' ),
        array( 'name' => 'Footer 1', 'id' => 'footer-1' ),
        array( 'name' => 'Footer 2', 'id' => 'footer-2' ),
        array( 'name' => 'Footer 3', 'id' => 'footer-3' ),
    );

    foreach ( $sidebars as $sidebar ) {
        register_sidebar( array(
            'name'          => esc_html__( $sidebar['name'], 'wp-bootstrap-starter' ),
            'id'            => $sidebar['id'],
            'description'   => esc_html__( 'Add widgets here.', 'wp-bootstrap-starter' ),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget'  => '</section>',
            'before_title'  => '<h3 class="widget-title">',
            'after_title'   => '</h3>',
        ) );
    }
}
add_action( 'widgets_init', 'wp_bootstrap_starter_widgets_init' );


function krizia_enqueue_block_styles() {
    $block_styles = glob( get_template_directory() . '/blocks/*/style.css' );

    if ( ! $block_styles ) {
        return;
    }

    foreach ( $block_styles as $style_path ) {
        $block_name = basename( dirname( $style_path ) );

        wp_enqueue_style(
            'krizia-block-' . $block_name,
            get_template_directory_uri() . '/blocks/' . $block_name . '/style.css',
            array( 'wp-bootstrap-starter-style', 'krizia-header', 'krizia-footer' ),
            filemtime( $style_path )
        );
    }
}


function wp_bootstrap_starter_scripts() {
    if ( get_theme_mod( 'cdn_assets_setting' ) === 'yes' ) {
        wp_enqueue_style( 'wp-bootstrap-starter-bootstrap-css', 'https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css' );
        wp_enqueue_style( 'wp-bootstrap-starter-fontawesome-cdn', 'https://use.fontawesome.com/releases/v5.15.1/css/all.css' );
    } else {
        wp_enqueue_style( 'wp-bootstrap-starter-bootstrap-css', get_template_directory_uri() . '/inc/assets/css/bootstrap.min.css' );
        wp_enqueue_style( 'wp-bootstrap-starter-fontawesome-cdn', get_template_directory_uri() . '/inc/assets/css/fontawesome.min.css' );
    }

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
        filemtime( get_stylesheet_directory() . '/style.css' )
    );

    wp_enqueue_script(
        'krizia-gsap',
        'https://cdn.jsdelivr.net/npm/gsap@3.13.0/dist/gsap.min.js',
        array(),
        '3.13.0',
        true
    );

    wp_enqueue_script(
        'krizia-scroll-trigger',
        'https://cdn.jsdelivr.net/npm/gsap@3.13.0/dist/ScrollTrigger.min.js',
        array( 'krizia-gsap' ),
        '3.13.0',
        true
    );

    wp_enqueue_script(
        'krizia-split-text',
        'https://cdn.jsdelivr.net/npm/gsap@3.13.0/dist/SplitText.min.js',
        array( 'krizia-gsap' ),
        '3.13.0',
        true
    );

    wp_enqueue_script(
        'krizia-animations',
        get_template_directory_uri() . '/assets/js/krz-animations.js',
        array(
            'krizia-gsap',
            'krizia-scroll-trigger',
            'krizia-split-text',
        ),
        filemtime(
            get_template_directory() .
            '/assets/js/krz-animations.js'
        ),
        true
    );

    wp_enqueue_script(
        'krizia-animations',
        get_template_directory_uri() . '/assets/js/krz-animations.js',
        array(),
        filemtime( get_template_directory() . '/assets/js/krz-animations.js' ),
        true
    );

    wp_enqueue_style(
        'krizia-header',
        get_template_directory_uri() . '/assets/css/header.css',
        array( 'wp-bootstrap-starter-style' ),
        filemtime( get_template_directory() . '/assets/css/header.css' )
    );

    wp_enqueue_style(
        'krizia-footer',
        get_template_directory_uri() . '/assets/css/footer.css',
        array('krizia-header'),
        filemtime(get_template_directory() . '/assets/css/footer.css')
    );

    if (is_single()) {
        wp_enqueue_style(
            'krizia-single',
            get_template_directory_uri() . '/assets/css/single.css',
            array('krizia-header', 'krizia-footer'),
            filemtime(get_template_directory() . '/assets/css/single.css')
        );

        wp_enqueue_style(
            'krizia-swiper',
            'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css',
            array(),
            '11.1.14'
        );

        wp_enqueue_script(
            'krizia-swiper',
            'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js',
            array(),
            '11.1.14',
            true
        );

        wp_enqueue_script(
            'krizia-articles',
            get_template_directory_uri() . '/blocks/articles/script.js',
            array('krizia-swiper'),
            filemtime(get_template_directory() . '/blocks/articles/script.js'),
            true
        );
    }

    if ( get_theme_mod( 'theme_option_setting' ) && get_theme_mod( 'theme_option_setting' ) !== 'default' ) {
        wp_enqueue_style(
            'wp-bootstrap-starter-' . get_theme_mod( 'theme_option_setting' ),
            get_template_directory_uri() . '/inc/assets/css/presets/theme-option/' . get_theme_mod( 'theme_option_setting' ) . '.css',
            array( 'krizia-header' ),
            null
        );
    }

    if ( get_theme_mod( 'preset_style_setting' ) === 'poppins-lora' ) {
        wp_enqueue_style( 'wp-bootstrap-starter-poppins-lora-font', 'https://fonts.googleapis.com/css?family=Lora:400,400i,700,700i|Poppins:300,400,500,600,700' );
    }

    if ( get_theme_mod( 'preset_style_setting' ) === 'montserrat-merriweather' ) {
        wp_enqueue_style( 'wp-bootstrap-starter-montserrat-merriweather-font', 'https://fonts.googleapis.com/css?family=Merriweather:300,400,400i,700,900|Montserrat:300,400,400i,500,700,800' );
    }

    if ( get_theme_mod( 'preset_style_setting' ) === 'poppins-poppins' ) {
        wp_enqueue_style( 'wp-bootstrap-starter-poppins-font', 'https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700' );
    }

    if ( get_theme_mod( 'preset_style_setting' ) === 'roboto-roboto' ) {
        wp_enqueue_style( 'wp-bootstrap-starter-roboto-font', 'https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i,900,900i' );
    }

    if ( get_theme_mod( 'preset_style_setting' ) === 'arbutusslab-opensans' ) {
        wp_enqueue_style( 'wp-bootstrap-starter-arbutusslab-opensans-font', 'https://fonts.googleapis.com/css?family=Arbutus+Slab|Open+Sans:300,300i,400,400i,600,600i,700,800' );
    }

    if ( get_theme_mod( 'preset_style_setting' ) === 'oswald-muli' ) {
        wp_enqueue_style( 'wp-bootstrap-starter-oswald-muli-font', 'https://fonts.googleapis.com/css?family=Muli:300,400,600,700,800|Oswald:300,400,500,600,700' );
    }

    if ( get_theme_mod( 'preset_style_setting' ) === 'montserrat-opensans' ) {
        wp_enqueue_style( 'wp-bootstrap-starter-montserrat-opensans-font', 'https://fonts.googleapis.com/css?family=Montserrat|Open+Sans:300,300i,400,400i,600,600i,700,800' );
    }

    if ( get_theme_mod( 'preset_style_setting' ) === 'robotoslab-roboto' ) {
        wp_enqueue_style( 'wp-bootstrap-starter-robotoslab-roboto', 'https://fonts.googleapis.com/css?family=Roboto+Slab:100,300,400,700|Roboto:300,300i,400,400i,500,700,700i' );
    }

    if ( get_theme_mod( 'preset_style_setting' ) && get_theme_mod( 'preset_style_setting' ) !== 'default' ) {
        wp_enqueue_style(
            'wp-bootstrap-starter-' . get_theme_mod( 'preset_style_setting' ),
            get_template_directory_uri() . '/inc/assets/css/presets/typography/' . get_theme_mod( 'preset_style_setting' ) . '.css',
            array( 'krizia-header' ),
            null
        );
    }

    wp_enqueue_script( 'jquery' );

    wp_enqueue_script(
        'html5hiv',
        get_template_directory_uri() . '/inc/assets/js/html5.js',
        array(),
        '3.7.0',
        false
    );
    wp_script_add_data( 'html5hiv', 'conditional', 'lt IE 9' );

    if ( get_theme_mod( 'cdn_assets_setting' ) === 'yes' ) {
        wp_enqueue_script( 'wp-bootstrap-starter-popper', 'https://cdn.jsdelivr.net/npm/popper.js@1/dist/umd/popper.min.js', array(), null, true );
        wp_enqueue_script( 'wp-bootstrap-starter-bootstrapjs', 'https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js', array(), null, true );
    } else {
        wp_enqueue_script( 'wp-bootstrap-starter-popper', get_template_directory_uri() . '/inc/assets/js/popper.min.js', array(), null, true );
        wp_enqueue_script( 'wp-bootstrap-starter-bootstrapjs', get_template_directory_uri() . '/inc/assets/js/bootstrap.min.js', array(), null, true );
    }

    wp_enqueue_script( 'wp-bootstrap-starter-themejs', get_template_directory_uri() . '/inc/assets/js/theme-script.min.js', array(), null, true );
    wp_enqueue_script( 'wp-bootstrap-starter-skip-link-focus-fix', get_template_directory_uri() . '/inc/assets/js/skip-link-focus-fix.min.js', array(), '20151215', true );

    if ( is_front_page() ) {
        wp_enqueue_style( 'krizia-swiper', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css', array(), '11.1.14' );
        wp_enqueue_script( 'krizia-swiper', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js', array(), '11.1.14', true );

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

                    body.classList.toggle('krizia-scroll-header-visible', shouldShow);
                    scrollHeader.setAttribute('aria-hidden', shouldShow ? 'false' : 'true');
                }

                updateScrollHeader();
                window.addEventListener('scroll', updateScrollHeader, { passive: true });
                window.addEventListener('resize', updateScrollHeader);
            })();"
        );
    }

    krizia_enqueue_block_styles();

    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
}
add_action( 'wp_enqueue_scripts', 'wp_bootstrap_starter_scripts' );


function wp_bootstrap_starter_preload( $hints, $relation_type ) {
    if ( 'preconnect' === $relation_type && get_theme_mod( 'cdn_assets_setting' ) === 'yes' ) {
        $hints[] = array(
            'href'        => 'https://cdn.jsdelivr.net/',
            'crossorigin' => 'anonymous',
        );

        $hints[] = array(
            'href'        => 'https://use.fontawesome.com/',
            'crossorigin' => 'anonymous',
        );
    }

    return $hints;
}
add_filter( 'wp_resource_hints', 'wp_bootstrap_starter_preload', 10, 2 );


function wp_bootstrap_starter_password_form() {
    global $post;

    $label = 'pwbox-' . ( empty( $post->ID ) ? rand() : $post->ID );

    $output = '<form action="' . esc_url( home_url( 'wp-login.php?action=postpass', 'login_post' ) ) . '" method="post">
        <div class="d-block mb-3">' . __( 'To view this protected post, enter the password below:', 'wp-bootstrap-starter' ) . '</div>
        <div class="form-group form-inline">
            <label for="' . esc_attr( $label ) . '" class="mr-2">' . __( 'Password:', 'wp-bootstrap-starter' ) . '</label>
            <input name="post_password" id="' . esc_attr( $label ) . '" type="password" size="20" maxlength="20" class="form-control mr-2" />
            <input type="submit" name="Submit" value="' . esc_attr__( 'Submit', 'wp-bootstrap-starter' ) . '" class="btn btn-primary" />
        </div>
    </form>';

    return $output;
}
add_filter( 'the_password_form', 'wp_bootstrap_starter_password_form' );


require get_template_directory() . '/inc/custom-header.php';
require get_template_directory() . '/inc/template-tags.php';
require get_template_directory() . '/inc/extras.php';
require get_template_directory() . '/inc/customizer.php';
require get_template_directory() . '/inc/plugin-compatibility/plugin-compatibility.php';

if ( ! class_exists( 'wp_bootstrap_navwalker' ) ) {
    require_once get_template_directory() . '/inc/wp_bootstrap_navwalker.php';
}

$amelia_sync_file = get_template_directory() . '/inc/amelia-sync.php';

if (file_exists($amelia_sync_file)) {
    require_once $amelia_sync_file;
}


add_action( 'acf/init', function () {
    if ( function_exists( 'acf_add_options_page' ) ) {
        acf_add_options_page( array(
            'page_title' => 'Options du thème',
            'menu_title' => 'Options du thème',
            'menu_slug'  => 'theme-options',
            'capability' => 'edit_posts',
            'redirect'   => false,
        ) );
    }
} );


function krizia_get_option( $field, $default = '' ) {
    if ( ! function_exists( 'get_field' ) ) {
        return $default;
    }

    $value = get_field( $field, 'option' );

    return $value !== null && $value !== false && $value !== '' ? $value : $default;
}


function krizia_get_link_url( $link, $default = '#' ) {
    return is_array( $link ) && ! empty( $link['url'] ) ? $link['url'] : $default;
}


function krizia_get_link_target( $link ) {
    return is_array( $link ) && ! empty( $link['target'] ) ? $link['target'] : '_self';
}


function krizia_register_acf_blocks() {
    if ( ! function_exists( 'acf_register_block_type' ) ) {
        return;
    }

    $blocks = array(
        'hero',
        'studio',
        'private-course',
        'private-formula',
        "statement",
        "formation",
        "agenda",
        "faq",
        "articles",
        "newsletter",
        "quote-band",
        "contact",
        "team",
    );

    foreach ( $blocks as $block ) {
        $register_file = get_template_directory() . '/blocks/' . $block . '/register.php';

        if ( file_exists( $register_file ) ) {
            require_once $register_file;
        }
    }
}
add_action( 'acf/init', 'krizia_register_acf_blocks' );

function krizia_editor_assets() {

    wp_enqueue_script(
        'krizia-animations-editor',
        get_template_directory_uri() . '/assets/js/krz-animations.js',
        array(),
        filemtime( get_template_directory() . '/assets/js/krz-animations.js' ),
        true
    );
}

add_action(
    'enqueue_block_editor_assets',
    'krizia_editor_assets'
);