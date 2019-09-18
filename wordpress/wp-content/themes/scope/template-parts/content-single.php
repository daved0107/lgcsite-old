<article id="post-<?php the_ID(); ?>" <?php post_class("col-12 scp-post"); ?>>
	<div class="post-content">
		<?php if ( 'post' === get_post_type() ) : ?>
		<div class="entry-meta">
			<?php scope_posted_on(); ?>
		</div><!-- .entry-meta -->
		<?php endif; ?>
		<div class="entry-content">
			<?php
				the_content();

				wp_link_pages( array(
					'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'scope' ),
					'after'  => '</div>',
				) );
			?>
			<div class="clearfix"></div>
		</div><!-- .entry-content -->
		<div class="clearfix"></div>
		<div class="entry-footer">
			<?php scope_entry_footer(); ?>
		</div>
	</div>
</article>
<?php get_template_part( 'template-parts/author', 'info' ); ?>