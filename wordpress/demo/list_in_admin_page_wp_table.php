<!-- ============ Code For creating page and ading current screen =================== -->
<!-- Location : functions.php  -->

<?php
function register_my_custom_menu_page()
{
    global $new_menu_page;
    // creating admin menu 

    add_menu_page('Career', 'Career', 'edit_posts', 'career', 'custom_list_page', get_template_directory_uri() . '/images/custom.png', 8);
    $hook = add_submenu_page("career", "Custom List", "Custom List", 'edit_posts', "career", "custom_list_page");
    // adding submenu 
    // add_submenu_page("career", "Custom Detail", "Custom Detail", 'edit_posts', "custom_detail", "custom_detail_page");
    // creating options like per page data(pagination)
    add_action("load-" . $hook, 'add_options_func');
    // Creating hep tab 
    add_action('current_screen', 'my_admin_add_help_tab');
}
add_action('admin_menu', 'register_my_custom_menu_page');

function custom_list_page()
{
    ob_start();
    require_once "cust_table2.php";
    $content = ob_get_contents();
    ob_clean();
    echo $content;
}

function my_admin_add_help_tab()
{
    $screen = get_current_screen();
    // Add my_help_tab if current screen is My Admin Page
    $screen->add_help_tab(
        array(
            'id'    => 'my_help_tab',
            'title' => 'Webkul Help Tab',
            'content'   => '<p>' . __('Help Topics Added Here.') . '</p>',
        ),
    );

    $screen->add_help_tab(
        array(
            'id'    => 'my_help_tab2',
            'title' => 'Webkul Help Tab2',
            'content'   => '<p>' . __('Help Topics Added Here 2.') . '</p>',
        ),
    );
}

function add_options_func($screen)
{
    $option = 'per_page';
    $args = array(
        'label' => 'Results',
        'default' => 10,
        'option' => 'results_per_page'
    );
    add_screen_option($option, $args);
}

//save screen data 
function pippin_set_screen_option($status, $option, $value)
{
    if ('results_per_page' == $option) return $value;
}
add_filter('set-screen-option', 'pippin_set_screen_option', 10, 3);

?>

=====================================================================================
<!-- Creting wp_list_table class for listing table -->
Location : functions.php 
=========================
require_once get_template_directory()."/fn/cust_table2.php";

Location : fn/cust_table2.php 
=============================
<?php
// class start
if (!class_exists('Link_List_Table')) {
    require_once(ABSPATH . 'wp-admin/includes/class-wp-list-table.php');
}

class Link_List_Table extends WP_List_Table
{
    function __construct()
    {
        parent::__construct(array(
            'singular'  => 'singular_name',     //singular name of the listed records
            'plural'    => 'plural_name',    //plural name of the listed records
            'ajax'      => false
        ));
    }

    public function column_default($item, $column_name)
    {
        switch ($column_name) {
            case 'ID':
            case 'post_title':
            case 'post_content':
            case 'post_name':
                return "<strong>" . $item[$column_name] . "</strong>";
            default:
                return "null";
        }
    }

    public function get_columns()
    {

        $columns = array(
            'cb'=>'<input type="checkbox"/>',
            'ID' => 'ID',
            'post_title' => 'Title',
            'post_content' => 'Content',
            'post_name' => 'Slug',
        );
        return $columns;
    }


    function column_post_title($item)
    {
        $action = array(
            'edit' => '<a href="javascript:void(0)">Edit</a>',
            'delete' => '<a href="javascript:void(0)">Delete</a>',
            'trash' => '<a href="javascript:void(0)">Trash</a>',
            'shop' => '<a href="javascript:void(0)">Shop</a>',
        );

        return sprintf('%1$s  %2$s', $item['post_title'], $this->row_actions($action));
    }

    function column_cb($item){
        return sprintf('<input type="checkbox" name="[]" value="%s">',$item['ID']);
    }



    public function get_sortable_columns()
    {
        $sortable_columns = array(
            'ID'     => array('ID', true),
            'post_title' => array('post_title', true)
        );
        return $sortable_columns;
    }

