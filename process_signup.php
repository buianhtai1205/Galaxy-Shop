<?php

$name = addslashes($_POST['name']);
$email = addslashes($_POST['email']);
$password = addslashes($_POST['password']);
$phone = addslashes($_POST['phone']);
$address = addslashes($_POST['address']);

require_once './admin/connect.php';

$sql = "SELECT count(*) FROM customers
WHERE email = '$email' ";
$result = mysqli_query($connect, $sql);
$array_num_rows = mysqli_fetch_array($result);
$num_rows = $array_num_rows['count(*)'];

if ($num_rows == 0) {
    $sql = "INSERT INTO customers(name, email, password, phone, address)
    VALUES('$name', '$email', '$password', '$phone', '$address')";
    mysqli_query($connect, $sql);
    
} else {
    header("Location:form_signup.php?error=Trùng Email rồi!!!");
    exit;
}

$title = 'Đăng kí tài khoản thành công';
$content = 'Chúc mừng bạn đã hoàn thành đăng kí <br>
Cảm ơn bạn đã tin tưởng và sử dụng dịch vụ của chúng tôi <bt>
Chúng tôi xin phép gửi bạn mã giảm giá freeship cho đơn hàng đầu tiên với khách hàng mới <br>
Kích vào link dưới đây để nhận mã giảm giá <br>
<a href="https://www.youtube.com/watch?v=Q_JTr4UPRW8">Mã giảm giá</a>
';
require_once 'mail.php';
send_mail($email, $name, $title, $content);

$sql = "SELECT id FROM customers 
WHERE email = '$email' ";
$result = mysqli_query($connect, $sql);
$id = mysqli_fetch_array($result)['id'];

session_start();
$_SESSION['id'] = $id;
$_SESSION['name'] = $name;
header("Location:form_signin.php");