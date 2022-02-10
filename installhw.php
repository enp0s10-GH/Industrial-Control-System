<?php
session_start();
require_once("db_conn.php");
require_once("main.php");
if (isset($_SESSION['USERNAME'])) {
    $_SESSION['content'] = "Dashboard";
    if (!empty($_POST['new']) && !empty($_POST['serial'])) {
        if (is_numeric($_POST['new']) && is_numeric($_POST['serial'])) {
            if (isset($conn)) {
                $sql = "UPDATE `hardware` SET `PARENT_ID` = '".$_POST['serial']."' WHERE `hardware`.`ID` = '".$_POST['new']."'";
                if (mysqli_query($conn, $sql)) {
                    $_SESSION['query-error'] = null;
                    $_SESSION['success'] = "Die Hardware wurde installiert.";
                    header("Location: index.php");
                } else {
                    $_SESSION['query-error'] = "Eine der Seriennummern war ungültig.";
                    header("Location: index.php");
                }
            }
        } else {
            $_SESSION['query-error'] = "Eine der Seriennummern war ungültig.";
            header("Location: index.php");
        }
    } else {
        $_SESSION['query-error'] = "Eine der Seriennummern war ungültig.";
        header("Location: index.php");
    }
}
