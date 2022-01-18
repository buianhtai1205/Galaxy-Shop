<?php

$token = $_POST['token'];
$password = $_POST['password'];

require_once './admin/connect.php';
$sql = "SELECT customer_id FROM forgot_password WHERE token = '$token' ";
$result = mysqli_query($connect, $sql);
if (mysqli_num_rows($result) == 0) {
    header("Location:forgot_password.php?error=Lỗi URL không hợp lệ!");
    exit;
}
$customer_id = mysqli_fetch_array($result)['customer_id'];

$sql = "DELETE FROM forgot_password WHERE token = '$token' ";
mysqli_query($connect, $sql);

$sql = "UPDATE customers 
SET password = '$password'
WHERE id = '$customer_id' ";
mysqli_query($connect, $sql);

header("location:form_signin.php?success=Thay đổi mật khẩu thành công!");