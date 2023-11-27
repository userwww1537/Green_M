<?php
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    if (file_exists('../model_dao/order.php')) {
        include_once "../model_dao/order.php";
    } else if (file_exists('model_dao/order.php')) {
        include_once "model_dao/order.php";
    }
    if (file_exists('../model_dao/discount_code.php')) {
        include_once "../model_dao/discount_code.php";
    } else if (file_exists('model_dao/discount_code.php')) {
        include_once "model_dao/discount_code.php";
    }
    if (file_exists('../model_dao/cart.php')) {
        include_once "../model_dao/cart.php";
    } else if (file_exists('model_dao/cart.php')) {
        include_once "model_dao/cart.php";
    }
    if (file_exists('../model_dao/product.php')) {
        include_once "../model_dao/product.php";
    }
    $cart = new cart_lass();
    $order = new order_lass();
    $promo = new code_lass();
    $product = new product_lass();
    extract($_REQUEST);
if(isset($_SESSION['83x86'])) {
    if(isset($check_promo)) {
        $show_cart_log = $cart->show_cart($_SESSION['83x86']['account_id']);
        $shops = [];
        if($check_promo != "") {
            $promo->update_promo($check_promo);
            foreach($show_cart_log as $items) {
                extract($items);
                if(!in_array($shop_id, $shops)) {
                    $shops[] = $shop_id;
                }
            }
            
            $total = [];
            foreach($shops as $shop_id) {
                $tempTotal = 0;
                foreach($show_cart_log as $items) {
                    if($shop_id == $items['shop_id']) {
                        $tempTotal += $items['cart_price'];
                    }
                }
                $total[$shop_id] = $tempTotal;
            }
            
            foreach($shops as $shop_id) {
                $order->add_order($total[$shop_id], $thanhtoan, $order_note, $shop_id);
                foreach($show_cart_log as $items) {
                    if($shop_id == $items['shop_id']) {
                        $product->update_qty_product($items['cart_qty'], $items['product_id']);
                        $order->add_order_details($items['cart_name'], $items['cart_price'], $items['cart_img'], $items['cart_qty'], $items['product_id']);
                        $cart->del_cart($items['cart_id']);
                    }
                }
            }
        } else {
            foreach($show_cart_log as $items) {
                extract($items);
                if(!in_array($shop_id, $shops)) {
                    $shops[] = $shop_id;
                }
            }
            
            $total = [];
            foreach($shops as $shop_id) {
                $tempTotal = 0;
                foreach($show_cart_log as $items) {
                    if($shop_id == $items['shop_id']) {
                        $tempTotal += $items['cart_price'];
                    }
                }
                $total[$shop_id] = $tempTotal;
            }
            
            foreach($shops as $shop_id) {
                $order->add_order($total[$shop_id], $thanhtoan, $order_note, $shop_id);
                foreach($show_cart_log as $items) {
                    if($shop_id == $items['shop_id']) {
                        $product->update_qty_product($items['cart_qty'], $items['product_id']);
                        $order->add_order_details($items['cart_name'], $items['cart_price'], $items['cart_img'], $items['cart_qty'], $items['product_id']);
                        $cart->del_cart($items['cart_id']);
                    }
                }
            }
        }
    } else if(isset($check) && $check == "del_order") {
        $order->del_order($orderID);
        header('location: ?act=profile');
    } else if(isset($check) && $check == "updateOrder") {
        $ketqua = $order->check_order();
        $thongbao = "";
        if(isset($_SESSION['ting_order'])) {
            if($_SESSION['ting_order'] != $ketqua['order_count']) {
                $thongbao = '
                    <audio autoplay src="view/music/DonHangMoi.m4a"></audio>
                    <script>
                        if ("Notification" in window) {
                            Notification.requestPermission().then(function(permission) {
                            if (permission === "granted") {
                                var notification = new Notification("Thông báo từ Green-M!", {
                                    body: "'. $_SESSION['83x86']['account_name'] .' ơi, bạn có đơn hàng mới.",
                                });
                                notification.addEventListener("click", function() {
                                    window.open("http://localhost/DuAn1/Asm_Green-M%20-%20PHP/admin/shop/index.php?act=order", "_blank");
                                });
                            }
                            });
                        }
                    </script>
                ';
                $_SESSION['ting_order'] = $ketqua['order_count'];
            }
        } else {
            $_SESSION['ting_order'] = $ketqua['order_count'];
        }
        echo $thongbao;
    }
    if(isset($orderID)) {
        $show = $order->show_order_details($orderID);
        $i = 0;
        $total = 0;
        $ketqua = '
                <div class="close-order">
                    X
                </div>
                <div class="title-order">
                    <h3>Thông tin đơn hàng</h3>
                </div>
                <div class="table-order">
                    <table>
                        <thead>
                            <tr>
                                <th>Stt</th>
                                <th>Tên sản phẩm</th>
                                <th>Hình ảnh</th>
                                <th>Số lượng</th>
                                <th>Giá sản phẩm</th>
                                <th>Tổng giá</th>
                                <th>Đánh giá</th>
                            </tr>
                        </thead>
                        <tbody>
        ';
        foreach($show as $items) {
            extract($items);
            $i++;
            $thanh_price = $details_price * $details_qty;
            $total += $thanh_price;
            $ketqua .= '
                <tr>
                    <td>'. $i .'</td>
                    <td>'. $details_name .'</td>
                    <td><img width="100px" src="'. $details_img .'" alt=""></td>
                    <td>'. $details_qty .'</td>
                    <td>$'. $details_price .'</td>
                    <td>$'. $thanh_price .'</td>
                    '; 
                    if(isset($orderStatus) && $orderStatus == "Giao thành công") {
                        if($details_feedback == 0) {
                            $ketqua .= '
                                <td><a style="font-weight: 600;" href="?act=detail&checkIfOrderCompleteSameRate=true&product_id='. $product_id .'&category='. $idDanhMuc .'&idOrder='. $order_id .'">Đánh giá ngay!</a></td>
                            ';
                        } else {
                            $ketqua .= '
                                <td><a>Đã đánh giá!</a></td>
                            ';
                        }
                    } else {
                        $ketqua .= '
                            <td><a>Chưa thể đánh giá!</a></td>
                        ';
                    }
                    $ketqua .= '
                </tr>
            ';
        }
        $check_status = $order->show_order_me();
        $status = "";
        foreach($check_status as $items) {
            extract($items);
            if($orderID == $order_id) {
                $status = $order_status;
                break;
            }
        }
        $ketqua .= '
                    </tbody>
                    </table>
                </div>
                <hr>
                <div class="bill-order">
                    <div class="total-order">
                        <h6>-Thành Tiền-</h6>
                        <span>$'. $total .'</span>
                    </div>
                    <div class="option-order">
                        '; if($status == "Đang xử lý") {
                            $ketqua .= '<a href="?act=xuly_order&orderID='. $orderID .'&check=del_order" id="del-order">Hủy đơn</a>';
                        } else if($status == "Đã hủy") {
                            $ketqua .= '<button id="del-order" style="opacity: 0.5;">Đã hủy!</button>';
                        } else {
                            $ketqua .= '<button id="del-order" style="opacity: 0.5;">Không thể hủy!</button>';
                        }
                        $ketqua .= '<span style="color: red; font-size: 13px;">(<b>Lưu ý</b>: Không thể hủy đơn khi đơn được vận chuyển)</span>
                    </div>
                </div>
        ';
        echo $ketqua;
    }
}
?>