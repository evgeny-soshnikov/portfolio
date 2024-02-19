<?php

echo "Введите имя: ";
$name = trim(fgets(STDIN));
echo "Введите отчество: ";
$middleName = trim(fgets(STDIN));
echo "Введите фамилию: ";
$surname = trim(fgets(STDIN));

$fullName = mb_convert_case($surname, MB_CASE_TITLE, "UTF-8") . " " . mb_convert_case($name, MB_CASE_TITLE, "UTF-8") . " " . mb_convert_case($middleName, MB_CASE_TITLE, "UTF-8");

$surnameAndInitials = mb_convert_case($surname, MB_CASE_TITLE, "UTF-8") . " " . mb_convert_case(mb_substr($name,0,1), MB_CASE_UPPER, "UTF-8").".".mb_convert_case(mb_substr($middleName,0,1), MB_CASE_UPPER, "UTF-8").".";

$fio = mb_convert_case(mb_substr($surname,0,1), MB_CASE_UPPER, "UTF-8").mb_convert_case(mb_substr($name,0,1), MB_CASE_UPPER, "UTF-8").mb_convert_case(mb_substr($middleName,0,1), MB_CASE_UPPER, "UTF-8");


fwrite(STDOUT, "Полное имя: '{$fullName}'" . PHP_EOL);
fwrite(STDOUT, "Фамилия и инициалы: '{$surnameAndInitials}'" . PHP_EOL);
fwrite(STDOUT, "Аббревиатура: '{$fio}'" . PHP_EOL);