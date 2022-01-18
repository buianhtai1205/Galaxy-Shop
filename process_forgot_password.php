<?php

$email = $_POST['email'];

require_once './admin/connect.php';

$sql = "SELECT id,name FROM customers WHERE email = '$email' ";
$result  = mysqli_query($connect, $sql);
if (mysqli_num_rows($result) == 0) {
    header("Location:forgot_password.php?error=Email không tồn tại!!!");
    exit;
}
$each = mysqli_fetch_array($result);
$id  = $each['id'];
$name  = $each['name'];
$token = uniqid('user_', true) . time();

$sql = "INSERT INTO forgot_password(customer_id, token) VALUES ('$id', '$token')";
mysqli_query($connect, $sql);

require_once 'mail.php';
$title = "Đổi mật khẩu mới";

// Program to display URL of current page.
if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on')
$link = "https";
else $link = "http";

// Here append the common URL characters.
$link .= "://";

// Append the host(domain name, ip) to the URL.
$link .= $_SERVER['HTTP_HOST'];

$link .= "/change_new_password.php?token=$token";

$content = "Bạn đang thực hiện quên mật khẩu <br> Nếu là bạn, vui lòng nhấn vào link sau để thay đổi mật khẩu mới <br>
<a href='$link'>Thay đổi mật khẩu</a>";

send_mail($email, $name, $title, $content);
header("Location:forgot_password.php?success=Gửi mail thành công. Vui lòng kiểm tra email để thay đổi mật khẩu mới!");