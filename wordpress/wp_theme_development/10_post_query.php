WP_Query Filter hook :
----------------------
$where = apply_filters_ref_array( 'posts_where_paged', array( $where, &$this ) );
$groupby = apply_filters_ref_array( 'posts_groupby', array( $groupby, &$this ) );
$join = apply_filters_ref_array( 'posts_join_paged', array( $join, &$this ) );
$orderby = apply_filters_ref_array( 'posts_orderby', array( $orderby, &$this ) );
$distinct = apply_filters_ref_array( 'posts_distinct', array( $distinct, &$this ) );
$limits = apply_filters_ref_array( 'post_limits', array( $limits, &$this ) );
$fields = apply_filters_ref_array( 'posts_fields', array( $fields, &$this ) );

$clauses = (array) apply_filters_ref_array( 'posts_clauses', array( compact( $pieces ), &$this ) );


====================== CREATE TABLE  =========================
<?php 
global $wpdb;
    require_once ABSPATH . 'wp-admin/includes/upgrade.php';
	$table_name = 'my_custom_table';

	if($wpdb->get_var("SHOW TABLES LIKE '$table_name'") != $table_name) {
			$sql = "CREATE TABLE `my_custom_table` (
				`id` int(10) NOT NULL,
				`name` varchar(22) NOT NULL,
				`mail` varchar(22) NOT NULL,
				`home` varchar(22) NOT NULL
			) ENGINE=InnoDB DEFAULT CHARSET=latin1
			";
			dbDelta($sql);
		}
?>

###################################  create  post   ##############
<?php

// insert Post
$my_post = array(
	'post_title'    => "Book Page",
	'post_content'  => "[book_page]", //shortcode
	'post_status'   => 'publish',
	"post_type" =>"page",
	"post_slug" => "my_book"
);
// Insert the post into the database
$book_id = wp_insert_post( $my_post );
add_option("my_book_page_id",$book_id);

?>

Hint:
-----

%s (string)
%d (integer)
%f (float)


Custum Table :
--------------
global $wpdb;
$table_name = 'Your Table Name';
$data		= array('column1' => 'value1', 'column2' => 123,);
$format     = array( '%s', '%d'); 
$wpdb->insert( $table_name,$data, $format);
$inserted_id = $wpdb->insert_id;


###################################  update  partcular post   ##############
<?php  $posts = array(
			'ID' => $adviserID,
			'post_content' => ''.$about_me.'',
			'post_title'    => ''.$full_name.'',
			'post_author'    => ''.$adviser_id.'',
			'post_status'   => 'publish',
		);
		 
		$post_up = wp_update_post($posts);		

	 ?>

Custum Table :
--------------
global $wpdb;
$table_name   = 'Your Table Name';
$data		  = array('column1' => 'value1', 'column2' => 123,);
$format       = array( '%s', '%d'); 
$where 		  = array( 'ID' => 1 );
$where_format =array( '%d' );
$wpdb->update( $table_name,$data, $where , $format,$where_format);


###################################  Delete  partcular post   ##############

<?php
	if(!empty(get_option("my_book_page_id"))){
		$page_id = get_option("my_book_page_id");
		wp_delete_post($page_id, true); //wp_posts
		delete_option("my_book_page_id"); // wp_options
	}

  ?>

Custum Table :
--------------
global $wpdb;
$table_name   = 'Your Table Name';
$where 		  = array( 'ID' => 1 );
$where_format = array( '%d' );
$wpdb->delete( $table_name, $where, $where_format);
				or 
$wpdb->delete( $table_name, $where);




==============================================================================
======================================== FETCH DATA  post  ===================
==============================================================================

## Method 1st :
-----------------
global $wpdb;
$results = $wpdb->get_results( "SELECT * FROM {$wpdb->prefix}options WHERE option_id = 1", OBJECT );

## method 

<?php
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
		$result = new WP_Query($args);

		foreach($result->posts as $resultt) {
			$url = get_permalink($resultt->ID);
		}
?>

==============================================================================
======================================== FETCH DATA category  ================
==============================================================================

#example2 :
	----------

	$cats  =  get_the_category(); 
	print_r($cats);  //return array of current category
	get_category_link($cat_id);


	
    $args = array(
       'taxonomy' => 'ques_cat',
       'orderby' => 'name',
       'order'   => 'ASC',
       'parent'  => 0
   );  
   
   $cats = get_terms($args); 
  
	foreach($cats as $cat){ ?>
			<option value="<?php echo $cat->term_id ; ?>"><?php echo $cat->name ; ?></option>
			
			<?php 
					$args1 = array(
					'taxonomy' => 'ques_cat',
					'orderby' => 'name',
					'order'   => 'ASC',
					'parent'  => $cat->term_id
				);  
				
				$child = get_terms($args1); 
				foreach($child as $cat){ ?>
				<option value="<?php echo $cat->term_id ; ?>">&nbsp;-&nbsp;<?php echo $cat->name ; ?></option>
			<?php }  
			} ?>



<!-- ==================================================== -->
####################################  Get partcular post categories  #####################################				  
<?php 
//$post_id is post id 
 $category = get_the_terms( $post_id, 'adviser_cat' );
 ?>	


################################### set categories in partcular post   ##############
 // $exp is category id  and 'adviser_cat' is  texonomy
 ==> $exp  must be in array .like ==> array(1,2)
<?php wp_set_object_terms( $post_id , (int)$exp, "adviser_cat", true); ?>
 

$defaults = array(
		'child_of'            => 0,
		'current_category'    => 0,
		'depth'               => 0,
		'echo'                => 1,
		'exclude'             => '',
		'exclude_tree'        => '',
		'feed'                => '',
		'feed_image'          => '',
		'feed_type'           => '',
		'hide_empty'          => 1,
		'hide_title_if_empty' => false,
		'hierarchical'        => true,
		'order'               => 'ASC',
		'orderby'             => 'name',
		'separator'           => '<br />',
		'show_count'          => 0,
		'show_option_all'     => '',
		'show_option_none'    => __( 'No categories' ),
		'style'               => 'list',
		'taxonomy'            => 'category',
		'title_li'            => __( 'Categories' ),
		'use_desc_for_title'  => 1,
	);

wp_list_categories( $args = '');


============================
MY CUSTUM CATEGORY LIST CODE :
=============================

Note: Not available



