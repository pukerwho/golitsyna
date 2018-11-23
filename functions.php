<?php
// Include your functions files here
include('inc/enqueues.php');
// Add your theme support ( cf :  http://codex.wordpress.org/Function_Reference/add_theme_support )
function customThemeSupport() {
    global $wp_version;
    add_theme_support( 'menus' );
    add_theme_support( 'post-thumbnails' );
    // let wordpress manage the title
    add_theme_support( 'title-tag' );
    //add_theme_support( 'custom-background', $args );
    //add_theme_support( 'custom-header', $args );
    // Automatic feed links compatibility
    if( version_compare( $wp_version, '3.0', '>=' ) ) {
        add_theme_support( 'automatic-feed-links' );
    } else {
        automatic_feed_links();
    }
}
add_action( 'after_setup_theme', 'customThemeSupport' );
// Content width
if( !isset( $content_width ) ) {
    // @TODO : edit the value for your own specifications
    $content_width = 960;
}
// Register menus, use wp_nav_menu() to display menu to your template ( cf : http://codex.wordpress.org/Function_Reference/wp_nav_menu )
register_nav_menus( array(
    'main_menu' => __( 'Menu principal', 'minimal-blank-theme' ) //@TODO : change i18n domain name to yours
) );
// Register sidebars
function registerThemeSidebars() {
    if( !function_exists( 'register_sidebar' ) ) {
        return;
    }
    register_sidebar( array(
        'name' => 'Main sidebar',
        'id' => 'main-sidebar',
        'description' => '',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ) );
}
add_action( 'widgets_init', 'registerThemeSidebars' );
function addAdminEditorStyle() {
    add_editor_style( get_stylesheet_directory_uri() . 'css/editor-style.css' );
};
// подключаем файлы со стилями
add_action( 'wp_enqueue_scripts', 'theme_name_scripts' );
function theme_name_scripts() {
    wp_enqueue_style( 'editor-style', get_stylesheet_directory_uri() . '/css/style.css' );
    wp_enqueue_script( 'bootstrap-js', get_template_directory_uri() . '/js/bootstrap.min.js');
    wp_enqueue_script( 'swiper', get_template_directory_uri() . '/js/swiper.min.js');
    wp_enqueue_script( 'lightbox', get_template_directory_uri() . '/js/lightbox.min.js');
    wp_enqueue_script( 'htmlmedia', get_template_directory_uri() . '/js/html5media.min.js');
    wp_enqueue_script( 'plyr', get_template_directory_uri() . '/js/plyr.min.js');
    wp_register_script( 'loadmore', get_stylesheet_directory_uri() . '/js/loadmore.js', array('jquery') );
    wp_register_script( 'myscripts', get_template_directory_uri() . '/js/scripts.js');

    wp_localize_script( 'loadmore', 'loadmore_params', array(
        'ajaxurl' => site_url() . '/wp-admin/admin-ajax.php', 
        'posts' => json_encode( $wp_query->query_vars ), 
        'current_page' => get_query_var( 'paged' ) ? get_query_var('paged') : 1,
        'max_page' => $wp_query->max_num_pages
    ) );
 
    wp_enqueue_script( 'loadmore' );
    wp_enqueue_script( 'myscripts' );
};

//подключаем стили к админке
function load_custom_wp_admin_style() {
        wp_register_style( 'custom_wp_admin_css', get_template_directory_uri() . '/css/admin-style.css', false, '1.0.0' );
        wp_enqueue_style( 'custom_wp_admin_css' );
}
add_action( 'admin_enqueue_scripts', 'load_custom_wp_admin_style' );

function loadmore_ajax_handler(){
 
    // prepare our arguments for the query
    $args = json_decode( stripslashes( $_POST['query'] ), true );
    $args['paged'] = $_POST['page'] + 1; 
    $args['post_status'] = 'publish';
 
   
    query_posts( $args );
 
    if( have_posts() ) :
 
        
        while( have_posts() ): the_post();
            get_template_part( 'blocks/default/loop', 'default' );
        
        endwhile;
 
    endif;
    die; 
}

add_action('wp_ajax_loadmore', 'loadmore_ajax_handler'); 
add_action('wp_ajax_nopriv_loadmore', 'loadmore_ajax_handler'); 

