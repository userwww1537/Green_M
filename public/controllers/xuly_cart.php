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
                if (isset($check_qty) && $check_qty == "done") {
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
    }
    
    if(isset($promo)) {
        include_once "../model_dao/discount_code.php";
        $code = new code_lass();
        $giamgia = $code->check_promo($textDiscount);
        if($giamgia > 0) {
            if($giamgia['code_qty'] <= "0") {
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
                        <p>Mã giảm giá đã hết!.</p>
                        <span>- Error -</span>
                        <a href="../index.php?act=cart" class="close">X</a>
                        </div>
                    </div>
                ';
            } else {            
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
                        <p>Mã giảm giá chính xác!.</p>
                        <span>- Success -</span>
                        <a href="../index.php?act=cart&giamgia=1&code_reduced='. $giamgia['code_reduced'] .'&code_gift='. $giamgia['code_gift'] .'" class="close">X</a>
                        </div>
                    </div>
                ';
            }
        } else {
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
                    <p>Mã giảm giá không hợp lệ!.</p>
                    <span>- Error -</span>
                    <a href="../index.php?act=cart" class="close">X</a>
                    </div>
                </div>
            ';
        }
    }

    if(isset($check) && $check == "update_qty_cart") {
        $cart->up_qty_cart($value, $pro_id);
    }
?>