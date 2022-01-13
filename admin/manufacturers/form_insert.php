<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Insert</title>
</head>
<body>
    <h1>Thêm dữ liệu</h1>

    <?php
        include '../menu.php';
    ?>

    <form action="process_insert.php" method="POST">
        Tên
        <input type="text" name="name"> <br>
        Địa chỉ
        <textarea name="address" id="" cols="30" rows="5"></textarea> <br>
        Điện thoại 
        <input type="text" name="phone"> <br>
        Ảnh
        <input type="text" name="image"> <br>
        <button>Thêm</button>
    </form>
</body>
</html>