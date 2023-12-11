<?php
    require_once '../model/account.php';
    extract($_REQUEST);
    $acc = new acc_lass();

    if(isset($changeInfo)) {
        if($_SESSION['83x86']['account_email'] == $mail) {
            $acc->change_info(0, $fullName, $address, $username, $mail, $phone);
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
                        <a href="../index.php" class="close">X</a>
                        </div>
                    </div>
                ';
        } else {
            $check = $acc->checkEmailChange($mail);
            if($check > 0) {
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
                        <p>Cập nhật thông tin thất bại, email đã có!.</p>
                        <span>- Error -</span>
                        <a href="../index.php" class="close">X</a>
                        </div>
                    </div>
                ';
            } else {
                $acc->change_info(1, $fullName, $address, $username, $mail, $phone);
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
                        <a href="../index.php" class="close">X</a>
                        </div>
                    </div>
                ';
            }
        }
    } else if(isset($changePay)) {
        if($otherBank != '') {
            $acc->change_pay($number, $otherBank);
        } else {
            $acc->change_pay($number, $payBank);
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
                <p>Cập nhật thông tin thanh toán thành công!.</p>
                <span>- Success -</span>
                <a href="../index.php" class="close">X</a>
                </div>
            </div>
        ';
    } else if(isset($changePass)) {
        if($newPassword == $confirmPassword) {
            if($currentPassword == $_SESSION['83x86']['account_pass']) {
                $acc->change_pass($currentPassword, $newPassword);
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
                        <a href="../index.php?brief=changePass" class="close">X</a>
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
                        <p>Mật khẩu cũ không đúng!.</p>
                        <span>- Error -</span>
                        <a href="../index.php?brief=changePass" class="close">X</a>
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
                    <p>Mật khẩu nhập lại không đúng!.</p>
                    <span>- Error -</span>
                    <a href="../index.php?brief=changePass" class="close">X</a>
                    </div>
                </div>
            ';
        }
    } else if(isset($acceptShop)) {
        if($sel == 1) {
            if(isset($_SESSION['83x86']) && $_SESSION['83x86']['account_verified_mail'] == 'Chưa xác thực') {
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
                        <p>Vui lòng xác thực E-Mail trước khi đăng ký nhà bán hàng!.</p>
                        <span>- Error -</span>
                        <a href="../index.php" class="close">X</a>
                        </div>
                    </div>
                ';
            } else {
                $acc->up_Shop();
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
                        <p>Đăng ký nhà bán hàng thành công!.</p>
                        <span>- Success -</span>
                        <a href="../index.php" class="close">X</a>
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
                    <p>Đăng ký nhà bán hàng không thành công!.</p>
                    <span>- Error -</span>
                    <a href="../index.php?brief=settings" class="close">X</a>
                    </div>
                </div>
            ';
        }
    } else if(isset($check) && $check == "Online") {
        $acc->update_status('Online', $_SESSION['83x86']['account_id']);
    } else if(isset($check) && $check == "Offline") {
        $acc->update_status('Offline', $_SESSION['83x86']['account_id']);
    }
?>