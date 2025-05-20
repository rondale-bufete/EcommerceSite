<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        <?php adminTableStyles(); ?>
    </style>
</head>

<body>
    <h3 class="text-center">PRODUCT INVENTORY</h3>
    <table class="mt-5">
        <thead class="text-center">
            <tr>
                <th></th>
                <th>ID</th>
                <th>NAME</th>
                
                <th>PRICE</th>
                <th>TOTAL SOLD</th>
                <th>STATUS</th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>

            <?php 
                $get_products = "SELECT * from `products`";
                $inventory = mysqli_query($conn, $get_products);
                while($fetch_rows = mysqli_fetch_assoc($inventory)) {
                    $product_id = $fetch_rows['product_id'];
                    $product_title = $fetch_rows['product_title'];
                    $image1 = $fetch_rows['image1'];
                    $product_price = $fetch_rows['product_price'];
                    $status = $fetch_rows['status'];

                    $get_sold_count = "SELECT * from `pending_orders` WHERE product_id = $product_id";
                    $count_sold = mysqli_query($conn, $get_sold_count);
                    $sold_rows = mysqli_num_rows($count_sold);
                    echo "
                    <tr class='text-center'>
                        <td><img src='./products/$image1' alt='product image' class='table-products'></td>
                        <td>$product_id</td>
                        <td>$product_title</td>
                        
                        <td>₱ $product_price.00</td>
                        <td>$sold_rows</td>
                        <td>$status</td>"; 
                        ?>

                        
                        <td><a href='index.php?edit_product=<?php echo $product_id ?>' class='text-success icon-size'><i class='fa-solid fa-pen-to-square'></i></a></td>
                        <td><a href='index.php?delete_product=<?php echo $product_id ?>' data-toggle="modal" data-target="#exampleModalCenter" class='text-danger icon-size'><i class='fa-solid fa-trash'></i></a></td>
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
                <button type="button" class="btn btn-danger"><a href='index.php?delete_product=<?php echo $product_id ?>' class='text-light icon-size text-decoration-none'>Confirm</a></button>
            </div>
            </div>
        </div>
    </div>

</body>

</html>