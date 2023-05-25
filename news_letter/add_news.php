<?php include('../partials/side.php');
ob_start();
?>

        <div>
            <div class="button_group">
                <a class="a" href="main.php">Manage News</a>
            </div>
            <div class="main_content">
                <p class="page-title">Add news letter from here</p>
            </div>
            <form action="" method="POST" enctype="multipart/form-data">
                <label>Select Year :</label>
                <select name="Year" class="text-input" id="">
                    <option value="2012">2012</option>
                    <option value="2013">2013</option>
                    <option value="2014">2014</option>
                    <option value="2015">2015</option>
                    <option value="2016">2016</option>
                    <option value="2017">2017</option>
                    <option value="2018">2018</option>
                    <option value="2019">2019</option>
                    <option value="2020">2020</option>
                    <option value="2021">2021</option>
                    <option value="2022">2022</option>
                    <option value="2023">2023</option>
                    <option value="2024">2024</option>
                    <option value="2025">2025</option>
                    <option value="2026">2026</option>
                </select>

                <label>Add pdf for spring :</label>
                <input type="file" name="spring" class="text-input">

                <label>Add pdf for summer :</label>
                <input type="file" name="summer" class="text-input">

                <label>Add pdf for fall :</label>
                <input type="file" name="fall" class="text-input">

                <label>Add pdf winter :</label>
                <input type="file" name="winter" class="text-input">

                <input type="submit" name="submit" class="submit-input">

            </form>
        </div>

<?php include('../partials/bottom.php'); ?>

<?php

if (isset($_POST['submit'])) {

    $year = $_POST['Year'];

    $spring = $_FILES['spring']['name'];
    $summer = $_FILES['summer']['name'];
    $fall = $_FILES['fall']['name'];
    $winter = $_FILES['winter']['name'];

    $spring_size = $_FILES['spring']['size'];
    $summer_size = $_FILES['summer']['size'];
    $fall_size = $_FILES['fall']['size'];
    $winter_size = $_FILES['winter']['size'];

    $ext1 = explode('.', $spring);
    $ext2 = explode('.', $summer);
    $ext3 = explode('.', $fall);
    $ext4 = explode('.', $winter);

    $spring_ext1_check = strtolower(end($ext1));
    $summer_ext2_check = strtolower(end($ext2));
    $fall_ext3_check = strtolower(end($ext3));
    $winter_ext4_check = strtolower(end($ext4));


    $vaild_format = array('pdf');


    if ($spring == null && $summer == null && $fall == null && $winter == null) {

        $_SESSION['pdf'] = "<div class='error'>you must choose one pdf file !</div>";
        header('location:main.php');
        die();
    }else{

        if (!$spring == null) {
            $spring_link = 'Download';
        }

        if (!$summer == null) {
            $summer_link = 'Download';
        }

        if (!$fall == null) {
            $fall_link = 'Download';
        }

        if (!$winter == null) {
            $winter_link = 'Download';
        }


        if (in_array($spring_ext1_check, $vaild_format) || in_array($summer_ext2_check, $vaild_format) || in_array($fall_ext3_check, $vaild_format)) {
            $spring_source = $_FILES['spring']['tmp_name'];
            $summer_source = $_FILES['summer']['tmp_name'];
            $fall_source = $_FILES['fall']['tmp_name'];
            $winter_source = $_FILES['winter']['tmp_name'];

            $spring_destination = "../uploaded/news/".$spring;
            $summer_destination = "../uploaded/news/".$summer;
            $fall_destination = "../uploaded/news/".$fall;
            $winter_destination = "../uploaded/news/".$winter;

            move_uploaded_file($spring_source, $spring_destination);
            move_uploaded_file($summer_source, $summer_destination);
            move_uploaded_file($fall_source, $fall_destination);
            move_uploaded_file($winter_source, $winter_destination);

            $sql = "INSERT INTO tbl_newsletter SET year='$year', spring='$spring', summer='$summer', fall='$fall', winter='$winter', spring_link='$spring_link', summer_link='$summer_link', fall_link='$fall_link', winter_link='$winter_link'"; 
            $query = mysqli_query($conn, $sql);
            if ($query == true) {
            
                $_SESSION['pdf'] = "<div class='success'>Image uploaded successfully !</div>";
                header('location:main.php');
            }else{
                $_SESSION['pdf'] = "<div class='error'>Failed upload Image !</div>";
                header('location:main.php');
            }
        }else{
            $_SESSION['pdf'] = "<div class='error'>Only pdf files are allowed !</div>";
            header('location:main.php');
        }
        
        
    }   
}

ob_end_flush();
?>