<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <a href="index.php">Quay lại</a> <br>
    <h1>Thông tin chi tiết</h1>
    
    <?php
        $order_id = $_GET['id'];
        $sum = 0;
        
        require_once '../connect.php';
        $sql = "SELECT * FROM order_product
        JOIN products ON products.id = order_product.product_id
        WHERE order_id = '$order_id'";
        $result = mysqli_query($connect, $sql);
    ?>

    <table border="1" width="100%">
        <tr>
            <th>Tên sản phẩm</th>
            <th>Hình ảnh</th>
            <th>Giá</th>
            <th>Số lượng</th>
            <th>Tổng</th>
        </tr>
        <?php foreach ($result as $each) { ?>
            <tr>
                <th><?php echo $each['name']; ?></th>
                <th><img height="100" src="../products/images/<?php echo $each['image']; ?>" alt=""></th>
                <th><?php echo $each['price']; ?> $</th>
                <th><?php echo $each['quantity']; ?></th>
                <th>
                    <?php
                        $result = $each['price']*$each['quantity'];
                        $sum += $result;
                        echo $result; 
                    ?> $
                </th>
            </tr>
        <?php } ?>
    </table>
    <h3>Tổng giá trị hóa đơn: <?php echo $sum; ?> $</h3>
</body>
</html>