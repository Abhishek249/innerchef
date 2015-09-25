<?php 

	include_once 'dbconfig.php';
	echo"<br><br><br><br><br>";
	echo"Delete product php called";
	
		$pid=$_GET['id'];
		 $sql_query="DELETE FROM products WHERE product_id='$pid'";
		 
		 if($con->query($sql_query)===TRUE)
		 {
		 			echo "Deleted Successfully!";

		 }
		 else
		 {
		 	echo"Deletion Unsuccessfull !";
		 }
         // header('Location: index.php');      
 ?>
