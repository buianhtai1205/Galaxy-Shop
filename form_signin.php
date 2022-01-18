<?php
session_start();
if (isset($_COOKIE['remember'])) {
    $token = $_COOKIE['remember'];
    require_once './admin/connect.php';
    $sql = "SELECT * FROM customers 
    WHERE token = '$token' limit 1 ";
    $result = mysqli_query($connect, $sql);
    $num_rows = mysqli_num_rows($result);
    if ($num_rows == 1) {
        $each = mysqli_fetch_array($result);
        $_SESSION['id'] = $each['id'];
        $_SESSION['name'] = $each['name'];
    }
    
}
if (isset($_SESSION['id'])) {
    header("Location:user.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập</title>
</head>
<body>
    <?php
    $error = '';
    if (isset($_GET['error'])) {
        $error = $_GET['error'];
    }
    $success = '';
    if (isset($_GET['success'])) {
        $success = $_GET['success'];
    }
    ?>
    <h1>Đăng nhập tài khoản</h1>
    <p style="color: red;">
        <?php echo $error; ?>
    </p>
    <p style="color: green;">
        <?php echo $success; ?>
    </p>
    <form action="process_signin.php" method="POST">
        Email 
        <input type="email" name="email"> <br>
        Mật khẩu
        <input type="password" name="password"> <br>
        Lưu thông tin đăng nhập
        <input type="checkbox" name="remember"> <br>
        <button>Đăng nhập</button>
    </form>
    <a href="forgot_password.php">Quên mật khẩu</a>
    <h3>Hoặc <a href="form_signup.php">Đăng kí</a> nếu bạn chưa có tài khoản</h3>
    
</body>
</html>