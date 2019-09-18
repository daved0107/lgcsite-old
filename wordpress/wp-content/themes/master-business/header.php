<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Master_Business
 */

?><?php
	/**
	 * Hook - master_business_action_doctype.
	 *
	 * @hooked master_business_doctype -  10
	 */
	do_action( 'master_business_action_doctype' );
?>
<head>
	<?php
	/**
	 * Hook - master_business_action_head.
	 *
	 * @hooked master_business_head -  10
	 */
	do_action( 'master_business_action_head' );
	?>

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

	<?php
	/**
	 * Hook - master_business_action_before.
	 *
	 * @hooked master_business_page_start - 10
	 * @hooked master_business_skip_to_content - 15
	 */
	do_action( 'master_business_action_before' );
	?>

    <?php
	  /**
	   * Hook - master_business_action_before_header.
	   *
	   * @hooked master_business_header_start - 10
	   */
	  do_action( 'master_business_action_before_header' );
	?>
		<?php
		/**
		 * Hook - master_business_action_header.
		 *
		 * @hooked master_business_site_branding - 10
		 */
		do_action( 'master_business_action_header' );
		?>
	<?php
	  /**
	   * Hook - master_business_action_after_header.
	   *
	   * @hooked master_business_header_end - 10
	   */
	  do_action( 'master_business_action_after_header' );
	?>

	<?php
	/**
	 * Hook - master_business_action_before_content.
	 *
	 * @hooked master_business_content_start - 10
	 */
	do_action( 'master_business_action_before_content' );
	?>
    <?php
	  /**
	   * Hook - master_business_action_content.
	   */
	  do_action( 'master_business_action_content' );
	?>
