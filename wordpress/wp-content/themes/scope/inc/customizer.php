<?php
/**
 * Scope Theme Customizer
 *
 * @package Scope
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function scope_customize_register($wp_customize) {

	/*Panels Start*/
	$wp_customize->add_panel('themefarmer_fontpage_panel', array(
		'title'    => __('Frontpage Sections', 'scope'),
		'priority' => 20,
	));

	$wp_customize->add_panel('scope_header_options_panel', array(
		'title'    => __('Header Options', 'scope'),
		'priority' => 55,
	));
	/*Panel End*/

/** Recent Posts **/

	$wp_customize->add_section('themefarmer_home_blog_section', array(
		'title' => __('Blog', 'scope'),
		'panel' => 'themefarmer_fontpage_panel',
	));

	$wp_customize->add_setting('themefarmer_home_blog_heading', array(
		'default'           => __('Latest Posts', 'scope'),
		'sanitize_callback' => 'sanitize_text_field',
	));

	$wp_customize->add_control('themefarmer_home_blog_heading', array(
		'type'    => 'text',
		'label'   => __('Heading', 'scope'),
		'section' => 'themefarmer_home_blog_section',
	));

	$wp_customize->add_setting('themefarmer_home_blog_desc', array(
		'default'           => __('Description Latest Posts', 'scope'),
		'sanitize_callback' => 'sanitize_text_field',
	));

	$wp_customize->add_control('themefarmer_home_blog_desc', array(
		'type'    => 'text',
		'label'   => __('Description', 'scope'),
		'section' => 'themefarmer_home_blog_section',
	));

	$wp_customize->add_setting('themefarmer_home_blog_count', array(
		'default'           => 10,
		'sanitize_callback' => 'absint',
	));

	$wp_customize->add_control('themefarmer_home_blog_count', array(
		'type'    => 'number',
		'section' => 'themefarmer_home_blog_section',
		'label'   => __('Post Count', 'scope'),
	));

/** Recent Posts **/

/* callout */

	$wp_customize->add_section('themefarmer_home_callout_section', array(
		'title' => __('Callout', 'scope'),
		'panel' => 'themefarmer_fontpage_panel',
	));

	$wp_customize->add_setting('scope_home_callout_text', array(
		'default'           => __('Enter your text here', 'scope'),
		'sanitize_callback' => 'sanitize_text_field',
	));

	$wp_customize->add_control('scope_home_callout_text', array(
		'type'    => 'text',
		'section' => 'themefarmer_home_callout_section',
		'label'   => __('Text', 'scope'),
	));

	$wp_customize->add_setting('scope_home_callout_label', array(
		'default'           => __('Learn More', 'scope'),
		'sanitize_callback' => 'sanitize_text_field',
	));

	$wp_customize->add_control('scope_home_callout_label', array(
		'type'    => 'text',
		'section' => 'themefarmer_home_callout_section',
		'label'   => __('Button Label', 'scope'),
	));

	$wp_customize->add_setting('scope_home_callout_link', array(
		'sanitize_callback' => 'esc_url_raw',
		'default'           => '#link',
	));
	$wp_customize->add_control('scope_home_callout_link', array(
		'type'    => 'text',
		'section' => 'themefarmer_home_callout_section',
		'label'   => __('Button Link', 'scope'),
	));

/* callout */

/*home subscribe*/

	$wp_customize->add_section('themefarmer_home_subscribe_section', array(
		'title' => esc_html__('Subscribe', 'scope'),
		'panel' => 'themefarmer_fontpage_panel',
	));

	$wp_customize->add_setting('themefarmer_home_subscribe_heading', array(
		'default'           => __('Newsletter', 'scope'),
		'sanitize_callback' => 'sanitize_text_field',
	));

	$wp_customize->add_control('themefarmer_home_subscribe_heading', array(
		'type'    => 'text',
		'label'   => __('Heading', 'scope'),
		'section' => 'themefarmer_home_subscribe_section',
	));

	$wp_customize->add_setting('themefarmer_home_subscribe_desc', array(
		'sanitize_callback' => 'sanitize_text_field',
	));

	$wp_customize->add_control('themefarmer_home_subscribe_desc', array(
		'type'    => 'text',
		'label'   => __('Description', 'scope'),
		'section' => 'themefarmer_home_subscribe_section',
	));

	$wp_customize->add_setting('scope_plugin_needed_ultimate_subscribe', array(
		'sanitize_callback' => 'scope_sanitize_html',
		'capability'        => 'administrator',
	));

	$wp_customize->add_control(new Scope_Plugin_Install_Control($wp_customize, 'scope_plugin_needed_ultimate_subscribe', array(
		'label'       => __('Install Ultimate Subscribe', 'scope'),
		'description' => __('This plugin will show subscribe form section. Please install and Activate Ultimate Subscribe plugin to use this section.', 'scope'),
		'section'     => 'themefarmer_home_subscribe_section',
		'name'        => __('Ultimate Subscribe', 'scope'),
		'slug'        => 'ultimate-subscribe',
	)));
