

<?php
require_once 'helpers/Helper.php';
?>
<!-- <div class="container"> -->
    <H1>QUẢN LÝ CHẤM CÔNG CÔNG TY ...</H1>
    <form method="post" action="" enctype="multipart/form-data">
        <div class="info">
            <div class="img-avatar">
                <?php if (!empty($user['avatar'])): ?>
                    <img height="140px" width="105px" src="assets/uploads/<?php echo $user['avatar'] ?>"/>
                <?php endif; ?>
            </div>
            <div class="form-group">
                Mã nhân viên: <label><?php echo $user['username'] ?></label>
                <br>
                Họ và tên: <label><?php echo $user['full_name'] ?></label>
                <br>
                Phòng ban: <label><?php echo $user['room'] ?></label>
                <br>
                Chức vụ: <label><?php echo $user['jobs'] ?></label>
                <br>
                Ngày làm việc: <label><?php echo date("d-m-Y", strtotime(substr($user['workday'], 0, 10))) ?></label>
            </div>
        </div>
        <div class="form">
            <div class="group">
            <a href="index.php?controller=user&action=update" title="Sửa">
                <div class="button-detail-1">
                    Sửa thông tin
                </div>
            </a>
            </div>
            <div class="group">
            <a href="index.php?controller=timekeep&action=timekeep" title="Chấm công">
                <div class="button-detail-2">
                    Chấm công
                </div>
            </a>
            </div>
            <div class="group">
            <a href="index.php?controller=timekeep&action=log" title="Lịch sử">
                <div class="button-detail-3">
                    Lịch sử chấm công
                </div>
            </a>
            </div>
        </div>

    </form>
<!-- </div> -->