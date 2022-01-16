<?php
    require_once '../check_admin_login.php';

$id = $_GET['id'];
$path_file = $_GET['path_file'];

require_once "../connect.php";

$sql = "DELETE FROM products
WHERE id = '$id'";


unlink($path_file);

mysqli_query($connect, $sql);
mysqli_close($connect);

header("location:index.php?success=Xóa thành công");