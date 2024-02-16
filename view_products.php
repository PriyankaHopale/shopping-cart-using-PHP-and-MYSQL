<!-- including php logic connection to database -->
<?php include 'database.php' ?>
<?php include 'delete.php' ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Products</title>

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

    <!-- container -->
    <div class="container">
        <section class="display_product">


<!-- php code -->
<?php
$sql = "Select * from product";
$result = mysqli_query($conn,$sql);
$num = 1;
if(mysqli_num_rows($result)>0){
   echo '<table class="table">
    <thead>
        <th>Sr No.</th>
        <th>Product Image</th>
        <th>Product Name</th>
        <th>Product Price</th>
        <th>Action</th>
    </thead>
    <tbody>';
// echo "yes";

// logic to fetch data from database 

while($row = mysqli_fetch_assoc($result)){
        // $id = $row['id'];
        // $name = $row['name'];
        // $price = $row['price'];
        // $image = $row['image'];

?>
<!-- display table -->

        <tr>
             <td><?php echo $num ?></td>
             <td><img src="images/<?php echo $row['image']?>" alt=<?php echo $row['name']?> ></td>
             <td><?php echo $row['name']?></td>
             <td><?php echo $row['price']?></td>
             <td>
                <a href="update.php? edit=<?php echo $row['id']?>" class="edit_product_btn"><i class="fas fa-edit"></i></a>
                 <a href="delete.php? delete=<?php echo $row['id']?>" class="delete_product_btn" onclick="return confirm('Are you sure you want to delete this product')" >
                 <i class="fas fa-trash"></i></a>
             </td>

         </tr>



<?php
$num++;
}
}
else{
    echo "<div class='empty_text'>No Products Available </div>";
}

?>
  



        
    </tbody>
</table>
        </section>
    </div>
</body>
</html>