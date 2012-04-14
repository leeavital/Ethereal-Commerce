

<?php

	// product_editor.php 
	// executing in the "admin" directory.
	include "../config.php";
	include "../util.php";
	
	connect();
	
	
	// First we get the product id from the query string. 
	$p_id = $_GET["id"];
	
	// Now we will use a mysql query to get the existing field values for the given product. 
	$query = "SELECT * FROM `epc_products` WHERE `p_id`=$p_id;";
	$product = mysql_query($query) or die(mysql_error());
	
	if(mysql_num_rows($product) != 1):
		die("the product was not found");
	
	else:
		$product = mysql_fetch_assoc($product) or die(mysql_error());
?>
	

<html>
	<head>
		<title>EPC Admin</title>
		<link type="text/css" rel="stylesheet" href="<?php echo $ep_commerce["root"]; ?>/admin/style.css" />
		<link type="text/css" rel="stylesheet" href="<?php echo $ep_commerce["root"]; ?>/admin/editor/jquery.wysiwyg.css" />
		<script type="text/javascript">
			root = "<?php echo $ep_commerce["root"]; ?>";
		</script>
		<script type="text/javascript" src="<?php echo $ep_commerce["root"]; ?>/admin/jquery.js"></script>
		<script type="text/javascript" src="<?php echo $ep_commerce["root"]; ?>/admin/admin.js"></script>
		<script type="text/javascript" src="<?php echo $ep_commerce["root"]; ?>/admin/editor/jquery.wysiwyg.js"></script>
		
	</head>

	<body>
	<form data-checker="checker();" id="add_product" class="ajax-sub" onsumbit="checker();" action="<?php echo $ep_commerce["root"] ?>/admin/alter_product.php" method="POST">
	<input type="hidden" name="p_id" value="<?php echo $product["p_id"]; ?>" />
	<div class="left">
		<input type="text" name="p_name" placeholder="Product Name" value="<?php echo $product["p_name"]; ?>" />
		<br />
		<input type="text" name="p_price" placeholder="Price" value="<?php echo $product["p_price"] ?>" /> <i>do not use any currency markings</i>
		<textarea name="p_description" rows="10" cols="50"><?php echo htmlentities($product["p_description"]) ?></textarea>
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
		<input type="checkbox"  name="front_page" value="1"  <?php echo ($product["front_page"] == 1) ? "checked='true'" : ""; ?>/>
		
		<br />
		
		
		<input type="submit" value="Edit This Product" />
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
	//$("#add_product textarea[name=p_description]").wysiwyg("setContent", "");
	
	
	$("#add_product select").change(function(){
		value = $(this).val();
		$(".thumbnail").attr("src", value);
	});
	
	$("#add_product select").load(function(){
		$(this).children("option:first-child").click();
		
	})
	
	
	
	/* now we will make code to manipulate the select boxes to reflect the original choies. */
	image_href = "<?php echo $product["p_image_href"]; ?>";
	image_index = $("select[name=\"p_image_href\"] option[value=\"" + image_href+ "\"]");
	image_index = image_index[0].index;
	select = $("select[name='p_image_href']")[0];
	select[image_index].selected = "1";
	$(select).change();
	
	
	
	category_id = <?php echo $product["c_id"]; ?>;
	category_option = $("select[name='p_category'] option[value='" + category_id + "']")[0];
	category_option.selected = "1";
	

</script>



	</body>
</html>
<?php endif ?>
	
