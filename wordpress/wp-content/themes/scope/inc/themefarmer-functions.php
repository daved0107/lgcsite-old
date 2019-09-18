<?php

function scope_is_wc() {

	if (class_exists('WooCommerce')) {
		return true;
	} else {
		return false;
	}

}

function scope_get_social_block() {
	$new_tab = get_theme_mod('scope_social_new_tab', true);
	$socials = get_theme_mod('scope_socials');
	?>
    <ul class="header-topbar-links">
        <?php if ($socials): foreach ($socials as $key => $social): ?>
            <?php if (!empty($social['link']) && !empty($social['icon'])): ?>
            <li><a href="<?php echo esc_url($social['link']); ?>"  <?php echo absint($new_tab) ? 'target="_blank"' : ''; ?>><i class="fa <?php echo esc_attr($social['icon']); ?>"></i></a></li>
            <?php endif;?>
        <?php endforeach;endif;?>
    </ul>
    <?php
}

function scope_get_contact_block() {
	$top_phone = get_theme_mod('scope_top_phone');if (!empty($top_phone)): ?>
    <span class="contact-item contact-mobile"><i class="fa fa-phone"></i><span class="contact-link"><a href="callto:<?php echo esc_attr($top_phone); ?>"><?php echo esc_html($top_phone); ?></a></span></span>
    <?php endif;?>
    <?php $top_email = get_theme_mod('scope_top_email');if (!empty($top_email)): ?>
    <span class="contact-item contact-email"><i class="fa fa-envelope"></i><span class="contact-link"><a href="mailto:<?php echo esc_attr($top_email); ?>"><?php echo esc_html($top_email); ?></a></span></span>
    <?php endif;
}

function themefarmer_get_header_topbar(){
	if(get_theme_mod('themefarmer_header_topbar_enable', false)){
		?>
		<div class="header-topbar">
			<div class="container">
				<div class="row">
					<div class="col-md-6 text-small-center text-left"><?php scope_get_contact_block(); ?></div>
					<div class="col-md-6 text-small-center text-right"><?php scope_get_social_block(); ?></div>
				</div>
			</div>
		</div>
		<?php
	}
}
add_action('themefarmer_before_header_main', 'themefarmer_get_header_topbar');

function scope_get_page_links_html() {
	if (scope_is_wc()) {

		global $woocommerce;

		$myaccount_page_id = get_option('woocommerce_myaccount_page_id');
		$links = array();
		$account_link = '#';
		if ($myaccount_page_id) {
			$account_link = get_permalink($myaccount_page_id);
		}

		if (is_user_logged_in()) {
			$links['myaccount'] = $account_link;
		} else {
			$links['login'] = $account_link;
			$links['register'] = $account_link;
		}

		$links['cart'] = wc_get_cart_url();
		$links['checkout'] = wc_get_checkout_url();

		if (is_user_logged_in()) {
			$links['logout'] = wp_logout_url(esc_url(home_url('/')));

			if (get_option('woocommerce_force_ssl_checkout') == 'yes') {
				$links['logout'] = str_replace('http:', 'https:', $links['logout']);
			}
		}

		$links = apply_filters('scope_page_links', $links);
		$lables = scope_get_page_labels();
		$html = '';

		foreach ($links as $key => $link) {
			$html .= sprintf('<li><a class="top-bl-%1$s" href="%2$s"> %3$s </a></li>',
				esc_attr($key),
				esc_url($link),
				wp_kses_post($lables[$key])
			);
		}
		$html = '<ul class="account-links">' . $html . '</ul>';
		return $html;
	}
}

function scope_get_page_labels() {
	$lables = array(
		'myaccount' => '<i class="fa fa-user"></i> ' . esc_html__('My Account', 'scope'),
		'login' => '<i class="fa fa-sign-in"></i> ' . esc_html__('Login', 'scope'),
		'register' => '<i class="fa fa-user-plus"></i> ' . esc_html__('Register', 'scope'),
		'cart' => '<i class="fa fa-shopping-basket"></i> ' . esc_html__('Cart', 'scope'),
		'checkout' => '<i class="fa fa-check-circle-o"></i> ' . esc_html__('Checkout', 'scope'),
		'wishlist' => '<i class="fa fa-heart"></i> ' . esc_html__('Wishlist', 'scope'),
		'logout' => '<i class="fa fa-sign-out"></i> ' . esc_html__('Logout', 'scope'),
	);

	$lables = apply_filters('scope_page_labels', $lables);
	return $lables;
}

