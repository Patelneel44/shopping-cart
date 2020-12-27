<?php
    include_once 'connect.php';
    if(isset($_POST['submit']))
    {
        
        $query = "insert into users (username,email,password,role,contactno) values ('".$_POST['username']."','".$_POST['email']."','".$_POST['password']."','user','".$_POST['contactno']."')";
        $res = mysqli_query($con,$query);
        if($res){
            echo "Registered Successfully!!!!";
            header("Location:index.php");
        }
        else{
            echo "Error occur while inserting category!!!!";
        echo mysqli_error($con);
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
    <h1 class="text-primary text-uppercase">REGISTRATION</h1>
    <form method="post" enctype="multipart/form-data">
    <table>
        <label>User Name :<label>
        <input type="text" name="username" placeholder="Enter User Name"/>
        <br/>
        <br/>
        <label>Email:<label>
        <input type="email" name="email" placeholder="Enter Email"/>
        <br/>
        <br/>
        <label>Password:<label>
        <input type="password" name="password" placeholder="Enter Password"/>
        <br/><br/>
        <label>Contact No:<label>
        <input type="number" name="contactno" placeholder="Enter Contact No"/>
        <br/>
        <br/>
        <input type="submit" name="submit" value="Add"/> 
        <br/>
    </form>
</center>
</body>
</html>