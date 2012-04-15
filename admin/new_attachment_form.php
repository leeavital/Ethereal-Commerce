<!--new_attachment_form.html -->
<?php
	include "../config.php";
?>


<form  enctype="multipart/form-data" action="<?php echo $ep_commerce["root"]; ?>/admin/new_attachment.php" method="post" style="display: block;">
<!--<form method="post" enctype="multipart/form-data" action="test.php">-->	
	<input type="file" name="userfile" />
	<input type="submit" name="sub" value="submit attachment" /> 
</form>
