<?php
/**
 * The header for our theme
 *
 * @package WP_Bootstrap_Starter
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<?php
if (function_exists('wp_body_open')) {
    wp_body_open();
} else {
    do_action('wp_body_open');
}
?>

<div id="page" class="site">
    <a class="skip-link screen-reader-text" href="#content">
        <?php esc_html_e('Skip to content', 'wp-bootstrap-starter'); ?>
    </a>

    <?php if (!is_page_template('blank-page.php') && !is_page_template('blank-page-with-container.php')) : ?>

        <header id="masthead" class="site-header navbar-static-top <?php echo esc_attr(wp_bootstrap_starter_bg_class()); ?>" role="banner">
            <div class="container">
                <nav class="navbar navbar-expand-xl p-0">
                    <div class="navbar-brand">
                        <?php
                        $krizia_home_logo_uri      = get_template_directory_uri() . '/assets/images/logo-white.png';
                        $krizia_home_logo_dark_uri = get_template_directory_uri() . '/assets/images/logo-brown.png';

                        $krizia_home_logo_white = krizia_get_option('header_home_logo_white', $krizia_home_logo_uri);
                        $krizia_home_logo_brown = krizia_get_option('header_home_logo_brown', $krizia_home_logo_dark_uri);

                        $krizia_home_button_show  = krizia_get_option('header_home_button_show', true);
                        $krizia_home_button_text  = krizia_get_option('header_home_button_text', 'Réserver');
                        $krizia_home_button_link  = krizia_get_option('header_home_button_link');
                        $krizia_home_button_url   = krizia_get_link_url($krizia_home_button_link, '#reservation');
                        $krizia_home_button_target = krizia_get_link_target($krizia_home_button_link);

                        $krizia_scroll_logo_line_1 = krizia_get_option('header_scroll_logo_line_1', 'L’Adresse');
                        $krizia_scroll_logo_line_2 = krizia_get_option('header_scroll_logo_line_2', 'Pilates');

                        $krizia_scroll_button_show  = krizia_get_option('header_scroll_button_show', true);
                        $krizia_scroll_button_text  = krizia_get_option('header_scroll_button_text', 'Réserver');
                        $krizia_scroll_button_link  = krizia_get_option('header_scroll_button_link');
                        $krizia_scroll_button_url   = krizia_get_link_url($krizia_scroll_button_link, '#reservation');
                        $krizia_scroll_button_target = krizia_get_link_target($krizia_scroll_button_link);
                        ?>

                        <?php if (is_front_page()) : ?>
                            <a href="<?php echo esc_url(home_url('/')); ?>" class="krizia-home-logo-link">
                                <img class="krizia-home-logo krizia-home-logo--white" src="<?php echo esc_url($krizia_home_logo_white); ?>" alt="<?php echo esc_attr(get_bloginfo('name')); ?>">
                                <img class="krizia-home-logo krizia-home-logo--brown" src="<?php echo esc_url($krizia_home_logo_brown); ?>" alt="" aria-hidden="true">
                            </a>
                        <?php elseif (get_theme_mod('wp_bootstrap_starter_logo')) : ?>
                            <a href="<?php echo esc_url(home_url('/')); ?>">
                                <img src="<?php echo esc_url(get_theme_mod('wp_bootstrap_starter_logo')); ?>" alt="<?php echo esc_attr(get_bloginfo('name')); ?>">
                            </a>
                        <?php else : ?>
                            <a class="site-title" href="<?php echo esc_url(home_url('/')); ?>">
                                <?php bloginfo('name'); ?>
                            </a>
                        <?php endif; ?>
                    </div>

                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-nav" aria-controls="main-nav" aria-expanded="false" aria-label="<?php esc_attr_e('Toggle navigation', 'wp-bootstrap-starter'); ?>">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <?php if (is_front_page() && $krizia_home_button_show) : ?>
                        <a class="krizia-mobile-booking" href="<?php echo esc_url($krizia_home_button_url); ?>" target="<?php echo esc_attr($krizia_home_button_target); ?>">
                            <?php echo esc_html($krizia_home_button_text); ?>
                        </a>
                    <?php endif; ?>

                    <?php if (is_front_page()) : ?>
                        <div id="main-nav" class="collapse navbar-collapse">
                            <ul class="navbar-nav krizia-home-menu">
                                <li class="nav-item"><a class="nav-link" href="#studio"><?php esc_html_e('Le studio', 'krizia'); ?></a></li>
                                <li class="nav-item"><a class="nav-link" href="#cours"><?php esc_html_e('Cours privés', 'krizia'); ?></a></li>
                                <li class="nav-item"><a class="nav-link" href="#formation"><?php esc_html_e('Formation continue', 'krizia'); ?></a></li>
                                <li class="nav-item"><a class="nav-link" href="#reservation"><?php esc_html_e('Contact', 'krizia'); ?></a></li>
                            </ul>

                            <?php if ($krizia_home_button_show) : ?>
                                <a class="krizia-header-booking" href="<?php echo esc_url($krizia_home_button_url); ?>" target="<?php echo esc_attr($krizia_home_button_target); ?>">
                                    <?php echo esc_html($krizia_home_button_text); ?>
                                </a>
                            <?php endif; ?>
                        </div>
                    <?php else : ?>
                        <?php
                        wp_nav_menu([
                            'theme_location'  => 'primary',
                            'container'       => 'div',
                            'container_id'    => 'main-nav',
                            'container_class' => 'collapse navbar-collapse justify-content-end',
                            'menu_id'         => false,
                            'menu_class'      => 'navbar-nav',
                            'depth'           => 3,
                            'fallback_cb'     => 'wp_bootstrap_navwalker::fallback',
                            'walker'          => new wp_bootstrap_navwalker(),
                        ]);
                        ?>
                    <?php endif; ?>
                </nav>
            </div>
        </header>

        <?php if (is_front_page()) : ?>
            <header class="krizia-scroll-header" aria-hidden="true" aria-label="<?php esc_attr_e('Navigation principale', 'krizia'); ?>">
                <div class="container-fluid">
                    <nav class="navbar navbar-expand-xl p-0">
                        <a class="krizia-scroll-logo" href="<?php echo esc_url(home_url('/')); ?>">
                            <span><?php echo esc_html($krizia_scroll_logo_line_1); ?></span>
                            <small><?php echo esc_html($krizia_scroll_logo_line_2); ?></small>
                        </a>

                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#krizia-scroll-nav" aria-controls="krizia-scroll-nav" aria-expanded="false" aria-label="<?php esc_attr_e('Toggle navigation', 'wp-bootstrap-starter'); ?>">
                            <span class="navbar-toggler-icon"></span>
                        </button>

                        <div id="krizia-scroll-nav" class="collapse navbar-collapse">
                            <ul class="navbar-nav krizia-scroll-menu">
                                <li class="nav-item"><a class="nav-link" href="#studio"><?php esc_html_e('Le studio', 'krizia'); ?></a></li>
                                <li class="nav-item"><a class="nav-link" href="#cours"><?php esc_html_e('Cours privés', 'krizia'); ?></a></li>
                                <li class="nav-item"><a class="nav-link" href="#formation"><?php esc_html_e('Formation continue', 'krizia'); ?></a></li>
                                <li class="nav-item"><a class="nav-link" href="#reservation"><?php esc_html_e('Contact', 'krizia'); ?></a></li>
                            </ul>

                            <?php if ($krizia_scroll_button_show) : ?>
                                <a class="krizia-scroll-booking" href="<?php echo esc_url($krizia_scroll_button_url); ?>" target="<?php echo esc_attr($krizia_scroll_button_target); ?>">
                                    <?php echo esc_html($krizia_scroll_button_text); ?>
                                </a>
                            <?php endif; ?>
                        </div>
                    </nav>
                </div>
            </header>
        <?php endif; ?>


        <div id="content" class="site-content">
            <?php if (!is_front_page()) : ?>
                <div class="container">
                    <div class="row">
            <?php endif; ?>

    <?php endif; ?>