function scope_excerpt_more($more) {
	if (is_admin()) {
		return $more;
	}

	return '...';
}
add_filter('excerpt_more', 'scope_excerpt_more');
function scope_excerpt_length( $length ) {
        
    if (is_admin()) {
		return $length;
	}
	return 20;
}
add_filter( 'excerpt_length', 'scope_excerpt_length', 999 );

function scope_comment_form_fields($fields) {

	$fields['author'] = '<div class="form-group col-md-4"><label  for="name">' . esc_html__('NAME', 'scope') . ':</label><input type="text" class="form-control" id="name" name="author" placeholder="' . esc_attr__('Full Name', 'scope') . '"></div>';
	$fields['email'] = '<div class="form-group col-md-4"><label for="email">' . esc_html__('EMAIL', 'scope') . ':</label><input type="email" class="form-control" id="email" name="email" placeholder="' . esc_attr__('Your Email Address', 'scope') . '"></div>';
	$fields['url'] = '<div class="form-group col-md-4"><label  for="url">' . esc_html__('WEBSITE', 'scope') . ':</label><input type="text" class="form-control" id="url" name="url" placeholder="' . esc_attr__('Website', 'scope') . '"></div>';
	return $fields;
}
add_filter('comment_form_fields', 'scope_comment_form_fields');

function scope_comment_form_defaults($defaults){
	$defaults['submit_field'] = '<div class="form-group col-12">%1$s %2$s</div>';
	$defaults['comment_field'] = '<div class="form-group col-12"><label  for="message">' . esc_html__('COMMENT', 'scope') . ':</label><textarea class="form-control" rows="5" id="comment" name="comment" placeholder="' . esc_attr__('Message', 'scope') . '"></textarea></div>';
	$defaults['title_reply_to'] = esc_html__('Post Your Reply Here To %s', 'scope');
	$defaults['class_submit'] = 'btn btn-theme';
	$defaults['label_submit'] = esc_html__('SUBMIT COMMENT', 'scope');
	$defaults['title_reply'] = '<h3 class="post-comments">' . esc_html__('Leave A Comment', 'scope') . '</h3>';
	$defaults['role_form'] = 'form';
	return $defaults;

}
add_filter('comment_form_defaults', 'scope_comment_form_defaults');

function scope_comment($comment, $args, $depth) {
	// get theme data.
	global $comment_data;
	// translations.
	$leave_reply = $comment_data['translation_reply_to_coment'] ? $comment_data['translation_reply_to_coment'] : __('Reply', 'scope');?>
        <div class="row the-comment">
            <div class="col-2">
            <?php echo get_avatar($comment, $size = '80'); ?>
            </div>
            <div class="col-10">
                <div class="comment-items">
                    <h4 class="comment-item comment-author"><?php comment_author();?></h4>
                    <h5 class="comment-item comment-date">
                        <?php if (('d M  y') == get_option('date_format')): ?>
                        <?php comment_date('F j, Y');?>
                        <?php else: ?>
                        <?php comment_date();?>
                        <?php endif;?>
                        <?php esc_html_e('at', 'scope');?>&nbsp;<?php comment_time('g:i a');?>
                    </h5>
                    <?php comment_reply_link(array_merge($args, array('reply_text' => $leave_reply, 'depth' => $depth, 'max_depth' => $args['max_depth'])))?>
                    <?php if ($comment->comment_approved == '0'): ?>
                    <em class="comment-item comment-awaiting-moderation"><?php esc_html_e('Your comment is awaiting moderation.', 'scope');?></em>
                    <?php endif;?>
                </div>
                <div class="comment-text"><?php comment_text();?></div>
            </div>
        </div>
        <?php
}

