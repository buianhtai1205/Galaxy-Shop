<?php
    require_once '../check_admin_login.php';
?>
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
        Màn hình
        <input type="text" name="display"> <br>
        Hệ điều hành
        <input type="text" name="os"> <br>
        Camera sau
        <input type="text" name="main_camera"> <br>
        Camera trước
        <input type="text" name="selfie_camera"> <br>
        Chip
        <input type="text" name="chip"> <br>
        RAM 
        <input type="text" name="RAM"> <br>
        ROM 
        <input type="text" name="ROM"> <br>
        Sim 
        <input type="text" name="sim"> <br>
        Dung lượng pin 
        <input type="text" name="battery"> <br>
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