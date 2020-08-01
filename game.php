<?php
require_once 'inc/config.php';
require_once 'inc/funcs.inc.php';

if (!isset($_SESSION)) {
    session_start();
    var_dump($_SESSION);
}
$user = $_SESSION['user'];
echo '<h1>Hello, ' . $user . '</h1>';


?>