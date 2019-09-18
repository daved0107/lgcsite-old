<form role="search" method="get" class="search-form scope-search all-search" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<div class="form-group">
		<label  class="search-label">
			<span class="screen-reader-text"><?php esc_html_e('Search for:','scope'); ?></span>
			<input type="search" class="blog-search input-search" placeholder="<?php esc_attr_e('Search ','scope'); ?>" value="<?php the_search_query(); ?>" name="s" title="<?php esc_attr_e('Search for:','scope'); ?>">
		</label>
		<input type="submit" class="search-submit" value="<?php esc_attr_e('Search ','scope'); ?>">
	</div>
</form>