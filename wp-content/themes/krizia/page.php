<?php
/**
 * Template for displaying pages
 *
 * @package WP_Bootstrap_Starter
 */

get_header();
?>

<section id="primary" class="content-area col-12">
    <main id="main" class="site-main" role="main">

        <?php
        while (have_posts()) :
            the_post();

            get_template_part('template-parts/content', 'page');

        endwhile;
        ?>

    </main>
</section>

<?php
get_footer();