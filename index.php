<!DOCTYPE html>
<html>
<head>
    <title>login form</title>
    <link rel="stylesheet" href="login.css">
</head>
<body>
    <div class="navbar">
        <b>Radhe Radhe Mukund</b>
    </div>
    <div class="main">
        <div class="form-container">
            <div class="form-title">Customer Panel</div>
            <form action="user/user_login.php" method="post">
                <label for="custId">Customer ID:</label>
                <input type="text" id="custId" name="custId">
                <label for="pwd">Password:</label>
                <input type="password" id="pwd" name="pwd">
                <input type="submit" value="Submit" name="login">
                <h1>
                    <?php 
                    error_reporting(0);
                    session_start();
                    if($_SESSION['user_message']){
                    echo $_SESSION['user_message'];}
                   
                    ?>
                </h1>
            </form>
        </div>
        <div class="form-container">
            <div class="form-title">Admin Panel</div>
            <form action="admin/admin_login.php" method="post">
                <label for="adminId">Admin ID:</label>
                <input type="text" id="adminId" name="adminId">
                <label for="pwd">Password:</label>
                <input type="password" id="pwd" name="pwd">
                <input type="submit" value="Submit" name="login">
                <h1>
                    <?php 
                    error_reporting(0);
                    session_start();
                    if($_SESSION['admin_message']){
                    echo $_SESSION['admin_message'];}
                   
                    ?>
                </h1>
            </form>
        </div>
    </div>
    <div class="footer">
        <p>Copyright © Mukund</p>
    </div>
    <?php
    session_destroy();
    ?>
</body>
</html>
