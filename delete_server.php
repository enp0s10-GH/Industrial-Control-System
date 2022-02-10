<?php
session_start();
include_once("db_conn.php");
include_once("main.php");
if (isset($_SESSION['USERNAME'])) {
    if (!empty($_POST['serial'])) {
        $_SESSION['content'] = "RemoveServer";
        $sql = "DELETE FROM hardware WHERE ID='" . $_POST['serial'] . "';";
        if (isset($conn)) {
            $result = mysqli_query($conn, $sql);
            $_SESSION['hwdata'] = null;
            $_SESSION['query-error'] = null;
            $message = "> **Der Nutzer " . $_SESSION['USERNAME'] . " hat die Hardware " . $_POST['serial'] . " entfernt**";
            $APP = new App();
            $APP->send_log($message);
            header("Location: index.php");
        } else {
            $_SESSION['query-error'] = "Die Verbindung zur Datenbank ist fehlgeschlagen. Kontaktiere einen Server-Administrator";
            header("Location: index.php");
        }
    } else {
        $_SESSION['query-error'] = "Gib die Seriennummer des Servers an.";
        header("Location: index.php");
    }
}
