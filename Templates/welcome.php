<?php
session_start();
$_SESSION['query-error'] = null;
if (isset($_SESSION['USERNAME'])) {
    ?>
    <head>
        <title>Welcome - ICS</title>
        <link rel="stylesheet" href="../css/style.css">
    </head>
    <div class="welcome-container">
        <h1 id="welcome-topic">Wilkommen im ICS</h1>
        <p id="welcome-msg">Das ICS ist ein internes Warenwirtschaftssystem, zugeschnitten
                            für Hosting Unternehmen und geeignet um leicht
                            den aktuellen Lagerbestand anzeigen zu lassen,
                            änderungen vorzunehmen oder dergleichen</p>
    </div>
<?php
}
