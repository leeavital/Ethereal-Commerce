// admin.js

$(document).ready(function(){

	$("ul.toplevel > li").click(function(){
		$(this).siblings("ul.toplevel li").css({"background-color":"white", "color":"black", "border":"none"});
		$(this).css({"background-color":"black", "color":"white", "border":"1px solid skyblue"});
		$(this).find("ul").show("slow");
		$(this).siblings("li").find("ul").hide("slow");
		
	});
	
	$("ul.toplevel > li:first").click();
		
		
	$("#add_attachment").click(function(){
		$("#right").load("new_attachment_form.php");
	});
	
	
	$("#browse_attachments").click(function(){
		$("#right").load("browse_attachments.php");
	});
	
	
	$("#add_product").click(function(){
		$("#right").load("add_product_form.php");
	});
	

});
