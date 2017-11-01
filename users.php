<?php
/**
 * Created by PhpStorm.
 * User: shawo
 * Date: 10/31/2017
 * Time: 2:34 PM
 */
session_start();
if(empty($_SESSION['usern']))
{
    header("Location: index.php?error=2");
}
$uname = $_SESSION['usern'];
$uid = $_SESSION["useri"];
if (!empty($_REQUEST["usrtk"]) || !empty($_REQUEST["usrdes"]))
{
    $usertk=$_REQUEST["usrtk"];
    $userdes=$_REQUEST["usrdes"];
    include ("db.php");
    $insertq = "insert into usersinfo (users_id,usersinfo_date,usersinfo_amount,usersinfo_description) values ($uid,'$uid',$usertk,'$userdes')";
    mysqli_query($conn,$insertq);
    header('Location: users.php?success=1');
}
else

?>
<?php if(isset($_GET['success']) &&$_GET['success']==1) echo "Added new Entry"; ?>
<form action="" method="get">
    amount :<input type="text" name="usrtk"><br>
    des: <input type="text" name="usrdes"><br>
    <button type="submit">Submit</button>
</form>
<a href="logout.php" >Logout</a><br>

