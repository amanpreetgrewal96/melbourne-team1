<?php
	require("constants.php");
	//To Create the connection to the database
	$connection=mysqli_connect(Db_Server,Db_User,Db_Pass);
    if(!$connection)
	{
	die("database connection failed".mysql_erorr());
	}
	//To seslect the database
	$db_select=mysqli_select_db($connection, Db_Name);
	if(!$db_select)
	{
	die("database selection failed".mysql_error());
	}
?>