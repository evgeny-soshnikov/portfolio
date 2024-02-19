<?php
declare(strict_types=1);

$uploadDir = "upload/";
$ext = substr($_FILES["content"]["name"], strpos($_FILES["content"]["name"],'.'), strlen($_FILES["content"]["name"])-1);
$uploadFile = $uploadDir . $_REQUEST['file_name'] . $ext;

if ($_FILES["content"]["size"] === 0) {
    header("Location: index.html");
} else {
    if (move_uploaded_file($_FILES["content"]["tmp_name"], $uploadFile)) {
        echo "Путь к сохраненному файлу - " . $uploadFile . "\n" . "Размер файла - " . $_FILES["content"]["size"];
    } else {
        header("Location: index.html");
    }
}
