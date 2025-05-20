<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        <?php adminTableStyles() ?>
    </style>
</head>
<body>
    <h3 class="text-center">ORDER LIST</h3>

    <table>
        <thead class="text-center">

            <?php 
                $get_orders = "SELECT * from `orders`";
                $run_query = mysqli_query($conn, $get_orders);
                $fetch_rows = mysqli_num_rows($run_query);
                

                if($fetch_rows==0) {
                    echo "<h2 class='text-center'>NO ORDER YET</h2>";
                }
                else {
                    echo "
                    <tr>
                        <th>ID</th>
                        <th>AMOUNT</th>
                        <th>TRANSACTION NUMBER</th>
                        <th>PRODUCTS ORDERED</th>
                        <th>DATE ORDERED</th>
                        <th>STATUS</th>
                        <th></th>
                    </tr>

                </thead>
                <tbody class='text-center'>
                ";
                    $num = 0;
                    while($row_exist = mysqli_fetch_array($run_query)) {
                        $order_id = $row_exist['order_id'];
                        $user_id = $row_exist['user_id'];
                        $amount = $row_exist['amount'];
                        $invoice_num = $row_exist['invoice_num'];
                        $total_products = $row_exist['total_products'];
                        $order_date = $row_exist['order_date'];
                        $order_status = $row_exist['order_status'];
                        $num++;

                        echo "
                        <tr>
                            <td>$order_id</td>
                            <td>$amount</td>
                            <td>$invoice_num</td>
                            <td>$total_products</td>
                            <td>$order_date</td>
                            <td>$order_status</td>"; ?>
                            
                            <td><a href='index.php?delete_order=<?php echo $order_id ?>' class='text-danger icon-size' data-toggle="modal" data-target="#exampleModalCenter"><i class='fa-solid fa-trash'></i></a></td>
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
                Are you sure you want to delete this item??
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-danger"><a href='index.php?delete_order=<?php echo $order_id ?>' class='text-light icon-size text-decoration-none'>Confirm</a></button>
            </div>
            </div>
        </div>
    </div>
    
</body>
</html>