

 $theme = wp_get_theme();
 echo $theme->get('Version');
 echo $theme->get('Author');


<?php get_header( 'nav' ); ?> //wp-content/yourTheme/header-nav.php
<?php get_sidebar( 'left' ); ?> // wp-content/yourTheme/sidebar-left.php
<?php get_sidebar( 'right' ); ?>// wp-content/yourTheme/sidebar-right.php
<?php get_footer( 'nav' ); ?> //wp-content/yourTheme/header-nav.php


get_template_part( 'content-templates/content', 'location' );
get_template_part( 'content-templates/content', 'product' );
get_template_part( 'content-templates/content', 'profile' );

echo get_parent_theme_file_uri( 'images/logo.png' );
echo get_parent_theme_file_path( 'images/logo.png' );


if ( function_exists( 'the_custom_logo' ) ) {
    the_custom_logo();
}



<h1><?php echo  bloginfo('name') ?> </h1>;


Sticky Posts :
-------------
$sticky = get_option( 'sticky_posts' );
$query = new WP_Query( 'p=' . $sticky[0] );



========================================= The Loop ======================================
Link: https://developer.wordpress.org/themes/basics/the-loop/
<?php 
get_header();
if ( have_posts() ) : 
    while ( have_posts() ) : the_post(); 
        // Display post content
    endwhile; 
endif; 
?>

 the_ID();
 body_class()
 post_class();
 the_category(' | ');
 the_author() 
 the_content();
 the_excerpt();
 the_meta();
 the_shortlink("My custom text");
 the_permalink();
 the_tags();
 the_title();
 the_time("y-m-d h:i:s");   

 get_the_post_thumbnail_url(); 
 the_post_thumbnail('thumbnail_size');  
 echo wp_get_attachment_image( $attachment->ID, 'thumbnail' );

 <h1><?php _e( 'Settings Page','my-theme' ); ?></h1>  // Direct display ho jata hai 
 echo __( 'Post', 'my-theme' )               // echo karana padata hai 


<a href="<?php echo get_permalink($post_id); ?>">This is a link</a>
<?php next_post_link(); ?>
<?php previous_post_link(); ?>


 $excerpt = get_the_excerpt(); 
 $excerpt = substr( $excerpt, 0, 260 ); // Only display first 260 characters of excerpt


Conditional tags: 
-----------------
link (more info ): https://developer.wordpress.org/themes/basics/conditional-tags/

is_user_logged_in()  ==> true if user is logged in
is_home() –        ==>  Returns true if the current page is the homepage
is_admin() –        ==>  Returns true if inside Administration Screen, false otherwise
is_single() –        ==>  Returns true if the page is currently displaying a single post
is_page() –        ==>  Returns true if the page is currently displaying a single page
is_page_template() –        ==>  Can be used to determine if a page is using a specific template, for example: is_page_template('about-page.php')
is_category() –        ==>  Returns true if page or post has the specified category, for example: is_category('news')
is_tag() –        ==>  Returns true if a page or post has the specified tag
is_author() –        ==>  Returns true if inside author’s archive page
is_search() –        ==>  Returns true if the current page is a search results page
is_404() –        ==>  Returns true if the current page does not exist
has_excerpt() –        ==>  Returns true if the post or page has an excerpt


 rewind_posts() ==> his is useful if you want to display the same query twice in different locations on a page.

example : 
--------

<?php
// Start the main loop
if ( have_posts() ) : 
    while ( have_posts() ) : the_post();
        the_title();
    endwhile;
endif;
 
// Use rewind_posts() to use the query a second time.
rewind_posts();
 
// Start a new loop
while ( have_posts() ) : the_post();
    the_content();
endwhile;

?>

wp_reset_postdata() ==> After looping through a separate query, this function restores the $post global to the current post in the main query.


if ( ! function_exists( 'myfirsttheme_setup' ) ) :

endif;


Including CSS & JavaScript : 
---------------------------

link (for more info) : https://developer.wordpress.org/themes/basics/including-css-javascript/


Taxonomy Template Hierarchy :
-----------------------------

Link (more info) : https://developer.wordpress.org/themes/template-files-section/taxonomy-templates/

taxonomy-{taxonomy}-{term}.php
taxonomy-{taxonomy}.php
tag-{slug}.php
tag-{id}.php
category-{slug}.php
category-{ID}.php





