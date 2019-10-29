<?php
/**
 * Update settings for Polylang : Custom Post Types and Logo
 *
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
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
		'en' => 'logo-en.svg',
		'fr' => 'logo-fr.svg',
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

//register a string called LOGO and put all links via wp-admin/string-translation in polylang
pll_register_string("LOGO","/images/Logo-blue-EN.svg"); // this url for default language
