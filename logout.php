<?php
session_start();
unset($_SESSION['IS_LOGIN']);
unset($_SESSION['EMAIL']);
header('location:login.php');
die();
?>