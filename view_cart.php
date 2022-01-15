<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Giỏ hàng</title>
</head>
<body>
    <h1>Giỏ hàng của tôi</h1>

    <table border="1" width="100%">
        <tr>
            <th>Tên sản phẩm</th>
            <th>Hình ảnh</th>
            <th>Giá</th>
            <th>Số lượng</th>
            <th>Tổng</th>
            <th>Xóa</th>
        </tr>
        <?php if (!empty($_SESSION['cart'])) { ?>
            <?php foreach ($_SESSION['cart'] as $id => $each) { ?>
                <tr>
                    <th><?php echo $each['name']; ?></th>
                    <th><img height="100" src="./admin/products/images/<?php echo $each['image']; ?>" alt=""></th>
                    <th><?php echo $each['price']; ?> $</th>
                    <th>
                        <a style="text-decoration: none; padding: 0 12px;" href="update_product_in_cart.php?id=<?php echo $id; ?>&type=incre">+</a>
                        <?php echo $each['quantity']; ?>
                        <a style="text-decoration: none; padding: 0 12px;" href="update_product_in_cart.php?id=<?php echo $id; ?>&type=decre">-</a>
                    </th>
                    <th><?php echo $each['price']*$each['quantity']; ?> $</th>
                    <th><a href="delete_product_in_cart.php?id=<?php echo $id; ?>">Xóa</a></th>
                </tr>
            <?php } ?>
        <?php } else { ?>
            <h3>Không có sản phẩm trong giỏ hàng</h3>
        <?php } ?>
    </table>
</body>
</html>