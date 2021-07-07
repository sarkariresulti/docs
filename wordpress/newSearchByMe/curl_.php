$GET cURL:
---------

$defaults = array(
        'method'      => 'GET',
        'timeout'     => 5,
        'redirection' => 5,
        'httpversion' => '1.0',
        'blocking'    => true,
        'headers'     => array(),
        'body'        => null,
        'cookies'     => array(),
    );
 

$args = array(
      'headers' => array(
        'Content-Type' => 'application/json',
        'X-Api-Key' => 'apikey12345'
      );

wp_remote_get( 'http://www.example.com/index.php?action=foo',$arg);


Example 2 :
-----------

$response = wp_remote_get( 'http://www.example.com/index.php?action=foo',
    array(
        'timeout'     => 120,
        'httpversion' => '1.1',
    )
);


# $_POST cURL:
--------------

Example 1 :
-----------

<?php 
$response = wp_remote_post( $url, array(
    'method'      => 'POST',
    'timeout'     => 45,
    'redirection' => 5,
    'httpversion' => '1.0',
    'blocking'    => true,
    'headers'     => array(),
    'body'        => array(
        'username' => 'bob',
        'password' => '1234xyz'
    ),
    'cookies'     => array()
    )
);
 
if ( is_wp_error( $response ) ) {
    $error_message = $response->get_error_message();
    echo "Something went wrong: $error_message";
} else {
    echo 'Response:<pre>';
    print_r( $response );
    echo '</pre>';
}

?>


Example 2:
----------

<?php 
 
 $endpoint = 'api.example.com';
 
$body = [
    'name'  => 'Pixelbart',
    'email' => 'pixelbart@example.com',
];
 
$body = wp_json_encode( $body );
 
$options = [
    'body'        => $body,
    'headers'     => [
        'Content-Type' => 'application/json',
         'Authorization' => 'Basic ' . base64_encode( $username . ':' . $password ),
    ],
    'timeout'     => 60,
    'redirection' => 5,
    'blocking'    => true,
    'httpversion' => '1.0',
    'sslverify'   => false,
    'data_format' => 'body',
];
 
wp_remote_post( $endpoint, $options );

?>



