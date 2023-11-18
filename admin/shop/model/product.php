<?php
    include_once "connect.php";
    if(session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    class product_lass extends dao_con {
        public static function show_product() {
            $sql = "SELECT y.*, grouped_images.image_files, category.category_name
                    FROM (
                        SELECT y.product_id, GROUP_CONCAT(img.image_file) AS image_files
                        FROM product y
                        JOIN image_product img ON y.product_id = img.product_id
                        GROUP BY y.product_id
                    ) AS grouped_images
                    JOIN product y ON y.product_id = grouped_images.product_id
                    JOIN category ON y.category_id = category.category_id
                    WHERE y.account_id = ?
                    ORDER BY y.product_view DESC
            ";
            return self::conn_show_all($sql, $_SESSION['83x86']['account_id']);
        }

        public static function del_pro($a) {
            $sql = "DELETE FROM product WHERE product_id = ?";
            return self::conn_execute($sql, $a);
        }

        public static function add_p1($a, $b, $c, $d, $e) {
            $sql = "INSERT INTO product(product_name, product_price, product_del, product_qty, category_id, account_id) VALUES(?, ?, ?, ?, ?, ?)";
            return self::conn_execute($sql, $a, $b, $c, $d, $e, $_SESSION['83x86']['account_id']);
        }

        public static function up_p1($a, $b, $c, $d, $e, $f) {
            $sql = "UPDATE product SET product_name = ?, product_price = ?, product_del = ?, product_qty = ?, category_id = ? WHERE product_id = ?";
            return self::conn_execute($sql, $a, $b, $c, $d, $e, $f);
        }

        public static function up_p2($a, $b) {
            $sql = "UPDATE image_product SET image_file = ? WHERE product_id = ?";
            return self::conn_execute($sql, $a, $b);
        }
        public static function add_p2($a) {
            $sql = "INSERT INTO image_product (image_file, product_id)
                    SELECT ? AS image_file, product_id
                    FROM product
                    ORDER BY product_id DESC
                    LIMIT 1
            ";
            return self::conn_execute($sql, $a);
        }
    }
?>