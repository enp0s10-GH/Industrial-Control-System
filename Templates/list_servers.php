<?php
session_start();
if (isset($_SESSION['USERNAME'])) {
    if (isset($_SESSION['serverlist'])) {
        ?>
        <html>
        <head>
            <title>Hardware - ICS</title>
            <link rel="stylesheet" href="../css/template.css">
        </head>
        <body>
        <?php if (!empty($_SESSION['query-error'])) {
            echo "<p id='query-error'>" . $_SESSION['query-error'] . "</p>";
        } ?>
        <h1 id="topic">Serverliste</h1>
        <table class="table">
            <tr>
                <th>Bauteil</th>
                <th>Informationen</th>
                <th>Seriennummer</th>
                <th>Eingebaut in</th>
                <th>Gebaut von</th>
                <th>Standort</th>
            </tr>
            <?php echo $_SESSION['serverlist']; ?>
        </table>
        </body>
        </html>
        <?php
    } else {
        if (!empty($_SESSION['query-error'])) {
            echo "<p id='query-error'>" . $_SESSION['query-error'] . "</p>";
        }
    }
} else {
    header("Location: login_frontend.php");
}
?>
