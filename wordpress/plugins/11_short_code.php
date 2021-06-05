
add_shortcode( 'baztag', 'wpdocs_baztag_func' );
function wpdocs_baztag_func( $atts, $content = "" ) {
    return "content = $content";
}

 