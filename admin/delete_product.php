<?php 

if(isset($_GET['delete_product'])) {
    $delete_id = $_GET['delete_product'];

    $delete_query = "DELETE from `products` WHERE product_id = $delete_id";
    $result_delete = mysqli_query($conn, $delete_query);
    if($result_delete) {
        echo "<script>alert('PRODUCT DELETED SUCCESSFULLY')</script>";
        echo "<script>window.open('index.php?view_products', '_self')</script>";
    }
}

?>