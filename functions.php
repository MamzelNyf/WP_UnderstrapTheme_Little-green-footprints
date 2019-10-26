<?php
/**
 * Understrap functions and definitions
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$understrap_includes = array(
	'/theme-settings.php',                  // Initialize theme default settings.
	'/setup.php',                           // Theme setup and custom theme supports.
	'/widgets.php',                         // Register widget area.
	'/enqueue.php',                         // Enqueue scripts and styles.
	'/template-tags.php',                   // Custom template tags for this theme.
	'/pagination.php',                      // Custom pagination for this theme.
	'/hooks.php',                           // Custom hooks.
	'/extras.php',                          // Custom functions that act independently of the theme templates.
	'/customizer.php',                      // Customizer additions.
	'/custom-comments.php',                 // Custom Comments file.
	'/jetpack.php',                         // Load Jetpack compatibility file.
	'/class-wp-bootstrap-navwalker.php',    // Load custom WordPress nav walker.
	'/woocommerce.php',                     // Load WooCommerce functions.
	'/editor.php',                          // Load Editor functions.
	'/deprecated.php',                      // Load deprecated functions.
);

foreach ( $understrap_includes as $file ) {
	$filepath = locate_template( 'inc' . $file );
	if ( ! $filepath ) {
		trigger_error( sprintf( 'Error locating /inc%s for inclusion', $file ), E_USER_ERROR );
	}
	require_once $filepath;
}


//header
function lgp_custom_header_setup() {
    $args = array(
        /// Default Header Image to display
        'default-image'      =>'',
        // Display the header text along with the image
        'header-text'           => true,
        // Header text color default
        'default-text-color'        => '000',
        // Header image width (in pixels)
        'width'             => 2000,
        // Header image height (in pixels)
        'height'            => 1200,
        // Header image random rotation default
        'random-default'        => false,
        // Enable upload of image file in admin 
        'uploads'       => true,
        // Add support Video
        // 'video' => true,
        );
        add_theme_support( 'custom-header', $args );
}
add_action( 'after_setup_theme', 'lgp_custom_header_setup' );


//Update settings for Polylang plugin
//Enable Custom Post Category translation
add_filter('pll_get_post_types', 'add_cpt_to_pll', 10, 2);
function add_cpt_to_pll($post_types, $hide) {
    if ($hide)
        // hides 'my_cpt' from the list of custom post types in Polylang settings
        unset($post_types['ecolo-tips']);
    else
        // enables language and translation management for 'my_cpt'
        $post_types['ecolo-tips'] = 'ecolo-tips';
    return $post_types;
}

//Enable Logo change per Language
add_filter( 'get_custom_logo', 'my_polylang_logo' );
function my_polylang_logo() {
   if ( function_exists( 'pll_current_language' ) ) {
      $logos = array(
		'en' => 'logo-en.png',
		'fr' => 'logo-fr.png',
      );
      $current_lang = pll_current_language();
      $img_path = get_stylesheet_directory_uri() . '/images/';
      if ( isset( $logos[ $current_lang ] ) ) {
         $logo_url = $img_path . $logos[$current_lang];
      } else {
         $logo_url = $img_path . $logos['en'];
      }
      $home_url = home_url();
      $html = sprintf( '<a href="%1$s" rel="home" itemprop="url"><img class="lgf-logo" src="%2$s"></a>', esc_url( $home_url ), $logo_url);
   }
   return $html;   
}
