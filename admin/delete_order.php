<?php 

if(isset($_GET['delete_order'])) {
    $dOr_id = $_GET['delete_order'];

    $delete_query = "DELETE from `orders` WHERE order_id = $dOr_id";
    $result_delete = mysqli_query($conn, $delete_query);
    if($result_delete) {
        echo "<script>alert('DELETED SUCCESSFULLY')</script>";
        echo "<script>window.open('index.php?list_orders', '_self')</script>";
    }
}

?>