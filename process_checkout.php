<?php
session_start();

$customer_id = $_SESSION['id'];
$name_receiver = addslashes($_POST['name_receiver']);
$phone_receiver = addslashes($_POST['phone_receiver']);
$address_receiver = addslashes($_POST['address_receiver']);
$message_receiver = addslashes($_POST['message_receiver']);

$status = 0;

$total_price = 0;
foreach ($_SESSION['cart'] as $id => $each) {
    $total_price += $each['price']*$each['quantity'];
}

require_once './admin/connect.php';

$sql = "INSERT into orders(customer_id, name_receiver, phone_receiver, address_receiver,message_receiver, status, total_price)
VALUE('$customer_id', '$name_receiver', '$phone_receiver', '$address_receiver', '$message_receiver', '$status', '$total_price') ";
mysqli_query($connect, $sql);

$sql = "SELECT MAX(id) FROM orders
WHERE customer_id = '$customer_id' ";
$result = mysqli_query($connect, $sql);
$order_id = mysqli_fetch_array($result)['MAX(id)'];


foreach ($_SESSION['cart'] as $id => $each) {
    $quantity = $each['quantity'];
    $sql = "INSERT INTO order_product(order_id, product_id, quantity)
    VALUE('$order_id', '$id', '$quantity')";
    mysqli_query($connect, $sql);
}

unset($_SESSION['cart']);
header("Location:index.php");

mysqli_close($connect);