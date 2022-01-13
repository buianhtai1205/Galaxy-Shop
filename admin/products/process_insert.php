<?php 

$name = addslashes($_POST['name']);
$image = $_FILES['image'];
$description = addslashes($_POST['description']);
$price = addslashes($_POST['price'];
$manufacturer_id = addslashes($_POST['manufacturer_id']);

$folder = 'images/';
$file_extension = explode('.', $image['name'])[1];
$file_name = time() . '.' . $file_extension;
$path_file = $folder . $file_name;

move_uploaded_file($image["tmp_name"], $path_file);

require_once '../connect.php';

$sql = "INSERT INTO products(name, image, description, price, manufacturer_id)
VALUES('$name', '$file_name', '$description', '$price', '$manufacturer_id') " ;

mysqli_query($connect, $sql);
$error = mysqli_error($connect);
mysqli_close($connect);

if(empty($error)) {
    header('location:index.php?success=Thêm thành công');
    exit;
} else {
    header("location:form_insert.php?error=Lỗi câu truy vấn");
}