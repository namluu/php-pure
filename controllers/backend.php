<?php
session_start();

function backendPage()
{
    checkAuthentication();
    require 'templates/backend/dashboard.php';
}

function checkAuthentication()
{
    if (!isset($_SESSION['username'])) {
        header("Location: /backend/login");
    }
}

function loginPage()
{
    if (isset($_POST['username'])) {
        $user = getLoginUser($_POST['username'], $_POST['password']);
        if ($user) {
            $_SESSION['username'] = $_POST['username'];
            header("Location: /backend");
        }
    }

    require 'templates/backend/login.php';
}