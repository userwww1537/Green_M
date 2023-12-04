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

    class account_lass extends dao_con {
        public static function show_account() {
            $sql = "SELECT * FROM account ORDER BY account_id DESC";
            return self::conn_show_all($sql);
        }

        public static function show_shop() {
            $sql = "SELECT account.*, IFNULL(COUNT(orders.order_id), 0) AS soLuongDonHang
                    FROM account
                    LEFT JOIN orders ON account.account_id = orders.shop_id
                    WHERE account.account_position = 'Shop'
                    GROUP BY account.account_id
                    ORDER BY soLuongDonHang DESC
            ";
            return self::conn_show_all($sql);
        }

        public static function sent_notify($a, $b) {
            $sql = "UPDATE account SET account_notify = ? WHERE account_id = ?";
            return self::conn_execute($sql, $a, $b);
        }

        public static function sent_lock($a, $b, $c) {
            $sql = "UPDATE account SET account_status = ?, account_notify = ? WHERE account_id = ?";
            return self::conn_execute($sql, $a, $b, $c);
        }
    }
?>