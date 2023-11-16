<section id="cart" class="section-p1">
    <table style="margin-left: 100px; width: 80%">
        <thead>
            <tr>
                <td>Xóa</td>
                <td>Ảnh</td>
                <td>Tên</td>
                <td>Giá</td>
                <td>Số lượng</td>
                <td>Cửa hàng</td>
                <td>Tổng giá</td>
            </tr>
        </thead>
        <tbody>
            <?php
                $total_full = 0;
                $total = 0;
                $tong_sl = 0;
                if(isset($_SESSION['cart_live'])) {
                    foreach($_SESSION['cart_live'] as $items) {
                        extract($items);
                        $tong_sl = $product_price * $product_qty;
                        echo '
                            <tr>
                                <td><a href="index.php?act=xuly_Cart&delete_ses=true&id='. $product_id .'"><i class="far fa-times-circle"></i></a></td>
                                <input type="hidden" value='. $product_id .' id="cart_id">
                                <td><img id="cart_img" src="'. $product_img .'" alt=""></td>
                                <td id="cart_name">'. $product_name .'</td>
                                <td id="cart_price">$'. $product_price .'</td>
                                <td id="cart_qty">'. $product_qty .'</td>
                                <td id="cart_qty">'. $shop_id .'</td>
                                <td>$'. $tong_sl .'</td>
                            </tr>
                        ';
                    }
                } else if(isset($show_cart_log) && count($show_cart_log) > 0) {
                    $total_full = 0;
                    $total = 0;
                    foreach($show_cart_log as $items) {
                        extract($items);
                        $tong_sl = $cart_price * $cart_qty;
                        $total += $tong_sl;
                        echo '
                            <tr>
                                <td><a href="index.php?act=xuly_Cart&delete_cart=true&id='. $cart_id .'"><i class="far fa-times-circle"></i></a></td>
                                <input type="hidden" value='. $cart_id  .' id="cart_id">
                                <td><img id="cart_img" src="'. $cart_img .'" alt=""></td>
                                <td id="cart_name">'. $cart_name .'</td>
                                <td id="cart_price">$'. $cart_price .'</td>
                                <td id="cart_qty">'. $cart_qty .'</td>
                                <td id="cart_qty">'. $shop_name .'</td>
                                <td>$'. $tong_sl .'</td>
                            </tr>
                        ';
                    }
                }
            ?>
        </tbody>
    </table>