/*home subscribe*/

/** Recent Products **/

	$wp_customize->add_section('themefarmer_home_products_latest_section', array(
		'title' => __('Products', 'scope'),
		'panel' => 'themefarmer_fontpage_panel',
	));

	if (!scope_is_wc()) {
		$wp_customize->add_setting('scope_woocommerce_needed', array(
			'type'              => 'theme_mod',
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'scope_sanitize_html',
		));

		$wp_customize->add_control(new Scope_Info_Text($wp_customize, 'scope_woocommerce_needed', array(
			'label'       => __('Install WooCommerce', 'scope'),
			'description' => __('This section show products from WooCommerce. Please install and Activate WooCommerce plugin to use this section.', 'scope'),
			'priority'    => 1,
			'section'     => 'themefarmer_home_products_latest_section',
		)));
	}

	$wp_customize->add_setting('scope_home_products_latest_heading', array(
		'default'           => __('Latest Products', 'scope'),
		'sanitize_callback' => 'sanitize_text_field',
	));

	$wp_customize->add_control('scope_home_products_latest_heading', array(
		'type'    => 'text',
		'section' => 'themefarmer_home_products_latest_section',
		'label'   => __('Heading', 'scope'),
	));

	$wp_customize->add_setting('scope_home_products_latest_desc', array(
		'default'           => __('Description Latest Product', 'scope'),
		'sanitize_callback' => 'sanitize_text_field',
	));

	$wp_customize->add_control('scope_home_products_latest_desc', array(
		'type'    => 'text',
		'section' => 'themefarmer_home_products_latest_section',
		'label'   => __('Description', 'scope'),
	));

	$wp_customize->add_setting('scope_home_products_latest_count', array(
		'default'           => 15,
		'sanitize_callback' => 'absint',
	));

	$wp_customize->add_control('scope_home_products_latest_count', array(
		'type'    => 'number',
		'section' => 'themefarmer_home_products_latest_section',
		'label'   => __('Product Count', 'scope'),
	));

/** Recent Products **/

/* theme color*/
	$wp_customize->add_setting('scope_theme_primary_color', array(
		'sanitize_callback' => 'sanitize_hex_color',
		'default'           => '#cd63df',
	));

	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'scope_theme_primary_color', array(
		'label'    => __('Primary Color', 'scope'),
		'section'  => 'colors',
		'priority' => 1,
	)));
/* theme color*/

/* typography start*/
	if (class_exists('ThemeFarmer_Field_Font_Selector')) {

		$wp_customize->add_panel('scope_typography_panel', array(
			'title'    => __('Typography Options', 'scope'),
			'priority' => 30,
		));

		$wp_customize->add_section('scope_body_typography', array(
			'title'    => __('Body Typography', 'scope'),
			'panel'    => 'scope_typography_panel',
			'priority' => 10,
		));

		$wp_customize->add_setting('themefarmer_body_font_family', array(
			'sanitize_callback' => 'sanitize_text_field',
			'transport'         => 'postMessage',
		));

		$wp_customize->add_control(new ThemeFarmer_Field_Font_Selector($wp_customize, 'themefarmer_body_font_family', array(
			'label'    => esc_html__('Body Font', 'scope'),
			'section'  => 'scope_body_typography',
			'priority' => 30,
		)));
	}

	if (class_exists('ThemeFarmer_Field_Range')) {
		$wp_customize->add_setting('themefarmer_body_font_size', array(
			'sanitize_callback' => 'sanitize_text_field',
			'transport'         => 'postMessage',
			'default'           => 10,
		));

		$wp_customize->add_control(new ThemeFarmer_Field_Range($wp_customize, 'themefarmer_body_font_size', array(
			'section'    => 'scope_body_typography',
			'label'      => esc_html__('Font Size', 'scope'),
			'responsive' => false,
		)));
	}

	if (class_exists('ThemeFarmer_Field_Tabs')) {

		$wp_customize->add_setting('scope_body_typography_tabs', array(
			'sanitize_callback' => 'sanitize_text_field',
			'transport'         => 'postMessage',
		));

		$wp_customize->add_control(new ThemeFarmer_Field_Tabs($wp_customize, 'scope_body_typography_tabs', array(
			'section' => 'scope_body_typography',
			'tabs'    => array(
				'body_font_family' => array(
					'icon'     => 'fa-font',
					'name'     => esc_html__('Body Font', 'scope'),
					'controls' => array('themefarmer_body_font_family'),
				),
				'body_font_size'   => array(
					'icon'     => 'fa-text-height',
					'name'     => esc_html__('Body Font Size', 'scope'),
					'controls' => array('themefarmer_body_font_size'),
				),
			),
		)));
	}
