<!DOCTYPE HTML>

<html>

<head>

<title><?php 

if(is_home())	{  	echo $ep_commerce["site_name"]; }
elseif(is_search())	{	echo "Search results for: $_GET[q]"; }
elseif(is_product())	{	echo p_title() ; }

 ?> 
 </title>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js" type="text/javascript"></script>

	<?php main_stylesheet(); ?>

</head>

<body>

	<div class = "outer_wrap">

		<img style = "width:1000px; display:block;" src ="<?php echo home() . "/themes/" . $ep_commerce["theme_directory"] . "/banner.jpg"; ?>" />

		<div class = "menu_row">

			<div class = "menu_links">

				<div class = "right_links">

				<ul class = "top_menu">

					<li id = "body_oils" class = "menu_item"><a href = "#">Body Oils</a>	

						<ul id = "body_oils_sub" class = "body_sub">

							<li class = "menu_item"><a href = "#">For Him</a></li>

							<li class = "menu_item"><a href = "#">For Her</a></li>

							<li class = "menu_item"><a href = "#">Unisex</a></li>

						</ul>

					</li>

				

					<li class = "menu_item"><a href = "#">Bulk Buyer Specials</a></li>

				</div>

				</ul>

				

				<a class = "menu_item" href = "#">Colognes</a>

				<a class = "menu_item" href = "#">For Him</a>

				<a class = "menu_item" href = "#">For Her</a>

				<a class = "menu_item" href = "#">Sets</a>

				<a class = "menu_item" href = "#">Holiday Specials</a>



			</div>

		</div>

		<div class = "body_content">

			<span id = "search">

				<?php search_box(); ?>

			</span>
		