<?php include('../partials/side.php'); ?>

    <div class="button_group">
        <a class="a" href="add_pdf.php">Add Serman-Notes</a>
    </div>
    <div class="main_content">
        <p class="page-title">Manage Notes</p><br>
        <?php
        if (isset($_SESSION['upload'])) {
            echo $_SESSION['upload'];
            unset($_SESSION['upload']);
        } 
        if (isset($_SESSION['add'])) {
            echo $_SESSION['add'];
            unset($_SESSION['add']);
        } 
    
        ?><br>
        <?php
        $query = "SELECT *FROM tbl_pdf";
        $sql = mysqli_query($conn, $query);
        $i = 1;
        ?>
        <table>
            <thead>
                <th>S.no</th>
                <th>header</th>
                <th>song_name</th>
                <th colspan="1">Action</th>

            </thead>
            <tbody>
                <?php
                if ($sql == true) {
                    $count = mysqli_num_rows($sql);
                    if($count>0) {
                        while ($row = mysqli_fetch_assoc($sql)) {
                            $id = $row['id'];
                            $name = $row['pdf_name'];
                            $file = $row['pdf_file'];
                ?>
                <tr>
                    <td><?php echo $i++; ?></td>
                    <td><?php echo $name; ?></td>
                    <td><?php echo $file; ?></td>
                    <td>
                        <a href="delete.php?no=<?php echo $id; ?>&file=<?php echo $file?>" class="a delete">delete</a>
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
