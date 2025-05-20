 <?php

    // include('./includes/dbconnect.php');

    // ----------------------------------------
    function getHomeProducts()
    {
        global $conn;
        if (!isset($_GET['category'])) {
            if (!isset($_GET['brand'])) {
                $product_select = "SELECT * from `products` ORDER BY rand() LIMIT 0,9";
                $result_query = mysqli_query($conn, $product_select);
                // $row = mysqli_fetch_assoc($result_query);
                while ($row = mysqli_fetch_assoc($result_query)) {
                    $product_id = $row['product_id'];
                    $product_title = $row['product_title'];
                    $product_description = $row['product_description'];
                    $category_id = $row['category_id'];
                    $brand_id = $row['brand_id'];
                    $image = $row['image1'];
                    $product_price = $row['product_price'];
                    echo "
                        <div class='col-md-3 mb-3'>
                            <a href='product_details.php?product_id=$product_id' class='card-link text-dark'>
                                <div class='card bg-tertiary text-dark'>
                                    <img src='./admin/products/$image' class='card-img-top' alt='$product_title'>
                                    <div class='card-body'>
                                        <h5 class='card-title product-name'>$product_title</h5>
                                        <p class='card-text mb-2'>Price: ₱$product_price</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    ";
                }
            }
        }
    }

    // ----------------------------------------
    function getAllProducts()
    {
        global $conn;
        if (!isset($_GET['category'])) {
            if (!isset($_GET['brand'])) {
                $product_select = "SELECT * from `products` ORDER BY rand()";
                $result_query = mysqli_query($conn, $product_select);
                // $row = mysqli_fetch_assoc($result_query);
                while ($row = mysqli_fetch_assoc($result_query)) {
                    $product_id = $row['product_id'];
                    $product_title = $row['product_title'];
                    $product_description = $row['product_description'];
                    $category_id = $row['category_id'];
                    $brand_id = $row['brand_id'];
                    $image = $row['image1'];
                    $product_price = $row['product_price'];
                    echo "
                        <div class='col-md-3 mb-4'>
                            <a href='product_details.php?product_id=$product_id' class='card-link text-dark'>
                                <div class='card bg-kight text-dark'>
                                    <img src='./admin/products/$image' class='card-img-top' alt='$product_title'>
                                    <div class='card-body'>
                                        <h5 class='card-title product-name'>$product_title</h5>
                                        <p class='card-text mb-2'>Price: ₱$product_price</p>
                                        <div class='card-button'>
                                        <a href='index.php?add-to-cart=$product_id' class='add-to-cart'>Add to cart</a>
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




    // ----------------------------------------
    function getUniqueCategories()
    {
        global $conn;
        if (isset($_GET['category'])) {
            $category_id = $_GET['category'];

            $product_select = "SELECT * from `products` WHERE category_id=$category_id";
            $result_query = mysqli_query($conn, $product_select);

            $category_select = "SELECT * from `categories` WHERE category_id=$category_id";
            $cat_query = mysqli_query($conn, $category_select);

            $num_of_rows = mysqli_num_rows($result_query);
            if ($num_of_rows == 0) {
                $category_title = mysqli_fetch_assoc($cat_query)['category_title'];
                echo "<h2 class='text-danger text-center'>No available products for '$category_title'</h2>";
            }

            while ($row = mysqli_fetch_assoc($result_query)) {
                $product_id = $row['product_id'];
                $product_title = $row['product_title'];
                $product_description = $row['product_description'];
                $category_id = $row['category_id'];
                $brand_id = $row['brand_id'];
                $image = $row['image1'];
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
                                        <a href='index.php?add-to-cart=$product_id' class='add-to-cart'>Add to cart</a>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                ";
            }
        }
    }


    // ----------------------------------------
    function getUniqueBrands()
    {
        global $conn;
        if (isset($_GET['brand'])) {
            $brand_id = $_GET['brand'];

            $product_select = "SELECT * from `products` WHERE brand_id=$brand_id";
            $result_query = mysqli_query($conn, $product_select);

            $br_select = "SELECT * from `brands` WHERE brand_id=$brand_id";
            $br_query = mysqli_query($conn, $br_select);

            $num_of_rows = mysqli_num_rows($result_query);
            if ($num_of_rows == 0) {
                $br_title = mysqli_fetch_assoc($br_query)['brand_title'];
                echo "<h2 class='text-danger text-center'>No available products for '$br_title'</h2>";
            }

            while ($row = mysqli_fetch_assoc($result_query)) {
                $product_id = $row['product_id'];
                $product_title = $row['product_title'];
                $product_description = $row['product_description'];
                $category_id = $row['category_id'];
                $brand_id = $row['brand_id'];
                $image = $row['image1'];
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
                                        <a href='index.php?add-to-cart=$product_id' class='add-to-cart'>Add to cart</a>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                ";
            }
        }
    }






    // ----------------------------------------
    function getBrands()
    {
        global $conn;
        $select_brands = "SELECT * from `brands`";
        $brand_result = mysqli_query($conn, $select_brands);
        while ($row_data = mysqli_fetch_assoc($brand_result)) {
            $brand_title = $row_data['brand_title'];
            $brand_id = $row_data['brand_id'];
            echo "<li class='nav-item list-bar px-4'><a href='index.php?brand=$brand_id' class='nav-link text-light'>$brand_title</a></li>";
        }
    }

    // ----------------------------------------
    function getCategories()
    {
        global $conn;
        $select_category = "SELECT * from `categories`";
        $cat_result = mysqli_query($conn, $select_category);
        while ($row_data = mysqli_fetch_assoc($cat_result)) {
            $category_title = $row_data['category_title'];
            $category_id = $row_data['category_id'];
            echo "<li class='nav-item list-bar px-4'><a href='index.php?category=$category_id' class='nav-link text-light'>$category_title</a></li>";
        }
    }

    function getBrandsForAllProducts()
    {
        global $conn;
        $select_brands = "SELECT * from `brands`";
        $brand_result = mysqli_query($conn, $select_brands);
        while ($row_data = mysqli_fetch_assoc($brand_result)) {
            $brand_title = $row_data['brand_title'];
            $brand_id = $row_data['brand_id'];
            echo "<li class='nav-item list-bar px-4'><a href='all_products.php?brand=$brand_id' class='nav-link text-light'>$brand_title</a></li>";
        }
    }

    // ------------------------------------

    function getCategoryForAllProducts()
    {
        global $conn;
        $select_category = "SELECT * from `categories`";
        $cat_result = mysqli_query($conn, $select_category);
        while ($row_data = mysqli_fetch_assoc($cat_result)) {
            $category_title = $row_data['category_title'];
            $category_id = $row_data['category_id'];
            echo "<li class='nav-item list-bar px-4'><a href='all_products.php?category=$category_id' class='nav-link text-light'>$category_title</a></li>";
        }
    }
    //SEARCH -------------------------------
    function searchProduct()
    {
        global $conn;
        if (isset($_GET['search_data'])) {
            $item_searched = $_GET['search_item'];
            $search_query = "SELECT * from  `products` WHERE product_keywords LIKE '%$item_searched%'";
            $result_query = mysqli_query($conn, $search_query);

            $num_of_rows = mysqli_num_rows($result_query);
            if ($num_of_rows == 0) {
                echo "<h2 class='text-danger text-center'>No Results Found.</h2>";
            }

            while ($row = mysqli_fetch_assoc($result_query)) {
                $product_id = $row['product_id'];
                $product_title = $row['product_title'];
                $product_description = $row['product_description'];
                $category_id = $row['category_id'];
                $brand_id = $row['brand_id'];
                $image = $row['image1'];
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
                                        <a href='index.php?add-to-cart=$product_id' class='add-to-cart'>Add to cart</a>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            ";
            }
        }
    }




    // ---------------------------------

    function getIPAddress()
    {
        //whether ip is from the share internet  
        if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
            $ip = $_SERVER['HTTP_CLIENT_IP'];
        }
        //whether ip is from the proxy  
        elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        }
        //whether ip is from the remote address  
        else {
            $ip = $_SERVER['REMOTE_ADDR'];
        }
        return $ip;
    }
    // $ip = getIPAddress();
    // echo 'User Real IP Address - ' . $ip;




    function cartFunction()
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
                echo "<script>window.open('index.php', '_self')</script>";
            } else {
                $insert_query = "INSERT INTO `cart` 
                (product_id, ip_address, quantity) 
                VALUES ($get_product_id, '$ip', 1)";
                $result_query = mysqli_query($conn, $insert_query);
                echo "<script>alert('ITEM ADDED TO CART.')</script>";
                echo "<script>window.open('index.php', '_self')</script>";
            }
        }
    }


    function getCartNum()
    {
        if (isset($_GET['add-to-cart'])) {
            global $conn;
            $ip = getIPAddress();
            $select_query = "SELECT * from `cart` WHERE ip_address = '$ip'";
            $result_query = mysqli_query($conn, $select_query);
            $count_cart_items = mysqli_num_rows($result_query);
        } else {
            global $conn;
            $ip = getIPAddress();
            $select_query = "SELECT * from `cart` WHERE ip_address = '$ip'";
            $result_query = mysqli_query($conn, $select_query);
            $count_cart_items = mysqli_num_rows($result_query);
        }
        echo "$count_cart_items";
    }



    function totalCartPrice()
    {
        global $conn;
        $ip = getIPAddress();

        $total_price = 0;
        $cart_query = "SELECT * from `cart` WHERE ip_address = '$ip'";
        $result = mysqli_query($conn, $cart_query);
        while ($row = mysqli_fetch_array($result)) {
            $product_id = $row['product_id'];
            $select_products = "SELECT * from `products` WHERE product_id = '$product_id'";
            $product_result = mysqli_query($conn, $select_products);
            while ($row_price = mysqli_fetch_array($product_result)) {
                $product_price = array($row_price['product_price']);
                $product_price_sum = array_sum($product_price);
                $total_price += $product_price_sum;
            }
        }
        echo $total_price;
    }



    // -------------
    function getOrderDetails()
    {
        global $conn;
        $username = $_SESSION['username'];
        $get_details = "SELECT * from `users` WHERE username = '$username'";
        $result_query = mysqli_query($conn, $get_details);
        while ($fetch_row = mysqli_fetch_array($result_query)) {
            $user_id = $fetch_row['user_id'];
            if (!isset($_GET['edit_account'])) {
                if (!isset($_GET['my_orders'])) {
                    if (!isset($_GET['delete_account'])) {
                        $get_orders = "SELECT * from `orders` WHERE user_id = $user_id 
                        AND order_status = 'pending'";
                        $orders_query = mysqli_query($conn, $get_orders);
                        $row_count = mysqli_num_rows($orders_query);
                        if ($row_count > 0) {
                            echo "<h2 class='text-center my-5'>YOU CURRENTLY HAVE <span class='text-danger'>$row_count</span> PENDING ORDERS.</h2>";
                            echo "<p class='text-center'><a href='user_profile.php?my_orders' class='check-orders-btn'>CHECK ORDER DETAILS</a></p>";
                        } else {
                            echo "<h2 class='text-center my-5'>YOU HAVE NO PENDING ORDERS.</h2>";
                            echo "<p class='text-center'><a href='../index.php' class='check-orders-btn'>BROWSE STORE</a></p>";
                        }
                    }
                }
            }
        }
    }
    ?>


