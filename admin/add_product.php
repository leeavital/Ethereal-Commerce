<?php
	
	
	// add_product.php
	// we are executing in the "admin" directory.
	
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
	
	
	
	// Then we do the query. 
	$query = <<<EOD
	INSERT INTO `epc_products`(
		`p_name`, `p_description`, `p_controls`, `p_image_href`, `p_price`, `c_id`, `front_page`) 
		VALUES(
			$p_name, $p_description, $p_controls, $p_image_href, $p_price, $c_id, $front_page
		);
EOD;
	mysql_query($query) or die(mysql_error());	
	
	
	


?>



The product was added.
