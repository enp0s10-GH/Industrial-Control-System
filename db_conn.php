<?php
include_once("config/config.php");
if (isset($DB_CONF)) {
    $conn = new mysqli($DB_CONF['DB_HOST'], $DB_CONF['DB_USER'], $DB_CONF['DB_PASS'], $DB_CONF['DB_NAME']);
    if ($conn->connect_errno) {
        echo "Failed to connect to MySQL: " . $conn->connect_error;
        exit();
    }
}