/* typography end */

/* page layout*/
	if (class_exists('ThemeFarmer_Field_Image_Select')) {
		$wp_customize->add_panel('scope_appearance_panel', array(
			'title'    => __('Page Layouts', 'scope'),
			'priority' => 30,
		));

		$wp_customize->add_section('scope_blog_page_layouts_section', array(
			'title'    => __('Blog Layout', 'scope'),
			'panel'    => 'scope_appearance_panel',
			'priority' => 10,
		));

		$wp_customize->add_setting('scope_blog_post_index_layout', array(
			'sanitize_callback' => 'sanitize_text_field',
			'default'           => 'right',
		));

		$wp_customize->add_control(new ThemeFarmer_Field_Image_Select($wp_customize, 'scope_blog_post_index_layout', array(
			'label'   => __('All Posts Page Layout', 'scope'),
			'section' => 'scope_blog_page_layouts_section',
			'choices' => array(
				'left'  => esc_url(get_template_directory_uri() . '/images/layout/2cleft.png'),
				'full'  => esc_url(get_template_directory_uri() . '/images/layout/full.png'),
				'right' => esc_url(get_template_directory_uri() . '/images/layout/2cright.png'),
			),
		)));

		$wp_customize->add_setting('scope_blog_single_post_layout', array(
			'sanitize_callback' => 'sanitize_text_field',
			'default'           => 'right',
		));

		$wp_customize->add_control(new ThemeFarmer_Field_Image_Select($wp_customize, 'scope_blog_single_post_layout', array(
			'label'   => __('Single Post Layout', 'scope'),
			'section' => 'scope_blog_page_layouts_section',
			'choices' => array(
				'left'  => esc_url(get_template_directory_uri() . '/images/layout/2cleft.png'),
				'full'  => esc_url(get_template_directory_uri() . '/images/layout/full.png'),
				'right' => esc_url(get_template_directory_uri() . '/images/layout/2cright.png'),
			),
		)));

		$wp_customize->add_setting('scope_blog_single_page_layout', array(
			'sanitize_callback' => 'sanitize_text_field',
			'default'           => 'right',
		));

		$wp_customize->add_control(new ThemeFarmer_Field_Image_Select($wp_customize, 'scope_blog_single_page_layout', array(
			'label'   => __('Single Page Layout', 'scope'),
			'section' => 'scope_blog_page_layouts_section',
			'choices' => array(
				'left'  => esc_url(get_template_directory_uri() . '/images/layout/2cleft.png'),
				'full'  => esc_url(get_template_directory_uri() . '/images/layout/full.png'),
				'right' => esc_url(get_template_directory_uri() . '/images/layout/2cright.png'),
			),
		)));
	}
