<?php
require_once 'controllers/Controller.php';
require_once 'models/User.php';
class UserController extends Controller {

    public function update() {
        if (!isset($_SESSION['user']['id']) || !is_numeric($_SESSION['user']['id'])) {
            header("Location: index.php?controller=user&action=detail&id=". $_SESSION['user']['id']);
            exit();
        }

        $id = $_SESSION['user']['id'];
        $user_model = new User();
        $user = $user_model->getById($id);
        if (isset($_POST['submit'])) {
            $username = $_POST['username'];
            $full_name = $_POST['full_name'];
            $room = $_POST['room'];
            $jobs = $_POST['jobs'];
            $workday = $_POST['workday'];
            if ($_FILES['avatar']['error'] == 0) {
                $extension = pathinfo($_FILES['avatar']['name'], PATHINFO_EXTENSION);
                $extension = strtolower($extension);
                $allow_extensions = ['png', 'jpg', 'jpeg', 'gif'];
                $file_size_mb = $_FILES['avatar']['size'] / 1024 / 1024;
                $file_size_mb = round($file_size_mb, 2);
                if (!in_array($extension, $allow_extensions)) {
                    $this->error = 'Phải upload avatar dạng ảnh';
                } else if ($file_size_mb > 2) {
                    $this->error = 'File upload không được lớn hơn 2Mb';
                }
            }
            if (empty($this->error)) {
                $filename = $user['avatar'];
                if ($_FILES['avatar']['error'] == 0) {
                    $dir_uploads = 'assets/uploads';
                    @unlink($dir_uploads . '/' . $filename);
                    if (!file_exists($dir_uploads)) {
                        mkdir($dir_uploads);
                    }

                    $filename = time() . '-user-' . $_FILES['avatar']['name'];
                    move_uploaded_file($_FILES['avatar']['tmp_name'], $dir_uploads . '/' . $filename);
                }
                $user_model->username = $username;
                $user_model->full_name = $full_name;
                $user_model->room = $room;
                $user_model->avatar = $filename;
                $user_model->jobs = $jobs;
                $user_model->workday = $workday;
                $is_update = $user_model->update($id);
                if ($is_update) {
                    $_SESSION['success'] = 'Chỉnh sửa dữ liệu thành công';
                } else {
                    $_SESSION['error'] = 'Chỉnh sửa dữ liệu thất bại';
                }
                header("Location: index.php?controller=user&action=detail&id=". $_SESSION['user']['id']);
                exit();
            }
        }

        $this->content = $this->render('views/users/update.php', [
            'user' => $user
        ]);

        require_once 'views/layouts/main.php';
    }

    public function detail() {
        if (!isset($_SESSION['user']['id']) || !is_numeric($_SESSION['user']['id'])) {
            header("Location: index.php?controller=user");
            exit();
        }
        // $_SESSION['user']['id'];
        $id = $_SESSION['user']['id'];
        $user_model = new User();
        $user = $user_model->getById($id);

        $this->content = $this->render('views/users/detail.php', [
            'user' => $user
        ]);

        require_once 'views/layouts/main.php';
    }

    public function logout() {
        $_SESSION = [];
        session_destroy();
        $_SESSION['success'] = 'Logout thành công';
        header('Location: index.php?controller=login&action=login');
        exit();
    }
}