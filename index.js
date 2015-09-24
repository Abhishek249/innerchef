console.log("index.js called");

function delete_id(myvar)
{	
	var id=myvar;
	console.log(id);
	
	console.log(typeof(myvar));

	
	console.log("myvar 2is: ",myvar);
	$.ajax({

		type:"POST",
		url:"delete_product.php",
		data:{"id": myvar},
		success:function(result){console.log("Be Happy");},
		error:function(){console.log("error occured in ajax call----");}

	}).done(function(respond)
		{
			console.log("Record deleted successfully")
		});
}

function edit_id(myvar)
{
	console.log("id passed is: ",myvar);
}