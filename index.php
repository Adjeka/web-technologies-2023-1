<?php
$page_title = "Главная страница";
$page_h1 = "Год и время";
$current_year = date("Y");
$current_time = getCurrentTime();

function GetCurrentTime(): string
{
    $hours = date("G");
    $minutes = date("i");

    if ($hours == 1 || $hours == 21) {
        $hour_suffix = "час";
    } elseif (($hours >= 2 && $hours <= 4) || ($hours >= 22 && $hours <= 23)) {
        $hour_suffix = "часа";
    } else {
        $hour_suffix = "часов";
    }

    if ($minutes == 1 || $minutes == 21 || $minutes == 31 || $minutes == 41 || $minutes == 51) {
        $minute_suffix = "минута";
    } elseif (($minutes >= 2 && $minutes <= 4) || 
        ($minutes >= 22 && $minutes <= 24) || 
        ($minutes >= 32 && $minutes <= 34) || 
        ($minutes >= 42 && $minutes <= 44) || 
        ($minutes >= 52 && $minutes <= 54)) {
        $minute_suffix = "минуты";
    } else {
        $minute_suffix = "минут";
    }

    return "$hours $hour_suffix $minutes $minute_suffix";
}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $page_title; ?></title>
</head>
<body>
<div id="content">
    <h1><?php echo $page_h1; ?></h1>
    <p>Текущий год: <?php echo $current_year; ?></p>
    <p>Текущее время: <?php echo $current_time; ?></p>
</div>
</body>
</html>