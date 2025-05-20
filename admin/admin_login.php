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
    <title>Admin | Login</title>

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

        .display-image {
            width: 100%;
            height: 100%;
        }
        .cols {
            justify-content: center;
            align-items: center;
        }
        .admin-log {
            padding-left: 15px;
            width: 65%;
            height: 55px;
            border: 1px solid #ccc;
            margin-bottom: 25px;
            border-radius: 5px;
            border-bottom: 2px solid #555;
        }
        .admin-log:focus {
            outline: none;
            border-bottom: 2px solid #4a1a3d;
        }

        .login-btn {
            padding: 10px 50px;
            background-color: #000;
            color: #fff;
            border: 1px solid #000;
            font-weight: bolder;
            border-radius: 10px;
            transition: 200ms;
        }
         .login-btn:hover {
            background-color: #555;
            color: #fff;
            border: 1px solid #000;
            font-weight: bolder;
            transition: 200ms;
         }
         .form-box {
            border-radius: 29px;
            background: linear-gradient(145deg, #fff, #f0f0f0);
            box-shadow:  29px 29px 61px #b8b8b8,
                        -29px -29px 61px #ffffff;
            padding: 15px 15px;
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
                            <a href='' class='nav-link mx-4 text-center'>LOGIN TO ADMINISTRATION<i class='fa-solid fa-user mx-1'></i></a>
                            
                            <!-- <a href="#" class="admin-logout">Logout</a> -->
                        </li>
                    </ul>
                </nav>
            </div>
        </nav>

        

        <!-- <div class="row bg-dark p-1 d-flex align-items-center">

            <div class="col-md-12 align-items-center col-2">
                
                <h1 class="text-light text-center">WELCOME ADMIN</h1>

            </div>

        </div> -->
    

        <div class="row bg-light" style="height: 90vh;">
            <div class="col-md-1">

            </div>
            <div class="col-md-4 cols text-center m-auto">
                <div class="image-display">
                    <img src="images/admin-style.png" alt="" class="display-image">
                </div>
            </div>
            <div class="col-md-6 cols text-center m-auto">
                
                <form action="" method="post" class="form-box">
                    <h3 class="mb-5">ADMIN ACCOUNT</h3>
                    <input type="text" class="admin-log" id="admin_username" name="admin_username" placeholder="Username"><br>
                    <input type="password" class="admin-log" placeholder="Password" id="admin_pass" name="admin_pass">
                    <br>
                    <button name="admin_access" type="submit" class="login-btn">Login</button>
                    <br>
                    
                </form>
            </div>
            <div class="col-md-1">

        </div>
        </div>




        <!-- footer -->
        <!-- <?php include('../includes/footer.php') ?> -->
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>

<?php 

// userlogin-logic
if (isset($_POST['admin_access'])) {
    global $conn;
    $log_username = $_POST['admin_username'];
    $log_password = $_POST['admin_pass'];
    echo $log_password;


    $select_users_query = "SELECT * from `admin` WHERE admin_username = '$log_username'";
    $query_result_lg = mysqli_query($conn, $select_users_query);
    $row_count_u = mysqli_num_rows($query_result_lg);
    $row_data_u = mysqli_fetch_assoc($query_result_lg);

    if ($row_count_u > 0) {

        $_SESSION['admin_username'] = $log_username;
        if ($log_password == $row_data_u['admin_password']) {
            if ($row_count_u == 1) {
                $_SESSION['admin_username'] = $log_username;
                 echo "<script>alert('Login Successful')</script>";
                 echo "<script>window.open('index.php', '_self')</script>";
            }

        } else {

            echo "<script>alert('Invalid Credentials')</script>";
        }
    } else {
        echo "<script>alert('Invalid Credentials')</script>";
    }
}

?>

?>

