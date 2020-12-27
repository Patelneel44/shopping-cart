<?php

session_start();
include_once '../connect.php';
if(!isset($_SESSION['username']))
{
    header("Location:../index.php");
}
    if(isset($_POST['submit']))
    {
    $cid=$_GET['cid'];
    $cname=$_POST['cname'];
    $query = "update category set cname ='".$cname."' where cid=".$cid;
    $res = mysqli_query($con,$query);
        if($res){
            echo "Update Category Successfully!!!!";
            header("Location:displayCategory.php");
        }
        else{
            echo "Error occur while Update category!!!!";
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
    
    <h1>Update Category</h1>
    <form method="post" id="category">
        
        <label>Category Name :<label>
        <input type="text" name="cname" value="<?php echo $_GET['cname']; ?>"/>
        <br/>
        <br/>
        <input type="submit" name="submit" value="Add"/> 
        <br/>
    </form>

    
</body>
</html>