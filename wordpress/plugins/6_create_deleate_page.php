<?php
// ============================================= create a page on plugin activate  ===================================
// create page on plugin activate 
function create_page(){
    $my_post = array(
        'post_title'    => "Book Page",
        'post_content'  => "[book_page]", //shortcode
        'post_status'   => 'publish',
        "post_type" =>"page",
        "post_slug" => "my_book"
    );
    // Insert the post into the database
    $book_id = wp_insert_post( $my_post );
    add_option("my_book_page_id",$book_id);
}
register_activation_hook(__FILE__, "create_page");

// ============================================= Delete a page on plugin deactivate  ===================================

register_uninstall_hook(__FILE__,"drop_page_func");
function drop_page_func(){
	// delete page on deactivate
	 if(!empty(get_option("my_book_page_id"))){
		$page_id = get_option("my_book_page_id");
		wp_delete_post($page_id, true); //wp_posts
		delete_option("my_book_page_id"); // wp_options
	}
}


