<?php
/**
 * Custom header setup.
 *
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

function lgp_custom_header_setup() {
$args = array(
    /// Default Header Image to display
    'default-image'      => get_template_directory_uri() . '/images/bulb-plant-homepage.jpg',
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
