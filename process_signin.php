<?php

$email = addslashes($_POST['email']);
$password = addslashes($_POST['password']);


if (isset($_POST['remember'])) {
    $remember = true;
} else {
    $remember = false;
}
                                                           
require_once './admin/connect.php';

$sql = "SELECT count(*) FROM customers
WHERE email = '$email' and password = '$password' ";
$result = mysqli_query($connect, $sql);
$array_num_rows = mysqli_fetch_array($result);
$num_rows = $array_num_rows['count(*)'];

if ($num_rows == 0) {
    header("Location:form_signin.php?error=Sai email hoặc mật khẩu");
    exit;
}

$sql = "SELECT * FROM customers 
WHERE email = '$email' and password = '$password'";
$result = mysqli_query($connect, $sql);
$each = mysqli_fetch_array($result);

$id = $each['id'];

session_start();
$_SESSION['id'] = $id;
$_SESSION['name'] = $each['name'];
if ($remember) {
    $token = uniqid('user_', true) . time();
    $sql = "UPDATE customers
    SET token = '$token'
    WHERE id = '$id' ";
    mysqli_query($connect, $sql);
    setcookie('remember', $token, time() + (86400*30));
}

header("Location:index.php");