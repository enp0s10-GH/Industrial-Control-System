<?php
session_start();
require_once("db_conn.php");
require_once("main.php");
if (isset($_SESSION['USERNAME'])) {
    $_SESSION['content'] = "Dashboard";
    if (!empty($_POST['new']) && !empty($_POST['old']) && !empty($_POST['serial']) && !empty($_POST['stock'])) {
        if (is_numeric($_POST['new']) && is_numeric($_POST['old']) && is_numeric($_POST['stock']) && is_numeric($_POST['serial'])) {
            if (isset($conn)) {
                $sql = "UPDATE `hardware` SET `PARENT_ID` = '" . $_POST['serial'] . "' WHERE `hardware`.`ID` = '" . $_POST['new'] . "';";
                $sql .= "UPDATE `hardware` SET `PARENT_ID` = '" . $_POST['stock'] . "' WHERE `hardware`.`ID` = '" . $_POST['old'] . "';";
                if (mysqli_multi_query($conn, $sql)) {
                    $_SESSION['success'] = "Die Hardware wurde getauscht.";
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
