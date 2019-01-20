<?php
/**
 * Initialize  Importer
 */
$asp = 'add_'.'submenu_'.'page';

$settings      = array(
  'menu_parent' => 'themes.php',
  'menu_title'  => esc_html__('Wpop Demo Importer', 'opstore'),
  'menu_type'   => $asp,
  'menu_slug'   => 'wpop-import',
);

$opt_id = 'theme_mods_opstore';

/**
 * Front Page & Blog Page are page name strings. hence cannot be translated here
 */

$options        = array(

    'default' => array(
      'title'         => esc_html__('Default', 'opstore'),
      'preview_url'   => 'http://demo.wpoperation.com/opstore/default/',
      'front_page'    => 'Home', 
      'blog_page'     => 'Blog',
      'menus'         => array(
          'primary' => esc_html__( 'Menu 1', 'opstore' ),
          'top' => esc_html__( 'Top menu', 'opstore' ),
      ),
    ),

    'fashion' => array(
      'title'         => esc_html__('Fashion', 'opstore'),
      'preview_url'   => 'http://demo.wpoperation.com/opstore/fashion/',
      'front_page'    => 'Home', 
      'blog_page'     => 'Blog',
      'menus'         => array(
          'primary' => esc_html__( 'Main Menu', 'opstore' ),
      ),
    ),

    'clothing' => array(
      'title'         => esc_html__('Clothing', 'opstore'),
      'preview_url'   => 'http://demo.wpoperation.com/opstore/clothing/',
      'front_page'    => 'Home', 
      'blog_page'     => 'Blog',
      'menus'         => array(
          'primary' => esc_html__( 'Main Menu', 'opstore' ),
      ),
    ),

    'clothingv2' => array(
      'title'         => esc_html__('Clothing V2', 'opstore'),
      'preview_url'   => 'http://demo.wpoperation.com/opstore/clothingv2/',
      'front_page'    => 'Home', 
      'blog_page'     => 'Blog',
      'menus'         => array(
          'primary' => esc_html__( 'Main Menu', 'opstore' ),
          'top' => esc_html__( 'Top menu', 'opstore' ),
      ),
    ),

    'electronics' => array(
      'title'         => esc_html__('Electronics', 'opstore'),
      'preview_url'   => 'http://demo.wpoperation.com/opstore/electronics/',
      'front_page'    => 'Home', 
      'blog_page'     => 'Blog',
      'menus'         => array(
          'primary' => esc_html__( 'Main Menu', 'opstore' ),
      ),
    ),


);

if( class_exists( 'Wpop_Demo_Importer' ) ) {
    Wpop_Demo_Importer::instance( $settings, $options, $opt_id );
}


