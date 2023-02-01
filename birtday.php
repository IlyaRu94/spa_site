<?php
//include 'auth.php';
//обратимся к полному списку пользователей
$users=getUsersList();
//если к нам пришли пост-данные (месяц и день рождения) - переведем их в нужную форму и запишем в файд базы данных пользователей
if(($_POST['birtday']) and ($_POST['birtday'])){
    $birtday = (int)$_POST['birtday'];
    $birtmonth = (int)$_POST['birtmonth'];
    $users[$_SESSION['login']]['birtday']=$birtmonth.'-'.$birtday;
    file_put_contents('user.json',json_encode($users));
}
//если в базе данных пользователя есть дата рождения - Отображаем имя пользователя, проверяем, сколько дней до дня рождения, поздравляем, если день рождения сегодня и дарим скидку 
if($users[$_SESSION['login']]['birtday']){
header('refresh:5; url=index.php');//после авторизации, приветствие и через 5 секунд редирект на главную страницу
$year= (strtotime(date("Y").'-'.$users[$_SESSION['login']]['birtday']) > strtotime(date("Y").'-'.date("n").'-'.date("j")))?date("Y"):date("Y")+1;// если день рождения уже был - смотрим, скольк дней до дня рождения в следующем году

echo '<div class="auth" style="color:#fff">Привет, '.getCurrentUser().'<br>';
if($users[$_SESSION['login']]['birtday']===(string)date("n").'-'.date("j")){echo '<span style="color:red">С днем рождения! Ловите скидку 15% на все!</span>';}else{
echo 'До персональной скидки в честь дня рождения осталось: 
<script>
// дата рождения
const deadline = new Date("'.$year.'-'.$users[$_SESSION['login']]['birtday'].' 0:00:00");
</script>
<script src="script.js"></script>
<div class="timer">
<div class="timer__items">
<div class="timer__item timer__days">00</div>дн.
<div class="timer__item timer__hours">00</div>час.
<div class="timer__item timer__minutes">00</div>мин.
<div class="timer__item timer__seconds">00</div>
</div>
</div>';
}
echo '<div>Через 5 секунд Вы будете перенаправлены на главную страницу</div>
</div>';

}else {// если нет даты рождения - принудительно просим ее заполнить
    echo '<div class="auth" style="color:#fff">Привет, '.getCurrentUser().'
    <div>Для получения персональной скидки, введите день и месяц своего рождения:</div>
    <form action="login.php" method="post">
    <input name="birtday" type="number" placeholder="День" min="1" max="31">
    <select name="birtmonth">
        <option value="1">Январь</option>
        <option value="2">Февраль</option>
        <option value="3">Март</option>
        <option value="4">Апрель</option>
        <option value="5">Март</option>
        <option value="6">Июнь</option>
        <option value="7">Июль</option>
        <option value="8">Август</option>
        <option value="9">Сентябрь</option>
        <option value="10">Октябрь</option>
        <option value="11">Ноябрь</option>
        <option value="12">Декабрь</option>
    </select>
    <input name="submit" type="submit" value="Войти">
    </form>';
}