<?php
    session_start();
    global $user;
    if (isset($_SESSION["auth"]) && $_SESSION["auth"] === true){
        echo 'Успешно авторизован';
    }
    else{
        header('Location: login.html');
    }