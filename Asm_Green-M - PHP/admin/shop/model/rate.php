<?php
    include_once "connect.php";
    if(session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    
    class rate_lass extends dao_con {
        public static function show_rate() {
            $sql = "SELECT r.*, a.account_name, p.category_id
                    FROM rate r
                    JOIN product p ON r.product_id = p.product_id
                    JOIN account a ON r.account_id = a.account_id
                    WHERE p.account_id = ? ORDER BY r.time_reg DESC
            ";
            return self::conn_show_all($sql, $_SESSION['83x86']['account_id']);
        }
    }
?>