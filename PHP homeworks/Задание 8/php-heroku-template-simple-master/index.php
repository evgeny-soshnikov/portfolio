<?php
declare(strict_types=1);

session_start();

if (isset($_SESSION['username'])) {
    echo 'Привет, ' . $_SESSION['username'];
    include 'index-2.html'; 
} else {
    include 'index.html';
}

?>