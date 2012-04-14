<!--add_product_form.php -->
<?php 
	// We are executing in the "admin" directory.
	include "../config.php";
	include "../util.php";
	
	connect();

	// and away we go...

?>


<form data-checker="checker();" id="add_product" class="ajax-sub" onsumbit="checker();" action="<?php echo $ep_commerce["root"] ?>/admin/add_product.php" method="POST">
	<div class="left">
		<input type="text" name="p_name" placeholder="Product Name"/>
		<br />
		<input type="text" name="p_price" placeholder="p_price" /> <i>do not use any currency markings</i>
		<textarea name="p_description" rows="10" cols="50"></textarea>
		<textarea name="p_controls" rows="10" cols="50">Place HTML/Javascript Controls (This is where you copy and paste code for an "add to cart" button or something similar. For more information email lee@etherealproductions.net)
		</textarea>
	`	<select name="p_category">
		<?php
			// Now we will create an input control for the user to select a category.
			// First we will use a mysql query to find all of the categories
			//TODO make the query return a tree-ish structure.	
		
			$query = "SELECT * FROM `epc_categories`;";
			$cats = mysql_query($query) or die(mysql_error());
			
			// Now we will iterate through $cats and write a select box.
			while($category = mysql_fetch_assoc($cats)){
			
				echo "<option value=\"$category[c_id]\">";
				echo $category["c_name"];
				echo "</option>";
			}
	
		?>
		</select>
		<i> Select the products category, you can also add more categories</i> 
		
		<br />
		
		<label for="front_page">Product appears on front page</label>
		<input type="checkbox"  name="front_page" value="1" />
		
		<br />
		
		
		<input type="submit" value="Add Product" />
	</div>
	<div class="right">
		<img src="<?php echo $ep_commerce["root"]; ?>/uploads/unavailable.jpg" class="thumbnail" />
		<select multiple="true" name="p_image_href">
			<?php 
				// We will generate an option for each attachment. 
				//TODO decide if we want to limit the number of attachments. 
				
				
				// This query will obtain the 100 most recent attachments.
				echo $query = "SELECT * FROM `epc_uploads` ORDER BY `u_id` DESC LIMIT 0, 100;";
				$attachments = mysql_query($query) or die(mysql_error());
				
				// Now we iterate through the loop and write the options in HTML form.
				while($attachment = mysql_fetch_assoc($attachments)){
					echo "<option value=\"$attachment[u_path]\" title=\"$attachment[u_file_mask_name]\">";
					echo $attachment["u_file_mask_name"];
					echo "</option>";
				
				}
				
				
				
				
			
			
			?>
		</select>

	</div>
</form>



<script type="text/javascript">

	$("#add_product textarea[name=p_description]").wysiwyg({});
	$("#add_product textarea[name=p_description]").wysiwyg("setContent", "Product Description");
	
	
	$("#add_product select").change(function(){
		value = $(this).val();
		$(".thumbnail").attr("src", value);
	});
	
	$("#add_product select").load(function(){
		$(this).children("option:first-child").click();
		
	})
	
</script>
