<?php

	// Remeber we are operating in the directory "admin". We must use ../ to access anything in the root directory.

	include "../config.php";
	include "../epc_tags.php";
	
?>
<!DOCTYPE HTML>
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
	<body class="clearfix">
		<div id="left" >
			<ul class= "toplevel">
				<li>
					Products
					<ul class="lowerlevel">
						<li id="add_product">Add Product</li>
						<li id="remove_edit_products">Remove/Edit Products</li>
					</ul>
				</li>
				
				<li>
					Categories
					<ul class="lowerlevel">
						<li id="add_category">Add Category</li>
						<li id="browse_categories">Browse/Remove Categories</li>
					</ul>
				</li>
				
				<li>
					Attachments (images etc.)
					<ul class="lowerlevel">
						<li id="add_attachment">New Attachment</li>
						<li id="browse_attachments">Browse Attachments</li>
						<li id="browser_attachment_directory">Browse Attachments(Directory) <i>For experienced users only</i></lI>
					</ul>
				</li>
				
			</ul>
		</div>
		<div id="right">
			<h1>EPCommerce Dashboard</h1>
			<p>Here is an explanation of how to get started...</p>
		</div>
	</body>

</html>


