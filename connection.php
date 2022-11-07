<?php
// the localhost is the server like Apache
$dbhost = "localhost";
$dbuser = "root";
$dbpass= "";
// this is the name of our database which we create in phpMyAdmin
$dbname = "login_sample_db";

// connection to our database
if(!$con=mysqli_connect($dbhost,$dbuser,$dbpass,$dbname))
{
    // if it does not work, we use die
    die("failed to connect!");
}