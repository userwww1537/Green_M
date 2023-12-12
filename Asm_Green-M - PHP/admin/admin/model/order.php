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
                    ORDER BY orders.order_id DESC
            ";
            return self::conn_show_all($sql);
        }

        public static function show_doanhthu() {
            $sql = "SELECT account.*, COUNT(orders.order_id) AS order_count, orders.order_status
                    FROM account
                    INNER JOIN orders ON account.account_id = orders.shop_id
                    GROUP BY account.account_id
            ";
            return self::conn_show_all($sql);
        }
        public static function searchNameorder($a){
            $a = '%' . $a . '%';
            $sql = "SELECT account.*, IFNULL(COUNT(orders.order_id), 0) AS soLuongDonHang
            FROM account
            LEFT JOIN orders ON account.account_id = orders.shop_id
            WHERE account.account_position = 'Shop' AND account.account_name LIKE '$a'
            GROUP BY account.account_id
            ORDER BY soLuongDonHang DESC
            ";
            return self::conn_show_all($sql);
        }
        public static function searchPhoneorder($a){
            $a = '%' . $a . '%';
            $sql = "SELECT account.*, IFNULL(COUNT(orders.order_id), 0) AS soLuongDonHang
            FROM account
            LEFT JOIN orders ON account.account_id = orders.shop_id
            WHERE account.account_position = 'Shop' AND account.account_phone LIKE '$a'
            GROUP BY account.account_id
            ORDER BY soLuongDonHang ASC
            ";
            return self::conn_show_all($sql);
        }
    }
?>