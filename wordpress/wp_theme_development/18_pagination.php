Loop with Pagination :
----------------------

<?php if ( have_posts() ) : ?>
 
    <!-- Add the pagination functions here. -->
 
    <!-- Start of the main loop. -->
    <?php while ( have_posts() ) : the_post(); ?>
 
    <!-- the rest of your theme's main loop -->
 
    <?php endwhile; ?>
    <!-- End of the main loop -->
 
    <!-- Add the pagination functions here. -->
 
 
<div class="nav-previous alignleft"><?php next_posts_link( 'Older posts' ); ?></div>
 
 
 
<div class="nav-next alignright"><?php previous_posts_link( 'Newer posts' ); ?></div>
 
 
<?php else : ?>
 
<?php _e('Sorry, no posts matched your criteria.'); ?>
 
<?php endif; ?>

on Single page :
===============

next_posts_link(); 
previous_posts_link();


For Archive :
============

# method  no 1 (ye ni karega )
--------------
posts_nav_link();	// it will show Default label and separator
		or 
posts_nav_link('^', 'pichala page','Agala page');


#2 method no 2 (ye previous or next ke bich me number display karega )
--------------

the_posts_pagination( array(
        'screen_reader_text' =>'My pagination links',
        'mid_size'  => 1,
        'prev_text' => __( 'Back', 'textdomain' ),
        'next_text' => __( 'Onward', 'textdomain' ),
    ) );