function scope_menu_button($items, $args) {
	$is_menu_search = get_theme_mod('themefarmer_menu_search_eanble', true);
	if($is_menu_search){
		$items .= '<li class="menu-item menu-search"><a href="#search"><i class="fa fa-search"></i></a></li>';
	}
	$link = get_theme_mod('themefarmer_menu_button_link');
	$icon = get_theme_mod('themefarmer_menu_button_icon', 'fa-trophy');
	if (!empty($link) && $args->theme_location == 'primary') {
		$items .= sprintf('<li class="menu-item menu-button"><a class="btn btn-menu-item" href="%s">%s</a></li>', esc_url($link), esc_html(get_theme_mod('scope_menu_button_text')));
	}

	return $items;
}
add_filter('wp_nav_menu_items', 'scope_menu_button', 10, 2);

function scope_add_header_search(){
	?>
	<div class="header-search-container">
		<div class="container">
		<?php get_template_part('searchform'); ?>
		</div>
	</div>
	<?php
}
add_action('themefarmer_after_header_main', 'scope_add_header_search');


function scope_get_standard_fonts() {
	return apply_filters(
		'themefarmer_standard_fonts_array', array(
			'Arial, Helvetica, sans-serif',
			'Arial Black, Gadget, sans-serif',
			'Bookman Old Style, serif',
			'Comic Sans MS, cursive',
			'Courier, monospace',
			'Georgia, serif',
			'Garamond, serif',
			'Impact, Charcoal, sans-serif',
			'Lucida Console, Monaco, monospace',
			'Lucida Sans Unicode, Lucida Grande, sans-serif',
			'MS Sans Serif, Geneva, sans-serif',
			'MS Serif, New York, sans-serif',
			'Palatino Linotype, Book Antiqua, Palatino, serif',
			'Tahoma, Geneva, sans-serif',
			'Times New Roman, Times, serif',
			'Trebuchet MS, Helvetica, sans-serif',
			'Verdana, Geneva, sans-serif',
			'Paratina Linotype',
			'Trebuchet MS',
		)
	);
}

