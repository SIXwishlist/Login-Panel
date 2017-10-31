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

?>
<a href="logout.php" >Logout</a>

