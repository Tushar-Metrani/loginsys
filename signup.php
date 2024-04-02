<?php
 $connect = require '_partials/db_connect.php';

 if(isset($_SESSION['username'])){
    header("location:explore.php");
 }
 
 if($_SERVER['REQUEST_METHOD']=="POST"){
    
    $uname=$_POST["uname"];
    $email=$_POST['email'];
    $pass=$_POST['password'];
    $cpass=$_POST['cpassword'];
    $hashpass=password_hash($pass,PASSWORD_DEFAULT);

    $sql="INSERT INTO `users` (`username`, `email`, `password`, `cpass`) VALUES ('$uname', '$email', '$hashpass', '$cpass');";

    $q=mysqli_query($conn,$sql);

    $sqlt="CREATE TABLE `loginsys`.`$uname` (`index` INT(255) NOT NULL AUTO_INCREMENT , `caption` VARCHAR(255) NOT NULL , `image` BLOB NOT NULL , `likes` INT(255) NOT NULL , `comments` VARCHAR(255) NOT NULL , PRIMARY KEY (`index`)) ENGINE = InnoDB; ";

    $qt=mysqli_query($conn,$sqlt);

    if($q and $qt){
        echo'<div id="salert">Account Created Successfully! </div>';
    }
    else{
        echo'<div class="ralert">Account Could not be created! </div>';
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup</title>
<link rel="stylesheet" href="style1.css">
</head>

<body>


    <div id="register">
        <h2>Create Account in Vegan Paradise</h2>
        <form method="post" action="signup.php">


            <div class="fitem">
                <label> Username </label>
                <input type="text" name="uname" id="uname">
            </div>


            <div class="fitem">
                <label>Email Id </label>
                <input type="email" name="email" id="email">
            </div>


            <div class="fitem">
                <label>Password</label>
                <input type="password" name="password" id="pass">
            </div>


            <div class="fitem">
                <label>Confirm Password</label>
                <input type="password" name="cpassword" id="cpass">
            </div>

            <div class="rfitem">
                <button type="submit" id="sbtn">Register</button>
                <button type="reset" id="rbtn"><strong>&#x21bb;</strong></button>
            </div>

        </form>
        <div id="col">
        <b>Already have an account ?</b>
        <a href="login.php">login</a>
        </div>
    </div>
</body>

</html>