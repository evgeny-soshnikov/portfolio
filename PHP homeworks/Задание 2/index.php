<?php

echo "Введите делимое: ";
$firstNumber = trim(fgets(STDIN));
echo "Введите делитель: ";
$secondNumber = trim(fgets(STDIN));

if ($secondNumber == 0) {
    fwrite(STDOUT, "Делить на 0 нельзя" . PHP_EOL);
} elseif (is_numeric($firstNumber) && is_numeric($secondNumber)) {
    fwrite(
        STDOUT,
        "Результат деления: " . $firstNumber / $secondNumber . PHP_EOL
    );
} else {
    fwrite(STDOUT, "Введите, пожалуйста, число" . PHP_EOL);
    if (!is_numeric($firstNumber)) {
        fwrite(STDOUT, "Делимое - не число" . PHP_EOL);
    }
    if (!is_numeric($secondNumber)) {
        fwrite(STDOUT, "Делитель - не число" . PHP_EOL);
    }
}