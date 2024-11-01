<?php

/*
* @Author 		Jaed Mosharraf
* Copyright: 	2015 Jaed Mosharraf
*/

if ( ! defined('ABSPATH')) exit;  // if direct access
	
	function wp_ld_the_content_filter($content) 
	{
		if ( get_post_type() == 'post' || get_post_type() == 'page'):
			$class_wp_ld_functions = new class_wp_ld_functions();
		
			$content .= '
		
			<div class="wp_ld_button_inline">
				
				<div id="wp_ld_onclick_btn" wp_ld_action="1" wp_ld_post_id="'.get_the_ID().'" >
					<span id="wp_ld_btn_1_'.get_the_ID().'" class="css_button_small css_button_green"> '.
						__('Like This <i class="fa fa-thumbs-up"></i> ','wp_ld').' 
						('. $class_wp_ld_functions->wp_ld_counter('1',get_the_ID()) .') 
					</span>
				</div>
				
				<div id="wp_ld_onclick_btn" wp_ld_action="2" wp_ld_post_id="'.get_the_ID().'" >
					<span id="wp_ld_btn_2_'.get_the_ID().'" class="css_button_small css_button_red"> '.
					__('Dislike This <i class="fa fa-thumbs-down"></i> ','wp_ld').' 
					('. $class_wp_ld_functions->wp_ld_counter('2',get_the_ID()) .') 
					</span>
				</div>
				<p class="wp_ld_message" id="wp_ld_message_'.get_the_ID().'"></p>
			</div>
			';
		else: $content .= '';
		endif;
		
		return $content;
	}

	
	
	
	
	