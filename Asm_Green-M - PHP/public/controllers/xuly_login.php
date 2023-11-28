<?php
    if(session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    ob_start();
    if (file_exists('../model_dao/account.php')) {
        require "../model_dao/account.php";
    }
    if (file_exists('../app/mailer.php')) {
        require "../app/mailer.php";
    }
    $mail = new Mailer();
    extract($_REQUEST);
    $account = new account_lass();
    if(isset($account_id_up_auto)) {
        $_SESSION['83x86'] = $account->update_cookie_ses($_SESSION['83x86']['account_id']);
    }
    if(isset($reg_account)) {
        $account->add_account($fullName, $username, $email, $password);
    } else if(isset($log_account)) {    
        $chua = $account->log_account($username, $username, $password);
        if ($chua > 0) {
            $_SESSION['83x86'] = $chua;
            setcookie("accountsave", $_SESSION['83x86']['account_id'], time() + (86000*7));
            $account->update_status("Online", $chua['account_id']);
            $response = array(
            'success' => true,
            'message' => 'Đăng nhập thành công!'
            );
        } else {
            $response = array(
            'success' => false,
            'message' => 'Thông tin đăng nhập không chính xác!'
            );
        }
        echo json_encode($response);
    } else if(isset($saveinfoAccount)) {
        $images = $_FILES['image']['name'];
        $fileTmp = $_FILES['image']['tmp_name'];
        $duongdan = "../view/images/account/" . $images;
        if($vaitro == 1) {
            $position = "Shop";
        } else {
            $position = "Khách hàng";
        }
        if(move_uploaded_file($fileTmp, $duongdan)) {
            $check = "haveImg";
            $duongdan = "view/images/account/" . $images;
            $account->update_info_account($Fullname, $sex, $address, $duongdan, $username, $email, $phone, $position, $_SESSION['83x86']['account_id'], $check);
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
                    <p>Cập nhật thông tin thành công!.</p>
                    <span>- Success -</span>
                    <a href="../index.php?act=profile" class="close">X</a>
                    </div>
                </div>
            ';
        } else {
            $check = "notImg";
            $account->update_info_account($Fullname, $sex, $address, $duongdan, $username, $email, $phone, $position, $_SESSION['83x86']['account_id'], $check);
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
                    <p>Cập nhật thông tin thành công!.</p>
                    <span>- Success -</span>
                    <a href="../index.php?act=profile" class="close">X</a>
                    </div>
                </div>
            ';
        }
    } else if(isset($saveinfoPay)) {
        $account_number_pay = $account_number_pay_one . $account_number_pay_two . $account_number_pay_three . $account_number_pay_four;
        if($account_pay_other != "") {
            $account->change_info_pay($account_number_pay, $account_pay_other);
        } else {
            $account->change_info_pay($account_number_pay, $account_pay);
        }
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
                <p>Cập nhật phương thức thanh toán thành công!.</p>
                <span>- Success -</span>
                <a href="../index.php?act=profile" class="close">X</a>
                </div>
            </div>
        ';
    } else if(isset($send_mail_forgot)) {
        if($email != "") {
            $ketqua = $account->forgot_password($email);
            if($ketqua > 0) {
                $code = substr(rand(0, 999999), 0, 6);
                $_SESSION['forgot_pass'] = array(
                    'code' => $code,
                    'email' => $email
                );
                $title = "Green-M -> Quên mật khẩu";
                $content = "<h1>Bạn muốn đổi mật khẩu?</h1> <br> <b>Mã xác nhận của bạn là</b>: <span style='color: green;'>$code</span>";
                $mail->sendMail($title, $content, $email);
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
                        <p>Đã gửi mã!.</p>
                        <span>- Success -</span>
                        <a href="../index.php?act=forgot_pass" class="close">X</a>
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
                        <p>Gửi mã không thành công, Email không trùng khớp!.</p>
                        <span>- Error -</span>
                        <a href="../index.php?act=forgot_pass" class="close">X</a>
                        </div>
                    </div>
                ';
            }
        }
    } else if(isset($send_code_forgot)) {
        if($_SESSION['forgot_pass']['code'] == $code) {
            $_SESSION['forgot_pass']['done'] = "True";
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
                    <p>Xác minh thành công!.</p>
                    <span>- Success -</span>
                    <a href="../index.php?act=forgot_pass" class="close">X</a>
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
                    <p>Xác minh thất bại, mã xác minh không trùng khớp!.</p>
                    <span>- Error -</span>
                    <a href="../index.php?act=forgot_pass" class="close">X</a>
                    </div>
                </div>
            ';
        }
    } else if(isset($send_pass_forgot)) {
        $account->forgot_pass_account($pass, $_SESSION['forgot_pass']['email']);
        unset($_SESSION['forgot_pass']);
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
                <p>Đổi mật khẩu thành công!.</p>
                <span>- Success -</span>
                <a href="../index.php" class="close">X</a>
                </div>
            </div>
        ';
    } else if(isset($btn_send_code_verified_mail)) {
        $code = substr(rand(0, 999999), 0, 6);
        $_SESSION['verified_mail'] = array(
            'code' => $code,
            'email' => $_SESSION['83x86']['account_email']
        );
        $title = "Green-M -> Xác thực E-Mail";
        $content = "<h1>Mã xác thực xác thực E-Mail?</h1> <br> <b>Mã xác nhận của bạn là</b>: <span style='color: green;'>$code</span>";
        $mail->sendMail($title, $content, $_SESSION['83x86']['account_email']);
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
                <p>Gửi mã thành công!.</p>
                <span>- Success -</span>
                <a href="../index.php?act=profile" class="close">X</a>
                </div>
            </div>
        ';
    } else if(isset($btn_verified_mail)) {
        $status = "Đã xác thực";
        if($code_verified == $_SESSION['verified_mail']['code']) {
            $account->verified_mail($status, $_SESSION['verified_mail']['email']);
            unset($_SESSION['verified_mail']);
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
                    <p>Xác minh E-Mail thành công!.</p>
                    <span>- Success -</span>
                    <a href="../index.php?act=profile" class="close">X</a>
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
                    <p>Xác minh E-Mail thất bại, mã không trùng khớp!.</p>
                    <span>- Error -</span>
                    <a href="../index.php?act=profile" class="close">X</a>
                    </div>
                </div>
            ';
        }
    } else if(isset($feedback)) {
        $title_sent_user = "Green-M -> Cảm ơn bạn đã gửi FeedBack";
        $content_sent_user = '
            <h1>Chào '. $nameUser .'!</h1>
            <br>
            <h5>Cảm ơn bạn đã gửi FeedBack, chúng tôi sẽ trả lời sau khi đọc được tin nhắn!</h3>
            <br>
            <a href="https://www.facebook.com/GreenM8386/" target="_blank">Hỗ trợ nhanh</a>
        ';
        $mail->sendMail($title_sent_user, $content_sent_user, $mailUser);
        $title_sent_server = "$nameUser -> $titleUser";
        $content_sent_server = '
            <h1>Họ và tên: '. $nameUser .'!</h1>
            <br>
            <h1>Email: '. $mailUser .'!</h1>
            <br>
            <h1>Phone: '. $phoneUser .'!</h1>
            <br>
            <h5>'. $contentUser .'</h3>
            <br>
        ';
        $mail->sendMail($title_sent_server, $content_sent_server, "hotro.greenm@gmail.com");
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
                <p>Cảm ơn bạn đã gửi FeedBack, thư đã được nhận!.</p>
                <span>- Success -</span>
                <a href="../index.php?act=contact" class="close">X</a>
                </div>
            </div>
        ';
    }

    if(isset($check) && $check == "change_pass") {
        $account->change_pass_account($pass_new, $pass_old);
    } else if(isset($check) && $check == "close-noti-update") {
        $account->update_noti();
    } else if(isset($check) && $check == "checkUsernameReg") {
        $ketqua = $account->check_username($input);
        if($ketqua > 0) {
            echo '<div class="verified_username_reg" style="color: red;">Username đã tồn tại!</div>';
        }
    } else if(isset($check) && $check == "checkEmailReg") {
        $ketqua = $account->check_email($input);
        if($ketqua > 0) {
            echo '<div class="verified_email_reg" style="color: red;">Email đã tồn tại!</div>';
        }
    }

    if(isset($cancel_info)) {
        header('location: ../index.php?act=profile');
    }
?>