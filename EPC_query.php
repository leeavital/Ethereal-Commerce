<?php


/* I have to redo all this, it's just very jumbled in genereal */

class EPC_Query{
	var $products;
	var $index;
	var $unavailable; 
	
	
	
	function EPC_Query($token=null){
	
		global $ep_commerce;		
			
		$this->products = array();
		$this->index = 0;
		
		$query = "SELECT * FROM `epc_products` WHERE 1 ";
		
		
		// We will split the array into serialized pairs.
		// key=value
		$qualifiers = explode("&", $token);
		
		/* We will now go through the serialized pairs and 
		 * contatenate the appropirate SQL to our $products_query */
		foreach($qualifiers as $qualifier){
			$arr = explode("=", $qualifier);
			$mod = $arr[0];
			$value = $arr[1];
		
			/* we now have a mod(ifier) and a value to change the query with. We will use
			 * a series of if structures to determine how to modify our query. */
			if($mod=="search")	{	$query  = $this->get_search_query($value); break;} 		// handle searches
			if($mod=="p")		{	$query .= " AND `p_id`=$value"; }													// handle direct product queryies
			if($mod=="cat")		{	$query .= " AND (`c_id`=\"$value\" OR `c_id`=(SELECT `c_id` FROM `epc_categories` WHERE `c_name`='$value'))"; }
			if($mod=="frontpage"){	$query .= " AND `front_page`=$value" ;}
			if($mod=="price")    {	$query .= " ORDER BY `p_price` $value"; } 				// as in ORDER BY p_price ASCENDING
			if($mod=="alphabetical") {$query .= " ORDER BY `p_title` $value"; }
		}
		
		
		// finish query.
		$query .= " LIMIT 0, $ep_commerce[max_entries_per_page]; ";
		
		
		
		$products_query = mysql_query($query) or die(mysql_error());
		
		
		
		
		// now we loop through the results creating anoymous objects
		while($product = mysql_fetch_assoc($products_query)){
			$aProduct = array(
				"id"=>$product["p_id"],
				"name"=>$product["p_name"],
				"description"=>$product["p_description"],
				"controls"=>$product["p_controls"],
				"c_id"=>$product["c_id"],
				"price"=>$product["p_price"],
				"href"=>$ep_commerce["root"] . "/?p=$product[p_id]",
				"image_url"=>$product["p_image_href"], 
			
			);
			
			$this->products[] = (object)$aProduct;
		}
		
		
		$this->unavailble = array(
			"id"=>-1,
			"name"=>$ep_commerce["title_not_found"],
			"description"=>$ep_commerce["description_not_found"],
			"controls"=>"",
			"c_id"=>-1,
			"price"=>$ep_commerce["price_unavailable"],
			"href"=>$ep_commerce["404_url"],
			"image_url"=>$ep_commerce["missing_image_url"]
		
		);
		
		$this->unavailable = (object)($this->unavailble);
		
	}
	
	
	
	
	function get_search_query($q, $num=10){
		// figure out the search terms
		$order_by = "";
		switch($_GET["sort"]){
			case 1: // Price high to low.
				$order_by .= " p_price DESC";
				break;
			case 2: // Price low to high
				$order_by .= " `p_price` ASC";
				break;
			case 3: // Alphabetical ascending
				$order_by .= " `p_name` ASC";
				break;
			case 4: // Alphabetical descending
				$order_by .= " `p_name` DESC";
				break;
		}
		
		
		//echo $query_token;
		
		
		
		
		return<<<EOD
		(SELECT * FROM `epc_products` WHERE `p_name` LIKE '%$q%') 
		UNION
		(SELECT * FROM `epc_products` WHERE `p_description` LIKE  '%$q%')
		ORDER BY  $order_by 
EOD;
		
	}
	
	
	// Returns true if there is another product left in the query.
	function hasNext(){
		return $this->index < count($this->products);
	}
	
	
	
	//moves the internal pointer forward
	function next(){
		$this->index++;
	}
	
	
	//returns the currently focused product
	function current(){
		if($this->index >= count($this->products)){
			return $this->unavailable;
		}
		return $this->products[$this->index];
		//return $this->index < count($this->products) ? $this->products[$this->index] : $this->unavailable;
	}
	
	
	

}




?>
