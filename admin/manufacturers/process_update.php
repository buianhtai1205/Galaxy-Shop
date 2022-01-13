<?php

if(empty($_POST['name']) || empty($_POST['address']) || empty($_POST['phone']) || empty($_POST['image'])) {
    header("location:form_update.php?error=Phải điền đầy đủ thông tin");
    exit;
}

$id = addslashes($_POST['id']);
$name = addslashes($_POST['name']);
$address = addslashes($_POST['address']);
$phone = addslashes($_POST['phone']);
$image = addslashes($_POST['image']);

require_once '../connect.php';

$sql = "UPDATE manufacturers
SET name='$name', address='$address', phone='$phone', image='$image'
WHERE id = '$id'";


mysqli_query($connect, $sql);
$error = mysqli_error($connect);
mysqli_close($connect);

if(empty($error)) {
    header("location:index.php?success=Sửa thành công");
    exit;
} else {
    header("location:form_update.php?id=$id&error=Lỗi câu truy vấn");
}