<?php
    include_once "connect.php";
    if(session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    class cate_lass extends dao_con {
        public static function show_cate() {
            $sql = "SELECT * FROM category ORDER BY category_id DESC";
            return self::conn_show_all($sql);
        }

        public static function del_cate($a) {
            $sql = "DELETE FROM category WHERE category_id = ?";
            return self::conn_execute($sql, $a);
        }
        
        public static function add_cate($a, $b, $c) {
            $sql = "INSERT INTO category(category_name, category_img, category_status) VALUES(?, ?, ?)";
            return self::conn_execute($sql, $a, $b, $c);
        }

        public static function up_cate($a, $b, $c, $d) {
            $sql = "UPDATE category SET category_name = ?, category_img = ?, category_status = ? WHERE category_id = ?";
            return self::conn_execute($sql, $a, $b, $c, $d);
        }
    }
?>