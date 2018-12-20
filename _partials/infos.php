<section class="uk-margin-large-bottom idz-invest-product">
    <div class="uk-container">
        <div class="uk-grid uk-margin-small-top">
            <div class="uk-width-3-5@l uk-width-1-1@m uk-width-1-1@s">

                <!-- Get the infos posts !-->
                <?php
                if (have_posts()) :
                    while (have_posts()) :
                        the_post(); ?>

                        <h2 class="uk-margin-remove-bottom"> <?= get_the_title() ?></h2>
                        <p class="uk-text-lead"><?= get_the_content() ?></p>

                        <?php
                    endwhile;
                endif;
                ?>
                <!-- including the categories partial to the template !-->
                <?php include get_template_directory() . '/_partials/categories.php'; ?>
            </div>
        </div>
    </div>
</section>