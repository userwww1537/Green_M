<?php
    if(session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    if (file_exists('../../app/mailer.php')) {
        require "../../app/mailer.php";
    }
    extract($_REQUEST);
    $mail = new Mailer();

    if(isset($check)) {
        if($check == 'verifyMail') {
            $code = substr(rand(0, 999999), 0, 6);
            $_SESSION['verified_mail']['code'] = $code;
            $title = "Green-M -> Xác thực E-Mail";
            $content = "<h1>Bạn muốn xác thực email?</h1> <br> <b>Ấn vào<a href='http://localhost/DuAn1/Asm_Green-M%20-%20PHP/public/profile/index.php?forgot=$code'> Liên Kết </a>để xác minh tài khoản</b>: <span style='color: green;'></span>";
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
                    <p>Gửi thư xác thực email thành công!.</p>
                    <span>- Success -</span>
                    <a href="../index.php" class="close">X</a>
                    </div>
                </div>
            ';
        }
    }
?>