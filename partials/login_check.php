<?php
if (!isset($_SESSION['user'])) {
    $_SESSION['no-login-message'] = "<div class='error'>Please login to access admin panel</div>";
    header("location:../login.php");
}
?>