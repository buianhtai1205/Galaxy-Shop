<?php
session_start();
if (empty($_SESSION['id'])) {
    header('Location:form_signin.php?error=Vui lòng đăng nhập trước khi đặt hàng!!!');
    exit;
}
$id = $_SESSION['id'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đặt hàng</title>
</head>
<body>
    <?php
        require_once './admin/connect.php';
        $sql = "SELECT * FROM customers
        WHERE id = '$id' ";
        $array_result = mysqli_query($connect, $sql);
        $result = mysqli_fetch_array($array_result);
    ?>
    <h1>Thông tin người nhận</h1>
    <form action="process_checkout.php" method="post">
        Tên
        <input type="text" name="name_receiver" value="<?php echo $result['name'] ?>"> <br>
        Số điện thoại
        <input type="text" name="phone_receiver" value="<?php echo $result['phone'] ?>"> <br>
        Địa chỉ nhận hàng
        <input type="text" name="address_receiver" value="<?php echo $result['address'] ?>"> <br>
        Lời nhắn với shop
        <input style="width: 300px;" type="text" name="message"> <br>
        <button>Đặt hàng</button>
    </form>
</body>
</html>