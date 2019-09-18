<?php
/**
 * Sample implementation of the Custom Header feature
 *
 * You can add an optional custom header image to header.php like so ...
 *
	<?php the_header_image_tag(); ?>
 *
 * @link https://developer.wordpress.org/themes/functionality/custom-headers/
 *
 * @package scope
 */

/**
 * Set up the WordPress core custom header feature.
 *
 * @uses scope_header_style()
 */
function scope_custom_header_setup() {
	add_theme_support( 'custom-header', apply_filters( 'scope_custom_header_args', array(
		'default-image'          => get_template_directory_uri().'/images/header-image.jpg',
		'flex-height'            => true,
		'header-text' 			=> false,
	) ) );
}
add_action( 'after_setup_theme', 'scope_custom_header_setup' );
