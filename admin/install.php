
<?php

	include "../config.php";
	include "../util.php";
	
	
	connect();
	
	
	//ini_set("display_errors", 0);
	ini_set("safe_mode", "off");
	
	$db_schema = file_get_contents("database_schema.sql") or die("Missing database_schema.sql, you may have to reinstall EPC");     			br();
	$sql_commands = explode(";", $db_schema);
	
	foreach($sql_commands as $com){
		echo $com; 																																br();
		mysql_query($com) or die("Could not execute the query: " . mysql_error());																				br();
	}

	
	
	echo "EPC was installed successfully";																										br();
	echo<<<EOD
	You may delete the following files:
	<li>install.php</li>
	<li>database_schema.sql</li>
	
			
EOD;

	function br(){
		echo "<br />";
	}
	
?>

