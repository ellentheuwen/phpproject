<?php
    include_once("settings.inc.php"); // PRIVE

    $server = $settings['server'];
    $user = $settings['user'];
    $password = $settings['password'];
    $db = $settings['database'];

    $conn = new mysqli($server, $user, $password, $db);
?>