</section>
<?php
    if(isset($_SESSION['83x86'])) {
?>
<section id="add-cart" class="section-p1">
    <div id="makhuyenmai">
        <h3>Voucher Giảm Giá</h3>
        <div>
            <form action="index.php?act=cart" method="post">
                <input type="text" placeholder="Nhập mã giảm giá" id="textDiscount" name="textDiscount">
                <input type="submit" class="normal" id="buttonDiscount" name="promo" value="Áp dụng">
            </form>
        </div>
    </div>

    <div id="subtotal">
        <h3>Tổng Giỏ Hàng</h3>
        <table>
            <tr>
                <td>Tiền Hàng</td>
                <td style="color: red;">-$<?php echo isset($total) ? $total : 0; ?></td>
            </tr>
            <tr id="giamgia">
                <td>Giảm Giá</td>
                <td style="color: green; font-weight: bold;" id="totalVoucher"><?php
                    if(isset($giamgia) && $giamgia > 0) {
                        $total_full = $total - ($total * $giamgia['code_reduced'] / 100);
                        echo $giamgia['code_reduced'];
                        $code_gift = '- Green-M Tài Trợ';
                        echo '<input type="hidden" id="code_gift" value="'. $giamgia['code_gift'] .'">';
                    } else {
                        $total_full = $total;
                        echo '0';
                        $code_gift = "";
                        echo '<input type="hidden" id="code_gift" value="0">';
                    }
                ?>% <?=$code_gift?></td>
            </tr>
            <tr>
                <td>Tiền Vận Chuyển</td>
                <td>Free</td>
            </tr>
            <tr>
                <td><strong>Tổng</strong></td>
                <td><strong id="totalBill">$<?=$total_full?></strong></td>
            </tr>
        </table>
        <?php
                if(isset($show_cart_log) && count($show_cart_log) > 0) {
                    echo '<input id="checkbill" type="submit" name="pay_order" class="normal" value="Thanh Toán">';
                } else {
                    echo '<input id="checkbill" type="submit" name="pay_order" class="normal thanhtoan-nocart" value="Thanh Toán">';
                }
        ?>
    </div>
</section>
<div class="box-checkout">
    <div class="checkout-sp">
        <h3 align="center">Thông tin sản phẩm</h3>
        <hr width="80%" style="margin-left: 35px;">
        <div class="checkout-boxsp">
            <?php
                if(isset($show_cart_log) && count($show_cart_log) > 0) {
                    foreach($show_cart_log as $items) {
                        extract($items);
                        echo '
                            <div class="box-sp">
                                <div class="img-boxsp"><img width="50px" src="'. $cart_img .'" alt=""></div>
                                <div class="info-boxsp">
                                    <h6>'. $cart_name .'</h6>
                                    <span>Số lượng: '. $cart_qty .'</span>
                                </div>
                                <del>Giá: $'. $cart_price .'</del>
                            </div>
                        ';
                    }
                }
            ?>

            <div class="total-boxsp">
                <h2>Tổng: $<?=$total_full?></h2>
            </div>
        </div>
    </div>
    <div class="checkout-bill">
        <h3 align="center">Hình thức thanh toán</h3>
        <hr width="80%" style="margin-left: 35px;">
        <div class="hinhthuc">
            <?php
                if($_SESSION['83x86']['account_pay'] != "") {
                    echo '
                        <div>
                            <label for="cash">Thanh toán tiền mặt khi nhận được hàng</label>
                            <input type="checkbox" name="cash" id="cash">
                        </div>
                        <div>
                            <label for="bank">Thanh toán ngân hàng</label>
                            <input type="checkbox" name="bank" id="bank">
                        </div>
                    ';
                    echo '
                    <script>
                        const cashCheckbox = document.getElementById("cash");
                        const bankCheckbox = document.getElementById("bank");
                    
                        cashCheckbox.addEventListener("change", function() {
                            if (cashCheckbox.checked) {
                                bankCheckbox.checked = false;
                            }
                            });
                        
                            bankCheckbox.addEventListener("change", function() {
                            if (bankCheckbox.checked) {
                                cashCheckbox.checked = false;
                            }
                        });
                    </script>
                    ';
                } else {
                    echo '
                        <div>
                            <label for="cash">Thanh toán tiền mặt khi nhận được hàng</label>
                            <input type="checkbox" name="cash" id="cash">
                        </div>
                        <br>
                        <a href="?act=profile">Thêm hình thức thanh toán ngân hàng</a>
                    '; 
                }
            ?>
        </div>
        <div class="order-note">
            <label>Ghi chú</label>
            <textarea name="order-note" id="order-note" cols="30" rows="2"></textarea>
        </div>
        <div class="accept">
            <?php
                if(isset($show_cart_log) && count($show_cart_log) > 0) {
                    echo '<button class="thanhtoan" id="addOrder">Thanh toán</button>';
                } else {
                    echo '<button class="thanhtoan-nocart">Thanh toán</button>';
                }
            ?>
            <button class="huy" id="cancelOrder">Hủy</button>
        </div>
    </div>
</div>
<input type="hidden" id="account-address" value="<?=$_SESSION['83x86']['account_address']?>">
<input type="hidden" id="account-phone" value="<?=$_SESSION['83x86']['account_phone']?>">
<div class="testbug" style="font-size: 16px; position: fixed; top: 0; left: 0;"></div>
<script>
    $(".thanhtoan-nocart").click(function() {
        $(".error_noti").text("Vui lòng đặt để thanh toán!");
        show_error();
    });
    $("#cancelOrder").click(function() {
        $(".box-checkout").css('display', 'none');
        $(".box-checkout").siblings().css('opacity', '1');
    });
    $("#checkbill").click(function() {
        var address = $("#account-address").val();
        var phone = $("#account-phone").val();
        if(address != "" && phone != "") {
            $(".box-checkout").css('display', 'block');
            $(".box-checkout").siblings().css('opacity', '0.06');
        } else {
            $(".error_noti").text("Hãy thêm địa chỉ và sđt, tự động chuyển hướng!");
            show_error();
            setTimeout(function() {
                window.location.href = "?act=profile";
            }, 2000)
        }
    });
    $(document).on("click", "#addOrder", function() {
        var cashChecked = $('#cash').is(':checked');
        var bankChecked = $('#bank').is(':checked');
        var order_note = $("#order-note").val();
        var check_promo = $("#code_gift").val();
        if(cashChecked) {
            var thanhtoan = "Tiền mặt"; 
            $.ajax({
                url: "controllers/xuly_order.php",
                method: "POST",
                data: {
                    check_promo: check_promo,
                    total: <?=$total_full?>,
                    thanhtoan: thanhtoan,
                    order_note: order_note
                },
                success: function() {
                    $(".success_noti").text("Thanh toán thành công!");
                    show_success();
                    $(".thanhtoan").text('Xem đơn hàng ngay');
                    $("#addOrder").attr("id", "viewordernow");
                    $("#cancelOrder").text('Về trang chủ');
                    $("#cancelOrder").attr("id", "viewindexnow");
                }
            });
        } else if(bankChecked) {
            var thanhtoan = "Ngân hàng"; 
            $.ajax({
                url: "controllers/xuly_order.php",
                method: "POST",
                data: {
                    check_promo: check_promo,
                    total: <?=$total_full?>,
                    thanhtoan: thanhtoan,
                    order_note: order_note
                },
                success: function() {
                    $(".success_noti").text("Thanh toán thành công!");
                    show_success();
                    $(".thanhtoan").text('Xem đơn hàng ngay');
                    $("#addOrder").attr("id", "viewordernow");
                    $("#cancelOrder").text('Về trang chủ');
                    $("#cancelOrder").attr("id", "viewindexnow");
                }
            });
        } else {
            $(".error_noti").text("Vui lòng chọn hình thức thanh toán!");
            show_error();
            location.reload();
        }
    });
    $(document).on("click", "#viewordernow", function() {
    window.location.href = "index.php?act=profile";
    });

    $(document).on("click", "#viewindexnow", function() {
        window.location.href = "index.php";
    });
</script>
<?php
    } else {
        echo '
            <script>
                alert("Admin Thông báo: Vui lòng đăng nhập để thanh toán nhé!");
            </script>
        ';
    }
?>
<div class="formOrder"></div>