/* page layout end */	

	$wp_customize->add_section('scope_pro_features_section', array(
		'title'    => __('View PRO Features', 'scope'),
		'priority' => 1,
	));

	$wp_customize->add_setting('scope_upsale_control', array(
		'sanitize_callback' => 'sanitize_text_field',
	));

	$wp_customize->add_control(new Scope_Upsale_Customize_Control($wp_customize, 'scope_upsale_control', array(
		'section' => 'scope_pro_features_section',
		'link'    => 'https://www.themefarmer.com/product/scope-pro/?utm_source=customizer&utm_medium=scope-pro-link&utm_campaign=upgrade-to-pro',
	)));

	$wp_customize->get_section('title_tagline')->priority = 10;
	if (function_exists('themefarmer_companion')) {
		$wp_customize->get_section('themefarmer_home_products_latest_section')->priority = 40;
		$wp_customize->get_section('themefarmer_home_callout_section')->priority         = 60;
		$wp_customize->get_section('themefarmer_home_subscribe_section')->priority       = 90;
		$wp_customize->get_section('themefarmer_home_blog_section')->priority            = 100;
	}

	$wp_customize->get_setting('blogname')->transport                           = 'postMessage';
	$wp_customize->get_setting('blogdescription')->transport                    = 'postMessage';
	$wp_customize->get_setting('header_textcolor')->transport                   = 'postMessage';
	$wp_customize->get_setting('themefarmer_home_blog_heading')->transport      = 'postMessage';
	$wp_customize->get_setting('themefarmer_home_blog_desc')->transport         = 'postMessage';
	$wp_customize->get_setting('scope_home_products_latest_heading')->transport = 'postMessage';
	$wp_customize->get_setting('scope_home_products_latest_desc')->transport    = 'postMessage';
	$wp_customize->get_setting('scope_home_callout_text')->transport            = 'postMessage';
	$wp_customize->get_setting('scope_home_callout_label')->transport           = 'postMessage';
	$wp_customize->get_setting('themefarmer_home_subscribe_heading')->transport = 'postMessage';
	$wp_customize->get_setting('themefarmer_home_subscribe_desc')->transport    = 'postMessage';

	if (isset($wp_customize->selective_refresh)) {
		$wp_customize->selective_refresh->add_partial('blogname', array(
			'selector'        => '.site-title a',
			'render_callback' => 'scope_customize_partial_blogname',
		));

		$wp_customize->selective_refresh->add_partial('blogdescription', array(
			'selector'        => '.site-description',
			'render_callback' => 'scope_customize_partial_blogdescription',
		));

		$wp_customize->selective_refresh->add_partial('themefarmer_home_blog_heading', array(
			'selector'        => '.section-blog .section-title',
			'render_callback' => 'scope_home_blog_heading_partial',
		));

		$wp_customize->selective_refresh->add_partial('themefarmer_home_blog_desc', array(
			'selector'        => '.section-blog .section-description',
			'render_callback' => 'scope_home_blog_desc_partial',
		));

		$wp_customize->selective_refresh->add_partial('scope_home_products_latest_desc', array(
			'selector'        => '.section-products-latest .section-description',
			'render_callback' => 'scope_home_products_latest_desc_partial',
		));

		$wp_customize->selective_refresh->add_partial('scope_home_products_latest_heading', array(
			'selector'        => '.section-products-latest .section-title',
			'render_callback' => 'scope_home_products_latest_heading_partial',
		));

		$wp_customize->selective_refresh->add_partial('scope_home_callout_text', array(
			'selector'        => '.section-callout .section-title',
			'render_callback' => 'scope_home_callout_text_partial',
		));

		$wp_customize->selective_refresh->add_partial('scope_home_callout_label', array(
			'selector'        => '.section-callout a.btn-read-more',
			'render_callback' => 'scope_home_callout_label_partial',
		));

		$wp_customize->selective_refresh->add_partial('themefarmer_home_subscribe_heading', array(
			'selector'        => '.section-subscribe .section-title',
			'render_callback' => 'themefarmer_home_subscribe_heading_partial',
		));

		$wp_customize->selective_refresh->add_partial('themefarmer_home_subscribe_desc', array(
			'selector'        => '.section-subscribe .section-description',
			'render_callback' => 'themefarmer_home_subscribe_desc_partial',
		));
	}
}
add_action('customize_register', 'scope_customize_register');

function scope_customize_register_last($wp_customize){

	$home_sectionss = array('services', 'about', 'products-latest', 'team', 'callout', 'testimonials', 'brands', 'subscribe', 'blog', 'contact');
	foreach ($home_sectionss as $key => $section) {
		$section_name = str_replace('-', '_', $section);
		$section_name = str_replace(' ', '_', $section_name);
		$scph_section = $wp_customize->get_section('themefarmer_home_' . $section_name . '_section');
		if($scph_section){
			$wp_customize->add_setting('scope_is_enable_section_' . $section_name, array(
				'default'           => true,
				'sanitize_callback' => 'scope_sanitize_checkbox',
			));

			$wp_customize->add_control('scope_is_enable_section_' . $section_name, array(
				'type'     => 'checkbox',
				'label'    => __('Enable/Disable Section', 'scope'),
				'section'  => 'themefarmer_home_' . $section_name . '_section',
				'priority' => 5,
			));
		}
	}
}
add_action('customize_register', 'scope_customize_register_last', 999);

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function scope_customize_partial_blogname() {
	bloginfo('name');
}

function scope_customize_partial_blogdescription() {
	bloginfo('description');
}

function scope_home_blog_heading_partial() {
	return esc_html(get_theme_mod('themefarmer_home_blog_heading'));
}

function scope_home_blog_desc_partial() {
	return esc_html(get_theme_mod('themefarmer_home_blog_desc'));
}

