<?php include 'database.php'; 
// update product logic

if(isset($_POST['update_product'])){
$update_product_id=$_POST['update_product_id'];
// echo $update_product_id;
$update_product_name=$_POST['update_product_name'];
// echo $update_product_name;
$update_product_price=$_POST['update_product_price'];
$update_product_image=$_FILES['update_product_image']['name'];
$update_product_image_temp_name=$_FILES['update_product_image']['tmp_name'];
$update_product_image_folder='images/'.$update_product_image;


//   update query
$update_query=mysqli_query($conn,"update product set name='$update_product_name',
price= '$update_product_price',image='$update_product_image' where id=$update_product_id");

if($update_query)
{
move_uploaded_file($update_product_image_temp_name,$update_product_image_folder);
// echo "Product Uploaded";
header('location:view_products.php');
// echo "product inserted";
}else{
$display_message = "failed to update product";
}

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Product</title>
     <!-- css file -->
<link rel="stylesheet" href="css/style.css">

<!-- font awesome link -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" 
integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>
<body>
    <?php include 'header/header.php';?>
    <!-- message display -->
<?php
if(isset($display_message)){
    echo "<div class='display_message'>
    <span>$display_message</span>
    <i class='fas fa-times' onclick='this.parentElement.style.display=`none`'></i>
    </div>";
}
?>
    <section class="edit-container">

<!-- PHP code -->
<?php

if(isset($_GET['edit'])){
    $edit_id=$_GET['edit'];
    // echo $edit_id;
$edit_query=mysqli_query($conn,"select * from product where id=$edit_id");
if(mysqli_num_rows($edit_query)>0){
$fetch_data=mysqli_fetch_assoc($edit_query);
$row=$fetch_data['price'];
// echo $row;


?>

    <!-- form -->
    <form  action="" method="post" enctype="multipart/form-data" class="update_product product_container_box">
            <img src="images/<?php echo $fetch_data['image']?>" alt="">
            <input type="hidden" value="<?php echo $fetch_data['id']?>" name="update_product_id">
            <input type="text" class="input_fields fields" value="<?php echo $fetch_data['name']?>" name="update_product_name" required>
            <input type="number" class="input_fields fields" value="<?php echo $fetch_data['price']?>" name="update_product_price" required>
            <input type="file" class="input_fields fields" accept="image/png, image/jpg, image/jpeg, image/AVIF" name="update_product_image">
            <div class="btns">
                <input type="submit" class="edit_btn" value="Update Product"  name="update_product">
                <input type="reset" id="close_edit" value="cancel" class="cancel_btn">
            </div>
        </form>
<?php


}
}


?>
    
    </section>
</body>
</html>