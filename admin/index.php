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
    <title>Admin</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            overflow-x: hidden;
        }

        .contain-bg {
            background-color: #f0f0f0;
        }

        .nav-main {
            padding-bottom: 20px;
            -webkit-box-shadow: 0px 4px 9px -3px rgba(0, 0, 0, 0.33);
            -moz-box-shadow: 0px 4px 9px -3px rgba(0, 0, 0, 0.33);
            box-shadow: 0px 4px 9px -3px rgba(0, 0, 0, 0.33);
        }

        .nav-right {
            display: flex;
        }

        .admin-logout {
            padding: 0.5rem 0.5rem;
            border-radius: 5px;
            text-decoration: none;
            font-weight: bolder;
            border: 2px solid #780101;
            color: #780101;
            margin-left: 20px;
            margin-right: 10px;
            transition: 100ms;
        }

        .admin-logout:hover {
            background-color: #780101;
            color: #fff;
            transition: 100ms;
        }

        .admin-logout:active {
            font-weight: bold;
            border-color: #fff;

            color: #fff;
        }

        .head {
            margin-top: 25px;
        }

        .logo {
            width: 70px;
            height: 70px;
            margin-left: 20px
        }

        .col-2 {
            padding: 7vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .admin-image {
            width: 50px;
            margin: auto;
            object-fit: contain;
        }

        .sub-div {
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
        }

        .admin-buttons {
            padding: 0.6rem 0.5rem;
            border-radius: 5px;
            text-decoration: none;
            background-color: #ccc;
            color: #000;
            margin: 2px;
            transition: 100ms;
        }

        .admin-buttons:hover {
            background-color: #000;
            color: #fff;
            border-color: #fff;
            transition: 100ms;
        }

        <?php footerStyles() ?>
    </style>
</head>

<body>

    <!-- navbar -->
    <div class="container-fluid p-0 bg-tertiary">
        <nav class="navbar navbar-expand-lg navbar-light bg-tertiary nav-main">
            <div class="container-fluid">
                <img src="../images/pclogo.png" alt="" class="logo">
                <nav class="navbar navbar-expand-lg">
                    <ul class="navbar-nav">
                        <li class="nav-item nav-right">
                            <a class='nav-link mx-4 text-center' href='#'><?php echo $_SESSION['admin_username'] ?><i class='fa-solid fa-user mx-1'></i></a>
                            <a href="logout.php" class="admin-logout">Logout</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </nav>


        <!-- welcome-message -->
        <div class="bg-light head">
            <h3 class="text-center p-2">
                MANAGE CONTENTS
            </h3>
        </div>

        <div class="row bg-dark p-1 d-flex align-items-center">

            <!-- <div class="col-md-2 align-items-center col-2">
                <div class="sub-div">
                    <a href="#"><img src="../images/admin.png" alt="" class="admin-image"></a>
                    <p class="text-light">Admin Name</p>
                </div>
            </div> -->

            <div class="col-md-12 button text-center col-2">
                <a href="index.php?insert_products" class="admin-buttons">Insert Products</a>
                <a href="index.php?view_products" class="admin-buttons">View Products</a>
                <a href="index.php?insert_category" class="admin-buttons">Insert Category</a>
                <a href="index.php?view_categories" class="admin-buttons">View Categories</a></button>
                <a href="index.php?insert_brands" class="admin-buttons">Insert Brands</a>
                <a href="index.php?view_brands" class="admin-buttons">View Brands</a>
                <a href="index.php?list_orders" class="admin-buttons">All Orders</a>
                <a href="index.php?list_payments" class="admin-buttons">All Payments</a>
                <a href="index.php?list_users" class="admin-buttons">List Users</a>
            </div>

        </div>




        <!-- insert_category -->
        <div class="container my-5" style="min-height: 50vh; height: auto;">
            <?php
            if (isset($_GET['insert_products'])) {
                include('insert_products.php');
            }
            if (isset($_GET['insert_category'])) {
                include('insert_categories.php');
            }
            if (isset($_GET['insert_brands'])) {
                include('insert_brands.php');
            }
            if (isset($_GET['view_products'])) {
                include('view_products.php');
            }
            if (isset($_GET['edit_product'])) {
                include('edit_product.php');
            }
            if (isset($_GET['delete_product'])) {
                include('delete_product.php');
            }
            if (isset($_GET['view_categories'])) {
                include('view_categories.php');
            }
            if (isset($_GET['view_brands'])) {
                include('view_brands.php');
            }
            if (isset($_GET['edit_category'])) {
                include('edit_category.php');
            }
            if (isset($_GET['edit_brand'])) {
                include('edit_brand.php');
            }
            if (isset($_GET['delete_category'])) {
                include('delete_category.php');
            }
            if (isset($_GET['delete_brand'])) {
                include('delete_brand.php');
            }
            if (isset($_GET['list_orders'])) {
                include('list_orders.php');
            }
            if (isset($_GET['delete_order'])) {
                include('delete_order.php');
            }
            if (isset($_GET['list_payments'])) {
                include('list_payments.php');
            }
            if (isset($_GET['delete_transaction'])) {
                include('delete_transaction.php');
            }
            if (isset($_GET['list_users'])) {
                include('list_users.php');
            }
            if (isset($_GET['delete_user'])) {
                include('delete_user.php');
            }
            ?>
        </div>




        <!-- footer -->
        <?php include('../includes/admin_footer.php') ?>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>