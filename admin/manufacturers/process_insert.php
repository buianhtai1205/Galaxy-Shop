<?php

if(empty($_POST['name']) || empty($_POST['address']) || empty($_POST['phone']) || empty($_POST['image'])) {
    header('location:form_insert.php?error=Phải điền đầy đủ thông tin');
    exit;
}

$name = addslashes($_POST['name']);
$address = addslashes($_POST['address']); 
$phone = addslashes($_POST['phone']);
$image = addslashes($_POST['image']);

require_once '../connect.php';

$sql = "INSERT INTO manufacturers(name, address, phone, image)
VALUES('$name', '$address', '$phone', '$image')";


mysqli_query($connect, $sql);
$error = mysqli_error($connect);
mysqli_close($connect);

if(empty($error)) {
    header('location:index.php?success=Thêm thành công');
    exit;
} else {
    header("location:form_insert.php?error=Lỗi câu truy vấn");
}