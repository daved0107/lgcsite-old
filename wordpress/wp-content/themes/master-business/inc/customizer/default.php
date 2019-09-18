<?php
/**
 * Default theme options.
 *
 * @package Master_Business
 */

if ( ! function_exists( 'master_business_get_default_theme_options' ) ) :

	/**
	 * Get default theme options.
	 *
	 * @since 1.0.0
	 *
	 * @return array Default theme options.
	 */
	function master_business_get_default_theme_options() {

		$defaults = array();

		// Header.
		$defaults['show_title']       = true;
		$defaults['show_tagline']     = true;
		$defaults['search_in_header'] = true;
		$defaults['buy_button_text']  = esc_html__( 'Buy Now', 'master-business' );
		$defaults['buy_button_url']   = '';

		// Layout.
		$defaults['global_layout']           = 'right-sidebar';
		$defaults['archive_layout']          = 'excerpt';
		$defaults['archive_image']           = 'large';
		$defaults['archive_image_alignment'] = 'center';
		$defaults['single_image']            = 'large';

		// Home Page.
		$defaults['home_content_status'] = true;

		// Footer.
		$defaults['copyright_text']        = esc_html__( 'Copyright &copy; All rights reserved.', 'master-business' );
		$defaults['show_social_in_footer'] = false;

		// Blog.
		$defaults['blog_title']         = esc_html__( 'Blog', 'master-business' );
		$defaults['excerpt_length']     = 40;
		$defaults['read_more_text']     = esc_html__( 'Read More', 'master-business' );
		$defaults['exclude_categories'] = '';

		// Breadcrumb.
		$defaults['breadcrumb_type'] = 'simple';

		// Slider Options.
		$defaults['featured_slider_status']              = 'disabled';
		$defaults['featured_slider_transition_effect']   = 'fadeout';
		$defaults['featured_slider_transition_delay']    = 3;
		$defaults['featured_slider_transition_duration'] = 1;
		$defaults['featured_slider_enable_caption']      = true;
		$defaults['featured_slider_caption_alignment']   = 'left';
		$defaults['featured_slider_enable_arrow']        = true;
		$defaults['featured_slider_enable_pager']        = true;
		$defaults['featured_slider_enable_autoplay']     = true;
		$defaults['featured_slider_enable_overlay']      = true;
		$defaults['featured_slider_type']                = 'featured-page';
		$defaults['featured_slider_number']              = 3;
		$defaults['featured_slider_read_more_text']      = esc_html__( 'Read More', 'master-business' );

		// Pass through filter.
		$defaults = apply_filters( 'master_business_filter_default_theme_options', $defaults );
		return $defaults;
	}

endif;
