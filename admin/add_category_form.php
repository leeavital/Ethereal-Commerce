<?php


	// we are executing in the directory root/admin.
	
	include "../config.php";
	include "../util.php";
	
	connect();

?>

<form class="ajax-sub" action="<?php echo $ep_commerce["root"] . "/admin/add_category.php"; ?>" method="GET">
	<input type="text" name="c_name" placeholder="Category Name" />
	
	
	<br />
	<label for="c_parent">Category Parent</label>
	<select name="c_parent">
		<option value="-1">No Parent</option>
		<?php 
		
			// we will now make a control to select the category parent.
			// First we use mysql to get all the existing categories. 
		
			$query = "SELECT * FROM `epc_categories`;";
			$cats = mysql_query($query) or die(mysql_error());
		
			// now we iterate through $cats and add a new option for each category. 
			while ($category = mysql_fetch_assoc($cats)){
				echo "<option value=\"$category[c_id]\">";
				echo $category["c_name"];
				echo "</option>";
				
			
			}
		?>
	</select>
	<br />
	<input type="submit" value="Add Category" />
	
	

</form>
