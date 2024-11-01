/*
* @Author 		Jaed Mosharraf
* Copyright: 	2015 Jaed Mosharraf
*/

jQuery(document).ready(function($)
{	
	//=========== Settings for Like / Dislike  =====================//
	$(document).on('click', '#wp_ld_onclick_btn', function()
	{
		var wp_ld_action 	= $(this).attr('wp_ld_action');	 // value = like/dislike
		var wp_ld_post_id 	= $(this).attr('wp_ld_post_id'); // value = post id	
	
		if ( wp_ld_action.length != 0 && wp_ld_post_id != 0 ) 
		{
			$.ajax(
			{
				type: 'POST',
				context: this,
				url:wp_ld_ajax.wp_ld_ajaxurl,
				data: {
					"action": "wp_ld_ajax_wp_ld_onclick_btn", 
					"wp_ld_action":wp_ld_action,	
					"wp_ld_post_id":wp_ld_post_id,	
				},
				success: function(data) {
					var new_data = data.replace(new RegExp(data.split(">")[0] + '>', 'g'), '');
					var html = JSON.parse(new_data)

					var success 		= html['success'];
					var error 			= html['error'];
					var wp_ld_counter	= html['wp_ld_counter'];
					
					if ( success )
					{
						$('p#wp_ld_message_' + wp_ld_post_id ).html(success);
						setTimeout(function()
						{
							if ( wp_ld_action == 1 )
								$('#wp_ld_btn_1_' + wp_ld_post_id ).text('Like This ('+ wp_ld_counter +')');
							else if ( wp_ld_action == 2 )
								$('#wp_ld_btn_2_' + wp_ld_post_id ).text('Dislike This ('+ wp_ld_counter +')');
							
							$('p#wp_ld_message_' + wp_ld_post_id ).html("");
						}, 2000);
					}
					if ( error )
					{
						$('p#wp_ld_message_' + wp_ld_post_id ).html(error);
						setTimeout(function()
						{ 
							$('p#wp_ld_message_' + wp_ld_post_id ).html("");
						}, 2000);
					}	
				}
			});
		}
	}
	
	
	)
});