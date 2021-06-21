=======================================
do_action( 'plugins_loaded' );   // Fires once activated plugins have loaded.
do_action( 'setup_theme' );      // Fires before the theme is loaded.
do_action( 'after_setup_theme' );   //Fires after the theme is loaded. 
do_action( 'init' );                //Fires after WordPress has finished loading but before any headers are sent.
do_action( 'wp_loaded' );           // This hook is fired once WP, all plugins, and the theme are fully loaded and instantiated.

header( 'Content-Type: text/html; charset=' . get_option( 'blog_charset' ) );
header( 'X-Robots-Tag: noindex' );

// Require an action parameter.
if ( empty( $_REQUEST['action'] ) ) {
	wp_die( '0', 400 );
}

do_action( 'admin_init' );
do_action( 'shutdown' );        Fires just before PHP shuts down execution.


<!-- ================= for headers =============== -->
wp-includes>
return apply_filters( 'http_origin', $origin );   // return http://localhost 
return apply_filters( 'allowed_http_origin', $origin);  // return url http://localhost if allowed otherwise empty return 


$allowed_origins = array_unique(
		array(
			'http://' . $admin_origin['host'],
			'https://' . $admin_origin['host'],
			'http://' . $home_origin['host'],
			'https://' . $home_origin['host'],
		)
	);

return apply_filters( 'allowed_http_origins', $allowed_origins );

admin_url();
home_url();



## Checking current user Ability 
--------------------------------
current_user_can( 'edit_posts' );                            // For all post 
current_user_can( 'edit_post', $post->ID );                  // Particular post 
current_user_can( 'edit_post_meta', $post->ID, $meta_key );  // For particualr Post Meta Key 

Example No 1  :
---------

if ( ! current_user_can( 'delete_post', $post_id ) ) {
    wp_die( __( 'Sorry, you are not allowed to move this item to the Trash.' ) );
}

if ( ! current_user_can( 'manage_options' ) ) {
    add_filter( 'show_admin_bar', '__return_false' );
}


## Checking For allowed Roles :
------------------------------
$user = wp_get_current_user();
$allowed_roles = array( 'editor', 'administrator', 'author' );
if ( array_intersect( $allowed_roles, $user->roles ) ) {
   // Stuff here for allowed roles
}

