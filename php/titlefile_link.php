<?php
echo '<div style="display: none">';
include_once('db_connect.php');
echo '</div>';
$link=$_SERVER['localhost'] . '/file_uploads/' . $_GET['file'];

$sql = "select name, size from files_link where link = :link";
$params = [':link' => $link];

$stmt = $pdo_connect->prepare($sql);
$stmt->execute($params);

$file=$stmt->fetch(PDO::FETCH_ASSOC);

foreach ($file as $key => $value) {
    echo $value . '<br>';
    switch ($key){
        case 'name': $filename=$value; break;
        case 'size': $filesize=$value; break;
    }
}

//$filename=;
//$filesize=;

//echo '<pre>';
echo 'Название файла при скачивании: ' . $_GET['file'] . '<br><pre>';
print_r ($file);// . '<br>';
echo 'Имя файла: ' . $filename . '<br>';
echo 'Размер файла: ' . $filesize . '<br>';
echo 'Файл: <a href="' . $link. '" download>Скачать</a>';