wp_register_script ( 'custom-script', get_template_directory_uri() . '/js/custom-script.js' );
wp_enqueue_script ( 'custom-script' );



//Link Scripts Only on a Plugin Administration Screen :
======================================================

function wpdocs_plugin_admin_init() {
    // Register our script.
    wp_register_script( 'my-plugin-script-mani', plugins_url( '/script.js', __FILE__ ),true );

}
add_action( 'admin_init', 'wpdocs_plugin_admin_init' );



// Localize Script  (ye hamesa pair me chalte hai )
--------------------------------------------------
$custom_javascript_array = array(
    "name"=>"mani singh",
    "age"=>"10",
    "ajaxurl"=>admin_url("admin-ajax")
);
wp_enqueue_script('test_script', plugins_url('/assets/js/script.js'), '', false);
wp_localize_script("test_script", "mybookajaxurl", $custom_javascript_array);


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

add_action("wp_enqueue_scripts","custom_plugin_assests");


// ============================================= add custom javascript or localize code   ===================================
	
	add_action("wp_head","myjscode");
	function myjscode(){
			// write custom code here 
			?>
			<script type='text/javascript'>
				alert("hello");
			</script>
			<?php
		}





