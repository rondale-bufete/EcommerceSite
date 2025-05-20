<?php

function displayItemDetail()
{
    global $conn;
    if (isset($_GET['product_id'])) {
        if (!isset($_GET['category'])) {
            if (!isset($_GET['brand'])) {
                $product_id = $_GET['product_id'];
                $product_select = "SELECT * from `products` WHERE product_id = $product_id";
                $result_query = mysqli_query($conn, $product_select);
                // $row = mysqli_fetch_assoc($result_query);
                $row = mysqli_fetch_assoc($result_query);
                $product_id = $row['product_id'];
                $product_title = $row['product_title'];
                $product_description = $row['product_description'];
                $category_id = $row['category_id'];
                $brand_id = $row['brand_id'];
                $image = $row['image1'];
                $image2 = $row['image2'];
                $product_price = $row['product_price'];
                echo "
                    <div class='col-md-6 m-auto'>
                        <img src='./admin/products/$image' id='ProductImg' class='card-img-top' alt='$product_title' width='100%'>
                        <div class='small-img-row'>
                            <div class='small-img-col'>
                                <img src='./admin/products/$image' width='100%' class='small-img'>
                            </div>
                            <div class='small-img-col'>
                                <img src='./admin/products/$image2' width='100%' class='small-img'>
                            </div>
                        </div>

                    </div>
                    <div class='col-md-6 m-auto single-product'>
                        <h1 class='product-name item-name'>$product_title</h1>
                        <h4 class='mb-2'>Price: ₱$product_price</h4>
                        <div class='card-button2'>
                            <a href='index.php?add-to-cart=$product_id' class='add-to-cart2'>Add to cart</a>
                        </div>
                        <hr>
                        <h3 class='mt-3'>Product Details</h3>
                        <p class='p-description'>$product_description</p>
                        <br>
                    </div>
                    ";
            }
        }
    }
}

function viewDetails()
{
    global $conn;
    if (isset($_GET['product_id'])) {
        if (!isset($_GET['category'])) {
            if (!isset($_GET['brand'])) {
                $product_id = $_GET['product_id'];
                $product_select = "SELECT * from `products` ORDER BY rand() LIMIT 0,4";
                $result_query = mysqli_query($conn, $product_select);
                // $row = mysqli_fetch_assoc($result_query);
                while ($row = mysqli_fetch_assoc($result_query)) {
                    $product_id = $row['product_id'];
                    $product_title = $row['product_title'];
                    $product_description = $row['product_description'];
                    $category_id = $row['category_id'];
                    $brand_id = $row['brand_id'];
                    $image = $row['image1'];
                    $image2 = $row['image2'];
                    $product_price = $row['product_price'];
                    echo "
                        <div class='col-md-3 mb-2'>
                            <a href='product_details.php?product_id=$product_id' class='card-link text-dark'>
                                <div class='card bg-tertiary text-dark'>
                                    <img src='./admin/products/$image' class='card-img-top' alt='$product_title'>
                                    <div class='card-body'>
                                        <h5 class='card-title product-name'>$product_title</h5>
                                        <p class='card-text mb-2'>Price: ₱$product_price</p>
                                        <div class='card-button'>
                                            <a href='product_details.php?add-to-cart=$product_id' class='add-to-cart'>Add to cart</a>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    ";
                }
            }
        }
    }
}

function cartFunction_all()
{
    if (isset($_GET['add-to-cart'])) {
        global $conn;
        $ip = getIPAddress();

        $get_product_id = $_GET['add-to-cart'];
        $select_query = "SELECT * from `cart` WHERE ip_address = '$ip' AND product_id = $get_product_id";
        $result_query = mysqli_query($conn, $select_query);

        $num_of_rows = mysqli_num_rows($result_query);
        if ($num_of_rows > 0) {
            echo "<script>alert('YOU ALREADY HAVE ADDED THIS TO YOUR CART.')</script>";
            echo "<script>window.open('index.php')</script>";
        } else {
            $insert_query = "INSERT INTO `cart` 
                (product_id, ip_address, quantity) 
                VALUES ($get_product_id, '$ip', 0)";
            $result_query = mysqli_query($conn, $insert_query);
            echo "<script>alert('ITEM ADDED TO CART.')</script>";
            echo "<script>window.open('all_products.php')</script>";
        }
    }
}
