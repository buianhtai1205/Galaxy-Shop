<?php

$id = $_GET['id'];
$status = $_GET['status'];

require_once '../connect.php';

$sql = "UPDATE orders set status= '$status' WHERE id = '$id'";
mysqli_query($connect, $sql);
header("Location:index.php");