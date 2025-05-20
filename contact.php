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
    <title>Ecommerce Site | Home</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        <?php
        homeStyles();
        ?>
        .contact-page {
            padding-top: 50px;
            background: #ECE9E6;
            background: -webkit-linear-gradient(to right, #FFFFFF, #ECE9E6); 
            background: linear-gradient(to left, #FFFFFF, #ECE9E6); 
            box-shadow: 0 0 30px 0px rgba(0,0,0,0.1);
        }
        .contact {
            padding-left: 60px;
            padding-right: 60px;
        }
        .contact h2 {
            font-size: 32px;
            color: #555;
        }
        .contact-page .row {
            padding-top: 65px;
            padding-bottom: 50px;
        }
        .contact-container {
            background: rgba(255,255,255,0.4);
            width: 400px;
            height: 450px;
            position: relative;
            text-align: center;
            padding-bottom: 25px;
            padding-top: 35px;
            border-radius: 5px;
            margin: auto;
            box-shadow: 0 0 10px rgba(0,0,0,0.2);
            overflow: hidden;
        }
        .contact-container input,
        .contact-container textarea {
            width: 80%;
            height: 55px;
            margin: 10px 0;
            padding: 10px 10px;
            background-color: rgba(255,255,255,0.5);
            border: none;
            border-bottom: 1px solid #00000074;
        }
        .contact-container input:focus {
            outline: none;
            border-bottom: 2px solid #ff523b;
        }
        .contact-container textarea:focus {
            outline: none;
            border-bottom: 2px solid #ff523b;
        }
        .contact-container textarea {
            max-width: 80%;
            min-height: 55px;
            min-width: 60%;
            max-height: 85px;
        }

        .contact-container .btn {
            width: 50%;
            border: none;
            cursor: pointer;
            margin: 20px 0;
        }
        .contact-container .btn:focus {
            outline: none;
        }
        .socials {
            margin: 100px auto;
            flex-basis: 33%;
            width: 100%;
        }
        .socials-img:hover {
            filter: grayscale(0);
            transform: translateY(-3px);
        }
        .socials-img:active {
            transform: translateY(1px);
        }
        .socials-img {
            width: 100px;
            height: 100px;
            cursor: pointer;
            filter: grayscale(35%);
            transition: 0.3s;
            margin-right: 25px;
            margin-left: 25px;
        }
        .send-btn {
            border: 1px solid #ff523b;
            padding: 7px 50px;
            background-color: #ff523b;
            color: #ECE9E6;
            border-radius: 15px;
        }
        .send-btn:hover {
            background-color: #7d1c0f;
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
                            <a class="nav-link nav-btn active-nav" aria-current="page" href="index.php">Home</a>
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
                            <a class="nav-link nav-btn" href="cart.php"><i class="fa-solid fa-cart-shopping cart-size"></i><sup style="font-weight: 500; color: red; font-size: 16px;"><?php getCartNum(); ?></sup></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link nav-btn" href="cart.php">: ₱<?php totalCartPrice(); ?></a>
                        </li>
                    </ul>
                    <form action="search_product.php" method="get" class="d-flex" role="search">
                        <input class="search-bar me-1 form-control" type="search" name="search_item" placeholder="Search" aria-label="Search">
                        <!-- <button class="btn search-button" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button> -->
                        <input type="submit" value="Search" name="search_data" class="btn btn-outline-secondary search-button">

                        <?php

                        if (!isset($_SESSION['username'])) {
                            echo "<a class='nav-link mx-4 text-center' href='users/user_profile.php'> <i class='fa-solid fa-user mx-1'></i>Guest</a>";
                        } else {
                            echo "<a class='nav-link mx-4 text-center' href='users/user_profile.php'><i class='fa-solid fa-user mx-1'></i>" . $_SESSION['username'] . "</a>";
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

        <!-- 1st-section -->
        <div class="row">
            <div class="my-2">
                <hr>
            </div>

            <div class="col-md-12 contact-page">
                <div class="container products">
                    <div class="row contact">
                        <div class="col-2 cont">
                            <h2>Send us your thoughts...</h2>
                            <br>
                            <p>Feel free to contact us anytime. <br>We’ll get back to you as soon as we can.</p>
                            <img src="./images/contact us.png" width="70%">
                        </div>
                        <div class="col-2 cont">
                            <div class="contact-container">
                                <input type="text" placeholder="Name">
                                <input type="email" placeholder="Email">
                                <input type="tel" pattern="[0-9]{3}-[0-9]{2}-[0-9]{3}" placeholder="Phone">
                                <textarea cols="30" rows="1" placeholder="Send us your message..."></textarea><br>
                                <button type="submit" class="send-btn">SEND</button>
                            </div>
                        </div>
                        <div class="socials d-flex text-center">
                            <div class="">
                                <img src="./images/facebook.png" class="socials-img">
                            </div>
                            <div class="">
                                <img src="./images/instagram.png" class="socials-img">
                            </div>
                            <div class="">
                                <img src="./images/linkedin.png" class="socials-img">
                            </div>
                        </div>
                    </div>
                </div>
                    
                        
            </div>


        </div>





        
        
        
        
        <?php include('./includes/footer.php')?>

    </div>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>

<!-- VIDEO 18/84 -->