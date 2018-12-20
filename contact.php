<?php
/**
 * Template Name: Contact
 *
 */
?>

<?php get_header(); ?>


<section id="pagetitle-container">
    <div class="uk-container">
        <div class="uk-grid">
            <div class="uk-width-1-1">
                <ul class="uk-breadcrumb uk-margin-top uk-float-right">
                    <li><a href="<?php echo home_url() ?>"><?= get_the_title(get_option('page_on_front')) ?></a></li>
                    <li><a href="<?php echo get_permalink() ?>"> <?= get_the_title() ?> </a></li>
                </ul>
            </div>
        </div>
    </div>
</section>
<section class="uk-margin-large-bottom">
    <div class="uk-container">
        <div class="uk-grid uk-margin-medium-top">
            <div class="uk-width-1-1 uk-margin-medium-bottom">
                <h2><?= get_the_title() ?></h2>
                <p class="uk-text-lead"><?= get_the_content() ?></p>
                <div class="uk-card uk-card-default uk-card-medium uk-margin-medium-top">
                    <div class="uk-card-body">
                        <!-- Looking if there's rows in the contact repeater ACF !-->

                        <?php if (have_rows('contact')) : ?>
                        <div class="uk-child-width-1-3@m uk-grid-divider uk-grid-medium uk-grid-match" data-uk-grid>
                            <!-- If yes we loop on the contact ACF !-->
                            <?php while (have_rows('contact')) : the_row() ?>
                                <div>
                                    <h6 class="uk-text-uppercase uk-margin-remove-bottom"><?= get_sub_field('titre_du_contact') ?></h6>
                                    <p class="uk-margin-small-top"><?= get_sub_field('description_du_contact') ?></p>
                                    <ul class="uk-list idz-list-contact uk-text-success uk-margin-remove-top">
                                        <li><span class="uk-label uk-label-success"><i
                                                        class="fa fa-envelope"></i></span> <span
                                                    class="uk-margin-small-left"><?= get_sub_field('info_de_contact_') ?></span>
                                        </li>
                                    </ul>
                                </div>
                            <?php endwhile;
                            ?>
                        </div>
                    </div>
                    <div class="uk-card-media-bottom">
                        <div id="map">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2530.1415321309128!2d5.558280115805908!3d50.64306257950236!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47c0fa164d5c495d%3A0x218fa7a72d277476!2sINSTITUT+SAINT-LAURENT!5e0!3m2!1sfr!2sbe!4v1545075955021"
                                    width="100%" height="100%" frameborder="0" style="border:0"
                                    allowfullscreen></iframe>
                        </div>
                    </div>
                </div>
            </div>
            <!--
            Modified :
            - Add of a name on the inputs to verify them with the $_POST superglobal
            - Add of the hidden input named 'action'
            - Add the translate possibilities with Loco Translate
            !-->
            <div class="uk-width-1-1@l uk-width-1-1@m uk-width-1-1@s">
                <h3><?php _e('Drop Us a line', 'examen-translate') ?></h3>
                <form id="contact-form" class="uk-form" method="POST">
                    <div class="uk-margin uk-width-2-3">
                        <input class="uk-input" id="name" name="name" value="" type="text"
                               placeholder="<?php _e('Full name', 'examen-translate') ?>"></div>
                    <div class="uk-margin uk-width-2-3">
                        <input class="uk-input" id="email" name="email" value="" type="email"
                               placeholder="<?php _e('Email', 'examen-translate') ?>"></div>
                    <div class="uk-margin uk-width-2-3">
                        <input class="uk-input" id="subject" name="subject" value="" type="text"
                               placeholder="<?php _e('Subject', 'examen-translate') ?>"></div>
                    <div class="uk-margin">
                        <textarea class="uk-textarea" id="message" name="message" rows="5"
                                  placeholder=" <?php _e('Message', 'examen-translate') ?>"></textarea>
                    </div>
                    <div>
                        <input class="uk-input" name="action" value="contact" type="hidden">
                        <button class="uk-button uk-button-primary uk-float-left" id="buttonsend" type="submit"
                                name="submit"><?php _e('Send Message', 'examen-translate') ?></button>
                        <div class="idz-contact-loading uk-float-left uk-margin-left" style="display: none;"><span
                                    data-uk-spinner></span><?php _e('Please wait..', 'examen-translate') ?></div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<?php endif; ?>
<?php get_footer(); ?>

