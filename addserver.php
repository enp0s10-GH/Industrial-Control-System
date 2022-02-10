<?php
session_start();
include_once("db_conn.php");
include_once("main.php");
if (isset($_SESSION['USERNAME'])) {
    if(!empty($_POST['server-type'])) {
        if(!empty($_POST['LOCATION'])) {
            $_SESSION['query-error'] = null;
            $_SESSION['content'] = "AddServer";
            $sql = "INSERT INTO `hardware` (`ID`, `PARENT_ID`, `CREATED_BY`, `LABEL`, `DATA`, `LOCATION`) VALUES (UUID_SHORT(), NULL, '" . $_SESSION['USERNAME'] . "', 'SERVER', '" . $_POST['server-type'] . "','".$_POST['LOCATION']."');";
            if (isset($conn)) {
                mysqli_query($conn, $sql);
                $message = "> **Der Nutzer " . $_SESSION['USERNAME'] . " hat den Server " . $_POST['server-type'] . "@".$_POST['LOCATION']." hinzugefügt.**";
                $APP = new App();
                $APP->send_log($message);
                header("Location: index.php");
            }
        } else {
            $_SESSION['query-error'] = "Gib den Standort des Servers an.";
            header("Location: index.php");
        }
    } else {
        $_SESSION['query-error'] = "Gib den Namen des Servers an.";
        header("Location: index.php");
    }
}
