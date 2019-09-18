
	<footer id="colophon" role="contentinfo">
		<div id="site-generator">

			<?php echo __('&copy; ', 'surfarama') . esc_attr( get_bloginfo( 'name', 'display' ) );  ?>
            <?php if ( is_front_page() && ! is_paged() ) : ?>
            <?php _e('- Built with ', 'surfarama'); ?><a href="<?php echo esc_url( __( 'https://wpdevshed.com/surfarama/', 'surfarama' ) ); ?>" target="_blank"><?php _e('Surfarama', 'surfarama'); ?></a>
			<?php _e(' and ', 'surfarama'); ?><a href="<?php echo esc_url( __( 'http://wordpress.org/', 'surfarama' ) ); ?>" title="<?php esc_attr_e( 'Semantic Personal Publishing Platform', 'surfarama' ); ?>" target="_blank"><?php _e('WordPress' ,'surfarama'); ?></a>
            <?php endif; ?>
            
		</div>
	</footer><!-- #colophon -->
</div><!-- #container -->

<?php wp_footer(); ?>


</body>
</html>