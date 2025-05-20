<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Document</title>
    <style>
        <?php adminTableStyles();?>
    </style>
</head>
<body>
    <h3 class="text-center">BRANDS</h3>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>NAME</th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody class="text-center">
            <?php 
                $select_brand = "SELECT * from `brands`";
                $run_query = mysqli_query($conn, $select_brand);
                $num = 0;
                while ($fetch_rows = mysqli_fetch_array($run_query)) {
                    $br_id = $fetch_rows['brand_id'];
                    $br_name = $fetch_rows['brand_title'];
                    $num++;
            ?>
                    <tr>
                        <td><?php echo $br_id ?></td>
                        <td><?php echo $br_name ?></td>
                        <td><a href='index.php?edit_brand=<?php echo $br_id ?>' class='text-success icon-size'><i class='fa-solid fa-pen-to-square'></i></a></td>
                        <td><a href='index.php?delete_brand=<?php echo $br_id ?>' class='text-danger icon-size' data-toggle="modal" data-target="#exampleModalCenter"><i class='fa-solid fa-trash'></i></a></td>
                        
                    </tr>

            <?php 
                }
            ?>
        </tbody>
    </table>


        <!-- data-toggle="modal" data-target="#exampleModalCenter" -->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
            
            <div class="modal-body">
                Are you sure you want to delete this item??
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-danger"><a href='index.php?delete_brand=<?php echo $br_id ?>' class='text-light icon-size text-decoration-none'>Confirm</a></button>
            </div>
            </div>
        </div>
    </div>
</body>
</html>