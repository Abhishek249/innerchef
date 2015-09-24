<?php
    include_once 'dbconfig.php';
    if(isset($_POST['btn-add']))
    {
         // variables for input data
         $product_name = $_POST['product_name'];
         $product_category = $_POST['product_category'];
         $product_price=$_POST['product_price'];

         $target_dir = "uploads/";
        $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
        $uploadOk = 1;
        $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
        // Check if image file is a actual image or fake image
        if(isset($_POST["submit"])) {
            $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
            if($check !== false) {
                echo "File is an image - " . $check["mime"] . ".";
                $uploadOk = 1;
            } else {
                echo "File is not an image.";
                $uploadOk = 0;
            }
        }
        // Check if file already exists
        if (file_exists($target_file)) {
            echo "Sorry, file already exists.";
            $uploadOk = 0;
        }
        // Check file size
        if ($_FILES["fileToUpload"]["size"] > 500000) {
            echo "Sorry, your file is too large.";
            $uploadOk = 0;
        }
        // Allow certain file formats
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" ) {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }
        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
        // if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }
        $imagename= basename( $_FILES["fileToUpload"]["name"]);
                 
         
         // sql query for inserting data into database         
         $sql_query = "INSERT INTO products (product_name,product_category,image_name,product_price) VALUES('$product_name','$product_category','$imagename','$product_price')";

         if ($con->query($sql_query) === TRUE)
         {
            echo "New Product Added Successfully !";
            echo 
            "<div id='complete-dialog' class='modal fade' tabindex='-1'> ".
              "<div class='modal-dialog'> ".
               " <div class='modal-content'> ".
                  "<div class='modal-header'> ".
                   "<button type='button' class='close' data-dismiss='modal' aria-hidden='true'>×</button> ".
                    "<h4 class='modal-title'>Dialog</h4> ".
                  "</div> ".
                 " <div class='modal-body'> ".
                  "  <p>Added</p> ".
                  "</div> ".
                  "<div class='modal-footer'> ".
                    "<button class='btn btn-primary' data-dismiss='modal'>Dismiss</button> ".
                 " </div> ".
                "</div> ".
             " </div> ".
           " </div> ";

         }

          else
           {
            echo"Product Addition Unsuccessful !";
            }

        
          header('Location: index.php');      
                
         
    }
?>

<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>Innerchef</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-material-design/0.3.0/css/material-fullpalette.css" />
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css"/>
        <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">

        <script src="jquery-2.1.4.js"></script>
        <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-material-design/0.3.0/js/material.min.js.map"></script>
    </head>
<body>

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
                <li><a href="/contact">Contact</a></li>
                <li><a href="/login">Login/Sign Up</a></li>
              </ul>
            </div>
        </div>
    </div>
        <br><br><br><br>
        
        <div class="row">

            
            <form class="form-horizontal col-lg-8" method="post" enctype="multipart/form-data">
                <fieldset>
                    <legend>Add Product</legend>
                    <div class="form-group">
                        <label for="product_name" class="col-lg-2 control-label">Product Name</label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" id="product_name" name="product_name" placeholder="Product Name">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="product_name" class="col-lg-2 control-label">Product Category</label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" id="product_category" name="product_category" placeholder="Product Category">
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="inputFile" class="col-lg-2 control-label">File</label>
                        <div class="col-lg-10">
                            <!-- <input type="text" readonly="" class="form-control floating-label" placeholder="Browse..."> -->
                            <input type="file" id="fileToUpload" name="fileToUpload">
                        </div>
                    </div>

                     <div class="form-group">
                        <label for="product_price" class="col-lg-2 control-label">Price</label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" id="product_price" name="product_price" placeholder="Price">
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <div class="col-lg-10 col-lg-offset-2">
                            <button class="btn btn-default">Cancel</button>
                            <button type="submit" class="btn btn-primary" name="btn-add">Add</button>
                        </div>
                    </div>

                </fieldset>
            </form>
        </div>
    </div>
    
</body>
</html>