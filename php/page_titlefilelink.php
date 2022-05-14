<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Скачать файл</title>

    <link rel="stylesheet" href="../css/css.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Comfortaa&display=swap" rel="stylesheet">

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
        switch ($key){
            case 'name': $filename=$value; break;
            case 'size': $filesize=$value; break;
        }
    }
    function size_convert($filesize){
        $i=0;
        while(floor($filesize/1024)>0){
            ++$i;
            $filesize/=1024;
        }

        $filesize=str_replace('.', ',', round($filesize, 1));
        switch ($i) {
            case 0:
                return $filesize .= ' байт';
            case 1:
                return $filesize .= ' КБ';
            case 2:
                return $filesize .= ' Мб';
            case 3:
                return $filesize .= ' ГБ';
        }
    }
    $filesize=size_convert($filesize);
    ?>
</head>
<body>
    <div class="container">
        <div class="content">
            <img class="doc" src="../images/document.png">
            <div class="file_info">
                <?php
                print '<p class="file_title">' . $filename . '</p>';
                echo '<p class="subs_file">Размер файла: ' . $filesize . '</p>';
                echo '<a href="' . $link. '" download>Скачать</a>';
                ?>
            </div>
        </div>
    </div>
</body>
</html>