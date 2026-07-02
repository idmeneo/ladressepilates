<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WP_Bootstrap_Starter
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="profile" href="http://gmpg.org/xfn/11">
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<?php 

    // WordPress 5.2 wp_body_open implementation
    if ( function_exists( 'wp_body_open' ) ) {
        wp_body_open();
    } else {
        do_action( 'wp_body_open' );
    }

?>

<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'wp-bootstrap-starter' ); ?></a>
    <?php if(!is_page_template( 'blank-page.php' ) && !is_page_template( 'blank-page-with-container.php' )): ?>
	<header id="masthead" class="site-header navbar-static-top <?php echo wp_bootstrap_starter_bg_class(); ?>" role="banner">
        <div class="container">
            <nav class="navbar navbar-expand-xl p-0">
                <div class="navbar-brand">
                    <?php
                    $krizia_home_logo_uri = get_template_directory_uri() . '/assets/images/logo-white.png';
                    ?>
                    <?php if ( is_front_page() ) : ?>
                        <a href="<?php echo esc_url( home_url( '/' )); ?>" class="krizia-home-logo-link">
                            <img class="krizia-home-logo" src="<?php echo esc_url( $krizia_home_logo_uri ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>">
                        </a>
                    <?php elseif ( get_theme_mod( 'wp_bootstrap_starter_logo' ) ): ?>
                        <a href="<?php echo esc_url( home_url( '/' )); ?>">
                            <img src="<?php echo esc_url(get_theme_mod( 'wp_bootstrap_starter_logo' )); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>">
                        </a>
                    <?php else : ?>
                        <a class="site-title" href="<?php echo esc_url( home_url( '/' )); ?>"><?php esc_url(bloginfo('name')); ?></a>
                    <?php endif; ?>

                </div>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-nav" aria-controls="" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <?php if ( is_front_page() ) : ?>
                    <div id="main-nav" class="collapse navbar-collapse">
                        <ul class="navbar-nav krizia-home-menu">
                            <li class="nav-item"><a class="nav-link" href="#studio"><?php esc_html_e( 'Le studio', 'krizia' ); ?></a></li>
                            <li class="nav-item"><a class="nav-link" href="#cours"><?php esc_html_e( 'Cours privés', 'krizia' ); ?></a></li>
                            <li class="nav-item"><a class="nav-link" href="#formation"><?php esc_html_e( 'Formation continue', 'krizia' ); ?></a></li>
                            <li class="nav-item"><a class="nav-link" href="#reservation"><?php esc_html_e( 'Contact', 'krizia' ); ?></a></li>
                        </ul>
                        <a class="krizia-header-booking" href="#reservation"><?php esc_html_e( 'Réserver', 'krizia' ); ?></a>
                    </div>
                <?php else : ?>
                    <?php
                    wp_nav_menu(array(
                    'theme_location'    => 'primary',
                    'container'       => 'div',
                    'container_id'    => 'main-nav',
                    'container_class' => 'collapse navbar-collapse justify-content-end',
                    'menu_id'         => false,
                    'menu_class'      => 'navbar-nav',
                    'depth'           => 3,
                    'fallback_cb'     => 'wp_bootstrap_navwalker::fallback',
                    'walker'          => new wp_bootstrap_navwalker()
                    ));
                    ?>
                <?php endif; ?>

            </nav>
        </div>
	</header><!-- #masthead -->
    <?php if ( is_front_page() ) : ?>
        <header class="krizia-scroll-header" aria-hidden="true" aria-label="<?php esc_attr_e( 'Navigation principale', 'krizia' ); ?>">
            <div class="container-fluid">
                <nav class="navbar navbar-expand-xl p-0">
                    <a class="krizia-scroll-logo" href="<?php echo esc_url( home_url( '/' ) ); ?>">
                        <span>L&rsquo;Adresse</span>
                        <small>Pilates</small>
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#krizia-scroll-nav" aria-controls="krizia-scroll-nav" aria-expanded="false" aria-label="<?php esc_attr_e( 'Toggle navigation', 'wp-bootstrap-starter' ); ?>">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div id="krizia-scroll-nav" class="collapse navbar-collapse">
                        <ul class="navbar-nav krizia-scroll-menu">
                            <li class="nav-item"><a class="nav-link" href="#studio"><?php esc_html_e( 'Le studio', 'krizia' ); ?></a></li>
                            <li class="nav-item"><a class="nav-link" href="#cours"><?php esc_html_e( 'Cours privés', 'krizia' ); ?></a></li>
                            <li class="nav-item"><a class="nav-link" href="#formation"><?php esc_html_e( 'Formation continue', 'krizia' ); ?></a></li>
                            <li class="nav-item"><a class="nav-link" href="#reservation"><?php esc_html_e( 'Contact', 'krizia' ); ?></a></li>
                        </ul>
                        <a class="krizia-scroll-booking" href="#reservation"><?php esc_html_e( 'Réserver', 'krizia' ); ?></a>
                    </div>
                </nav>
            </div>
        </header>
    <?php endif; ?>
    <?php if(is_front_page() && !get_theme_mod( 'header_banner_visibility' )): ?>
        <div id="page-sub-header" <?php if(has_header_image()) { ?>style="background-image: url('<?php header_image(); ?>');" <?php } ?>>
            <div class="container">
                <h1>
                    <?php
                    if(get_theme_mod( 'header_banner_title_setting' )){
                        echo esc_attr( get_theme_mod( 'header_banner_title_setting' ) );
                    }else{
                        echo 'WordPress + Bootstrap';
                    }
                    ?>
                </h1>
                <p>
                    <?php
                    if(get_theme_mod( 'header_banner_tagline_setting' )){
                        echo esc_attr( get_theme_mod( 'header_banner_tagline_setting' ) );
                }else{
                        echo esc_html__('To customize the contents of this header banner and other elements of your site, go to Dashboard > Appearance > Customize','wp-bootstrap-starter');
                    }
                    ?>
                </p>
                <a href="#content" class="page-scroller"><i class="fa fa-fw fa-angle-down"></i></a>
            </div>
        </div>
    <?php endif; ?>
	<div id="content" class="site-content">
		<div class="container">
			<div class="row">
                <?php endif; ?>
