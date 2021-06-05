<?php
// ============================================= sql query for safe way ===================================	
global $wpdb;
$author_details = $wpdb->get_results(
   $wpdb->prepare(
        "SELECT * from ".my_authors_table()." WHERE id = %d",$author_id
   ),ARRAY_A
);

$phone_repair_datas = $wpdb->get_results( "SELECT * FROM `phone_repair` WHERE `phone_repair_date` BETWEEN '".$from."' AND '".$to."'  order by id desc" );


// get post data 
$args = array(
   'post_type' => 'adviser',
   'post_status' => 'publish',
   'posts_per_page' => -1
  );
  $my_query = new WP_Query($args);	

   // custom table insert 
   global $wpdb;
   $tablename = 'transactions'; 
   $wpdb->insert( $tablename, array(
   'transaction_id' => $track_id,
   'date_and_time' => $trans_date,
         'status' =>$order_status,
      'booking_id' =>$order_id,
      'amount' =>$amount,
   ),
   array( '%s', '%s','%s', '%s', '%s')
   );
   
  $my_id = $wpdb->insert_id; 




   
  