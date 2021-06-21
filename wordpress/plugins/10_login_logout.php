<?php
//	 * Fires after a new user registration has been recorded.
do_action( 'register_new_user', $user_id );
$user_pass = wp_generate_password( 12, false );

$credentials = array();
$credentials['user_login'] = "mani"
$credentials['user_password'] = "mani"
$credentials['remember'] =    true ; 
wp_signon( $credentials = array(), $secure_cookie = '' ); // For login in dashboard 


// =============================================== User redirect specific page after login  =====================================
 function owt_login_user_role_filter($redirect_to,$request,$user){
     // custom user role
     global $user;
     if(isset($user->roles) && is_array($user->roles)){ //array which contains the user roles
          if(in_array("wp_book_user_key",$user->roles)){
               return $redirect_to = site_url()."/my_book";
          }else{
                return $redirect_to;
          }
     }
}
add_filter("login_redirect","owt_login_user_role_filter",10,3);

// =============================================== User redirect specific page after logout  =====================================

function owt_logout_user_role_filter(){
     // custom user role
     wp_redirect(site_url()."/my_book");
     exit();
}
add_filter("wp_logout","owt_logout_user_role_filter");


// =================================== restrict non-admin to login page ====================================================
// Block non-administrators from accessing the WordPress back-end
function wpabsolute_block_users_backend() {
	if ( is_admin() && ! current_user_can( 'administrator' ) && ! wp_doing_ajax() ) {
		wp_redirect( home_url() );
		exit;
	}
}
add_action( 'init', 'wpabsolute_block_users_backend' ); 

// ====================================== Redirect after comment ==================================================================

function redirect_after_comment(){
wp_redirect('/thank-you/');
exit();
}
add_filter('comment_post_redirect', 'redirect_after_comment');
