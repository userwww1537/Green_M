<?php
    include_once "connect.php";
    if(session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    class order_lass extends dao_con {
        public static function show_order() {
            $sql = "SELECT orders.*, account.account_name, account.account_id
                    FROM orders
                    JOIN account ON orders.shop_id = account.account_id
                    WHERE orders.shop_id = ? ORDER BY orders.order_id DESC
            ";
            return self::conn_show_all($sql, $_SESSION['83x86']['account_id']);
        }

        public static function show_order_home() {
            $sql = "SELECT orders.*, account.account_name, account.account_id
                    FROM orders
                    JOIN account ON orders.account_id = account.account_id
                    WHERE orders.shop_id = ? ORDER BY orders.order_id DESC
            ";
            return self::conn_show_all($sql, $_SESSION['83x86']['account_id']);
        }

        public static function show__order() {
            $sql = "SELECT orders.*, account.account_name, account.account_id, account.account_phone, account.account_address
                    FROM orders
                    JOIN account ON orders.account_id = account.account_id
                    WHERE orders.shop_id = ? ORDER BY orders.order_id DESC
            ";
            return self::conn_show_all($sql, $_SESSION['83x86']['account_id']);
        }

        public static function show_order_details($a) {
            $sql = "SELECT * FROM order_details WHERE order_id = ?";
            return self::conn_show_all($sql, $a);
        }

        public static function show_doanhthu() {
            $sql = "SELECT account.*, COUNT(orders.order_id) AS order_count
                    FROM account
                    INNER JOIN orders ON account.account_id = orders.shop_id
                    WHERE orders.shop_id = ? GROUP BY account.account_id
            ";
            return self::conn_show_all($sql, $_SESSION['83x86']['account_id']);
        }

        public static function up_order($a, $b) {
            $sql = "UPDATE orders SET order_status = ? WHERE order_id = ?";
            return self::conn_execute($sql, $a, $b);
        }

        public static function up_order_cancel($a, $b, $c) {
            $sql = "UPDATE orders SET order_note = ?, order_status = ? WHERE order_id = ?";
            return self::conn_execute($sql, $a, $b, $c);
        }
    }
?>