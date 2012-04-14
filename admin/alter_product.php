<?php 


	// alter_product.php
	// we are executing in the "admin" directory
	
	include "../config.php";
	include "../util.php";
	
	connect();
	
	if(!isset($_POST["p_name"])){ die("Error parsing form: You must enter a product name"); }
	if(!isset($_POST["p_description"])){ die("Error parsing form: You must enter a product description"); }
	if(!isset($_POST["p_controls"])){ die("Error parsing form: You must enter some controls"); }
	if(!isset($_POST["p_image_href"])){ die("Error parsing form: You must selelct an image"); }
	if(!isset($_POST["p_category"])){ die("Error parsing form: You must select a category"); }
	if(!isset($_POST["p_price"])){ die("Error parsing form: You must enter a product price"); }	
	
	// First we get all the variables from post. 
	$p_name = "\"" . mysql_real_escape_string($_POST["p_name"]) . "\"";
	$p_description = "\"" . mysql_real_escape_string($_POST["p_description"]) . "\"";
	$p_controls = "\"" . mysql_real_escape_string($_POST["p_controls"]) . "\"" ;
	$p_image_href = "\"" . mysql_real_escape_string($_POST["p_image_href"]) . "\"";
	$c_id = mysql_real_escape_string($_POST["p_category"]);
	$p_price = mysql_real_escape_string($_POST["p_price"]);
	$front_page = isset($_POST["front_page"]) ? 1 : 0;
	$p_id = $_POST["p_id"];


	// Now we will perform the update
	echo $query = <<<EOD
	UPDATE `epc_products` 
	SET
		`p_name`=$p_name,
		`p_description`=$p_description,
		`p_controls`=$p_controls,
		`p_image_href`=$p_image_href,
		`c_id`=$c_id,
		`p_price`=$p_price,
		`front_page`=$front_page
	
	WHERE `p_id`=$p_id;
EOD;



	mysql_query($query) or die(mysql_error());
	
	echo "Query Complete, you may close this page.";	
	
	
	
	
	
	
	
	
?>	
	
