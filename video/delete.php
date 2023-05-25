<?php
include('../config/connection.php');

if (isset($_GET['no'])) {
    $id = $_GET['no'];
    $sql = "DELETE FROM tbl_video WHERE id=$id";
    $res = mysqli_query($conn, $sql);
    if ($res == true) {
        $_SESSION['upload'] = "<div class='error'>video deleted successfully !</div>";
        header("location:main.php");
    }else{
        $_SESSION['upload'] = "<div class='error'>failed to deleted video !</div>";
        header("location:main.php");
    }
}

?>