<?php
include('../includes/dbconnect.php');
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
        .login-btn {
            padding: 10px 20px;
            background-color: #ff523b;
            border: 1px solid #ff523b;
            color: white;
            text-decoration: none;
            border-radius: 15px;
            transition: 200ms;
            font-weight: 700;
        }

        .login-btn:hover {
            background-color: #fff;
            border: 1px solid #ff523b;
            color: black;
            transition: 200ms;
        }

        .login-btn:active {
            background-color: #ff523b;
            border: 1px solid #ff523b;
            color: white;
            transform: translateY(2px);
            transition: 200ms;
        }

        .nav-btn {
            text-transform: uppercase;
            font-size: 16px;
        }

        .nav-btn:hover {
            color: #ff523b;
        }

        .active-nav {
            color: #ff523b;
            font-weight: 500;
        }

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
    <?php
    global $conn;
    $user_ip = getIPAddress();
    $get_user = "SELECT * from `users` WHERE user_ip = '$user_ip'";
    $result_user = mysqli_query($conn, $get_user);
    $fetch_query = mysqli_fetch_array($result_user);

    $user_id = $fetch_query['user_id'];
    ?>



    <div class="bg-dark">

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
</body>

</html>