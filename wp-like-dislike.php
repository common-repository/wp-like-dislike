<?php
/*
Plugin Name: WP Like Dislike
Plugin URI: http://pluginbazar.ml/blog/wp-like-dislike/
Description: It allow the visitors to like or dislike the post of your website.
Version: 1.0.3
Author: Jaed Mosharraf
Author URI: http://pluginbazar.ml/
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
*/

if ( ! defined('ABSPATH')) exit;  // if direct access 


class class_main_wp_ld {
	
	public function __construct(){
	
	define('wp_ld_plugin_url', WP_PLUGIN_URL . '/' . plugin_basename( dirname(__FILE__) ) . '/' );
	define('wp_ld_plugin_dir', plugin_dir_path( __FILE__ ) );
	define('wp_ld_wp_url', 'https://wordpress.org/plugins/wp-like-dislike/' );
	define('wp_ld_wp_reviews', 'http://wordpress.org/support/view/plugin-reviews/wp-like-dislike' );
	define('wp_ld_pro_url','http://pluginbazar.ml/blog/wp-like-dislike/' );
	define('wp_ld_demo_url', 'http://pluginbazar.ml/demo-wpld/' );
	define('wp_ld_conatct_url', 'http://pluginbazar.ml/contact/' );
	define('wp_ld_plugin_name', 'WP Like Dislike' );
	define('wp_ld_plugin_version', '1.0.0' );
	define('wp_ld_customer_type', 'free' );
	define('wp_ld_share_url', 'https://wordpress.org/plugins/wp-like-dislike/' );
	
	
	// Class
	require_once( plugin_dir_path( __FILE__ ) . 'includes/class-post-types.php');	
	require_once( plugin_dir_path( __FILE__ ) . 'includes/class-post-meta.php');		
	require_once( plugin_dir_path( __FILE__ ) . 'includes/class-init.php');	
	require_once( plugin_dir_path( __FILE__ ) . 'includes/class-functions.php');
		

	// Function's
	require_once( plugin_dir_path( __FILE__ ) . 'includes/functions.php');

	add_action( 'admin_enqueue_scripts', 'wp_enqueue_media' );
	add_action( 'wp_enqueue_scripts', array( $this, 'wp_ld_front_scripts' ) );
	add_action( 'admin_enqueue_scripts', array( $this, 'wp_ld_admin_scripts' ) );
	
	}

	public function job_bm_report_install()
	{
		do_action( 'job_bm_report_action_install' );
	}		
		
	public function job_bm_report_uninstall()
	{
		do_action( 'job_bm_report_action_uninstall' );
	}		
		
	public function job_bm_report_deactivation()
	{
		do_action( 'job_bm_report_action_deactivation' );
	}
		
	public function wp_ld_front_scripts()
	{
		wp_enqueue_script('jquery');

		wp_enqueue_script('wp_ld_js', plugins_url( '/js/scripts.js' , __FILE__ ) , array( 'jquery' ));
		wp_localize_script( 'wp_ld_js', 'wp_ld_ajax', array( 'wp_ld_ajaxurl' => admin_url( 'admin-ajax.php')));

		wp_enqueue_style('wp_ld_style', wp_ld_plugin_url.'css/style.css');

		wp_enqueue_style('font-awesome', wp_ld_plugin_url.'css/font-awesome.css');
		wp_enqueue_style('font-awesome', wp_ld_plugin_url.'css/font-awesome.min.css');
		
		//BackAdmin
		wp_enqueue_style('BackAdmin', wp_ld_plugin_url.'BackAdmin/css/BackAdmin.css');
		wp_enqueue_script('BackAdmin', plugins_url( 'BackAdmin/js/BackAdmin.js' , __FILE__ ) , array( 'jquery' ));		
	}

	public function wp_ld_admin_scripts()
	{
		wp_enqueue_script('jquery');
		wp_enqueue_script('jquery-ui-core');
		wp_enqueue_script('jquery-ui-autocomplete');		

		wp_enqueue_script('wp_ld_admin_js', plugins_url( '/admin/js/scripts.js' , __FILE__ ) , array( 'jquery' ));
		wp_localize_script('wp_ld_admin_js', 'wp_ld_ajax', array( 'wp_ld_ajaxurl' => admin_url( 'admin-ajax.php')));
		wp_enqueue_style('wp_ld_admin_style', wp_ld_plugin_url.'admin/css/style.css');

		//BackAdmin
		wp_enqueue_style('BackAdmin', wp_ld_plugin_url.'BackAdmin/css/BackAdmin.css');		
		wp_enqueue_script('BackAdmin', plugins_url( 'BackAdmin/js/BackAdmin.js' , __FILE__ ) , array( 'jquery' ));
	}
	
	
} new class_main_wp_ld();