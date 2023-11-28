<?php
    include_once "connect.php";
    if(session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    class order_lass extends dao_con {
        public function add_order($a, $b, $c, $d) {
            $sql = "INSERT INTO orders(order_total, order_pay, order_note, account_id, shop_id) VALUES(?, ?, ?, ?, ?)";
            return $this->conn_execute($sql, $a, $b, $c, $_SESSION['83x86']['account_id'], $d);
        }

        public function add_order_details($a, $b, $c, $d, $e) {
            $sql = "INSERT INTO order_details (details_name, details_price, details_img, details_qty, product_id, order_id) VALUES (?, ?, ? , ?, ?, (SELECT order_id FROM orders ORDER BY order_id DESC LIMIT 1))";
            return $this->conn_execute($sql, $a, $b, $c, $d, $e);
        }

        public function show_order_me() {
            $sql = "SELECT orders.*, account.account_name AS shop_name
                    FROM orders
                    JOIN account ON orders.shop_id = account.account_id
                    WHERE orders.account_id = ?
                    ORDER BY orders.order_id DESC
            ";
            return $this->conn_show_all($sql, $_SESSION['83x86']['account_id']);
        }

        public function show_order_details($a) {
            $sql = "SELECT order_details.*, product.category_id AS idDanhMuc
                    FROM order_details
                    JOIN product ON order_details.product_id = product.product_id
                    WHERE order_details.order_id = ?    
            ";
            return $this->conn_show_all($sql, $a);
        }

        public function del_order($a) {
            $order_status = "Đã hủy";
            $sql = "UPDATE orders SET order_status = ? WHERE order_id = ?";
            return $this->conn_execute($sql, $order_status, $a);
        }

        public function check_order() {
            $sql = "SELECT COUNT(*) as order_count FROM orders WHERE shop_id = ?";
            return $this->conn_show_one($sql, $_SESSION['83x86']['account_id']);
        }
    }
?>