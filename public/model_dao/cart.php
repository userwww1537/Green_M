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

        public function add_cart($a, $b, $c, $d, $e, $f) {
            $sql = "INSERT INTO cart(cart_name, cart_price, cart_img, cart_qty, product_id, account_id, shop_id) VALUES(?, ?, ?, ?, ?, ?, ?)";
            return $this->conn_execute($sql, $a, $b, $c, $d, $e, $_SESSION['83x86']['account_id'], $f);
        }

        public function up_qty_cart($a, $b) {
            $sql = "UPDATE cart SET cart_qty = ? WHERE product_id = ?";
            return $this->conn_execute($sql, $a, $b);
        }

        }
    
?>