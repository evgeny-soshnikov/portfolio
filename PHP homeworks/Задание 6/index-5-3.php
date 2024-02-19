<?php
declare(strict_types= 1);

session_start();

$_SESSION['count'] = isset($_SESSION['count']) ? ++$_SESSION['count'] : 0;

if (is_int($_SESSION['count'] / 3 )) {
    header ('Location: /index-5-4.php');
} 

?>