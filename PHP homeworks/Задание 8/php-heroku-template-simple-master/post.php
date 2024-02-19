<?php
declare(strict_types=1);

session_start();

$_SESSION['username'] = $_REQUEST['username'];

header ('Location: index.php');

?>