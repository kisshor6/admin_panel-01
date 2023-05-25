<?php include('../partials/side.php'); ?>

    <div class="button_group">
        <a class="a" href="add_gallery.php">Add photo</a>
    </div>
    <div class="main_content">
        <p class="page-title">Manage Pictures</p><br>
        <?php
        if (isset($_SESSION['add'])) {
            echo $_SESSION['add'];
            unset($_SESSION['add']);
        } 
        if (isset($_SESSION['login'])) {
            echo $_SESSION['login'];
            unset($_SESSION['login']);
        } 
        if (isset($_SESSION['upload'])) {
            echo $_SESSION['upload'];
            unset($_SESSION['upload']);
        } 
    
        ?><br>
        <?php
        $query = "SELECT *FROM tbl_gallery";
        $sql = mysqli_query($conn, $query);
        $i = 1;
        ?>
        <table>
            <thead>
                <th>S.no</th>
                <th>Title</th>
                <th>image</th>
                <th colspan="1">Action</th>

            </thead>
            <tbody>
                <?php
                if ($sql == true) {
                    $count = mysqli_num_rows($sql);
                    if($count>0) {
                        while ($row = mysqli_fetch_assoc($sql)) {
                            $id = $row['id'];
                            $header = $row['title'];
                            $img = $row['gallery'];
                ?>
                <tr>
                    <td><?php echo $i++; ?></td>
                    <td><?php echo $header; ?></td>
                    <td><?php echo $img; ?></td>
                    <td>
                        <a href="delete.php?no=<?php echo $id; ?>&img=<?php echo $img?>" class="a delete">delete</a>
                    </td>
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
