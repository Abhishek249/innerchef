<!DOCTYPE html>
<html lang="en">
<head>
   <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>Innerchef</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-material-design/0.3.0/css/material-fullpalette.css" />
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css"/>
        <script src="jquery-2.1.4.js"></script>
        <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-material-design/0.3.0/js/material.min.js.map"></script>
  </head>
  <body>
    

     
     
      <div class='container-fluid'>

      	<div class="container-fluid">


	        <div class="navbar navbar-inverse navbar-fixed-top">
	            <div class="container">
	            <div class="navbar-header">
	              <button type="button" data-toggle="collapse" data-target=".navbar-collapse" class="navbar-toggle"><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button><a href="index.php" class="navbar-brand">Innerchef</a>
	            </div>
	            <div class="collapse navbar-collapse">
	              <ul class="nav navbar-nav">
	                <li class="active"><a href="index.php">Home</a></li>
	                <li><a href="/about">About</a></li>
	                <li><a href="/contact">Contact Us</a></li>
	                <li><a href="/login">Login/Sign Up</a></li>
	              </ul>
	            </div>
	        </div>
	    </div>
        <br><br><br><br>


         <div class='row'>
        	<div class='col-md-3'></div>
        	<div class='col-md-6'>
        	<h3></h3>
          <form method="post" action='update.php'>
		  <?php
			include_once 'dbconfig.php';

			//get the name
			$name;
			
			if ($_SERVER["REQUEST_METHOD"] == "GET")
			{
				$x=$_GET['id'];//this name is used to display filled form in first part and
				// to update the required row in the second part.
				displayform($x);
			}

			if ($_SERVER["REQUEST_METHOD"] == "POST")
			 {
				$productname=$_POST["productname"];
				$productcategory=$_POST["productcategory"];
				$productprice=$_POST["productprice"];
				$hiddenname=$_POST["hiddenname"];
				updateproduct($hiddenname,$productname,$productcategory,$productprice);
				
			}
			function updateproduct($hiddenname,$productname,$productcategory,$productprice)
			{
				//$name=$GLOBALS['name'];
				$sql = "UPDATE products SET product_name='$productname',product_category='$productcategory', product_price='$productprice' WHERE product_id='$hiddenname'";

				if ($GLOBALS['con']->query($sql) === TRUE) {
					echo "Record updated successfully";
					          header('Location: index.php');      

				}
				else {
					echo "Error updating record: " . $GLOBALS['con']->error;
				}
			}
			function displayform($x)
			{
				$id=$x;
				$sql = "SELECT * FROM products WHERE product_id='$id'";
				$result = $GLOBALS['con']->query($sql);
			
				if ($result->num_rows > 0) 
				{
					$row = $result->fetch_assoc();
					echo 	"<h3>Update Product .Change the required fields</h3>".
					"<div class='form-group'><input type='hidden' name='hiddenname' value='".
					$row["product_id"]
					."'".
					"</div><div class='form-group'>".
					"	<label for=''>Product Name</label>".
					"	<input value='".
						$row["product_name"]
						."'type='text' value name='productname' class='form-control' id='' placeholder='Product Name:' required>".
					"</div>".
					"<div class='form-group'>".
						"<label for=''>Product Category</label>".
						"<input value='".
						$row["product_category"]
						."'type='text' name='productcategory' class='form-control' id='' placeholder='Product Category' required>".
					"</div>".

					"<div class='form-group'>".
						"<label for=''>Price</label>".
						"<input value='".
						$row["product_price"]
						."'type='text' name='productprice' class='form-control' id='' placeholder='Price' required>".
					"</div>".
					
					"<input type='submit' class='btn btn-primary' value='Update'></input>";
				}
			}
			$con->close();
		  ?>
          </form>

        	</div>
        	<div class='col-md-3'>
        	
			
          <script>
          //if add call add.php


          </script>


        	</div>
        	<div class='col-md-2'></div>
        

    </div>
    <div class='mf'></div>
</div>

    
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

    <!-- Latest compiled and minified JavaScript -->
	<script src="js/bootstrap.min.js"></script>
    
</body></html>





