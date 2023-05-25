<?php include('../partials/side.php'); ?>

<div class="content">
            <div class="button_group">
                <a class="a" href="main.php">Manage Serman-Notes</a>
            </div>
            <div class="main_content">
                <p class="page-title">Add some notes from here</p>
            </div>
            <form action="" method="POST" enctype="multipart/form-data">
                <label> notes name :</label>
                <input type="text" name="title" class="text-input" required>

                <label> select pdf notes :</label>
                <input type="file" name="Pdf" class="text-input" required>

                <input type="submit" name="submit" class="submit-input">

            </form>
        </div>

<?php include('../partials/bottom.php'); ?>

<?php 

if (isset($_POST['submit'])) {
    $title = $_POST['title'];

    if (isset($_FILES['Pdf']['name'])) {
        $pdf = $_FILES['Pdf']['name'];

        $ext = explode('.', $pdf);
        $file_ext_check = strtolower(end($ext));
        $valid_format = array('pdf');
        if (in_array($file_ext_check, $valid_format)) {

            $pdf = "pdf".rand(000, 999).'.'.$file_ext_check;

            $source = $_FILES['Pdf']['tmp_name'];
            $destination = "../uploaded/pdf/".$pdf;

            $upload = move_uploaded_file($source, $destination);
            if ($upload == false) {
                die();
            }else{
                $sql2 = "INSERT INTO tbl_pdf SET pdf_name='$title', pdf_file='$pdf'"; 
                $query = mysqli_query($conn, $sql2);
                if ($query == true) {
                
                    $_SESSION['upload'] = "<div class='success'>Pdf file uploaded successfully !</div>";
                    header('location:main.php');
                }else{
                    $_SESSION['upload'] = "<div class='error'>Failed to upload pdf file !</div>";
                    header('location:main.php');
                }
            }
        }else{
            $_SESSION['upload'] = "<div class='error'>Only pdf file are allowed !</div>";
            header('location:main.php');
        }

        
    }
}

?>