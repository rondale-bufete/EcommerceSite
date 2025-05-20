<?php
include('../includes/dbconnect.php');
include('../common/functions.php');
include('../common/styles.php');
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Welcome <?php echo $_SESSION['username'] ?></title>
    <style>
        <?php homeStyles() ?>
        /*  */

        .main-container {
            height: auto;
            padding: 0;
            width: 100%;

        }

        .profile-head {
            height: auto;
            padding-bottom: 25px;
        }

        .profile {
            margin-top: 2%;
            height: 80%;
            justify-content: center;
            align-items: center;

        }

        .p-img {
            height: 250px;
            width: 250px;
            margin: auto;
            border-radius: 50%;
            object-fit: fill;
            border: 1px solid rgba(120, 55, 0, 1);
            -webkit-box-shadow: 0px 2px 15px 1px rgba(120, 14, 0, 1);
            -moz-box-shadow: 0px 2px 15px 1px rgba(120, 14, 0, 1);
            box-shadow: 0px 2px 15px 1px rgba(120, 14, 0, 1);
        }

        .profile-nav {
            border: 1px solid #fff;
            text-align: left;
        }

        .profile-list {
            margin-left: 10%;
        }

        .profile-image {
            border-radius: 50%;
        }

        .name {
            font-size: 2rem;
        }

        .top-list {
            border-bottom: 1px solid #ff523b;
        }

        .profile-item a {
            text-decoration: none;
            color: #fff;

        }

        .manage-btn {
            width: 100%;
            padding-left: 35px;
            margin-bottom: 5px;
        }

        .manage-btn:hover {
            background-color: #ff523b;
        }

        .check-orders-btn {
            background-color: #ff523b;
            margin-top: 10px;
            text-decoration: none;
            color: #fff;
            border: 1px solid white;
            border-radius: 10px;
            padding: 15px 25px;
            font-weight: bolder;
            transition: 200ms;
        }

        .check-orders-btn:hover {
            background-color: #fff;
            color: #ff523b;
            font-weight: bolder;
            border: 1px solid #ff523b;
            transition: 200ms;
        }

        .check-orders-btn:active {
            background-color: #ff523b;
            margin-top: 10px;
            text-decoration: none;
            color: #fff;
            border: 1px solid white;
            border-radius: 10px;
            padding: 15px 25px;
            font-weight: bolder;

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
                            <a class="nav-link nav-btn" aria-current="page" href="../index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link nav-btn" href="../all_products.php">Products</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link nav-btn active-nav" href="accounts.php">Accounts</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link nav-btn" href="../contact.php">Contact</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link nav-btn" href="../cart.php"><i class="fa-solid fa-cart-shopping cart-size"></i><sup style="font-weight: 500; color: red; font-size: 16px;"><?php getCartNum(); ?></sup></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link nav-btn" href="../cart.php">: ₱<?php totalCartPrice(); ?></a>
                        </li>
                    </ul>
                    <form action="search_product.php" method="get" class="d-flex" role="search">
                        <div class="div" style="width: 100%"></div>

                        <?php

                        if (!isset($_SESSION['username'])) {
                            echo "<a class='nav-link mx-4 text-center active-nav' href='#'> <i class='fa-solid fa-user mx-1'></i>Guest</a>";
                        } else {
                            echo "<a class='nav-link mx-4 text-center active-nav' href='#'><i class='fa-solid fa-user mx-1'></i>" . $_SESSION['username'] . "</a>";
                        }

                        if (!isset($_SESSION['username'])) {
                            echo "<a class='mx-1 login-btn' href='users/user_login.php'>Login</a>";
                        }

                        ?>
                    </form>
                </div>
            </div>
        </nav>

        <div class="" style="height: 3vh;"></div>
        <div class="bg-light mt-5 pt-4 main-container">


            <div class="row profile-head bg-dark">
                <div class="col-md-2"></div>
                <div class="col-md-4 profile profile-image">
                    <!--  -->
                    <?php
                    $username = $_SESSION['username'];
                    $profile = "SELECT * from `users` WHERE username='$username'";
                    $fetch_item = mysqli_query($conn, $profile);
                    $item_row = mysqli_fetch_array($fetch_item);
                    $user_image = $item_row['user_image'];
                    $user_email = $item_row['user_email'];
                    $user_contact = $item_row['user_phone'];
                    $user_address = $item_row['user_address'];
                    echo "<img src='./user_images/$user_image' class='p-img'>";
                    ?>


                </div>
                <div class="col-md-6 profile">
                    <ul class="profile-list">
                        <li class="profile-item name">
                            <a class="" href="#"><?php echo $_SESSION['username'] ?></a>
                        </li><br>
                        <li class="profile-item">
                            <a class="" href="#"><?php echo $user_email ?></a>
                        </li><br>
                        <li class="profile-item">
                            <a class="" href="#"><?php echo $user_contact ?></a>
                        </li><br>
                        <li class="profile-item">
                            <a class="" href="#"><?php echo $user_address ?></a>
                        </li>
                    </ul>
                </div>

            </div>


            <div class="row">
                <div class="col-md-3 bg-tertiary mt-5">
                    <ul class="navbar-nav bg-dark py-4" style="height: 50vh;">
                        <li class="nav-item top-list">
                            <a class="nav-link nav-btn text-light text-center" href="#">
                                <h5>MANAGE ACCOUNT</h5>
                            </a>
                        </li>
                        <li class="nav-item mt-4">
                            <a class="nav-link nav-btn text-light manage-btn" href="user_profile.php">Pending Orders</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link nav-btn text-light manage-btn" href="user_profile.php?edit_account">Edit Account</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link nav-btn text-light manage-btn" href="user_profile.php?my_orders">My Orders</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link nav-btn text-light manage-btn" href="user_profile.php?delete_account">Delete Account</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link nav-btn text-light manage-btn" href="logout.php">LOGOUT</a>
                        </li>

                    </ul>
                </div>
                <div class="col-md-9 bg-light mt-5">
                    <?php getOrderDetails();
                    if (isset($_GET['edit_account'])) {
                        include('edit_account.php');
                    } else if (isset($_GET['my_orders'])) {
                        include('my_orders.php');
                    } else if (isset($_GET['delete_account'])) {
                        include('delete_account.php');
                    }


                    ?>
                </div>
            </div>

        </div>

    </div>


    <!-- footer -->
    <?php
    include('../includes/footer.php')
    ?>
    </div>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>

</html>