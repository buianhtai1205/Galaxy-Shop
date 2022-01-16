<?php

session_start();

if (empty($_SESSION['level_admin'])) {
    header("location:../index.php");
}