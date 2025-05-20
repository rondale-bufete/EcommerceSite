<?php
include('../includes/dbconnect.php');
include('../common/functions.php');
include('../common/styles.php');
session_start();

if (isset($_GET['order_id'])) {
    $order_id = $_GET['order_id'];
    $select_order = "SELECT * from `orders` WHERE order_id = $order_id";
    $result = mysqli_query($conn, $select_order);
    $fetch_row = mysqli_fetch_assoc($result);
    $invoice_num = $fetch_row['invoice_num'];
    $amount = $fetch_row['amount'];
}

if (isset($_POST['place_order'])) {
    $invoice_number = $_POST['invoice_num'];
    $order_amount = $_POST['amount'];
    $payment_mode = $_POST['payment_mode'];
    $insert_query = "INSERT INTO `payments` (order_id, invoice_num, amount, payment_mode)
                    VALUES ($order_id, $invoice_number, $order_amount, '$payment_mode')";

    $result_query = mysqli_query($conn, $insert_query);
    if ($result_query) {
        echo "<script>alert('PLACED ORDER SUCCESSFULLY');</script>";
        echo "<script>window.open('user_profile.php?my_orders', '_self');</script>";
    }
    $update_status = "UPDATE `orders` SET order_status = 'Order Confirmed' WHERE order_id=$order_id";
    $update_result = mysqli_query($conn, $update_status);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Place Order</title>
    <style>
        <?php homeStyles() ?>

        /*  */
        .pay_input {
            width: 30%;
            border: 1px solid #ccc;
            border-bottom: 1px solid #ccc;
            height: 55px;
            padding-left: 15px;
            margin-bottom: 15px;
            transition: 100ms;
        }

        .pay_input:focus {
            outline: none;
            border-bottom: 2px solid #ff523b;
            transition: 100ms;
        }

        .place-btn {
            padding: 10px 25px;
            background-color: #ff523b;
            color: #fff;
            border: 1px solid white;
            border-radius: 5px;
            transition: 100ms;
        }

        .place-btn:hover {
            background-color: #ba3c2b;
            transition: 100ms;
        }

        .place-btn:active {
            background-color: #ff523b;
            transition: 100ms;
        }
    </style>
</head>

<body>
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
                            <a class="nav-link nav-btn" href="#">Contact</a>
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

        <div class="" style="height: 7vh;"></div>
        <div class="bg-light mt-5 pt-4 main-container" style="height: 80vh;">


            <h3 class="text-center mt-4">CONFIRM PAYMENT</h3>

            <form action="" method="post">

                <div class="my-4 text-center">
                    <h6 class="pay_label">Transaction Number : </h6>
                    <input type="text" name="invoice_num" value="<?php echo $invoice_num ?>" class="pay_input">
                    <h6 class="pay_label">Payment Amount : </h6>
                    <input type="text" name="amount" class="pay_input" value="<?php echo $amount ?>"><br>
                    <select name="payment_mode" class="pay_input">
                        <option value="">SELECT PAYMENT MODE</option>
                        <option value="G-CASH">G-CASH</option>
                        <option value="PAYPAL">PAYPAL</option>
                        <option value="MAYA">MAYA</option>
                        <option value="CLIQQ by 7/11">CLIQQ by 7/11</option>
                        <option value="CASH ON DELIVERY">CASH ON DELIVERY</option>
                    </select><br>
                    <input type="submit" name="place_order" class="place-btn" value="PLACE ORDER">
                </div>

            </form>

        </div>

    </div>


    <!-- footer -->
    <?php
    include('../includes/footer.php')
    ?>
    </div>
</body>

</html>