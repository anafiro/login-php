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
            //read to database
            
            $query = "select * from users where user_name = '$user_name' limit 1";
            // to read from database
            $result = mysqli_query($con, $query);
            // here is checking to if everything is okay so redirect it after it
            // let's say if the result is successful here so we say if($result)
            if($result)
            {
                if($result && mysqli_num_rows($result) > 0)
                {
                    //assoc is short for associated data
                    // we need to collect the user_data becase we need to retain it
                    $user_data = mysqli_fetch_assoc($result);

                    if($userr_data['password'] === $password)
                    {
                        
                        $_SESSION['user_id']=$user_data['user_id'];
                        // redirect the user 
                        header("Location: index.php");
                        die;
                    }
                }

            }
            echo "Wrong username or password!";
        
        }else{
            echo "Please enter some valid information!";
        }
    }


?>

<!DOCTYPE html>
<html>
<head>
    <title>Login<title>
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
                    <div style="font-size: 20Px;margin: 10px;color:white;">Login</div>
                    <input id="text" type="text" name="user_name"><br><br>

                    <input id="text" type="password" name="password"><br><br>

                    <input id ="button" type="submit" value="Login"><br><br>

                    <a href="signup.php">Click to Signup</a> <br><br>

                </form>
            </div>
    
 
</body>
</html>   