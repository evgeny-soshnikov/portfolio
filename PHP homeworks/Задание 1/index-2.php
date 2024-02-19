<?php

// Задание 3, вариант 1

$variable = true;

if (is_bool($variable)) {
    $type = "is bool";
} elseif (is_float($variable)) {
    $type = "is float";
} elseif (is_int($variable)) {
    $type = "is int";
} elseif (is_string($variable)) {
    $type = "is string";
} elseif (is_null($variable)) {
    $type = "is null";
} else {
    $type = "is other";
}

echo "type {$type}";