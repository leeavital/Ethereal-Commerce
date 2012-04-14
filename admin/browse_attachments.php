<?php

	// Executing in the directory "admin"
	
	include "../config.php";
	include "../util.php";
	
	connect();
	
	$attachments = mysql_query("SELECT * FROM `epc_uploads`");
	
?>

<table>
	
	<tr>
		<th>Attachment Name</th>
		<th>Attachment Path</th>
	</tr>
	<?php while ($attachment = mysql_fetch_assoc($attachments)): ?>
	<tr>
		<td><?php echo $attachment["u_file_mask_name"]; ?>	</td>
		<td><?php echo $attachment["u_path"]; ?>		 	</td>
	</tr>
	<?php endwhile ?>


</table>
