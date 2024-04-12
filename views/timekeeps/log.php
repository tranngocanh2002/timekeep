<!-- <div class="container"> -->
<a href="index.php?controller=user&action=detail" class="btn btn-default">Trở lại</a>

    <H1><a href="index.php?controller=user&action=detail">QUẢN LÝ CHẤM CÔNG CÔNG TY ...</a></H1>
    >> Lịch sử chấm công
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
        </div>
        <table class="table_log">
            <tr>
                <th>Ngày</th>
                <th>Giờ vào</th>
                <th>Giờ ra</th>
                <th>Đi muộn</th>
            </tr>
            <?php foreach ($logs as $key => $log):?>
            <tr>
                <td><?php echo $log['date']; ?></td>
                <!-- substr($log['logout'], 0, 10) -->
                <td><?php echo substr($log['login'], 0, 5); ?></td>
                <td><?php echo substr($log['logout'], 0, 5); ?></td>
                <td><?php echo $log['type']; ?></td>
            </tr>
            <?php endforeach; ?>
        </table>
    </form>
<!-- </div> -->