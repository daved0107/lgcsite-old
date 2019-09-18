<?php
function themefarmer_companion_scope_customize_register($wp_customize){
	
	/*contact us*/
		$wp_customize->add_setting('themefarmer_home_contact_heading', array(
			'default'           => esc_html__('Contact Us', 'themefarmer-companion'),
			'sanitize_callback' => 'sanitize_text_field',
			'transport'         => 'postMessage',
		));

		$wp_customize->add_control('themefarmer_home_contact_heading', array(
			'type'    => 'text',
			'label'   => esc_html__('Heading', 'themefarmer-companion'),
			'section' => 'themefarmer_home_contact_section',
		));

		$wp_customize->add_setting('themefarmer_home_contact_desc', array(
			'sanitize_callback' => 'sanitize_text_field',
			'transport'         => 'postMessage',
		));

		$wp_customize->add_control('themefarmer_home_contact_desc', array(
			'type'    => 'textarea',
			'label'   => esc_html__('Description', 'themefarmer-companion'),
			'section' => 'themefarmer_home_contact_section',
		));

		$wp_customize->add_setting('themefarmer_home_contact_form_heading', array(
			'default'           => esc_html__('Contact Us', 'themefarmer-companion'),
			'sanitize_callback' => 'sanitize_text_field',
			'transport'         => 'postMessage',
		));

		$wp_customize->add_control('themefarmer_home_contact_form_heading', array(
			'type'    => 'text',
			'label'   => esc_html__('Form Heading', 'themefarmer-companion'),
			'section' => 'themefarmer_home_contact_section',
		));

		$wp_customize->add_setting('themefarmer_home_contact_location_label', array(
			'default'           => esc_html__('Office Address', 'themefarmer-companion'),
			'sanitize_callback' => 'sanitize_text_field',
			'transport'         => 'postMessage',
		));

		$wp_customize->add_control('themefarmer_home_contact_location_label', array(
			'type'    => 'text',
			'label'   => esc_html__('Location Label', 'themefarmer-companion'),
			'section' => 'themefarmer_home_contact_section',
		));

		$wp_customize->add_setting('themefarmer_home_contact_location_details', array(
			'sanitize_callback' => 'wp_filter_post_kses',
			'transport'         => 'postMessage',
			'default'           => '123, block 3, <br> street no 5, <br> local, <br> city,<br> state',
		));

		$wp_customize->add_control('themefarmer_home_contact_location_details', array(
			'type'    => 'textarea',
			'label'   => esc_html__('Location Details', 'themefarmer-companion'),
			'section' => 'themefarmer_home_contact_section',
		));

		$wp_customize->add_setting('themefarmer_home_contact_us_label', array(
			'default'           => esc_html__('Give us a Call', 'themefarmer-companion'),
			'sanitize_callback' => 'sanitize_text_field',
			'transport'         => 'postMessage',
		));

		$wp_customize->add_control('themefarmer_home_contact_us_label', array(
			'type'    => 'text',
			'label'   => esc_html__('Contact Info Label', 'themefarmer-companion'),
			'section' => 'themefarmer_home_contact_section',
		));

		$wp_customize->add_setting('themefarmer_home_contact_us_details', array(
			'sanitize_callback' => 'wp_filter_post_kses',
			'transport'         => 'postMessage',
			'default'           => 'Jhon Doe <br> +01234567890 <br> Mon - Fri, 8:00-22:00',
		));

		$wp_customize->add_control('themefarmer_home_contact_us_details', array(
			'type'    => 'textarea',
			'label'   => esc_html__('Contact Info Details', 'themefarmer-companion'),
			'section' => 'themefarmer_home_contact_section',
		));
	/*contact us*/
}
add_action('customize_register', 'themefarmer_companion_scope_customize_register');