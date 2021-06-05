<?php 

add_shortcode( 'custum_post_li_listing', 'custum_post_li_listing_func');

function custum_post_li_listing_func( $atts, $content = null ) {
    ob_start();
    // your code
    $data = ob_get_contents();
    ob_clean();
    return $data;
}


##Example : 
##--------

add_shortcode( 'custum_post_li_listing', 'custum_post_li_listing_func');
function custum_post_li_listing_func( $atts, $content = null ) {
  $post_type = $atts['post_type'];
  $taxonomy = $atts['taxonomy'];
  $cat_slug = $atts['cat_slug'];
  $cat_id   = $atts['cat_id'];

    ob_start();
	$args = array(
		'post_type' => $post_type,
		'orderby' => 'id',
		'order' => 'ASC',
		'posts_per_page' => -1,
		'post_status'=> 'publish',
		'tax_query' => array(
			array(
			'taxonomy' => $taxonomy,
			'field' => $cat_slug,
			'terms' => $cat_id
			 )
		  )
		); 
$result = new WP_Query( $args );
?>
	<div class="all_custom_cats_post widget">
		<ul>	
			<?php
			foreach($result->posts as $resultt) {
				 $url = get_permalink($resultt->ID);
			?> 
			<li> <a href="<?php echo $url; ?>" > <?php echo $resultt->post_title; ?></a></li>
		    <?php } ?>
		</ul>
	</div>

	<?php
		$data = ob_get_contents();
		ob_clean();
		return $data;
}
?>