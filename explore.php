<?php
session_start();
if(isset($_SESSION['username'])){
    echo "welcome ".$_SESSION['username'];
}
else{
    header("location:login.php");
}
if($_SERVER["REQUEST_METHOD"]=="POST"){
    session_unset();
    session_destroy();
    header("location:login.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
</head>
<style>
        *{
            margin:0px;
            padding: 0px;
        }
        #nav {
/*             position: fixed;
            top: 0; */
            display: flex;
            height: 70px;
            width: 100%;
            justify-content: center;
            background-color: bisque;

        }
        ul {
            display: flex;
            flex-direction: row;
            list-style-type: none;
        }
        li{
            margin: 10px;
            display: flex;
            align-items: center;
        }
        a {
            font-size: 20px;
            color:black;
            text-decoration: none;
        }
        li a:hover{
            color: rgb(20, 0, 0) ;
            font-size: 22px;;
        }
        img {
            width: 50px;
        }
        form{
            display: flex;
            flex-direction: row;
            justify-content: center;
        }
        #search input{
            width: 30%;
            padding:2px 5px;
            margin: 10px;
            font-size:18px;
            outline: none;
            border:1px solid black;
            border-radius: 5px;

        }
        #search button{
            margin: 15px 10px 10px 10px;
            padding: 4px 8px;
            font-size: 18px;
            color:white;
            background-color:black;
            border:2px solid white;
            border-radius:5px;
        }
</style>
<body>

<div id="nav">
    <ul>
        <li><a href="index.html">Home</a></li>
        <li><a href="explore.php">Explore</a></li>
        <li><a href="notify.html">Notifications</a></li>
        <li><a href="settings.html">Setting</a></li>
    </ul>
</div>

<div id="search">
    <form action="index.php" method="get">
        <input type="search" name ="search">
        <button type="submit"> 	&#x1F50E;&#xFE0E;</button>
    </form>
</div>

<form action="explore.php" method="post">
    <button type="submit">Logout</button>
</form>

</body>
</html>