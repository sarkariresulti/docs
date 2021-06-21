<?php

function employee_management_post_type() {

    $labels = array(
        'name'                  => _x( 'Employee Management', 'Post type general name', 'employee_management' ),
        'singular_name'         => _x( 'Employee Management', 'Post type singular name', 'employee_management' ),
        'menu_name'             => _x( 'Employee Management', 'Admin Menu text', 'employee_management' ),
        'name_admin_bar'        => _x( 'Employee Management', 'Add New on Toolbar', 'employee_management' ),
        'add_new'               => __( 'Add New', 'employee_management' ),
        'add_new_item'          => __( 'Add New employee_management', 'employee_management' ),
        'new_item'              => __( 'New Employee', 'employee_management' ),
        'edit_item'             => __( 'Edit Employee', 'employee_management' ),
        'view_item'             => __( 'View Employee', 'employee_management' ),
        'all_items'             => __( 'All Employee', 'employee_management' ),
        'search_items'          => __( 'Search Employee', 'employee_management' ),
        'parent_item_colon'     => __( 'Parent Employee:', 'employee_management' ),
        'not_found'             => __( 'No Employee found.', 'employee_management' ),
        'not_found_in_trash'    => __( 'No Employee found in Trash.', 'employee_management' ),
        'featured_image'        => _x( 'Recipe Cover Image', 'Overrides the “Featured Image” phrase for this post type. Added in 4.3', 'employee_management' ),
        'set_featured_image'    => _x( 'Set cover image', 'Overrides the “Set featured image” phrase for this post type. Added in 4.3', 'employee_management' ),
        'remove_featured_image' => _x( 'Remove cover image', 'Overrides the “Remove featured image” phrase for this post type. Added in 4.3', 'employee_management' ),
        'use_featured_image'    => _x( 'Use as cover image', 'Overrides the “Use as featured image” phrase for this post type. Added in 4.3', 'employee_management' ),
        'archives'              => _x( 'Recipe archives', 'The post type archive label used in nav menus. Default “Post Archives”. Added in 4.4', 'employee_management' ),
        'insert_into_item'      => _x( 'Insert into Employee', 'Overrides the “Insert into post”/”Insert into page” phrase (used when inserting media into a post). Added in 4.4', 'employee_management' ),
        'uploaded_to_this_item' => _x( 'Uploaded to this Employee', 'Overrides the “Uploaded to this post”/”Uploaded to this page” phrase (used when viewing media attached to a post). Added in 4.4', 'employee_management' ),
        'filter_items_list'     => _x( 'Filter Employee list', 'Screen reader text for the filter links heading on the post type listing screen. Default “Filter posts list”/”Filter pages list”. Added in 4.4', 'employee_management' ),
        'items_list_navigation' => _x( 'Recipes list navigation', 'Screen reader text for the pagination heading on the post type listing screen. Default “Posts list navigation”/”Pages list navigation”. Added in 4.4', 'employee_management' ),
        'items_list'            => _x( 'Recipes list', 'Screen reader text for the items list heading on the post type listing screen. Default “Posts list”/”Pages list”. Added in 4.4', 'employee_management' ),
    );     
    $args = array(
        'labels'             => $labels,
        'description'        => 'Employee Management custom post type.',
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'employee_management' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => 20,
        'supports'           => array( 'title', 'editor', 'author', 'thumbnail' ),
        'taxonomies'         => array( 'category', 'post_tag' ),
        'show_in_rest'       => true
    );
      
    register_post_type( 'employee_management', $args );
}
add_action( 'init', 'employee_management_post_type' );
 

//// meta box
function wpdocs_register_meta_boxes() {
    add_meta_box( 'employee_details', __( 'Employee Details', 'textdomain' ), 'employee_details_display_callback', 'employee_management' );
}
add_action( 'add_meta_boxes', 'wpdocs_register_meta_boxes' );

function employee_details_display_callback( $post ) {
	$emp_name = get_post_meta($post->ID, 'emp_name', true);
	$emp_date_of_join = get_post_meta($post->ID, 'emp_date_of_join', true);
	$emp_designation = get_post_meta($post->ID, 'emp_designation', true);
	$emp_salary = get_post_meta($post->ID, 'emp_salary', true);
	$emp_date_of_birth = get_post_meta($post->ID, 'emp_date_of_birth', true);
	$emp_gender = get_post_meta($post->ID, 'emp_gender', true);
	$emp_education_description = get_post_meta($post->ID, 'emp_education_description', true);
	$emp_email = get_post_meta($post->ID, 'emp_email', true);

    ?>
   <input type="text" name="emp_name" value="<?php echo $emp_name; ?>" placeholder="Employee Name "><br>
   <input type="date" name="emp_date_of_join" value="<?php echo $emp_date_of_join; ?>" placeholder="Employee date of join "><br>
   <input type="text" name="emp_designation" value="<?php echo $emp_designation; ?>" placeholder="Employee designation "><br>
   <input type="text" name="emp_salary" value="<?php echo $emp_salary; ?>" placeholder="Salary"><br>
   <input type="date" name="emp_date_of_birth" value="<?php echo $emp_date_of_birth; ?>" placeholder="Date of birth "><br>
    <select name="emp_gender" id="">
        <option value="male" <?php if($emp_gender == 'male'){echo "selected";} ?>>Male</option>
        <option value="female" <?php if($emp_gender == 'female'){echo "selected";} ?>>Female</option>
    </select> <br>
   <textarea name="emp_education_description" id="" cols="30" rows="10" placeholder="Education Description"><?php echo $emp_education_description; ?></textarea> <br>
   <input type="email" name="emp_email" value="<?php echo $emp_email; ?>" placeholder="Employee Email "><br>

    <!-- <div class="cust_fields">
        <label for="wporg_field">Description for this field</label>
        <select name="wporg_field" id="wporg_field" class="postbox">
            <option value="">Select something...</option>
            <option value="something" <?php selected( $value, 'something' ); ?>>Something</option>
            <option value="else" <?php selected( $value, 'else' ); ?>>Else</option>
        </select>
    </div> -->
   
<?php	//kk
}


add_action('save_post','save_post_callback');
function save_post_callback($post_id){ 
    if(empty($_POST) || $_POST['emp_name'] !='employee_management'){
        return;
    }
	 global $post;  
    update_post_meta($post->ID, 'emp_name', $_POST['emp_name']);
	update_post_meta($post->ID, 'emp_date_of_join', $_POST['emp_date_of_join']);
	update_post_meta($post->ID, 'emp_designation', $_POST['emp_designation']);
	update_post_meta($post->ID, 'emp_salary', $_POST['emp_salary']);
	update_post_meta($post->ID, 'emp_date_of_birth', $_POST['emp_date_of_birth']);
	update_post_meta($post->ID, 'emp_gender', $_POST['emp_gender']);
	update_post_meta($post->ID, 'emp_education_description', $_POST['emp_education_description']);
	update_post_meta($post->ID, 'emp_email', $_POST['emp_email']);
}

//===========================

add_filter( 'list_table_primary_column', 'list_table_primary_column_func',20,2);

function list_table_primary_column_func($default, $screen_id){
    // print_r($default);
    // echo $screen_id;
    return $default;
}

// add_filter( 'manage_{$this->screen->id}_sortable_columns', 'list_table_primary_column_func',20,1);
add_filter( 'manage_edit-page_sortable_columns', 'manage_edit_page_sortable_columns_func',20,1); 
 function manage_edit_page_sortable_columns_func($sortable_columns){
    // $sortable_columns['title']= 'your name' ;
    //  print_r($sortable_columns);
    return $sortable_columns ;
 }