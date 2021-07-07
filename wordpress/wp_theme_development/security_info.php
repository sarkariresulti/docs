/* Disable xmlrpc */

Note:  Xmlrpc provides remote access of wordpress on http , so It can be used by hacker.  for saftey you can 	-----  disble it 

add_filter( 'xmlrpc_enabled', '__return_false' );


