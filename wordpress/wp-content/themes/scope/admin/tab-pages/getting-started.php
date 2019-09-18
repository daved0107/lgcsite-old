<div class="row">
	<div class="col">
		<h2><?php esc_html_e('Recommended actions', 'scope'); ?></h2>
		<p><?php esc_html_e('we have created list of steps to take so you get amazing expriance with theme.', 'scope'); ?></p>
		<a class="button" href="<?php echo esc_url(admin_url( 'themes.php?page=scope-welcome&tab=recommended_actions' )); ?>"><?php esc_html_e('Go to Recommended actions', 'scope'); ?></a>
	</div>
	<div class="col">
		<h2><?php esc_html_e('Read Theme Documentation', 'scope'); ?></h2>
		<p><?php esc_html_e('Missing Something..? Please check our full documentation for detaild information about Scope', 'scope'); ?></p>
		<a class="button" href="<?php echo esc_url($this->docs_link); ?>" target="_blank"><?php esc_html_e('Go to Documentation', 'scope'); ?></a>
	</div>
	<div class="col">
		<h2><?php esc_html_e('Customize Scope', 'scope'); ?></h2>
		<p><?php esc_html_e('Use customizer to setup Scope', 'scope'); ?></p>
		<a class="button button-primary" href="<?php echo esc_url( admin_url('customize.php') ); ?>" target="_blank"><?php esc_html_e('Go to Customizer', 'scope'); ?></a>
	</div>
</div>
