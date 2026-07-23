<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @package WP_Bootstrap_Starter
 */

if (
    !is_page_template('blank-page.php')
    && !is_page_template('blank-page-with-container.php')
) :
    if (!is_front_page() && !is_singular('post')) :
        ?>
            </div> <!-- .row -->
        </div> <!-- .container -->
        <?php
    endif;
    ?>
    </div><!-- #content -->

    <?php
    $footer_title = krizia_get_option(
        'footer_title',
        'Contact'
    );

    $footer_logo = krizia_get_option(
        'footer_logo'
    );

    $footer_address_title = krizia_get_option(
        'footer_address_title',
        'L’Adresse Pilates'
    );

    $footer_address = krizia_get_option(
        'footer_address'
    );

    $footer_email = krizia_get_option(
        'footer_email'
    );

    $footer_booking = krizia_get_option(
        'footer_booking_button'
    );

    $footer_instagram_url = krizia_get_option(
        'footer_instagram_link'
    );

    $footer_instagram_username = krizia_get_option(
        'footer_instagram_username',
        '@ladressepilates'
    );

    $footer_instagram_logo = krizia_get_option(
        'footer_instagram_logo'
    );

    $footer_social_title = krizia_get_option(
        'footer_social_title',
        'Retrouvez-nous sur :'
    );

    $footer_copyright = krizia_get_option(
        'footer_copyright',
        '© ' . date('Y') . ' L’Adresse Pilates. Tous droits réservés.'
    );

    $footer_form_required_text = krizia_get_option(
        'footer_form_required_text',
        '* Champs obligatoires'
    );

    $footer_form_shortcode = krizia_get_option(
        'footer_form_shortcode'
    );

    $booking_url = krizia_get_link_url(
        $footer_booking,
        '#reservation'
    );

    $booking_target = krizia_get_link_target(
        $footer_booking
    );

    $booking_text = (
        is_array($footer_booking)
        && !empty($footer_booking['title'])
    )
        ? $footer_booking['title']
        : 'Réserver';
    ?>

    <footer
        id="contact"
        class="krz-footer"
        role="contentinfo"
        style="--krz-stack:9;"
    >
        <div class="container krz-footer__container">
            <div class="row krz-footer__main-row">
                <div class="col-12 col-lg-5">
                    <?php if ($footer_title) : ?>
                        <h2 class="krz-footer__title">
                            <?php echo esc_html($footer_title); ?>
                        </h2>
                    <?php endif; ?>

                    <div class="krz-footer__brand">
                        <?php if ($footer_logo) : ?>
                            <img
                                class="krz-footer__logo"
                                src="<?php echo esc_url($footer_logo); ?>"
                                alt="<?php echo esc_attr($footer_address_title); ?>"
                                loading="lazy"
                            >
                        <?php endif; ?>

                        <div class="krz-footer__details">
                            <?php if ($footer_address_title) : ?>
                                <h3>
                                    <?php echo esc_html($footer_address_title); ?>
                                </h3>
                            <?php endif; ?>

                            <?php if ($footer_address) : ?>
                                <div class="krz-footer__text">
                                    <?php
                                    echo wp_kses_post(
                                        wpautop($footer_address)
                                    );
                                    ?>
                                </div>
                            <?php endif; ?>

                            <?php if ($footer_email) : ?>
                                <p class="krz-footer__email">
                                    <a
                                        href="mailto:<?php echo esc_attr(antispambot($footer_email)); ?>"
                                    >
                                        <?php echo esc_html(antispambot($footer_email)); ?>
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
                            <?php echo '_blank' === $booking_target ? 'rel="noopener noreferrer"' : ''; ?>
                        >
                            <?php echo esc_html($booking_text); ?>
                        </a>
                    <?php endif; ?>

                    <?php if ($footer_instagram_url) : ?>
                        <div class="krz-footer__social">
                            <?php if ($footer_social_title) : ?>
                                <p class="krz-footer__social-title">
                                    <?php echo esc_html($footer_social_title); ?>
                                </p>
                            <?php endif; ?>

                            <a
                                class="krz-footer__social-link"
                                href="<?php echo esc_url($footer_instagram_url); ?>"
                                target="_blank"
                                rel="noopener noreferrer"
                            >
                                <?php if ($footer_instagram_logo) : ?>
                                    <img
                                        class="krz-footer__social-icon"
                                        src="<?php echo esc_url($footer_instagram_logo); ?>"
                                        alt=""
                                        aria-hidden="true"
                                        loading="lazy"
                                    >
                                <?php endif; ?>

                                <span>
                                    <?php echo esc_html($footer_instagram_username); ?>
                                </span>
                            </a>
                        </div>
                    <?php endif; ?>
                </div>

                <div class="col-12 col-lg-6 offset-lg-1 krz-footer__form-column">
                    <?php if ($footer_form_required_text) : ?>
                        <p class="krz-footer__required">
                            <?php echo esc_html($footer_form_required_text); ?>
                        </p>
                    <?php endif; ?>

                    <?php if ($footer_form_shortcode) : ?>
                        <div class="krz-footer__form">
                            <?php
                            echo do_shortcode(
                                wp_kses_post($footer_form_shortcode)
                            );
                            ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>

            <?php if ($footer_copyright) : ?>
                <div class="krz-footer__bottom">
                    <p class="krz-footer__copyright">
                        <?php echo wp_kses_post($footer_copyright); ?>
                    </p>
                </div>
            <?php endif; ?>
        </div>
    </footer>
<?php endif; ?>

</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>