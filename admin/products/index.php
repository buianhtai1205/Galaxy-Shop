<?php
    require_once '../check_admin_login.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>
</head>
<body>
    <h1>Đây là giao diện quản lí sản phẩm</h1>

    <?php
    include "../menu.php";
    require_once '../connect.php';

    $sql = "SELECT * FROM products";
    $result = mysqli_query($connect, $sql);
    ?>
    <div>
        <a href="form_insert.php">Thêm</a>
    </div>

    <table width="100%" border="1" >
        <tr>
            <th>Mã</th>
            <th>Tên</th>
            <th>Hình ảnh</th>
            <th>Giá</th>
            <th>Xem Chi tiết</th>
            <th>Sửa</th>
            <th>Xóa</th>
        </tr>
        <?php foreach ($result as $each): ?>
            <tr>
                <th><?php echo $each['id']; ?></th>
                <th><?php echo $each['name']; ?></th>
                <th>
                    <img width="100" src="images/<?php echo $each['image']; ?>" alt="">
                </th>
                <th><?php echo $each['price']; ?> $</th>
                <th><a href="show.php?id=<?php echo $each['id']; ?>">Xem</a></th>
                <th>
                    <a href="form_update.php?id=<?php echo $each['id']; ?>">Sửa</a>
                </th>
                <th>
                    <a href="delete.php?id=<?php echo $each['id']; ?>&path_file=images/<?php echo $each['image']; ?>">Xóa</a>
                </th>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>