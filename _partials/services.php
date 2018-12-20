<?php

// Query to get the post in 'Atouts' page

$services = new WP_Query(array('post_type' => 'Atouts',));
?>


<section style="padding-top: 30px">
    <div class="uk-container">
        <div class="uk-grid">
            <div class="uk-width-1-1">
                <div class="uk-card uk-card-default uk-card-body">
                    <h2 class="uk-text-center">Many ways to invest, one place to do it.</h2>
                    <div class="uk-child-width-1-4@l uk-child-width-1-2@m uk-child-width-1-1@s" data-uk-grid>
                        <?php if ($services->have_posts()) :

                            while ($services->have_posts()) : $services->the_post();
                                ?>
                                <div class="uk-text-center"><img class="uk-margin-bottom"
                                                                 src="<?php the_field('image') ?>" alt="">
                                    <h6 class="uk-text-uppercase uk-text-muted uk-margin-remove-top uk-margin-small-bottom">
                                        <?php echo get_the_title() ?></h6>
                                    <p class="uk-margin-remove-top"><?php echo get_the_content() ?></p>
                                </div>
                                <?php
                            endwhile;
                        endif;
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

