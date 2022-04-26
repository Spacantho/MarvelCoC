<?php
session_start();
session_destroy();

if (isset($_COOKIE['remember'])) {
    unset($_COOKIE['remember']['id_users']);
    unset($_COOKIE['remember']['token']);

    setcookie("remember[token]", null,  -1, "/");
    setcookie("remember[id_users]", null,  -1, "/");
}

header('location: ../../index.php');
?>