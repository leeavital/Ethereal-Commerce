<?php

	/* most of these epc_tags work the same way. 
	 * We check if an epc_query has been passed as a parameter, if it has we use it as query.
	 * If not, we use the global epc_query.
	 * then we use whatever query to get the appriatte value */
	
	function home(){
		global $ep_commerce;
		echo $ep_commerce["root"];
	}
	
	
	function get_header(){
		global $ep_commerce;
		include "themes/" .  $ep_commerce["theme_directory"] . "/header.php";
	}
	
	function get_footer(){
		global $ep_commerce;
		include "themes/" .  $ep_commerce["theme_directory"] . "/footer.php";
	}

	function main_stylesheet(){
		global $ep_commerce;
		echo "<link type=\"text/css\" rel=\"stylesheet\" href=\"{$ep_commerce["root"]}/themes/{$ep_commerce["theme_directory"]}/style.css\"/>";
	}
	
	
	function search_box(){
		global $ep_commerce;
		echo<<<EOD
		
		<form id="epc_search" action="{$ep_commerce["root"]}/">
			<input type="text" 		id="epc_searchterms" 	name="q"  />
			<input type="submit" 	id="epc_submit"  		name="sub" />
			<select name="sort">
				<option value="1">Price (High to Low)</option>
				<option value="2">Price (Low to High)</option>
				<option value="3">Alphabetical</option>
			</select>
		</form>
		
EOD;
		
	}
	
	
	function p_title($query=false){
		global $epc_query;
		if(!$query){
			$query = $epc_query;
		}
		else{
			$query = $epc_query;
		}
		echo $query->current()->name;
	}
	
	function p_description($query=false){
		global $epc_query;
		if(!$query){
			$query = $query;
		}
		else{
			$query = $epc_query;
		}
		echo $epc_query->current()->description;
	}
	
	function p_controls($query=false){
		global $epc_query;
		if(!$query){
			$query = $query;
		}
		else{
			$query = $epc_query;
		}
		echo $epc_query->current()->controls;
	}
	
	function p_href($query=false){
		global $epc_query;
		if(!$query){
			$query = $query;
		}
		else{
			$query = $epc_query;
		}
		echo $epc_query->current()->href;
	}  

	function p_image_url($query=false){
		global $epc_query;
		if(!$query){
			$query = $query;
		}
		else{
			$query = $epc_query;
		}
		echo $epc_query->current()->image_url;
	}	

	function p_price($query=false){
		global $epc_query;
		echo "$" . number_format($epc_query->current()->price, 2);
	}


	// USE THIS SPARINGLY
	function p_category($query=false){
		global $epc_query;
		if(!$query){
			$query = $query;
		}
		else{
			$query = $epc_query;
		}
		$c_id = $epc_query->current()->c_id;
		$query = "SELECT `c_name` FROM  `epc_categories` WHERE `c_id`=$c_id;";
		mysql_query($query) or die(mysql_error());
	}


?>
	
