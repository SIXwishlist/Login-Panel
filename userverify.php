<?php
/**
 * Created by PhpStorm.
 * User: shawo
 * Date: 10/31/2017
 * Time: 12:42 PM
 */
session_start();
if (isset($_REQUEST['txtusername'])&& isset($_REQUEST['txtpassword']))
{
    $uname= $_REQUEST['txtusername'];
    $upass= $_REQUEST['txtpassword'];

    include('db.php');
    $q="select * from users where users_username='$uname' and users_Password='$upass'";
    $result = mysqli_query($conn,$q);
    $row = mysqli_fetch_array($result);
    mysqli_close($conn);

//    echo "<br>". $row['users_Password'];
    if($row['users_username'] == "$uname" && $row["users_Password"] == "$upass")
    {
//        echo "login";
        $_SESSION['un']=$uname;
        $_SESSION['up']=$upass;
        header("Location:users.php");
    }
    else
        header("Location: index.php?error=1");
}