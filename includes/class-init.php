<?php

/*
* @Author 		Jaed Mosharraf
* Copyright: 	2015 Jaed Mosharraf
*/

if ( ! defined('ABSPATH')) exit;  // if direct access 

class class_wp_ld_init{

    public function __construct()
	{
		add_action( 'init', array( $this, 'wp_ld_display_in_post' ) );		
		add_action( 'admin_menu', array( $this, 'wp_ld_display_admin_menu' ) );		
	}

	
	public function wp_ld_include_admin_menu() 
	{
		include wp_ld_plugin_dir.'admin/class-admin-menu.php';
	}
	
	public function wp_ld_display_admin_menu() 
	{
		add_menu_page('WP Like Dislike', 'WP Like Dislike', 'edit_pages', 'manage_wp_ld', array( $this, 'wp_ld_include_admin_menu' ));
	}
	
	
	public function wp_ld_display_in_post($atts, $content = null ) 
	{
			$atts = shortcode_atts(
				array(
					'themes' => 'wpld-simple',
					), $atts);
	
			$themes = $atts['themes'];
					
			$class_wp_ld_functions = new class_wp_ld_functions();
			$wp_ld_themes_dir = $class_wp_ld_functions->wp_ld_themes_dir();
			$wp_ld_themes_url = $class_wp_ld_functions->wp_ld_themes_url();
			
			ob_start();
			
			echo '<link  type="text/css" media="all" rel="stylesheet"  href="'.$wp_ld_themes_url[$themes].'/style.css" >';				
			
			include $wp_ld_themes_dir[$themes].'/index.php';
			add_filter( 'the_content', 'wp_ld_the_content_filter' );
	}	
		
} new class_wp_ld_init();