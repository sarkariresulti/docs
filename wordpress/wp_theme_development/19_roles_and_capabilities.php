<?php 

/* Your Default Role :
*  -------------------
* link: Link: https://codex.wordpress.org/User_Levels  (Info about lavels)
*
*/
update_option('default_role', YOUR_NEW_DEFAULT_ROLE)

add_role( 'administrator', 'Administrator' );

// Add caps for Administrator role.
    $role = get_role( 'administrator' );
	$role->add_cap( 'switch_themes' );
	$role->add_cap( 'edit_themes' );
	$role->add_cap( 'activate_plugins' );
	$role->add_cap( 'edit_plugins' );
	$role->add_cap( 'edit_users' );
	$role->add_cap( 'edit_files' );
	$role->add_cap( 'manage_options' );
	$role->add_cap( 'moderate_comments' );
	$role->add_cap( 'manage_categories' );
	$role->add_cap( 'manage_links' );
	$role->add_cap( 'upload_files' );
	$role->add_cap( 'import' );
	$role->add_cap( 'unfiltered_html' );
	$role->add_cap( 'edit_posts' );
	$role->add_cap( 'edit_others_posts' );
	$role->add_cap( 'edit_published_posts' );
	$role->add_cap( 'publish_posts' );
	$role->add_cap( 'edit_pages' );
	$role->add_cap( 'read' );
	$role->add_cap( 'level_10' );
	$role->add_cap( 'level_9' ); 
	$role->add_cap( 'level_8' );
	$role->add_cap( 'level_7' );
	$role->add_cap( 'level_6' );
	$role->add_cap( 'level_5' );
	$role->add_cap( 'level_4' );
	$role->add_cap( 'level_3' );
	$role->add_cap( 'level_2' );
	$role->add_cap( 'level_1' );
	$role->add_cap( 'level_0' );


add_role( 'superintendent', 'Superintendent', get_role( 'administrator' )->capabilities );

//=============================================================================================
// Example No 2 :

add_user_meta(int $user_id,string $meta_key,mixed $meta_value,bool $unique = false);
update_user_meta(int $user_id,string $meta_key,mixed $meta_value,mixed $prev_value = '');
delete_user_meta(int $user_id,string $meta_key,mixed $meta_value = '');
get_user_meta(int $user_id,string $key = '',bool $single = false);

