<?php
declare(strict_types=1);

function schedule(int $year, int $month): string
{
    $fullDate = "01-" . $month . "-" . $year;
    $dateObject = date_create_from_format("j-m-Y", $fullDate);
    $monthName = date_format($dateObject, "F");
    $monthInt = (int) date_format($dateObject, "m");
    $yearInt = (int) date_format($dateObject, "Y");
    $dayInt = (int) date_format($dateObject, "j");
    $weekDay = (int) date_format($dateObject, "N");
    $daysQuantity = cal_days_in_month(CAL_GREGORIAN, $monthInt, $yearInt);

    $weekendsArray = [];
    $weekendsCounter = 0;

    for ($i = $dayInt; $i <= $daysQuantity; $i += 1) {
        if ($weekDay === 6) {
            $weekendsArray[] = $i . "-е";
            $weekDay = (int) date_format(date_modify($dateObject, "+" . $i . " day"), "N");
            $dateObject = date_create_from_format("j-m-Y", $fullDate);
        } elseif ($weekDay === 7) {
            $weekendsArray[] = $i . "-е";
            $weekDay = (int) date_format(date_modify($dateObject, "+" . $i . " day"), "N");
            $dateObject = date_create_from_format("j-m-Y", $fullDate);
            $weekendsCounter = 0;
        } else {
            if ($weekendsCounter === 1) {
                $weekendsArray[] = $i . "-е";
                $weekendsCounter += 1;
            } elseif ($weekendsCounter === 2) {
                $weekendsArray[] = $i . "-е";
                $weekendsCounter = 0;
            } else {
                $weekendsCounter += 1;
            }

            $weekDay = (int) date_format(date_modify($dateObject, "+" . $i . " day"), "N");
            $dateObject = date_create_from_format("j-m-Y", $fullDate);
        }
    }

    $daysArray = [];

    for ($i = $dayInt; $i <= $daysQuantity; $i += 1) {
        $daysArray[] = $i . "-е";
    }

    echo "Название месяца - " . $monthName . PHP_EOL;

    for ($i = 0; $i <= $daysQuantity - 1; $i += 1) {
        if (in_array($daysArray[$i], $weekendsArray)) {
            echo $daysArray[$i] . PHP_EOL;
        } else {
            echo $daysArray[$i] . " (+)" . PHP_EOL;
        }
    }

    return "График рабочих дней на " . $monthName . " готов";
}

echo schedule(2024, 2);
