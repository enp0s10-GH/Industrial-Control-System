<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();
include_once("db_conn.php");
include_once("main.php");
if (!isset($_SESSION['USERNAME'])) {
    $_SESSION['error'] = null;
        if (isset($_POST['username']) && isset($_POST['password'])) {
            $username = $_POST['username'];
            $password = $_POST['password'];
            if (isset($conn)) {
                $sql = "SELECT * FROM accounts WHERE USERNAME='" . $username . "'";
                $result = mysqli_query($conn, $sql);
                if (mysqli_num_rows($result) === 1) {
                    $row = mysqli_fetch_assoc($result);
                    if ($row['PASSWORD'] === hash('sha256', $password)) {
                        if ($row['USERNAME'] === $username) {
                            $_SESSION['USERNAME'] = $row['USERNAME'];
                            $_SESSION['ID'] = $row['ID'];
                            $_SESSION['CREATED_AT'] = $row['CREATED_AT'];
                            $_SESSION['ADMIN'] = $row['ADMIN'];
                            $_SESSION['EMAIL'] = $row['EMAIL'];
                            $message = "> **Der Nutzer " . $_SESSION['USERNAME'] . " hat sich gerade angemeldet.**";
                            $APP = new App();
                            $APP->send_log($message);
                            header("Location: index.php");
                        } else {
                            $_SESSION['error'] = "Dieser Nutzername wurde nicht gefunden";
                            header("Location: login_frontend.php");
                        }
                    } else {
                        $_SESSION['error'] = "Falsches Passwort";
                        header("Location: login_frontend.php");
                    }
                } else {
                    $_SESSION['error'] = "Dieser Nutzername wurde nicht gefunden";
                    header("Location: login_frontend.php");
                }
            } else {
                echo "Connection failed";
            }
        } else {
            echo "Test";
        }
} else {

    header("Location: index.php");

}