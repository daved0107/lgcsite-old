<?php
/**
 * Helper functions related to customizer and options.
 *
 * @package Master_Business
 */

if ( ! function_exists( 'master_business_get_global_layout_options' ) ) :

	/**
	 * Returns global layout options.
	 *
	 * @since 1.0.0
	 *
	 * @return array Options array.
	 */
	function master_business_get_global_layout_options() {

		$choices = array(
			'left-sidebar'  => esc_html__( 'Primary Sidebar - Content', 'master-business' ),
			'right-sidebar' => esc_html__( 'Content - Primary Sidebar', 'master-business' ),
			'three-columns' => esc_html__( 'Three Columns', 'master-business' ),
			'no-sidebar'    => esc_html__( 'No Sidebar', 'master-business' ),
		);
		$output = apply_filters( 'master_business_filter_layout_options', $choices );
		return $output;

	}

endif;

if ( ! function_exists( 'master_business_get_breadcrumb_type_options' ) ) :

	/**
	 * Returns breadcrumb type options.
	 *
	 * @since 1.0.0
	 *
	 * @return array Options array.
	 */
	function master_business_get_breadcrumb_type_options() {

		$choices = array(
			'disabled' => esc_html__( 'Disabled', 'master-business' ),
			'simple'   => esc_html__( 'Enabled', 'master-business' ),
		);
		return $choices;

	}

endif;


if ( ! function_exists( 'master_business_get_archive_layout_options' ) ) :

	/**
	 * Returns archive layout options.
	 *
	 * @since 1.0.0
	 *
	 * @return array Options array.
	 */
	function master_business_get_archive_layout_options() {

		$choices = array(
			'full'    => esc_html__( 'Full Post', 'master-business' ),
			'excerpt' => esc_html__( 'Post Excerpt', 'master-business' ),
		);
		$output = apply_filters( 'master_business_filter_archive_layout_options', $choices );
		if ( ! empty( $output ) ) {
			ksort( $output );
		}
		return $output;

	}

endif;

if ( ! function_exists( 'master_business_get_image_sizes_options' ) ) :

	/**
	 * Returns image sizes options.
	 *
	 * @since 1.0.0
	 *
	 * @param bool  $add_disable True for adding No Image option.
	 * @param array $allowed Allowed image size options.
	 * @return array Image size options.
	 */
	function master_business_get_image_sizes_options( $add_disable = true, $allowed = array(), $show_dimension = true ) {

		global $_wp_additional_image_sizes;
		$get_intermediate_image_sizes = get_intermediate_image_sizes();
		$choices = array();
		if ( true === $add_disable ) {
			$choices['disable'] = esc_html__( 'No Image', 'master-business' );
		}
		$choices['thumbnail'] = esc_html__( 'Thumbnail', 'master-business' );
		$choices['medium']    = esc_html__( 'Medium', 'master-business' );
		$choices['large']     = esc_html__( 'Large', 'master-business' );
		$choices['full']      = esc_html__( 'Full (original)', 'master-business' );

		if ( true === $show_dimension ) {
			foreach ( array( 'thumbnail', 'medium', 'large' ) as $key => $_size ) {
				$choices[ $_size ] = $choices[ $_size ] . ' (' . get_option( $_size . '_size_w' ) . 'x' . get_option( $_size . '_size_h' ) . ')';
			}
		}

		if ( ! empty( $_wp_additional_image_sizes ) && is_array( $_wp_additional_image_sizes ) ) {
			foreach ( $_wp_additional_image_sizes as $key => $size ) {
				$choices[ $key ] = $key;
				if ( true === $show_dimension ) {
					$choices[ $key ] .= ' (' . $size['width'] . 'x' . $size['height'] . ')';
				}
			}
		}

		if ( ! empty( $allowed ) ) {
			foreach ( $choices as $key => $value ) {
				if ( ! in_array( $key, $allowed ) ) {
					unset( $choices[ $key ] );
				}
			}
		}

		return $choices;

	}

