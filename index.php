<?php 
	
	// turn of safe mode because screw that.
	ini_set("safe_mode", "off");
	
	
	// load system info.
	include "config.php";
	
	// load the tag/functions
	include "epc_tags.php";
	include "util.php";
	
	//load any necessary classes
	include "EPC_query.php";

	
	// connect to the database
	connect();
	
	// this is the default include path for the template file we will load, there can only be one file
	$template_path = "themes/"  . $ep_commerce["theme_directory"] . "/index.php";
	
	// We will begin loading the theme pages based on what get variables are set.
	// Load the product page if p is set (product id)
	if(isset($_GET["p"])){
		$product_id = $_GET["p"];
		$epc_query = new EPC_Query("p=$product_id");
		$template_path =  "themes/" . $ep_commerce["theme_directory"] . "/product.php";
		
	}
	else if(isset($_GET["q"])){
		$query_token = "search=$_GET[q]";
		$epc_query = new EPC_Query($query_token);
		$template_path = "themes/" . $ep_commerce["theme_directory"] . "/search.php";
		
	}
	else if(isset($_GET["cat"])){
		$epc_query = new EPC_Query("cat=$_GET[cat]");
		$template_path =  "themes/" . $ep_commerce["theme_directory"] . "/index.php";
		
	}
	
	else{
		$epc_query =  new EPC_Query("num=10&frontpage=1");
		//load the index page. 
		$template_path =  "themes/"  . $ep_commerce["theme_directory"] . "/index.php";
	
	}
	
	include $template_path;
?>
