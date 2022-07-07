<?php
include 'mysql.php';

// post de login
if (isset($_POST) && isset($_POST['login']) && isset($_POST['password'])) {
    $login = htmlspecialchars($_POST['login']);
    $password = md5(htmlspecialchars($_POST['password']));
    verificaLogin($login, $password);
}
