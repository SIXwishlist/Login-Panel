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

//    echo $uname,$upass;

    include('db.php');
    $q="select * from users where users_username='$uname' and users_Password='$upass'";
    $result = mysqli_query($conn,$q);
    $row = mysqli_fetch_array($result);
    mysqli_close($conn);

    if($row['users_username'] == "$uname" && $row["users_Password"] == "$upass")
    {
        $_SESSION['un']=$uname;
        $_SESSION['up']=$upass;
        header("Location:users.php");
    }
//    else
//        header("Location: index.php?error=1");
}
else
    header("Location: index.php?error=1");


//
if($_REQUEST)
{
    if (isset($_REQUEST['txtusername'])&& isset($_REQUEST['txtpassword'])) {
        $uname = $_REQUEST['txtusername'];
        $upass = $_REQUEST['txtpassword'];
    }
}
$flag=1;
if($uname == ""){
    $flag=0;
}
if($upass==""){
    $flag=0;
}
if($flag!=0){

    include('db.php');
    $q="select * from users where users_username='$uname' and users_Password='$upass'";
    $result = mysqli_query($conn,$q);
    $row = mysqli_fetch_array($result);
    mysqli_close($conn);

    if($row['users_username'] == "$uname" && $row["users_Password"] == "$upass")
    {
        $_SESSION['un']=$uname;
        $_SESSION['up']=$upass;
        header("Location:users.php");
    }
    else
        header("Location: index.php?error=1");
}
