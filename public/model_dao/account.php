<?php
    include_once "connect.php";
    if(session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    class account_lass extends dao_con{
        public function add_account($a, $b, $c, $d) {
            $sql = "INSERT INTO account(account_name, account_username, account_email, account_pass) VALUES(?, ?, ?, ?)";
            return $this->conn_execute($sql, $a, $b, $c, $d);
        }

        public function log_account($a, $b, $c) {
            $sql = "SELECT * FROM account WHERE (account_username = ? OR account_email = ?) AND account_pass = ?";
            return $this->conn_show_one($sql, $a, $b, $c);
        }

        public function update_status($a, $b) {
            if(isset($_SESSION['83x86']) && $_SESSION['83x86']['account_status'] == "Khóa") {
                $a = "Khóa";
                $sql_update_status = "UPDATE account SET account_status = ? WHERE account_id = ?";
                return $this->conn_execute($sql_update_status, $a, $b);
            } else {
                $sql_update_status = "UPDATE account SET account_status = ? WHERE account_id = ?";
                return $this->conn_execute($sql_update_status, $a, $b);
            }
        }

        public function update_cookie_ses($a) {
            $sql = "SELECT * FROM account WHERE account_id = ?";
            return $this->conn_show_one($sql, $a);
        }

        public function update_noti() {
            $a = "";
            $sql = "UPDATE account SET account_notify = ? WHERE account_id = ?";
            return $this->conn_execute($sql, $a, $_SESSION['83x86']['account_id']);
        }

        public function update_info_account($a, $b, $c, $d, $e, $f, $g, $h, $i, $check) {
            if($check == "haveImg") {
                $sql = "UPDATE account SET account_name = ?, account_sex = ?, account_address = ?, account_avt = ?, account_username = ?, account_email = ?, account_phone = ?, account_position = ? WHERE account_id = ?";
                return $this->conn_execute($sql, $a, $b, $c, $d, $e, $f, $g, $h, $i);
            } else {
                $sql = "UPDATE account SET account_name = ?, account_sex = ?, account_address = ?, account_username = ?, account_email = ?, account_phone = ?, account_position = ? WHERE account_id = ?";
                return $this->conn_execute($sql, $a, $b, $c, $e, $f, $g, $h, $i);
            }
        }

        public function change_pass_account($a, $b) {
            $sql = "UPDATE account SET account_pass = ? WHERE account_id = ? AND account_pass = ?";
            return $this->conn_execute($sql, $a, $_SESSION['83x86']['account_id'], $b);
        }

        public function forgot_pass_account($a, $b) {
            $sql = "UPDATE account SET account_pass = ? WHERE account_email = ?";
            return $this->conn_execute($sql, $a, $b);
        }

        public function change_info_pay($a, $b) {
            $sql = "UPDATE account SET account_number_pay = ?, account_pay = ? WHERE account_id  = ?";
            return $this->conn_execute($sql, $a, $b, $_SESSION['83x86']['account_id']);
        }

        public function forgot_password($a) {
            $sql = "SELECT account_id FROM account WHERE account_email = ?";
            return $this->conn_show_one($sql, $a);
        }

        public function verified_mail($a, $b) {
            $sql = "UPDATE account SET account_verified_mail = ? WHERE account_email = ?";
            return $this->conn_execute($sql, $a, $b);
        }

        public function check_username($a) {
            $sql = "SELECT * FROM account WHERE account_username = ?";
            return $this->conn_show_one($sql, $a);
        }

        public function check_email($a) {
            $sql = "SELECT * FROM account WHERE account_email = ?";
            return $this->conn_show_one($sql, $a);
        }
    }
?>