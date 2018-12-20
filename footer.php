<!--
 Modified :

  - Footer is now dynamic, you can modify it in Widgets

 !-->

<footer>
    <div class="uk-container uk-light">
        <div class="uk-grid uk-margin-large-top">
            <?php dynamic_sidebar('nav-footer-1') ?>
            <?php dynamic_sidebar('nav-footer-2') ?>
            <?php dynamic_sidebar('nav-footer-3') ?>
            <?php dynamic_sidebar('nav-footer-4') ?>
            <div class="uk-width-1-1 uk-margin-large-top uk-margin-large-bottom">
                <!-- logo footer begin -->
                <div id="footer-logo">
                    <?php dynamic_sidebar('logo-footer') ?>
                    <?php dynamic_sidebar('copyright') ?>
                </div>
                <!-- logo footer end -->
            </div>
        </div>
    </div>
    <a class="uk-inline" href="<?php echo get_stylesheet_directory_uri() ?>" #" data-uk-totop data-uk-scroll
    data-uk-scrollspy="cls: uk-animation-fade; hidden: true; offset-top: 100px; repeat: true"></a>
</footer>
<!-- Javascript -->
<script src="<?php echo get_stylesheet_directory_uri() ?>/assets/js/jquery.js"></script>
<script src="<?php echo get_stylesheet_directory_uri() ?>/assets/js/uikit.min.js"></script>
<script src="<?php echo get_stylesheet_directory_uri() ?>/assets/js/uikit-icons.min.js"></script>
<script src="<?php echo get_stylesheet_directory_uri() ?>/assets/js/components/mediaelement.js"></script>
<script src="<?php echo get_stylesheet_directory_uri() ?>/assets/js/config.js"></script>
</body>

</html>