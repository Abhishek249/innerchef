console.log("index.js called");

function mydelete(id)
{
	console.log(id);
	
	$.ajax(
	{
    url: 'delete_product.php',
    type: 'GET',
    data: 'id=' + id,

    success: function(result)
     {
     	console.log("ajax call was successfull");   
     	
            window.location.href='index.php';
        
     }
	});


}