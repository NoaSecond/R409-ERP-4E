<?php
$dbHost = "localhost";
$dbUser = "lm105079";
$dbPassword = "";
$dbName = "lm105079_R409Database";

function createDbConnection() {
    global $dbHost;
    global $dbUser;
    global $dbPassword;
    global $dbName;

    if (!isset($dbHost) || !isset($dbName) || !isset($dbPassword) || !isset($dbUser)) {
        trigger_error('Les variables globales nécessaires à la connexion à la base de données ne sont pas définies.', E_USER_ERROR);
    }
    $db = mysqli_connect($dbHost, $dbUser, $dbPassword, $dbName);
    if (!$db) {
        trigger_error('Impossible de se connecter à la base de données.', E_USER_ERROR);
    }
    return $db;
}
?>