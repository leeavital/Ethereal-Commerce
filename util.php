<?php


	/* we will use this function to connect to the mysql database */
	function connect(){
		global $ep_commerce;
		mysql_connect($ep_commerce["db_host"], $ep_commerce["user_name"], $ep_commerce["db_pass"]) or die(mysql_error());
		mysql_select_db($ep_commerce["db_name"]) or die(mysql_error());
	}
	
	
	
	
	
	/* we will use these functions to determine what kind of page is loading */
	function is_home()	{ return count($_GET) == 0;		}
	function is_search()	{ return isset($_GET["q"]);		}
	function is_product()	{ return isset($_GET["p"]); 	}
	function is_category()	{ return isset($_GET["cat"]); 	} 


?>