function scope_home_products_latest_desc_partial() {
	return esc_html(get_theme_mod('scope_home_products_latest_desc'));
}

function scope_home_products_latest_heading_partial() {
	return esc_html(get_theme_mod('scope_home_products_latest_heading'));
}

function scope_home_callout_text_partial() {
	return esc_html(get_theme_mod('scope_home_callout_text'));
}

function scope_home_callout_label_partial() {
	return esc_html(get_theme_mod('scope_home_callout_label'));
}

function themefarmer_home_subscribe_heading_partial() {
	return esc_html(get_theme_mod('themefarmer_home_subscribe_heading'));
}
function themefarmer_home_subscribe_desc_partial() {
	return esc_html(get_theme_mod('themefarmer_home_subscribe_desc'));
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function scope_customize_preview_js() {
	wp_enqueue_script('scope-customizer', get_template_directory_uri() . '/js/customizer.js', array('customize-preview'), '20151215', true);
}
add_action('customize_preview_init', 'scope_customize_preview_js');

if (class_exists('WP_Customize_Control')):
	class Scope_Info_Text extends WP_Customize_Control {

		public function render_content() {
			?>
		    <span class="customize-control-title">
				<?php echo esc_html($this->label); ?>
			</span>

			<?php if ($this->description):?>
				<span class="description customize-control-description">
				<?php echo wp_kses_post($this->description); ?>
				</span>
			<?php endif;
		}
	}

	class Scope_Upsale_Customize_Control extends WP_Customize_Control {
		public $type = 'themefarmer-upsale';
		public $link = '';
		protected function render_content() {
			?>
			<div class="themefarmer-upsale-control">
				<ul class="themefarmer-pro-features">
					<li><span class="tf-pro-upsale-label">PRO</span> <span class="tf-pro-upsale-text"><?php esc_html_e('Advance Slider for Mobile & tablet device', 'scope');?></span></li>
					<li><span class="tf-pro-upsale-label">PRO</span> <span class="tf-pro-upsale-text"><?php esc_html_e('FrontPage Section Reorder ', 'scope');?></span></li>
					<li><span class="tf-pro-upsale-label">PRO</span> <span class="tf-pro-upsale-text"><?php esc_html_e('Portfolio ', 'scope');?></span></li>
					<li><span class="tf-pro-upsale-label">PRO</span> <span class="tf-pro-upsale-text"><?php esc_html_e('Pricing Plan Section (one click add, reorder)', 'scope');?></span></li>
					<li><span class="tf-pro-upsale-label">PRO</span> <span class="tf-pro-upsale-text"><?php esc_html_e('FrontPage Sections 17+(Pre Built) and Unlimited Section by Shortcode and widgets ', 'scope');?></span></li>
					<li><span class="tf-pro-upsale-label">PRO</span> <span class="tf-pro-upsale-text"><?php esc_html_e('15+ Page Templates for (Contact, About, Portfolio etc..)  Page', 'scope');?></span></li>
					<li><span class="tf-pro-upsale-label">PRO</span> <span class="tf-pro-upsale-text"><?php esc_html_e('Live Chat Support', 'scope');?></span></li>
				</ul>
				<a href="<?php echo esc_url($this->link); ?>" target="_blank" class="button button-primary themefarmer-upsale-bt" id="themefarmer-pro-button"><?php esc_html_e('Get The PRO Version! ', 'scope');?></a>
				<hr>
				<ul class="themefarmer-pro-more">
					<li><?php esc_html_e('Advance Slider -> select different version of images  for mobile, tablet and desktop devices', 'scope');?></li>
					<li><?php esc_html_e('Reorder, enable/disable FrontPage sections by drag and drop.', 'scope');?></li>
					<li><?php esc_html_e('Advance Portfolio to show your Projects. set Project link, images, start date, end date, client link', 'scope');?></li>
					<li><?php esc_html_e('Advance Live Pricing Plan Section with Custom HTML block for button or enter link', 'scope');?></li>
					<li><?php esc_html_e('Automatic Updates right in your Dashboard.', 'scope');?></li>
					<li><?php esc_html_e('17+ Front Page Section (products, brands, pricing, shortcode, widgets etc..)', 'scope');?></li>
					<li><?php esc_html_e('Just create a page and select template for page. 15+ Page Templates for (Contact, About, Portfolio etc..)  Page.', 'scope');?></li>
					<li><?php esc_html_e('Live Chat Support provide you very quick solution to your issue', 'scope');?></li>
				</ul>
			</div>
			<?php
		}

	}

endif;