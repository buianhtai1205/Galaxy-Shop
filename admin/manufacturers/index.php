<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manufacturers</title>
</head>
<body>
    <h1>Đây là giao diện nhà sản xuất.</h1>

    <?php
    include '../menu.php';
    ?>

    <?php
    $page = 1;
    if (isset($_GET['page'])) {
        $page = $_GET['page'];
    }

    $search = "";
    if (isset($_GET['search'])) {
        $search = $_GET['search'];
    }

    require_once "../connect.php";

    $sql_total_rows = "SELECT COUNT(*) FROM manufacturers
    WHERE name like '%$search%' ";
    $array_result_total_rows = mysqli_query($connect, $sql_total_rows);
    $result_total_rows = mysqli_fetch_array($array_result_total_rows);
    $total_rows = $result_total_rows['COUNT(*)'];

    $rows_on_page = 4;
    $number_pages = ceil($total_rows / $rows_on_page);
    $skip = $rows_on_page * ($page - 1);


    $sql = "SELECT * FROM manufacturers 
    WHERE name like '%$search%' 
    LIMIT $rows_on_page OFFSET $skip ";
    $result = mysqli_query($connect, $sql);

    ?>

    <div>
        <a href="form_insert.php">Thêm</a>
    </div>

    <form>
        <input style="width: 20%;" type="search" name="search" value="<?php echo $search; ?>">
    </form>

    <table border="1" width="100%" >
        <tr>
            <th>Mã</th>
            <th>Tên</th>
            <th>Địa chỉ</th>
            <th>Điện thoại</th>
            <th>Ảnh</th>
            <th>Sửa</th>
            <th>Xóa</th>
        </tr>
        <?php foreach($result as $each) {?>
            <tr>
                <th>
                    <?php echo $each['id']; ?>
                </th>
                <th>
                    <?php echo $each['name']; ?>
                </th>
                <th>
                    <?php echo $each['address']; ?>
                </th>
                <th>
                    <?php echo $each['phone']; ?>
                </th>
                <th>
                    <img width="100" src="<?php echo $each['image']; ?>" alt="">
                </th>
                <th>
                    <a href="form_update.php?id=<?php echo $each['id']; ?>">Sửa</a>
                </th>
                <th>
                    <a href="delete.php?id=<?php echo $each['id']; ?>">Xóa</a>
                </th>
            </tr>
        <?php } ?>
    </table>

    <?php for ($i=1; $i<=$number_pages; $i++) { ?>
        <a style="padding: 8px;" href="?page=<?php echo $i; ?>&search=<?php echo $search; ?>">
            <?php echo $i; ?>
        </a>
    <?php } ?>
</body>
</html>