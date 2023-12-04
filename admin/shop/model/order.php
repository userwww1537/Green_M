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

    class order_lass extends dao_con {
        public static function show_order() {
            $sql = "SELECT orders.*, account.account_name, account.account_id
                    FROM orders
                    JOIN account ON orders.shop_id = account.account_id
                    WHERE orders.shop_id = ? ORDER BY orders.order_id DESC
            ";
            return self::conn_show_all($sql, $_SESSION['83x86']['account_id']);
        }

        public static function show_order_home() {
            $sql = "SELECT orders.*, account.account_name, account.account_id
                    FROM orders
                    JOIN account ON orders.account_id = account.account_id
                    WHERE orders.shop_id = ? ORDER BY orders.order_id DESC
            ";
            return self::conn_show_all($sql, $_SESSION['83x86']['account_id']);
        }

        public static function show__order() {
            $sql = "SELECT orders.*, account.account_name, account.account_id, account.account_phone, account.account_address
                    FROM orders
                    JOIN account ON orders.account_id = account.account_id
                    WHERE orders.shop_id = ? ORDER BY orders.order_id DESC
            ";
            return self::conn_show_all($sql, $_SESSION['83x86']['account_id']);
        }

        public static function show_order_details($a) {
            $sql = "SELECT * FROM order_details WHERE order_id = ?";
            return self::conn_show_all($sql, $a);
        }

        public static function show_doanhthu() {
            $sql = "SELECT account.*, COUNT(orders.order_id) AS order_count
                    FROM account
                    INNER JOIN orders ON account.account_id = orders.shop_id
                    WHERE orders.shop_id = ? GROUP BY account.account_id
            ";
            return self::conn_show_all($sql, $_SESSION['83x86']['account_id']);
        }

        public static function up_order($a, $b) {
            $sql = "UPDATE orders SET order_status = ? WHERE order_id = ?";
            return self::conn_execute($sql, $a, $b);
        }

        public static function up_order_cancel($a, $b, $c) {
            $sql = "UPDATE orders SET order_note = ?, order_status = ? WHERE order_id = ?";
            return self::conn_execute($sql, $a, $b, $c);
        }
    }
?>