<?php
require_once 'controllers/Controller.php';
require_once 'models/Timekeep.php';
class TimekeepController extends Controller {
    public function timekeep() {
        if (!isset($_SESSION['user']['id']) || !is_numeric($_SESSION['user']['id'])) {
            header("Location: index.php?controller=user");
            exit();
        }
        $id = $_SESSION['user']['id'];
        $timekeep_model = new Timekeep();
        $user = $timekeep_model->getById($id);

        if (isset($_POST['login'])) {
            $user_id = $_POST['user_id'];
            $date = $_POST['date'];
            $log = $_POST['log'];

            $check = $timekeep_model->checkLogs($user_id,$date,$log);
            if ($check == 0) {
                $startTime = strtotime("08:00");
                $logTime = strtotime($log);
                if ($logTime <= $startTime) {
                    $late = 0;
                } else {
                    $late = ($logTime - $startTime) / 60;
                }
                $timekeep_model->user_id = $user_id;
                $timekeep_model->date = $date;
                $timekeep_model->log = $log;
                $timekeep_model->late = $late;
                $is_insert = $timekeep_model->insert();
                if ($is_insert) {
                    $_SESSION['success'] = 'Checkin thành công';
                } else {
                    $_SESSION['error'] = 'Checkin thất bại';
                }
                header("Location: index.php?controller=timekeep&action=timekeep&id=". $_SESSION['user']['id']);
                exit();
            } else {
                $_SESSION['error'] = 'Bạn đã checkin rồi';
                header("Location: index.php?controller=timekeep&action=timekeep&id=". $_SESSION['user']['id']);
                exit();
            }
        }
        if (isset($_POST['logout'])) {
            $user_id = $_POST['user_id'];
            $date = $_POST['date'];
            $log = $_POST['log'];

            $id = $timekeep_model->checkLogout($user_id,$date,$log);
            if ($id !== false) {
                // $timekeep_model->user_id = $user_id;
                // $timekeep_model->date = $date;
                $timekeep_model->log = $log;
                $is_insert = $timekeep_model->insertLogout($id);
                if ($is_insert) {
                    $_SESSION['success'] = 'Checkout thành công';
                } else {
                    $_SESSION['error'] = 'Checkout thất bại';
                }
                header("Location: index.php?controller=timekeep&action=timekeep&id=". $_SESSION['user']['id']);
                exit();
            } else {
                $_SESSION['error'] = 'Bạn chưa checkin';
                header("Location: index.php?controller=timekeep&action=timekeep&id=". $_SESSION['user']['id']);
                exit();
            }
        }

        $this->content = $this->render('views/timekeeps/timekeep.php', [
            'user' => $user
        ]);

        require_once 'views/layouts/main.php';
    }

    public function log() {
        if (!isset($_SESSION['user']['id']) || !is_numeric($_SESSION['user']['id'])) {
            header("Location: index.php?controller=user");
            exit();
        }
        $id = $_SESSION['user']['id'];
        $user_model = new Timekeep();
        $user = $user_model->getById($id);
        $logs = $user_model->logs($id);

        $this->content = $this->render('views/timekeeps/log.php', [
            'user' => $user,
            'logs' => $logs
        ]);

        require_once 'views/layouts/main.php';
    }

}