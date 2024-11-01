<?php

/*
* @Author 		Jaed Mosharraf
* Copyright: 	2015 Jaed Mosharraf
*/

if ( ! defined('ABSPATH')) exit;  // if direct access 

$html = '';
	$html .= '<link  type="text/css" media="all" rel="stylesheet"  href="'.wp_ld_plugin_url.'css/font-awesome.min.css'.'" >';	
	$html .= '<br><br>';
	
	$html .= '<div class="pb_free_notice_box" align="center">
				<a href="http://pluginbazar.co.nf/" target="_blank" class="pb_name">pluginbazar </a>
				<hr>
				<span class="pb_free_notice">
					<i class="fa fa-exclamation-triangle"></i> Currently You are using free version of this Plugin. To get all features have a Paid Version.</span>
				<hr>
				<a class="pb_buy_pro_url" href="'.wp_ld_pro_url.'" target="_blank">Click Here to BUY</a>
			</div>';
	
	$html .= '
	<div class="wpld_pro_preview_images">
		<ul>
			<li><h2>List view of Liked or Disliked Post - Pro Feature</h2>
				<img class="wpld_preview_1" src="'.wp_ld_plugin_url.'admin/images/wpld-preview-admin-like-dislike-info-list.png"</li>
			<li><h2>Expand view of each Liked or Disliked Post - Pro Feature</h2>
				<img class="wpld_preview_2" src="'.wp_ld_plugin_url.'admin/images/wpld-preview-admin-like-dislike-info-details.png"</li>
		</ul>
	</div>
	';
	
	
	echo __( $html, 'wp_ld' );