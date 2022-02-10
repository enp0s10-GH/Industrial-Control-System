<?php
session_start();
include("db_conn.php");
include("main.php");
if (isset($_SESSION['USERNAME'])) {
    $_SESSION['content'] = "ListServers";
    if (isset($conn)) {
        $sql = "SELECT * FROM hardware WHERE LABEL='SERVER'";
        $result = mysqli_query($conn, $sql);
        $_SESSION['serverlist'] = null;
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $_SESSION['content'] = "ListServers";
                $_SESSION['serverlist'] .= "
                            <tr>
                            <td>" . $row['LABEL'] . "</td>
                            <td>" . $row['DATA'] . "</td>
                            <td>" . $row['ID'] . "<form action='searchcsrv.php' method='post' style='display: inline;''>
                            <input type='hidden' name='serial' value='".$row['ID']."'>
                            <button type='submit' ><i class='bx bx-link icon'></i></button>
                            </form></td>
                            <td>" . $row['PARENT_ID'] . "</td>
                            <td>" . $row['CREATED_BY'] . "</td>
                            <td>" . $row['LOCATION'] . "</td>
                            </tr>";
            }
            $message = "> **Der Nutzer " . $_SESSION['USERNAME'] . " hat sich die Serverliste anzeigen lassen**";
            $APP = new App();
            $APP->send_log($message);
            header("Location: index.php");
        } else {
            $_SESSION['query-error'] = "Derzeit gibt es keine Server zum anzeigen.";
            header("Location: index.php");
        }
    } else {
        $_SESSION['query-error'] = "Verbindung zur Datenbank ist fehlgeschlagen. Kontaktiere einen Server-Administrator";
        header("Location: index.php");
    }
} else {
    header("Location: index.php");
}