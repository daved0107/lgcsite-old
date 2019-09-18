<?php
/**
 * The template for displaying woocommerce pages
 *
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Scope
 */

get_header(); ?>
<div class="container-full space woocommerce-content-area">
	<div class="container">
		<div class="row justify-content-center">
			<main id="main" class="<?php echo esc_attr(scope_woocommerce_layout()); ?> col-sm-12 col-xs-12 site-main">
				<div id="blog-content" class="row scp-page">
					<?php if ( have_posts() ) : ?>
	                    <?php woocommerce_content(); ?>
	                <?php endif; ?>
				</div>
				<div class="clearfix"></div>
			</main><!-- #main -->
			<?php get_sidebar('shop'); ?>
		</div>
	</div>
</div>
<?php
get_footer();