<?php
//include 'inc/addPostType.php';
//include 'inc/widgets.php';
/*
 * Signale à WordPress que le thème possède des menus
 */
register_nav_menus(
    array(
        'main-menu' => 'Description du menu',
        'footer-menu' => 'Description du menu footer',
        'menu-categ' => 'Menu des catégories',
    )
);

// Version bootstrap
function add_additional_class_on_li($classes, $item, $args)
{
    $classes[] = 'nav-item';
    return $classes;
}

add_filter('nav_menu_css_class', 'add_additional_class_on_li', 0, 3);

function add_class_a($atts)
{
    $atts['class'] = "nav-link";
    return $atts;
}

add_filter('nav_menu_link_attributes', 'add_class_a', 100, 1);


if (!function_exists('base_theme_enqueue_styles')) {
    /**
     * Enqueue scripts
     *
     * @param string $handle Script name
     * @param string $src Script url
     * @param array $deps (optional) Array of script names on which this script depends
     * @param string|bool $ver (optional) Script version (used for cache busting), set to null to disable
     * @param bool $in_footer (optional) Whether to enqueue the script before </head> or before </body>
     */
    function base_theme_enqueue_styles()
    {
        /*
        wp_deregister_script('jquery');
        wp_enqueue_script('jquery', get_stylesheet_directory_uri().'/vendor/jquery/jquery-2.2.4.js', array(), false, true);
        wp_enqueue_script('boostrap-js', get_stylesheet_directory_uri().'/vendor/bootstrap-3.3.7-dist/js/bootstrap.min.js', array('jquery'), false, true);
        */
        wp_enqueue_script('mainJs', get_stylesheet_directory_uri() . '/js/main.js', array('boostrap-js'), false, true);
        //wp_enqueue_style('boostrap-css', get_stylesheet_directory_uri() . '/vendor/bootstrap-3.3.7-dist/css/bootstrap.min.css');
        wp_enqueue_style('main', get_stylesheet_directory_uri() . '/css/main.min.css');
    }

    add_action('wp_enqueue_scripts', 'base_theme_enqueue_styles');
}
function wp_base_theme_theme_setup()
{
    /*
     * Signale à WordPress que votre theme possède des traductions
     */
    load_theme_textdomain('wp-theme-base-translate', get_template_directory() . '/languages');
    /*
     * Ajout du champs "Image à la Une" dans les articles
     */
    add_theme_support('post-thumbnails');
}

add_action('after_setup_theme', 'wp_base_theme_theme_setup');


// MENU SLIDER
add_action('init', 'create_slider');
function create_slider()
{
    register_post_type('Carrousel',
        array(
            'labels' => array(
                'name' => __('Carrousel'),
                'singular_name' => __('Carrousel')
            ),
            'public' => true,
            'has_archive' => true,
        )
    );
}


// MENU SERVICES

add_action('init', 'create_services');
function create_services()
{
    register_post_type('Atouts',
        array(
            'labels' => array(
                'name' => __('Atouts'),
                'singular_name' => __('Atouts')
            ),
            'public' => true,
            'has_archive' => true,
        )
    );
}

// Verification du dossier Languages ( trads )
add_action('after_setup_theme', 'pdw_theme_setup');

function pdw_theme_setup()
{
    load_theme_textdomain('examen-translate', get_template_directory() . '/languages');
}


