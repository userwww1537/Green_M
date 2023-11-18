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
    }
?>