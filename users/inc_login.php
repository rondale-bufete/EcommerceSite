<?php
include('../includes/dbconnect.php');
@session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ecommerce Site | Login</title>
    <style>
        <?php incLoginStyle() ?>
    </style>
</head>

<body>
    <div class="account-page">
        <div class="container">
            <div class="row">
                <div class="col-md-6 mt-5">
                    <img src="./images/user.png" width="100%">
                </div>
                <div class="col-md-6 mt-5">
                    <div class="form-container" id="formContain">
                        <div class="form-btn">
                            <span onclick="login()">Login</span>
                            <span onclick="register()">Sign Up</span>
                            <hr id="Indicator">
                        </div>

                        <form action="" method="post" id="LoginForm">
                            <input type="text" id="lg_username" name="lg_username" placeholder="Username">
                            <input type="password" placeholder="Password" id="lg_pass" name="lg_pass">

                            <button name="user_login" type="submit" class="btn">Login</button>
                            <br>
                            <a href="">Forgot Password?</a>
                        </form>

                        <!-- Registration Form -->
                        <form action="" method="post" id="RegForm" enctype="multipart/form-data">
                            <input type="text" name="reg_username" id="reg_username" placeholder="Username" autocomplete="off" required>
                            <input type="email" name="req_email" id="reg_email" placeholder="Email" autocomplete="off" required>
                            <input type="file" id="reg_image" name="reg_image" required onchange="updateFileName(this)">
                            <div class="custom-file-input" onclick="document.getElementById('reg_image').click()">
                                <span class="custom-file-input-text">
                                    <p style="color: rgbs(239, 239, 240, 0.9); font-weight: 400;"><i class="fa-solid fa-id-badge mx-1"></i> Upload User's Picture</p>
                                </span>
                            </div>

                            <input type="password" name="reg_password" name="reg_password" placeholder="Password" autocomplete="off" required>
                            <input type="password" name="reg_password2" name="reg_password2" placeholder="Confirm Password" autocomplete="off" required>

                            <input type="text" name="reg_address" id="reg_address" placeholder="Address" autocomplete="off" required>
                            <input type="text" name="reg_contact" id="reg_contact" placeholder="Contact Number" autocomplete="off" required>
                            <button type="submit" class="btn" name="reg_register">Register</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        //JS Form event
        var LoginForm = document.getElementById("LoginForm");
        var RegForm = document.getElementById("RegForm");
        var Indicator = document.getElementById("Indicator");
        var fContain = document.getElementById("formContain");

        function register() {
            RegForm.style.transform = "translateX(-700px)";
            LoginForm.style.transform = "translateX(-700px)";
            Indicator.style.transform = "translateX(100px)";
            fContain.style.height = "700px";
            RegForm.style.width = "100%";
        }

        function login() {
            RegForm.style.transform = "translateX(0px)";
            LoginForm.style.transform = "translateX(0px)";
            fContain.style.height = "400px";
            Indicator.style.transform = "translateX(0px)";
        }

        function updateFileName(input) {
            var fileName = input.files[0].name;
            document.querySelector('.custom-file-input-text').innerText = fileName;
        }
    </script>
</body>

</html>


<!-- REGISTER ACCOUNT FUNCTION -->
<?php
if (isset($_POST['reg_register'])) {
    global $conn;
    $reg_username = $_POST['reg_username'];
    $req_email = $_POST['req_email'];
    $reg_password = $_POST['reg_password'];
    $password_hashed = password_hash($reg_password, PASSWORD_DEFAULT);


    $reg_password2 = $_POST['reg_password2'];

    $reg_address = $_POST['reg_address'];
    $reg_contact = $_POST['reg_contact'];

    $reg_image = $_FILES['reg_image']['name'];
    $reg_image_tmp = $_FILES['reg_image']['tmp_name'];

    $user_ip = getIPAddress();

    // 
    $select_query = "SELECT * from `users` WHERE username='$reg_username' OR user_email='$reg_email'";
    $result = mysqli_query($conn, $select_query);
    $check_rows = mysqli_num_rows($result);
    if ($check_rows > 0) {
        echo "<script>alert('USERNAME OR EMAIL ALREADY EXIST');</script>";
    } else if ($reg_password != $reg_password2) {
        echo "<script>alert('The password did not match');</script>";
    } else {
        // 
        move_uploaded_file($reg_image_tmp, "./user_images/$reg_image");
        $inset_query = "INSERT INTO `users` 
            (username, user_email, user_password, user_image, user_ip, user_address, user_phone)
            VALUES ('$reg_username', '$req_email', '$password_hashed', '$reg_image', '$user_ip', '$reg_address', '$reg_contact')";

        $sql_execute = mysqli_query($conn, $inset_query);
        if ($sql_execute) {
            echo "
                <script>
                alert('YOU HAVE REGISTERED AN ACCOUNT')
                </script>
                
                ";
        } else {
            die(mysqli_error($conn));
        }
    }

    //checking cart items
    $select_cart_items = "SELECT * from `cart` WHERE ip_address='$user_ip'";
    $cart_select_result = mysqli_query($conn, $select_cart_items);
    $check_rows = mysqli_num_rows($cart_select_result);
    if ($check_rows > 0) {
        $_SESSION['username'] = $reg_username;
        echo "<script>alert('You have items in your cart')</script>";
        echo "<script>window.open('../cart.php', '_self')</script>";
    } else {
        echo "<script>window.open('../index.php', '_self')</script>";
    }
}

// userlogin-logic
if (isset($_POST['user_login'])) {
    $log_username = $_POST['lg_username'];
    $log_password = $_POST['lg_pass'];
    echo $log_password;


    $select_users_query = "SELECT * from `users` WHERE username='$log_username'";
    $query_result_lg = mysqli_query($conn, $select_users_query);
    $row_count_u = mysqli_num_rows($query_result_lg);
    $row_data_u = mysqli_fetch_assoc($query_result_lg);
    $user_ip = getIPAddress();

    $select_cart_query = "SELECT * from `cart` WHERE ip_address='$user_ip'";
    $cart_select = mysqli_query($conn, $select_cart_query);
    $row_count_cart = mysqli_num_rows($cart_select);

    if ($row_count_u > 0) {

        $_SESSION['username'] = $log_username;
        if (password_verify($log_password, $row_data_u['user_password'])) {
            if ($row_count_u == 1 and $row_count_cart == 0) {

                $_SESSION['username'] = $log_username;
                echo "<script>alert('Login Successful')</script>";
                echo "<script>window.open('user_profile.php', '_self')</script>";
            } else {
                $_SESSION['username'] = $log_username;

                echo "<script>alert('Login Successful')</script>";
                echo "<script>window.open('payments.php', '_self')</script>";
            }
        } else {

            echo "<script>alert('Invalid Credentials')</script>";
        }
    } else {
        echo "<script>alert('Invalid Credentials')</script>";
    }
}

?>