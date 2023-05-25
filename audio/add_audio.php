<?php include('../partials/side.php'); ?>

        <div>
            <div class="button_group">
                <a class="a" href="main.php">Manage Audio</a>
            </div>
            <div class="main_content">
                <p class="page-title">Add audio file from here</p>
            </div>
            <?php
            if (isset($_SESSION['upload'])) {
                    echo $_SESSION['upload'];
                    unset($_SESSION['upload']);
                } 
            ?> 
            <form action="" method="POST" enctype="multipart/form-data">
                <label>head title :</label>
                <input type="text" name="header" class="text-input" required>

                <label>description:</label>
                <input type="text" name="description" class="text-input" required>

                <label>Audio file :</label>
                <input type="file" name="Audio" class="text-input" required>

                <input type="submit" name="submit" class="submit-input">

            </form>
        </div>

<?php include('../partials/bottom.php'); ?>
<?php 

if (isset($_POST['submit'])) {
    $header = $_POST['header'];
    $description = $_POST['description'];

    if (isset($_FILES['Audio']['name'])) {
        $audio = $_FILES['Audio']['name'];
        $audio_size = $_FILES['Audio']['size'];

        $ext = (explode('.', $audio));
        $file_ext_check = strtolower(end($ext));
        $valid_format = array('mp3');

        if ($audio_size > 500000 ) {
            $_SESSION['upload'] = "<div class='error'>Image uploaded successfully !</div>";
        }

        if (in_array($file_ext_check, $valid_format)) {

            $audio = "audio".rand(000, 999).'.'.$ext;

            $source = $_FILES['Audio']['tmp_name'];
            $destination = "../uploaded/audio/".$audio;

            $upload = move_uploaded_file($source, $destination);
            if ($upload == false) {
                die();
            }else{
                $sql2 = "INSERT INTO tbl_audio SET header='$header', description='$description', audio='$audio'"; 
                $query = mysqli_query($conn, $sql2);
                if ($query == true) {
                
                    $_SESSION['upload'] = "<div class='success'>Audio uploaded successfully !</div>";
                    header('location:main.php');
                }else{
                    $_SESSION['upload'] = "<div class='error'>Failed upload audio !</div>";
                    header('location:main.php');
                }
            }
        }else{
            $_SESSION['upload'] = "<div class='error'>Only mp3 files are allowed !</div>";
            header('location:main.php');
        }  
    }
}

?>