<?php
declare(strict_types= 1);

session_start();

if (isset($_SESSION['count'])) {
    echo 'Количество открытий страницы 3: ' . $_SESSION['count'];
}

?>