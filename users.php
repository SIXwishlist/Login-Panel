<?php
/**
 * Created by PhpStorm.
 * User: shawo
 * Date: 10/31/2017
 * Time: 2:34 PM
 */
session_start();

$u = $_SESSION['un'];
echo $u;
if(empty($u)){
    header("Location: index.php?error=2");
}

?>
<a href="logout.php" >Logout</a>

