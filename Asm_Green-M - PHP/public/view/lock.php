<?php
    if(isset($_SESSION['83x86']) && $_SESSION['83x86']['account_notify'] == "") {
        header('location: index.php');
    } else if(!isset($_SESSION['83x86'])) {
        header('location: index.php');
    }
?>
<style>
    header {
        opacity: 0;
    }
    
    .footer {
        opacity: 0;
    }

    .credit{
        opacity: 0;
    }

    #popup {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        width: 400px;
        background-color: #ffffff;
        opacity: 1;
        z-index: 9999999;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
    }

    .container {
        padding: 20px;
        border-radius: 10px;
        background-color: #0099ff;
    }

    #header {
        background-color: #ffffff;
        padding: 20px;
        text-decoration: underline red;
    }

    #content {
        padding: 20px;
        font-size: 14px;
    }

    #footer {
        background-color: #ffffff;
        padding: 20px;
        padding-bottom: 50px;
    }

    .close {
        color: #ffffff;
        background-color: #ff0000;
        font-size: 16px;
        border-radius: 50%;
        padding: 10px;
        cursor: pointer;
    }
</style>
<div id="popup">
    <div id="header">
        <h2>Thông báo từ admin</h2>
    </div>
    <div id="content">
        <p>
        Xin chào <b><?=$_SESSION['83x86']['account_name']?></b>, Tài khoản của bạn đã bị Khóa. <br> Lí Do: <span style="color: red;"><?=$_SESSION['83x86']['account_notify']?>!</span><br>Nếu muốn kháng cáo, Liên hệ Page: <b>Green-M</b>
        </p>
    </div>
    <div id="footer">
        <a class="close loadkkk" href="index.php?act=logout&checkkkk=">Đăng xuất</a>
        <a href="https://www.facebook.com/GreenM8386/" class="close" target="_blank">Liên hệ</a>
    </div>
</div>