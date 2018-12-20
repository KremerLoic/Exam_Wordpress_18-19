<?php
/**
 * Template Name: AboutUs
 */
?>

<?php get_header(); ?>


<section id="pagetitle-container">
    <div class="uk-container">
        <div class="uk-grid">
            <div class="uk-width-1-1">
                <!-- Breadcrumb begin -->
                <ul class="uk-breadcrumb uk-margin-top uk-float-right">
                    <li><a href="<?php echo home_url() ?>"><?php echo get_the_title(get_option('page_on_front')) ?></a>
                    </li>
                    <li><a href="<?php get_permalink() ?>"><?php echo get_the_title() ?></a></li>
                </ul>
                <!-- Breadcrumb end -->
            </div>
        </div>
    </div>
</section>
<section class="uk-margin-medium-bottom">
    <div class="uk-container uk-container-expand uk-background-default">
        <div class="uk-container uk-margin-medium-top uk-margin-medium-bottom">
            <div class="uk-grid">
                <?php
                if (have_posts()) : ?>
                <div class="uk-width-1-1">
                    <?php while (have_posts()) :
                    the_post(); ?>
                    <h2 class="uk-margin-small-top uk-margin-remove-bottom"><?= get_the_title() ?></h2>
                    <p class="uk-text-lead uk-margin-small-bottom"><?= get_the_content() ?></p>

                    <!-- Looking if there is rows created in the Personne repeater ACF !-->
                    <?php if (have_rows('Personne')) ?>
                    <div class="uk-child-width-1-3@l uk-child-width-1-3@m uk-child-width-1-1@s uk-margin-medium-top uk-text-center"
                         data-uk-grid>
                        <!-- If yes we will Loop on the rows !-->
                        <?php while (have_rows('Personne')) : the_row() ?>
                            <div><img class="uk-border-circle uk-margin-remove-bottom"
                                      src="<?= get_sub_field('avatar') ?>" width="200" height="200" alt=""/>
                                <h4 class="uk-margin-small-top uk-margin-remove-bottom"><?= get_sub_field('nom') ?></h4>
                                <p class="uk-margin-remove-top"><?= get_sub_field('poste') ?></p>
                            </div>
                            <?php
                        endwhile;
                        ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
    <section class="uk-margin-large-bottom">
        <div class="uk-container">
            <div class="uk-grid uk-margin-top">
                <div class="uk-width-1-2@l uk-width-1-2@m uk-width-1-1@s">
                    <div class="uk-card uk-card-medium uk-card-secondary uk-card-body uk-margin-bottom">
                        <h6 class="uk-text-uppercase uk-margin-remove-bottom"><?= get_field('titre_bloc_1') ?></h6>
                        <p class="uk-margin-small-top"><?= get_field('description_bloc_1') ?></p> <a
                                class="uk-button uk-button-primary" href=""><?= get_field('bouton') ?></a></div>
                </div>
                <div class="uk-width-1-2@l uk-width-1-2@m uk-width-1-1@s">
                    <p class="uk-text-lead"><?= get_field('texte_bloc_2') ?></p>
                    <?php if (have_rows('info_bloc_2')) ?>
                    <ul class="uk-list idz-list-check">
                        <?php while (have_rows('info_bloc_2')) : the_row() ?>
                            <li><?= get_sub_field('info') ?></li>
                            <?php
                        endwhile;
                        ?>
                    </ul>

                </div>
            </div>
        </div>
    </section>

<?php
endwhile;
endif;
?>
<?php get_footer(); ?>
