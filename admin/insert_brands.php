<?php
include('../includes/dbconnect.php');

if (isset($_POST['insert_brand'])) {
    $brand_title = $_POST['brand_title'];

    $select_query = "SELECT * from `brands` WHERE brand_title = '$brand_title'";
    $select_result = mysqli_query($conn, $select_query);
    $number = mysqli_num_rows($select_result);
    if ($number > 0) {
        echo "<script>alert('Brand Already Exist in the Database')</script>";
    } else {
        $br_query = "INSERT INTO `brands` (brand_title) VALUES ('$brand_title')";
        $result = mysqli_query($conn, $br_query);

        if ($result) {
            echo "<script>alert('Brand Added Successfully')</script>";
        }
    }
}
?>



<form action="" method="post" class="mb-2">
    <hr>
    <h3 class="text-center">ADD BRANDS</h3>
    <hr>
    <div class="input-group w-90 mb-2">
        <span class="input-group-text bg-info" id="basic-addon1"><i class="fa-solid fa-receipt"></i></span>
        <input type="text" class="form-control" name="brand_title" placeholder="Insert Brands" aria-label="deliveries" aria-describedby="basic-addon1">
    </div>
    <div class="input-group w-10 mb-2 m-auto">
        <input type="submit" class="form-control bg-dark text-light my-3" name="insert_brand" value="Insert Brands">

        <!-- <button class="form-control bg-dark text-light p-2 my-3">Insert Brand</button> -->
    </div>
</form>