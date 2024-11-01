<?php
/*
* @Author 		Jaed Mosharraf
* Copyright: 	2015 Jaed Mosharraf
*/

if ( ! defined('ABSPATH')) exit;  // if direct access 


	function wp_ld_ajax_wp_ld_onclick_btn()
	{
		$html = array();
	
		require_once( plugin_dir_path( __FILE__ ) . '/require-wpld-onclick.php');

		echo json_encode($html);
		die();
	}

	
add_action('wp_ajax_wp_ld_ajax_wp_ld_onclick_btn', 'wp_ld_ajax_wp_ld_onclick_btn');
add_action('wp_ajax_nopriv_wp_ld_ajax_wp_ld_onclick_btn', 'wp_ld_ajax_wp_ld_onclick_btn');