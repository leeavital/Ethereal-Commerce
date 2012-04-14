// admin.js

$(document).ready(function(){

	$("ul.toplevel > li").click(function(){
		$(this).siblings("ul.toplevel li").css({"background-color":"white", "color":"black", "border":"none"});
		$(this).css({"background-color":"black", "color":"white", "border":"1px solid skyblue"});
		$(this).find("ul").show("slow");
		$(this).siblings("li").find("ul").hide("slow");
		
	});
	
	
	
	/* we use .live() instead of directly binding  with .submit 
	 * because .live() will allow us to apply the event handlers to
	 * elements that are dynamically loaded after this script
	 * executes */
	$(".ajax-sub").live("submit", function(){
		event.preventDefault();
		data = $(this).serialize();	
		parent = this.parentElement;
		url = $(this).attr("action");
		type = $(this).attr("method");
	
		jQuery.ajax({
			data: data,
			url: url,
			type: type,
			context: parent,
			success: function(data){
				$(this).html(data);
			}
		})
	});
	
	
	$("a.new_window").live("click", function(event){
		event.preventDefault();
		window.open(this.href, "", "height=600, width=800");
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
	
	$("#add_category").click(function(){
		$("#right").load("add_category_form.php");
	})
	
	
	$("#remove_edit_products").click(function(){
		$("#right").load("remove_edit_products_form.php");
	});
	
	$("#browse_categories").click(function(){
		$("#right").load("browse_categories.php");
	});

});
