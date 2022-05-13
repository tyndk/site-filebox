<?php
//Полезная ссылка: https://snipp.ru/php/uploads-files
echo '<div style="display: none">';
include_once('db_connect.php');
echo '</div>';
print ('<a href="../index.php">На главную</a><br>');

$file=$_FILES['title_filename'];
$filename=$_FILES['title_filename']['name'];
$filetype=$_FILES['title_filename']['type'];
$filesize=$_FILES['title_filename']['size'];
$filetmp=$_FILES['title_filename']['tmp_name'];

$file_uniqlink=uniqid(); //md5

$uploaddir='../file_uploads/';
$uploaddirfile = $uploaddir . $file_uniqlink . '_' . $filename;
$uploadfile = $file_uniqlink . '_' . $filename;

$move_to_dir=move_uploaded_file($filetmp, $uploaddirfile);

if ($move_to_dir) {
    echo "Файл <u>" . $filename . "</u> загружен.\n";
} else {
    echo "Ошибка. \n";
}

echo '<br>Скачать: <a href="' . $_SERVER['localhost'] . '/file_uploads/' . $uploaddirfile . '">' . $filename . '</a>';
/*
echo "<br> Массив файла: \n";
echo '<pre>';
var_dump($file);
*/
///
//Добавляет путь файла в бд
$link=$_SERVER['localhost'] . '/file_uploads/' . $uploadfile;

$sql='insert into files_link(name, link, size) values (:name, :link, :size)';
$params=[':name'=>$filename,':link'=>$link, ':size'=>$filesize];

$stmt=$pdo_connect->prepare($sql);
$stmt->execute($params);

//Выбирает id этого файла
/*
$sql='select id from files_link where link=:link';
$stmt=$pdo_connect->prepare($sql);
$stmt->execute([':link'=>$link]);
$file_id=$stmt->fetch(PDO::FETCH_COLUMN);

echo '<pre>';
echo '<p>Файл id: ' . $file_id . ' </p>';
*/

$_GET['file']=$uploadfile;
$_GET['link']=$link;
$_GET['filename']=$filename;
$_GET['dir']=$uploaddirfile;
header('location: titlefile_link.php?file=' . $uploadfile);
exit();
?>