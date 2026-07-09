<?php
/**
 * The template for displaying the footer.
 *
 * @package WP_Bootstrap_Starter
 */

if (!is_page_template('blank-page.php') && !is_page_template('blank-page-with-container.php')) :
    if (!is_front_page()) :
        ?>
            </div><!-- .row -->
        </div><!-- .container -->
        <?php
    endif;
    ?>
    </div><!-- #content -->

    <?php
    $footer_title       = krizia_get_option('footer_title', 'Contact');
    $footer_logo        = krizia_get_option('footer_logo');
    $footer_address_t   = krizia_get_option('footer_address_title', 'L’Adresse Pilates');
    $footer_address     = krizia_get_option('footer_address');
    $footer_email       = krizia_get_option('footer_email');
    $footer_booking     = krizia_get_option('footer_booking_button');
    $footer_instagram   = krizia_get_option('footer_instagram_link');
    $footer_copyright   = krizia_get_option('footer_copyright', '© ' . date('Y') . ' L’Adresse Pilates. Tous droits réservés.');
    $footer_form_title  = krizia_get_option('footer_form_title', 'Contactez-nous');
    $footer_form_note   = krizia_get_option('footer_form_required_text', '* Champs obligatoires');
    $footer_form_shortcode = krizia_get_option('footer_form_shortcode');

    $booking_url    = krizia_get_link_url($footer_booking, '#reservation');
    $booking_target = krizia_get_link_target($footer_booking);
    $booking_text   = is_array($footer_booking) && !empty($footer_booking['title']) ? $footer_booking['title'] : 'Réserver';
    ?>

    <footer id="colophon" class="krz-footer" role="contentinfo">
        <div class="container krz-footer__container">
            <div class="row">
                <div class="col-12 col-lg-5">
                    <?php if ($footer_title) : ?>
                        <h2 class="krz-footer__title"><?php echo esc_html($footer_title); ?></h2>
                    <?php endif; ?>

                    <div class="krz-footer__brand">
                        <?php if ($footer_logo) : ?>
                            <img
                                class="krz-footer__logo"
                                src="<?php echo esc_url($footer_logo); ?>"
                                alt="<?php echo esc_attr($footer_address_t); ?>"
                                loading="lazy"
                            >
                        <?php endif; ?>

                        <div class="krz-footer__details">
                            <?php if ($footer_address_t) : ?>
                                <h3><?php echo esc_html($footer_address_t); ?></h3>
                            <?php endif; ?>

                            <?php if ($footer_address) : ?>
                                <div class="krz-footer__text">
                                    <?php echo wp_kses_post(wpautop($footer_address)); ?>
                                </div>
                            <?php endif; ?>

                            <?php if ($footer_email) : ?>
                                <p>
                                    <a href="mailto:<?php echo esc_attr($footer_email); ?>">
                                        <?php echo esc_html($footer_email); ?>
                                    </a>
                                </p>
                            <?php endif; ?>
                        </div>
                    </div>

                    <?php if ($booking_text) : ?>
                        <a
                            class="krz-footer__booking"
                            href="<?php echo esc_url($booking_url); ?>"
                            target="<?php echo esc_attr($booking_target); ?>"
                        >
                            <?php echo esc_html($booking_text); ?>
                        </a>
                    <?php endif; ?>

                    <?php if ($footer_instagram) : ?>
                        <div class="krz-footer__social">
                            <a href="<?php echo esc_url($footer_instagram); ?>" target="_blank" rel="noopener">
                                <span class="krz-footer__instagram-icon" aria-hidden="true"></span>
                                Instagram
                            </a>
                        </div>
                    <?php endif; ?>

                    <?php if ($footer_copyright) : ?>
                        <p class="krz-footer__copyright">
                            <?php echo wp_kses_post($footer_copyright); ?>
                        </p>
                    <?php endif; ?>
                </div>

                <div class="col-12 col-lg-6 offset-lg-1">
                    <?php if ($footer_form_title) : ?>
                        <h2 class="krz-footer__form-title"><?php echo esc_html($footer_form_title); ?></h2>
                    <?php endif; ?>

                    <?php if ($footer_form_note) : ?>
                        <p class="krz-footer__required"><?php echo esc_html($footer_form_note); ?></p>
                    <?php endif; ?>

                    <?php if ($footer_form_shortcode) : ?>
                        <div class="krz-footer__form">
                            <?php echo do_shortcode($footer_form_shortcode); ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </footer>
<?php endif; ?>

</div><!-- #page -->

<?php wp_footer(); ?>
</body>
</html>