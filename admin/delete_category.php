<?php 

if(isset($_GET['delete_category'])) {
    $dCat_id = $_GET['delete_category'];

    $delete_query = "DELETE from `categories` WHERE category_id = $dCat_id";
    $result_delete = mysqli_query($conn, $delete_query);
    if($result_delete) {
        echo "<script>alert('DELETED SUCCESSFULLY')</script>";
        echo "<script>window.open('index.php?view_categories', '_self')</script>";
    }
}

?>