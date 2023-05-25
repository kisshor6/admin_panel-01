<?php include('../partials/side.php');?>
<div>
<div class="button_group">
    <a class="a" href="add_video.php">Add Video</a>
</div>
<div class="main_content">
    <p class="page-title">Add video url file from here</p><br>
    <?php
    if (isset($_SESSION['upload'])) {
        echo $_SESSION['upload'];
        unset($_SESSION['upload']);
    } 
    ?><br>
    <?php
    $query = "SELECT *FROM tbl_video";
    $sql = mysqli_query($conn, $query);
    $i = 1;
    ?>
    <table>
        <thead>
            <th>S.no</th>
            <th>video title</th>
            <th colspan="2">Action</th>

        </thead>
        <tbody>
            <?php
            if ($sql == true) {
                $count = mysqli_num_rows($sql);
                if($count>0) {
                    while ($row = mysqli_fetch_assoc($sql)) {
                        $id = $row['id'];
                        $username = $row['header'];
            ?>
            <tr>
                <td><?php echo $i++; ?></td>
                <td><?php echo $username; ?></td>
                <td>
                    <a href="delete.php?no=<?php echo $id; ?>" class="a delete">delete_Video</a>
                </td>
            </tr>
            <?php
                    }

                }else{
                    echo"NO DATA INSERTED";
                }
            }
            
            ?>
        </tbody>
    </table>
</div>
</div>
?>