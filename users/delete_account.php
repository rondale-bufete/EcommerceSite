<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .cnfrm-btn {
            width: 100%;
            height: 45px;
            margin-bottom: 35px;
            background-color: #bf0000;
            color: #fff;
            border: none;
            transition: 100ms;
            font-weight: bold;
            border-radius: 7px;
        }

        .cnfrm-btn:hover {
            background-color: #6b0101;
            transition: 100ms;
            border-radius: 0px;
        }

        .cncl-btn {
            width: 100%;
            height: 45px;
            margin-bottom: 35px;
            background-color: #17a341;
            color: #fff;
            border: none;
            transition: 100ms;
            font-weight: bold;
            border-radius: 7px;
        }

        .cncl-btn:hover {
            background-color: #074d1c;
            transition: 100ms;
            border-radius: 0px;
        }
    </style>
</head>

<body>
    <h3 class="text-center text-danger mt-5">DELETE ACOUNT?</h3>

    <form action="" method="post" class="my-5">
        <div class="button-div w-50 m-auto text-center">
            <input type="submit" name="delete" class="cnfrm-btn" value="CONFIRM DELETE"><br>
            <input type="submit" name="cancel" class="cncl-btn" value="CANCEL">
        </div>

    </form>
</body>

</html>

<?php
$active_username = $_SESSION['username'];
if (isset($_POST['delete'])) {
    $delete_query = "DELETE from `users` WHERE username = '$active_username'";
    $deletion_result = mysqli_query($conn, $delete_query);
    if ($deletion_result) {
        session_destroy();
        echo "<script>alert('YOU HAVE DELETED YOUR ACCOUNT');</script>";
        echo "<script>window.open('../index.php', '_self');</script>";
    }
}
if (isset($_POST['cancel'])) {
    echo "<script>window.open('user_profile.php', '_self');</script>";
}
?>