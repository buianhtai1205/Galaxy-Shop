<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng Ký</title>
</head>
<body>
    <?php
    $error = '';
    if (isset($_GET['error'])) {
        $error = $_GET['error'];
    }
    ?>
    <h1>Đăng ký tài khoản</h1>
    <p style="color: red;">
        <?php echo $error; ?>
    </p>
    <form action="process_signup.php" method="POST">
        Họ và tên
        <input type="text" name="name"> <br>
        Email 
        <input type="email" name="email"> <br>
        Mật khẩu
        <input type="password" name="password"> <br>
        
        <button>Đăng ký</button>
    </form>
    <h3>Hoặc <a href="form_signin.php">Đăng nhập</a> nếu bạn đã có tài khoản</h3>
    
</body>
</html>