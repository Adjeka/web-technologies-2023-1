<?php
echo "<br>Задание 1<br>";
$i = 0;
do {
    if ($i == 0) {
        echo "$i – это ноль.<br>";
    } elseif ($i % 2 == 0) {
        echo "$i – чётное число.<br>";
    } else {
        echo "$i – нечётное число.<br>";
    }
    $i++;
} while ($i <= 10);

echo "<br>Задание 2<br>";
$regions = [
    "Московская область" => ["Москва", "Зеленоград", "Клин"],
    "Ленинградская область" => ["Санкт-Петербург", "Всеволожск", "Павловск", "Кронштадт"],
    "Рязанская область" => ["Рязань", "Скопин", "Сасово"]
];
foreach ($regions as $region => $cities) {
    echo "$region: " . implode(", ", $cities) . ".<br>";
}

echo "<br>Задание 3<br>";
$cyrillicToLatin = [
    'а' => 'a', 'б' => 'b', 'в' => 'v', 'г' => 'g', 
    'д' => 'd', 'е' => 'e', 'ё' => 'e', 'ж' => 'zh', 
    'з' => 'z', 'и' => 'i', 'й' => 'j', 'к' => 'k', 
    'л' => 'l', 'м' => 'm', 'н' => 'n', 'о' => 'o', 
    'п' => 'p', 'р' => 'r', 'с' => 's', 'т' => 't', 
    'у' => 'u', 'ф' => 'f', 'х' => 'kh', 'ц' => 'c', 
    'ч' => 'ch', 'ш' => 'sh', 'щ' => 'shh', 'ъ' => '``', 
    'ы' => 'y', 'ь' => '`', 'э' => 'e`', 'ю' => 'yu', 'я' => 'ya'
];

function transliteration($str, $cyrillicToLatin) {
    $result = '';
    $str = mb_strtolower($str);
    $charArray = mb_str_split($str);
    for ($i = 0; $i < mb_strlen($str); $i++) {
        //$char = mb_substr($str, $i, 1);
        $char = $charArray[$i];
        if (isset($cyrillicToLatin[$char])) {
            $result .= $cyrillicToLatin[$char];
        } else {
            $result .= $char;
        }
    }
    return $result;
}
echo transliteration("Задание 3", $cyrillicToLatin) . "<br>";

echo "<br>Задание 4<br>";
function renderMenu($menu) {
    echo "<ul>";
    foreach ($menu as $key => $value) {
        if (is_array($value)) {
            echo "<li>$key";
            renderMenu($value);
            echo "</li>";
        } else {
            echo "<li><a href=\"$key\">$value</a></li>";
        }
    }
    echo "</ul>";
}

renderMenu($regions);


echo "<br>Задание 6<br>";
foreach ($regions as $region => $cities) {
    $citiesOnK = [];
    foreach ($cities as $city) {
        if (mb_substr($city,0,1) == 'К') {
            $citiesOnK[] = $city;
        }
    }
    if (count($citiesOnK) != 0) {
        echo "$region: " . implode(", ", $citiesOnK) . ".<br>";
    }
}
?>
