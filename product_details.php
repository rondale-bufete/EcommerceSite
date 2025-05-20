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
    <title>Ecommerce Site | Product Details</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        <?php
        homeStyles();
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

        .small-img {
            border: 1px solid #ccc;
            margin: 5px;
            height: 100px;
            width: 120px;
            border-radius: 10px;
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

        <div class="row home-header bg-light text-light">

        </div>

        <!-- 1st-section -->
        <div class="row">
            <div class="my-2">
                <!-- <hr> -->
                <!-- <h3 class="text-center">OUR PRODUCTS</h3> -->
                <!-- <hr> -->
            </div>

            <!-- product-contents -->

            <div class="col-md-12">
                <div class="row px-1">

                    <?php
                    displayItemDetail()
                    ?>

                    <hr class="v-space">
                    <h4 class="text-center py-3">Related Products</h4>
                    <hr>

                    <!-- product queries -->
                    <?php
                    viewDetails();
                    getUniqueCategories();
                    getUniqueBrands();
                    ?>
                </div>
            </div>

        </div>




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