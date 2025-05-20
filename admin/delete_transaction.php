<?php 

if(isset($_GET['delete_transaction'])) {
    $dPay_id = $_GET['delete_transaction'];

    $delete_query = "DELETE from `payments` WHERE payment_id = $dPay_id";
    $result_delete = mysqli_query($conn, $delete_query);
    if($result_delete) {
        echo "<script>alert('DELETED SUCCESSFULLY')</script>";
        echo "<script>window.open('index.php?list_payments', '_self')</script>";
    }
}

?>