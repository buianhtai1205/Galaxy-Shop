<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form_Update</title>
</head>
<body>
    <h1>Cập nhật sản phẩm</h1>

    <?php
        $id = $_GET["id"]; 
        require_once '../menu.php';
        require_once '../connect.php';

        $sql = "SELECT * FROM products
        WHERE id = '$id' ";
        $result =  mysqli_query($connect, $sql);
        $each = mysqli_fetch_array($result);

        $sql = "SELECT * FROM manufacturers";
        $manufacturers =  mysqli_query($connect, $sql);
        
        mysqli_close($connect);
    ?>

    <form action="process_update.php" method="POST" enctype="multipart/form-data">
        <input hidden type="text" name="id" value="<?php echo $id; ?>" >
        Tên
        <input type="text" name="name" value="<?php echo $each['name']; ?>"> <br>
        Đổi ảnh mới
        <input type="file" name="image_new"> <br>
        Ảnh củ
        <img width="200" src="images/<?php echo $each['image']; ?>" alt=""> <br>
        <input hidden type="text" name="image_old" value="<?php echo $each['image']; ?>">
        Mô tả
        <textarea name="description" cols="20" rows="5"><?php echo $each['description']; ?></textarea> <br>
        Giá
        <input type="number" name="price" value="<?php echo $each['price']; ?>"> <br>
        Nhà sản xuất
        <select name="manufacturer_id">
            <?php foreach ($manufacturers as $manufacturer): ?>
                <option value="<?php echo $manufacturer['id']; ?>" <?php if ($manufacturer['id'] == $each['manufacturer_id'] ) echo 'selected'; ?> >
                    <?php echo $manufacturer['name']; ?>
                </option>
            <?php endforeach; ?>
        </select> <br>
        <button>Sửa</button>
    </form>
</body>
</html>