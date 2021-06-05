<?php get_bloginfo('name');  // isko echo karna padata hai  ?>

<h1><?php bloginfo( 'name' ); ?></h1> // direct echo ho jata hai 


‘name’ –		     	==>Site title (set in Settings > General)
‘description’ –      	==>Site tagline (set in Settings > General)
‘wpurl’ – 		     	==>The WordPress address (URL) (set in Settings > General)
‘url’ – 		     	==>The Site address (URL) (set in Settings > General)
‘admin_email’ –      	==>Admin email (set in Settings > General)
‘charset’ – 	     	==>The "Encoding for pages and feeds" (set in Settings > Reading)
‘version’ –		     	==>The current WordPress version
‘html_type’ – 	     	==>The content-type (default: "text/html"). Themes and plugins can override the default value using 				  the ‘pre_option_html_type’ filter
‘text_direction’ –	 	==>The text direction determined by the site’s language. is_rtl() should be used instead
‘language’ – 	  	 	==>Language code for the current site
‘stylesheet_url’ – 	 	==>URL to the stylesheet for the active theme. An active child theme will take precedence     over this value
‘stylesheet_directory’ – ==>Directory path for the active theme. An active child theme will take precedence over this value
‘template_url’ / ‘template_directory’ –	 ==>URL of the active theme’s directory. An active child theme will NOT take precedence over this value
‘pingback_url’ –		The pingback XML-RPC file URL (xmlrpc.php)
‘atom_url’ – 			The Atom feed URL (/feed/atom)
‘rdf_url’ – 			The RDF/RSS 1.0 feed URL (/feed/rdf)
‘rss_url’ – 			The RSS 0.92 feed URL (/feed/rss)
‘rss2_url’ – 			The RSS 2.0 feed URL (/feed)
‘comments_atom_url’ – 	The comments Atom feed URL (/comments/feed)
‘comments_rss2_url’ – 	The comments RSS 2.0 feed URL (/comments/feed)

‘siteurl’ – Use ‘url’ instead
‘home’ – Use ‘url’ instead

// site_data deta info :
-----------------------

admin_email          = admin@example.com
atom_url             = http://www.example.com/home/feed/atom
charset              = UTF-8
comments_atom_url    = http://www.example.com/home/comments/feed/atom
comments_rss2_url    = http://www.example.com/home/comments/feed
description          = Just another WordPress blog
home                 = http://www.example.com/home (DEPRECATED! use url option instead)
html_type            = text/html
language             = en-US
name                 = Testpilot
pingback_url         = http://www.example.com/home/wp/xmlrpc.php
rdf_url              = http://www.example.com/home/feed/rdf
rss2_url             = http://www.example.com/home/feed
rss_url              = http://www.example.com/home/feed/rss
siteurl              = http://www.example.com/home (DEPRECATED! use url option instead)
stylesheet_directory = http://www.example.com/home/wp/wp-content/themes/largo
stylesheet_url       = http://www.example.com/home/wp/wp-content/themes/largo/style.css
template_directory   = http://www.example.com/home/wp/wp-content/themes/largo
template_url         = http://www.example.com/home/wp/wp-content/themes/largo
text_direction       = ltr
url                  = http://www.example.com/home
version              = 3.5
wpurl                = http://www.example.com/home/wp


