<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Scope
 */
if(scope_blog_layout() !== 'col-md-10'){
	?>

	<aside id="secondary" class="col-12 col-md-3 offset-md-1 scp-sidebar" role="complementary">
	<?php
	if (is_active_sidebar( 'sidebar' ) ) {
		 dynamic_sidebar( 'sidebar' ); 
	}else{

		$args = array(
			'name'          => esc_html__( 'Sidebar', 'scope' ),
			'id'            => 'sidebar',
			'description'   => esc_html__( 'Sidebar Widget Area', 'scope' ),
			'before_widget' => '<div id="%1$s" class="widget sidebar-widget">',
			'after_widget'  => '</div>',
			'before_title'  => '<div class="widget-heading"><h3 class="widget-title">',
			'after_title'   => '</h3></div>',
		);
		the_widget('WP_Widget_Search', 'title='.esc_html__('Search', 'scope'), $args);
		the_widget('WP_Widget_Recent_Posts', null, $args);
		the_widget('WP_Widget_Recent_Comments', null, $args);
		the_widget('WP_Widget_Tag_Cloud', null, $args);
		the_widget('WP_Widget_Archives', null, $args);
		the_widget('WP_Widget_Categories', null, $args);
		the_widget('WP_Widget_Calendar', 'title='.esc_html__('Calendar', 'scope'), $args);

	}
	?>
	</aside><!-- #secondary -->
<?php 
}