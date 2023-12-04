<?php
    include_once "connect.php";
    if(session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    if(!isset($_SESSION['83x86'])) {
        echo '
            <style>
                .content {
                    position: absolute;
                    top: 50%;
                    left: 50%;
                    transform: translate(-50%, -50%);
                    width: 400px;
                    height: 200px;
                    border-radius: 10px;
                    background-color: white;
                }
                
                .content {
                    animation: slide-in 1.5s ease-in-out;
                }
                
                @keyframes slide-in {
                    0% {
                    top: -100%;
                    }
                
                    100% {
                    top: 50%;
                    }
                }
                #popup {
                    position: fixed;
                    top: 0;
                    left: 0;
                    width: 100%;
                    height: 100%;
                    background-color: rgba(0, 0, 0, 0.6);
                    z-index: 1000;
                }
                
                .content {
                    position: absolute;
                    top: 50%;
                    left: 50%;
                    transform: translate(-50%, -50%);
                    width: 400px;
                    height: 200px;
                    border-radius: 10px;
                    background-color: white;
                    text-align: center;
                }
            
                #popup .content span {
                    font-size: 40px;
                    line-height: 75px;
                    font-weight: 700;
                    color: rgb(44, 69, 7);
                }
                
                h2 {
                    font-size: 24px;
                    text-align: center;
                }
                
                p {
                    font-size: 16px;
                    text-align: center;
                }
                
                .close {
                    position: absolute;
                    top: 10px;
                    right: 10px;
                    width: 30px;
                    height: 30px;
                    line-height: 30px;
                    border-radius: 50%;
                    background-color: red;
                    cursor: pointer;
                    text-decoration: none;
                    color: white;
                    font-weight: 600;
                }
                
                .close:hover {
                    background-color: #000000;
                    color: white;
                }                
            </style>
            <div id="popup">
                <div class="content">
                <h2>Green-M Thông Báo!</h2>
                <p>Bạn không có quyền truy cập trang này!.</p>
                <span>- Error -</span>
                <a href="../../../public/index.php" class="close">X</a>
                </div>
            </div>
        ';
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