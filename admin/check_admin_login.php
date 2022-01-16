<?php
session_start();

if (!isset($_SESSION['level_admin'])) {
    header("location:../index.php");
}