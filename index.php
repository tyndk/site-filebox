<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Filebox</title>

    <link type="text/css" href="css/css.css" rel="stylesheet"/>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Comfortaa&display=swap" rel="stylesheet">
</head>
<body>
    <div class="title_login">

        <?php
        session_start();
        if (!isset($_SESSION['email'])){
            print ('<button id="button_login">Войти</button>');
        }else{
            print ('<button id="button_account"><a href="page_account.php">' . $_SESSION['email'] . '</a></button>');
        }
            ?>
        <!--Модальное окно входа-->
        <div id="modal_login" class="modal">
            <div class="modal_content">
                <h1>Вход</h1>
                <span class="close_modal">&times</span>
                <form action="login.php" method="post">
                    <div class="form_group">
                        <label for="email">Ваш email: </label>
                        <input type="email" name="email"><br>
                    </div>
                    <div class="form_group">
                        <label for="password">Ваш пароль: </label>
                        <input type="password" name="password">
                    </div>
                    <button class="login" type="submit">Войти</button>
                </form>
            </div>
        </div>
        <script src="js/modal.js"></script>
        <!-- -->
    </div>
    <div class="block1">
        <div class="row">
            <div class="logo">
                <img src="images/logo_shadow.png"/>
                <h1>File box</h1>
                <p>Делитесь и храните<br> ваши файлы в онлайн</p>
            </div>
            <div class="column_input_file">
                <div class="input_file">
                    <form action="/php/titlefile_upload.php" enctype="multipart/form-data" method="post">
                        <!-- <label class="label_upload_file" for="title_file">Загрузите файл</label> -->
                        <input id="title_file" class="upload_file" type="file" multiple>
                        <button class="upload_file" type="submit"><img src="images/upload.png"></button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="block2">
        <div class="row">
            <div class="info">
                <div class="info_title">
                    <h1>Воспользуйтесь нашим <br>хранилищем</h1>
                    <h2>Все файлы в одном месте!</h2>
                </div>
                <div class="info_features">
                    <div class="card_feature">
                        <img src="images/feature1.png">
                        <h3>Делись</h3>
                        <p>аккаунт с файлами<br> для тебя и других</p>
                    </div>
                    <div class="card_feature">
                        <img src="images/feature2.png">
                        <h3>Хранилищем</h3>
                        <p>до 5 ГБ</p>
                    </div>
                    <div class="card_feature">
                        <img src="images/feature3.png">
                        <h3>Бесплатно!</h3>
                        <p>не нужно платить</p>
                    </div>
                </div>
            </div>
            <div class="block_reg">
                <div class="reg">
                    <h2 class="reg_title">Регистрация</h2>
                    <p class="reg_title">чтобы заполучить облако</p>
                    <div class="reg_input">
                        <form action="/php/reg.php" method="post">
                            <div class="form_group">
                                <label>Email:</label>
                                <input type="email" name="email"/>
                            </div>
                            <div class="form_group">
                                <label>Пароль:</label>
                                <input type="password" name="password"/>
                            </div>
                            <div class="form_group">
                                <label>Подтвердите пароль:</label>
                                <input type="password" name="password_re"/>
                            <p>Нажимая кнопку "Зарегистрироваться" Вы даете согласие на <u>обработку персональных данных</u>.</p>
                            <button type="submit" name="signup" class="login">Зарегистрироваться</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <footer>
        <div class="text_footer">
            <p>File Box. 2022</p>
            <p>Alex Alexandrov portfolio</p>
        </div>
    </footer>
</body>
</html>