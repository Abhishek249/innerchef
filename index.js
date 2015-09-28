$(function() 
{
	$('.item_rows').on("click",".delete",deleteItem);

	function deleteItem()
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
		    
		    $(this).closest('tr').hide('slow', function(){ $(this).closest('tr').remove(); });

	}


	$("#add_product").click(function(){


		$('#product_list_table_body').append
		('<tr id="new_add"> ' +
			 '<td><input id="input_item" type="text" placeholder="Item"></td> ' + 
			 '<td><input id="input_category" type="text" placeholder="Category"></td> ' +
			 '<td><input id="input_price" type="text" placeholder="Price"></td><td> ' +
			 '<button id="btn_cancel_add">Cancel</button> </td> ' +
			 ' <td> <button id="btn_submit_add">Submit</button> </td> ' +
		'</tr>');
			

		$("#btn_submit_add").on("click",function()
		{
			console.log("send ajax to add to DB");
			var myitem=$("#input_item").val();
			var mycategory=$("#input_category").val();
			var myprice=$("#input_price").val();
				console.log(myitem+"-"+mycategory+"-"+myprice);
				

			//var dataString='myitem=' + myitem + 'mycategory=' + mycategory + 'myprice=' + myprice;

			 $.ajax({
			   type: "POST",
			   url: "add_product1.php",
			   dataType: "JSON",
			   data: {
			   		'mitem':myitem,
			   		'mcategory':mycategory,
			   		'mprice':myprice

			   },
			   success: function(json)
			   {	var idnew=json;
			   		console.log("ajax called successfully !\n")  
   		   			$("#new_add").remove();
   		   			
   		   			console.log(json);
   		   			//console.log(typeof(json)); you get string here.
   		   			$('#product_list_table_body').append('<tr class="item_rows" id="row_id#'+idnew+'">' +

   		   					'<td>'+idnew+'</td>'+
   		   					'<td>'+myitem+'</td>'+
   		   					'<td>'+mycategory+'</td>'+
   		   					'<td>'+myprice+'</td>'+
   		   					'<td align="center"><a href="update.php?id='+idnew+'"><i class="mdi-content-create"</i><span></span></a></td>'+
                            '<td align="center"><a href="#" class="delete" id='+idnew+'><i class="mdi-action-delete"></i><span></span></a></td>');


   		   				$(document).on('click','.delete',deleteItem);
   
			   }

		     }); //end of btn_submit_add
		    
		}); //end of add_product

		$("#btn_cancel_add").on("click",function(){
			console.log("removal");
			$("#new_add").remove();
		});
		return false;
	});



});