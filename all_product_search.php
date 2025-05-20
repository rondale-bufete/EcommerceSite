<?php
include('includes/dbconnect.php');
include('common/functions.php');
include('common/styles.php');
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ecommerce Site | Search Result</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        <?php
        homeStyles()
        ?>
        .all-products h3 {
            color: #ff523b;
            font-weight: 400;
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
                            <a class="nav-link nav-btn active-nav" href="all_products.php">Products</a>
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
                            <a class="nav-link nav-btn" href="cart.php"><i class="fa-solid fa-cart-shopping cart-size"></i><sup style="font-weight: 500; color: red; font-size: 16px;"><?php getCartNum(); ?></sup></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link nav-btn" href="cart.php">: ₱<?php totalCartPrice(); ?></a>
                        </li>
                    </ul>
                    <form class="d-flex" role="search" action="all_product_search.php" method="get">
                        <input class="search-bar me-1 form-control" type="search" name="search_item" placeholder="Search" aria-label="Search">
                        <!-- <button class="btn search-button" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button> -->
                        <input type="submit" value="Search" name="search_data" class="btn btn-outline-secondary search-button">
                        <?php

                        if (!isset($_SESSION['username'])) {
                            echo "<a class='nav-link mx-4 text-center' href='#'><i class='fa-solid fa-user mx-1'></i> Guest</a>";
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
        <!-- sec-nav -->
        <div class="row home-header bg-dark text-light pb-3 all-products">
            <div class="col-md-12 text-center">
                <h3>ALL PRODUCTS</h3>
            </div>
        </div>
    </div>
    <!-- <nav class="navbar navbar-expand-lg navbar-dark bg-secondary sticky text-right">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#">Welcome User</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Login</a>
                </li>
            </ul>
        </nav> -->


    <!-- 1st-section -->
    <div class="row">
        <div class="my-2">
            <hr>
            <!-- <h3 class="text-center">OUR PRODUCTS</h3> -->
            <hr>
        </div>

        <!-- product-contents -->
        <div class="col-md-10">
            <div class="row px-1">
                <!-- product queries -->
                <?php
                searchProduct();
                getUniqueCategories();
                getUniqueBrands();
                ?>
            </div>
        </div>


        <!-- side-bar -->
        <div class="col-md-2 bg-dark mb-2 p-0 rounded">
            <!-- Brands -->
            <ul class="navbar-nav me-auto">

                <li class="nav-item bg-tertiary brand-head">
                    <a href="#" class="nav-link text-light text-center">
                        <h5 class="mt-2">BRANDS</h5>
                    </a>
                </li>
                <!-- display function-->
                <?php
                getBrands();
                ?>
                <!--  -->
            </ul>

            <!-- categories -->
            <ul class="navbar-nav me-autor">

                <li class="nav-item bg-tertiary brand-head">
                    <a href="#" class="nav-link text-light text-center">
                        <h5 class="mt-2">CATEGORIES</h5>
                    </a>
                </li>
                <!-- display function-->
                <?php
                getCategories();
                ?>
                <!--  -->
            </ul>
        </div>
    </div>




    <!-- footer -->
    <?php
    include('./includes/footer.php')
    ?>



    </div>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>

</html>

<!-- VIDEO 18/84 -->