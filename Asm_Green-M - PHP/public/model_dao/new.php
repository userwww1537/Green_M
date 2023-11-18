<?php
    include_once "connect.php";
    if(session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    class new_lass extends dao_con {
        public function show_new() {
            $sql = "SELECT * FROM new ORDER BY new_id DESC";
            return $this->conn_show_all($sql);
        }

        public function show_phantrang($a) {
            $offset = intval($a);
            $sql = "SELECT * FROM new ORDER BY new_id DESC LIMIT $offset, 3";
            return $this->conn_show_all($sql);
        }
    }
?>