<?php
    require_once '../check_admin_login.php';

$name = addslashes($_POST['name']);
$image = $_FILES['image'];
$description = addslashes($_POST['description']);
$price = addslashes($_POST['price']);
$display = addslashes($_POST['display']);
$os = addslashes($_POST['os']);
$main_camera = addslashes($_POST['main_camera']);
$selfie_camera = addslashes($_POST['selfie_camera']);
$chip = addslashes($_POST['chip']);
$RAM = addslashes($_POST['RAM']);
$ROM = addslashes($_POST['ROM']);
$sim = addslashes($_POST['sim']);
$battery = addslashes($_POST['battery']);
$manufacturer_id = addslashes($_POST['manufacturer_id']);

$folder = 'images/';
$file_extension = explode('.', $image['name'])[1];
$file_name = time() . '.' . $file_extension;
$path_file = $folder . $file_name;

move_uploaded_file($image["tmp_name"], $path_file);

require_once '../connect.php';

$sql = "INSERT INTO products(name, image, description, price, display, os, main_camera, selfie_camera, chip, RAM, ROM, sim, battery, manufacturer_id)
VALUES('$name', '$file_name', '$description', '$price', '$display', '$os', '$main_camera', '$selfie_camera', '$chip', '$RAM', '$ROM', '$sim', '$battery', '$manufacturer_id') " ;

mysqli_query($connect, $sql);
$error = mysqli_error($connect);
mysqli_close($connect);

if(empty($error)) {
    header('location:index.php?success=Thêm thành công');
    exit;
} else {
    header("location:form_insert.php?error=Lỗi câu truy vấn");
}