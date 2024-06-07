<?php
echo "<br>Задание 1<br>";
$a = 1;
$b = -1;

if ($a >= 0 && $b >= 0) {
    echo "Разность:" . ($a - $b) . "<br>";
} elseif ($a < 0 && $b < 0) {
    echo "Произведение:" . ($a * $b) . "<br>";
} else {
    echo "Сумма: " . ($a + $b) . "<br>";
}

echo "<br>Задание 2<br>";
$a = 12;

switch ($a) {
    case 0:
        echo "0<br>";
    case 1:
        echo "1<br>";
    case 2:
        echo "2<br>";
    case 3:
        echo "3<br>";
    case 4:
        echo "4<br>";
    case 5:
        echo "5<br>";
    case 6:
        echo "6<br>";
    case 7:
        echo "7<br>";
    case 8:
        echo "8<br>";
    case 9:
        echo "9<br>";
    case 10:
        echo "10<br>";
    case 11:
        echo "11<br>";
    case 12:
        echo "12<br>";
    case 13:
        echo "13<br>";
    case 14:
        echo "14<br>";
    case 15:
        echo "15<br>";
        break;
    default:
        echo "Значение вне диапазона [0..15]<br>";
}

echo "<br>Задание 3<br>";
function addition($a, $b) {
    return $a + $b;
}
echo addition(5,5) ."<br>";

function subtraction($a, $b) {
    return $a - $b;
}
echo subtraction(5,5) ."<br>";

function multiplication($a, $b) {
    return $a * $b;
}
echo multiplication(5,5) ."<br>";

function division($a, $b) {
    if ($b != 0) {
        return $a / $b;
    } else {
        return "Делить на ноль нельзя!";
    }
}
echo division(5,5) ."<br>";

echo "<br>Задание 4<br>";
function mathOperation($arg1, $arg2, $operation) {
    switch ($operation) {
        case 'addition':
            return addition($arg1, $arg2);
        case 'subtraction':
            return subtraction($arg1, $arg2);
        case 'multiplication':
            return multiplication($arg1, $arg2);
        case 'division':
            return division($arg1, $arg2);
        default:
            return "Неизвестная операция";
    }
}
echo mathOperation(5,5,"addition") ."<br>";
echo mathOperation(5,5,"subtraction") ."<br>";
echo mathOperation(5,5,"multiplication") ."<br>";
echo mathOperation(5,5,"division") ."<br>";

echo "<br>Задание 5<br>";
echo "Текущий год: " . date("Y") . "<br>";
echo "Текущий год: " . getdate()["year"] . "<br>";
echo "Текущий год: " . date_create()->format("Y") . "<br>";

echo "<br>Задание 6<br>";
function power($val, $pow) {
    if ($pow == 0) {
        return 1;
    } elseif ($pow > 0) {
        return $val * power($val, $pow - 1);
    } else {
        return 1 / power($val, -$pow);
    }
}

echo  power(3,3) . "<br>"
?>
