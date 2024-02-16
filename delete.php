<?php
include 'database.php';

if(isset($_GET['delete'])){
    $delete_id = $_GET['delete'];
    echo $delete_id;

    $sql = "delete from product where id = $delete_id";
    $result = mysqli_query($conn,$sql);

if($result){

    // echo "deleted";
    header('location:view_products.php');

}
else{

    die(mysqli_error($conn));
}

}
?>