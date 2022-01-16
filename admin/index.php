<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
</head>
<body>
    <?php
        $error = '';
        if(isset($_GET['error'])) {
            $error = $_GET['error'];
        }
    ?>
    <h1>Đăng nhập Admin</h1>
    <p style="color: red;"><?php echo $error; ?></p>
    <form action="process_login_admin.php" method="post">
        Email
        <input type="email" name="email"> <br>
        Mật khẩu
        <input type="password" name="password"> <br>
        <button>Đăng nhập</button>
    </form>
</body>
</html>