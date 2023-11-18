<?php
    include_once "connect.php";
    if(session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    class product_lass extends dao_con {
        public function up_view($a) {
            $sql = "UPDATE product SET product_view = product_view + 1 WHERE product_id = ?";
            return $this->conn_execute($sql, $a);
        }

        public function show_product_home() {
            $sql = "SELECT y.*, grouped_images.image_files
                    FROM (
                        SELECT y.product_id, GROUP_CONCAT(img.image_file) AS image_files
                        FROM product y
                        JOIN image_product img ON y.product_id = img.product_id
                        GROUP BY y.product_id
                    ) AS grouped_images
                    JOIN product y ON y.product_id = grouped_images.product_id
                    ORDER BY y.product_view DESC
            ";
            return $this->conn_show_all($sql);
        }

        public function show_product_top() {
            $sql = "SELECT y.*, grouped_images.image_files
                    FROM (
                        SELECT y.product_id, y.product_name, y.product_price, y.product_del, (y.product_price - y.product_del) / y.product_price * 100 AS discount_rate, GROUP_CONCAT(img.image_file) AS image_files
                        FROM product y
                        JOIN image_product img ON y.product_id = img.product_id
                        GROUP BY y.product_id, y.product_name, y.product_price, y.product_del
                    ) AS grouped_images
                    JOIN product y ON y.product_id = grouped_images.product_id
                    ORDER BY discount_rate DESC
            ";
            return $this->conn_show_all($sql);
        }

        public function show_product_shop($a) {
            $offset = intval($a);
            $sql = "SELECT y.*, grouped_images.image_files
                    FROM (
                        SELECT y.product_id, GROUP_CONCAT(img.image_file) AS image_files
                        FROM product y
                        JOIN image_product img ON y.product_id = img.product_id
                        GROUP BY y.product_id
                    ) AS grouped_images
                    JOIN product y ON y.product_id = grouped_images.product_id
                    ORDER BY y.product_view DESC LIMIT $offset, 9
            ";
            return $this->conn_show_all($sql);
        }

        public function show_product_fill($a, $b) {
            $offset = intval($b);
            if($a == "fillreview") {
                $sql = "SELECT y.*, grouped_images.image_files
                    FROM (
                        SELECT y.product_id, GROUP_CONCAT(img.image_file) AS image_files
                        FROM product y
                        JOIN image_product img ON y.product_id = img.product_id
                        GROUP BY y.product_id
                    ) AS grouped_images
                    JOIN product y ON y.product_id = grouped_images.product_id
                    ORDER BY y.product_view DESC LIMIT $offset, 9
                ";
            } else if($a == "fillourtonew") {
                $sql = "SELECT y.*, grouped_images.image_files
                    FROM (
                        SELECT y.product_id, GROUP_CONCAT(img.image_file) AS image_files
                        FROM product y
                        JOIN image_product img ON y.product_id = img.product_id
                        GROUP BY y.product_id
                    ) AS grouped_images
                    JOIN product y ON y.product_id = grouped_images.product_id
                    ORDER BY y.product_id ASC LIMIT $offset, 9
                ";
            } else if($a == "fillnewtoour") {
                $sql = "SELECT y.*, grouped_images.image_files
                    FROM (
                        SELECT y.product_id, GROUP_CONCAT(img.image_file) AS image_files
                        FROM product y
                        JOIN image_product img ON y.product_id = img.product_id
                        GROUP BY y.product_id
                    ) AS grouped_images
                    JOIN product y ON y.product_id = grouped_images.product_id
                    ORDER BY y.product_id DESC LIMIT $offset, 9
                ";
            } else if($a == "fillpriceasc") {
                $sql = "SELECT y.*, grouped_images.image_files
                    FROM (
                        SELECT y.product_id, GROUP_CONCAT(img.image_file) AS image_files
                        FROM product y
                        JOIN image_product img ON y.product_id = img.product_id
                        GROUP BY y.product_id
                    ) AS grouped_images
                    JOIN product y ON y.product_id = grouped_images.product_id
                    ORDER BY y.product_price ASC LIMIT $offset, 9
                ";
            } else if($a == "fillpricedesc") {
                $sql = "SELECT y.*, grouped_images.image_files
                    FROM (
                        SELECT y.product_id, GROUP_CONCAT(img.image_file) AS image_files
                        FROM product y
                        JOIN image_product img ON y.product_id = img.product_id
                        GROUP BY y.product_id
                    ) AS grouped_images
                    JOIN product y ON y.product_id = grouped_images.product_id
                    ORDER BY y.product_price DESC LIMIT $offset, 9
                ";
            }
            return $this->conn_show_all($sql);
        }

        public function show_product_detail($a) {
            $sql = "SELECT y.*, IFNULL(grouped_images.image_files, 0) AS image_files,
                    cate.category_name, account.account_name, account.account_avt, COUNT(CASE WHEN o.order_status <> 'Đã hủy' THEN o.order_id END) AS total_orders
                    FROM (
                        SELECT
                            y.product_id,
                            GROUP_CONCAT(img.image_file) AS image_files
                        FROM product y
                        JOIN image_product img ON y.product_id = img.product_id
                        GROUP BY y.product_id
                    ) AS grouped_images
                    JOIN product y ON y.product_id = grouped_images.product_id
                    JOIN category cate ON y.category_id = cate.category_id
                    JOIN account ON y.account_id = account.account_id
                    LEFT JOIN orders o ON account.account_id = o.shop_id
                    WHERE y.product_id = ?
                    GROUP BY y.product_id
                ";
            return $this->conn_show_one($sql, $a);
        }

        public function update_qty_product($a, $b) {
            $a = intval($a);
            $sql = "UPDATE product SET product_qty = product_qty - $a WHERE product_id = ?";
            return $this->conn_execute($sql, $b);
        }

        public function show_search($a) {
            $a = '%' . $a . '%';
            $sql = "SELECT * FROM product WHERE product_name LIKE ?";
            return $this->conn_show_all($sql, $a);
        }
    }
?>