
============================================= upload media image  ===================================
<?php wp_enqueue_media(); ?> //add this in head section

<script>
	jQuery("#btn_click").on("click",function(){
		var images = window.wp.media = ({
			title:"Upload Image",
			multiple:true
		}).open().on("select",function(e){
			var  uploadImages = images.state().get()("selection");
			var selectedImages = uploadImages.toJSON();
			
			jQuery.each(selectedImages,function(index,image){
				console.log(image);
			});
		});
	});
</script>


##Method 1 :
------------

<?php

    $post_id =17;
        //print_r($_FILES); exit;
        global $wpdb;
        //$response = array();
    
        if( $_FILES['uploadedfiles']) {
    
        $file = $_FILES['uploadedfiles'];
        require_once( ABSPATH . 'wp-admin/includes/admin.php' );
        $file_return = wp_handle_upload( $file, array('test_form' => false ) );
        if( isset( $file_return['error'] ) || isset( $file_return['upload_error_handler'] ) ) {
            return false;
        } else {
            $filename = $file_return['file'];
            $attachment = array(
                'post_mime_type' => $file_return['type'],
                'post_title' => preg_replace( '/\.[^.]+$/', '', basename( $filename ) ),
                'post_content' => '',
                'post_status' => 'inherit',
                'guid' => $file_return['url']
            );
            $attachment_id = wp_insert_attachment( $attachment, $file_return['url'] );
            require_once(ABSPATH . 'wp-admin/includes/image.php');
            $attachment_data = wp_generate_attachment_metadata( $attachment_id, $filename );
            wp_update_attachment_metadata( $attachment_id, $attachment_data );
            if( 0 < intval( $attachment_id ) ) {
                set_post_thumbnail( $post_id, $attachment_id );
              return $attachment_id;
            }
        }
        return false;
    
        }

?>


## Method 2 :
------------- 


<?php 

$target_dir = ABSPATH.'wp-content/uploads/advisers/';
$target_file = $target_dir . basename($_FILES["image_upload"]["name"]);
		
  if (move_uploaded_file($_FILES["image_upload"]["tmp_name"], $target_file)) {
            $file = $target_file; 
            $filename = basename($file);
            $upload_file = wp_upload_bits($filename, null, file_get_contents($file));
            if (!$upload_file['error']) {
            	$wp_filetype = wp_check_filetype($filename, null );
            	$attachment = array(
            		'post_mime_type' => $wp_filetype['type'],
            		'post_parent' => $adviserID,
            		'post_title' => preg_replace('/\.[^.]+$/', '', $filename),
            		'post_content' => '',
            		'post_status' => 'inherit'
            	);
            	$attachment_id = wp_insert_attachment( $attachment, $upload_file['file'], $adviserID );
            	if (!is_wp_error($attachment_id)) {
            		require_once(ABSPATH . "wp-admin" . '/includes/image.php');
            		$attachment_data = wp_generate_attachment_metadata( $attachment_id, $upload_file['file'] );
            		wp_update_attachment_metadata( $attachment_id,  $attachment_data );
            		set_post_thumbnail( $adviserID, $attachment_id );
            	}
            }
        }
?>



# Display images :
------------------
<?php
src = wp_get_attachment_image_src( get_post_thumbnail_id($adviser->ID), 'thumbnail_size' );
$url = $src[0];	

==> second method  
get_the_post_thumbnail_url();

==> 3rd method 
echo wp_get_attachment_image( $attachment->ID, 'thumbnail' );

?>