<?php


add_action( 'customize_register', 'customizer_init' );
add_action( 'customize_preview_init', 'customizer_js_file' );
add_action( 'wp_head', 'customizer_style_tag' );

function customizer_init( WP_Customize_Manager $wp_customize ){

    // как обновлять превью сайта:
    // 'refresh'     - перезагрузкой фрейма (можно полностью отказаться от JavaScript)
    // 'postMessage' - отправкой AJAX запроса
    $transport = 'refresh';

    // Секция
    if( 'базовая - colors' ){

        // настройка
        $setting = 'link_color';

        $wp_customize->add_setting( $setting, [
            'default'     => '#000000',
            'transport'   => $transport
        ] );

        $wp_customize->add_control(
            new WP_Customize_Color_Control( $wp_customize, $setting, [
                'label'    => 'Цвет ссылок',
                'section'  => 'colors',
                'settings' => $setting
            ] )
        );

    }

    // Секция
    if( $section = 'display_options' ){

        $wp_customize->add_section( $section, [
            'title'     => 'Отображение',
            'priority'  => 100,                   // приоритет расположения
            'description' => 'Внешний вид сайта', // описание не обязательное
        ] );

        // настройка
        $setting = 'color_scheme';

        $wp_customize->add_setting( $setting, [
            'default'   => 'normal',
            'transport' => $transport
        ] );

        $wp_customize->add_control( $setting, [
            'section'  => $section,
            'label'    => 'Цветовая схема',
            'type'     => 'radio',
            'choices'  => [
                'normal'    => 'Светлая',
                'inverse'   => 'Темная',
            ]
        ] );

        // настройка
        $setting = 'font';

        $wp_customize->add_setting( $setting, [
            'default'   => 'roboto',     // этот шрифт будет задействован по умолчанию
            'type'      => 'theme_mod', // использовать get_theme_mod() для получения настроек, если указать 'option', то нужно будет использовать функцию get_option()
            'transport' => $transport
        ] );

        $wp_customize->add_control( $setting, [
            'section'  => 'display_options', // секция
            'label'    => 'Шрифт',
            'type'     => 'select', // выпадающий список select
            'choices'  => [ // список значений и лейблов выпадающего списка в виде ассоциативного массива
                'roboto'     => 'Roboto',
                'courier'   => 'Courier New'
            ]
        ] );

        // настройка
        $setting = 'footer_copyright_text';

        $wp_customize->add_setting( $setting, [
            'default'            => 'Все права защищены',
            'sanitize_callback'  => 'sanitize_text_field',
            'transport'          => $transport
        ] );

        $wp_customize->add_control( $setting, [
            'section'  => 'display_options', // id секции
            'label'    => 'Копирайт',
            'type'     => 'text' // текстовое поле
        ] );

    }

    // секция
    if( $section = 'advanced_options' ) {

        // Добавляем ещё одну секцию - Настройка слайдера
        $wp_customize->add_section( $section, [
            'title'    => 'Настройки фона',
            'priority' => 101,
        ] );

        // настройка
        $setting = 'bg_image';

        $wp_customize->add_setting( $setting, [
                'default'   => '', // по умолчанию - фоновое изображение не установлено
                'transport' => $transport
            ]
        );

        $wp_customize->add_control(
            new WP_Customize_Image_Control( $wp_customize, $setting, [
                'label'    => 'Фон сайта',
                'settings' => 'bg_image',
                'section'  => 'advanced_options'
            ] )
        );
    }

//==============================Slider Header=====================================================================

    // Добавляем ещё одну секцию - Настройки слайдера
    if($section = 'slider'){

        $wp_customize->add_section( $section, [
            'title'    => 'Настройки слайдера',
            'priority' => 20,
            'description' => 'Внешний вид слайдера', // описание не обязательное
        ] );

        $wp_customize->add_setting( 'slider_images_1', [
                'default'   => get_template_directory_uri() . "/img/black_bg_rose.jpg", // по умолчанию
                'transport' => $transport
            ]
        );
        $wp_customize->add_control(
            new WP_Customize_Image_Control( $wp_customize, 'slider_images_1', [
                'settings' => 'slider_images_1',
                'section'  => $section,
                'label' => esc_html__('Фон слайдера 1')
            ] ));


        $wp_customize->add_setting( 'slider_images_2', [
                'default'   => get_template_directory_uri() . "/img/blue_moon.jpg", // по умолчанию
                'transport' => $transport
            ]
        );
        $wp_customize->add_control(
            new WP_Customize_Image_Control( $wp_customize, 'slider_images_2', [
                'settings' => 'slider_images_2',
                'section'  => $section,
                'label' => esc_html__('Фон слайдера 2')
            ] ));

        $wp_customize->add_setting( 'slider_images_3', [
                'default'   => get_template_directory_uri() . "/img/black_golden_bg.jpg", // по умолчанию
                'transport' => $transport
            ]
        );
        $wp_customize->add_control(
            new WP_Customize_Image_Control( $wp_customize, 'slider_images_3', [
                'settings' => 'slider_images_3',
                'section'  => $section,
                'label' => esc_html__('Фон слайдера 3')
            ] ));
    }
//=================================== Menu ===================================================
    if($section = 'display menu') {

        $wp_customize->add_section($section, [
            'title' => 'Выбор расположения главного меню',
            'priority' => 30,
            'description' => 'Настройки отображения меню', // описание не обязательное
        ]);

        $setting = "display menu";


        $wp_customize->add_setting( $setting, [
                'default'   => 'top',     // этот шрифт будет задействован по умолчанию
                'type'      => 'theme_mod', // использовать get_theme_mod() для получения настроек, если указать 'option', то нужно будет использовать функцию get_option()
                'transport' => $transport
            ]
        );

        $wp_customize->add_control($setting, [
            'section'  => 'display menu', // секция
            'label'    => 'Меню',
            'type'     => 'select', // выпадающий список select
            'choices'  => [ // список значений и лейблов выпадающего списка в виде ассоциативного массива
                'top'    => 'Top-Меню',
                'main'   => 'Main-Меню'
            ]
        ]);
    }
//=================================== Aside ===================================================
    if($section = 'display aside') {

        $wp_customize->add_section($section, [
            'title' => 'Включение/отключение боковой панели',
            'priority' => 40,
            'description' => 'Настройки отображения боковой панели', // описание не обязательное
        ]);

        $setting = "display aside";


        $wp_customize->add_setting( $setting, [
                'default'   => 'none',     // этот шрифт будет задействован по умолчанию
                'type'      => 'theme_mod', // использовать get_theme_mod() для получения настроек, если указать 'option', то нужно будет использовать функцию get_option()
                'transport' => $transport
            ]
        );

        $wp_customize->add_control($setting, [
            'section'  => 'display aside', // секция
            'label'    => 'Aside',
            'type'     => 'select', // выпадающий список select
            'choices'  => [ // список значений и лейблов выпадающего списка в виде ассоциативного массива
                'block'  => 'Включить',
                'none'   => 'Выключить'
            ]
        ]);
    }

//===============================================================================================

    // Добавим кнопку в дизайн сайта в кастомайзере для быстрого перехода к текущей настройке
    // при transport = postMessage здесь можно указать функцию,
    // которая будет заменять часть дизайна (таким образом можно не писать JS код)
    if ( isset( $wp_customize->selective_refresh ) ){

        $wp_customize->selective_refresh->add_partial( $setting, [
            'selector'            => '.site-footer .inner',
            'container_inclusive' => false,
            'render_callback'     => 'footer_inner_dh5theme',
            'fallback_refresh'    => false, // Prevents refresh loop when document does not contain .cta-wrap selector. This should be fixed in WP 4.7.
        ] );

        // поправим стиль, чтобы кнопку было видно
        add_action( 'wp_head', function(){
            echo '<style>.site-footer .inner .customize-partial-edit-shortcut{ margin: 10px 0 0 38px; }</style>';
        } );

    }


}

