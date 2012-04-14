<?php 


// Initialiaze the ep_commerce array
// This will contain all important system data.
$ep_commerce = Array();


// Set the root directory
$ep_commerce["root"] = "http://localhost/epc";


// Set up database informations
$ep_commerce["db_host"] = "localhost";
$ep_commerce["db_name"] = "ep_commerce";
$ep_commerce["db_pass"] = "";
$ep_commerce["user_name"] = "root";


// Theme information. 
// Change this to change themes.
$ep_commerce["theme_directory"] = "jilani";


$ep_commerce["site_name"] = "Jilani Group USA";


$ep_commerce["max_entries_per_page"] = 10;





/***************************************
 * Here you can set error messages and 404 error handlers */
$ep_commerce["missing_image_url"] = $ep_commerce["root"] . "/uploads/unavailable.jpg";
$ep_commerce["404_url"] = "#";
$ep_commerce["title_not_found"] = "Product Name Unavailable";
$ep_commerce["description_not_found"] = "Description Unavailable";
$ep_commerce["price_unavailable"] = 0;   // THIS MUST BE A NUMBER
 
?>
