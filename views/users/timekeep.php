<div class="container">
    <H1>QUẢN LÝ CHẤM CÔNG CÔNG TY ...</H1>
    >> Chấm công
    <form method="post" action="" enctype="multipart/form-data">
        <div class="form-group">
            <?php 
            echo date("l, d/m/Y");
            ?>
            <br>
            <label>Mã nhân viên: <?php echo $user['username'] ?></label>
            <br>
            <label>Họ và tên: <?php echo $user['full_name'] ?></label>
            <br>
            <div class="rectangle">
                <p>
                    <?php 
                        echo $date = date("H:i");
                    ?>
                </p>
            </div>
        </div>
        <input type="text" name="user_id" id="user_id" value="<?php echo $user['id'] ?>" style="display: none;">
        <input type="text" name="date" id="date" value="<?php echo date("Y-m-d")?>" style="display: none;">
        <input type="text" name="log" id="log" value="<?php echo $date?>" style="display: none;">
        <!-- <a href="index.php?controller=user&action=detail&id=<?php echo $_SESSION['user']['id'];?>" class="btn btn-default">Back</a> -->
        <input type="submit" name="logout" value="Check out" class="btn btn-primary"/>
        <input type="submit" name="login" value="Check in" class="btn btn-primary"/>
    </form>
</div>