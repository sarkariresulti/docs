
<!-- ================= for headers =============== -->
wp-includes>
return apply_filters( 'http_origin', $origin );   // return http://localhost 
return apply_filters( 'allowed_http_origin', $origin);  // return url http://localhost if allowed otherwise empty return 


$allowed_origins = array_unique(
		array(
			'http://' . $admin_origin['host'],
			'https://' . $admin_origin['host'],
			'http://' . $home_origin['host'],
			'https://' . $home_origin['host'],
		)
	);

return apply_filters( 'allowed_http_origins', $allowed_origins );

admin_url();
home_url();



