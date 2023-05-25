<?php include('../partials/side.php'); ?>
        <div>
            <div class="button_group">
                <a class="a" href="main.php">Manage Admin</a>
            </div>
            <div class="main_content">
                <p class="page-title">Add Admin Users</p>
            </div>
            <form action="" method="POST">
                <label>Username :</label>
                <input type="text" name="username" class="text-input" required>

                <label>password :</label>
                <input type="password" name="password" class="text-input" required><br>
                <input type="submit" name="submit" class="submit-input">
            </form>
        </div>
<?php include('../partials/bottom.php'); ?>
<?php
    if (isset($_POST['submit'])) {

        $username = mysqli_real_escape_string($conn, $_POST['username']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);

        if (strlen($username) < 4) {
            $_SESSION['add'] = "<div class='error'>Username must be in more than 4 characters !</div>";
            header("location:main.php");
            die();
        }else{
            if (strlen($password) < 6) {
                $_SESSION['add'] = "<div class='error'>password must be in 6 characters!</div>";
                header("location:main.php");
                die();
            }else{     
                $check_user = "SELECT username FROM tbl_admin_users WHERE username = '$username'";
                $user_query = mysqli_query($conn,$check_user);
                $count = mysqli_num_rows($user_query);

                if ($count > 0) {
                    $_SESSION['add'] = "<div class='error'>This username already exist</div>";
                    header("location:main.php");
                    die();
                }

                $e_password = md5($password);
                $sql = "INSERT INTO tbl_admin_users SET username='$username', password='$e_password'";
                $query = mysqli_query($conn, $sql);
                if ($query == true) {
        
                    $_SESSION['add'] = "<div class='success'>Admin added successfully !</div>";
                    header("location:main.php");
        
                    }else{
                        $_SESSION['add'] = "<div class='error'>Failed to add Admin !</div>";
                        header("location:main.php");
                    }
            }
        }
        
    }
    ?>