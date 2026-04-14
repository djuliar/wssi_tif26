<?php
require_once '../../classes/AccessControl.php';
session_start();

AccessControl::isLoggedIn();

echo "Selamat datang, " . $_SESSION['user']['name'] . "!";
echo "<br><a href='../auth/logout.php'>Logout</a>";
?>