function scope_get_google_fonts() {
	return apply_filters('themefarmer_google_fonts_array',
		array('Work Sans', 'ABeeZee', 'Abel', 'Abhaya Libre', 'Abril Fatface', 'Alfa Slab One', 'Alice', 'Alike', 'Average', 'Average Sans', 'Averia Gruesa Libre', 'Averia Libre', 'Averia Sans Libre', 'Averia Serif Libre', 'Bad Script', 'Bahiana', 'Baloo', 'Baloo Bhai', 'Baloo Bhaijaan', 'Baloo Bhaina', 'Baloo Chettan', 'Baloo Da', 'Baloo Paaji', 'Baloo Tamma', 'Baloo Tammudu', 'Baloo Thambi', 'Balthazar', 'Black Ops One', 'Bokor', 'Bonbon', 'Boogaloo', 'Bowlby One', 'Bowlby One SC', 'Brawler', 'Bree Serif', 'Bubblegum Sans', 'Bubbler One', 'Buda', 'Buenard', 'Bungee', 'Bungee Hairline', 'Bungee Inline', 'Bungee Outline', 'Bungee Shade', 'Butcherman', 'Butterfly Kids', 'Cabin', 'Cabin Condensed', 'Coda', 'Cormorant SC', 'Cormorant Unicase', 'Cormorant Upright', 'Courgette', 'Cousine', 'Coustard', 'Covered By Your Grace', 'Crafty Girls', 'Creepster', 'Crete Round', 'Damion', 'Dancing Script', 'Dangrek', 'Diplomata', 'Diplomata SC', 'Domine', 'Donegal One', 'Doppio One', 'Dosis', 'EB Garamond', 'Englebert', 'Enriqueta', 'Erica One', 'Expletus Sans', 'Fondamento', 'Fontdiner Swanky', 'Forum', 'Francois One', 'Frank Ruhl Libre', 'Freckle Face', 'Fredericka the Great', 'Fredoka One', 'Freehand', 'Fresca', 'Frijole', 'Fruktur', 'Fugaz One', 'GFS Didot', 'GFS Neohellenic', 'Gabriela', 'Gafata', 'Galada', 'Galdeano', 'Galindo', 'Gentium Basic', 'Gentium Book Basic', 'Geo', 'Geostar', 'Geostar Fill', 'Germania One', 'Gidugu', 'Gilda Display', 'Give You Glory', 'Habibi', 'Halant', 'Hammersmith One', 'Hanalei', 'Hanalei Fill', 'Handlee', 'Hanuman', 'Happy Monkey', 'Harmattan', 'IBM Plex Mono', 'IBM Plex Sans', 'IBM Plex Sans Condensed', 'IBM Plex Serif', 'Istok Web', 'Italiana', 'Italianno', 'Itim', 'Jacques Francois', 'Jacques Francois Shadow', 'Jaldi', 'Jim Nightshade', 'Jockey One', 'Jolly Lodger', 'Jomhuria', 'Kumar One Outline', 'Kurale', 'La Belle Aurore', 'Laila', 'Lakki Reddy', 'Lalezar', 'Limelight', 'Linden Hill', 'Lobster', 'Lobster Two', 'Londrina Outline', 'Londrina Shadow', 'Londrina Sketch', 'Londrina Solid', 'Lora', 'Love Ya Like A Sister', 'Marcellus', 'Marcellus SC', 'Marck Script', 'Margarine', 'Marko One', 'Marmelad', 'Nova Cut', 'Nova Flat', 'Nova Mono', 'Nova Oval', 'Nova Round', 'Nova Script', 'Nova Slim', 'Nova Square', 'Numans', 'Nunito', 'Nunito Sans', 'Odor Mean Chey', 'Offside', 'Old Standard TT', 'Oldenburg', 'Oswald', 'Oleo Script', 'Oleo Script Swash Caps', 'Open Sans', 'Pangolin', 'Paprika', 'Parisienne', 'Passero One', 'Passion One', 'Pathway Gothic One', 'Playfair Display SC', 'Podkova', 'Poiret One', 'Poller One', 'Poly', 'Pompiere', 'Pontano Sans', 'Poppins', 'Port Lligat Sans', 'Port Lligat Slab', 'Pragati Narrow', 'Quattrocento Sans', 'Questrial', 'Quicksand', 'Quintessential', 'Qwigley', 'Racing Sans One', 'Roboto', 'Roboto Slab', 'Rochester', 'Rock Salt', 'Rokkitt', 'Romanesco', 'Ropa Sans', 'Rosario', 'Sarpanch', 'Satisfy', 'Scada', 'Scheherazade', 'Schoolbell', 'Scope One', 'Snippet', 'Snowburst One', 'Sofadi One', 'Sofia', 'Sonsie One', 'Sorts Mill Goudy', 'Suez One', 'Sumana', 'Sunshiney', 'Supermercado One', 'Sura', 'Suranna', 'Suravaram', 'Suwannaphum', 'Swanky and Moo Moo', 'Syncopate', 'Tangerine', 'Taprom', 'Ubuntu Condensed', 'Ubuntu Mono', 'Ultra', 'Uncial Antiqua', 'Underdog', 'Unica One', 'Voces', 'Volkhov', 'Vollkorn', 'Vollkorn SC', 'Voltaire', 'Waiting for the Sunrise', 'Yanone Kaffeesatz', 'Yantramanav', 'Yatra One', 'Yellowtail', 'Zeyada', 'Zilla Slab')
	);
}

