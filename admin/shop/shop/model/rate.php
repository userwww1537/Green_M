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
        public static function show_threestar() {
            $sql = "SELECT r.*, a.account_name, p.category_id
                    FROM rate r
                    JOIN product p ON r.product_id = p.product_id
                    JOIN account a ON r.account_id = a.account_id
                    WHERE r.rate_star =  3 ORDER BY r.time_reg DESC";
            return self::conn_show_all($sql);
        }  public static function show_fivetar() {
            $sql = "SELECT r.*, a.account_name, p.category_id
                    FROM rate r
                    JOIN product p ON r.product_id = p.product_id
                    JOIN account a ON r.account_id = a.account_id
                    WHERE r.rate_star =  5 ORDER BY r.time_reg DESC";
            return self::conn_show_all($sql);
        }
        public static function show_fourstar() {
            $sql = "SELECT r.*, a.account_name, p.category_id
                    FROM rate r
                    JOIN product p ON r.product_id = p.product_id
                    JOIN account a ON r.account_id = a.account_id
                    WHERE r.rate_star =  4 ORDER BY r.time_reg DESC";
            return self::conn_show_all($sql);
        }
        public static function show_twostar() {
            $sql = "SELECT r.*, a.account_name, p.category_id
                    FROM rate r
                    JOIN product p ON r.product_id = p.product_id
                    JOIN account a ON r.account_id = a.account_id
                    WHERE r.rate_star =  2 ORDER BY r.time_reg DESC";
            return self::conn_show_all($sql);
        }
        public static function show_onestar() {
            $sql = "SELECT r.*, a.account_name, p.category_id
                    FROM rate r
                    JOIN product p ON r.product_id = p.product_id
                    JOIN account a ON r.account_id = a.account_id
                    WHERE r.rate_star =  1 ORDER BY r.time_reg DESC";
            return self::conn_show_all($sql);
        }
    }
?>