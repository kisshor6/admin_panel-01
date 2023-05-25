<?php include('./config/connection.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add_User</title>
    <link rel="stylesheet" href="main.css">
</head>
<body>
    <section class="whole_form">
        <div class="main-form">
            <form class="form2" action="" method="POST">
                <p class="page-title">LOGIN</p><br>

                <?php
                if (isset($_SESSION['login'])) {
                    echo $_SESSION['login'];
                    unset($_SESSION['login']);
                } 

                if (isset($_SESSION['no-login-message'])) {
                    echo $_SESSION['no-login-message'];
                    unset($_SESSION['no-login-message']);
                } 
                ?><br>

                <label>Username :</label>
                <input type="text" name="username"  class="login-input" required>

                <label>Password :</label>
                <input type="password" name="password"  class="login-input" required>

                <input type="submit" name="submit" class="submit-data">

            </form>
        </div>
    </section>
</body>
</html>

<?php

if (isset($_POST['submit'])) {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, md5($_POST['password']));

    $sql = "SELECT * FROM tbl_admin_users WHERE username='$username' AND password='$password'";
    $res = mysqli_query($conn, $sql);
    $count = mysqli_num_rows($res);

    if ($count == 1) {
        $_SESSION['login'] = "<div class='success'>Successfully login !</div>";
        $_SESSION['user'] = $username;
        header("location:admin_user/main.php");
    }else{
        $_SESSION['login'] = "<div class='error'>Username or psaaword doesn't matched !</div>";
        header("location:login.php");

    }
}
?>