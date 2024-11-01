<?php

/*
* @Author 		Jaed Mosharraf
* Copyright: 	2015 Jaed Mosharraf
*/

if ( ! defined('ABSPATH')) exit;  // if direct access 

class class_wp_ld_functions{
	

	public function wp_ld_themes($themes = array())
	{
		$themes = array(
					'wpld-simple'=>'wpld-simple',		
				);
		foreach(apply_filters( 'wp_ld_themes', $themes ) as $theme_key=> $theme_name)
			$theme_list[$theme_key] = $theme_name;
		return $theme_list;
	}
	
	public function wp_ld_themes_dir($themes_dir = array())
	{
		$main_dir = wp_ld_plugin_dir.'themes/like-dislike/';
		$themes_dir = array(
						'wpld-simple'=>$main_dir.'wpld-simple',
					);
			
		foreach(apply_filters( 'wp_ld_themes_dir', $themes_dir ) as $theme_key=> $theme_dir)
			$theme_list_dir[$theme_key] = $theme_dir;
		return $theme_list_dir;
	}

	public function wp_ld_themes_url($themes_url = array())
	{
		$main_url = wp_ld_plugin_url.'themes/like-dislike/';
		$themes_url = array(
						'wpld-simple'=>$main_url.'wpld-simple',
					);
			
		foreach(apply_filters( 'wp_ld_themes_url', $themes_url ) as $theme_key=> $theme_url)
			$theme_list_url[$theme_key] = $theme_url;
		return $theme_list_url;
	}
	
	
//================== Extra Functions =========================

	public function wp_ld_counter( $wp_ld_action, $wp_ld_post_id )
	{
		wp_reset_query();
		$wp_query_get_total_like = new WP_Query(
			array (
				'post_type' => 'wp_ld_post',
				'post_status' => 'publish',
				'meta_query' => array(
					array(
						'key' => 'wp_ld_action',
						'value' => $wp_ld_action,

						),	
					array(
						'key' => 'wp_ld_post_id',
						'value' => $wp_ld_post_id,
					),
				),
			) );
		
		$wp_ld_counter = $wp_query_get_total_like->found_posts;
		wp_reset_query();
		
		return $wp_ld_counter;
	}
	
	public function fn_check_already_ld( $wp_ld_post_id, $wp_ld_by )
	{
		$wp_query = new WP_Query(
			array (
			'post_type' => 'wp_ld_post',
			'post_status' => 'publish',					
			'meta_query' => array(
				array(
					'key' => 'wp_ld_post_id',
					'value' => $wp_ld_post_id,
				),
				array(
					'key' => 'wp_ld_by',
					'value' => $wp_ld_by,
				),
			) ));
				
		if ( $wp_query->found_posts > 0 ) return 1;
		else return 0;
	}
	
	public function getUserIP()
	{
		$client  = @$_SERVER['HTTP_CLIENT_IP'];
		$forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
		$remote  = $_SERVER['REMOTE_ADDR'];

		if(filter_var($client, FILTER_VALIDATE_IP)) $ip = $client;
		elseif(filter_var($forward, FILTER_VALIDATE_IP)) $ip = $forward;
		else $ip = $remote;
		return $ip;
	}

		
} new class_wp_ld_functions();