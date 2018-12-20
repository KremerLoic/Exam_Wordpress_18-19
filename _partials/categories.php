<?php
/**
 * Created by PhpStorm.
 * User: loic
 * Date: 16/12/2018
 * Time: 23:57
 */
?>
<!--  Retrieving all the categories !-->
<?php $categories = get_categories() ?>

<div class="uk-child-width-1-3@l uk-child-width-1-3@m uk-child-width-1-2@s uk-grid-small uk-grid-match uk-margin-medium-top"
     data-uk-grid>

    <!-- Loop on the $categories -> $categ to add the color selected in the ACF  !-->
<?php foreach ($categories as $categ) : ?>
    <?php $color = get_field('color', 'term_' . $categ->term_id); ?>
        <div>
            <div style="background-color : <?= $color ?>" class="uk-card uk-card-primary uk-card-small uk-card-body uk-inline idz-invest-card" >
                <h6 class="uk-text-uppercase uk-margin-small-bottom"><?= $categ->name ?></h6>
                <p class="uk-margin-remove-top"><?= $categ->description ?></p>
                <div class="uk-position-bottom-right"><a href ="<?= get_category_link($categ->term_id)?>"><i class="fa fa-2x fa-angle-right"></i></a>
                </div>
            </div>
        </div>
    <?php
    endforeach;
    ?>
</div>