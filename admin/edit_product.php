<?php 
if(isset($_GET['edit_product'])) {
    $edit_id = $_GET['edit_product']; {
        $product_to_edit = "SELECT * from `products` WHERE product_id = $edit_id";
        $reult_edit = mysqli_query($conn, $product_to_edit);
        $fetch_edit_row = mysqli_fetch_array($reult_edit);

        $product_title = $fetch_edit_row['product_title'];
        $product_description = $fetch_edit_row['product_description'];
        $product_keywords = $fetch_edit_row['product_keywords'];
        $category_id = $fetch_edit_row['category_id'];
        $brand_id = $fetch_edit_row['brand_id'];
        $image1	 = $fetch_edit_row['image1'];
        $image2 = $fetch_edit_row['image2'];
        $product_price = $fetch_edit_row['product_price'];
       

        $select_category = "SELECT * from `categories` WHERE category_id = $category_id";
        $selected_category = mysqli_query($conn, $select_category);
        $fetch_category = mysqli_fetch_array($selected_category);
        $current_cat = $fetch_category['category_title'];


        $select_brands = "SELECT * from `brands` WHERE brand_id = $brand_id";
        $selected_brand = mysqli_query($conn, $select_brands);
        $fetch_brand = mysqli_fetch_array($selected_brand);
        $current_brand = $fetch_brand['brand_title'];
    }
}

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
        .input_edit {
            margin-bottom: 15px;
            height: 45px;
            width: 60%;
            border: 1px solid #ccc;
            padding-left: 15px;
            border-bottom: 1px solid #555;
            border-radius: 5px;
        }
        .input_edit:focus {
            outline: none;
            border-bottom: 1px solid #ff523b;
        }
        .prd_display { 
            width: 100px;
            object-fit: contain;
        }
        .image_edit {
            width: 75%;
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
</head>
<body>
    <h3 class="text-center">EDIT PRODUCT</h3>
    <div class="container mt-5 m-auto text-center">
        <form action="" method="post" enctype="multipart/form-data">

            <input type="text" value="<?php echo $product_title ?>" id="product_title" name="product_title" class="input_edit" required placeholder="Edit product name..."/><br>
            <input type="text" value="<?php echo $product_description ?>" id="product_description" name="product_description" class="input_edit" required placeholder="Edit product description..."/><br>
            <input type="text" value="<?php echo $product_keywords ?>" id="product_keywords" name="product_keywords" class="input_edit" required placeholder="Edit product keywords..."/><br>
            <select name="product_category" id="" class="input_edit" required>
                 <option value="<?php echo $current_cat ?>"><?php echo $current_cat ?></option>
                        <!-- PHP / QUERY -->
                        <?php
                            $category_select = "SELECT * from `categories`";
                            $category_result = mysqli_query($conn, $category_select);

                            while ($row = mysqli_fetch_assoc($category_result)) {
                                $category_title = $row['category_title'];
                                $category_id = $row['category_id'];
                                echo "<option value='$category_id'>$category_title</option>";
                            }
                        ?>
            </select>
            <select name="product_brands" id="" class="input_edit" required>
                <option value="<?php echo $current_brand ?>"><?php echo $current_brand ?></option>
                        <!-- PHP / QUERY -->
                    <?php
                        $brand_select = "SELECT * from `brands`";
                        $brand_result = mysqli_query($conn, $brand_select);

                        while ($row = mysqli_fetch_assoc($brand_result)) {
                            $brand_title = $row['brand_title'];
                            $brand_id = $row['brand_id'];
                            echo "<option value='$brand_id'>$brand_title</option>";
                        }
                    ?>
            </select><br>

            <div class="image_edit m-auto">
                <div class="d-flex">
                   <input type="file" value="<?php echo $image1 ?>" name="product_image1" id="product_image1" class="input_edit m-auto" required> 
                   <img src="./products/<?php echo $image1 ?>" alt="" class="prd_display" >
                </div>
            </div>
                

            <div class="image_edit m-auto">
                <div class="d-flex">
                   <input type="file" name="product_image2" value="<?php echo $image1 ?>" id="product_image2" class="input_edit m-auto" required> 
                   <img src="./products/<?php echo $image2 ?>" alt="" class="prd_display" >
                </div>
            </div>
                
        <input type="text" id="product_price" value="<?php echo $product_price ?>" name="product_price" class="input_edit" required placeholder="Edit product price..."/><br>

        <input type="submit" class="edit_btn" name="update_product" value="SAVE CHANGES">
     


        </form>
    </div>
</body>
</html>

<?php 

if(isset($_POST['update_product'])) {
    $product_name = $_POST['product_title'];
    $product_desc = $_POST['product_description'];
    $product_key = $_POST['product_keywords'];
    $product_cat = $_POST['product_category'];
    $product_br = $_POST['product_brands'];

    $product_img1 = $_FILES['product_image1']['name'];
    $product_img2 = $_FILES['product_image2']['name'];

    $product_tmp1 = $_FILES['product_image1']['tmp_name'];
    $product_tmp2 = $_FILES['product_image2']['tmp_name'];



    $product_prc = $_POST['product_price'];

    if($product_name=='' or $product_desc=='' or $product_key=='' or $product_cat=='' 
    or $product_br=='' or $product_img1=='' or $product_img2=='' or $product_prc=='') {
        echo "<script>alert('PLEASE INPUT ALL FIELDS')</script>";
    } else {
        move_uploaded_file($product_tmp1, "./products/$product_img1");
        move_uploaded_file($product_tmp2, "./products/$product_img2");

        $update_query = "UPDATE `products` SET 
        product_title = '$product_name', product_description = '$product_desc', product_keywords = '$product_key',
         category_id = '$product_cat', brand_id = '$product_br',
         image1 = '$product_img1', image2 = '$product_img2', product_price = '$product_prc', date=NOW() WHERE product_id = $edit_id";

         $updated=mysqli_query($conn, $update_query);

         if($updated) {
            echo "<script>alert('UPDATED SUCCESSFULLY')</script>";
            echo "<script>window.open('index.php?view_products', '_self')</script>";
         }
    }
}
?>