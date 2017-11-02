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
$userName = $_SESSION['userName'];
$uname = $_SESSION['usern'];
$uid = $_SESSION["useri"];
if (!empty($_REQUEST["usrtk"]) || !empty($_REQUEST["usrdes"]))
{
    $usertk=$_REQUEST["usrtk"];
    $userdes=$_REQUEST["usrdes"];
    $userdate = $_REQUEST["usrdate"];
    include ("db.php");
    $insertq = "insert into usersinfo (users_id,usersinfo_date,usersinfo_amount,usersinfo_description) values ($uid,'$userdate',$usertk,'$userdes')";
    mysqli_query($conn,$insertq);
    mysqli_close();
    header('Location: users.php?success=1');
}
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User</title>
    <!--CSS-->
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.10/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script>
        $( function() {
            $( "#from-date" ).datepicker({
                dateFormat: "dd-mm-yy"
            });
            $('#from-date').datepicker('setDate', 'today');
        } );
    </script>
</head>
<body>
    <div class="container">
        <header class="header-content">
            <span><?php echo $userName ?></span>
            <!-- <button class="logout-button"><a href="logout.php">Log Out</a></button> -->
            <div class="logout-button">
                <a href="logout.php">Log Out</a>
            </div>
            
        </header>
        <div class="user-input">
            <?php 
            if(isset($_GET['success']) &&$_GET['success']==1) 
                echo "<div class='entry-confirm-notify'>***<span>Added new Entry</span></div>"; 
            ?>
            <form action="" method="get">
                <fieldset>
                    <legend>Entry</legend>
                    <div class="left-input">
                        <label for="from-date">Date</label>
                        <input type="text" name="usrdate" id="from-date" placeholder="Date" class="date-picker">
                        <br>
                        <label for="amount">Tk.</label>
                        <input type="number" name="usrtk" id="amount" placeholder="Amount" class="amount-input">
                    </div>
                    <div class="right-input">
                        <label for="comment">Comment</label>
                        <textarea name="usrdes" id="comment" ></textarea>
                    </div>
                </fieldset>
                <div class="user-button">
                    <button class="confirm-button" type="submit">Confirm</button>
                </div>
            </form>
        </div>
        <div class="user-table">
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
                $sumq = "select SUM(usersinfo_amount) from usersinfo where users_id = '$uid' ";

                $selectresult = mysqli_query($conn,$selectq);
                $sumresult = mysqli_query($conn,$sumq);

                $sumrow = mysqli_fetch_array($sumresult);

                while ($selectrow = mysqli_fetch_array($selectresult)) {
                    echo "<tr><td>";
                    echo $uname;
                    echo "</td><td>";
                    echo $selectrow["usersinfo_date"];
                    echo "</td><td>";
                    echo $selectrow["usersinfo_amount"];
                    echo "</td><td>";
                    echo $selectrow["usersinfo_description"];
                    echo "</td></tr>";
                }
                ?>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                    <td><?php echo "Total =" ?></td>
                    <td><?php echo $sumrow['SUM(usersinfo_amount)']; ?></td>
                    <td></td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>