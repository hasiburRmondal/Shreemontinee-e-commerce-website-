<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Shreemontinee</title>
       <!-- Font Awesome --> 
       <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.min.css" integrity="sha512-rqQltXRuHxtPWhktpAZxLHUVJ3Eombn3hvk9PHjV/N5DMUYnzKPC1i3ub0mEXgFzsaZNeJcoE0YHq0j/GFsdGg==" crossorigin="anonymous" />
       
        <!-- Bootstrap CDN -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body>
        <?php
        require_once ('./directory/header.php');
        ?>
        
        <?php
        //start session
        session_start();
        
        require_once('./directory/CreateDb.php');
        require_once('./directory/component1.php');

        //create instance of Createdb class
        $database=new CreateDb("Shreemontinee","Product_table");
        
        if(isset($_POST['add'])){
            //print_r($_POST['product_id']);
            if(isset($_SESSION['cart'])){
                $item_array_id= array_column($_SESSION['cart'],'product_id');
               // print_r($item_array_id);
                
                if(in_array($_POST['product_id'],$item_array_id)){
                    echo"<script>alert('Product is already added in the cart')</script>";
                    echo"<script>window.location=index.php</script>";
                }else{
                    $count= count($_SESSION['cart']);
                    $item_array=array('product_id'=>$_POST['product_id']);
                    $_SESSION['cart'][$count]=$item_array;
                   // print_r($_SESSION['cart']);
                   //print_r($count);
                }
                
            } else {
               $item_array=array('product_id'=>$_POST['product_id']); 
               
               //create new session variable
               $_SESSION['cart'][0]=$item_array;
               //print_r($_SESSION['cart']);
            }
        }
        ?>
        <div class="container">
            <div class="row text-center py-5">
                 
                <?php
                       $result=$database->getData();
                       while ($row= mysqli_fetch_assoc($result)){
                           component($row['product_name'],$row['product_original_price'],$row['product_price'],$row['product_discount'],$row['product_image'],$row['id']);
                       }
                ?>
                
        </div>
        </div>
        
        
        
        
        
        
        
        
        
        
        
        <!--Js CDN -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
    </body>
</html>
