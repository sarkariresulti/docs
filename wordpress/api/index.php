1) By Default wordpress API's works on https only , so you need to add some code in your index.php 

<?php 

 define( 'WP_USE_THEMES', true );
 $_SERVER['HTTPS'] = 'on';

?>


#2 API's status code:  
link => https://restfulapi.net/http-status-codes/


//Dependencies composer error (Ubuntu )

https://stackoverflow.com/questions/43040685/how-can-i-change-php-cli-version-on-ubuntu-14-04/49725126

Create Api :
-----------
add_action('rest_api_init', function () {
    // all api routes 
    //lOGOUT OR REMOVE DEVICE TOKEN FROM WORDPRESS
    register_rest_route('/bbp-api/v1', '/userlogoutbytoken/', array(
        'methods' => 'POST',
        'callback' => 'user_logout_by_token'
    ));

}

Send response 
--------------
$arr = [
        'status' => 0,
        'message' => 'Unauthorized Access'
    ];  
    wp_send_json($arr, 401);

    