<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        <?php adminTableStyles() ?>
        .profile-img {
            width: 80px;
            height: 80px;
            border-radius: 50px;
        }
    </style>
</head>
<body>
    <h3 class="text-center">USER LIST</h3>

    <table>
        <thead class="text-center">

            <?php 
                $get_users = "SELECT * from `users`";
                $run_query = mysqli_query($conn, $get_users);
                $fetch_rows = mysqli_num_rows($run_query);
                

                if($fetch_rows==0) {
                    echo "<h2 class='text-center'>NO USERS TO DISPLAY</h2>";
                }
                else {
                    echo "
                    <tr>
                        <th></th>
                        <th>ID</th>
                        <th>NAME</th>
                        <th>EMAIL</th>
                        
                        <th>ADDRESS</th>
                        <th>CONTACT NUMBER</th>
                        <th></th>
                    </tr>

                </thead>
                <tbody class='text-center'>
                ";
                    $num = 0;
                    while($row_exist = mysqli_fetch_array($run_query)) {
                        $user_id   = $row_exist['user_id'];
                        $username = $row_exist['username'];
                        $user_email = $row_exist['user_email'];
                        $user_image = $row_exist['user_image'];
                        $user_address = $row_exist['user_address'];
                        $user_phone = $row_exist['user_phone'];
                        $num++;

                        echo "
                        <tr>
                            <td><img src='../users/user_images/$user_image' class='profile-img' /></td>
                            <td>$user_id</td>
                            <td>$username</td>
                            <td>$user_email</td>
                            
                            <td>$user_address</td>
                            <td>$user_phone</td>"; ?>
                            
                            <td><a href='index.php?delete_user=<?php echo $user_id ?>' class='text-danger icon-size' data-toggle="modal" data-target="#exampleModalCenter"><i class='fa-solid fa-trash'></i></a></td>
                        </tr>
      <?php
                    }
                }
            ?>
           
        </tbody>
    </table>

      <!-- data-toggle="modal" data-target="#exampleModalCenter" -->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
            
            <div class="modal-body">
                Are you sure you want to delete this user??
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-danger"><a href='index.php?delete_user=<?php echo $user_id ?>' class='text-light icon-size text-decoration-none'>Confirm</a></button>
            </div>
            </div>
        </div>
    </div>
    
</body>
</html>