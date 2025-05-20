<?php

if (isset($_POST['insert_product'])) {

    $product_title = $_POST['product_title'];
    $description = $_POST['description'];
    $product_keyword = $_POST['product_keyword'];
    $product_category = $_POST['product_category'];
    $product_brand = $_POST['product_brand'];
    $product_price = $_POST['product_price'];
    $product_status = 'true';
    //for images
    $product_image1 = $_FILES['product_image1']['name'];
    $product_image2 = $_FILES['product_image2']['name'];
    //temp name for images
    $tmp_image1 = $_FILES['product_image1']['tmp_name'];
    $tmp_image2 = $_FILES['product_image2']['tmp_name'];


    if (
        $product_title == '' or $description == '' or $product_keyword == ''
        or $product_category == '' or $product_brand == ''
        or $product_price == '' or $product_image1 == '' or $product_image2 == ''
    ) {
        echo "<script>alert('Please fill the required fields')</script>";
        exit();
    } else {
        move_uploaded_file($tmp_image1, "./products/$product_image1");
        move_uploaded_file($tmp_image2, "./products/$product_image2");
        //query
        $insert_products = "INSERT INTO 
        `products` 
        (product_title, product_description, product_keywords, category_id, 
        brand_id, image1, image2, product_price, date, status)
        VALUES 
        ('$product_title', '$description', '$product_keyword', ' $product_category', 
        '$product_brand', '$product_image1', '$product_image2', '$product_price',
         NOW(), '$product_status')";

        $result_query = mysqli_query($conn, $insert_products);
        if ($result_query) {
            echo "<script>alert('Process Completed')</script>";
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin | Insert Products</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style>
        <?php
        productInsertStyles();


        ?>
    </style>
</head>

<body>

        
        

            <!-- form -->
            <form class="col-md-12" method="post" enctype="multipart/form-data">
                <h3 class="text-center">INSERT PRODUCTS</h3>
                <hr>
                <!-- title -->
                <div class="form-input m-auto">
                    <label for="product_title" class="form-label">Product Title :</label><br>
                    <input type="text" name="product_title" id="product_title" class="data-input" placeholder="Enter product title" autocomplete="off" required>
                </div>


                <!-- description -->
                <div class="form-input m-auto">
                    <label for="description" class="form-label">Product Description :</label><br>
                    <input type="text" name="description" id="description" class="data-input" placeholder="Enter product description" autocomplete="off" required>
                </div>

                <!-- keywords -->
                <div class="form-input m-auto">
                    <label for="product_keyword" class="form-label">Product keyword :</label><br>
                    <input type="text" name="product_keyword" id="product_keyword" class="data-input" placeholder="Enter product keyword" autocomplete="off" required>
                </div>

                <!-- categories -->
                <div class="form-input m-auto">
                    <select name="product_category" class="data-input">
                        <option value="">Select Category</option>
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
                        <!--  -->

                    </select>
                </div>
                <!-- brands -->
                <div class="form-input m-auto">
                    <select name="product_brand" class="data-input">
                        <option value="">Select Brand</option>
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
                        <!--  -->
                    </select>
                </div>

                <!-- Image -->
                <div class="form-input m-auto">
                    <label for="product_image1" class="form-label">Product Image 1 :</label><br>
                    <input type="file" name="product_image1" id="product_image1" class="data-input" required>
                </div>
                <!-- Image -->
                <div class="form-input m-auto">
                    <label for="product_image2" class="form-label">Product Image 2 :</label><br>
                    <input type="file" name="product_image2" id="product_image2" class="data-input" required>
                </div>

                <!-- Price -->
                <div class="form-input m-auto">
                    <label for="product_price" class="form-label">Product Price :</label><br>
                    <input type="text" name="product_price" id="product_price" class="data-input" placeholder="Enter product price" autocomplete="off" required>
                </div>
                <!-- Price -->
                <div class="form-input m-auto btn-contain">
                    <input type="submit" name="insert_product" class="button-sub btn btn-dark text-light mb-3 px-3 py-2" value="Insert Product">
                </div>
            </form>
   
</body>

</html>