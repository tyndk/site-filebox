<?php
include_once ('db_connect.php');

session_start();

$old_email=$_SESSION['email'];
$new_name=$_POST['name'];
$new_email=$_POST['email'];

if(empty($new_name) or empty($new_email)) {
    header('Location: ../page_account.php');
}else{
    $stmt = $pdo_connect->prepare("select email from users where email = :email");
    $stmt->execute([':email' => $new_email]);
    if ($stmt->fetch(PDO::FETCH_ASSOC)) {
        echo 'Пользователь с таким email уже существует';
        exit();
    } else {
        $sql = 'update users set name = :name, email = :email where email = :old_email';
        $params = [':name' => $new_name, ':email' => $new_email, ':old_email' => $old_email];

        $stmt = $pdo_connect->prepare($sql);
        $stmt->execute($params);

        $_SESSION['email'] = $new_email;

        echo 'Данные изменены';
        header('Location: ../page_account.php');
    }
}
