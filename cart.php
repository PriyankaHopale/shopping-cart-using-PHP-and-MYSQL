<?php
include 'database.php';
// update query

if(isset($_POST['update_product_quantity'])){
    $update_value=$_POST['update_quantity'];
    $update_id=$_POST['update_quantity_id'];
    // echo $update_id;

    // update query 
    $update_quantity_query=mysqli_query($conn,"update cart set 
    quantity=$update_value where id=$update_id");
    if($update_quantity_query){
        header('location:cart.php');
    }
}
if(isset($_GET['remove'])){
    $remove_id=$_GET['remove'];

    // delete query
    $delete_id=mysqli_query($conn,"delete from cart where id=$remove_id");
    // echo $delete_id;
    if($delete_id){
        header('location:cart.php');
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>cart page</title>
    <!-- css file -->
    <link rel="stylesheet" href="css/style.css">

<!-- font awesome link -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" 
integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" 
crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
     <!-- header -->
     <?php include 'header/header.php'?>

<div class="container">
    <section class="shopping_cart">
        <h1 class="heading">My Cart</h1>
        <table>
<?php
$select_cart_products=mysqli_query($conn,"select * from cart");
$num=1;
$grand_total=0;
if(mysqli_num_rows($select_cart_products)>0){
echo "
<thead>
    <th>sl No.</th>
    <th>Product Name</th>
    <th>Product Image</th>
    <th>Product Price</th>
    <th>Product Quantity</th>
    <th>Total Price</th>
    <th>Action</th>
</thead>
<tbody>";

while($fetch_cart_product=mysqli_fetch_assoc($select_cart_products)){
    ?>
             <tr>
                    <td><?php echo $num?></td>
                    <td><?php echo $fetch_cart_product['name']?></td>
                    <td><img src="images/<?php echo $fetch_cart_product['image']?>" alt=""></td>
                    <td>$<?php echo number_format($fetch_cart_product['price'])?>/-</td>
                    <td>
                        <form action="" method="post">
                            <input type="hidden" value="<?php echo $fetch_cart_product['id']?>" name="update_quantity_id">
                        <div class="quantity_box">
                                <input type="number" min="1" value="<?php echo $fetch_cart_product['quantity']?>" name="update_quantity">
                                <input type="submit" class="update_quantity" value="Update" name="update_product_quantity">
                        </div>
                        </form>
                </td>
                    <td>$<?php echo $subtotal=number_format($fetch_cart_product['price']*$fetch_cart_product['quantity'])?>/-</td>
                    <td>
                        <a href="cart.php?remove=<?php echo $fetch_cart_product['id'] ?>" onclick="return confirm('Are you sure you want to delete this product')">
                        <i class="fas fa-trash"></i></a>Remove</td>
                </tr>


<?php
$grand_total+=($fetch_cart_product['price']*$fetch_cart_product['quantity']);
$num++;

}
}

else{
    echo "<div class='empty_text'>Cart is empty</div>";
}

?>
            
   
            </tbody>
        </table>
<!-- php code -->
<?php
// <!-- bottom area -->
if($grand_total>0){
echo "
<div class='table_bottom'>
    <a href='shop_product.php' class='bottom_btn'><b>Continue shopping</b></a>
    <h3 class='bottom_btn'>Total : $<span>$grand_total/-</span></h3>
    <a href='checkout.php' class='bottom_btn'><b>Process to checkout</b></a>
</div>";
}
?>
      </section>  
</div>

</body>
</html>