<article  id="post-<?php the_ID(); ?>"  <?php post_class("home-post"); ?>>
	<div class="home-post-inner">
		<?php if(has_post_thumbnail()): ?>
			<div class="post-thumbnail">
			<?php the_post_thumbnail('scope-thumb', array( 'class' => 'img-fluid blog-photo' )); ?>
			</div>
		<?php endif; ?>
		<div class="post-content">
			<?php the_title( '<h2 class="entry-title post-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' ); ?>
			<div class="post-meta">
				<?php scope_posted_on(); ?>
			</div>
			<div class="entry-summary post-description"><?php the_excerpt(); ?></div>
			<div class="clearfix"></div>
			<div class="blog-btn">
				<a class="btn btn-read-more" href="<?php the_permalink(); ?>"><?php esc_html_e('READ MORE', 'scope'); ?></a>
			</div>
		</div>
	</div>	
</article>