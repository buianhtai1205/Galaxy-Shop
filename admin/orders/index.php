<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đơn hàng</title>
</head>
<body>
    <h1>Quản lí đơn hàng</h1>
    <?php
        require_once '../connect.php';
        $sql = "SELECT orders.*, customers.name, customers.phone, customers.address
        FROM orders
        JOIN customers ON orders.customer_id = customers.id";
        $result = mysqli_query($connect, $sql);
    ?>

    <table border="1" width="100%">
        <tr>
            <th>Mã</th>
            <th>Thời gian đặt</th>
            <th>Thông tin người nhận</th>
            <th>Thông tin người đặt</th>
            <th>Tổng tiền</th>
            <th>Lời nhắn</th>
            <th>Trạng thái</th>
            <th>Xem chi tiết</th>
            <th>Duyệt đơn</th>
            <th>Hủy đơn</th>
        </tr>
        <?php foreach ($result as $each) : ?>
            <tr>
                <th><?php echo $each['id']; ?></th>
                <th><?php echo $each['created_at']; ?></th>
                <th>
                    <?php echo $each['name_receiver'] ; ?> <br>
                    <?php echo $each['phone_receiver'] ; ?> <br>
                    <?php echo $each['address_receiver'] ; ?> <br>
                </th>
                <th>
                    <?php echo $each['name'] ; ?> <br>
                    <?php echo $each['phone'] ; ?> <br>
                    <?php echo $each['address'] ; ?> <br>
                </th>
                <th><?php echo $each['total_price']; ?> $</th>
                <th><?php echo $each['message_receiver']; ?></th>
                <th>
                    <?php
                        if ($each['status'] == 0) {
                            echo 'Chưa duyệt';
                        } else if ($each['status'] == 1) {
                            echo 'Đã duyệt';
                        } else if ($each['status'] == -1) {
                            echo 'Đã hủy';
                        }
                    ?>
                </th>
                <th><a href="view_detail.php?id=<?php echo $each['id']; ?>">Xem</a></th>
                <th><a href="update_status.php?id=<?php echo $each['id']; ?>&status=1">Duyệt</a></th>
                <th><a href="update_status.php?id=<?php echo $each['id']; ?>&status=-1">Hủy</a></th>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>