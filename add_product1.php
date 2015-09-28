<?php
    header('Content-type: application/json');

    include_once 'dbconfig.php';
       
         // variables for input data
         $product_name = $_POST['mitem'];
         $product_category = $_POST['mcategory'];
         $product_price=$_POST['mprice'];

      


         
         // sql query for inserting data into database         
         $query = "INSERT INTO products (product_name,product_category) VALUES('$product_name','$product_category')";

         if ($con->query($query) === TRUE)
         {
            $maxid = 0;
            $query="SELECT MAX(product_id) as maxid FROM products";
            $result=$con->query($query);
            while($row=mysqli_fetch_array($result, MYSQLI_NUM)) 
            {
                $maxid=$row[0];
                
                echo json_encode($maxid);
             }  

         }

          else
           {
            echo"Product Addition Unsuccessful !";
            }

        
         
?>
