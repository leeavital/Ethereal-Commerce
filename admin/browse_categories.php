<?php 

	include "../config.php";
	include "../util.php";
	
	connect();
	
	// We are executing in the "admin" directory.
	
?>

<table>
	<?php 
		// First we will use a query to list all the categories.
		$query = "SELECT * FROM `epc_categories`;";
		$cats = mysql_query($query) or die(mysql_error());
		
		// now we will iteratee thorugh $cats to write the HTML  table. 
		while ($cat = mysql_fetch_assoc($cats)):  
	?>
	
	<tr>
		<td><?php echo $cat["c_name"]; ?></td>
		<td><a class="new_window" href="<?php echo $ep_commerce["root"]; ?>/admin/delete_category.php?id=<?php echo $cat["c_id"]; ?>">delete</a></td>
	</tr>
	
	
	<?php endwhile ?>

</table>


