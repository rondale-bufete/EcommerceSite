<?php
include('../includes/dbconnect.php');
include('../common/functions.php');

if (isset($_GET['user_id'])) {
    $user_id = $_GET['user_id'];
}

// ------------------------------------
$get_ip = getIPAddress();

$total_cost = 0;
$cart_query = "SELECT * from `cart` WHERE ip_address = '$get_ip'";
$result_cart_amount = mysqli_query($conn, $cart_query);
$in_num = mt_rand();
$status = 'pending';
$count_cart_row = mysqli_num_rows($result_cart_amount);
while ($row_price = mysqli_fetch_array($result_cart_amount)) {
    $product_id = $row_price['product_id'];
    $product_select = "SELECT * from `products` WHERE product_id = $product_id";
    $fetch_price = mysqli_query($conn, $product_select);
    while ($row_prod_price = mysqli_fetch_array($fetch_price)) {
        $prd_amount = array($row_prod_price['product_price']);
        $order_value = array_sum($prd_amount);
        $total_cost += $order_value;
    }
}

//----------------------

$get_cart = "SELECT * from `cart`";
$fetching_cart = mysqli_query($conn, $get_cart);
$get_prd_quantity = mysqli_fetch_array($fetching_cart);
$quantity = $get_prd_quantity['quantity'];
if ($quantity == 0) {
    $quantity = 1;
    $subtotal = $total_cost;
} else {
    $quantity = $quantity;
    $subtotal = $total_cost * $quantity;
}


$insert_orders = "INSERT INTO `orders` (user_id, amount, invoice_num, total_products, order_date, order_status) 
VALUES ($user_id, $subtotal, $in_num, $count_cart_row, NOW(), '$status')";
$result_query = mysqli_query($conn, $insert_orders);
if ($result_query) {
    echo "<script>alert('ORDER SUBMITTED')</script>";
    echo "<script>window.open('user_profile.php', '_self')</script>";
}


//
$insert_pedingOrders = "INSERT INTO `pending_orders` (user_id, invoice_num, product_id, quantity, order_status) 
VALUES ($user_id, $in_num, $product_id, $quantity, '$status')";
$pending_query = mysqli_query($conn, $insert_pedingOrders);

//
$empty_cart = "DELETE from `cart` WHERE ip_address='$get_ip'";
$empty_cart_delete = mysqli_query($conn, $empty_cart);

// orders page