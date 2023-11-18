<?php
    include_once "connect.php";
    if(session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    class category_lass extends dao_con {
        public function show_category_home() {
            $sql = "SELECT category.*, COUNT(product.product_id) AS so_luong_san_pham
                    FROM category
                    LEFT JOIN product ON category.category_id = product.category_id
                    GROUP BY category.category_id
            ";
            return $this->conn_show_all($sql);
        }
    }
?>