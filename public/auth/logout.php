<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/classes/Session.php';

$session = new Session();
$session->destroy();
header("Location: login.php");
exit;
?>
