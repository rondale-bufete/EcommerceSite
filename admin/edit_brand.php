<?php 
if(isset($_GET['edit_brand'])) {
    $edit_id = $_GET['edit_brand'];
    $get_brand = "SELECT * from `brands` WHERE brand_id = $edit_id";
    $run_query = mysqli_query($conn, $get_brand);
    $fetch_rows = mysqli_fetch_array($run_query);

    $brand_name = $fetch_rows['brand_title'];
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    .edit_input {
        height: 45px;
        width: 60%;
        margin-bottom: 15px;
        border: 1px solid #ccc;
        border-bottom: 2px solid #555;
        border-radius: 5px;
        padding-left: 15px;
    }
    .edit_input:focus {
        outline: none;
        border-bottom: 1px solid #ff523b;
    }
    .edit_btn {
            padding: 8px 30px;
            background-color: #000;
            color: #fff;
            border: 1px solid #000;
            font-weight: bolder;
            border-radius: 10px;
            transition: 200ms;
        }
         .edit_btn:hover {
            background-color: #555;
            color: #000;
            border: 1px solid #000;
            font-weight: bolder;
            transition: 200ms;
         }
</style>
<body>
    <h3 class="text-center">EDIT BRAND</h3>

    <form action="" method="post" class="text-center">
        <input type="text" value="<?php echo $brand_name ?>" name="brand_title" class="edit_input" required placeholder="Edit brand name...."/><br>
        <input type="submit" name="update_br" class="edit_btn" required/>
    </form>
</body>
</html>

<?php 
 
 if(isset($_POST['update_br'])) {
    $br_title = $_POST['brand_title'];

    $update_br = "UPDATE `brands` SET brand_title = '$br_title' WHERE brand_id = $edit_id";
    $run_query = mysqli_query($conn, $update_br);

    if($run_query) {
        echo "<script>alert('UPDATED SUCCESSFULLY')</script>";
        echo "<script>window.open('index.php?view_brands', '_self')</script>";
    }

 }
    
?>