function customizer_style_tag(){

    $style = [];

    $body_styles = [];


    switch( get_theme_mod( 'font' ) ){
        case 'roboto':
            $body_styles[] = 'font-family: Roboto, sans-serif;';
            break;
        case 'courier':
            $body_styles[] = 'font-family: "Courier New", Courier;';
            break;
        default:
            $body_styles[] = 'font-family: Roboto, sans-serif;';
            break;
    }

    if( 'inverse' === get_theme_mod( 'color_scheme' ) )
        $body_styles[] = 'background-color:#000; color:#fff;';
    else
        $body_styles[] = 'background-color:#fff; color:#000;';

    if( $bg_image = get_theme_mod( 'bg_image' ) ){
        $body_styles[] = "background-image: url( '$bg_image' );";
    }


    $style[] = '.item_1{ background: url( ' . get_theme_mod('slider_images_1') . ');
                              background-repeat: no-repeat;
                              background-position: center center;
                              background-size: cover;}';

    $style[] = '.item_2{ background: url( ' . get_theme_mod('slider_images_2') . ');
                          background-repeat: no-repeat;
                          background-position: center center;
                          background-size: cover;}';

    $style[] = '.item_3{ background: url( ' . get_theme_mod('slider_images_3') . ');
                          background-repeat: no-repeat;
                          background-position: center center;
                          background-size: cover;}';

    switch( get_theme_mod( 'display menu' ) ){
        case 'top':
            $style[] = ".main-navigation{ display: none;}";
            break;
        case 'main':
            $style[] = ".top-navigation{ display: none;}";
            break;
        default:
            $style[] = ".main-navigation{ display: none;}";
            break;
    }

    switch( get_theme_mod( 'display aside' ) ){
        case 'block':
            $style[] = ".aside{ display: block; width : 30%;}
                         .main{ width: 70%}";
            break;
        case 'none':
            $style[] = ".aside{ display: none;}
                         .main{ width: 90%}";
            break;
        default:
            $style[] = ".aside{ display: none;}
                         .main{ width: 90%}";
            break;
    }

    $style[] = 'body { '. implode( ' ', $body_styles ) .' }';
    $style[] = 'a { color: ' . get_theme_mod( 'link_color' ) . '; }';



//========================================================================================
    echo "<style>\n" . implode( "\n", $style ) . "\n</style>\n";
}

function customizer_js_file(){
    wp_enqueue_script( 'theme-customizer', get_stylesheet_directory_uri() . '/inc/js/theme-customizer.js', [ 'jquery', 'customize-preview' ], null, true );

}

