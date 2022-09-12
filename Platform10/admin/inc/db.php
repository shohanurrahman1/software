<?php  
	
	$db = mysqli_connect ( "localhost", "root", "", "library_app" );

	if ( $db )
	{
		// echo "Database Connection Successfully";
	}
	else
	{
		die( "MySQLi Error. " . mysqli_error($db) );
	}

?>