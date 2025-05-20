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
    <title>Ecommerce Site | Payments</title>
    <style>
        <?php homeStyles() ?>

        /*  */
        .cn {
            height: 90vh;
        }

        .p-logo img {
            width: 35%;
            height: 20vh;
            margin: auto;
            object-fit: contain;
            transition: 200ms;
        }

        .p-logo img:hover {
            transform: translateY(-5px);
        }

        img:active {
            transform: translateY(0px);
        }

        .footer {
            margin-top: 0;
        }

        .gcash:hover {
            filter: drop-shadow(0px 0px 14px #0341fc);
            transform: translateY(-5px);
            transition: 200ms;
        }

        .paypal:hover {
            filter: drop-shadow(0px 0px 14px #4775ff);
            transition: 200ms;
        }

        .maya:hover {
            filter: drop-shadow(0px 0px 14px #017a05);
            transition: 200ms;
        }

        .cliqq:hover {
            filter: drop-shadow(0px 0px 14px #f75f00);
            transition: 200ms;
        }

        .p-logo .cod {
            width: 100%;
        }

        .cod:hover {
            filter: drop-shadow(0px 0px 14px #610301);
            transition: 200ms;
            transform: translateY(-5px);
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
                            <a class="nav-link nav-btn" href="accounts.php">Accounts</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link nav-btn" href="../contact.php">Contact</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link nav-btn active-nav" href="../cart.php"><i class="fa-solid fa-cart-shopping cart-size"></i><sup style="font-weight: 500; color: red; font-size: 16px;"><?php getCartNum(); ?></sup></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link nav-btn" href="../cart.php">: ₱<?php totalCartPrice(); ?></a>
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

        <?php
        global $conn;
        $user_ip = getIPAddress();
        $get_user = "SELECT * from `users` WHERE user_ip = '$user_ip'";
        $result_user = mysqli_query($conn, $get_user);
        $fetch_query = mysqli_fetch_array($result_user);

        $user_id = $fetch_query['user_id'];
        ?>



        <div class="bg-dark mt-5 pt-4">

            <div class="row d-flex justify-content-center align-items-center bg-tertiary cn">
                <h1 class="text-center text-light">PAYMENT OPTIONS</h1>
                <div class="col-md-1 mb-4">

                </div>
                <div class="col-md-5 text-center mb-1">
                    <h5 class="text-center text-light my-3">PAY ONLINE</h5>
                    <a href="https://www.gcash.com/" class="mx-3 p-logo gcash" target="_blank"><img src="../images/gcash.png" alt=""></a>
                    <a href="https://www.paypal.com/ph/home" class="mx-3 p-logo paypal" target="_blank"><img src="../images/paypal.png" alt=""></a>
                    <a href="https://www.maya.ph/" class="mx-3 p-logo maya" target="_blank"><img src="../images/maya.png" alt=""></a>
                    <a href="https://www.cliqq.net/" class="mx-3 p-logo cliqq" target="_blank"><img src="../images/cliqq.png" alt=""></a>
                </div>
                <!-- <div class="col-md-1 mb-4">

            </div> -->
                <div class="col-md-5 text-center text-light mb-1">
                    <!-- <a href="orders.php" class="text-center">PAY CASH ON DELIVERY</a><br> -->
                    <h5 class="text-center my-3">PAY CASH ON DELIVERY</h5>
                    <a href="orders.php?user_id=<?php echo $user_id ?>" class="text-center p-logo cod"><img src="../images/cod.png" alt=""></a>
                </div>
                <div class="col-md-1 mb-4">

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