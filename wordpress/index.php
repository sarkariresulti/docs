<!-- ================= worddpress flow chart ====================== -->

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
