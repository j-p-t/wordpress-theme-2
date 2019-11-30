<?php

function theme_enqueue_styles() {
  wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css' );
  wp_enqueue_style( 'core', get_template_directory_uri() . '/style.css' );
}

add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles');

function theme_enqueue_scripts() {
  wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', array( 'jquery' ) );
}

add_action( 'wp_enqueue_scripts', 'theme_enqueue_scripts');


function theme_add_widgets() {
    register_sidebar(array(
      'id' => 'left-sidebar',
      'name' => 'Left Sidebar',
      'before_widget' => '<br><div class = "widgetizedArea">',
      'after_widget' => '</div>',
      'before_title' => '<h3><small><strong>',
      'after_title' => '</h3></small></strong>',
    ));
    register_sidebar(array(
      'id' => 'right-sidebar',
      'name' => 'Right Sidebar',
      'before_widget' => '<br><div class = "widgetizedArea">',
      'after_widget' => '</div>',
      'before_title' => '<h3><small><strong>',
      'after_title' => '</h3></small></strong>',
    ));
}

function theme_add_menus() {
  register_nav_menus(
    array(
      'custom-nav-bar-menu' => __( 'Nav Bar Menu' ),
    )
  );
}

if ( ! function_exists( 'get_menu_by_location' ) ):
  function get_menu_by_location( $location ) {
    if( empty($location) ) return false;
    $locations = get_nav_menu_locations();
    if( ! isset( $locations[$location] ) ) return false;
    $menu_obj = get_term( $locations[$location], 'nav_menu' );
    return $menu_obj;
}
endif;

add_action( 'init', 'theme_add_menus' );
 
add_action('widgets_init', 'theme_add_widgets');

?>