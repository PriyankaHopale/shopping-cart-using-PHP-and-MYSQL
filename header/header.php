<!-- header -->

<header class="header">
<div class="header_body">
    <a href="index.php" class="logo">TechnoBlink</a>
<nav class="navbar">
<a href="index.php">Add Products</a>
<a href="view_products.php">View Products</a>
<a href="shop_product.php">Shopit</a>
</nav>
<!-- select query -->
<?php
$select_products=mysqli_query($conn,"select * from cart") or die('query failed');
$row_count=mysqli_num_rows($select_products);
?>
<!-- shopping cart icon -->
<a href="cart.php" class="cart"><i><i class="fa-solid fa-cart-shopping"><span><sup><?php echo $row_count?></sup></span></i></i></a>
<!-- <div id="menu-btn" class="fas fa-bars"></div> -->
</div>
</header>