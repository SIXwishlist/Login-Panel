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
    <?php
    include ("db.php");
    $selectq = "select * from usersinfo where users_id = '$uid'";
    $sumq = "select SUM(usersinfo_amount) from usersinfo";

    $selectresult = mysqli_query($conn,$selectq);
    $sumresult = mysqli_query($conn,$sumq);

    $sumrow = mysqli_fetch_array($sumresult);

    while ($selectrow = mysqli_fetch_array($selectresult)) {
        echo "<tr><td>";
        echo $uname;
        echo "</td><td>";
        echo "date";
        echo "</td><td>";
        echo $selectrow["usersinfo_amount"];
        echo "</td><td>";
        echo $selectrow["usersinfo_description"];
        echo "</td></tr>";
    }
    ?>
    <tr>
        <td></td>
        <td><?php echo "Total =" ?></td>
        <td><?php echo $sumrow['SUM(usersinfo_amount)']; ?></td>
        <td></td>
    </tr>
    </tbody>
</table>

<?php
//include ("db.php");
//$selectq = "select SUM(usersinfo_amount) from usersinfo";
//$result = mysqli_query($conn,$selectq);
//$row = mysqli_fetch_array($result);
//echo $row['SUM(usersinfo_amount)'];
//?>


