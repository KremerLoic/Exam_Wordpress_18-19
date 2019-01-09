<?php
/**
 * Created by PhpStorm.
 * User: loic
 * Date: 19/12/2018
 * Time: 23:23
 */
?>

<?php get_header(); ?>
<!-- Retrieve of the single article categories !-->
<?php $category = get_the_category() ?>


<?php if (have_posts()) :
while (have_posts()) :
the_post() ?>


<section class="uk-margin-large-bottom">
    <div class="uk-container">
        <div class="uk-grid uk-margin-medium-top">
            <div class="uk-width-2-3@l uk-width-2-3@m uk-width-1-1@s">
                <article class="uk-article idz-article">
                    <p class="uk-article-meta">
                            <span class="uk-label uk-label-success uk-visible@m">
                                <?php _e('Categories :' , 'examen-translate')  ?>
                                <!-- Loop on the categories of the article !-->
                                <?php foreach ($category as $categ) : ?>
                                    <?= $categ->name ?>.
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
                        <p> <?php echo get_the_content() ?></p>


                    </div>
                </article>
            </div>
            <div class="uk-width-1-3@l uk-width-1-3@m uk-width-1-1@s">
                <aside class="uk-margin-medium-bottom">
                    <div class="uk-card uk-card-default idz-widget-card uk-card-body">
                        <h5 class="uk-text-uppercase uk-margin-remove-bottom">Categories</h5>
                        <ul class="uk-list uk-list-divider idz-categories-widget">
                            <? wp_nav_menu(array('theme_location' => 'menu-categ', 'container_class' => 'uk-float-center')); ?>

                        </ul>
                    </div>
                </aside>
            </div>
        </div>
</section>
<?php
endwhile;
endif;
?>
<?php get_footer(); ?>

