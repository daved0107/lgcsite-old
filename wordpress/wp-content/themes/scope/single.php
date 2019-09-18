<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Scope
 */
get_header(); ?>
<div class="container-full space blog-post-index content-area">
	<div class="container">
		<div class="row justify-content-center">
			<main id="main" class="<?php echo esc_attr(scope_blog_layout()); ?> col-sm-12 col-xs-12 blog-left blog-posts-wrap site-main">
				<div id="blog-content" class="row scp-singuler">
					<?php
						while ( have_posts() ) : the_post();

							get_template_part( 'template-parts/content', 'single' );

							// If comments are open or we have at least one comment, load up the comment template.
							if ( comments_open() || get_comments_number() ) :
								comments_template();
							endif;

						endwhile; // End of the loop.
					?>
				</div>
				<div class="clearfix"></div>
			</main><!-- #main -->
			<?php get_sidebar(); ?>
		</div>
	</div>
</div>
<?php
get_footer();