<?php

	// delete_category,php
	// we are executing in the admin directory. 
	
	include "../config.php";
	include "../util.php";
	
	connect();
	
	
	
	// first we will obtain the c_id with GET
	$c_id = $_GET["id"];
	
	// now we will create and execute a query to delete the category with c_id=$c_id
	$query = "DELETE FROM `epc_categories` WHERE `c_id`=$c_id;";
	mysql_query($query) or die("Could not delete the category: " . mysql_error());
	
	
	echo "Category was succesfully deleted";

?> 



