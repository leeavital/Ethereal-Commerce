<?php
	
	
	// We are executing in the admin directory. 
	
	include "../config.php";
	include "../util.php";
	
	connect();	
?>


<form action="<?php echo $ep_commerce["root"]; ?>" method="GET" class="ajax-sub">
	<table>
	<?php
		// First we will make a list of the 100 most recent products
		$query = "SELECT `p_name`, `p_id` FROM `epc_products` ORDER BY `p_id` DESC LIMIT 0, 100;";
		$products = mysql_query($query) or die(mysql_error());
	?>
	<?php while($product = mysql_fetch_assoc($products)): ?>
		<tr>
			<td><?php echo $product["p_name"]; ?></td>
			<td><a class="new_window" href="product_editor.php?id=<?php echo $product["p_id"]; ?>">Edit</a></td>
			<td><a class="new_window" href="remove_product.php?id=<?php echo $product["p_id"]; ?>">Delete</a></td>
		</tr>
	<?php endwhile ?>
	
	</table>
</form>
