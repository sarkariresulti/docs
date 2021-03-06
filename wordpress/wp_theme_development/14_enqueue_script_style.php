wp_register_script ( 'custom-script', get_template_directory_uri() . '/js/custom-script.js' );
wp_enqueue_script ( 'custom-script' );
wp_add_inline_script( 'custom-script', 'jQuery(document).ready(function(){});' );


// Localize Script (ye hamesa pair me chalte hai )
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
function custom_plugin_assests()
{
	// Add Css
	wp_enqueue_style(
		'cpl_style',                                         // unique name for css file
		PLUGIN_URL . "/custom-plugin/assest/css/style.css",    // css file path
		'',                                                  // dependency on other file 
		PLUGIN_VERSION										 // PLUGIN VERSION
	);

	// Add Script
	wp_enqueue_script(
		'cpl_script',                                         // unique name for css file
		PLUGIN_URL . "/custom-plugin/assest/css/script.js",    // css file path
		'',                                                  // dependency on other file 
		PLUGIN_VERSION,								     // PLUGIN VERSION
		true							         			 // true for show in footer , false for show in header 
	);
}

add_action("wp_enqueue_scripts", "custom_plugin_assests");


// ============================================= add custom javascript or localize code   ===================================

add_action("wp_head", "myjscode");
function myjscode()
{
	// write custom code here 
?>
	<script type='text/javascript'>
		alert("hello");
	</script>
<?php
}
?>




<!-- // =============================== ALL FOR ADMIN SCREEN ========================= -->
<?php 
//Link Scripts Only on a Plugin Administration Screen :
function wpdocs_plugin_admin_init() {
		// Register our script.
		wp_register_script( 'my-plugin-script-mani', plugins_url( '/script.js', __FILE__ ),true );
}
add_action( 'admin_init', 'wpdocs_plugin_admin_init' );

//					or 

function wpdocs_selectively_enqueue_admin_script( $hook ) {
	wp_enqueue_script( 'my_custom_script', plugin_dir_url( __FILE__ ) . 'myscript.js', array(), '1.0' );
}
add_action( 'admin_enqueue_scripts', 'wpdocs_selectively_enqueue_admin_script' );

					
add_action('admin_footer', 'my_admin_footer_function');
function my_admin_footer_function($data) {
   echo  $data = '<p>mani_checking_footer</p>';
    return $data;
}

add_action( 'admin_head', 'my_custom_admin_head' );
function my_custom_admin_head() {
    echo '<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" >';
}



