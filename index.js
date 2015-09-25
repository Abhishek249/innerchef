$(function() 
{
	$(".delete").click(function()
	{
		var element = $(this);
		var id = element.attr("id");
		var dataString = 'id=' + id;
		console.log($(this));
		console.log($(this).closest('tr'));
		
		   $.ajax({
			   type: "GET",
			   url: "delete_product.php",
			   data: dataString,
			   success: function()
			   {
			   		console.log("ajax called successfully !")        
			   }
		     });
		    
		    $(this).closest('tr').hide('slow', function(){ $target.remove(); });
		
		return false;
	});

});