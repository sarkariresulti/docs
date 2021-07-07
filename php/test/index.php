<?php 

// ini_set('memory_limit', -1);  		// Unlimited Zend MM heap 

// function heap(){
// 	echo $cmd = sprintf('grep "VmRSS:" /proc/%d/status',getmypid());
// 	return shell_exec($cmd);
// }

// echo heap();
// echo "<br>";

// $a = range(1, 1024*1024);

// echo heap();
// echo "<br>";


// unset($a);

// echo heap();


// memory_get_usage(true);   // Returns the size of all the allocated segments
// memory_get_usage();		// Returns the occupid size in all the allocated segments 

$data_in_byte = memory_get_peak_usage();  //Returns the max memory that has been  allocated/used. Could have been  freed meantime

$data_in_kb = $data_in_byte/1024 ;
	
// echo ini_get('memory_limit'); echo "<br>";


