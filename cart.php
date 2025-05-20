<?php
include('includes/dbconnect.php');
include('common/functions.php');
include('common/styles.php');
include('common/item_details_func.php');
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ecommerce Site | Cart</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        <?php
        homeStyles();
        cartStyles();
        ?>.small-img-row {
            display: flex;
            justify-content: center;
        }

        .small-img-col {
            flex-basis: 20%;
            cursor: pointer;
        }

        .item-name {
            font-size: 4rem;
        }

        .single-product h4 {
            margin: 20px 0;
            font-size: 22px;
            font-weight: bold;
            color: grey;
        }

        .single-product p {
            text-align: justify;
        }

        .single-product li {
            margin-left: 15px;
            color: #555;
            font-style: italic;
        }
    </style>
</head>

<body>
    <!-- navbar -->
    <div class="container-fluid p-0">
        <nav class="navbar navbar-expand-lg navbar-light bg-light sticky px-2 py-3">
            <div class="container-fluid">
                <img src="./images/pclogo.png" alt="" class="logo mx-3">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarScroll">
                    <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
                        <li class="nav-item">
                            <a class="nav-link nav-btn" aria-current="page" href="index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link nav-btn" href="all_products.php">Products</a>
                        </li>
                        <?php
                        if (!isset($_SESSION['username'])) {
                            echo " 
                            <li class='nav-item'>
                                <a class='nav-link nav-btn' href='users/accounts.php'>Accounts</a>
                            </li>";
                        } else {
                            echo "
                            <li class='nav-item'>
                                <a class='nav-link nav-btn' href='users/user_profile.php'>Accounts</a>
                            </li>";
                        }
                        ?>
                        <li class="nav-item">
                            <a class="nav-link nav-btn" href="contact.php">Contact</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link nav-btn active-nav" href="cart.php"><i class="fa-solid fa-cart-shopping cart-size"></i><sup style="font-weight: 500; color: red; font-size: 16px;"><?php getCartNum(); ?></sup></a>
                        </li>
                    </ul>
                    <form action="search_product.php" method="get" class="d-flex" role="search">
                        <div class="div" style="width: 100%"></div>

                        <?php

                        if (!isset($_SESSION['username'])) {
                            echo "<a class='nav-link mx-4 text-center' href='#'> <i class='fa-solid fa-user mx-1'></i>Guest</a>";
                        } else {
                            echo "<a class='nav-link mx-4 text-center' href='#'><i class='fa-solid fa-user mx-1'></i>" . $_SESSION['username'] . "</a>";
                        }

                        if (!isset($_SESSION['username'])) {
                            echo "<a class='mx-1 login-btn' href='users/user_login.php'>Login</a>";
                        } else {
                            echo "<a class='logout-btn' href='users/logout.php'>Logout</a>";
                        }

                        ?>
                    </form>
                </div>
            </div>
        </nav>
        <?php cartFunction(); ?>
        <!-- sec-nav -->
        <div class="row home-header bg-light text-light ">

        </div>


        <div class="small-container cart-page">
            <div class="row">
                <form action="" method="post">
                    <table>

                        <?php
                        global $conn;

                        $ip = getIPAddress();
                        $total_price = 0;
                        $cart_query = "SELECT * from `cart` WHERE ip_address = '$ip'";
                        $result = mysqli_query($conn, $cart_query);

                        $count_result = mysqli_num_rows($result);
                        if ($count_result > 0) {
                            echo "
                            <thead>
                                <th></th>
                                <th>Product</th>
                                <th>Quantity</th>
                                <th>Subtotal</th>

                                <th colspan='2'>Operations</th>
                            </thead>
                            <tbody>
                        ";

                            while ($row = mysqli_fetch_array($result)) {
                                $product_id = $row['product_id'];
                                $select_products = "SELECT * from `products` WHERE product_id = $product_id";
                                $product_result = mysqli_query($conn, $select_products);
                                while ($row_price = mysqli_fetch_array($product_result)) {
                                    $product_price = array($row_price['product_price']);
                                    $price_table = $row_price['product_price'];
                                    $product_title = $row_price['product_title'];
                                    $pr_image = $row_price['image1'];
                                    $product_price_sum = array_sum($product_price);
                                    $total_price += $product_price_sum;

                                    if (isset($_POST['update_cart'])) {
                                        $quantity = $_POST['quantities'];
                                        $update_cart = "UPDATE `cart` SET quantity = $quantity WHERE ip_address = '$ip'";
                                        $quantity_result = mysqli_query($conn, $update_cart);
                                        $total_price = $total_price * $quantity;
                                    }

                        ?>
                                    <tr>
                                        <td class="text-center"><input type="checkbox" name="removeitem[]" value="<?php echo $product_id ?>"></td>
                                        <td>
                                            <div class="cart-info">
                                                <img src="./admin/products/<?php echo $pr_image; ?>">
                                                <div>
                                                    <h5><?php echo $product_title; ?></h5>
                                                    <?php
                                                    if (isset($_POST['quantities'])) {
                                                        echo "<small>Quantity: $quantity</small><br>";
                                                    }
                                                    ?>

                                                    <small>Price: ₱<?php echo $price_table; ?></small>
                                                    <br>
                                                </div>
                                            </div>
                                        </td>

                                        <td class="text-center"><input type="number" min="1" max="99" value="<?php echo isset($quantity) ? $quantity : 1; ?>" name="quantities"></td>



                                        <td class="text-center">₱<?php echo $price_table; ?></td>
                                        <td class="text-center">
                                            <button type="submit" class="add-to-cart update-btn" name="update_cart">UPDATE</button>
                                        </td>
                                    </tr>
                                    <!-- close functions -->
                        <?php    }
                            }
                        } else {
                            echo "<h2 class='text-center mt-5'>CART IS EMPTY</h2>";
                        }  ?>
                        <!--  -->
                        </tbody>
                    </table>
                    <div class="total-price">
                        <?php

                        $ip = getIPAddress();
                        $cart_query = "SELECT * from `cart` WHERE ip_address = '$ip'";
                        $result = mysqli_query($conn, $cart_query);

                        $count_result = mysqli_num_rows($result);
                        if ($count_result > 0) {
                            echo "
                                <table>
                                    <tr>
                                        <td>
                                            <h4>TOTAL: </h4>
                                        </td>
                                        <td>
                                            <h3>₱$total_price</h3>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><button type='submit' class='add-to-cart remove-btn' name='remove_cart'>REMOVE CHECKED ITEMS</button></td>
                                        <td>
                                            <button href='./users/checkout.php' type='submit' class='add-to-cart checkout-btn text-light' name='checkout_page'>CHECKOUT</button>
                                        </td>
                                    </tr>
                                </table>
                                
                            ";
                            if (isset($_POST['checkout_page'])) {
                                echo "<script>window.open('users/checkout.php', '_self')</script>";
                            }
                        } else {
                            echo "<a href=''><button class='add-to-cart' name='continue_shopping'>Continue Shopping</button></a>";

                            if (isset($_POST['continue_shopping'])) {
                                echo "<script>window.open('all_products.php', '_self')</script>";
                            }
                        }
                        ?>

                    </div>
                </form>
            </div>


        </div>

        <?php

        function removeData()
        {
            global $conn;
            if (isset($_POST['remove_cart'])) {
                foreach ($_POST['removeitem'] as $remove_id) {
                    echo $remove_id;
                    $delete_query = "DELETE from `cart` WHERE product_id = $remove_id";
                    $run_delete = mysqli_query($conn, $delete_query);
                    if ($run_delete) {
                        echo "<script>window.open('cart.php', '_self')</script>";
                    }
                }
            }
        }
        echo $remove_item = removeData();

        ?>

        <!-- footer -->
        <?php
        include('./includes/footer.php')
        ?>



    </div>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script>
        var ProductImg = document.getElementById("ProductImg");
        var smallImg = document.getElementsByClassName("small-img");

        smallImg[0].onclick = function() {
            ProductImg.src = smallImg[0].src;
        }
        smallImg[1].onclick = function() {
            ProductImg.src = smallImg[1].src;
        }
        smallImg[2].onclick = function() {
            ProductImg.src = smallImg[2].src;
        }
        smallImg[3].onclick = function() {
            ProductImg.src = smallImg[3].src;
        }
    </script>
</body>

</html>

<!-- PART 20/84 -->