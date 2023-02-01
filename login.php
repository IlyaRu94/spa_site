<html>
<body>
<head>
<title>SPA-обертывание</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<link href="style.css" type="text/css" rel="stylesheet">
</head>

<header style="height: 100%;">
<div class="head">
    SPA-салон "Блаженство"
</div>


<?php
    include 'auth.php';
         // Стартуем сессию:
        session_start(); 
// получаем логин и пароль из формы
$login = $_POST['login'] ?? null;
$password = $_POST['password'] ?? null;

checkPassword($login, $password);

$auth = $_SESSION['auth'] ?? null;
// если авторизация не произошла - выведем форму ввода логин пароль
if(!$auth) { ?>
      <form class="auth" action="login.php" method="post">
        <div>Пожалуйста, авторизуйтесь</div>
          <input name="login" type="text" placeholder="Логин">
          <input name="password" type="password" placeholder="Пароль">
          <input name="submit" type="submit" value="Войти">
      </form>

<?php
 }else{
  //если все хорошо - подключаем файл со скриптом дня рождения
  include 'birtday.php';
}
?>

</header>
</body>
</html>