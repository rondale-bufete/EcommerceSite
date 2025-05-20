<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        <?php cartStyles() ?>

        /*  */
        thead tr {
            background-color: #ff523b;
            color: #f0f0f0;
        }

        tbody tr {
            font-size: 1rem;
            text-align: center;
        }

        .place-btn {
            color: #000;
            text-decoration: none;
            font-size: 1rem;
            transition: 200ms;
        }

        .place-btn:hover {
            color: #ff523b;
            transition: 200ms;
        }
    </style>
</head>

<body>
    <?php
    $username = $_SESSION['username'];
    $get_user = "SELECT * from `users` WHERE username = '$username'";
    $result = mysqli_query($conn, $get_user);
    $fetch_rows = mysqli_fetch_assoc($result);
    $user_id = $fetch_rows['user_id'];
    ?>
    <small>
        <h3 class="text-center">YOUR ORDERS</h3>
    </small>
    <table class="mt-5">
        <thead>
            <tr>
                <th>ORDER ID</th>
                <th>AMOUNT DUE</th>
                <th>TOTAL PRODUCTS</th>
                <th>TRANSACTION NUMBER</th>
                <th>ORDER DATE</th>
                <th>STATUS</th>
                <th>TRANSACTION</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $get_orderDetails = "SELECT * from `orders` WHERE user_id = $user_id";
            $order_results = mysqli_query($conn, $get_orderDetails);
            $number = 1;
            while ($order_rows = mysqli_fetch_array($order_results)) {
                $order_id = $order_rows['order_id'];
                $amount = $order_rows['amount'];
                $total_products = $order_rows['total_products'];
                $invoice_num = $order_rows['invoice_num'];
                $order_date = $order_rows['order_date'];
                $order_status = $order_rows['order_status'];
                if ($order_status == 'pending') {
                    $order_status = 'Pending';
                } else {
                    $order_status = 'Confirmed';
                }
                echo "
                        <tr>
                            <td>$number</td>
                            <td>$amount</td>
                            <td>$total_products</td>
                            <td>$invoice_num</td>
                            <td>$order_date</td>";
            ?>
            <?php
                if ($order_status == 'Pending') {
                    echo "<td class='text-danger'>$order_status</td>
                                    <td><a href='confirm_payment.php?order_id=$order_id' class='place-btn' style='text-decoration: underline;'>Place Order</a></td>
                        </tr>";
                } else {
                    echo "<td class='text-success'>$order_status</td>
                                    <td><p>Completed</td>
                        </tr>";
                }



                $number++;
            }

            ?>

        </tbody>

    </table>
</body>

</html>