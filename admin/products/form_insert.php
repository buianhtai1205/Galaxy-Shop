<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form_Insert</title>
</head>
<body>
    <h1>Thêm sản phẩm</h1>

    <?php 
        require_once '../menu.php';
        require_once '../connect.php';

        $sql = "SELECT * FROM manufacturers";
        $result =  mysqli_query($connect, $sql);
        
        mysqli_close($connect);
    ?>

    <form action="process_insert.php" method="POST" enctype="multipart/form-data">
        Tên
        <input type="text" name="name"> <br>
        Ảnh
        <input type="file" name="image"> <br>
        Mô tả
        <textarea name="description" cols="20" rows="5"></textarea> <br>
        Giá
        <input type="number" name="price"> <br>
        Nhà sản xuất
        <select name="manufacturer_id">
            <?php foreach ($result as $each): ?>
                <option value="<?php echo $each['id']; ?>" >
                    <?php echo $each['name']; ?>
                </option>
            <?php endforeach; ?>
        </select> <br>
        <button>Thêm</button>
    </form>
</body>
</html>