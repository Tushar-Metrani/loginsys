<?php
$host="localhost";
$username="root";
$password="";
$db_name="loginsys";

$conn = mysqli_connect($host,$username,$password,$db_name);

if(!$conn){
    die("Error". mysqli_connect_error());
}
?>