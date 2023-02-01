<?
         // Стартуем сессию:
         session_start(); 
// функция вывода массива всех пользователей
function getUsersList(){
$users = json_decode(file_get_contents('user.json'), true);// преобразуем json файл в массив (для этого в конце запишем true)
return $users;
}

//функция проверки существования пользователя
function existsUser($login){
    $users= getUsersList();//получаем массив логин хешей из файла
    if ($users[$login]){
        return $login;
    }else{
        //header('refresh:3; url=login.php');//после авторизации, приветствие и через 5 секунд редирект на страницу авторизации
        //echo 'Пользователь не найден, авторизуйтесь';
        return null;
    }
}

//Функция проверки пары логин/пароль
function checkPassword($login, $password){
    $username=existsUser($login);
if (null !== $username || null !== $password) {
        $users=getUsersList();
    // Если пароль из базы совпадает с паролем из формы
    if (md5(md5($password.$users[$username]['id'])) === $users[$username]['password']) {//пароли зашифрованы двойным хешированием md5 + id (сложно взломать?)
    //пароль admin - 132432
    //пароль Olesya - 28082021
    //пароль Ilya - 2808

   	 // Пишем в сессию информацию о том, что мы авторизовались:
        $_SESSION['auth'] = true; 
        // Пишем в сессию логин и id пользователя
        $_SESSION['id'] = $users['admin']['id']; 
        $_SESSION['login'] = $username; 
        // пишем в сессию время входа
        $_SESSION['time']=date("Y-n").'-'.(date("j")+1).' '.date("H:i:s");
        return true;
    }else{
        header('refresh:3; url=login.php');//после авторизации, приветствие и через 3 секунд редирект на страницу авторизации
        echo 'Неверная пара логин/пароль'; 
        session_destroy();
        return false;
    }
}
}
//функция вывода имени авторизованного пользователя
function getCurrentUser(){
    if($_SESSION['login']){
        return $_SESSION['login'];
    }else{return null;}
}
?>