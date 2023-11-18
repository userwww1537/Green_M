<?php
    include_once "connect.php";
    if(session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    class product_lass extends dao_con {
        public static function show_product() {
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
            return self::conn_show_all($sql);
        }
    }
?>