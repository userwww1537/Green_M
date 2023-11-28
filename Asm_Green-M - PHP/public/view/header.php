<?php
    if(isset($_SESSION['83x86']) && $_SESSION['83x86']['account_notify'] != "" ) {
        if($_SESSION['83x86']['account_status'] == "Khóa") {
            if(!isset($act) && $act != 'lock' || isset($act) && $act != 'lock') {
                header('location: ?act=lock');
            }
        } else {
            if(!isset($act) && $act != 'noti' || isset($act) && $act != 'noti') {
                header('location: ?act=noti');
            }
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Siêu thị xanh - Green-M</title>
    <link rel="shortcut icon" href="view/images/logo-1.webp" type="image/x-icon">
    <link rel="stylesheet" href="view/css/style.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="view/css/media.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</head>

<body>
    <header class="header">
        <div class="header-1">
            <a href="?" class="logo loadkkk"><img width="150px" src="view/images/logo-1.webp" alt=""></a>
            <div class="search-box-container">
                <input type="search" id="search-box" placeholder="Tìm kiếm..">
                <div class="results">
                    <!-- <a href="" class="result-show">
                        <i class="fad fa-search"></i>
                        <span>Củ cải</span>
                        <label>$18</label>
                    </a> -->
                </div>
            </div>
        </div>

        <div class="header-2">
            <div id="menu-bar" class="fas fa-bars"></div>
            <nav class="navbar">
                <a href="index.php" class="loadkkk">Trang chủ</a>
                <a href="index.php?act=about" class="loadkkk">Giới thiệu</a>
                <a href="index.php?act=shop&check=product&page=1&start=0" class="loadkkk">Cửa hàng</a>
                <a href="?act=blog&page=1&start=0" class="loadkkk">Tin tức</a>
                <a href="?">FAQ</a>
                <a href="index.php?act=contact" class="loadkkk">Liên hệ</a>
            </nav>
            <div class="icons">
                <?php
                    if(isset($_SESSION['83x86'])) {
                        echo '
                        <a href="?act=message" class="loadkkk"><i class="fas fa-comment-dots"></i>Tin nhắn <b style="color: red;" class="update-mess-seen"></b></a>
                        <ul class="btn-user account-father">
                            <button class="account-name"><i class="fad fa-user-alt"></i>'. $_SESSION['83x86']['account_name'] .'</button>
                            <ul class="account-con">
                                <li><a class="loadkkk" href="?act=profile">Hồ sơ cá nhân</a></li>
                                <li><a class="loadkkk" href="index.php?act=logout&checkkkk=">Đăng xuất</a></li>
                            </ul>
                        </ul>
                        ';
                        echo '
                            <script>
                                function seenMess() {
                                    $.ajax({
                                        url: "controllers/xuly_mess.php",
                                        method: "POST",
                                        data: {
                                            check: "updateSeen"
                                        },
                                        dataType: "JSON",
                                        success: function(data) {
                                            $(".update-mess-seen").text(data.ketqua);
                                            $("body").append(data.thongbao);
                                        }
                                    });
                                }
                            
                                setInterval(seenMess, 1000);
                            </script>
                    
                        ';
                    } else {
                        echo '
                            <button class="login_btn"><i class="fad fa-lock-alt"></i>Đăng nhập</button>
                            <div class="box-login-form">
                                <button class="close_form_user" style="float: right; font-size: 18px;">X</button>
                                <form method="post" id="form_action_log">
                                    <div class="input-field">
                                        <label for="username">Username or Email</label>
                                        <input type="text" name="username" id="username_login" required>
                                    </div>
                                    <div class="input-field">
                                        <label for="password">Mật khẩu của bạn</label>
                                        <input type="password" name="password" id="password_login" required>
                                    </div>
                                    <div class="input-field">
                                        <label for="saveLogin">Ghi nhớ đăng nhập</label>
                                        <input type="checkbox" name="saveLogin" id="saveLogin_login" checked>
                                    </div>
                                    <a class="loadkkk" style="color: purple; font-size: 15px; font-weight: 550;" href="?act=forgot_pass">Quên mật khẩu?</a>
                                    <input type="submit" value="Đăng nhập" name="log_account" id="log_account">
                                </form>
                                <div class="no-account">
                                    Bạn chưa có tài khoản? <button class="reg_btn">Đăng ký</button>.
                                </div>
                            </div>
                            <button class="reg_btn"><i class="fas fa-user-circle"></i>Đăng ký</button>
                            <div class="box-reg-form">
                                <button class="close_form_user" style="float: right; font-size: 18px;">X</button>
                                <form method="post" id="form_action_reg">
                                    <div class="input-field">
                                        <label for="username">Họ và tên</label>
                                        <input type="text" name="name" id="name" required>
                                    </div>
                                    <div class="input-field">
                                        <label for="username">Username</label>
                                        <input type="text" name="username" id="username_reg" required>
                                        <div class="verified_username_reg"></div>
                                    </div>
                                    <div class="input-field">
                                        <label for="username">E-mail</label>
                                        <input type="email" name="email" id="email" required>
                                        <div class="verified_email_reg"></div>
                                    </div>
                                    <div class="input-field">
                                        <label for="password">Mật khẩu của bạn</label>
                                        <input type="password" name="password" id="password_reg" required>
                                        <div class="verified_password_reg"><div class="line-pass"></div>
                                    </div>
                                    <div class="input-field">
                                        <label for="password">Nhập lại mật khẩu</label>
                                        <input type="password" name="password" id="password_reg_again" required>
                                        <div class="verified_again_reg" style="color: red;"></div>
                                    </div>
                                    <input type="submit" value="Đăng ký" name="reg" id="btn_reg_now">
                                </form>
                                <div class="no-account">
                                    Bạn đã có tài khoản? <button class="login_btn">Đăng nhập</button>.
                                </div>
                            </div>
                        ';
                    }
                ?>
                <?php
                    if(isset($_SESSION['83x86'])) {
                ?>
                    <a href="index.php?act=cart" class="cart_demo_live loadkkk"><i class="fad fa-shopping-cart"></i>Giỏ hàng <span class="number_cart" style="background: red; border-radius: 40%; color: white;">0</span></a>
                    <div class="cart_box_live">
                        <span class="tong_tien">Tổng tiền: <b>$0</b></span>
                    </div>
                <?php } ?>
            </div>
            <?php
                if(!isset($_SESSION['83x86'])) {
                    echo '
                        <a href="index.php?act=cart" class="cart_demo_live loadkkk"><i class="fad fa-shopping-cart"></i>Giỏ hàng <span class="number_cart" style="background: red; border-radius: 40%; color: white;">0</span></a>
                        <div class="cart_box_live">
                            <span class="tong_tien">Tổng tiền: <b>$0</b></span>
                        </div>
                    ';
                }
            ?>
        </div>

    </header>

    <div class="boxLoading"></div>
    <div class="success_noti">
        <span class="text_success_noti"></span>
    </div>
    <div class="error_noti">
        <span class="text_error_noti"></span>
    </div>

    <script>
        $("#search-box").keyup(function() {
            var value = $(this).val();
            if(value == "") {
                $(".results").css('display', 'none');
            } else {
                $.ajax({
                    url: "controllers/xuly_product.php",
                    method: "POST",
                    data: {
                        check : "search",
                        value: value
                    },
                    success: function(data) {
                        $(".results").css('display', 'block');
                        $(".results").html(data);
                    }
                });
            }
        });

        $("#form_action_reg").submit(function(e) {
            e.preventDefault();
            if($("#password_reg").val() == $("#password_reg_again").val()) {
                $.ajax({
                    url: "controllers/xuly_login.php",
                    method: "POST",
                    data: {
                        fullName: $("#name").val(),
                        username: $("#username_reg").val(),
                        email: $("#email").val(),
                        password: $("#password_reg").val(),
                        reg_account: true
                    },
                    success: function(data) {
                        $(".success_noti").text("Đăng ký thành công!");
                        show_success();
                        $(".box-login-form").css("right", "10px");
                        $(".box-reg-form").css("right", "-100%");
                    }
                });
            } else {
                $(".error_noti").text("Mật khẩu không trùng khớp!");
                show_error();
            }
        });

        $("#form_action_log").submit(function(e) {
            e.preventDefault();
            $.ajax({
                url: "controllers/xuly_login.php",
                method: "POST",
                data: {
                    username: $("#username_login").val(),
                    password: $("#password_login").val(),
                    log_account: true
                },
                dataType: "json",
                success: function(data) {
                    if (data.success) {
                        $(".success_noti").text(data.message);
                        show_success();
                        $(".box-login-form").css("right", "-100%");
                        window.location.href = "index.php";
                    } else {
                        $(".error_noti").text(data.message);
                        show_error();
                    }
                }
            });
        });

        $(".login_btn").click(function() {
            $(".box-login-form").css("right", "10px");
            $(".box-reg-form").css("right", "-100%");
        });
        $(".reg_btn").click(function() {
            $(".box-reg-form").css("right", "10px");
            $(".box-login-form").css("right", "-100%");
        });
        $(".close_form_user").click(function() {
            $(".box-login-form").css("right", "-100%");
            $(".box-reg-form").css("right", "-100%");
        });
    </script>
    <?php
        if(isset($_SESSION['83x86']) && isset($_COOKIE['accountsave'])) {
    ?>
        <script>        
        $(document).ready(function() {
            setInterval(function() {
                $.ajax({
                    url: "controllers/xuly_cart.php",
                    method: "POST",
                    data: {
                        load_cart_log: "true"
                    },
                    dataType: "json",
                    success: function(data) {
                        $(".number_cart").html(data.number_cart);
                            $(".tong_tien").html("Tổng tiền: <b>$" + data.tong_tien + "</b>");
                    }
                });
            }, 1000);
        });
        </script>
    <?php } ?>
    <?php            
        if(isset($_SESSION['83x86'])) {
            if(isset($_SESSION['cart_live']) && count($_SESSION['cart_live']) > 0) {
                echo '
                    <script>
                        $(document).ready(function() {
                            $.ajax({
                                url: "controllers/xuly_cart.php",
                                method: "POST",
                                data: {check_cartLive: "true"},
                                success: function(data) {
                                    $(".success_noti").text(data);
                                    show_success();
                                }
                            });
                        });
                    </script>
                ';
            }
        } else {
            echo '<script>        
                setInterval(function() {
                    $.ajax({
                        url: "controllers/xuly_cart.php",
                        method: "POST",
                        data: {load_cart_live: "True"},
                        dataType: "json",
                        success: function(data) {
                            $(".number_cart").html(data.number_cart);
                            $(".tong_tien").html("Tổng tiền: <b>$" + data.tong_tien + "</b>");
                        }
                    });
                }, 1000);
            </script>';
        }
    ?>

    <script>
        $(document).ready(function() {
            $("#username_reg").keyup(function() {
                if($(this).val() != ""){
                    $.ajax({
                        url: "controllers/xuly_login.php",
                        method: "POST",
                        data: {
                            check: "checkUsernameReg",
                            input: $(this).val()
                        },
                        success: function(data) {
                            $(".verified_username_reg").html(data);
                        }
                    });
                } else {
                    $(".verified_username_reg").html("");
                }
            });

            $("#email").keyup(function() {
                if($(this).val() != ""){
                    $.ajax({
                        url: "controllers/xuly_login.php",
                        method: "POST",
                        data: {
                            check: "checkEmailReg",
                            input: $(this).val()
                        },
                        success: function(data) {
                            $(".verified_email_reg").html(data);
                        }
                    });
                } else {
                    $(".verified_email_reg").html("");
                }
            });

            $("#password_reg").keyup(function() {
                var passwordLength = $(this).val().length;
                
                if (passwordLength == 0) {
                    $(".line-pass").css({'background': '', 'width': ''});
                    $(".verified_password_reg").html("");
                } else if (passwordLength < 8) {
                    $(".line-pass").css({'background': 'red', 'width': '30%'});
                } else if (passwordLength >= 8 && passwordLength < 12) {
                    $(".line-pass").css({'background': 'yellow', 'width': '60%'});
                } else {
                    $(".line-pass").css({'background': 'green', 'width': '100%'});
                }
            });

            $("#password_reg_again").keyup(function() {
                var value = $("#password_reg").val();
                var value_now = $(this).val();
                if(value_now != value) {
                    $(".verified_again_reg").text('Mật khẩu không trùng khớp!');
                } else {
                    $(".verified_again_reg").text('');
                }
            });
        });


        function seenOrder() {
            $.ajax({
                url: "controllers/xuly_order.php",
                method: "POST",
                data: {
                    check: "updateOrder"
                },
                success: function(data) {
                    $("body").append(data);
                }
            });
        }

        setInterval(seenOrder, 2000);
    </script>