function scope_get_font_url($fonts = array()) {
	$default_body_font = apply_filters('scope_default_body_font', 'Roboto');
	$body_font = get_theme_mod('scope_body_font_family', $default_body_font);
	if(empty($body_font)){
		$body_font = $default_body_font;
	}
	$body_font_weight = array(300,400,500,700,900);
	$fonts[$body_font] = $body_font_weight;
	$fonts = apply_filters('scope_fonts', $fonts);

	if (empty($fonts)) {
		return;
	}

	$google_fonts = scope_get_google_fonts();
	$font_families = array();
	if (!empty($google_fonts) && !empty($fonts)) {
		foreach ($fonts as $font => $weights) {
			if (in_array($font, $google_fonts)) {
				if (!empty($weights)) {
					$font_families[] = $font . ':' . implode(',', $weights);
				} else {
					$font_families[] = $font;
				}
			}
		}
	} else {
		return;
	}

	if (!empty($font_families)) {
		$query_args = array(
			'family' => urlencode(implode('|', $font_families)),
		);

		$fonts_url = add_query_arg($query_args, 'https://fonts.googleapis.com/css');

		return esc_url_raw($fonts_url);
	}
	return;
}



function scope_add_custom_styles() {
	$style = '';
	$default_body_font = apply_filters('scope_default_body_font', 'Roboto');
	$body_font_family = get_theme_mod('scope_body_font_family', $default_body_font);
	$body_font_family = !empty($body_font_family) ? $body_font_family : 'Roboto';
	$body_font_size = get_theme_mod('themefarmer_body_font_size', 10);
	if (is_array($body_font_size)) {
		$desk_fs = $body_font_size['desktop'] + 4;
		$tabl_fs = $body_font_size['tablet'];
		$mobl_fs = $body_font_size['mobile'];
	} else {
		$desk_fs = $body_font_size + 4;
	}

	$style .= "
        body{
            font-family:'{$body_font_family}', sans-serif !important;
            font-size:{$desk_fs}px !important;
        }
    ";
	$style = apply_filters('scope_inline_style', $style);
	wp_add_inline_style('scope-style', $style);
}
add_action('wp_enqueue_scripts', 'scope_add_custom_styles', 31);

function scope_blog_layout() {
	if (is_page_template()) {
		return;
	}

	if (is_page()) {
		$layout = get_theme_mod('scope_blog_single_page_layout', 'full');
	} elseif (is_single()) {
		$layout = get_theme_mod('scope_blog_single_post_layout', 'right');
	} else {
		$layout = get_theme_mod('scope_blog_post_index_layout', 'right');
	}
	return scope_get_layout_class($layout);
}

function scope_woocommerce_layout(){
    $layout = 'left';
    if(scope_is_wc()){
        if(is_shop()){
            $layout = get_theme_mod('scope_wc_shop_page_layout', 'left');
        } elseif(is_product()){
            $layout = get_theme_mod('scope_wc_product_single_layout', 'full');
        }
    }
    return scope_get_layout_class($layout);
}


function scope_get_layout_class($layout = 'right') {
	$class = 'col-md-8';
	switch ($layout) {
	case 'right':
		$class = 'col-md-8';
		break;
	case 'left':
		$class = 'col-md-8 order-last';
		break;
	case 'full':
		$class = 'col-md-10';
		break;
	default:
		$class = 'col-md-8';
		break;
	}
	return $class;
}

function scope_home_sections_init() {
	$default_sections =  apply_filters('scope_home_page_default_sections', array('slider', 'services', 'about', 'products-latest', 'team', 'callout', 'testimonials', 'brands',  'subscribe', 'blog',   'contact'));
	$home_sections = get_theme_mod('scope_home_layout', $default_sections);
	$home_sections = apply_filters('scope_home_page_sections', $home_sections);
	$priority = 30;
	foreach ($home_sections as $key => $section) {
		$section_name = str_replace('-', '_', $section);
		$section_name = str_replace(' ', '_', $section_name);
		if(get_theme_mod('scope_is_enable_section_'.$section_name, true )){
			if (function_exists('scope_homepage_section_' . $section_name)) {
				add_action('scope_print_home_page_sections', 'scope_homepage_section_' . $section_name, $priority);
			}
			if (function_exists('themefarmer_homepage_section_' . $section_name)) {
				add_action('scope_print_home_page_sections', 'themefarmer_homepage_section_' . $section_name, $priority);
			}
		}
		$priority += 10;
	}
}
add_action('scope_befor_print_home_page_sections', 'scope_home_sections_init', 30);

function scope_homepage_section_products_latest() {
	get_template_part('template-parts/home', 'products-latest');
}

