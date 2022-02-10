<?php
    require_once '../check_admin_login.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Show</title>
</head>
<body>
    <h1>Thông tin chi tiết sản phẩm</h1>

    <?php
        include '../menu.php';
        $id = $_GET['id'];

        require_once '../connect.php';

        $sql = "SELECT * FROM products WHERE id = '$id' ";
        $array_results = mysqli_query($connect, $sql);
        $result = mysqli_fetch_array($array_results);

        $id_mnf = $result['manufacturer_id'];

        $sql_mnf = "SELECT * FROM manufacturers WHERE id = '$id_mnf' ";
        $array_result_mnf = mysqli_query($connect, $sql_mnf);
        $result_mnf = mysqli_fetch_array($array_result_mnf);

    ?>
    
    <h2>
        <?php echo $result['name']; ?>
    </h2>
    <h3>
        Giá: <?php echo $result['price']; ?> $
    </h3>
    <h3>
        Nhà sản xuất: <?php echo $result_mnf['name']; ?>
    </h3>
    <img width="500" src="images/<?php echo $result['image']; ?>" alt="">
    <h3>Cấu hình điện thoại <?php echo $result['name']; ?></h3>
    <h4>
        Màn hình: <?php echo $result['display']; ?>
    </h4>
    <h4>
        Hệ điều hành: <?php echo $result['os']; ?>
    </h4>
    <h4>
        Camera sau: <?php echo $result['main_camera']; ?>
    </h4>
    <h4>
        Camera trước: <?php echo $result['selfie_camera']; ?>
    </h4>
    <h4>
        Chip: <?php echo $result['chip']; ?>
    </h4>
    <h4>
        RAM: <?php echo $result['RAM']; ?>
    </h4>
    <h4>
        ROM: <?php echo $result['ROM']; ?>
    </h4>
    <h4>
        Sim: <?php echo $result['sim']; ?>
    </h4>
    <h4>
        Pin, Sạc: <?php echo $result['battery']; ?>
    </h4>
    <p>
        <?php echo nl2br($result['description']); ?>
    </p>

</body>
</html>
