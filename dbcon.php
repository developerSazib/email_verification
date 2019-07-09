<?php 
	
	// define("HOST", "localhost");
	// define("USER", "type you user");
	// define("PASSWORD", "type your password here");
	// define("DBNAME", "project name");

	// $link = mysqli_connect(HOST, USER , PASSWORD , DBNAME);

	// if (!$link) {
	// 	echo mysqli_error($link);	
	// }

	
	define("HOST", "localhost");
	define("USER", "rawscrip_raw");
	define("PASSWORD", "Shuvo2010@@");
	define("DBNAME", "rawscrip_testpro");

	$link = mysqli_connect(HOST, USER , PASSWORD , DBNAME);

	if (!$link) {
		echo mysqli_error($link);	
	}



 ?>