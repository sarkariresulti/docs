<?php

	global $wpdb;
	$items_per_page = 2;
	$pageno = (int)$_GET['cpage'];
	$offset_per_page = ($pageno-1) * $items_per_page; 
    $table_name      = $wpdb->prefix . "students";
	if(empty($_GET['cpage'])){
		$students = $wpdb->get_results("SELECT * from " . $table_name. " ORDER BY id DESC LIMIT {$items_per_page} ");
	}else{
		$students = $wpdb->get_results("SELECT * from " . $table_name. " ORDER BY id DESC LIMIT  {$offset_per_page}, 
			{$items_per_page} "); 
	}

	$table_name        = $wpdb->prefix . "students";
	$customPagHTML     = "";
	$query             = "SELECT * FROM {$table_name}";
	$total_query     = "SELECT COUNT(1) FROM (${query}) AS combined_table";
	$total             = $wpdb->get_var( $total_query );
	
	
	$page             = isset( $_GET['cpage'] ) ? abs( (int) $_GET['cpage'] ) : 1;
	$offset         = ( $page * $items_per_page ) - $items_per_page;
	$result         = $wpdb->get_results( $query . " ORDER BY field DESC LIMIT ${offset}, ${items_per_page}" );
	$totalPage         = ceil($total / $items_per_page);

	if($totalPage > 1){
		$customPagHTML     =  '<div><span>Page '.$page.' of '.$totalPage.'</span>'.paginate_links( array(
		'base' => add_query_arg( 'cpage', '%#%' ),
		'format' => '',
		'prev_text' => __('&laquo;'),
		'next_text' => __('&raquo;'),
		'total' => $totalPage,
		'current' => $page
		)).'</div>';
		}
		echo $customPagHTML;
