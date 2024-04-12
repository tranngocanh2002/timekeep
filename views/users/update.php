<!-- <h2>Cập nhật user</h2>
<form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="username">Username <span class="red">*</span></label>
        <input type="text" name="username" id="username"
               value="<?php echo isset($_POST['username']) ? $_POST['username'] : $user['username'] ?>" disabled
               class="form-control"/>
    </div>
    <div class="form-group">
        <label for="first_name">First_name</label>
        <input type="text" name="first_name" id="first_name"
               value="<?php echo isset($_POST['first_name']) ? $_POST['first_name'] : $user['first_name'] ?>"
               class="form-control"/>
    </div>
    <div class="form-group">
        <label for="last_name">Last_name</label>
        <input type="text" name="last_name" id="last_name"
               value="<?php echo isset($_POST['last_name']) ? $_POST['last_name'] : $user['last_name'] ?>"
               class="form-control"/>
    </div>
    <div class="form-group">
        <label for="phone">Phone</label>
        <input type="number" name="phone" id="phone"
               value="<?php echo isset($_POST['phone']) ? $_POST['phone'] : $user['phone'] ?>"
               class="form-control"/>
    </div>
    <div class="form-group">
        <label for="email">Email</label>
        <input type="text" name="email" id="email"
               value="<?php echo isset($_POST['email']) ? $_POST['email'] : $user['email'] ?>"
               class="form-control"/>
    </div>
    <div class="form-group">
        <label for="address">Address</label>
        <input type="text" name="address" id="address"
               value="<?php echo isset($_POST['address']) ? $_POST['address'] : $user['address'] ?>"
               class="form-control"/>
    </div>
    <div class="form-group">
        <label for="avatar">Avatar</label>
        <input type="file" name="avatar" id="avatar" class="form-control"/>
        <?php if (!empty($user['avatar'])): ?>
            <img height="80" src="assets/uploads/<?php echo $user['avatar'] ?>"/>
        <?php endif; ?>
    </div>
    <div class="form-group">
        <label for="jobs">Jobs</label>
        <input type="text" name="jobs" id="jobs"
               value="<?php echo isset($_POST['jobs']) ? $_POST['jobs'] : $user['jobs'] ?>"
               class="form-control"/>
    </div>
    <div class="form-group">
        <label for="facebook">Facebook</label>
        <input type="text" name="facebook" id="facebook"
               value="<?php echo isset($_POST['facebook']) ? $_POST['facebook'] : $user['facebook'] ?>"
               class="form-control"/>
    </div>
    <div class="form-group">
        <label for="status">Trạng thái</label>
        <select name="status" class="form-control" id="status">
            <?php
            $selected_active = '';
            $selected_disabled = '';
            if (isset($_POST['status'])) {
                switch ($_POST['status']) {
                    case 0:
                        $selected_disabled = 'selected';
                        break;
                    case 1:
                        $selected_active = 'selected';
                        break;
                }
            }
            ?>
            <option value="0" <?php echo $selected_disabled; ?>>Disabled</option>
            <option value="1" <?php echo $selected_active ?>>Active</option>
        </select>
    </div>
    <div class="form-group">
        <input type="submit" name="submit" value="Save" class="btn btn-primary"/>
        <a href="index.php?controller=user&action=index" class="btn btn-default">Back</a>
    </div>
</form> -->

<!-- <div class="container"> -->
<a href="index.php?controller=user&action=detail" class="btn btn-default">Trở lại</a>

    <H1><a href="index.php?controller=user&action=detail">QUẢN LÝ CHẤM CÔNG CÔNG TY ...</a></H1>
    <form method="post" action="" enctype="multipart/form-data">
        <div class="img-avatar">
            <div class="form-group">
                <label for="avatar">Ảnh đại diện</label>
                <input type="file" name="avatar" id="avatar" class="form-control"/>
                <?php if (!empty($user['avatar'])): ?>
                    <img height="80" src="assets/uploads/<?php echo $user['avatar'] ?>"/>
                <?php endif; ?>
            </div>
            <!-- <input type="file" name="avatar" class="form-control" id="category-avatar"/>
            <img src="#" id="img-preview" style="display: none" width="100" height="100"/> -->
        </div>
        <div class="form-group">
            <label for="username">Mã nhân vien <span class="red">*</span></label>
            <input type="text" name="username" id="username"
                value="<?php echo isset($_POST['username']) ? $_POST['username'] : $user['username'] ?>" disabled
                class="form-control"/>
        </div>
        <div class="form-group">
            <label for="full_name">Họ và tên</label>
            <input type="text" name="full_name" id="full_name"
                value="<?php echo isset($_POST['full_name']) ? $_POST['full_name'] : $user['full_name'] ?>"
                class="form-control"/>
        </div>
        <!-- <div class="form-group">
            <label for="room">Phòng ban</label>
            <input type="text" name="room" id="room"
                value="<?php echo isset($_POST['room']) ? $_POST['room'] : $user['room'] ?>"
                class="form-control"/>
        </div> -->
        <div class="form-group">
            <label for="room">Phòng ban</label>
            <?php
            $selected_ns = '';
            $selected_hc = '';
            $selected_kt = '';
            if (isset($user['room'])) {
                if ($user['room'] == 'Phòng nhân sự') {
                    $selected_ns = 'selected';
                }
                if ($user['room'] == 'Phòng hành chính'){
                    $selected_hc = 'selected';
                }
                if ($user['room'] == 'Phòng kỹ thuật'){
                    $selected_kt = 'selected';
                }
            }
            ?>
            <select name="room" class="form-control" id="room">
                <option value="Phòng nhân sự" <?php echo $selected_ns; ?>>Phòng nhân sự</option>
                <option value="Phòng hành chính" <?php echo $selected_hc; ?>>Phòng hành chính</option>
                <option value="Phòng kỹ thuật" <?php echo $selected_kt; ?>>Phòng kỹ thuật</option>
            </select>
        </div>
        <div class="form-group">
            <label for="jobs">Chức vụ</label>
            <!-- <input type="text" name="jobs" id="jobs"
                value="<?php echo isset($_POST['jobs']) ? $_POST['jobs'] : $user['jobs'] ?>"
                class="form-control"/> -->
            <?php
            $selected_tts = '';
            $selected_nv = '';
            if (isset($user['jobs'])) {
                if ($user['jobs'] == 'Thực tập sinh') {
                    $selected_tts = 'selected';
                }
                if ($user['jobs'] == 'Nhân viên chính thức'){
                    $selected_nv = 'selected';
                }
            }
            ?>
            <select name="jobs" class="form-control" id="jobs">
                <option value="Thực tập sinh" <?php echo $selected_tts; ?>>Thực tập sinh</option>
                <option value="Nhân viên chính thức" <?php echo $selected_nv; ?>>Nhân viên chính thức</option>
            </select>
        </div>
        <label>Ngày làm việc:</label>
        <br>
        <input type="date" name="workday" id="workday" min="2000-01-01" value="<?php echo isset($_POST['workday']) ? $_POST['workday'] : substr($user['workday'], 0, 10) ?>" />
        <br>
        <!-- <a href="index.php?controller=user&action=detail&id=<?php echo $_SESSION['user']['id'];?>" class="btn btn-default">Trở lại</a> -->
        <input type="submit" name="submit" value="Lưu" class="btn btn-primary"/>
    </form>
<!-- </div> -->