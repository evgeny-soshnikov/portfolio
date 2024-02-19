<?php
declare(strict_types=1);

const OPERATION_EXIT = 0;
const OPERATION_ADD = 1;
const OPERATION_DELETE = 2;
const OPERATION_PRINT = 3;

$operations = [
    OPERATION_EXIT => OPERATION_EXIT . ". Завершить программу.",
    OPERATION_ADD => OPERATION_ADD . ". Добавить товар в список покупок.",
    OPERATION_DELETE => OPERATION_DELETE . ". Удалить товар из списка покупок.",
    OPERATION_PRINT => OPERATION_PRINT . ". Отобразить список покупок.",
];

$items = [];

function getOperationNumber(array $items, array $operations): string
{
    do {
        if (count($items)) {
            echo "Ваш список покупок: " . PHP_EOL;
            echo implode("\n", $items) . "\n";
        } else {
            echo "Ваш список покупок пуст." . PHP_EOL;
        }

        echo "Выберите операцию для выполнения: " . PHP_EOL;
        // Проверить, есть ли товары в списке? Если нет, то не отображать пункт про удаление товаров
        echo implode(PHP_EOL, $operations) . PHP_EOL . "> ";
        $operationNumber = trim(fgets(STDIN));

        if (!array_key_exists($operationNumber, $operations)) {
            system("cls"); // windows

            echo "!!! Неизвестный номер операции, повторите попытку." . PHP_EOL;
        }
    } while (!array_key_exists($operationNumber, $operations));

    return $operationNumber;
}

function addItem(): string
{
    echo "Введение название товара для добавления в список: \n> ";
    $itemName = trim(fgets(STDIN));

    return $itemName;
}

function deleteItem(array &$items): void
{
    // Проверить, есть ли товары в списке? Если нет, то сказать об этом и попросить ввести другую операцию
    echo "Список покупок: " . PHP_EOL;
    echo implode("\n", $items) . "\n";

    echo "Введение название товара для удаления из списка:" . PHP_EOL . "> ";
    $itemName = trim(fgets(STDIN));

    if (in_array($itemName, $items, true) !== false) {
        while (($key = array_search($itemName, $items, true)) !== false) {
            unset($items[$key]);
        }
    }
}

function printItem(array $items): void
{
    echo "Ваш список покупок: " . PHP_EOL;
    echo implode(PHP_EOL, $items) . PHP_EOL;
    echo "Всего " . count($items) . " позиций. " . PHP_EOL;
    echo "Нажмите enter для продолжения";
    fgets(STDIN);
}

do {
    // system('clear');
    system("cls"); // windows

    $operationNumber = getOperationNumber($items, $operations);

    echo "Выбрана операция: " . $operations[$operationNumber] . PHP_EOL;

    switch ($operationNumber) {
        case OPERATION_ADD:
            $items[] = addItem();
            break;

        case OPERATION_DELETE:
            deleteItem($items);
            break;

        case OPERATION_PRINT:
            printItem($items);
            break;
    }

    echo "\n ----- \n";
} while ($operationNumber > 0);

echo "Программа завершена" . PHP_EOL;