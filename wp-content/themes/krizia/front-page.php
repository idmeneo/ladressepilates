<?php
/**
 * Front page template.
 *
 * @package WP_Bootstrap_Starter
 */

get_header();
?>

<main id="primary" class="site-main krizia-front" role="main">
    <?php
    while (have_posts()) :
        the_post();
        the_content();
    endwhile;
    ?>
</main>

<?php
get_footer();