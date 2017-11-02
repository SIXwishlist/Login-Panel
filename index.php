<html>
<head>
    <title>Login Panel</title>
    <!--CSS-->
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
<div class="container">
    <div class="container-body">
        <form class="form" method="post" action="userverify.php">
            <div class="header">
                <p>Admin Panel</p>
            </div>
            <label for="username">Username</label>
            <input type="text" name="txtusername" id="username" placeholder="Username" class="username-input">
            <br>
            <label for="password">Password&nbsp</label>
            <input type="password" name="txtpassword" id="password" placeholder="Password" class="password-input">
            <br>
            <input type="checkbox">
            <span>Remember me</span>
            <br>
            <div class="alert">
                *
<!--                --><?php //if(isset($_GET['success'])&& $_GET['success']==1) echo "You have registered successfully." ?>
                <?php if(isset($_GET['success'])&& $_GET['success']==2) echo "<span class='alert-notify'>You have logged out successfully.</span>" ?>
                <?php if(isset($_GET['error'])&& $_GET['error']==1) echo "<span class='alert-notify'>Email/Password Wrong.</span>" ?>
                <?php if(isset($_GET['error'])&& $_GET['error']==2) echo "<span class='alert-notify'>You should login first.</span>" ?>
            </div>
            <button type="submit" class="submit-button"> Sign In</button>
            <button class="btn">
                <a href="">Forget Password?</a>
            </button>
        </form>
    </div>
</div>
</body>
</html>