function scope_homepage_section_callout(){
	get_template_part('template-parts/home', 'callout');
}

function scope_homepage_section_subscribe(){
	get_template_part('template-parts/home', 'subscribe');
}

function scope_homepage_section_blog() {
	get_template_part('template-parts/home', 'blog');
}

function scope_homepage_section_contact() {
	get_template_part('template-parts/home', 'contact');
}

function scope_homepage_section_about() {
	get_template_part('template-parts/home', 'about');
}

function scope_get_header_class(){
	if(function_exists('themefarmer_companion') && !is_home() && is_front_page()){
		return 'header-transparent';
	}
	return '';
}

function scope_after_header(){
	if (!is_front_page() || (is_front_page() && is_home())) : 
	 	$url = (has_post_thumbnail())?get_the_post_thumbnail_url():get_header_image(); 
	 	$background_image = (!empty($url))?'background-image: url('.esc_url($url).')':'';
		?>
    	<div id="site-header" style="<?php echo $background_image; ?>">
    	    <div class="main-header-inner">
    	    	<h1 class="header-page-title">
    	    	<?php scope_header_page_title(); ?>
    	    	</h1>
    	    </div>
    	</div>
	<?php endif;
}

function scope_header_page_title() {
	if (is_home()) {
		$title = bloginfo( 'description');
	} elseif (is_archive()) {
		$title = str_replace('archives:', '', strtolower(get_the_archive_title()));
	} elseif (is_search()) {
		$title = sprintf(__('Search Results for : %s', 'scope'), get_search_query());
	} elseif (is_404()) {
		$title = sprintf(__('Error 404  : Page Not Found', 'scope'));
	} elseif(is_single()) {
		$title = get_the_title();
	} else {
		$title =  get_the_title();
	}

	if (!empty($title)) {
		echo wp_kses_post($title);
	}
}



function scope_set_theme_primary_color($custom_css){
	$primary_color = get_theme_mod('scope_theme_primary_color');
	if(!empty($primary_color)){
		$custom_css.= "
a,
a:hover,
a:focus {
    color: {$primary_color};
}

button,
input[type=button],
input[type=submit] {
    background-color: {$primary_color};
}

input[type=reset] {
    color: {$primary_color};
    border: 1px solid {$primary_color};
}

.dropdown-item:focus,
.dropdown-item:hover,
.dropdown-item:active {
    color: {$primary_color};
}

.btn-menu-item {
    background-color: {$primary_color} !important;
    box-shadow: 0 2px 5px 0 {$primary_color}a3;
}

.btn-read-more:hover {
    border-color: {$primary_color};
}

.btn-theme,
.btn-theme:hover,
.btn-theme:active,
.btn-theme:focus {
    background-color: {$primary_color};
}

.widget ul li:hover a,
.widget ul li:hover:before {
    color: {$primary_color};
}

.footer-copy a:hover {
    color: {$primary_color};
}

#scroll-top {
    background-color: {$primary_color}66;
}

#scroll-top:hover {
    background-color: {$primary_color};
}

.header-top-nav {
    background-color: {$primary_color};
}

.search-elem.btn.btn-search {
    background-color: {$primary_color};
}

.banner-link:hover {
    background-color: {$primary_color};
    border-color: {$primary_color};
}

.slide-bt-2 {
    background-color: {$primary_color} !important;
    border-color: {$primary_color} !important;
}

.products-latest {
    background-color: {$primary_color};
}

.meamber-item-inner:hover .meamber-info {
    background-color: {$primary_color}e6;
}

.skill-item-2 .skill-item-inner {
    border: 1px solid {$primary_color};
}

.woocommerce span.onsale {
    background-color: {$primary_color};
}

.woocommerce ul.products li.product .price {
    color: {$primary_color};
}

.woocommerce #respond input#submit.alt,
.woocommerce a.button.alt,
.woocommerce button.button.alt,
.woocommerce input.button.alt {
    background-color: {$primary_color};
}";

	}
	return $custom_css;
}
add_filter('scope_inline_style', 'scope_set_theme_primary_color', 30);