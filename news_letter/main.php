<?php include('../partials/side.php'); ?>
<div class="button_group">
        <a class="a" href="add_news.php">Add News Letter</a>
    </div>
    <div class="main_content">
        <p class="page-title">Add news letter from here</p><br>
        <?php
            if (isset($_SESSION['pdf'])) {
                echo $_SESSION['pdf'];
                unset($_SESSION['pdf']);
            } 
            ?>
        <br>
        <?php
        $query = "SELECT *FROM tbl_newsletter";
        $sql = mysqli_query($conn, $query);
        ?>
        <table>
            <thead>
                <th>Year</th>
                <th>spring</th>
                <th>summer</th>
                <th>fall</th>
                <th>winter</th>

            </thead>
            <tbody>
                <?php
                if ($sql == true) {
                    $count = mysqli_num_rows($sql);
                    if($count>0) {
                        while ($row = mysqli_fetch_assoc($sql)) {
                            $year = $row['year'];
                            $spring = $row['spring'];
                            $summer = $row['summer'];
                            $fall = $row['fall'];
                            $winter = $row['winter'];
                ?>
                <tr>
                    <td><?php echo $year; ?></td>
                    <td><?php echo $spring; ?></td>
                    <td><?php echo $summer; ?></td>
                    <td><?php echo $fall; ?></td>
                    <td><?php echo $winter; ?></td>
                </tr>
                <?php
                        }

                    }else{
                        die();
                    }
                }
                
                ?>
            </tbody>
        </table>
    </div>
<?php include('../partials/bottom.php'); ?>