// Verification des formulaires contact et newsletter.

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['action'])) {
        $action = $_POST['action'];
        switch ($_POST['action']) {
            case "contact":
                $name = (isset($_POST['name'])) ? $_POST['name'] : false;
                $email = (isset($_POST['email'])) ? $_POST['email'] : false;
                $subject = (isset($_POST['subject'])) ? $_POST['subject'] : false;
                $message = (isset($_POST['message'])) ? $_POST['message'] : false;
                if ($name && $email && $subject && $message) {
                    $txt = date("Y-m-d H:i:s") . " " . $_POST['action'] . "  " . $name . "\n";
                } else {
                    $error = !$name ? 'Name missing ' : '';
                    $error .= !$email ? 'Email missing ' : '';
                    $error .= !$subject ? 'Subject missing ' : '';
                    $error .= !$message ? 'Message missing ' : '';
                    $txt = date("Y-m-d H:i:s") . " " . $_POST['action'] . "  " . $error . "\n";
                }
                $log = fopen(__DIR__ . "/logs/log.txt", "a");
                fwrite($log, $txt);
                fclose($log);
                if (is_null($error)) {
                    wp_redirect(get_permalink(200) . "/?action=$action");
                } else {
                    wp_redirect(get_permalink(163));
                }
                exit;
                break;
            case "newsletter":
                $name = (isset($_POST['name'])) ? $_POST['name'] : false;
                $email = (isset($_POST['email'])) ? $_POST['email'] : false;
                $phone = (isset($_POST['phone'])) ? $_POST['phone'] : false;
                if ($name && $email && $phone) {
                    $txt = date("Y-m-d H:i:s") . " " . $_POST['action'] . "  " . $name . "\n";
                } else {
                    $error = !$name ? 'Name missing ' : '';
                    $error .= !$email ? 'Email missing ' : '';
                    $error .= !$phone ? 'Phone missing ' : '';
                    $txt = date("Y-m-d H:i:s") . " " . $_POST['action'] . "  " . $error . "\n";
                }
                $log = fopen(__DIR__ . "/logs/log.txt", "a");
                fwrite($log, $txt);
                fclose($log);
                if (is_null($error)) {
                    wp_redirect(get_permalink(200) . "/?action=$action");
                } else {
                    wp_redirect(get_permalink(38));
                }
                exit;
                break;
        }
    }
}

// Creation des widgets du footer
//  ( logo-footer , nav-footer-1 , nav-footer-2 , nav-footer-3 , nav-footer-4 , copyright )
function wp_base_theme_widgets_init()
{
    register_sidebar(array(
        'name' => 'logo-header',
        'id' => 'logo-header',
        'description' => 'Ajout du logo du header',
        'before_widget' => '<a class="uk-logo" href="index.php">',
        'after_widget' => '</a>',
    ));


    register_sidebar(array(
        'name' => 'logo-footer',
        'id' => 'logo-footer',
        'description' => 'Ajout d\'un logo dans le footer',
        'before_widget' => '<a class="uk-logo" href="index.php">',
        'after_widget' => '</a>',
    ));


    register_sidebar(array(
        'name' => 'nav-footer-1',
        'id' => 'nav-footer-1',
        'description' => 'Ajout de la première barre de navigation du footer',
        'before_widget' => '<div class="uk-width-1-4@l uk-width-1-5@m uk-width-1-3@s uk-list">',
        'after_widget' => '</div>',
    ));
    register_sidebar(array(
        'name' => 'nav-footer-2',
        'id' => 'nav-footer-2',
        'description' => 'Ajout de la deuxieme barre de navigation du footer',
        'before_widget' => '<div class="uk-width-1-4@l uk-width-1-5@m uk-width-1-3@s uk-list">',
        'after_widget' => '</div>',
    ));
    register_sidebar(array(
        'name' => 'nav-footer-3',
        'id' => 'nav-footer-3',
        'description' => 'Ajout de la troisième barre de navigation du footer',
        'before_widget' => '<div class="uk-width-1-4@l uk-width-1-5@m uk-width-1-3@s uk-list">',
        'after_widget' => '</div>',
    ));
    register_sidebar(array(
        'name' => 'nav-footer-4',
        'id' => 'nav-footer-4',
        'description' => 'Ajout de la quatrième barre de navigation du footer',
        'before_widget' => '<div class="uk-width-1-4@l uk-width-2-5@m uk-width-1-1@s ">',
        'after_widget' => '</div>',
    ));

    register_sidebar(array(
        'name' => 'copyright',
        'id' => 'copyright',
        'description' => 'Ajout du copyright',
        'before_widget' => '',
        'after_widget' => '',
    ));

}

add_action('widgets_init', 'wp_base_theme_widgets_init');