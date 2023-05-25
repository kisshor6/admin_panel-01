<?php include('../partials/side.php');
ob_start();
?>

<div class="content">
            <div class="button_group">
                <a class="a" href="main.php">Manage Video </a>
            </div>
            <div class="main_content">
                <p class="page-title">Add video url file from here</p>
            </div>
            <?php
            if (isset($_SESSION['upload'])) {
                    echo $_SESSION['upload'];
                    unset($_SESSION['upload']);
                } 
            ?> 
            <form action="" method="POST">
                <label>header title :</label>
                <input type="text" name="title" class="text-input" required>

                <label>Add youtube Video url :</label>
                <input type="text" name="video_link" class="text-input" required>

                <input type="submit" name="submit" class="submit-input">

            </form>
        </div>

<?php include('../partials/bottom.php'); ?>
<?php 

if (isset($_POST['submit'])) {
    $title = $_POST['title'];
    $url = $_POST['video_link'];

    $sql2 = "INSERT INTO tbl_video SET header='$title', video_url='$url'"; 
    $query = mysqli_query($conn, $sql2);
    if ($query == true) {
        $_SESSION['upload'] = "<div class='success'>video link uploaded successfully !</div>";
        header('location:main.php');
    }else{
        $_SESSION['upload'] = "<div class='error'>Failed to upload video link audio !</div>";
        die();
        header('location:main.php');
    }
}
ob_end_flush();
?>