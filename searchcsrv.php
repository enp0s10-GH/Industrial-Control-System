<?php
session_start();
require_once("db_conn.php");
require_once("main.php");
if (isset($_SESSION['USERNAME'])) {
    $_SESSION['query-error'] = null;
    if(isset($_POST['serial'])) {
        $_SESSION['content'] = "HWInfo";
        $serial = $_POST['serial'];
        $_SESSION['serial'] = $serial;
        $sql = "SELECT * FROM hardware WHERE PARENT_ID='" . $serial . "';";
        if (isset($conn)) {
            $result = mysqli_query($conn, $sql);
            $_SESSION['hwdata'] = null;
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $_SESSION['hwdata'] .= "
                            <tr>
                            <td>" . $row['LABEL'] . "</td>
                            <td>" . $row['DATA'] . "</td>
                            <td>" . $row['ID'] . "</td>
                            <td>" . $row['PARENT_ID'] . "</td>
                            <td>" . $row['CREATED_BY'] . "</td>
                            <td>" . $row['LOCATION'] . "</td>
                            </tr>";
                }
                $message = "> **Der Nutzer " . $_SESSION['USERNAME'] . " hat Informationen vom Server " . $_POST['serial'] . " geholt**";
                $APP = new App();
                $APP->send_log($message);
                header("Location: index.php");
            } else {
                $subsql = "SELECT * FROM hardware WHERE ID='" . $serial . "';";
                $subresult = mysqli_query($conn, $subsql);
                if ($subresult->num_rows > 0) {
                    while ($subrow = $subresult->fetch_assoc()) {
                        $_SESSION['hwdata'] .= "
                            <tr>
                            <td>" . $subrow['LABEL'] . "</td>
                            <td>" . $subrow['DATA'] . "</td>
                            <td>" . $subrow['ID'] . "</td>
                            <td>" . $subrow['PARENT_ID'] . "</td>
                            <td>" . $subrow['CREATED_BY'] . "</td>
                            <td>" . $subrow['LOCATION'] . "</td>
                            </tr>";
                    }
                    $message = "> **Der Nutzer " . $_SESSION['USERNAME'] . " hat sich Informationen von der Hardware " . $_POST['serial'] . " geholt**";
                    $APP = new App();
                    $APP->send_log($message);
                    header("Location: index.php");
                } else {
                    $_SESSION['query-error'] = "Gib eine gültige Seriennummer an.";
                    header("Location: index.php");
                }
            }
        } else {
            $_SESSION['query-error'] = "Die Verbindung zur Datenbank ist fehlgeschlagen. Kontaktiere einen Server-Administrator";
            header("Location: index.php");
        }
    } else {
        $_SESSION['query-error'] = "Gib die Seriennummer des Servers an.";
        header("Location: index.php");
    }
    } else {
    header("Location: login_frontend.php");
}