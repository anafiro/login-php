<?php
// this function is for cheking if the user is logedin
function check_login($con)
{
    // we are checking if inside SESSION is the user_id
    if(isset($_SESSION['user_id']))
    {

        $id = $_SESSION['user_id'];
        // checck the database and ask the database if the info is right
        $query="select * from users where user_id = '$id' limit 1"
        // read from the database
        $result=mysqli_query($con,$query);
        // check to see if the result is positive 
        if($result && mysqli_num_rows($result) > 0)
        {
            //assoc is short for associated data
            // we need to collect the user_data becase we need to retain it
            $user_data = mysqli_fetch_assoc($result);
            return $user_data;
        }
    }
        // if none of above happens then we need to redirect to login
        // to redirect, we use the header 
        header("Location: login.php");
        die;
    }

// this function determines how long the number is 
function random_num($lenght)
{
    $text = "";
    if($lenght < 5)
    {
        $lenght = 5;
    }
    $len = rand(4,$lenght);

    for($i=0; $i < $len; $i++){

        // another random number 
        $text .= rand(0,9);
    }
    return $text; 
}

