<?php


========================= Add menu page ======================
// add menu and sub menu page 
function add_my_custom_menu(){
    //register menu 
	add_menu_page(
      'customplugin' , //  page title
      'Custom Plugin',  //  menu Title
      'manage_options' , //  admin level
      'custom-plugin1' , //  page slug
      'custom_admin_view' , //  call back function
      'dashicons-dashboard'  ,//  icon url
       11  //  positions
    );

    //register sub menu page 
    add_submenu_page(
        'custom-plugin1' , // parent-slug
        'Add New',  //  Page Title
        'Add New' , // Menu Title
        'manage_options' , //  capbility = user lave access
        'add-new' , //  menu slug
        'add_new_function'//  call back function
    );
}

add_action('admin_menu','add_my_custom_menu');

function custom_admin_view(){
    echo "This is mani singh";
}

function add_new_function(){
    echo "This is mani  add new page singh";
}

//=======================================================================
//============================== REMOVE MENU PAGE =====================
// =======================================================================

function remove_menus() {
    remove_menu_page( 'tools.php' ); 
     //remove_menu_page('product-enquiries');
    }
    add_action( 'admin_menu', 'remove_menus' );
    
    add_action( 'admin_init', 'wpse_243070_hide_menu');
    function wpse_243070_hide_menu() {
        remove_menu_page('product-enquiries'); 
        remove_menu_page('amp_options'); 
        }
        