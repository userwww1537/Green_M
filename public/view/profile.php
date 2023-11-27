<?php
if (isset($_SESSION['83x86'])) {
?>
    <script>
        function load() {
            $.ajax({
                url: "controllers/xuly_login.php",
                method: "POST",
                data: {
                    account_id_up_auto: "id"
                }
            });
        }
        setInterval(load, 30);
    </script>
<?php
}
?>

<script>
    function saveActiveMenu(menuId) {
    localStorage.setItem('activeMenu', menuId);
    }

    window.onload = function() {
    var activeMenu = localStorage.getItem('activeMenu');
    if (activeMenu) {
        $('.list-group-item').removeClass('active');
        $(`[href="#${activeMenu}"]`).addClass('active');
        $('.tab-pane').removeClass('active show');
        $(`#${activeMenu}`).addClass('active show');
    }
    }
</script>
<div class="container light-style flex-grow-1 container-p-y" style="font-size: 18px;">
    <h4 class="font-weight-bold py-3 mb-4">
        Tài khoản của bạn
    </h4>
    <div class="card overflow-hidden">
        <div class="row no-gutters row-bordered row-border-light">
            <div class="col-md-3 pt-0">
                <div class="list-group list-group-flush account-settings-links">
                    <?php
                    if (isset($_SESSION['83x86']) && $_SESSION['83x86']['account_position'] == "Shop") {
                    ?>
                        <a class="list-group-item list-group-item-action" data-toggle="list" href="#account-general" onclick="saveActiveMenu('account-general')">Thông tin tài khoản</a>
                        <a class="list-group-item list-group-item-action" data-toggle="list" href="#account-change-password" onclick="saveActiveMenu('account-change-password')">Đổi mật khẩu</a>
                        <a class="list-group-item list-group-item-action" data-toggle="list" href="#account-pay-info" onclick="saveActiveMenu('account-pay-info')">Thông tin Thanh toán</a>
                        <a class="list-group-item list-group-item-action" data-toggle="list" href="#order-me" onclick="saveActiveMenu('order-me')">Đơn hàng của tôi</a>
                        <a class="list-group-item list-group-item-action loadkkk" href="../admin/index.php">Truy cập quản lý <b style="color: blue;">S</b><b style="color: red;">H</b><b style="color: green;">O</b><b style="color: pink;">P</b></a>
                    <?php } else if (isset($_SESSION['83x86']) && $_SESSION['83x86']['account_position'] == "Quản trị viên") {
                    ?>
                        <a class="list-group-item list-group-item-action" data-toggle="list" href="#account-general" onclick="saveActiveMenu('account-general')">Thông tin tài khoản</a>
                        <a class="list-group-item list-group-item-action" data-toggle="list" href="#account-change-password" onclick="saveActiveMenu('account-change-password')">Đổi mật khẩu</a>
                        <a class="list-group-item list-group-item-action" data-toggle="list" href="#account-pay-info" onclick="saveActiveMenu('account-pay-info')">Thông tin Thanh toán</a>
                        <a class="list-group-item list-group-item-action" data-toggle="list" href="#order-me" onclick="saveActiveMenu('order-me')">Đơn hàng của tôi</a>
                        <a class="list-group-item list-group-item-action loadkkk" href="../admin/index.php">Truy cập quản lý <b style="color: blue;">A</b><b>D</b><b style="color: red;">M</b><b style="color: green;">I</b><b style="color: pink;">N</b></a>
                    <?php }  else { ?>
                        <a class="list-group-item list-group-item-action" data-toggle="list" href="#account-general" onclick="saveActiveMenu('account-general')">Thông tin tài khoản</a>
                        <a class="list-group-item list-group-item-action" data-toggle="list" href="#account-change-password" onclick="saveActiveMenu('account-change-password')">Đổi mật khẩu</a>
                        <a class="list-group-item list-group-item-action" data-toggle="list" href="#account-pay-info" onclick="saveActiveMenu('account-pay-info')">Thông tin Thanh toán</a>
                        <a class="list-group-item list-group-item-action" data-toggle="list" href="#order-me" onclick="saveActiveMenu('order-me')">Đơn hàng của tôi</a>
                    <?php } ?>
                </div>
            </div>
            <div class="col-md-9">
                <div class="tab-content">
                    <div class="tab-pane fade active show" id="account-general"> <!-- Thay đổi thông tin tài khoản -->
                        <form action="controllers/xuly_login.php" method="post" enctype="multipart/form-data">
                            <div class="card-body media align-items-center">
                                <?php
                                    if(isset($_SESSION['83x86'])) {
                                        echo '<img src="'. $_SESSION['83x86']['account_avt'] .'" alt class="d-block ui-w-80 imgChange">';
                                    }
                                ?>
                                <div class="media-body ml-4">
                                    <label class="btn btn-outline-primary">
                                        Tải ảnh lên
                                        <input type="file" name="image" class="account-settings-fileinput image" id="imageBtn">
                                    </label> &nbsp;
                                    <div class="text-dark small mt-1">Chấp nhận đuôi JPG, GIF or PNG. Hạn chế tải file cao nhé!</div>
                                </div>
                            </div>
                            <hr class="border-light m-0">
                            <div class="card-body">
                                <div class="form-group">
                                    <label class="form-label">Họ và tên</label>
                                    <?php if($_SESSION['83x86']['account_name'] != "") {
                                            echo '<input type="text" class="form-control mb-1" value="'. $_SESSION['83x86']['account_name'] .'" name="Fullname">';
                                        } else {
                                            echo '<input type="text" class="form-control mb-1"  name="Fullname" placeholder="Vd: Nguyễn Tấn Ý">';
                                        }
                                    ?>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Giới tính</label>
                                    <select name="sex" id="sex">
                                        <?php if($_SESSION['83x86']['account_sex'] != "") {
                                            echo '<option value='.$_SESSION['83x86']['account_sex'].'>'. $_SESSION['83x86']['account_sex'] .'</option>';
                                        } else {
                                            echo '<option value="">Vui lòng chọn</option>';
                                        }
                                        ?>
                                        <option value="Nam">Nam</option>
                                        <option value="Nữ">Nữ</option>
                                        <option value="Khác">Khác</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Tên đăng nhập</label>
                                    <?php if($_SESSION['83x86']['account_username'] != "") {
                                            echo '<input type="text" class="form-control mb-1" value="'. $_SESSION['83x86']['account_username'] .'" name="username">';
                                        } else {
                                            echo '<input type="text" class="form-control mb-1"  name="username" placeholder="Vd: nguyentany">';
                                        }
                                    ?>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">E-mail</label>
                                    <?php 
                                        if($_SESSION['83x86']['account_email'] != "") {
                                            if($_SESSION['83x86']['account_verified_mail'] != "Chưa xác thực") {
                                                echo '
                                                    <div id="mail_verified"><input type="email" class="form-control mb-1" value="'. $_SESSION['83x86']['account_email'] .'" name="email" readonly></input>
                                                        <div id="icon-verified">
                                                            <i class="fas fa-badge-check" style="color: #11ff00;"></i>
                                                        </div>
                                                    </div>
                                                ';
                                            } else {
                                                echo '
                                                    <div id="mail_not_verified"><input type="email" class="form-control mb-1" value="'. $_SESSION['83x86']['account_email'] .'" name="email" readonly></input>
                                                        <div id="icon-verified">
                                                            <i class="fas fa-exclamation-circle" style="color: #ff0000;"></i>
                                                        </div>
                                                    </div>
                                                    <a class="show_verified" href="">Xác minh E-Mail Của Bạn</a>
                                                ';
                                                if(isset($_SESSION['verified_mail'])) {
                                                    echo '
                                                    <div class="box_verified_mail">
                                                        <form  method="POST" action="controllers/xuly_login.php">
                                                            <div class="input-verified-mail">
                                                                <input type="text" name="code_verified" id="code_verified" placeholder="Nhập mã xác thực...">
                                                                <button type="submit" name=""><i class="fas fa-check" style="color: #00bd0d;"></i></button>
                                                            </div>
                                                            <button type="submit" name="btn_verified_mail">Xác minh</button>
                                                        </form>
                                                    </div>
                                                    ';
                                                } else {
                                                    echo '
                                                    <div class="box_verified_mail" style="display: none;">
                                                        <form method="POST" action="controllers/xuly_login.php">
                                                            <div class="input-verified-mail">
                                                                <input type="text" name="code_verified" id="code_verified" placeholder="Nhập mã xác thực...">
                                                                <button type="submit" name="btn_send_code_verified_mail">Gửi mã</button>
                                                            </div>
                                                            <button type="submit" name="btn_verified_mail">Xác minh</button>
                                                        </form>
                                                    </div>
                                                    ';
                                                }
                                            }
                                        } else {
                                            echo '<input type="email" class="form-control mb-1"  name="email" placeholder="Vd: nguyentany@gmail.com" required>';
                                        }
                                    ?>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Số điện thoại</label>
                                    <?php if($_SESSION['83x86']['account_phone'] != "") {
                                            echo '<input type="text" class="form-control mb-1" value="'. $_SESSION['83x86']['account_phone'] .'" name="phone">';
                                        } else {
                                            echo '<input type="text" class="form-control mb-1"  name="phone" placeholder="Vd: 0345123856">';
                                        }
                                    ?>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Địa chỉ</label>
                                    <?php if($_SESSION['83x86']['account_address'] != "") {
                                            echo '<input type="text" class="form-control mb-1" value="'. $_SESSION['83x86']['account_address'] .'" name="address">';
                                        } else {
                                            echo '<input type="text" class="form-control mb-1"  name="address" placeholder="Vd: 123/3 Hùng vương. TP. Hồ Chí Minh">';
                                        }
                                    ?>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Đăng ký nhà bán hàng:</label>
                                    <?php
                                        if($_SESSION['83x86']['account_position'] == "Shop") {
                                            echo '
                                                <select name="vaitro" id="vaitro">
                                                    <option value="1">Bạn đã đăng ký nhà bán hàng</option>
                                                    <option value="0">Tắt</option>
                                                </select>
                                            ';
                                        } else {
                                            echo '
                                                <select name="vaitro" id="vaitro">
                                                    <option value="0">Không</option>
                                                    <option value="1">Có</option>
                                                </select>
                                            ';
                                        }
                                    ?>
                                    <br>
                                    <span style="color: red; font-size: 13px;">(<b>Lưu ý</b>: khi đăng ký nhà bán hàng, bạn sẽ bị mất 3% trên mỗi sản phẩm bán ra)</span>
                                </div>
                            </div>
                            <div class="text-right mt-3">
                                <?php
                                    if($_SESSION['83x86']['account_verified_mail'] == "Chưa xác thực") {
                                        echo '<button type="submit" id="warning_notified" class="btn btn-primary" name="warning_notified">Lưu thông tin</button>&nbsp;';
                                    } else {
                                        echo '<button type="submit" class="btn btn-primary" name="saveinfoAccount">Lưu thông tin</button>&nbsp;';
                                    }
                                ?>
                                <button type="submit" class="btn btn-default" name="cancel_info">Hủy</button>
                            </div>
                        </form>
                    </div>
                    <div class="tab-pane fade" id="account-pay-info"> <!-- Thay đổi thông tin thanh toán -->
                        <form action="controllers/xuly_login.php" method="post">
                            <hr class="border-light m-0">
                            <div class="card-body">
                                <div class="form-group">
                                    <label class="form-label">Họ và tên:</label>
                                    <input type="text" class="form-control mb-1" value="<?=$_SESSION['83x86']['account_name']?>" readonly>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Số thẻ:</label>
                                    <?php
                                        if(isset($_SESSION['83x86']) && $_SESSION['83x86']['account_number_pay'] != "") {
                                            $account_number_pay_one = substr($_SESSION['83x86']['account_number_pay'], 0, 4);                                             
                                            $account_number_pay_two = substr($_SESSION['83x86']['account_number_pay'], 4, 4); 
                                            $account_number_pay_three = substr($_SESSION['83x86']['account_number_pay'], 8, 4); 
                                            $account_number_pay_four = substr($_SESSION['83x86']['account_number_pay'], 12, 4); 
                                            echo '
                                                <div class="boc-number-pay">
                                                    <input type="text" class="form-control mb-1" name="account_number_pay_one" value="'. $account_number_pay_one .'" maxlength="4"> -
                                                    <input type="text" class="form-control mb-1" name="account_number_pay_two" value="'. $account_number_pay_two .'" maxlength="4"> -
                                                    <input type="text" class="form-control mb-1" name="account_number_pay_three" value="'. $account_number_pay_three .'" maxlength="4"> -
                                                    <input type="text" class="form-control mb-1" name="account_number_pay_four" value="'. $account_number_pay_four .'" maxlength="4">
                                                </div>
                                            ';
                                        } else {
                                            echo '
                                                <div class="boc-number-pay">
                                                    <input type="text" class="form-control mb-1" name="account_number_pay_one" placeholder="1234" maxlength="4"> -
                                                    <input type="text" class="form-control mb-1" name="account_number_pay_two" placeholder="5678" maxlength="4"> -
                                                    <input type="text" class="form-control mb-1" name="account_number_pay_three" placeholder="9101" maxlength="4"> -
                                                    <input type="text" class="form-control mb-1" name="account_number_pay_four" placeholder="1213" maxlength="4">
                                                </div>
                                            ';
                                        }
                                    ?>
                                    <span style="color: red; font-size: 13px;">(<b>Lưu ý</b>: Số thẻ sẽ bao gồm 16 - 19 số)</span>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Ngày hết hạn</label>
                                    <input type="date" class="form-control mb-1">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Ngân hàng</label>
                                    <select name="account_pay" id="nganhang">
                                        <?php
                                            if(isset($_SESSION['83x86']) && $_SESSION['83x86']['account_pay'] != "") {
                                                echo '<option value="'. $_SESSION['83x86']['account_pay'] .'">'. $_SESSION['83x86']['account_pay'] .'</option>';
                                            } else {
                                                echo '<option value="">Vui lòng chọn</option>';
                                            }
                                        ?>
                                        <option value="MBBank">MBBank</option>
                                        <option value="Techcombank">Techcombank</option>
                                        <option value="Vietcombank">Vietcombank</option>
                                        <option value="Viettinbank">Viettinbank</option>
                                        <option value="Sacombank">Sacombank</option>
                                        <option value="Khác">Khác</option>
                                    </select>
                                </div>
                                <img style="display: none;" id="imgLogo" src="" alt="" width="150px">
                                <div style="display: none;" class="form-group paykhac">
                                    <label class="form-label">Tên ngân hàng</label>
                                    <input type="text" placeholder="Nhập tên ngân hàng.." name="account_pay_other" class="form-control mb-1">
                                </div>
                            </div>
                            <div class="text-right mt-3">
                                <button type="submit" class="btn btn-primary" name="saveinfoPay">Lưu thông tin</button>&nbsp;
                                <button type="submit" class="btn btn-default" name="cancel_info">Hủy</button>
                            </div>
                        </form>
                    </div>
                    <div class="tab-pane fade" id="account-change-password"> <!-- Thay đổi mật khẩu -->
                        <div class="card-body pb-2">
                            <div class="form-group">
                                <label class="form-label">Mật khẩu cũ</label>
                                <input type="password" class="form-control" id="pass_old" required>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Mật khẩu mới</label>
                                <input type="password" class="form-control" id="pass_new" required>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Xác nhận mật khẩu mới</label>
                                <input type="password" class="form-control" id="again_pass" required>
                            </div>
                        </div>
                        <div class="text-right mt-3">
                            <button type="button" class="btn btn-primary" id="btn_change_pass">Đổi mật khẩu</button>&nbsp;
                            <button type="button" class="btn btn-default" name="cancel_info">Hủy</button>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="order-me"> <!-- Xem đơn hàng của me -->
                        <div class="container">
                            <h1>Thông tin đơn hàng</h1>

                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Mã đơn hàng</th>
                                        <th>Thành tiền</th>
                                        <th>Thanh toán</th>
                                        <th>Ghi chú</th>
                                        <th>Trạng thái</th>
                                        <th>Cửa hàng</th>
                                        <th>Ngày đặt</th>
                                        <th>Lựa chọn</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        foreach($show_order_me as $items) {
                                            extract($items);
                                            $convert = strtotime($time_reg);
                                            $time_reg = date('d-m-Y', $convert);
                                            echo '
                                                <tr>
                                                    <td>Order-'. $order_id .'</td>
                                                    <td>$'. $order_total .'</td>
                                                    <td>'. $order_pay .'</td>
                                                    <td>'. $order_note .'</td>
                                                    '; if($order_status == "Đang xử lý") {
                                                        echo '<td style="color: Yellow3; font-weight: 900;">'. $order_status .'</td>';
                                                    } else if($order_status == "Đang vận chuyển") {
                                                        echo '<td style="color: blue; font-weight: 900;">'. $order_status .'</td>';
                                                    } else if($order_status == "Đã hủy") {
                                                        echo '<td style="color: red; font-weight: 900;">'. $order_status .'</td>';
                                                    } else {
                                                        echo '<td style="color: green; font-weight: 900;">'. $order_status .'</td>';
                                                    } echo '
                                                    <td>'. $shop_name .'</td>
                                                    <td>'. $time_reg .'</td>
                                                    <td><button class="btn-check-details" data-order-id="' . $order_id . '" data-order-status="'. $order_status .'">Xem chi tiết</button></td>
                                                </tr>
                                            ';
                                        }
                                    ?>
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="details-order">
    <!-- <div class="close-order">
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
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>Củ cải</td>
                    <td><img width="100px" src="https://www.rent.com/blog/wp-content/uploads/2023/05/Moving.png" alt=""></td>
                    <td>3</td>
                    <td>$84</td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>Củ cải</td>
                    <td><img width="100px" src="https://www.rent.com/blog/wp-content/uploads/2023/05/Moving.png" alt=""></td>
                    <td>3</td>
                    <td>$84</td>
                </tr>
            </tbody>
        </table>
    </div>
    <hr>
    <div class="bill-order">
        <div class="total-order">
            <h6>-Thành Tiền-</h6>
            <span>$86</span>
        </div>
        <div class="option-order">
            <a href="" id="del-order">Hủy đơn</a>
            <span style="color: red; font-size: 13px;">(<b>Lưu ý</b>: Không thể hủy đơn khi đơn được vận chuyển)</span>
        </div>
    </div> -->
