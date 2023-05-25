<?php include('../partials/side.php'); ?>
        <div>
            <div class="button_group">
                <a class="a" href="add.php">Add Admin</a>
            </div>
            <div class="main_content">
                <p class="page-title">Admin Users</p><br>
                <?php
                if (isset($_SESSION['add'])) {
                    echo $_SESSION['add'];
                    unset($_SESSION['add']);
                } 
                if (isset($_SESSION['login'])) {
                    echo $_SESSION['login'];
                    unset($_SESSION['login']);
                } 
                ?><br>
                <?php
                $query = "SELECT *FROM tbl_admin_users";
                $sql = mysqli_query($conn, $query);
                $i = 1;
                ?>
                <table>
                    <thead>
                        <th>S.no</th>
                        <th>Username</th>
                        <th colspan="2">Action</th>

                    </thead>
                    <tbody>
                        <?php
                        if ($sql == true) {
                            $count = mysqli_num_rows($sql);
                            if($count>0) {
                                while ($row = mysqli_fetch_assoc($sql)) {
                                    $id = $row['id'];
                                    $username = $row['username'];
                                    $date = $row['time'];
                        ?>
                        <tr>
                            <td><?php echo $i++; ?></td>
                            <td><?php echo $username; ?></td>
                            <td>
                                <a href="change_password.php?no=<?php echo $id; ?>" class="a delete">change_Password</a>
                            </td>
                        </tr>
                        <?php
                                }

                            }else{
                                echo"NO DATA AVAILABLE";
                            }
                        }
                        
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
<?php include('../partials/bottom.php'); ?>