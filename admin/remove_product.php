<?php


	// delete_product.php
	// we are executing in the "admin" directory
	
	include "../config.php";
	include "../util.php";
	
	connect();
		
	$p_id = $_GET["id"];
	
	
	$query = "DELETE FROM `epc_products` WHERE `p_id`=$p_id;";
	mysql_query($query) or die(mysql_error());
	
	

?>


The product was deleted.
