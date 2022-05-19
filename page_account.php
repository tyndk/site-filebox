<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Регистрация</title>

    <link href="css/css.css" rel="stylesheet"/>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Comfortaa&display=swap" rel="stylesheet">
</head>
<body>
<?php
echo '<div style="display: none">';
include_once ('php/db_connect.php');
echo '</div>';

session_start();

$email = $_SESSION['email'];
//$stmt=$pdo_connect->prepare("select name from users where email = ':email'");
//
//$stmt->fetch(PDO::FETCH_ASSOC);
//$_UserName = $stmt;

$sql = 'select name from users where email=:email';
$params = [':email' => $email];

$stmt = $pdo_connect->prepare($sql);
$stmt->execute($params);

$username=$stmt->fetch(PDO::FETCH_COLUMN);
?>
<div class="block_account">
        <div class="logo_title">
            <div class="logo_account"><a href="index.php"><img src="images/logo.png"/></a></div>
            <div class="menu_account">
                <a href="/" class="menu_link choosed">Личный кабинет</a>
                <a href="/" class="menu_link">Ваши файлы</a>
            </div>
        </div>
    <div class="content">
        <div class="info_account">
            <div class="info_picture">
                <img class="account_pic" src="images/user_image.jpg"/>
                <?php print ('<h3>' . $username . '</h3>'); ?>
                <?php print ('<h5>' . $email . '</h5>'); ?>
                <p class="info_size">Место на диске:</p>
                <progress></progress>
                <p>~0.1~/5 ГБ</p>
            </div>
            <div class="info_settings">

                <div class="form_select">
                    <button class="account_setting_select" onclick="openForm(this.id)" id="change_pwd">Сменить пароль</button>
                    <div class="form_popup" id="form_popup_pwd">
                        <form action="" method="post">
                            <input class="input_account" type="password" name="old_password" placeholder="Старый пароль">
                            <input class="input_account" type="password" name="new_password" placeholder="Новый пароль">
                            <input class="input_account" type="password" name="repeat_new_password" placeholder="Подтвердите пароль">
                            <button class="account_login login" type="submit">Сохранить</button>
                        </form>
                    </div>
                </div>

                <div class="form_select">
                    <button class="account_setting_select" onclick="openForm(this.id)" id="change_nickname">Сменить никнейм</button>
                    <div class="form_popup" id="form_popup_nickname">
                        <form action="" method="post">
                            <input class="input_account" type="text" name="nickname" placeholder="Старый никнейм">
                            <button class="account_login login" type="submit">Сохранить</button>
                        </form>
                    </div>
                </div>

                <div class="form_select">
                    <button class="account_setting_select" onclick="openForm(this.id)" id="change_email">Сменить email</button>
                    <div class="form_popup" id="form_popup_email">
                        <form action="" method="post">
                            <input class="input_account" type="email" name="old_password" placeholder="Введите email">
                            <input class="input_account" type="password" name="verify_password" placeholder="Подтвердите пароль">
                            <button class="account_login login" type="submit">Сохранить</button>
                        </form>
                    </div>
                </div>

                <script src="js/account_form_select.js"></script>
                <!-- <form action="account_info_change.php" method="post">
                    <div class="form_group">
                        <label for="name">Сменить имя пользователя</label>
                        <input class="input_account" type="text" name="name" placeholder="<?php echo $username; ?>"/>
                    </div>
                    <div class="form_group">
                        <label for="name">Сменить email</label>
                        <input class="input_account" type="text" name="email" placeholder="<?php echo $email; ?>"/>
                    </div>
                    <button class="account_save login" type="submit">Сохранить</button>
                </form> -->
                <!-- <div class="logout_button">
                    <button class="account_logout login" type="button"><a class="account_logout" href="logout.php">Выйти</a></button>
                </div> -->
            </div>
        </div>
    </div>
</div>
</body>
</html>

