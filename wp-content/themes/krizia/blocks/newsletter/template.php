<?php
/**
 * Newsletter block template.
 *
 * @package Krizia
 */

$default_background = get_template_directory_uri() . '/assets/images/newsletter.jpg';

$background      = get_field( 'newsletter_background' ) ?: $default_background;
$title           = get_field( 'newsletter_title' ) ?: 'Newsletter';
$text            = get_field( 'newsletter_text' ) ?: 'Inscrivez-vous pour recevoir les actualités de L’Adresse Pilates.';
$placeholder     = get_field( 'newsletter_placeholder' ) ?: 'Votre email';
$button_text     = get_field( 'newsletter_button_text' ) ?: 'S’inscrire';
$form_action     = get_field( 'newsletter_form_action' ) ?: '#';
$success_message = get_field( 'newsletter_success_message' ) ?: '';
$privacy_text    = get_field( 'newsletter_privacy_text' ) ?: '';

$block_id = 'krz-newsletter-' . uniqid();

if ( isset( $block ) && is_array( $block ) ) {
    $block_id = ! empty( $block['anchor'] )
        ? $block['anchor']
        : 'krz-newsletter-' . $block['id'];
}
?>

<section
    id="<?php echo esc_attr( $block_id ); ?>"
    class="krz-block krz-block--rounded krz-newsletter"
    style="--krz-stack:10;"
    data-krz-animation-section
>
    <div
        class="krz-block__surface krz-newsletter__surface"
        style="--krz-newsletter-background: linear-gradient(rgba(50, 35, 27, 0.44), rgba(50, 35, 27, 0.44)), url('<?php echo esc_url( $background ); ?>');"
    >
        <div class="container krz-newsletter__container">
            <div class="krz-newsletter__content">

                <?php if ( $title ) : ?>
                    <h2
                        class="krz-newsletter__title"
                        data-krz-animation="text-chars-up"
                    >
                        <?php echo esc_html( $title ); ?>
                    </h2>
                <?php endif; ?>

                <?php if ( $text ) : ?>
                    <div
                        class="krz-newsletter__text"
                        data-krz-animation="text-words-up"
                        data-krz-delay="0.16"
                    >
                        <?php echo wp_kses_post( wpautop( $text ) ); ?>
                    </div>
                <?php endif; ?>

                <form
                    class="krz-newsletter__form"
                    action="<?php echo esc_url( $form_action ); ?>"
                    method="post"
                    data-krz-animation="fade-up"
                    data-krz-delay="0.32"
                >
                    <label
                        class="screen-reader-text"
                        for="<?php echo esc_attr( $block_id ); ?>-email"
                    >
                        <?php echo esc_html__( 'Votre email', 'krizia' ); ?>
                    </label>

                    <input
                        id="<?php echo esc_attr( $block_id ); ?>-email"
                        class="krz-newsletter__input"
                        type="email"
                        name="email"
                        placeholder="<?php echo esc_attr( $placeholder ); ?>"
                        data-krz-animate="animate__bounceInLeft"
                        required
                    >

                    <button
                        class="krz-newsletter__button"
                        type="submit"
                        data-krz-animate="animate__bounceInRight"
                    >
                        <?php echo esc_html( $button_text ); ?>
                    </button>
                </form>

                <?php if ( $privacy_text ) : ?>
                    <div
                        class="krz-newsletter__privacy"
                        data-krz-animation="fade-up"
                        data-krz-delay="0.46"
                    >
                        <?php echo wp_kses_post( wpautop( $privacy_text ) ); ?>
                    </div>
                <?php endif; ?>

                <?php if ( $success_message ) : ?>
                    <p class="krz-newsletter__success" hidden>
                        <?php echo esc_html( $success_message ); ?>
                    </p>
                <?php endif; ?>

            </div>
        </div>
    </div>
</section>