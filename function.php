<?php
require_once('users.php');
// функция getUsersList() возвращает массив всех пользователей и хэшей их паролей;
function getUsersList()
{
    global $users;
    return $users;
};
//функция existsUser($login) проверяет, существует ли пользователь с указанным логином;
function existsUser($login)
{
    global $users;
    if (array_key_exists($login,$users)) {
        echo "Пользователь существует";
    }  else { 
        echo "Такого пользователь нет";
    };   
};
//функция checkPassword($login, $password) пусть возвращает true тогда,
//когда существует пользователь с указанным логином и введенный им пароль прошел проверку, иначе — false;
function checkPassword($login, $password)
{
    global $users;
    foreach ($users as $key => $value) {
        if ($login === $key && sha1($password) === $users[$key]['password'] && $_SESSION['auth'] === true) {
            echo "correct";
            break;
        } else {
            echo "uncorrect";
            break;
        };
    };
};
//функция getCurrentUser() которая возвращает либо имя вошедшего на сайт пользователя, либо null
function getCurrentUser()
{
    echo $_SESSION['login'];
};