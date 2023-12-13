<?php
    include_once "connect.php";
    if(session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    class cart_lass extends dao_con{
        public function update_cart($a, $b, $c, $d, $e, $f) {
            $sql = "INSERT INTO cart(cart_name, cart_price, cart_img, cart_qty, product_id, account_id, shop_id) VALUES(?, ?, ?, ?, ?, ? ,?)";
            return $this->conn_execute($sql, $a, $b, $c, $d, $e, $_SESSION['83x86']['account_id'], $f);
        }

        public function show_cart($a) {
            $sql = "SELECT cart.*, account.account_name as shop_name
                    FROM cart
                    JOIN account ON cart.shop_id = account.account_id
                    WHERE cart.account_id = ?
            ";
            return $this->conn_show_all($sql, $a);
        }

        public function add_cart($a, $b, $c, $d, $e, $f) {
            $sql = "INSERT INTO cart(cart_name, cart_price, cart_img, cart_qty, product_id, account_id, shop_id) VALUES(?, ?, ?, ?, ?, ?, ?)";
            return $this->conn_execute($sql, $a, $b, $c, $d, $e, $_SESSION['83x86']['account_id'], $f);
        }

        public function up_qty_cart($a, $b) {
            $sql = "UPDATE cart SET cart_qty = ? WHERE product_id = ?";
            return $this->conn_execute($sql, $a, $b);
        }

        public function del_cart($a) {
            $sql = "DELETE FROM cart WHERE cart_id = ?";
            return $this->conn_execute($sql, $a);
        }
    }
?>