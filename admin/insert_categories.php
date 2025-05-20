<?php
include('../includes/dbconnect.php');

if (isset($_POST['insert_cat'])) {
    $category_title = $_POST['cat_title'];

    $select_query = "SELECT * from `categories` WHERE category_title = '$category_title'";
    $select_result = mysqli_query($conn, $select_query);
    $number = mysqli_num_rows($select_result);
    if ($number > 0) {
        echo "<script>alert('Category Already Exist in the Database')</script>";
    } else {
        $cat_query = "INSERT INTO `categories` (category_title) VALUES ('$category_title')";
        $result = mysqli_query($conn, $cat_query);

        if ($result) {
            echo "<script>alert('Category Added Successfully')</script>";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    <form action="" method="post" class="mb-2">
        <hr>
        <h3 class="text-center">ADD CATEGORIES</h3>
        <hr>
        <div class="input-group w-90 mb-2">
            <span class="input-group-text bg-info" id="basic-addon1"><i class="fa-solid fa-receipt"></i></span>
            <input type="text" class="form-control" name="cat_title" placeholder="Insert categories" aria-label="Username" aria-describedby="basic-addon1">
        </div>
        <div class="input-group w-10 mb-2 m-auto">
            <input type="submit" class="form-control bg-dark text-light my-3" name="insert_cat" value="Insert categories">
            <!-- <button class="form-control bg-dark text-light p-2 my-3">Insert Category</button> -->
        </div>
    </form>
</body>

</html>