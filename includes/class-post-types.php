<?php

/*
* @Author 		Jaed Mosharraf
* Copyright: 	2015 Jaed Mosharraf
*/

if ( ! defined('ABSPATH')) exit;  // if direct access 

class class_wp_ld_post_types{
	
	public function __construct(){
		add_action( 'init', array( $this, 'wp_ld_post_type_wp_ld_post' ), 0 );
	}
	
	public function wp_ld_post_type_wp_ld_post()
	{
		if ( post_type_exists( "wp_ld_post" ) ) return;

		$labels = array(
                'name' => _x('WP Like Dislike', 'wp_ld_post'),
                'singular_name' => _x('wp_ld_post', 'wp_ld_post'),
              
				'not_found' =>  __('Nothing found'),
                'not_found_in_trash' => __('Nothing found in Trash'),
                'parent_item_colon' => ''
        );
 
        $args = array(
                'labels' => $labels,
                'public' => true,
                'show_ui' => false,
                'query_var' => true,
                'menu_icon' => null,
                'rewrite' => true,
                'capability_type' => 'post',
				//'capabilities' => array('create_posts' => false,),
                'hierarchical' => false,
                'menu_position' => null,
				'map_meta_cap'          => true,
				'publicly_queryable' 	=> true,
				'exclude_from_search' 	=> false,
                'supports' 		=> array('title'),
				'menu_icon' => 'dashicons-media-spreadsheet',
		
          ); 
		register_post_type( 'wp_ld_post' , $args );
	}
	
} new class_wp_ld_post_types();