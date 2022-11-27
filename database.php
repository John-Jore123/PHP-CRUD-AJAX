<?php 
	define('SERVER', 'localhost');
	define('USER', 'root');
	define('PASSWORD', '');
	define('DATABASE', 'account_db');

	$connDB = mysqli_connect(SERVER,USER,PASSWORD);
	mysqli_select_db($connDB,DATABASE);
	mysqli_error($connDB);

    // if ($conn->connect_error) 
    //     die("Connection failed: " . $conn->connect_error);
    // else 
    //     echo "Connected successfully";
?>