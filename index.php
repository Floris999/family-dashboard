<?php
session_start();

if(empty($_SESSION['login_user'])) {
    header("Location: ./views/login.php");
}else {
    header("Location: ./views/home.php");
}