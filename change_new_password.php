<?php
    if (empty($_GET['token'])) {
        header("location:index.php");
        exit;
    }
    $token = $_GET['token'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đổi mật khẩu mới</title>
</head>
<body>
    <h1>Đặt mật khẩu mới</h1>
    <form action="process_change_new_password.php" method="post">
        <input type="hidden" name="token" value="<?php echo $token; ?>">
        Mật khẩu mới
        <input type="password" name="password">
        <button>Xác nhận</button>
    </form>
</body>
</html>