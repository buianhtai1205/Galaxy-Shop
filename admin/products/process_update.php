<?php 
$id = $_POST['id'];

if(empty($_POST['name']) || empty($_POST['description']) || empty($_POST['price'])) {
    header("location:form_update.php?error=Phải điền đầy đủ thông tin&id=$id");
    exit;
}


$name = addslashes($_POST['name']);
$image_new = $_FILES['image_new'];
if ($image_new['size'] > 0) {
    $folder = 'images/';
    $file_extension = explode('.', $image_new['name'])[1];
    $file_name = time() . '.' . $file_extension;
    $path_file = $folder . $file_name;

    move_uploaded_file($image_new["tmp_name"], $path_file);

    $path_file_name_old = $folder . $_POST['image_old'];
    unlink($path_file_name_old);
} else {
    $file_name = $_POST['image_old'];
}
$description = addslashes($_POST['description']);
$price = addslashes($_POST['price']);
$manufacturer_id = addslashes($_POST['manufacturer_id']);



require_once '../connect.php';

$sql = "UPDATE products
SET
name = '$name',
image = '$file_name',
description = '$description',
price = '$price',
manufacturer_id = '$manufacturer_id'
Where id = '$id'  " ;

mysqli_query($connect, $sql);
$error = mysqli_error($connect);
mysqli_close($connect);

if(empty($error)) {
    header("location:index.php?success=Sửa thành công");
    exit;
} else {
    header("location:form_update.php?id=$id&error=Lỗi câu truy vấn");
}