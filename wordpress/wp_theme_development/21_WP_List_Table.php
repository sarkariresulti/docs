Class 
------
WP_List_Table

Hooks : 
-------

#example :
---------
<?php 
add_filter('manage_employee_management_posts_columns', 'manage_employee_management_posts_columns_func', 20,);
function manage_employee_management_posts_columns_func($posts_columns)
{
	$new_array = [];
	$new_array['cb'] = $posts_columns['cb'];
	$new_array['author'] = $posts_columns['author'];
	$new_array['title'] = $posts_columns['title'];
	$new_array['categories'] = $posts_columns['categories'];
	$new_array['tags'] = $posts_columns['tags'];
	$new_array['date'] = $posts_columns['date'];
	$new_array['post_modified'] = "Post Status";
	return $new_array;
}

// add_filter( 'manage_{$this->screen->id}_sortable_columns', 'list_table_primary_column_func',20,1);
add_filter('manage_edit-employee_management_sortable_columns', 'manage_edit_page_sortable_columns_func', 20, 1);
function manage_edit_page_sortable_columns_func($sortable_columns)
{
	unset($sortable_columns['date']);
	$sortable_columns['tags'] 		 = array('tags', true);
	$sortable_columns['categories'] = array('categories', true);
	return $sortable_columns;
}

add_filter('post_column_taxonomy_links', 'post_column_taxonomy_links_func', 20, 3);
// add_filter( 'list_table_primary_column', 'list_table_primary_column_func',20,2);
function post_column_taxonomy_links_func($term_links, $taxonomy, $terms)
{
	$term_links[] = '<a href="">My cat</a>';
	return $term_links;
}

add_action('manage_employee_management_posts_custom_column', 'custom_book_column', 10, 2);
function custom_book_column($column, $post_id)
{
	$column;
	switch ($column) {
		case 'post_modified':
				echo get_post($post_id)->post_modified;
			break;
	}
}

?>


Methods :
---------

get_cloumns 
get_sortable_columns 
get_bulk_actions 
search_box 
prepare_items
display 

====================================
#Creating_page :
---------------

function add_my_custom_menu(){
    //register menu 
	$hook = add_menu_page(
      'customplugin' , //  page title
      'Custom Plugin',  //  menu Title
      'manage_options' , //  admin level
      'custom-plugin1' , //  page slug
      'custom_admin_view' , //  call back function
      'dashicons-dashboard'  ,//  icon url
       11  //  positions
    );

	 // creating options like per page data(pagination)
	 add_action( "load-".$hook, 'add_options' ); 
	 // Creating help tab 
	 add_action( 'current_screen','my_admin_add_help_tab');
}

add_action('admin_menu','add_my_custom_menu');

function add_options() {
		$option = 'per_page';
		$args = array(
		'label' => 'Results',
		'default' => 10,
		'option' => 'results_per_page'
	);
	
	add_screen_option( $option, $args );
	
	}

function my_admin_add_help_tab() {
    $screen = get_current_screen();
    // Add my_help_tab if current screen is My Admin Page
    $screen->add_help_tab( array(
			'id'    => 'my_help_tab',
			'title' => 'Webkul Help Tab',
			'content'   => '<p>' . __( 'Help Topics Added Here.' ) . '</p>',
	) );
 }

 
function custom_admin_view(){
	ob_start();
    require_once "cust_table.php";
	$content = ob_get_contents();
	ob_clean();
	echo $content;
}

# Listing Table Data In Page :
=============================

Example No 1 : 
--------------

<?php 
if(!class_exists('Link_List_Table')){
    require_once( ABSPATH . 'wp-admin/includes/class-wp-list-table.php' );
}

class Cust_Table_Liist extends WP_List_Table {

    public $data = array(
            ['id'=>1,'name'=>'ram1','email'=>'ram1@gmail.com'],
            ['id'=>2,'name'=>'ram2','email'=>'ram2@gmail.com'],
            ['id'=>3,'name'=>'ram3','email'=>'ram3@gmail.com'],
    );


    public function prepare_items()
    {   
        // $this->items = $this->data;
        $this->items = $this->wp_list_table_data();
        $columns   = $this->get_columns();
        $hidden    = $this->get_hidden_columns($this->screen);
        $sortable  = $this->get_sortable_columns();
        
        $this->_column_headers = array($columns,$hidden,$sortable);
    }

    public function get_columns()
    {
        $columns = array(
            'id'=>'ID',
            'title'=>'Title',
            'content'=>'Content',
            'slug'=>'Slug',
        );   

        return $columns; 
    }

    public function column_default($item, $column_name){
        switch($column_name){
            case 'id':
            case 'title':
            case 'content':
            case 'slug':
                return $item[$column_name];
            default:
                return "no value";
        }    
    }

    public function get_hidden_columns( $screen ){
        return array('slug');
    }

    public function get_sortable_columns(){
        return array(
            'id'=>array('id',true),
        );

    }

    public function wp_list_table_data($orderby = '', $order = '', $search_term = '') {
       global $wpdb;
        $all_posts = $wpdb->get_results(
            "SELECT * from " . $wpdb->posts . "WHERE post_type = 'post' AND post_status = 'publish' ORDER BY post_title DESC"
        );  

        $posts_array = array();
        // echo "<pre>";
        // print_r($all_posts);
        // echo "</pre>";

        if (count($all_posts) > 0) {

            foreach ($all_posts as $index => $post) {
                $posts_array[] = array(
                    "id" => $post->ID,
                    "title" => $post->post_title,
                    "content" => $post->post_content,
                    "slug" => $post->post_name
                );
            }
        }
         return $posts_array;
    }

    
} // end class 


$my_cust_table = new Cust_Table_Liist();
?>
<form id="posts-filter" method="get">

<?php $my_cust_table->search_box("Search Post(s)", "search_post_id"); ?>
</form>
<?php 
$my_cust_table->prepare_items();
$my_cust_table->display();
?>


Example No 2 : 
--------------
