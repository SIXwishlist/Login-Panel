<?php
/**
 * Created by PhpStorm.
 * User: shawo
 * Date: 10/31/2017
 * Time: 2:34 PM
 */
session_start();
if(empty($_SESSION['usern'])){
    header("Location: index.php?error=2");
}
$uname = $_SESSION['usern'];
include ("db.php");

//$insertquery =


?>

<form action="" method="get">
    <input type="text" name="usertk">
    <input type="text" name="usrcmt">
    <button type="submit">Submit</button>
</form>

<?php
$t1=$_REQUEST["usertk"];
echo $t1;
?>
<a href="logout.php" >Logout</a><br>

