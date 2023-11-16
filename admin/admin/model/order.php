<?php
    include_once "connect.php";
    if(session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    class order_lass extends dao_con {
        public static function show_order() {
            $sql = "SELECT orders.*, account.*
                    FROM orders
                    JOIN account ON orders.shop_id = account.account_id
                    ORDER BY orders.order_id DESC
            ";
            return self::conn_show_all($sql);
        }
    }
?>