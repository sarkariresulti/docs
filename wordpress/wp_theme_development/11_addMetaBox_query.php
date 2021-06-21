<?php
//// meta box
function wpdocs_register_meta_boxes() {
    add_meta_box( 'list-services', __( 'List of Services', 'textdomain' ), 'wpdocs_my_display_callback', 'page' );
}
add_action( 'add_meta_boxes', 'wpdocs_register_meta_boxes' );

function wpdocs_my_display_callback( $post ) {
	$all_services = get_post_meta($post->ID, 'all_repair_services', true);
	print_r($all_services);
	$mani_address = get_post_meta($post->ID, 'mani_address', true);
	print_r($mani_address);
	 echo '<input type="text" name="address" value="kanpur" >';
	
	//kk
}
add_action('save_post','save_post_callback');
function save_post_callback($post_id){ 
	 global $post;  
	//$title_array = array_filter($_POST['phone_repair_title']);
	
	update_post_meta($post_id, 'all_repair_services', $main_data);
	update_post_meta($post_id, 'mani_address', $_POST['address']);
}

