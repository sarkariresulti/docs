
Theme me kuchh bhi dikhae iske liye hame ise enable karna padata hai. ise ham `after_setup_theme` action hook ke 
bad setup karte hai 

Syntax : 
--------
add_theme_support( string $feature, mixed $args )

link: https://developer.wordpress.org/reference/functions/add_theme_support/

$feature
---------
(string) (Required) The feature being added. Likely core values include:

'admin-bar'
'align-wide'
'automatic-feed-links'
'core-block-patterns'
'custom-background'
'custom-header'
'custom-line-height'
'custom-logo'
'customize-selective-refresh-widgets'
'custom-spacing'
'custom-units'
'dark-editor-style'
'disable-custom-colors'
'disable-custom-font-sizes'
'editor-color-palette'
'editor-gradient-presets'
'editor-font-sizes'
'editor-styles'
'featured-content'
'html5'
'menus'
'post-formats'
'post-thumbnails'
'responsive-embeds'
'starter-content'
'title-tag'
'wp-block-styles'
'widgets'

$args :
------
(mixed) (Optional) extra arguments to pass along with certain features.


Example No 1 :
--------------

// This theme requires WordPress or later.
if ( version_compare( $GLOBALS['wp_version'], '5.3', '<' ) ) {
	require get_template_directory() . '/inc/back-compat.php';
}

if ( ! function_exists( 'twenty_twenty_one_setup' ) ) {
    function twenty_twenty_one_setup() {

        /**
		 * Add post-formats support.
		 */
        add_theme_support('post-formats',
            array(
                'link',
                'aside',
                'gallery',
                'image',
                'quote',
                'status',
                'video',
                'audio',
                'chat',
            )
        );

        /*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
				'navigation-widgets',
			)
		);

        /**
		 * Add support for core custom logo.
		 *
		 */
		$logo_width  = 300;
		$logo_height = 100;
		add_theme_support(
			'custom-logo',
			array(
				'height'               => $logo_height,
				'width'                => $logo_width,
				'flex-width'           => true,
				'flex-height'          => true,
				'unlink-homepage-logo' => true,
			)
        );

        // Custom background color.
		add_theme_support(
			'custom-background',
			array(
				'default-color' => 'ff0000',
			)
		);
        
    }
}
add_action( 'after_setup_theme', 'twenty_twenty_one_setup', 0 );


Note : 
-----
yaha ye bataya hai ki kaise theme me theme support ki value ko use karte hai 

get_theme_support( 'custom-logo', 'width' )   // return width



=============================================== EXAMPLES ===========================================

Add Featured Image Support :
--------------------------

// add featured image support 
function add_featured_image_by_mani(){
    add_theme_support('post-thumbnails');

    //add image sizes which one saved after save post  
    add_image_size('small-thumbnail',120,90,true);
    add_image_size('small-thumbnail',700,350,true);
}
add_action('after_setup_theme','add_featured_image_by_mani');


<?php the_post_thumbnail('1'); ?> 
<?php the_post_thumbnail('small-thumbnail'); ?>

has_post_thumbnail();  // it will return true or false 



Add Custom Logo :
----------------

all theme support refrence ==> https://developer.wordpress.org/reference/functions/add_theme_support/

// add custom logo for theme
    function custom_logo_setup(){
        $args =  array(
            'height'      => 50,
            'width'       => 177,
            'flex-height' => true,
            'flex-width'  => true,
            'header-text' => array( 'site-title', 'site-description' ),
        );
        add_theme_support( 'custom-logo', $args);
    }
    add_action('after_setup_theme','custom_logo_setup');

	
// display post on front end
<?php
		$custom_logo_id = get_theme_mod('custom_logo');
		$logo = wp_get_attachment_image_src($custom_logo_id,'full');
		if(has_custom_logo()){
			$img = esc_url($logo[0]);
		}
			   or 
		the_custom_logo(); 
		

	?>

