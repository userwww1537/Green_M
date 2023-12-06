<?php
    include_once "connect.php";
    if(session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    class rate_lass extends dao_con {
        public function show_rate($a, $b) {
            $b = intval($b);
            if($b == 0) {
                $sql = "SELECT rate.*, account.account_name
                        FROM rate
                        JOIN account ON rate.account_id = account.account_id
                        WHERE rate.product_id = ? ORDER BY rate.rate_id DESC
                ";
                return $this->conn_show_all($sql, $a);
            } else {
                $sql = "SELECT rate.*, account.account_name
                        FROM rate
                        JOIN account ON rate.account_id = account.account_id
                        WHERE rate.product_id = ? AND rate.rate_star = ?
                ";
                return $this->conn_show_all($sql, $a, $b);
            }
        }

        public function show_rate_all($a) {
            $sql = "SELECT rate.*, account.account_name
                    FROM rate
                    JOIN account ON rate.account_id = account.account_id
                    WHERE rate.product_id = ?
            ";
            return $this->conn_show_all($sql, $a);
        }

        public function add_rate($a, $b, $c, $d) {
            $sqlCheckCMT = 'UPDATE order_details SET details_feedback = 1 WHERE order_id = ? AND product_id = ?';
            $this->conn_execute($sqlCheckCMT, $d, $c);
            $sql = "INSERT INTO rate(rate_comment, rate_star, product_id, account_id) VALUES(?, ?, ?, ?)";
            return $this->conn_execute($sql, $a, $b, $c, $_SESSION['83x86']['account_id']);
        }
    }
?>