endif;

if ( ! function_exists( 'master_business_get_image_alignment_options' ) ) :

	/**
	 * Returns image alignment options.
	 *
	 * @since 1.0.0
	 *
	 * @return array Options array.
	 */
	function master_business_get_image_alignment_options() {

		$choices = array(
			'none'   => esc_html_x( 'None', 'alignment', 'master-business' ),
			'left'   => esc_html_x( 'Left', 'alignment', 'master-business' ),
			'center' => esc_html_x( 'Center', 'alignment', 'master-business' ),
			'right'  => esc_html_x( 'Right', 'alignment', 'master-business' ),
		);
		return $choices;

	}

endif;

if ( ! function_exists( 'master_business_get_slider_caption_alignment_options' ) ) :

	/**
	 * Returns slider caption alignment options.
	 *
	 * @since 1.0.0
	 *
	 * @return array Options array.
	 */
	function master_business_get_slider_caption_alignment_options() {

		$choices = array(
			'left'   => esc_html_x( 'Left', 'alignment', 'master-business' ),
			'center' => esc_html_x( 'Center', 'alignment', 'master-business' ),
			'right'  => esc_html_x( 'Right', 'alignment', 'master-business' ),
		);
		return $choices;

	}

endif;

if ( ! function_exists( 'master_business_get_featured_slider_transition_effects' ) ) :

	/**
	 * Returns the featured slider transition effects.
	 *
	 * @since 1.0.0
	 *
	 * @return array Options array.
	 */
	function master_business_get_featured_slider_transition_effects() {

		$choices = array(
			'fade'       => _x( 'fade', 'transition effect', 'master-business' ),
			'fadeout'    => _x( 'fadeout', 'transition effect', 'master-business' ),
			'none'       => _x( 'none', 'transition effect', 'master-business' ),
			'scrollHorz' => _x( 'scrollHorz', 'transition effect', 'master-business' ),
		);
		$output = apply_filters( 'master_business_filter_featured_slider_transition_effects', $choices );
		if ( ! empty( $output ) ) {
			ksort( $output );
		}
		return $output;

	}

endif;

if ( ! function_exists( 'master_business_get_featured_slider_content_options' ) ) :

	/**
	 * Returns the featured slider content options.
	 *
	 * @since 1.0.0
	 *
	 * @return array Options array.
	 */
	function master_business_get_featured_slider_content_options() {

		$choices = array(
			'home-page' => esc_html__( 'Static Front Page Only', 'master-business' ),
			'disabled'  => esc_html__( 'Disabled', 'master-business' ),
		);
		$output = apply_filters( 'master_business_filter_featured_slider_content_options', $choices );
		if ( ! empty( $output ) ) {
			ksort( $output );
		}
		return $output;

	}

endif;

if ( ! function_exists( 'master_business_get_featured_slider_type' ) ) :

	/**
	 * Returns the featured slider type.
	 *
	 * @since 1.0.0
	 *
	 * @return array Options array.
	 */
	function master_business_get_featured_slider_type() {

		$choices = array(
			'featured-page' => __( 'Featured Pages', 'master-business' ),
		);
		$output = apply_filters( 'master_business_filter_featured_slider_type', $choices );
		if ( ! empty( $output ) ) {
			ksort( $output );
		}
		return $output;

	}

endif;

if ( ! function_exists( 'master_business_get_numbers_dropdown_options' ) ) :

	/**
	 * Returns numbers dropdown options.
	 *
	 * @since 1.0.0
	 *
	 * @param int $min Min.
	 * @param int $max Max.
	 *
	 * @return array Options array.
	 */
	function master_business_get_numbers_dropdown_options( $min = 1, $max = 4 ) {

		$output = array();

		if ( $min <= $max ) {
			for ( $i = $min; $i <= $max; $i++ ) {
				$output[ $i ] = $i;
			}
		}

		return $output;

	}

endif;
