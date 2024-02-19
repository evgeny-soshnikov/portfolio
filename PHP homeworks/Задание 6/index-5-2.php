<?php
declare(strict_types= 1);

header('Content-Disposition: attachment; filename="downloaded.txt"');
echo $_GET['text'];
?>