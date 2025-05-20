<?php 

if(isset($_GET['delete_brand'])) {
    $dBr_id = $_GET['delete_brand'];

    $delete_query = "DELETE from `brands` WHERE brand_id = $dBr_id";
    $result_delete = mysqli_query($conn, $delete_query);
    if($result_delete) {
        echo "<script>alert('DELETED SUCCESSFULLY')</script>";
        echo "<script>window.open('index.php?view_brands', '_self')</script>";
    }
}

?>