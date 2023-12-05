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

        
        public function show_category_shop($a, $id) {
            $offset = intval($a);
            $sql = "SELECT y.*, grouped_images.image_files
                    FROM (
                        SELECT y.product_id, GROUP_CONCAT(img.image_file) AS image_files
                        FROM product y
                        JOIN image_product img ON y.product_id = img.product_id
                        GROUP BY y.product_id
                    ) AS grouped_images
                    JOIN product y ON y.product_id = grouped_images.product_id
                    WHERE y.category_id = ?
                    ORDER BY y.product_view DESC LIMIT $offset, 9
            ";
            return $this->conn_show_all($sql, $id);
        }
    }
?>