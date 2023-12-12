<?php
include_once "connect.php";
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

class order_lass extends dao_con
{
    public static function show_order()
    {
        $sql = "SELECT orders.*, account.account_name, account.account_id
                    FROM orders
                    JOIN account ON orders.shop_id = account.account_id
                    WHERE orders.shop_id = ? ORDER BY orders.order_id DESC
            ";
        return self::conn_show_all($sql, $_SESSION['83x86']['account_id']);
    }

    public static function show_name_order($a)
    {
        $a = '%' . $a . '%';
        $sql = "SELECT orders.*, account.account_name, account.account_id, account.account_phone, account.account_address
                    FROM orders
                    JOIN account ON orders.account_id = account.account_id
                    WHERE orders.shop_id = ? AND account.account_name LIKE '$a' ORDER BY orders.order_id DESC
            ";
        return self::conn_show_all($sql, $_SESSION['83x86']['account_id']);
    }

    public static function show_phone_order($a)
    {
        $a = '%' . $a . '%';
        $sql = "SELECT orders.*, account.account_name, account.account_id, account.account_phone, account.account_address
                    FROM orders
                    JOIN account ON orders.account_id = account.account_id
                    WHERE orders.shop_id = ? AND account.account_phone LIKE '$a' ORDER BY orders.order_id DESC
            ";
        return self::conn_show_all($sql, $_SESSION['83x86']['account_id']);
    }

    public static function show_status_order($a)
    {
        $a = '%' . $a . '%';
        $sql = "SELECT orders.*, account.account_name, account.account_id, account.account_phone, account.account_address
                    FROM orders
                    JOIN account ON orders.account_id = account.account_id
                    WHERE orders.shop_id = ? AND orders.order_status LIKE '$a' ORDER BY orders.order_id DESC
            ";
        return self::conn_show_all($sql, $_SESSION['83x86']['account_id']);
    }

    public static function show_id_order($a)
    {
        $a = '%' . $a . '%';
        $sql = "SELECT orders.*, account.account_name, account.account_id, account.account_phone, account.account_address
                    FROM orders
                    JOIN account ON orders.account_id = account.account_id
                    WHERE orders.shop_id = ? AND orders.order_id LIKE '$a' ORDER BY orders.order_id DESC
            ";
        return self::conn_show_all($sql, $_SESSION['83x86']['account_id']);
    }

    public static function show_order_home()
    {
        $sql = "SELECT orders.*, account.account_name, account.account_id
                    FROM orders
                    JOIN account ON orders.account_id = account.account_id
                    WHERE orders.shop_id = ? ORDER BY orders.order_id DESC
            ";
        return self::conn_show_all($sql, $_SESSION['83x86']['account_id']);
    }

    public static function show__order()
    {
        $sql = "SELECT orders.*, account.account_name, account.account_id, account.account_phone, account.account_address
                    FROM orders
                    JOIN account ON orders.account_id = account.account_id
                    WHERE orders.shop_id = ? ORDER BY orders.order_id DESC
            ";
        return self::conn_show_all($sql, $_SESSION['83x86']['account_id']);
    }

    public static function show_order_details($a)
    {
        $sql = "SELECT * FROM order_details WHERE order_id = ?";
        return self::conn_show_all($sql, $a);
    }

    public static function show_doanhthu()
    {
        $sql = "SELECT account.*, COUNT(orders.order_id) AS order_count
                    FROM account
                    INNER JOIN orders ON account.account_id = orders.shop_id
                    WHERE orders.shop_id = ? GROUP BY account.account_id
            ";
        return self::conn_show_all($sql, $_SESSION['83x86']['account_id']);
    }

    public static function up_order($a, $b)
    {
        $sql = "UPDATE orders SET order_status = ? WHERE order_id = ?";
        return self::conn_execute($sql, $a, $b);
    }

    public static function up_order_success($status, $id)
    {
        $sqlS = "SELECT order_total FROM orders WHERE order_id = ?";
        $result = self::conn_show_one($sqlS, $id);
        $tong = $result['order_total'] * 0.97;
        $sql = "UPDATE orders SET order_status = ?, order_total_shop = '$tong' WHERE order_id = ?";
        return self::conn_execute($sql, $status, $id);
    }

    public static function up_order_cancel($a, $b, $c)
    {
        $sql = "UPDATE orders SET order_note = ?, order_status = ? WHERE order_id = ?";
        return self::conn_execute($sql, $a, $b, $c);
    }

    public static function duyetDon($id)
    {
        $sql = "UPDATE orders SET order_status = 'Đã duyệt' WHERE order_id = ?";
        return self::conn_execute($sql, $id);
    }
}
