<!-- Query to retrieve the posts in 'Carrousel page !-->

<?php $slider = new WP_Query(array('post_type' => 'Carrousel',)); ?>


<section id="slideshow-container">
    <!-- Slideshow wrapper begin -->
    <div data-uk-slideshow="autoplay: true; animation: slide; max-height: 500">
        <div class="uk-position-relative">
            <ul class="uk-slideshow-items">
                <!-- Slide 1 begin -->
                <?php
                if ($slider->have_posts()) :
                    while ($slider->have_posts()) : $slider->the_post(); ?>
                        <li>
                            <div class="uk-position-cover uk-animation-kenburns uk-animation-reverse uk-transform-origin-center">
                                <img src="<?= get_field('image') ?>" alt="" uk-cover>
                            </div>
                            <div class="uk-container uk-position-center">
                                <div class="uk-grid">
                                    <div class="uk-width-3-4@l uk-width-1-1@s uk-margin-medium-left">
                                        <h1 class="uk-margin-small-bottom"> <?php echo get_the_title(); ?>
                                        </h1>
                                        <h3 class="uk-margin-small-top uk-margin-medium-bottom idz-thin uk-visible@m"><?php echo get_the_content(); ?></h3>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <?php
                    endwhile;
                endif;
                ?>
                <!-- Slide 1 end -->
            </ul>
        </div>
        <ul class="uk-slideshow-nav uk-dotnav uk-flex-center uk-margin"></ul>
    </div>
    <!-- Slideshow wrapper end -->
</section>

