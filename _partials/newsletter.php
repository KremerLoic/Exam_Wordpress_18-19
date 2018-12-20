<!--

 Modified :
 - Add name option on the form input , to verify them with the superglobal $_POST
 - Add the hidden input named action
 - The newsletter is ready to use with Loco Translate

 !-->


<section>
    <div class="uk-container uk-container-expand idz-create-account">
        <div class="uk-container uk-margin-medium-top uk-margin-medium-bottom">
            <div class="uk-width-1-1">
                <h2 class="uk-margin-small-bottom"><?php _e('Open your account', 'examen-translate'); ?></h2>
                <p class="uk-text-lead uk-margin-remove-top uk-visible@m"><?php _e('Connect with over 5 millions investors in the world’s leading social investment network','examen-translate') ?> </p>
                <form class="uk-grid-small uk-margin-bottom" method="post" data-uk-grid>
                    <div class="uk-width-1-5@l uk-width-1-4@s">
                        <input class="uk-input" name="name"  type="text" placeholder="<?php _e('Full name','examen-translate') ?>"></div>
                    <div class="uk-width-1-5@l uk-width-1-4@s">
                        <input class="uk-input" name="email" type="text" placeholder="<?php _e('Email address','examen-translate')?>"></div>
                    <div class="uk-width-1-5@l uk-width-1-4@s">
                        <input class="uk-input" name="phone" type="text" placeholder="<?php _e('Phone number','examen-translate') ?>"></div>
                    <div class="uk-width-1-5@l uk-width-1-4@s">
                        <input class="uk-input" name="action" value="newsletter" type="hidden">
                        <button class="uk-button uk-button-primary"><?php _e('Create account','examen-translate') ?></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>