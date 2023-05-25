<?php
include('../config/connection.php');

if (isset($_GET['no'])) {
    $id = $_GET['no'];
    $pdf = $_GET['file'];


    if ($pdf !="") {
        $path = "../uploaded/pdf/".$pdf;
        $remove = unlink($path);
        if ($remove == false) {
            header("location:main.php");
        }
    }

    $sql = "DELETE FROM tbl_pdf WHERE id=$id";
    $res = mysqli_query($conn, $sql);
    if ($res == true) {
        $_SESSION['add'] = "<div class='success'>deleted successfully</div>";
        header("location:main.php"); 

    }else{
        $_SESSION['add'] = "<div class='error'>Failed to delete</div>";
        header("location:main.php");
  
    }
}

?>