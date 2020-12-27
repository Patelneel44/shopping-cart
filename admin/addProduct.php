<?php
    session_start();
    include_once '../connect.php';
    if(!isset($_SESSION['username']))
    {
        header("Location:../index.php");
    }
    if(isset($_POST['submit']))
    {
        
        $filename = $_FILES['image']['name'];
        $tempname = $_FILES['image']['tmp_name'];
        $dir = "../products/" . $filename;
        move_uploaded_file($tempname,$dir);
        $query = "insert into products (pname,cid,price,description,image) values ('".$_POST['pname']."','".$_POST['cid']."','".$_POST['price']."','".$_POST['description']."','".$filename."')";
        $res = mysqli_query($con,$query);
        if($res){
            echo "Product Added Successfully!!!!";
            header("Location:displayProduct.php");
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
    <h1 class="text-primary text-uppercase">Add Category</h1>
    <form method="post" enctype="multipart/form-data">
        <label>Product Name :<label>
        <input type="text" name="pname" placeholder="Enter Product Name"/>
        <br/>
        <br/>
        <label>Select Category :<label>
        <select name="cid">
            <option disabled selected>-- Select Category --</option>
            <?php
                $res = mysqli_query($con, "SELECT * From category");  // Use select query here 
                while($data = mysqli_fetch_assoc($res))
                {
                    echo "<option value='". $data['cid'] ."'>" .$data['cname'] ."</option>";  // displaying data in option menu
                }	
            ?>
        </select>  
        <br/>
        <br/>
        <label>Price :<label>
        <input type="number" name="price" placeholder="Enter Price"/>
        <br/>
        <br/>
        <label>Description :<label>
        <input type="text" name="description" placeholder="Enter Description"/>
        <br/>
        <br/>
        <label>Image :<label>
        <input type="file" name="image"/>
        
        <br/>
        <br/>
        <input type="submit" name="submit" value="Add"/> 
        <br/>
    </form>
</center>
</body>
</html>