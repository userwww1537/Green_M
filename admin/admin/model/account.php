<?php
    include_once "connect.php";
    if(session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    class account_lass extends dao_con {
        public static function show_account() {
            $sql = "SELECT * FROM account ORDER BY account_id DESC";
            return self::conn_show_all($sql);
        }

        public static function show_shop() {
            $sql = "SELECT account.*, IFNULL(COUNT(orders.order_id), 0) AS soLuongDonHang
                    FROM account
                    LEFT JOIN orders ON account.account_id = orders.shop_id
                    WHERE account.account_position = 'Shop'
                    GROUP BY account.account_id
                    ORDER BY soLuongDonHang DESC
            ";
            return self::conn_show_all($sql);
        }

        public static function sent_notify($a, $b) {
            $sql = "UPDATE account SET account_notify = ? WHERE account_id = ?";
            return self::conn_execute($sql, $a, $b);
        }

        public static function sent_lock($a, $b, $c) {
            $sql = "UPDATE account SET account_status = ?, account_notify = ? WHERE account_id = ?";
            return self::conn_execute($sql, $a, $b, $c);
        }

        public static function unl_lock($id) {
            $sql = "UPDATE account SET account_status = 'Offline', account_notify = 'Tài khoản đã được mở khóa, Green-M xin lỗi vì sự bất tiện này' WHERE account_id = ?";
            return self::conn_execute($sql, $id);
        }

        public static function searchUSER($a){
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
        public static function searchemail($a){
            $a = '%' . $a . '%';
            $sql = "SELECT account.*, IFNULL(COUNT(orders.order_id), 0) AS soLuongDonHang
            FROM account
            LEFT JOIN orders ON account.account_id = orders.shop_id
            WHERE account.account_position = 'Shop' AND account.account_email LIKE '$a'
            GROUP BY account.account_id
            ORDER BY soLuongDonHang DESC
            ";
            return self::conn_show_all($sql);
        }
        public static function searchPhone($a){
            $a = '%' . $a . '%';
            $sql = "SELECT account.*, IFNULL(COUNT(orders.order_id), 0) AS soLuongDonHang
            FROM account
            LEFT JOIN orders ON account.account_id = orders.shop_id
            WHERE account.account_position = 'Shop' AND account.account_phone LIKE '$a'
            GROUP BY account.account_id
            ORDER BY soLuongDonHang DESC
            ";
            return self::conn_show_all($sql);
        }
        public static function searchStatus($a){
            $a = '%' . $a . '%';
            $sql = "SELECT account.*, IFNULL(COUNT(orders.order_id), 0) AS soLuongDonHang
            FROM account
            LEFT JOIN orders ON account.account_id = orders.shop_id
            WHERE account.account_position = 'Shop' AND account.account_status LIKE '$a'
            GROUP BY account.account_id
            ORDER BY soLuongDonHang DESC
            ";
            return self::conn_show_all($sql);
        }
        public static function searchNameuser($a){
            $a = '%' . $a . '%';
            $sql="SELECT * FROM account WHERE account_name LIKE '$a'";
            return self::conn_show_all($sql);
        }
        public static function searchEmailuser($a){
            $a = '%' . $a . '%';
            $sql="SELECT * FROM account WHERE account_email LIKE '$a'";
            return self::conn_show_all($sql);
        } 
        public static function searchPhoneuser($a){
            $a = '%' . $a . '%';
            $sql="SELECT * FROM account WHERE account_phone LIKE '$a'";
            return self::conn_show_all($sql);
        }
        public static function searchStatususer($a){
            $a = '%' . $a . '%';
            $sql="SELECT * FROM account WHERE account_status LIKE '$a'";
            return self::conn_show_all($sql);
        }

        public static function notiUserAll($value) {
            $sql = "UPDATE account SET account_notify = ?";
            return self::conn_execute($sql, $value);
        }

        public static function notiShopAll($value) {
            $sql = "UPDATE account SET account_notify = ? WHERE account_position = 'Shop'";
            return self::conn_execute($sql, $value);
        }
    
    }
?>