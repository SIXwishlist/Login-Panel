<?php
/**
 * Created by PhpStorm.
 * User: shawo
 * Date: 10/31/2017
 * Time: 1:36 PM
 */

$localhost="localhost";
$root="root";
$password="";
//$root="hex";
//$password="janina32";
$db="headblocks_managsys";

$conn = mysqli_connect($localhost,$root,$password,$db);


// Check connection
if (mysqli_connect_errno()) {
    header("Location:Error.php");
//    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

