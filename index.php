<?php
    session_start();
    include_once 'connect.php';
    if(isset($_POST['submit']))
    {
        $email = $_POST['email'];
        $password = $_POST['password'];
        $query = "select * from users where email = '".$email. "' and password='".$password."' ";
        $res = mysqli_query($con,$query);
        $count = mysqli_num_rows($res);
        if($count > 0){
        $row = mysqli_fetch_assoc($res);
        $_SESSION["userid"] = $row['userid'];
        $_SESSION["username"] = $row['username']; 
            if($row['role']=="admin"){
                header("Location:admin/index.php");
            }
            else{
                header("Location:user/home.php");
            }
        }
        else{
            echo "Invalid Email Or Password!!";
        }   

    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping</title>
</head>
<body>
    <center>
    <h1>Login</h1>
    <form method="post" >
        <label>Email:<label>
        <input type="email" name="email" placeholder="Enter Email"/>
        <br/>
        <br/>
        <label>Password:<label>
        <input type="password" name="password" placeholder="Enter Password"/>
        <br/><br/>
        <input type="submit" name="submit" value="Login"/> 
        <br/>
        <a href="registration.php">New user? Register here! </a>
    </form>
    </center>
</body>
</html>