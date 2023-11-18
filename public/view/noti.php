<?php
    if(isset($_SESSION['83x86']) && $_SESSION['83x86']['account_notify'] == "") {
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

    .close:hover {
        background-color: #ff3333;
    }
</style>
<div id="popup">
    <div id="header">
        <h2>Thông báo từ admin</h2>
    </div>
    <div id="content">
        <p>
        Xin chào <?=$_SESSION['83x86']['account_name']?>, <?=$_SESSION['83x86']['account_notify']?>!
        </p>
    </div>
    <div id="footer">
        <a class="close-noti-up close">Đóng</a>
    </div>
</div>

<script>
    $(".close-noti-up").on('click', function(e) {
        e.preventDefault();
        $.ajax({
            url: "controllers/xuly_login.php",
            method: "POST",
            data: {
                check: "close-noti-update"
            },
            success: function(data) {
                location.reload();
            }
        });
    });
</script>