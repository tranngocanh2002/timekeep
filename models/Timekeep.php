<?php
require_once 'models/Model.php';

class Timekeep extends Model
{
    public $id;
    public $user_id;
    public $date;
    public $log;
    public $late;
    public $login;
    public $logout;
    public $type;


    public function getById($id)
    {
        $obj_select = $this->connection
            ->prepare("SELECT * FROM users WHERE id = $id");
        $obj_select->execute();
        return $obj_select->fetch(PDO::FETCH_ASSOC);
    }

    public function logs($id)
    {
        $obj_select = $this->connection
            ->prepare("SELECT * FROM logs WHERE user_id = $id ORDER BY date DESC");
        $obj_select->execute();
        return $obj_select->fetchAll(PDO::FETCH_ASSOC);
    }


    public function insert()
    {
        $obj_insert = $this->connection
            ->prepare("INSERT INTO logs(user_id, date, login, type) VALUES(:user_id, :date, :log, :late)");
        $arr_insert = [
            ':user_id' => $this->user_id,
            ':date' => $this->date,
            ':late' => $this->late,
            ':log' => $this->log
        ];
        return $obj_insert->execute($arr_insert);
    }
    public function checkLogs($user_id,$date,$log)
    {
        $obj_check = $this->connection->prepare("SELECT COUNT(*) AS count_logs
        FROM logs
        WHERE user_id = $user_id
        AND DATE(date) = '$date';");
        $obj_check->execute();
        $count_logs = $obj_check->fetchColumn();
        return $count_logs;
    }

    public function insertLogout($id)
    {
        $obj_insert = $this->connection
            ->prepare("UPDATE logs SET logout=:log WHERE id = $id");
        $arr_insert = [
            ':log' => $this->log
        ];
        return $obj_insert->execute($arr_insert);
    }

    public function checkLogout($user_id,$date,$log)
    {
        $obj_check = $this->connection->prepare("SELECT id AS count_logs
        FROM logs
        WHERE user_id = $user_id
        AND DATE(date) = '$date';");
        $obj_check->execute();
        $count_logs = $obj_check->fetchColumn();
        return $count_logs;
    }


}