<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/main.css">
    <title>ExSB: Покупай, исполняй</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
</head>
<body>
<div class="wrapper" id="wrapper">
<header class="header" id="header">
    <div class="container">
        <div class="nav">
            <div class="logo">
                <img src="img/mainicon.png" alt="logo" class="logopic">
                <p class="logotext">ExSB</p>
            </div>
            <div class="menu_block" id = "menu_block" >
            <?php
            if($_SESSION['user']){
                echo '
                <ul class="menu" id = "menu" >
                    <li >
                        <a href = "#" class="menu_obj_text" id="mainlink" >Главная</a >
                    </li >
                    <li >
                        <a href = "#profile" class="menu_obj_text" id="profilelink" >Профиль</a >
                    </li >
                    <li >
                        <a href = "vendor/annount/addAnnount.php" class="menu_obj_text" id="addAnnount" >Добавить объявление</a >
                    </li >
                    <li >
                        <a href = "#findAnnount" class="menu_obj_text" id="findAnnount" >Найти объявление</a >
                    </li >
                    <li >
                        <a href = "vendor/exit.php" class="menu_obj_text" id="exit" >Выйти</a >
                    </li >
                </ul >';
            } else {
               echo '
                <ul class="menu" id = "menu" >
                    <li >
                        <a href = "#" class="menu_obj_text" class="mainlink" >Главная</a >
                    </li >
                    <li >
                        <a href = "#log" class="menu_obj_text" class="loglink" >Вход</a >
                    </li >
                    <li >
                        <a href = "#reg" class="menu_obj_text" class="reglink" >Регистрация</a >
                    </li >
                </ul >';
                }
            ?>
                <a class="burger" id="burger">
                    <span></span>
                    <p class="menu_text">Меню</p>
                </a>
    </div>
</header>

<section class="main" id="main">
    <div class="container">
        <div class="order" id="order">
            <h1 class="maintext">Exchange. Sell. Buy.</h1>
            <br>
            <h2 class="mainsubtext">Удобный сервис для заработка, продажи и предоставления услуг.</h2>
        </div>
    </div>
</section>

<section class="annout" id="annout">
    <div class="container">
            <h1 class="annouttext">Объявления</h1>
        <div class="annoutblock" id="annoutblock"></div>
        <div class="show-more-container">
            <button class="show-more">Показать ещё</button>
        </div>
    </div>
</section>
    <footer class="footer" id="footer">
        <h1 class="footertext">Сайт разработан Александром Ремизовым и Евгением Гришагиным.</h1>
    </footer>
</div>

<?php
if(!$_SESSION['user']){
echo '
<div class="reg" id="reg">
    <a href="#" class="poparea pop-up-close"></a>
    <div class="reg_body">
        <div class="reg_content">
            <a href="#" class="close pop-up-close">X</a>
            <form id="reg_form">
                <h1 class="formtitle">Регистрация</h1>
                <div class="form_item">
                    <input type="text" name="name" class="form_bar" id="regnamebar" required>
                    <label class="formlabel">Имя</label>
                    <ul>
                        <li>
                            Имя должно быть написано на кириллице.
                        </li>
                        <li>
                            Разрешённые символы: пробел и дефис.
                        </li>
                        <li>
                            Имя не должно начинаться или заканчиваться специальными символами.
                        </li>
                        <li>
                            Специальные символы не могут идти подряд.
                        </li>
                        <li>
                            Минимальная длина имени: 1 символ.
                        </li>
                    </ul>
                </div>
                <div class="form_item">
                    <input type="text" name="mail"  class="form_bar" id="regmailebar" required>
                    <label class="formlabel">E-mail</label>
                    <ul class="regmailebartext">
                        <li>
                            Формат: адрес@сервис.домен.
                        </li>
                        <li>
                            Пользователь с такой почтой уже существует
                        </li>
                    </ul>
                </div>
                <div class="form_item">
                    <input type="text" name="phone" class="form_bar" id="regphonebar" required>
                    <label class="formlabel">Телефон</label>
                    <ul class="regphonebartext">
                        <li>
                            Формат: +7/8-XXX-XXX-XX-XX.
                        </li>
                        <li>
                            Пользователь с таким номером телефона уже существует
                        </li>
                    </ul>
                </div>
                <div class="form_item"> 
                    <input type="password" name="pass" class="form_bar" id="regpassbar" required>
                    <label class="formlabel">Пароль</label>
                    <ul class="regpassbartext">
                        <li>
                            Пароль должен быть написан на латинице.
                        </li>
                        <li>
                            Разрешённые символы: цифры, ".","/","-".
                        </li>
                        <li>
                            Длина пароля должна быть 6 символов или больше.
                        </li>
                        <li>
                            Пароль не может состоять только из специальных символов.
                        </li>
                    </ul>
                </div>
                <div class="form_item">
                    <input type="password" name="verpass" class="form_bar" id="regverpassbar" required>
                    <label class="formlabel">Повторите пароль</label>
                    <ul class="regverpassbartext">
                        <li>
                            Пароли должны совпадать.
                        </li>
                        <li>
                            Пароль должен быть верного формата
                        </li>
                    </ul>
                </div>
                <div class="form_item">
                    <input type="checkbox" name="agreement" class="reg_checkbox" id="regcheckbox" checked>
                    <label for="regcheckbox" id="arglabel" class="agrlabel"><p>Соглашаюсь на обработку персональных данных в соответсвии c
                        <a href="#">условиями</a>.</p>
                    </label>
                </div>
                <div class="form_button">
                    <button type="button" class="submitbutton" id="submitreg">Зарегистрироваться</button>
                </div>
                <div class="popup_log" id="log_popup_link">
                    <p>Уже есть аккаунт? <a href="#log" class="pop-up-close">Войти.</a></p>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="log" id="log">
    <a href="#" class="poparea pop-up-close"></a>
    <div class="log_body">
        <div class="log_content">
            <a href="#" class="close pop-up-close">X</a>
            <form id="log_form">
                <h1 class="formtitle">Вход</h1>
                <div class="form_item">
                    <input type="text" name="mail" class="form_bar" id="logmailebar">
                    <label class="formlabel">E-mail</label>
                </div>
                <div class="form_item">
                    <input type="password" name="pass" class="form_bar" id="logpassbar">
                    <label for="logpassbar" class="formlabel">Пароль</label>
                </div>
                <div class="form_button">
                    <button type="button" class="submitbutton" id="submitlog">Войти</button>
                </div>
                <p id="errorsting">Неверная комбинация почта-пароль</p>
            </form>
            <div class="popup_log" id="reg_popup_link">
                <p>Ещё нет аккаунта? <a href="#reg" class="pop-up-close">Зарегистрироваться.</a></p>
            </div>
        </div>
    </div>
</div>
';
}
?>

</body>
<?php if(!$_SESSION['user']){ echo '<script src="js/RegAndLogLogic.js"></script>';} ?>
<script src="js/BurgerLogic.js"></script>
<script src="js/AnnountLoader.js"></script>
</html>
