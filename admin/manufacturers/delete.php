<?php

$id = $_GET['id'];

require_once '../connect.php';

$sql = "DELETE FROM manufacturers
WHERE id = '$id'";


mysqli_query($connect, $sql);
mysqli_close($connect);

header("location:index.php?success=Xóa thành công");
