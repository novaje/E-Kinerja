<?php
session_start();
if (!isset($_SESSION['username']) || empty($_SESSION['username'])) {
    // header("location:../E-Kinerja/signin.php");
    header("location:./signin.php");
}
$user = $_SESSION['username'];
?>