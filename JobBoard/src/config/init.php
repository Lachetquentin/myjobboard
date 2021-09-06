<?php

// Démarrez la session
session_start();

setlocale(LC_TIME, "fr_FR");

// Fichier de configuration
require_once 'config.php';

$host = DB_HOST;
$user = DB_USER;
$pass = DB_PASS;
$dbname = DB_NAME;

$mysqli = mysqli_connect($host, $user, $pass, $dbname);


$_SESSION['total_pages'] = $mysqli->query('SELECT COUNT(*) FROM jobs')->fetch_row()[0];




$_SESSION['page'] = isset($_GET['page']) && is_numeric($_GET['page']) ? $_GET['page'] : 1;

$_SESSION['parPage'] = parPage;
$_SESSION['calcpage'] = ($_SESSION['page'] - 1) * $_SESSION['parPage'];

// Inclure le fichier d'aide
require_once 'helpers/system_helper.php';

// Autoloader
function __autoload($class_name) {
    require_once 'libs/'.$class_name.'.php';
}