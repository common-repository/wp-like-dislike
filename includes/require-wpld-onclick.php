<?php

/*
* @Author 		Jaed Mosharraf
* Copyright: 	2015 Jaed Mosharraf
*/
	$class_wp_ld_functions = new class_wp_ld_functions();
	
	$wp_ld_action 		= (int)$_POST['wp_ld_action'];	
	$wp_ld_post_id		= (int)$_POST['wp_ld_post_id'];	
	
	if ( is_user_logged_in() ) $wp_ld_by = get_current_user_id();
	else $wp_ld_by = $class_wp_ld_functions->getUserIP();
	
	
	if ( !empty($wp_ld_action) || !empty($wp_ld_post_id) || !empty($wp_ld_by) ) 
	{
		if ( $class_wp_ld_functions->fn_check_already_ld( $wp_ld_post_id, $wp_ld_by ) == 0 )
		{	
			$wp_ld_action_post = array(
				'post_type'   => 'wp_ld_post',
				'post_title'    => '#Like or Dislike by - ' . $wp_ld_by,
				'post_status'   => 'publish',
			  
			);
			
			$wp_ld_action_post_ID = wp_insert_post($wp_ld_action_post, true);
			
			update_post_meta($wp_ld_action_post_ID,'wp_ld_post_id',$wp_ld_post_id);
			update_post_meta($wp_ld_action_post_ID,'wp_ld_action',$wp_ld_action);
			update_post_meta($wp_ld_action_post_ID,'wp_ld_by',$wp_ld_by);
			
			
			if ( $wp_ld_action == 1 )
				$wp_ld_counter = $class_wp_ld_functions->wp_ld_counter('1',$wp_ld_post_id);
			if ( $wp_ld_action == 2 )
				$wp_ld_counter = $class_wp_ld_functions->wp_ld_counter('2',$wp_ld_post_id);
			
			$html['wp_ld_counter'] = $wp_ld_counter;
			$html['success'] = 'Success ('.$wp_ld_counter.') <i class="fa fa-refresh fa-spin"></i>';
		}
		else $html['error'] = '<div> Already Done <i class="fa fa-exclamation-triangle"></div>'; 
	}
	else $html['error'] = '<div> Error Data <i class="fa fa-exclamation-triangle"> Try Again </div>';
	
?>