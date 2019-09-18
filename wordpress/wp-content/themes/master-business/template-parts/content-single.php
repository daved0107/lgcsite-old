<?php
/**
 * Template part for displaying single posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Master_Business
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <?php
	  /**
	   * Hook - master_business_single_image.
	   *
	   * @hooked master_business_add_image_in_single_display - 10
	   */
	  do_action( 'master_business_single_image' );
	?>


	<div class="entry-content-wrapper">
		<?php if ( 'post' === get_post_type() ) : ?>
			<div class="entry-meta">
				<?php master_business_posted_on(); ?>
			</div><!-- .entry-meta -->
		<?php endif; ?>
		<div class="entry-content">
			<?php the_content(); ?>
			<?php
				wp_link_pages( array(
					'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'master-business' ),
					'after'  => '</div>',
				) );
			?>
		</div><!-- .entry-content -->
		<footer class="entry-footer">
			<?php master_business_entry_footer(); ?>
		</footer><!-- .entry-footer -->
	</div><!-- .entry-content-wrapper -->

</article><!-- #post-## -->
