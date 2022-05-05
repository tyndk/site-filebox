<?php
include_once ('db_connect.php');

$email=trim($_POST['email']);
$password=trim($_POST['password']);

if(empty($email) or empty('password') or empty('password_re')){
    echo 'Заполните все данные';
    exit();
}
else{
        $stmt=$pdo_connect->prepare("select 'email' from users where 'email' = ':email'");
        $stmt->execute([':email'=>$email]);
//        if ($stmt->fetch(PDO::FETCH_ASSOC)){
//            echo 'Пользователь с таким email не существует';
//            exit();
//        }
//        else {
            $sql = 'select email, password from users where email=:email';
            $params = [':email' => $email];

            $stmt = $pdo_connect->prepare($sql);
            $stmt->execute($params);

            $user=$stmt->fetch(PDO::FETCH_ASSOC);

            if ($user && password_verify($password, $user['password'])) {
                    echo 'Логин норм';
                    header('Location: page_account.php');
                } else {
                    echo 'Неверный email или пароль1';
                }
            //include_once('page_reg.php');


}