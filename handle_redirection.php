<?php 
session_start();
if(isset($_SESSION['USERNAME'])) {
    if (isset($_GET['content'])) {
        $_SESSION['content'] = $_GET['content'];
        header("Location: index.php");
        exit();
    }
} else {
    header("Location: login_frontend.php");
}