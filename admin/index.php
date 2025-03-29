<?php
require_once "backend/auth.php";
$authManager = new Auth();

if(!isset($_SESSION['loggedin']) || !$_SESSION['loggedin']
    || !isset($_SESSION['role']) || $_SESSION['role'] != 2)
{
    header('location: login.php');
    exit();
}

include "layout/header.php";
include "layout/main.php";
include "layout/footer.php";
?>