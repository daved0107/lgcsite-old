<?php
/**
 * Implement theme metabox.
 *
 * @package Master_Business
 */

if ( ! function_exists( 'master_business_add_theme_meta_box' ) ) :

	/**
	 * Add the Meta Box.
	 *
	 * @since 1.0.0
	 */
	function master_business_add_theme_meta_box() {

		$apply_metabox_post_types = array( 'post', 'page' );

		foreach ( $apply_metabox_post_types as $key => $type ) {
			add_meta_box(
				'master-business-theme-settings',
				esc_html__( 'Theme Settings', 'master-business' ),
				'master_business_render_theme_settings_metabox',
				$type
			);
		}

	}

endif;

add_action( 'add_meta_boxes', 'master_business_add_theme_meta_box' );

if ( ! function_exists( 'master_business_render_theme_settings_metabox' ) ) :

	/**
	 * Render theme settings meta box.
	 *
	 * @since 1.0.0
	 *
	 * @param WP_Post $post    The current post.
	 * @param array   $metabox Metabox arguments.
	 */
	function master_business_render_theme_settings_metabox( $post, $metabox ) {

		$post_id = $post->ID;

		// Meta box nonce for verification.
		wp_nonce_field( basename( __FILE__ ), 'master_business_theme_settings_meta_box_nonce' );

		// Fetch values of current post meta.
		$values = get_post_meta( $post_id, 'master_business_theme_settings', true );
		$master_business_theme_settings_post_layout = isset( $values['post_layout'] ) ? esc_attr( $values['post_layout'] ) : '';
		$master_business_theme_settings_single_image = isset( $values['single_image'] ) ? esc_attr( $values['single_image'] ) : '';
	?>
	<div id="master-business-settings-metabox-container" class="master-business-settings-metabox-container">
	  <ul>
	    <li><a href="#master-business-settings-metabox-tab-layout"><?php echo __( 'Layout', 'master-business' ); ?></a></li>
	    <li><a href="#master-business-settings-metabox-tab-image"><?php echo __( 'Image', 'master-business' ); ?></a></li>
	  </ul>
	  <div id="master-business-settings-metabox-tab-layout">
	    <h4><?php echo __( 'Layout Settings', 'master-business' ); ?></h4>
	    <div class="master-business-row-content">
	    	<label for="master_business_theme_settings_post_layout"><?php echo esc_html__( 'Single Layout', 'master-business' ); ?></label>
	    	<?php
	    	$dropdown_args = array(
				'id'          => 'master_business_theme_settings_post_layout',
				'name'        => 'master_business_theme_settings[post_layout]',
				'selected'    => $master_business_theme_settings_post_layout,
				'add_default' => true,
	    		);
	    	master_business_render_select_dropdown( $dropdown_args, 'master_business_get_global_layout_options' );
	    	?>

	    </div><!-- .master-business-row-content -->

	  </div><!-- #master-business-settings-metabox-tab-layout -->

	  <div id="master-business-settings-metabox-tab-image">
		    <h4><?php echo __( 'Image Settings', 'master-business' ); ?></h4>
		    <div class="master-business-row-content">
			    <label for="master_business_theme_settings_single_image"><?php echo esc_html__( 'Image in Single Post/Page', 'master-business' ); ?></label>
	        	<?php
	        	$dropdown_args = array(
	    			'id'          => 'master_business_theme_settings_single_image',
	    			'name'        => 'master_business_theme_settings[single_image]',
	    			'selected'    => $master_business_theme_settings_single_image,
	    			'add_default' => true,
	        		);
	        	master_business_render_select_dropdown( $dropdown_args, 'master_business_get_image_sizes_options', array( 'add_disable' => true, 'allowed' => array( 'disable', 'large' ), 'show_dimension' => false ) );
	        	?>
		    </div><!-- .master-business-row-content -->

	  </div><!-- #master-business-settings-metabox-tab-image -->

	</div><!-- #master-business-settings-metabox-container -->

    <?php
	}

endif;

if ( ! function_exists( 'master_business_save_theme_settings_meta' ) ) :

	/**
	 * Save theme settings meta box value.
	 *
	 * @since 1.0.0
	 *
	 * @param int     $post_id Post ID.
	 * @param WP_Post $post Post object.
	 */
	function master_business_save_theme_settings_meta( $post_id, $post ) {

		// Verify nonce.
		if (
			! ( isset( $_POST['master_business_theme_settings_meta_box_nonce'] )
			&& wp_verify_nonce( sanitize_key( $_POST['master_business_theme_settings_meta_box_nonce'] ), basename( __FILE__ ) ) )
		) {
			return;
		}

		// Bail if auto save or revision.
		if ( defined( 'DOING_AUTOSAVE' ) || is_int( wp_is_post_revision( $post ) ) || is_int( wp_is_post_autosave( $post ) ) ) {
			return;
		}

		// Check the post being saved == the $post_id to prevent triggering this call for other save_post events.
		if ( empty( $_POST['post_ID'] ) || absint( $_POST['post_ID'] ) !== $post_id ) {
			return;
		}

		// Check permission.
		if ( isset( $_POST['post_type'] ) && 'page' === $_POST['post_type'] ) {
			if ( ! current_user_can( 'edit_page', $post_id ) ) {
				return;
			}
		} else if ( ! current_user_can( 'edit_post', $post_id ) ) {
			return;
		}

		if ( isset( $_POST['master_business_theme_settings'] ) && is_array( $_POST['master_business_theme_settings'] ) ) {
			$raw_value = wp_unslash( $_POST['master_business_theme_settings'] );

			if ( ! array_filter( $raw_value ) ) {

				// No value.
				delete_post_meta( $post_id, 'master_business_theme_settings' );

			} else {

				$meta_fields = array(
					'post_layout' => array(
						'type' => 'select',
						),
					'single_image' => array(
						'type' => 'select',
						),
					);

				$sanitized_values = array();

				foreach ( $raw_value as $mk => $mv ) {

					if ( isset( $meta_fields[ $mk ]['type'] ) ) {
						switch ( $meta_fields[ $mk ]['type'] ) {
							case 'select':
								$sanitized_values[ $mk ] = sanitize_key( $mv );
								break;
							case 'checkbox':
								$sanitized_values[ $mk ] = absint( $mv ) > 0 ? 1 : 0;
								break;
							default:
								$sanitized_values[ $mk ] = sanitize_text_field( $mv );
								break;
						}
					} // End if.

				}

				update_post_meta( $post_id, 'master_business_theme_settings', $sanitized_values );
			}

		} // End if theme settings.

	}

endif;

add_action( 'save_post', 'master_business_save_theme_settings_meta', 10, 2 );
