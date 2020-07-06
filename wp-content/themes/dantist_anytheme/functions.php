<?php
require_once 'inc/customizer.php';

function enqueue_styles() {
//    wp_enqueue_style( 'style', get_stylesheet_uri());
    wp_enqueue_style('theme-styles', get_stylesheet_directory_uri() . '/inc/css/allStyles.css');
    wp_enqueue_script('my-script', get_template_directory_uri(). '/inc/js/app.js','','', true);
//    wp_enqueue_script('slider-script', get_template_directory_uri(). '/inc/js/slider.js','','', true);
    wp_deregister_script('jquery');
    wp_enqueue_script('jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js', array(), null, true);
//    wp_enqueue_script('mulSlider-script', get_template_directory_uri(). '/inc/js/mult_slider.js','','', true);
//    wp_enqueue_script('mulSlider-script', get_template_directory_uri(). '/inc/js/auto_slider.js','','', true);



}
add_action('wp_enqueue_scripts', 'enqueue_styles');

if (function_exists('add_theme_support')) {
    add_theme_support('menus');
    add_theme_support('custom-logo', array(
        'height' => 60,
        'width' => 70,
        'flex-height' => true,
        'flex-width' => true,
        'header-text' => array('site-title', 'site-description'),
    ));
}

function true_register_wp_sidebars() {

    /* В боковой колонке - первый сайдбар */
    register_sidebar(
        array(
            'id' => 'true_side', // уникальный id
            'name' => 'Боковая колонка', // название сайдбара
            'description' => 'Перетащите сюда виджеты, чтобы добавить их в сайдбар.', // описание
            'before_widget' => '<div id="%1$s" class="side widget %2$s">', // по умолчанию виджеты выводятся <li>-списком
            'after_widget' => '</div>',
            'before_title' => '<h3 class="widget-title">', // по умолчанию заголовки виджетов в <h2>
            'after_title' => '</h3>'
        )
    );

    /* В подвале - второй сайдбар */
    register_sidebar(
        array(
            'id' => 'true_foot',
            'name' => 'Футер',
            'description' => 'Перетащите сюда виджеты, чтобы добавить их в футер.',
            'before_widget' => '<div id="%1$s" class="foot widget %2$s">',
            'after_widget' => '</div>',
            'before_title' => '<h3 class="widget-title">',
            'after_title' => '</h3>'
        )
    );
}
add_action( 'after_setup_theme', 'wp_kama_theme_setup' );
function wp_kama_theme_setup(){
    // Поддержка миниатюр
    add_theme_support( 'post-thumbnails' );
}


add_action( 'widgets_init', 'true_register_wp_sidebars' );
add_filter('widget_text', 'do_shortcode');
//------------------------------------------

// Отключаем любые CSS стили плагинов
//function custom_dequeue() {
//    wp_dequeue_style('wp-block-library');
//
//}
//add_action( 'wp_enqueue_scripts', 'custom_dequeue', 9999 );
//add_action( 'wp_head', 'custom_dequeue', 9999 );


