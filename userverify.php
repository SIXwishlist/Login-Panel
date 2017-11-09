<?php
/**
 * Created by PhpStorm.
 * User: shawo
 * Date: 10/31/2017
 * Time: 12:42 PM
 */

session_start();
//check the request
if (isset($_REQUEST['txtusername'])&& isset($_REQUEST['txtpassword']))
{
//    declare variable for username & password from request
    $uname= $_REQUEST['txtusername'];
    $upass= $_REQUEST['txtpassword'];
//  open database file
    include('db.php');
//    query for login verification
    $q="select * from users where users_username='$uname' and users_Password='$upass'";
    $result = mysqli_query($conn,$q);
    $row = mysqli_fetch_array($result);
//    close database connection
    mysqli_close($conn);
//    check admin or user login
    if ($row['users_username'] == "admin" && $row["users_Password"] == "headblocks")
    {
//        declare session variable
        $_SESSION['userName'] = $row['users_Name'];
        $_SESSION['usern'] = $uname;
        $_SESSION['userp'] = $upass;
        $_SESSION["useri"] = $row["users_id"];
//        redirect to admin page
        header("Location:admin.php");
    }
    elseif($row['users_username'] == "$uname" && $row["users_Password"] == "$upass")
    {
//        declare session variable
        $_SESSION['userName'] = $row['users_Name'];
        $_SESSION['usern'] = $uname;
        $_SESSION['userp'] = $upass;
        $_SESSION["useri"] = $row["users_id"];
//        redirect to users page
        header("Location:users.php");
    }
    else
//        redirect with alert index page
        header("Location: index.php?error=1");
}
