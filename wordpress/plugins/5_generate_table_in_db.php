<?php

//  SHOW CREATE TABLE wp_links


// ============================================= Creating Table on plugin activate ===================================
function custom_plugin_tables(){
    global $wpdb;
    require_once ABSPATH . 'wp-admin/includes/upgrade.php';

    if(count($wpdb->get_var('SHOW TABLES LIKE "my_custom_table"') == 0)){
        global $wpdb;
        require_once ABSPATH . 'wp-admin/includes/upgrade.php';
    
        $sql = "CREATE TABLE `my_custom_table` (
            `id` int(10) NOT NULL,
            `name` varchar(22) NOT NULL,
            `mail` varchar(22) NOT NULL,
            `home` varchar(22) NOT NULL
           ) ENGINE=InnoDB DEFAULT CHARSET=latin1
           ";
        dbDelta($sql);
    // } 

    
}
register_activation_hook(__FILE__, "custom_plugin_tables");

//============================================= Delete Table on plugin deactivate or unistall  ===================================

// Drop table when we deactvate plugin 
function drop_table_plugin_books() {
    global $wpdb;
    $wpdb->query("DROP TABLE IF EXISTS my_custom_table");
}

register_deactivation_hook(__FILE__, "drop_table_plugin_books");
// register_uninstall_hook(__FILE__,"drop_table_plugin_books");