    public function get_hidden_columns()
    {
        // Setup Hidden columns and return them
        return array('post_content');
    }


    function get_bulk_actions()
    {
        $actions = array(
            'trash'    => 'Move To Trash',
            'test_1'   => "You Need to Do",
        );
        return $actions;
    }


    public function process_bulk_action()
    {
        global $wpdb;
        if ('trash' === $this->current_action()) {
            if (isset($_GET['user'])) {
                if (is_array($_GET['user'])) {
                    foreach ($_GET['user'] as $id) {
                        if (!empty($id)) {
                            wp_trash_post($id);
                            // $table_name = $wpdb->prefix . 'table_name';
                            // $wpdb->query("update $table_name set post_status='trash' WHERE id IN($id)");
                        }
                    }
                } else {
                    if (!empty($_GET['user'])) {
                        $id = $_GET['user'];
                        wp_trash_post($id);
                        // $table_name = $wpdb->prefix . 'table_name';
                        // $wpdb->query("update $table_name set post_status='trash' WHERE id =$id");
                    }
                }
            }
        }
    }

    private function table_data($perpage = 10)
    {
        global $wpdb;

        $paged = isset($_GET['paged']) ? $_GET['paged'] :  1;
        $order = isset($_GET['order']) ? $_GET['order'] :  'asc';
        $orderby = isset($_GET['orderby ']) ? $_GET['orderby '] :  'ID';

        $args = array(
            'post_type' => 'employee_management',
            'post_status' => 'publish',
            'posts_per_page' => $perpage,
            'paged' => $paged,
            'order' => $order,
            'orderby ' => $orderby
        );

        add_filter('posts_clauses', array($this, 'filter_current_query'), 30);
        $loop = new WP_Query($args);

        $all_posts = $loop->posts;
        $totalPost = $loop->found_posts;
        $totalPages = $loop->max_num_pages;
        
        $this->set_pagination_args(array(
            "total_items" => $totalPost,
            "total_pages" => $totalPages,
            "per_page" => $perpage,
        ));

        $posts_array = array();
        if (count($all_posts) > 0) {

            foreach ($all_posts as $index => $post) {
                $posts_array[] = array(
                    "ID" => $post->ID,
                    "post_title" => $post->post_title,
                    "post_content" => $post->post_content,
                    "post_name" => $post->post_name
                );
            }
        }
        return $posts_array;
    }


    function filter_current_query($clause)
    {
        $order = isset($_GET['order']) ? strtoupper($_GET['order']) :  'asc';
        $orderby = isset($_GET['orderby ']) ? $_GET['orderby '] :  'ID';
        unset($clause['orderby']);
        $clause['orderby'] = "wp_posts.{$orderby} {$order}";
        // print_r($clause);
        return $clause;
    }

    public function prepare_items()
    {
        global $wpdb, $wp_query, $per_page, $avail_post_stati;

        $user = get_current_user_id();
        $screen = get_current_screen();
        $option = $screen->get_option('per_page', 'option');
        $perpage = get_user_meta($user, $option, true);

        $columns = $this->get_columns();
        $sortable = $this->get_sortable_columns();
        $hidden = $this->get_hidden_columns();
        $this->process_bulk_action();
        $data = $this->table_data($perpage);
        $totalitems = count($data);

        $this->_column_headers = array($columns, $hidden, $sortable);
        $this->items = $data;
    }
} //end class 

?>

==========================================================================================
<!-- Now display Table data in our Created page in backend  -->

Location : cust_table2.php 
==========================

<?php 
$wp_list_table = new Link_List_Table();
$wp_list_table->prepare_items();

echo '<h3>This is List</h3>';
echo "<form method='post' name='frm_search_post' action='{$_REQUEST_URI['REQUEST_URI']}'>";
$wp_list_table->search_box("Search Post(s)", "search_post_id");
echo "</form>";

$wp_list_table->display();

?>

<form action="<?php echo $_REQUEST_URI['REQUEST_URI']; ?>" method="POST">
    <input type="text" name="m_name">
    <button type="submit">Click Here</button>
</form>