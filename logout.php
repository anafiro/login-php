<?php

session_start();
if(isset($_SESSION['user_id']))
{
    unset($_SESSION['user_id']);
}

// redirect to login page
header("Location: login.php");
die;