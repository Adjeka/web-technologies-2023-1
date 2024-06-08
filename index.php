<?php
function buildGallery($dir) {
    $images = array_diff(scandir($dir), ['.', '..']);
    foreach ($images as $image) {
        $imagePath = "$dir/$image";
        echo "<a href=" . $imagePath . " target=_blank><img src=" .$imagePath . " alt=$image></a>";
    }
}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Фотогалерея</title>
    <style>
        .gallery img {
            width: 150px;
            margin: 10px;
            cursor: pointer;
        }
    </style>
</head>
<body>
<h1>Фотогалерея</h1>
<div class="gallery">
    <?php
    buildGallery("images");
    ?>
</div>
</body>
</html>