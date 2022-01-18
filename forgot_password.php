<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quên mật khẩu</title>
</head>
<body>
    <?php
        $error = '';
        if(isset($_GET['error'])) {
            $error = $_GET['error'];
        }
        $success = '';
        if(isset($_GET['success'])) {
            $success = $_GET['success'];
        }
    ?>
    <a href="form_signin.php">Quay lại đăng nhập</a>
    <h1>Quên mật khẩu</h1>
    <p style="color: red"><?php echo $error; ?></p>
    <p style="color: green"><?php echo $success; ?></p>
    <form action="process_forgot_password.php" method="post">
        Email
        <input type="email" name="email"> <br>
        <button>Gửi mail đổi mật khẩu</button>
    </form>
</body>
</html>