<?php

class IPManager {
    function get_ip() {
        return $_SERVER['REMOTE_ADDR'];
    }
}

class ErrorHandler {
    function throw($code, $defined) {
        header("Location: https://ics.enforcerdev.de/error.php?error=" . $code . "&defined=" . $defined);
    }
}

class Account {
    function logout() {
        session_start();
        if (isset($_SESSION['USERNAME'])) {
            $message = "> **Der Nutzer " . $_SESSION['USERNAME'] . " hat sich gerade abgemeldet.**";
            $APP = new App();
            $APP->send_log($message);
            session_unset();
            session_destroy();
            session_start();
            $_SESSION['message'] = "Du hast dich ausgeloggt.";
            header("Location: login_frontend.php");
            exit();
        } else {
            header("Location: login_frontend.php");
        }
    }


}

class App {
    function send_log($content) {
        $webhookurl = "DEINE_WEBHOOK_URI";
        $json_data = json_encode([
            "content" => $content,
            "username" => "LogBot",
        ], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);

        $ch = curl_init($webhookurl);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-type: application/json'));
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $json_data);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $response = curl_exec($ch);
        curl_close($ch);

    }
}
