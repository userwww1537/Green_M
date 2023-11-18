<?php
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    if (file_exists('../model_dao/cart.php')) {
        include_once "../model_dao/cart.php";
    } else if (file_exists('model_dao/cart.php')) {
        include_once "model_dao/cart.php";
    }
    $cart = new cart_lass();
    extract($_REQUEST);

    if(isset($add_cart_detail)) {
        if(isset($_SESSION['83x86'])) {
            $check = false;
            $ketqua = $cart->show_cart($_SESSION['83x86']['account_id']);
            foreach($ketqua as $items) {
                if($items['product_id'] == $product_id) {
                    $chua = $items['cart_qty'] + $product_qty;
                    $cart->up_qty_cart($chua, $product_id);
                    $check = true;
                    echo '
                        <script>
                            window.location.href = "../index.php?act=cart";
                        </script>
                    ';
                    break;
                }
            }
            if($check == false) {
                echo '
                    <script>
                        window.location.href = "../index.php?act=cart";
                    </script>
                ';
                $cart->add_cart($product_name, $product_price, $product_img, $product_qty, $product_id, $shop_id);
            }
        } else {
            if (isset($_SESSION['cart_live'])) {
                foreach ($_SESSION['cart_live'] as &$items) {
                    if ($product_id == $items['product_id']) {
                        $items['product_qty'] += $product_qty;
                        $check_qty = "done";
                        break;
                    }
                }
                unset($items);
                if ($check_qty == "done") {
                    echo '
                        <script>
                            window.location.href = "../index.php?act=cart";
                        </script>
                    ';
                    return;
                } else {
                    $_SESSION['cart_live'][] = array(
                        'product_id' => $product_id,
                        'product_name' => $product_name,
                        'product_img' => $product_img,
                        'product_price' => $product_price,
                        'product_qty' => $product_qty,
                    );
                    echo '
                        <script>
                            window.location.href = "../index.php?act=cart";
                        </script>
                    ';
                }
            } else {
                $_SESSION['cart_live'] = array(
                    array(
                        'product_id' => $product_id,
                        'product_name' => $product_name,
                        'product_img' => $product_img,
                        'product_price' => $product_price,
                        'product_qty' => $product_qty,
                    )
                );
                echo '
                    <script>
                        window.location.href = "../index.php?act=cart";
                    </script>
                ';
            }
        }
    }

    if(isset($check_del) && $check_del == "del") {
        if(isset($_SESSION['83x86'])) {
            $check = false;
            $ketqua = $cart->show_cart($_SESSION['83x86']['account_id']);
            foreach($ketqua as $items) {
                if($items['product_id'] == $product_id) {
                    $chua = $items['cart_qty'] + $product_qty;
                    $cart->up_qty_cart($chua, $product_id);
                    $check = true;
                    echo 'Cập nhật số lượng giỏ hàng!';
                    break;
                }
            }
            if($check == false) {
                echo 'Thêm thành công';
                $cart->add_cart($product_name, $product_price, $product_img, $product_qty, $product_id, $shop_id);
            }
        } else {
            if (isset($_SESSION['cart_live'])) {
                foreach ($_SESSION['cart_live'] as &$items) {
                    if ($product_id == $items['product_id']) {
                        $items['product_qty'] += $product_qty;
                        $check_qty = "done";
                        break;
                    }
                }
                unset($items);
                if ($check_qty == "done") {
                    echo 'Cập nhật số lượng giỏ hàng!';
                    return;
                } else {
                    $_SESSION['cart_live'][] = array(
                        'product_id' => $product_id,
                        'product_name' => $product_name,
                        'product_img' => $product_img,
                        'product_price' => $product_price,
                        'product_qty' => $product_qty,
                        'shop_id' => $shop_id
                    );
                    echo 'Thêm thành công';
                }
            } else {
                $_SESSION['cart_live'] = array(
                    array(
                        'product_id' => $product_id,
                        'product_name' => $product_name,
                        'product_img' => $product_img,
                        'product_price' => $product_price,
                        'product_qty' => $product_qty,
                        'shop_id' => $shop_id
                    )
                );
                echo 'Thêm thành công';
            }
        }
    } else if(isset($load_cart_live)) {
        if(isset($_SESSION['cart_live'])) {
            $mang = $_SESSION['cart_live'];
            $number_cart = 0;
            $tong_tien = 0;
            for($i = 0; $i < sizeof($mang); $i++) {
                $number_cart++;
                $tong_tien += ($mang[$i]['product_price'] * $mang[$i]['product_qty']);
            }
            $response = array();
            $response['number_cart'] = $number_cart;
            $response['tong_tien'] = $tong_tien;
            
            echo json_encode($response);
        } else {
            $response = array();
            $response['number_cart'] = 0;
            $response['tong_tien'] = 0;
            
            echo json_encode($response);
        }
    } else if(isset($delete_ses)) {
        if(count($_SESSION['cart_live']) > 1) {
            foreach ($_SESSION['cart_live'] as $key => $sub_array) {
                if ($sub_array['product_id'] == $id) {
                    unset($_SESSION['cart_live'][$key]);
                    echo '
                        <script>
                            window.location.href = "index.php?act=cart";
                        </script>
                    ';
                }
            }
        } else {
            unset($_SESSION['cart_live']);
            echo '
                <script>
                    window.location.href = "index.php?act=cart";
                </script>
            ';
        }
    } else if(isset($delete_cart)) {
        $cart->del_cart($id);
        echo '
            <script>
                window.location.href = "?act=cart";
            </script>
        ';
    } else if(isset($check_cartLive)) {
        foreach($_SESSION['cart_live'] as $items) {
            $cart->update_cart($items['product_name'], $items['product_price'], $items['product_img'], $items['product_qty'], $items['product_id'], $items['shop_id']);  
        }
        unset($_SESSION['cart_live']);
        echo 'Cập nhật giỏ hàng thành công!';
    } else if(isset($load_cart_log)) {
        $mang = $cart->show_cart($_SESSION['83x86']['account_id']);
        $number_cart = 0;
        $tong_tien = 0;
        for($i = 0; $i < sizeof($mang); $i++) {
            $number_cart++;
            $tong_tien += ($mang[$i]['cart_price'] * $mang[$i]['cart_qty']);
        }
        $response = array();
        $response['number_cart'] = $number_cart;
        $response['tong_tien'] = $tong_tien;
        
        echo json_encode($response);
    } else if(isset($promo)) {
        
    }
?>