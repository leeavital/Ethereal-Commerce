<!--new_attachment_form.html -->
<?php
	include "../config.php";
?>


<form target="_blank" action="<?php echo $ep_commerce["root"]; ?>/admin/new_attachment.php" enctype="mutipart/form-data" method="post" style="display: block;">
	<input type="file" name="userfile" />
	<input type="submit" name="sub" value="submit attachment" /> 
</form>
