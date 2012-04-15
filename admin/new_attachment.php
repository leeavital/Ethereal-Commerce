<?php

	// Executing in root/admin.

	// We load configurations, and the uploading utility

	include "../config.php";
	include "../uploads/uploader.php";
	include "../util.php";



	$uploader = new Uploader("userfile");
	$uploader->setUploadDirectory("../uploads");
	$uploader->upload();
	
	
	


?>



File: <?php echo $uploader->name; ?>

<br />
<br />

Uploaded to: <?php echo $uploader->absoluteUploadPath;  ?>

<br />
<br />

<img src="<?php echo $uploader->absoluteUploadPath; ?>" style="width: 200px; height: auto;" />
