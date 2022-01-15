<?php

session_start();
//unset($_SESSION['cart']);
$id = $_GET['id'];

if (empty($_SESSION['cart'][$id])) {
    require_once './admin/connect.php';
    $sql = "SELECT * FROM products WHERE id = '$id' ";
    $array_result = mysqli_query($connect, $sql);
    $result = mysqli_fetch_array($array_result);
    $_SESSION['cart'][$id]['name'] = $result['name'];
    $_SESSION['cart'][$id]['image'] = $result['image'];
    $_SESSION['cart'][$id]['price'] = $result['price'];
    $_SESSION['cart'][$id]['quantity'] = 1;
} else {
    $_SESSION['cart'][$id]['quantity']++;
}

header('Location:index.php');

//echo json_encode($_SESSION['cart']);

