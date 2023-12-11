<?php
    if(isset($_SESSION['verified_mail']) && isset($forgot) && $_SESSION['verified_mail']['code'] == $forgot) {
        unset($_SESSION['verified_mail']);
        include 'model/account.php';
        $account = new acc_lass();
        $account->veri_mail();
        echo '
            <script>
                window.location.href = "index.php";
            </script>
        ';
    }
?>
<div class="main">
    <h2>Thông tin người dùng</h2>
    <div class="card">
        <div class="card-body card-info">
            <i class="fa fa-pen fa-xs edit btnInfo"></i>
            <table>
                <tbody>
                    <tr>
                        <td>Họ và tên</td>
                        <td>:</td>
                        <td><?=$_SESSION['83x86']['account_name']?></td>
                    </tr>
                    <tr>
                        <td>Tên đăng nhập</td>
                        <td>:</td>
                        <td><?=$_SESSION['83x86']['account_username']?></td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td>:</td>
                        <td>
                            <?php
                                if($_SESSION['83x86']['account_verified_mail'] == 'Chưa xác thực') {
                                    echo '<del class="verify-mail">'. $_SESSION['83x86']['account_email'] .'</del> <i style="color: red;" class="far fa-exclamation-circle"></i> <a href="controllers/xuly_mail.php?&check=verifyMail"><button style="cursor: pointer;">Xác minh E-mail</button></a>';
                                } else {
                                    echo ''. $_SESSION['83x86']['account_email'] .' <i style="color: green;" class="far fa-badge-check"></i>';
                                }
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td>Địa chỉ</td>
                        <td>:</td>
                        <td>
                            <?php
                                if($_SESSION['83x86']['account_address'] != '') {
                                    echo $_SESSION['83x86']['account_address'];
                                } else {
                                    echo 'Chưa có địa chỉ';
                                }
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td>Số điện thoại</td>
                        <td>:</td>
                        <td>
                            <?php
                                if($_SESSION['83x86']['account_phone'] != '') {
                                    echo '<a href="tel:+'. $_SESSION['83x86']['account_phone'] .'">'. $_SESSION['83x86']['account_phone'] .'</a>';
                                } else {
                                    echo 'Chưa có số điện thoại';
                                }
                            ?>
                    </td>
                    </tr>
                    <tr>
                        <td>Đơn hàng</td>
                        <td>:</td>
                        <td>Có <?=$countOrder['total_orders']?> đơn hàng</td>
                    </tr>
                    <?php
                        if(isset($_SESSION['83x86']) && $_SESSION['83x86']['account_position'] == 'Shop') {
                            $oldDate = strtotime($_SESSION['83x86']['time_store']);
                            $newDate = date('\N\g\à\y\ d \T\h\á\n\g\ m \N\ă\m\ Y', $oldDate);
                            echo '
                                <tr>
                                    <td>Trở thành nhà bán hàng từ: </td>
                                    <td>:</td>
                                    <td>'. $newDate .'</td>
                                </tr>
                            ';
                        }
                    ?>
                </tbody>
            </table>
        </div>
        <div class="card-body card-info-edit">
            <a href="index.php"><i class="far fa-undo-alt edit"></i></a>
            <table>
                <form action="controllers/xuly_account.php" method="post">
                    <tbody>
                        <tr>
                            <td>Họ và tên</td>
                            <td>:</td>
                            <td><input type="text" value="<?=$_SESSION['83x86']['account_name']?>" name="fullName"></td>
                        </tr>
                        <tr>
                            <td>Tên đăng nhập</td>
                            <td>:</td>
                            <td><input type="text" value="<?=$_SESSION['83x86']['account_username']?>" name="username"></td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td>:</td>
                            <td><input type="email" name="mail" value="<?=$_SESSION['83x86']['account_email']?>" id=""></td>
                        </tr>
                        <tr>
                            <td>Địa chỉ</td>
                            <td>:</td>
                            <td>
                                <?php
                                    if($_SESSION['83x86']['account_address'] != '') {
                                        echo '<input type="text" name="address" value="'.$_SESSION['83x86']['account_address'].'">';
                                    } else {
                                        echo '<input type="text" name="address" value="">';
                                    }
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <td>Số điện thoại</td>
                            <td>:</td>
                            <td>
                                <?php
                                    if($_SESSION['83x86']['account_phone'] != '') {
                                        echo '<input type="text" name="phone" value="'.$_SESSION['83x86']['account_phone'].'">';
                                    } else {
                                        echo '<input type="text" name="phone" value="">';
                                    }
                                ?>
                        </td>
                        </tr>
                        <tr>
                            <td>Đơn hàng</td>
                            <td>:</td>
                            <td>Có <?=$countOrder['total_orders']?> đơn hàng</td>
                        </tr>
                    </tbody>
                    <input style="font-size: 17px; cursor: pointer;" type="submit" name="changeInfo" value="Cập nhật">
                </form>
            </table>
        </div>
    </div>

    <h2>Phương thức thanh toán</h2>
    <div class="card">
        <div class="card-body card-pay">
            <i class="fa fa-pen fa-xs edit btnPay"></i>
            <div class="social-media" style="font-size: 18px;">
                <div class="pttt-pay">
                    <?php
                        if($_SESSION['83x86']['account_number_pay'] != '') {
                            echo 'STK: '. $_SESSION['83x86']['account_number_pay'] .'';
                        } else {
                            echo 'Chưa có thông tin thanh toán';
                        }
                    ?>
                </div>
                <div class="nh-pay">
                    <?php
                        if($_SESSION['83x86']['account_pay'] != '') {
                            echo 'Ngân hàng: '. $_SESSION['83x86']['account_pay'] .'';
                        }
                    ?>
                </div>
            </div>
        </div>
        <div class="card-body card-pay-edit">
            <a href="index.php"><i class="far fa-undo-alt edit"></i></a>
            <div class="social-media" style="font-size: 18px;">
                <form action="controllers/xuly_account.php" method="post">
                    <div class="pttt-pay">
                        <?php
                            if($_SESSION['83x86']['account_number_pay'] != '') {
                                echo 'STK: <input type="text" name="number" value="'. $_SESSION['83x86']['account_number_pay'] .'">';
                            } else {
                                echo 'STK: <input type="text" name="number" required>';
                            }
                        ?>
                    </div>
                    <div class="nh-pay">
                        <?php
                            if ($_SESSION['83x86']['account_pay'] != '') {
                                echo '
                                    Ngân hàng: 
                                    <select name="payBank" id="payBank">
                                        <option value="'. $_SESSION['83x86']['account_pay'] .'">'. $_SESSION['83x86']['account_pay'] .'</option>
                                        <option value="MBBank">Mb Bank</option>
                                        <option value="Vietinbank">Vietinbank</option>
                                        <option value="Vietcombank">Vietcombank</option>
                                        <option value="Sacombank">Sacombank</option>
                                        <option value="other">Khác</option>
                                    </select>
                                    <input type="text" class="otherBank" name="otherBank" placeholder="Ngân hàng thụ hưởng..."
                                    style="
                                        position: relative;
                                        left: 50%;
                                        transform: translate(-50%);
                                    ">
                                ';
                            } else {
                                echo '
                                    Ngân hàng: 
                                    <select name="payBank" id="payBank">
                                        <option value="MBBank">Mb Bank</option>
                                        <option value="Vietinbank">Vietinbank</option>
                                        <option value="Vietcombank">Vietcombank</option>
                                        <option value="Sacombank">Sacombank</option>
                                        <option value="other">Khác</option>
                                    </select>
                                    <input type="text" class="otherBank" name="otherBank" placeholder="Ngân hàng thụ hưởng..."
                                    style="
                                        position: relative;
                                        left: 50%;
                                        transform: translate(-50%);
                                    ">
                                ';
                            }
                        ?>
                    </div>
                    <input type="submit" value="Cập nhật" name="changePay">
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    $(".btnInfo").on('click', function() {
        $(".card-info-edit").css('display', 'block');
        $(".card-info").css('display', 'none');
    });

    $(".btnPay").on('click', function() {
        $(".card-pay-edit").css('display', 'block');
        $(".card-pay").css('display', 'none');
    });

    $("#payBank").change(function() {
        var value = $(this).val();
        if(value == 'other') {
            $(".otherBank").css('display', 'block');
        } else {
            $(".otherBank").css('display', 'none');
        }
    });
</script>