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
    mysqli_close();
    header('Location: users.php?success=1');
}
?>
<a href="logout.php" >Logout</a><br>
<?php if(isset($_GET['success']) &&$_GET['success']==1) echo "Added new Entry"; ?>
<form action="" method="get">
    amount :<input type="text" name="usrtk"><br>
    des: <input type="text" name="usrdes"><br>
    <button type="submit">Submit</button>
</form>

<?php
include ("db.php");
$selectq = "select * from usersinfo where users_id = '$uid'";
$result = mysqli_query($conn,$selectq);
$row = mysqli_fetch_array($result);

?>
<table>
    <thead>
        <tr>
            <th>Name</th>
            <th>Date</th>
            <th>Amount</th>
            <th>Description</th>
        </tr>
    </thead>
    <tbody>
        <?php  while ($row)
        {
//            echo "<tr><td>";
//                echo $uname;
//            echo "</td>";
//            echo "<tr><td>";
//            echo $row["usersinfo_amount"];
//            echo "</td>";

            echo "<tr><td>";
                echo "name";
            echo "</td><td>";
            echo <>

        }
        ?>
    </tbody>
</table>


