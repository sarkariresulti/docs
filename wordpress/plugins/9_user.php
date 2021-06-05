<?php

// =============================================== User role registration  ============================================================	
 //user role registration
     add_role("wp_book_user_key","My Book User",array(   
         "read"=>true0
     ));
	 
	 add_role( 'superintendent', 'Superintendent', get_role( 'administrator' )->capabilities );

	 
// =============================================== create a user and asign user to user role than save them to database  ================
$student_id = $user_id = wp_create_user($_REQUEST['username'],$_REQUEST['password'],$_REQUEST['email']);
        $user = new WP_User($student_id);
        $user->set_role("wp_book_user_key");

        $wpdb->insert(my_students_table(), array(
            "name" => $_REQUEST['name'],
            "email" => $_REQUEST['email'],
            "user_login_id" => $user_id
        ));
	
	// for checking user is exist or not you can check it by this 
	 username_exists($_REQUEST['username']);
      email_exists($_REQUEST['email']);
	  

// NOTE: Of course change 3 to the appropriate user ID
$u = new WP_User( 3 );
$u->remove_role( 'subscriber' );
$u->add_role( 'editor' );


// ==> return current user id 
get_current_user_id();

if (current_user_can('Administrator')){
    /*do something*/
    }

if (current_user_can('upload_files')){
    /*do something*/
    }

    
    ################################  get user info by mail #########################
<?php 
$to = $_POST['email']; 
 $user = get_user_by('email', $to);
 $id = base64_encode($user->data->ID*2);
 
 ?>