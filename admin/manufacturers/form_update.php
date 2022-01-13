<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Update</title>
</head>
<body>
    <h1>Cập nhật dữ liệu</h1>

    <?php
       include '../menu.php';
       include '../connect.php';

       $id = $_GET['id'];

       $sql = "SELECT * FROM manufacturers
       WHERE id = '$id' ";
       $result = mysqli_query($connect, $sql);
       $each = mysqli_fetch_array($result);
    ?>

    <form action="process_update.php" method="POST">
        <input type="hidden" name="id" value="<?php echo $each['id']; ?>">
        Tên
        <input type="text" name="name" value="<?php echo $each['name']; ?>"> <br>
        Địa chỉ
        <textarea name="address" id="" cols="30" rows="5"><?php echo $each['address']; ?></textarea> <br>
        Điện thoại 
        <input type="text" name="phone" value="<?php echo $each['phone']; ?>"> <br>
        Ảnh
        <input type="text" name="image" value="<?php echo $each['image']; ?>"> <br>
        <button>Sửa</button>
    </form>
</body>
</html>