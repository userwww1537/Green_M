<?php
    require_once  'connect.php';
    class order_lass extends dao_profile {
        public function showOrder() {
            $sql = "SELECT orders.*, account.account_name
                    FROM orders
                    JOIN account ON orders.shop_id = account.account_id
                    WHERE orders.account_id = ?
                    ORDER BY orders.time_reg DESC
            ";
            return $this->conn_show_all($sql, $_SESSION['83x86']['account_id']);
        }

        public function showOrderDetails($id) {
            $sql = "SELECT order_details.*, product.category_id 
                    FROM order_details 
                    JOIN product ON order_details.product_id = product.product_id
                    WHERE order_details.order_id = ?
            ";
            return $this->conn_show_all($sql, $id);
        }

        public function showOrderDetail($id) {
            $sql = "SELECT orders.*, account.account_name
                    FROM orders
                    JOIN account ON orders.shop_id = account.account_id
                    WHERE orders.order_id = ?
            ";
            return $this->conn_show_one($sql, $id);
        }

        public function countOrder() {
            $sql = "SELECT COUNT(*) AS total_orders
                    FROM orders
                    WHERE account_id = ?
            ";
            return $this->conn_show_one($sql, $_SESSION['83x86']['account_id']);
        }

        public function countOrderSelect($a) {
            if($a == 'Đang chờ duyệt') {
                $sql = "SELECT COUNT(*) AS total_orders
                        FROM orders
                        WHERE account_id = ? AND order_status = 'Đang chờ duyệt'
                ";
            } else if($a == 'Đã duyệt') {
                $sql = "SELECT COUNT(*) AS total_orders
                        FROM orders
                        WHERE account_id = ? AND order_status = 'Đã duyệt'
                ";
            } else if($a == 'Đang đóng gói') {
                $sql = "SELECT COUNT(*) AS total_orders
                        FROM orders
                        WHERE account_id = ? AND order_status = 'Đang đóng gói'
                ";
            } else if($a == 'Đang giao hàng') {
                $sql = "SELECT COUNT(*) AS total_orders
                        FROM orders
                        WHERE account_id = ? AND order_status = 'Đang giao hàng'
                ";
            } else if($a == 'Giao thành công') {
                $sql = "SELECT COUNT(*) AS total_orders
                        FROM orders
                        WHERE account_id = ? AND order_status = 'Giao thành công'
                ";
            } else {
                $sql = "SELECT COUNT(*) AS total_orders
                        FROM orders
                        WHERE account_id = ? AND order_status = 'Đã hủy'
                ";
            }
            return $this->conn_show_one($sql, $_SESSION['83x86']['account_id']);
        }
    }
?>