<?php

session_start();
    include("connection.php");
    include("functions.php");

    // we want to check if the user pressed on the post button 
    if($_SERVER['REQUEST_METHOD']=="POST")

    {
        //soemthing was posted 
        // we need to collect data from the POST
        $user_name = $_POST['user_name'];
        $password = $_POST['password'];

        if(!empty($user_name)&&!empty($password)&&!is_numeric($user_name))
        {
            // 20 would be the max of lenght
            $user_id = random_num(20);
            //save to database
            // users is the table and we need to specify the columns inside the users()
            $query = "insert into users(user_id,user_name,password) values('$user_id','$user_name','$password')";
            // to save the query
            mysqli_query($con, $query);
            // redirect the user 
            header("Location: login.php");
            die;
        }else{
            echo "Please enter some valid information!";
        }
    }


?>
<!DOCTYPE html>
<html>
<head>
    <title>Signup<title>
        <style type="text/css">
            #text{
                height: 25px;
                border-radius: 5px;
                padding: 4px;
                border: soild thin #aaa;
                width: 100%;
            }
            #button{
                padding: 10px;
                width: 100px;
                color:white;
                background-color: Lightblue;
                border: none;
            }
            #box{
                background-color: grey;
                margin: auto;
                width: 300px;
                padding: 20px;

            }

        </style>
</head>
<body>
            <div id="box">
                <form method="post">
                    <div style="font-size: 20Px;margin: 10px;color:white;">Signup</div>
                    <input id="text" type="text" name="user_name"><br><br>

                    <input id="text" type="password" name="password"><br><br>

                    <input id ="button" type="submit" value="Signup"><br><br>

                    <a href="login.php">Click to Login</a> <br><br>

                </form>
            </div>
    
 
</body>
</html> 