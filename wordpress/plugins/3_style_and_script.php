<?php 

// ================================== add css and scripts using wordpress function =========================
function custom_plugin_assests (){
	// Add Css
	wp_enqueue_style(
	'cpl_style',                                         // unique name for css file
	PLUGIN_URL."/custom-plugin/assest/css/style.css",    // css file path
	'',                                                  // dependency on other file 
	PLUGIN_VERSION										 // PLUGIN VERSION
	);
	
	// Add Script
	wp_enqueue_script(
	'cpl_script',                                         // unique name for css file
	PLUGIN_URL."/custom-plugin/assest/css/script.js",    // css file path
	'',                                                  // dependency on other file 
	PLUGIN_VERSION ,								     // PLUGIN VERSION
	true							         			 // true for show in footer , false for show in header 
	);
}

add_action("init","custom_plugin_assests");


// ============================================= add custom javascript or localize code   ===================================
	$custom_javascript_array = array(
		"name"=>"mani singh",
		"age"=>"10",
		"ajaxurl"=>admin_url("admin-ajax")
	);
	wp_enqueue_script('script.js', MY_BOOK_PLUGIN_URL . '/assets/js/script.js', '', true);
	wp_localize_script("script.js", "mybookajaxurl", $custom_javascript_array);
	
	
	add_action("wp_head","myjscode");
	function myjscode(){
			// write custom code here 
			?>
			<script type='text/javascript'>
				alert("hello");
			</script>
			<?php
		}


