<?php
    session_start();
    if (empty($_SESSION['id'])) {
        header("Location:form_signin.php?error=Vui lòng đăng nhập tài khoản.");
        exit;
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Người dùng</title>
</head>
<body>
    <h1>Đây là trang người dùng</h1>
    <h3>Xin chào 
        <?php
            echo $_SESSION['name'];
        ?>
    </h3>
    <a href="signout.php">Đăng xuất</a>
</body>
</html>