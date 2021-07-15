
//Search Query :
---------------
global $wpdb;
$table_name      = $wpdb->prefix . "students";
if (!empty($search_term)) {
    $all_posts = $wpdb->get_results(
            "SELECT * from " . $table_name. " WHERE (name LIKE '%$search_term%' OR email LIKE '%$search_term%' OR phone LIKE '%$search_term%')"
    );
    // $all_posts = $wpdb->get_results("SELECT * from " . $table_name. "");
}else{
    $all_posts = $wpdb->get_results("SELECT * from " . $table_name. " ORDER BY id DESC LIMIT 10 ");
}