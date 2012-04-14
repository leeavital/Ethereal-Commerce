<?php
	// add _category.php
	
	include "../config.php";
	include "../util.php";
	
	connect();
	
	// We will now create a mysql query to  insert the new category.
	$query = "INSERT INTO epc_categories(`c_parent_id`, `c_name`) VALUES(\"$_GET[c_parent]\", \"$_GET[c_name]\");";
	mysql_query($query) or die(mysql_error());
	
?>

Category Added

