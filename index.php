<?php
include_once 'dbconfig.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1">

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
              <button type="button" data-toggle="collapse" data-target=".navbar-collapse" class="navbar-toggle"><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button><a href="/" class="navbar-brand">Innerchef</a>
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
        <div class="row ">
            <div class='col-md-2'></div>
            <div class='col-md-8'>
                <table class="table table-striped table-hover ">
                    <thead>
                        <tr>
                            
                            <th>ID</th>
                            <th>Item</th>
                            <th>Category</th>
                            <th>Price</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                         <?php
                             $sql_query="SELECT * FROM products";
                             $result=$con->query($sql_query);

                             if($result->num_rows > 0)
                            {
                                while($row = $result->fetch_assoc())
                                {
                                    ?>
                                        <tr>
                                            <td><?php echo $row["product_id"];  ?></td>
                                            <td><?php echo $row["product_name"]; ?></td>
                                            <td><?php echo $row["product_category"]; ?></td>
                                            <td><i class="fa fa-inr"></i><?php echo $row["product_price"]; ?></td>
                                           <!--<td align="center"><a href="javascript:delete_id('<?php echo $row["product_id"]; ?>')"><i class="mdi-action-delete"></i><span></span></a></td> -->
                                            
                                            <?php

                                                echo "<td align='center'>".
                                                "<a href='update.php?id=".
                                                $row["product_id"]
                                                ."'><i class='mdi-content-create'></i>".
                                                "<span></span>".
                                                "</a>".
                                                "</td>";


                                            ?>


                                           <!-- 2 ways: call JS func and ajax in it ,2:-directly refer to php with param in url -->
                                           <!-- <td align="center"><a href='delete_product.php?id=<?php echo $row["product_id"] ;?> '><i class="mdi-action-delete"></i><span></span></a></td> -->
                                            <td align="center"><a href="#" onclick="mydelete('<?php echo $row["product_id"]; ?>')"><i class="mdi-action-delete"></i><span></span></a></td>
                                       </tr>
                                    <?php
                                }

                            }
                             
                        ?>
                         <tr>
                            <!--<th colspan="5"><a href="add_product.php">Add New Product</a></th> -->
                            <th colspan="5"><a href="add_product.php" class="btn btn-info btn-raised mdi-content-add"></a></th>

                        </tr>
                        
                    </tbody>
                </table>
            </div>
            <div class='col-md-2'></div>
        </div>

    </div>
    
    
    <script type="text/javascript" src="index.js"></script>
</body>
</html>                 