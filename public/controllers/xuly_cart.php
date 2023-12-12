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
                if (isset($check_qty) && $check_qty == "done") {
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
                        'shop_id' => $shop_id
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