function create_post_type() {
  register_post_type( 'photoalbums',
    array(
      'labels' => array(
        'name' => __( 'Фотоальбомы' ),
        'singular_name' => __( 'Фотоальбом' )
      ),
      'public' => true,
      'has_archive' => true,
      'hierarchical' => true,
      'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' ),
    )
  );
  register_post_type( 'videos',
    array(
      'labels' => array(
        'name' => __( 'Видео' ),
        'singular_name' => __( 'Видео' )
      ),
      'public' => true,
      'has_archive' => true,
      'hierarchical' => true,
      'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' ),
    )
  );
  register_post_type( 'slider',
    array(
      'labels' => array(
        'name' => __( 'Слайдер' ),
        'singular_name' => __( 'Слайд' )
      ),
      'public' => true,
      'has_archive' => true,
      'hierarchical' => true,
      'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' ),
    )
  );
  register_post_type( 'afisha',
    array(
      'labels' => array(
        'name' => __( 'Афиша' ),
        'singular_name' => __( 'Афиша' )
      ),
      'public' => true,
      'has_archive' => true,
      'hierarchical' => true,
      'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' ),
    )
  );
}
add_action( 'init', 'create_post_type' );

function your_prefix_get_meta_box( $meta_boxes ) {
    $prefix = 'meta-';

    $meta_boxes[] = array(
        'id' => 'slider-info',
        'title' => esc_html__( 'Информация', 'slider-info' ),
        'post_types' => array( 'slider' ),
        'context' => 'advanced',
        'priority' => 'default',
        'autosave' => true,
        'fields' => array(
          array(
            'id' => $prefix . 'slider-description',
            'type' => 'text',
            'name' => esc_html__( 'Описание', 'slider-info' ),
          ),
          array(
            'id' => $prefix . 'slider-button',
            'type' => 'text',
            'name' => esc_html__( 'Название кнопки', 'slider-info' ),
          ),
          array(
            'id' => $prefix . 'slider-button-link',
            'type' => 'text',
            'name' => esc_html__( 'Ссылка на кнопке', 'slider-info' ),
          ),
        ),
    );

    $meta_boxes[] = array(
        'id' => 'video-info',
        'title' => esc_html__( 'Информация', 'videos-info' ),
        'post_types' => array( 'videos' ),
        'context' => 'advanced',
        'priority' => 'default',
        'autosave' => true,
        'fields' => array(
          array(
            'id' => $prefix . 'video-iframe',
            'type' => 'text',
            'name' => esc_html__( 'Вставьте код', 'videos-info' ),
          ),
        ),
    );

    $meta_boxes[] = array(
        'id' => 'albums-info',
        'title' => esc_html__( 'Информация', 'albums-info' ),
        'post_types' => array( 'photoalbums' ),
        'context' => 'advanced',
        'priority' => 'default',
        'autosave' => true,
        'fields' => array(
          array(
            'id' => $prefix . 'images',
            'type' => 'image_advanced',
            'name' => esc_html__( 'Фото', 'albums-info' ),
          ),
        ),
    );

    $meta_boxes[] = array(
        'id' => 'afisha-info',
        'title' => esc_html__( 'Информация', 'afisha-info' ),
        'post_types' => array( 'afisha' ),
        'context' => 'advanced',
        'priority' => 'default',
        'autosave' => true,
        'fields' => array(
          array(
            'id' => $prefix . 'afisha-day',
            'type' => 'text',
            'name' => esc_html__( 'День', 'afisha-day' ),
          ),
          array(
            'id' => $prefix . 'afisha-month',
            'type' => 'text',
            'name' => esc_html__( 'Месяц', 'afisha-month' ),
          ),
          array(
            'id' => $prefix . 'afisha-year',
            'type' => 'text',
            'name' => esc_html__( 'Год', 'afisha-year' ),
          ),
          array(
            'id' => $prefix . 'afisha-link',
            'type' => 'text',
            'name' => esc_html__( 'Ссылка', 'afisha-link' ),
          ),
        ),
    );
    return $meta_boxes;
}
add_filter( 'rwmb_meta_boxes', 'your_prefix_get_meta_box' );

function add_theme_menu_item() {
    add_menu_page("Theme Settings", "Theme Settings", "manage_options", "theme-settings", "theme_settings_page", null, 99);
    //register our settings
    register_setting( 'my-settings-group', 'facebook_link' );
    register_setting( 'my-settings-group', 'twitter_link' );
    register_setting( 'my-settings-group', 'google_link' );
    register_setting( 'my-settings-group', 'pinterest_link' );
    register_setting( 'my-settings-group', 'google_analytics' );
    register_setting( 'my-settings-group', 'jivosite_code' );
}

add_action("admin_menu", "add_theme_menu_item");

function theme_settings_page() {
    include 'form-file.php';
}