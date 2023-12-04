<?php
    if(session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    require_once  'connect.php';
    class acc_lass extends dao_profile {
        public function change_avt($a) {
            $sql = "UPDATE account SET account_avt = ? WHERE account_id = ?";
            return $this->conn_execute($sql, $a, $_SESSION['83x86']['account_id']);
        }

        public function veri_mail() {
            $sql = "UPDATE account SET account_verified_mail = 'Đã xác thực' WHERE account_id = ?";
            return $this->conn_execute($sql, $_SESSION['83x86']['account_id']);
        }

        public function change_info($check ,$name, $address, $username, $email, $phone) {
            if($check == 0) {
                $sql = "UPDATE account SET account_name = ?, account_address = ?, account_username = ?, account_email = ?, account_phone = ? WHERE account_id = ?";
            } else {
                $sql = "UPDATE account SET account_name = ?, account_address = ?, account_username = ?, account_email = ?, account_phone = ?, account_verified_mail = 'Chưa xác thực' WHERE account_id = ?";
            }
            return $this->conn_execute($sql, $name, $address, $username, $email, $phone, $_SESSION['83x86']['account_id']);
        }

        public function change_pay($stk, $bank) {
            $sql = "UPDATE account SET account_number_pay = ?, account_pay = ? WHERE account_id = ?";
            return $this->conn_execute($sql, $stk, $bank, $_SESSION['83x86']['account_id']);
        }

        public function change_pass($current, $new) {
            $sql = "UPDATE account SET account_pass = ? WHERE account_id = ? AND account_pass = ?";
            return $this->conn_execute($sql, $new, $_SESSION['83x86']['account_id'], $current);
        }
    }
?>