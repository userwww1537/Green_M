<?php
if (isset($_SESSION['83x86'])) {
?>
    <script>
        function load() {
            $.ajax({
                url: "../controllers/xuly_login.php",
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
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hồ sơ cá nhân - GreenM</title>
    <link rel="stylesheet" href="view/style.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />
    <link rel="shortcut icon" href="../<?=$_SESSION['83x86']['account_avt']?>" type="image/x-icon">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</head>

<body>
    <div class="navbar-top">
        <div class="title">
            <h1>Green-M</h1>
        </div>

        <ul>
            <li>
                <a href="#message">
                    <span class="icon-count">29</span>
                    <i class="fa fa-envelope fa-2x"></i>
                </a>
            </li>
            <li>
                <a href="#notification">
                    <span class="icon-count">59</span>
                    <i class="fa fa-bell fa-2x"></i>
                </a>
            </li>
            <li>
                <a href="../">
                    <i class="fa fa-sign-out-alt fa-2x"></i>
                </a>
            </li>
        </ul>
    </div>
    <div class="sidenav">
        <div class="profile">
            <form id="myForm" method="POST" enctype="multipart/form-data">
                <input type="file" name="image" id="image" style="display:none;">
                <input type="hidden" name="uploadAvt">
                <i class="fa fa-pen fa-xs edit iconAvt" onclick="chooseImage()"></i>
            </form>

        <script>
            function chooseImage() {
                document.getElementById('image').click();
            }

            document.getElementById('image').addEventListener('change', function () {
                var formData = new FormData(document.getElementById('myForm'));

                var xhr = new XMLHttpRequest();
                xhr.open('POST', 'controllers/uploadAvt.php', true);
                xhr.onload = function () {
                    if (xhr.status === 200) {
                        location.reload();
                    }
                };
                xhr.send(formData);
            });
        </script>
            <img src="../<?=$_SESSION['83x86']['account_avt']?>" alt width="100" height="100">

            <div class="name">
                <?=$_SESSION['83x86']['account_name']?>
            </div>
            <div class="job">
                <?=$_SESSION['83x86']['account_position']?>
            </div>
        </div>

        <div class="sidenav-url">
            <?php
                if(isset($brief)) {
                    if($brief == 'changePass') {
                        echo '
                            <div class="url">
                                <a href="?brief=info">Hồ sơ</a>
                                <hr align="center">
                            </div>
                            <div class="url">
                                <a href="?brief=changePass" class="active">Đổi mật khẩu</a>
                                <hr align="center">
                            </div>
                            <div class="url">
                                <a href="?brief=orderMe">Đơn mua</a>
                                <hr align="center">
                            </div>
                            ';
                            if(isset($_SESSION['83x86']) && $_SESSION['83x86']['account_position'] == 'Khách hàng') {
                                echo '
                                    <div class="url">
                                        <a href="?brief=settings">Cài đặt</a>
                                        <hr align="center">
                                    </div>
                                ';
                            }
                    } else if($brief == 'orderMe') {
                        echo '
                            <div class="url">
                                <a href="?brief=info">Hồ sơ</a>
                                <hr align="center">
                            </div>
                            <div class="url">
                                <a href="?brief=changePass">Đổi mật khẩu</a>
                                <hr align="center">
                            </div>
                            <div class="url">
                                <a href="?brief=orderMe" class="active">Đơn mua</a>
                                <hr align="center">
                            </div>
                            ';
                            if(isset($_SESSION['83x86']) && $_SESSION['83x86']['account_position'] == 'Khách hàng') {
                                echo '
                                    <div class="url">
                                        <a href="?brief=settings">Cài đặt</a>
                                        <hr align="center">
                                    </div>
                                ';
                            }
                    } else if($brief == 'orderDetails') {
                        echo '
                            <div class="url">
                                <a href="?brief=info">Hồ sơ</a>
                                <hr align="center">
                            </div>
                            <div class="url">
                                <a href="?brief=changePass">Đổi mật khẩu</a>
                                <hr align="center">
                            </div>
                            <div class="url">
                                <a href="?brief=orderMe" class="active">Đơn mua</a>
                                <hr align="center">
                            </div>
                            ';
                            if(isset($_SESSION['83x86']) && $_SESSION['83x86']['account_position'] == 'Khách hàng') {
                                echo '
                                    <div class="url">
                                        <a href="?brief=settings">Cài đặt</a>
                                        <hr align="center">
                                    </div>
                                ';
                            }
                    } else if($brief == 'settings') {
                        echo '
                            <div class="url">
                                <a href="?brief=info">Hồ sơ</a>
                                <hr align="center">
                            </div>
                            <div class="url">
                                <a href="?brief=changePass">Đổi mật khẩu</a>
                                <hr align="center">
                            </div>
                            <div class="url">
                                <a href="?brief=orderMe">Đơn mua</a>
                                <hr align="center">
                            </div>
                            ';
                            if(isset($_SESSION['83x86']) && $_SESSION['83x86']['account_position'] == 'Khách hàng') {
                                echo '
                                    <div class="url">
                                        <a href="?brief=settings" class="active">Cài đặt</a>
                                        <hr align="center">
                                    </div>
                                ';
                            }
                    } else {
                        echo '
                            <div class="url">
                                <a href="?brief=info" class="active">Hồ sơ</a>
                                <hr align="center">
                            </div>
                            <div class="url">
                                <a href="?brief=changePass">Đổi mật khẩu</a>
                                <hr align="center">
                            </div>
                            <div class="url">
                                <a href="?brief=orderMe">Đơn mua</a>
                                <hr align="center">
                            </div>
                            ';
                            if(isset($_SESSION['83x86']) && $_SESSION['83x86']['account_position'] == 'Khách hàng') {
                                echo '
                                    <div class="url">
                                        <a href="?brief=settings">Cài đặt</a>
                                        <hr align="center">
                                    </div>
                                ';
                            }
                    }
                } else {
                    echo '
                        <div class="url">
                            <a href="?brief=info" class="active">Hồ sơ</a>
                            <hr align="center">
                        </div>
                        <div class="url">
                            <a href="?brief=changePass">Đổi mật khẩu</a>
                            <hr align="center">
                        </div>
                        <div class="url">
                            <a href="?brief=orderMe">Đơn mua</a>
                            <hr align="center">
                        </div>
                        ';
                        if(isset($_SESSION['83x86']) && $_SESSION['83x86']['account_position'] == 'Khách hàng') {
                            echo '
                                <div class="url">
                                    <a href="?brief=settings">Cài đặt</a>
                                    <hr align="center">
                                </div>
                            ';
                        }
                }
            ?>
            <?php
                if($_SESSION['83x86']['account_position'] == 'Quản trị viên') {
                    echo '
                        <div class="url">
                            <a href="../../admin/admin">Truy Cập <b>Admin</b></a>
                            <hr align="center">
                        </div>
                    ';
                } else if($_SESSION['83x86']['account_position'] == 'Shop') {
                    echo '
                        <div class="url">
                            <a href="../../admin/shop">Truy Cập <b>Shop</b></a>
                            <hr align="center">
                        </div>
                    ';
                }
            ?>
        </div>
    </div>