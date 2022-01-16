<?php

$email = $_POST['email'];
$password = $_POST['password'];

require_once 'connect.php';

$sql = "SELECT * from admin
WHERE email = '$email' AND password = '$password' ";
$array_result = mysqli_query($connect, $sql);
if (mysqli_num_rows($array_result) == 1) {
    $result = mysqli_fetch_array($array_result);

    session_start();
    $_SESSION['id_admin'] = $result['id'];
    $_SESSION['name_admin'] = $result['name'];
    $_SESSION['level_admin'] = $result['level'];
    header("Location:./root");
    exit;
}

header("Location:index.php?error=Thông tin đăng nhập không chính xác!");
