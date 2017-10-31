<?php
/**
 * Created by PhpStorm.
 * User: shawo
 * Date: 10/31/2017
 * Time: 12:42 PM
 */

if ($_REQUEST){
    $user=$_REQUEST['txtusername'];
    $pass=$_REQUEST['txtpassword'];

    print_r($user,$pass);

}

?>

<html>
<head>
	<title>Login Panel</title>
	<!--CSS-->
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	<div class="container">
		<div class="container-body">
			
			<form class="form" method="post" action="test.php">
				<div class="header">
					<p>Admin Panel</p>
				</div>
				<label for="username">Username</label>
				<input type="text" name="txtusername" id="username" placeholder="Username">
				<br>
				<label for="password">Password&nbsp</label>
				<input type="password" name="txtpassword" id="password" placeholder="Password">
				<br>
				<input type="checkbox">
				<span>Remember me</span>
				<br>
<!--				<button type="submit"> Sign In</button>-->
                <input type="submit" value="Sign In">
                <button class="btn">
                    <a href="">Forget Password?</a>
                </button>
			</form>
		</div>
	</div>
</body>
</html>

<!--Developed by Mahmudul Hassan Navid-->