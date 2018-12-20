<?php
/**
 * Created by PhpStorm.
 * User: loic
 * Date: 17/12/2018
 * Time: 01:44
 */
?>

<?php $category = get_the_category()  ?>

<?php get_header(); ?>

<section id="pagetitle-container" xmlns="http://www.w3.org/1999/html">
    <div class="uk-container">
        <div class="uk-grid">
            <div class="uk-width-1-1">
                <ul class="uk-breadcrumb uk-margin-top uk-float-right">
                    <li><a href="<?= get_home_url() ?>">Home</a></li>
                    <li><a href="<?= get_page_template() ?>"><?php echo single_cat_title() ?></a></li>
                </ul>
            </div>
        </div>
    </div>
</section>
<section class="uk-margin-large-bottom">
    <div class="uk-container">
        <div class="uk-grid uk-margin-medium-top">
            <div class="uk-width-2-3@l uk-width-2-3@m uk-width-1-1@s">
                <?php if (have_posts()) :
                    while (have_posts()) :
                        the_post() ?>
                        <article class="uk-article idz-article">
                            <p class="uk-article-meta">

                    <span class="uk-label uk-label-success uk-visible@m">
                        Catégorie(s) :

                        <!-- Retrieving all the categories OF THE CURRENT POST ONLY
                             You don't need to retrieve all the categories because a post shouldn't have all of them
                         !-->
                        <?php foreach (get_the_category() as $key => $categ) : ?>
                            <?php echo $categ->name ?>.
                        <?php endforeach; ?>
                                    </span>
                                <span class="uk-label uk-label-success uk-visible@m">
                         Auteur : <?php echo get_the_author() ?>
                        </span>
                                <span class="uk-label uk-label-success uk-visible@m">
                         Date : <?php echo get_the_date() ?>
                        </span>
                            <h3 class="uk-margin-small-top"><a class="uk-link-reset"
                                                               href="single.html"><?= get_the_title() ?></a></h3>
                            <div class="image">
                                <?php get_the_post_thumbnail() ?>
                            </div>
                            <div class="uk-margin-large-left">
                                <!---   <div class="uk-margin-small-bottom">
                                       <a href="" class="uk-icon-button twitter uk-margin-small-right"
                                          data-uk-icon="icon: twitter"></a>
                                       <a href="" class="uk-icon-button facebook uk-margin-small-right"
                                          data-uk-icon="icon: facebook"></a>
                                       <a href="" class="uk-icon-button linkedin uk-margin-small-right"
                                          data-uk-icon="icon: linkedin"></a>
                                       <a href="" class="uk-icon-button" data-uk-icon="icon: mail"></a>
                                   </div>
                                   !--->

                                <!-- wp_trim_words needs to prevent
                                the display of the full article,
                                in this function we limit the
                                 words number at 55!-->
                                <p> <?php echo wp_trim_words(get_the_content(), 55, '&hellip') ?>;</p>
                                <div><a class="uk-button uk-button-text" href="<?php the_permalink() ?>">Continue
                                        Reading...</a>
                                </div>
                            </div>
                        </article>
                        <?php
                    endwhile;
                endif;
                ?>
            </div>
            <div class="uk-width-1-3@l uk-width-1-3@m uk-width-1-1@s">
                <aside class="uk-margin-medium-bottom">
                    <div class="uk-card uk-card-default idz-widget-card uk-card-body">
                        <h5 class="uk-text-uppercase uk-margin-remove-bottom">Categories</h5>
                        <ul class="uk-list uk-list-divider idz-categories-widget">
                            <!-- Diplay the category menu on the right !-->
                            <? wp_nav_menu(array('theme_location' => 'menu-categ', 'container_class' => 'uk-float-center')); ?>
                        </ul>
                    </div>
                </aside>
            </div>
        </div>
        <?php the_posts_pagination( array(
            'screen_reader_text' => ' ',

        )); ?>
</section>



<?php get_footer(); ?>

