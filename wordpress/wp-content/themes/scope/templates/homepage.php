<?php 
/*
* Template Name: Home Page
*/

get_header();
	do_action('scope_befor_print_home_page_sections');
	do_action('scope_print_home_page_sections');
	do_action('scope_after_print_home_page_sections');
get_footer();
