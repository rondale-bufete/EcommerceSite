<?php 
if(isset($_GET['edit_category'])) {
    $edit_id = $_GET['edit_category'];
    $get_category = "SELECT * from `categories` WHERE category_id = $edit_id";
    $run_query = mysqli_query($conn, $get_category);
    $fetch_rows = mysqli_fetch_array($run_query);

    $category_name = $fetch_rows['category_title'];
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
    <h3 class="text-center">EDIT CATEGORY</h3>

    <form action="" method="post" class="text-center">
        <input type="text" value="<?php echo $category_name ?>" name="category_title" class="edit_input" required placeholder="Edit category name...."/><br>
        <input type="submit" name="update_cat" class="edit_btn" required/>
    </form>
</body>
</html>

<?php 
 
 if(isset($_POST['update_cat'])) {
    $cat_title = $_POST['category_title'];

    $update_cat = "UPDATE `categories` SET category_title = '$cat_title' WHERE category_id = $edit_id";
    $execute_query = mysqli_query($conn, $update_cat);

    if($execute_query) {
        echo "<script>alert('UPDATED SUCCESSFULLY')</script>";
        echo "<script>window.open('index.php?view_categories', '_self')</script>";
    }

 }
    
?>