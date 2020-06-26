<?php

require_once get_template_directory() . '/vendor/autoload.php';
require_once get_template_directory() . '/inc/template-tags.php';

function mrlini_theme_support()
{
    add_theme_support('title-tag');
    //add_theme_support( 'responsive-embeds' );
    add_theme_support('post-thumbnails');
}

add_action('after_setup_theme', 'mrlini_theme_support');


function mrlini_menus()
{
    $locations = array(
        'primary'  => __('Главное меню', 'mrlini'),
        'footer'   => __('Footer Menu', 'mrlini'),
    );

    register_nav_menus($locations);
}

add_action('init', 'mrlini_menus');


function mrlini_widgets_registration()
{
    register_sidebar(
        array(
        'name'        => 'Шапка',
        'id'          => 'top-right',
      )
  );


    register_sidebar(
        array(
                'name'        => 'Сайдбар #1',
                'id'          => 'sidebar-1',
            )
    );

    register_sidebar(
        array(
                'name'        => 'Подвал #1',
                'id'          => 'footer-1',
            )
    );

    register_sidebar(
        array(
                'name'        => 'Баннеры',
                'id'          => 'banners',
            )
    );


    register_sidebar(
        array(
                'name'        => 'Подвал #2',
                'id'          => 'footer-2',
            )
    );

    register_sidebar(
        array(
        'name'        => 'Подвал #3',
        'id'          => 'footer-3',
      )
  );
}

add_action('widgets_init', 'mrlini_widgets_registration');


function mrlini_scripts()
{
    wp_enqueue_script('mrlini', get_theme_file_uri('/dist/main.js'));
}
add_action('wp_enqueue_scripts', 'mrlini_scripts');


function my_search_form_text($text)
{
    $text = str_replace('value="Search"', 'value="Поиск"', $text); //set as value the text you want
    return $text;
}
add_filter('get_search_form', 'my_search_form_text');


function mrlini_carousel($atts)
{
    ob_start();
    get_template_part('template-parts/carousel');
    return ob_get_clean();
}
add_shortcode('carousel', 'mrlini_carousel');


function mytheme_custom_excerpt_length( $length ) {
    return 25;
}
add_filter( 'excerpt_length', 'mytheme_custom_excerpt_length', 999 );
