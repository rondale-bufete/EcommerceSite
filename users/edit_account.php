<?php
if (isset($_GET['edit_account'])) {
    $user_active_name = $_SESSION['username'];
    $select_query = "SELECT * from `users` WHERE username = '$user_active_name'";
    $reult_query = mysqli_query($conn, $select_query);
    $fetch_rows = mysqli_fetch_assoc($reult_query);
    $user_id = $fetch_rows['user_id'];
    $username = $fetch_rows['username'];
    $user_email = $fetch_rows['user_email'];
    $user_address = $fetch_rows['user_address'];
    $user_phone = $fetch_rows['user_phone'];
}
if (isset($_POST['prof_update'])) {
    $update_id = $user_id;
    $username = $_POST['prof_username'];
    $user_email = $_POST['prof_email'];
    $user_address = $_POST['prof_address'];
    $user_phone = $_POST['prof_contact'];
    $user_image = $_FILES['prof_image']['name'];
    $user_image_tmp = $_FILES['prof_image']['tmp_name'];
    move_uploaded_file($user_image_tmp, "./user_images/$user_image");

    $update_query = "UPDATE `users` SET username = '$username', user_email='$user_email', user_image='$user_image',  user_address='$user_address', user_phone='$user_phone' WHERE user_id = $update_id";
    $update_result = mysqli_query($conn, $update_query);
    if ($update_result) {
        echo "<script>alert('YOU WILL HAVE TO LOG IN AGAIN TO APPLY CHANGES')</script>";
        echo "<script>window.open('logout.php', '_self')</script>";
    }
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Account</title>

    <style>
        .input-container {
            width: 60%;
            margin: auto;
            /* border: 1px solid black; */
            display: block;
            justify-content: center;
            align-items: center;
        }

        .input-edit {
            margin-bottom: 15px;
            width: 100%;
            height: 55px;
            border: none;
            padding-left: 15px;
            border-bottom: 2px solid #ccc;
            /* border-radius: 10px; */
        }

        .input-edit:focus {
            outline: none;
            border-bottom: 2px solid #ff523b;
        }

        .update-btn {
            background-color: #ff523b;
            margin-top: 10px;
            text-decoration: none;
            color: #fff;
            border: 1px solid white;
            border-radius: 10px;
            padding: 8px 25px;
            font-weight: bolder;
            transition: 200ms;

        }

        .update-btn:hover {
            background-color: #fff;
            color: #ff523b;
            font-weight: bolder;
            border: 1px solid #ff523b;
            transition: 200ms;
        }

        .update-btn:active {
            background-color: #ff523b;
            margin-top: 10px;
            text-decoration: none;
            color: #fff;
            border: 1px solid white;
            border-radius: 10px;
            padding: 15px 25px;
            font-weight: bolder;

        }

        .current-img {
            width: 100px;
            height: 100px;
        }
    </style>
</head>

<body>

    <h3 class="text-center mt-2 mb-3">UPDATE YOUR ACCOUNT</h3>
    <form action="" method="post" enctype="multipart/form-data">

        <div class="input-container text-center">
            <input type="text" name="prof_username" value="<?php echo $username ?>" class="input-edit" placeholder="Enter new username"><br>
            <input type="email" name="prof_email" value="<?php echo $user_email ?>" class="input-edit" placeholder="Enter new email"><br>
            <div class="image-update-sec d-flex m-auto">
                <input type="file" name="prof_image" class="input-edit"><br>
                <img src="./user_images/<?php echo $user_image ?>" alt="" class="current-img">
            </div>
            <input type="text" name="prof_address" value="<?php echo $user_address ?>" class="input-edit" placeholder="Enter new address"><br>
            <input type="text" name="prof_contact" value="<?php echo $user_phone ?>" class="input-edit" placeholder="Enter new contact number">
            <input type="submit" name="prof_update" class="update-btn" value="UPDATE PROFILE">

        </div>

    </form>
</body>

</html>