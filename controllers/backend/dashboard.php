<?php
function backend_page()
{
    check_authentication();
    require 'templates/backend/dashboard.php';
}

function check_authentication()
{
    if (!isset($_SESSION['username'])) {
        header("Location: /backend/login");
    }
}

function login_page()
{
    if (isset($_POST['username'])) {
        $pwd_hashed = get_pwd_from_db($_POST['username']);
        if (password_verify($_POST['password'], $pwd_hashed)) {
            $_SESSION['username'] = $_POST['username'];
            header("Location: /backend");
        }
    }

    require 'templates/backend/login.php';
}

function logout_action(): void
{
    session_destroy();
    header("Location: /backend/login");
}