<?php
    include_once "connect.php";
    if(session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    class code_lass extends dao_con {
        public function check_promo($a) {
            $sql = "SELECT * FROM discount_code WHERE code_gift	= ?";
            return $this->conn_show_one($sql, $a);
        }

        public function update_promo($a) {
            $sql = "UPDATE discount_code SET code_qty = code_qty - 1
                    WHERE code_gift = ?
                    AND code_qty > 0
            ";
            return $this->conn_execute($sql, $a);
        }
    }
?>