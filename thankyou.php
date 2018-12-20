<?php

/**
 * Template Name: ThankYou
 */

// Template displayed after form submission.
// Message isnt the same if you send it from the contact/newsletter

?>

<?php get_header(); ?>

    <section class="uk-margin-large-bottom">
        <div class="uk-container">
            <div class="uk-grid uk-margin-small-top">
                <div class="uk-width-3-5@l uk-width-1-1@m uk-width-1-1@s">
                    <h2 class="uk-margin-remove-bottom">Succès !</h2>

                    <?php if ($_GET['action'] == 'contact') : ?>
                        <p class="uk-text-lead">Votre message a bien été envoyé ! Nous vous répondrons dans les plus
                            brefs délais</p>
                    <?php elseif ($_GET['action'] == 'newsletter') : ?>
                        <p class="uk-text-lead">Vous êtes désormais abonné à notre newsletter ! Merci de votre confiance
                            ! </p>
                    <?php endif ?>
                </div>
            </div>
        </div>
    </section>

<?php get_footer(); ?>