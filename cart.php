<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Shreemontinee || Cart</title>
       <!-- Font Awesome --> 
       <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.min.css" integrity="sha512-rqQltXRuHxtPWhktpAZxLHUVJ3Eombn3hvk9PHjV/N5DMUYnzKPC1i3ub0mEXgFzsaZNeJcoE0YHq0j/GFsdGg==" crossorigin="anonymous" />
       
        <!-- Bootstrap CDN -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body class="bg-light">
        
        <?php
        require_once ('./directory/header.php');
        ?>
        
         <?php
        //start session
        session_start();
        
        require_once('./directory/CreateDb.php');
        require_once('./directory/component1.php');

        //create instance of Createdb class
        $db=new CreateDb("Shreemontinee","Product_table");
        
        //product_remove...
        if(isset($_POST['remove'])){
            if($_GET['action']=='remove'){
                foreach ($_SESSION['cart'] as $key => $value) {
                    if($value["product_id"]==$_GET['id']){
                        unset($_SESSION['cart'][$key]);
                        echo"<script>alert('Product has been removed form the cart...!')</script>";
                        echo"<script>window.location=cart.php</script>";
                    }
                    
                }
            }
        }
        ?>
        <div class="container-fluid">
            <div class="row px-5">
                <div class="col-md-6">
                    <div class="shopping-cart">
                        <h4><b>My Cart</b></h4>
                        <hr>
                        
                        <?php
                        $total_price=0;
                        $total_discount=0;
                        $total_original_price=0;
                       if(isset($_SESSION['cart'])){
                            $product_id=array_column($_SESSION['cart'],'product_id');
                        
                        $result=$db->getData();
                        while($row= mysqli_fetch_assoc($result)){
                            foreach ($product_id as $id) {
                                if($row['id']==$id){
                                   cartElement($row['product_name'],$row['product_original_price'],$row['product_price'],$row['product_discount'],$row['product_image'],$row['id']);
                                   $total_price=$total_price+(int)$row['product_price'];
                                   $total_discount=$total_discount+(int)$row['product_discount'];
                                   $total_original_price=$total_original_price+(int)$row['product_original_price'];
                                   }
                                
                            }
                        }
                       }else{
                           echo"<h2 style=\"color:red; text-align:center\">Cart is Empty!</h2>";
                       }
                                ?>
                    </div>
                </div> 
                <div class="col-md-4 offset-md-1">
                    <div class="border rounded mt-5 bg-white pt-4 px-3">
                        <h6>PRICE DETAILS</h6>
                        <hr>
                        <div class="row price-details">
                            <div class="col-md-6">
                                <?php
                                if(isset($_SESSION['cart'])){
                                    $count=count($_SESSION['cart']);
                                    echo"<h6>Price($count items)</h6>";
                                }else{
                                    echo"Price(0 items)";
                                }
                                ?>
                                <h6>Discount</h6>
                                <h6>Delivery Charges</h6>
                            </div>
                            <div class="col-md-6">
                                <h6>₹ <?php echo $total_original_price;?></h6>
                                <h6 class="text-primary">All items are included</h6>
                                <h6 class="text-success">Free</h6>
                            </div>
                        </div>
                        
                        <hr>
                        <div class="row">
                            <div class="col-md-6">
                                <h6>Total Amount</h6>
                            </div>
                            <div class="col-md-6">
                                <h6>₹ <?php echo $total_price?></h6>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
            
        </div>
        
        
        
        
        
        
        
        <!--Js CDN -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
    </body>
</html>
