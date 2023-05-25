<?php include('../partials/side.php'); ?>
        <div>
            <div class="button_group">
                <a class="a" href="main.php">Manage Admin</a>
            </div>
            <div class="main_content">
                <p class="page-title">Add Admin Users</p>
            </div>
            <?php
            if (isset($_GET['no'])) {
                $sn = $_GET['no'];
            }
            ?>
            <form action="" method="POST">
            <label>Old password :</label>
                <input type="password" name="o_pass"  class="text-input" required>

                <label>New password :</label>
                <input type="password" name="n_pass"  class="text-input" required>

                <label>Conform password :</label>
                <input type="password" name="c_pass"  class="text-input" required>

            
                <input type="hidden" name="id" value="<?php echo $sn; ?>" class="submit-input">
                <input type="submit" name="submit" class="submit-input">
            </form>
        </div>
<?php include('../partials/bottom.php'); ?>
<?php
    if (isset($_POST['submit'])) {
        
                $id = $_POST['id'];

        $b_old_password = $_POST['n_pass'];
        if (strlen($b_old_password) < 6) {
            $_SESSION['add'] = "<div class='error'>Password must be in 6 characters !</div>";
            header("location:main.php");
            die();
        }else{
            $old_password = md5($_POST['o_pass']);
            $new_password = md5($b_old_password);
            $conform_password = md5($_POST['c_pass']);

            $sql = "SELECT *FROM tbl_admin_users WHERE id=$id AND password='$old_password'";
            $res = mysqli_query($conn, $sql);
            if ($res == true) {
                $count = mysqli_num_rows($res);
                if ($count == 1) {
                    
                    if ($new_password == $conform_password) {

                        $sql2 = "UPDATE tbl_admin_users SET password='$new_password' WHERE id=$id";
                        $query = mysqli_query($conn, $sql2);

                        if ($query == true) {
                            $_SESSION['add'] = "<div class='success'>Password Successfully changed  !</div>";
                            header("location:main.php");
                        }else{
                            $_SESSION['add'] = "<div class='error'>Failed to change the password !</div>";
                            header("location:main.php");
                        }
                        
                    }else{
                        $_SESSION['add'] = "<div class='error'>Password doesn't matched !</div>";
                        header("location:main.php");
                    }
                }else{
                    $_SESSION['add'] = "<div class='error'>Invaild password !</div>";
                    header("location:main.php");
                }
            }
        }
    }
?>