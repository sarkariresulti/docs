Important (`Action Hook`) :
--------------------------

link: https://wordpress.stackexchange.com/questions/262396/difference-between-hooks-plugin-loaded-and-admin-int/263906


1. Sabse pahale `themes` folder me ek folder banaye . or uska name kuchh bhi rakha le 
2. fir folder me jaye or  `index.php` or `style.css` , `screenshot.png
` name ke file bana le 


Note : 
======

Yadi aap style.css name ki file bana lete hai or usme `Theme Name ` nahi dete hai to  by default jis name se 
apne folder banaya hai vahi name le lega 

Very Important Note :
---------------------
do_action( 'init' )      // Fires after WordPress has finished loading but before any headers are sent.
do_action( 'wp_loaded' )    //This hook is fired once WP, all plugins, and the theme are fully loaded and instantiated.

For Parent Theme :
------------------
define( 'BARRA_THEME_VERSION', '3.4.6' );
define( 'BARRA_THEME_DIR', trailingslashit( get_template_directory() ) );
define( 'BARRA_THEME_URI', trailingslashit( esc_url( get_template_directory_uri() ) ) );

For Child Theme : 
----------------
<?php require_once( get_stylesheet_directory(). '/my_included_file.php' ); ?>
<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/my_picture.png" alt="" />


style.css 
---------

/*
Theme Name: Twenty Twenty
Theme URI: https://wordpress.org/themes/twentytwenty/
Author: the WordPress team
Author URI: https://wordpress.org/
Description: Our default theme for 2020 is designed to take full advantage of the flexibility of the block editor. Organizations and businesses have the ability to create dynamic landing pages with endless layouts using the group and column blocks. The centered content column and fine-tuned typography also makes it perfect for traditional blogs. Complete editor styles give you a good idea of what your content will look like, even before you publish. You can give your site a personal touch by changing the background colors and the accent color in the Customizer. The colors of all elements on your site are automatically calculated based on the colors you pick, ensuring a high, accessible color contrast for your visitors.
Tags: blog, one-column, custom-background, custom-colors, custom-logo, custom-menu, editor-style, featured-images, footer-widgets, full-width-template, rtl-language-support, sticky-post, theme-options, threaded-comments, translation-ready, block-styles, wide-blocks, accessibility-ready
Version: 1.3
Requires at least: 5.0
Tested up to: 5.4
Requires PHP: 7.0
License: GNU General Public License v2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
Text Domain: twentytwenty
This theme, like WordPress, is licensed under the GPL.
Use it to make something cool, have fun, and share what you've learned with others.
*/



Details : 
---------

Items indicated with (*) are required for a theme in the WordPress Theme Repository.

1. Theme Name (*): Name of the theme.
2. Theme URI: The URL of a public web page where users can find more information about the theme.
3. Author (*): The name of the individual or organization who developed the theme. Using the Theme Author’s wordpress.org username is recommended.
4. Author URI: The URL of the authoring individual or organization.
5. Description (*): A short description of the theme.
6. Version (*): The version of the theme, written in X.X or X.X.X format.
7. Requires at least (*): The oldest main WordPress version the theme will work with, written in X.X format. Themes are only required to support the three last versions.
8. Tested up to (*): The last main WordPress version the theme has been tested up to, i.e. 5.4. Write only the number, in X.X format.
9. Requires PHP (*): The oldest PHP version supported, in X.X format, only the number
10. License (*): The license of the theme.
11. License URI (*): The URL of the theme license.
12. Text Domain (*): The string used for textdomain for translation.
13. Tags: Words or phrases that allow users to find the theme using the tag filter. A full list of tags is in the Theme Review Handbook.
14. Domain Path: Used so that WordPress knows where to find the translation when the theme is disabled. Defaults to /languages.




Style.css for a Child Theme 
---------------------------

/*
Theme Name: My Child Theme
Template: twentytwenty
*/


@import url("../astra/style.css");  

			or 
add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles' );
function my_theme_enqueue_styles() {
    $parenthandle = 'parent-style'; // This is 'twentyfifteen-style' for the Twenty Fifteen theme.
    $theme = wp_get_theme();
    wp_enqueue_style( $parenthandle, get_template_directory_uri() . '/style.css', 
        array(),  // if the parent theme code has a dependency, copy it to here
        $theme->parent()->get('Version')
    );
    wp_enqueue_style( 'child-style', get_stylesheet_uri(),
        array( $parenthandle ),
        $theme->get('Version') // this only works if you have Version in the style header
    );
}
