<?php
require '_partials/db_connect.php';

if($_SERVER['REQUEST_METHOD']=="POST"){
    $cpass = false;
    $uname=$_POST['uname'];
    $pass=$_POST['pass'];
    $sql="SELECT * FROM `users` WHERE `username` = '$uname';";
    $result=mysqli_query($conn,$sql);
/*     echo var_dump($result); */
    echo mysqli_num_rows($result);
    if(mysqli_num_rows($result)>0){
        $hpass= mysqli_fetch_assoc($result);
        $cpass = password_verify($pass,$hpass['password']);
        if($cpass==true){
        session_start();
        $_SESSION['username']=$uname;
        header('location:explore.php');
        }
        else{
            echo 'Invalid Password';
        }
    }
    else{
        echo "invalid Username";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
<style>
    *{
        margin: 0px;
        padding:0px;
    }
    body{
        background-image:url('img/bg.jpg');
        background-repeat: no-repeat;
        background-size: cover;

    }
    #login{
        display: flex;
        flex-direction:column;
        border:2px solid white;
        border-radius:10px;
        position: relative;
        top: 100px;
        width: 30%;
        height:420px;
        left:460px;
        padding:10px;
        background-color: rgba(54, 83, 57, 0.3);
    }
    form{
        display: flex;
        flex-direction: column;
        align-items: center;
    }
    .fitem{
        width:80%;
        margin:10px;
    }
    input{
        width: 90%;
        padding: 3px 5px;
        margin: 10px;
        outline: none;
        font-size:15px;
        border: 1px solid black;
        border-radius: 5px;
    }
    .fbtn{
        margin:15px;
    }
    .fbtn button{
        padding: 5px 10px;
        outline: none;
        font-size:20px;
        border: 2px solid white;
        border-radius: 5px;
        background-color:black;
        color:white;
    }
    label{
        display: block;
        font-size: 20px;
    }
    h1{
        text-align: center;
        margin:20px 10px 20px 10px;
    }
    #col{
        text-align:center;
        display: flex;
        flex-direction: row;
        align-items: center;
        justify-content: center;
        margin-top: 15px;
    }
    .space{
        margin:10px;
    }
    #col a{
        padding: 10px;
    }
</style>
</head>
<body>
<div id="login">
<form action="login.php" method="post">
<h1>Login</h1>
<div class="fitem">
<label>Username</label>
<input type="text" name="uname" id="uname">
</div>
<div class="fitem">
<label>Password</label>
<input type="password" name="pass" id="pass">
</div>
<div class="fbtn">
<button type="submit">Login</button>
</div>
</form>
<div id="col">
<a href="#">Forgot_Password?</a>
<!-- <h2 class="space">|</h2> -->
<span>Don't have an Account ?</span>
<a href="signup.php">Register</a>
</div>

</div>
</body>
</html>