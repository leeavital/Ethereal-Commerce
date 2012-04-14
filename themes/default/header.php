<html>
	<head>
		<title>
			<?php
				if(is_home())	{	echo "Welcome to $ep_commerce[site_name]";		}
				if(is_product()){	p_title();										}
				if(is_search())	{	echo "results for: \"$_GET[q]\"";			 	}
				
			?>
		
		</title>
		<?php main_stylesheet() ?>
		<script type="text/javascript" src="<?php  echo $ep_commerce["root"] . "/themes/" . $ep_commerce['theme_directory'] . '/jquery.js'   ?> "></script>
	<head>
	<body>
		<div id="branding" class="clearfix">
			<div id="logo">
				<h1>EP COMMERCE</h1>
			</div>
			<div id="search">
				<?php search_box(); ?>
			</div>
		</div>
	
