<?php
include_once ('db_connect.php');

$email=trim($_POST['email']);
$password=trim($_POST['password']);
$password_re=trim($_POST['password_re']);

if(empty($email) or empty('password') or empty('password_re')){
    echo 'Заполните все данные';
    exit();
}
else{
    if ($password==$password_re)
    {
        $stmt=$pdo_connect->prepare("select 'email' from users where 'email' = ':email'");
        $stmt->execute([':email'=>$email]);
        if ($stmt->fetch(PDO::FETCH_ASSOC)){
            echo 'Пользователь с таким email уже существует';
            exit();
        }
        else {
            $password = password_hash($password, PASSWORD_DEFAULT);
            $sql = 'insert into users(email, password) values (:email, :password)';
            $params = [':email' => $email, ':password' => $password];

            $stmt = $pdo_connect->prepare($sql);
            $stmt->execute($params);

            echo $email . ' вы зарегистрировались. <br>';
            include_once('page_reg.php');
        }
    }
    else{
        echo 'Пароли не совпадают';
        exit();
    }
}