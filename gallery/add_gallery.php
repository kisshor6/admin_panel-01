<?php include('../partials/side.php'); ?>

        <div>
            <div class="button_group">
                <a class="a" href="main.php">Manage gallery</a>
            </div>
            <div class="main_content">
                <p class="page-title">upload photo in your gallery section</p>
            </div>
            <form action="" method="POST" enctype="multipart/form-data">
                <label>title :</label>
                <input type="text" name="title" class="text-input" required>

                <label>select picture :</label>
                <input type="file" name="Image" class="text-input" required>

                <input type="submit" name="submit" class="submit-input">

            </form>
        </div>

<?php include('../partials/bottom.php'); ?>
<?php 

if (isset($_POST['submit'])) {
    $title = $_POST['title'];

    if (isset($_FILES['Image']['name'])) {
        $image = $_FILES['Image']['name'];

        $ext = explode('.', $image);
        $file_ext_check = strtolower(end($ext));
        $vaild_format = array('png', 'jpg', 'jpeg');

        if (in_array($file_ext_check, $vaild_format)) {
            $image = "image".rand(000, 999).'.'.$file_ext_check;

            $source = $_FILES['Image']['tmp_name'];
            $destination = "../uploaded/gallery/".$image;
    
            $upload = move_uploaded_file($source, $destination);
            if ($upload == false) {
                die();
            }else{
                $sql2 = "INSERT INTO tbl_gallery SET title='$title', gallery='$image'"; 
                $query = mysqli_query($conn, $sql2);
                if ($query == true) {
                
                    $_SESSION['upload'] = "<div class='success'>Image uploaded successfully !</div>";
                    header('location:main.php');
                }else{
                    $_SESSION['upload'] = "<div class='error'>Failed upload Image !</div>";
                    die();
                    header('location:main.php');
                }
            }
        }else{
            $_SESSION['upload'] = "<div class='error'>Only png, jpg, jpej files are allowed !</div>";
            header('location:main.php');
        }
    }
}

?>