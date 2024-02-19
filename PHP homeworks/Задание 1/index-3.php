<?php

// Задание 3, вариант 2

$variableNew = 1.21;

switch (true) {
    case is_bool($variableNew):
        $typeNew = "is bool";
        break;

    case is_int($variableNew):
        $typeNew = "is int";
        break;

    case is_float($variableNew):
        $typeNew = "is float";
        break;

    case is_string($variableNew):
        $typeNew = "is string";
        break;

    case is_bool($variableNew):
        $typeNew = "is bool";
        break;

    case is_null($variableNew):
        $typeNew = "is null";
        break;

    default:
        $typeNew = "is other";
}

echo "type {$typeNew}";