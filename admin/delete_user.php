<?php 

if(isset($_GET['delete_user'])) {
    $dUser = $_GET['delete_user'];

    $delete_query = "DELETE from `users` WHERE user_id = $dUser";
    $result_delete = mysqli_query($conn, $delete_query);
    if($result_delete) {
        echo "<script>alert('DELETED SUCCESSFULLY')</script>";
        echo "<script>window.open('index.php?list_users', '_self')</script>";
    }
}

?>