</div>
<script>
    $("#warning_notified").on('click', function(e) {
        e.preventDefault();
        $(".error_noti").text('Xác thực E-Mail để sử dụng dịch vụ!');
        show_error();
    });
    $(".show_verified").on('click', function(e) {
        e.preventDefault();
        $(".box_verified_mail").css("display", "block");
    });
    $(document).ready(function() {
        $(".btn-check-details").click(function() {
            var orderID = $(this).data("order-id");
            var orderStatus = $(this).data("order-status");
            $.ajax({
                url: "controllers/xuly_order.php",
                method: "POST",
                data: {
                    orderID: orderID,
                    orderStatus: orderStatus
                },
                success: function(data) {
                    $(".details-order").html(data);
                    $(".close-order").on('click', function() {
                        $(".details-order").css("display", "none");
                        $(".details-order").html('');
                    });
                }
            });
            $(".details-order").css("display", "block");
        });
    });
    $("#btn_change_pass").on('click', function() {
        var pass_get = <?=$_SESSION['83x86']['account_pass']?>;
        var pass_old = $("#pass_old").val();
        var pass_new = $("#pass_new").val();
        var again_pass = $("#again_pass").val();
        if(pass_old == pass_get) {
            if(pass_new == again_pass && pass_old != "" && pass_new != "" & again_pass != "") {
                $.ajax({
                    url: "controllers/xuly_login.php",
                    method: "POST",
                    data: {
                        check: "change_pass",
                        pass_old: pass_get,
                        pass_new: pass_new
                    },
                    success: function(data) {
                        $(".success_noti").text("Đổi mật khẩu thành công!");
                        show_success();
                        $("#pass_old").val("");
                        $("#pass_new").val("");
                        $("#again_pass").val("");
                    }
                });
            } else {
                $(".error_noti").text("Mật khẩu nhập lại không trùng khớp!");
                show_error();
            }
        } else {
            $(".error_noti").text("Mật khẩu cũ không trùng khớp!");
            show_error();
        }
    });
    $(document).ready(function() {
        if($("#nganhang").val() == "MBBank") {
            $("#imgLogo").css("display", "block");
            $("#imgLogo").attr("src", "https://upload.wikimedia.org/wikipedia/commons/2/25/Logo_MB_new.png");
            $(".paykhac").css("display", "none");
        } else if($("#nganhang").val() == "Techcombank") {
            $("#imgLogo").css("display", "block");
            $("#imgLogo").attr("src", "https://dongphucvina.vn/wp-content/uploads/2023/05/logo-techcombank-dongphucvina.vn_.png");
            $(".paykhac").css("display", "none");
        } else if($("#nganhang").val() == "Vietcombank") {
            $("#imgLogo").css("display", "block");
            $("#imgLogo").attr("src", "https://inrenhat.com/wp-content/uploads/2022/08/logo-vietcombank-mot-mau.png");
            $(".paykhac").css("display", "none");
        } else if($("#nganhang").val() == "Viettinbank") {
            $("#imgLogo").css("display", "block");
            $("#imgLogo").attr("src", "https://centavsip.vn/wp-content/uploads/2020/06/brasol.vn-logo-vietinbank-viettinbank-logo-01.png");
            $(".paykhac").css("display", "none");
        } else if($("#nganhang").val() == "Sacombank") {
            $("#imgLogo").css("display", "block");
            $("#imgLogo").attr("src", "https://logoso1.com/wp-content/uploads/2020/07/logo-sacombank-ban-dau.png");
            $(".paykhac").css("display", "none");
        } else if($("#nganhang").val() == "Khác") {
            $("#imgLogo").css("display", "none");
            $(".paykhac").css("display", "block");
        } else {
            $("#imgLogo").css("display", "none");
            $(".paykhac").css("display", "none");
        }
    });
    $("#nganhang").change(function() {
        var value = $(this).val();
        if(value == "MBBank") {
            $("#imgLogo").css("display", "block");
            $("#imgLogo").attr("src", "https://upload.wikimedia.org/wikipedia/commons/2/25/Logo_MB_new.png");
            $(".paykhac").css("display", "none");
        } else if(value == "Techcombank") {
            $("#imgLogo").css("display", "block");
            $("#imgLogo").attr("src", "https://dongphucvina.vn/wp-content/uploads/2023/05/logo-techcombank-dongphucvina.vn_.png");
            $(".paykhac").css("display", "none");
        } else if(value == "Vietcombank") {
            $("#imgLogo").css("display", "block");
            $("#imgLogo").attr("src", "https://inrenhat.com/wp-content/uploads/2022/08/logo-vietcombank-mot-mau.png");
            $(".paykhac").css("display", "none");
        } else if(value == "Viettinbank") {
            $("#imgLogo").css("display", "block");
            $("#imgLogo").attr("src", "https://centavsip.vn/wp-content/uploads/2020/06/brasol.vn-logo-vietinbank-viettinbank-logo-01.png");
            $(".paykhac").css("display", "none");
        } else if(value == "Sacombank") {
            $("#imgLogo").css("display", "block");
            $("#imgLogo").attr("src", "https://logoso1.com/wp-content/uploads/2020/07/logo-sacombank-ban-dau.png");
            $(".paykhac").css("display", "none");
        } else if(value == "Khác") {
            $("#imgLogo").css("display", "none");
            $(".paykhac").css("display", "block");
        } else {
            $("#imgLogo").css("display", "none");
            $(".paykhac").css("display", "none");
        }
    });
</script>
<script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
<script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/js/bootstrap.bundle.min.js"></script>
<script type="text/javascript">
</script>

<script>
    $('#imageBtn').change(function() {
        var file = $(this)[0].files[0];
        if (file) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('.imgChange').attr('src', e.target.result);
            }
            reader.readAsDataURL(file);
        }
    });
</script>