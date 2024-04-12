<?php
require_once 'models/User.php';
require_once 'controllers/Controller.php';

class LoginController extends Controller
{

    public function login()
    {
        if (isset($_SESSION['user'])) {
            header('Location: index.php?controller=category&action=index');
            exit();
        }
        if (isset($_POST['submit'])) {
            $username = $_POST['username'];
            $password = $_POST['password'];
            if (empty($username) || empty($password)) {
                $this->error = 'Username hoặc password không được để trống';
            }
            $user_model = new User();
            if (empty($this->error)) {
                $user = $user_model->getUser($username);
                if (empty($user)) {
                    $this->error = 'Username ko tồn tại';
                } else {
                    $is_same_password = password_verify($password, $user['password']);
                    if ($is_same_password) {
                        $_SESSION['success'] = 'Đăng nhập thành công';
                        $_SESSION['user'] = $user;
                        // header("Location: index.php?controller=user&action=detail&id=". $_SESSION['user']['id']);
                        header("Location: index.php?controller=user&action=detail");
                        exit();
                    } else {
                        $this->error = 'Sai tài khoản hoặc mật khẩu';
                    }
                }
            }
        }
        $this->content = $this->render('views/users/login.php');

        require_once 'views/layouts/main_login.php';
    }

    public function register()
    {

        if (isset($_POST['submit'])) {
            $user_model = new User();
            $username = $_POST['username'];
            $password = $_POST['password'];
            $password_confirm = $_POST['password_confirm'];
            $user = $user_model->getUserByUsername($username);
            if (empty($username) || empty($password) || empty($password_confirm)) {
                $this->error = 'Không được để trống các trường';
            } else if ($password != $password_confirm) {
                $this->error = 'Password nhập lại chưa đúng';
            } else if (!empty($user)) {
                $this->error = 'Username này đã tồn tại';
            }
            if (empty($this->error)) {
                $password_encrypt =
                    password_hash($password, PASSWORD_BCRYPT);
                $user_model->username = $username;
                $user_model->password = $password_encrypt;
                $is_insert = $user_model->register();
                if ($is_insert) {
                    $_SESSION['success'] = 'Đăng ký thành công';
                    header('Location: index.php?controller=login&action=login');
                    exit();
                }
            }
        }

        $this->content = $this->render('views/users/register.php');
        require_once 'views/layouts/main_login.php';
    }
}