=========================================================================================
====================================== ALL Important Filter Hook ========================
=========================================================================================
<?php 

add_filter( 'body_class', 'twenty_twenty_one_body_classes' );
function twenty_twenty_one_body_classes( $classes ) {
        $classes[] = is_singular() ? 'singular' : 'hfeed';
        // Add a body class if there are no footer widgets.
        if ( ! is_active_sidebar( 'sidebar-1' ) ) {
            $classes[] = 'no-widgets';
        }
}

add_filter( 'post_class', 'twenty_twenty_one_post_classes', 10, 3 );
function twenty_twenty_one_post_classes( $classes ) {
    $classes[] = 'entry';
    return $classes;
}



add_action( 'wp_head', 'twenty_twenty_one_pingback_header' );
add_action( 'wp_footer', 'twenty_twenty_one_supports_js' );


add_filter( 'comment_form_defaults', 'twenty_twenty_one_comment_form_defaults' );
function twenty_twenty_one_comment_form_defaults( $defaults ) {
    // Adjust height of comment form.
    $defaults['comment_field'] = preg_replace( '/rows="\d+"/', 'rows="5"', $defaults['comment_field'] );
    return $defaults;
}


add_filter( 'excerpt_length', 'wpdocs_custom_excerpt_length', 999 );
function wpdocs_custom_excerpt_length( $length ) {
    return 20;
}

add_filter( 'excerpt_more', 'wpdocs_excerpt_more' );
function wpdocs_excerpt_more( $more ) {
    return '<a href="'.get_the_permalink().'" rel="nofollow">Read More...</a>';
}


function wpdocs_add_post_link( $html ){
    $html = str_replace( '<a ', '<a class="page-link" ', $html );
    return $html;
}
add_filter( 'next_post_link', 'wpdocs_add_post_link' );
add_filter( 'previous_post_link', 'wpdocs_add_post_link' );

?>





the_custom_logo();
echo get_option('barra_link_color');
 $theme_support = get_theme_support( 'custom-logo' );

======================
$user = wp_get_current_user();
$allowed_roles = array( 'editor', 'administrator' );
if ( array_intersect( $allowed_roles, $user->roles ) ) {
	print_r($classes);
}



===============
get_author_posts_url( int $author_id, string $author_nicename = '' );

get_the_author_meta( string $field = '', int|false $user_id = false )
get_the_author_meta( 'nicename', $author_id );
get_the_author_meta( 'email', $author_id );
get_the_author_meta( 'url', $author_id );

==========
the_time(y-m-d h:i:s);
the_permalink( int|WP_Post $post );

<body <?php body_class(); ?>>


===================
the_post_thumbnail( string|int[] $size = 'post-thumbnail', string|array $attr = '' );
//Default WordPress
the_post_thumbnail( 'thumbnail' );     // Thumbnail (150 x 150 hard cropped)
the_post_thumbnail( 'medium' );        // Medium resolution (300 x 300 max height 300px)
the_post_thumbnail( 'medium_large' );  // Medium Large (added in WP 4.4) resolution (768 x 0 infinite height)
the_post_thumbnail( 'large' );         // Large resolution (1024 x 1024 max height 1024px)
the_post_thumbnail( 'full' );          // Full resolution (original size uploaded)
//With WooCommerce
the_post_thumbnail( 'shop_thumbnail' ); // Shop thumbnail (180 x 180 hard cropped)
the_post_thumbnail( 'shop_catalog' );   // Shop catalog (300 x 300 hard cropped)
the_post_thumbnail( 'shop_single' );    // Shop single (600 x 600 hard cropped)
<?php if ( has_post_thumbnail() ) : ?>
    <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
        <?php the_post_thumbnail(); ?>
    </a>
<?php endif; ?>
===================
$post = get_post( $post_id );  // get post  data by post id 

get_the_category();
get_category_link();


<?php get_template_part( 'tempate-parts/content', 'page' ); ?>
get_template_part( 'tempate-parts/content',get_post_format());

get_template_directory_uri();
the_content();

is_home();
is_front_page();

has_nav_menu('header')

add_filter( 'nav_menu_css_class' , 'wpdocs_channel_nav_class' , 10, 4 );
add_action('nav_menu_submenu_css_class', 'custom_submenu_css_class');
add_filter( 'nav_menu_link_attributes', 'nav_menu_anchor_as_class', 10, 3 );






