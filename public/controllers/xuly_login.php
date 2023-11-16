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
    if(isset($reg_account)) {
        $account->add_account($fullName, $username, $email, $password);
    } else if(isset($log_account)) {    
        $chua = $account->log_account($username, $username, $password);
        if ($chua > 0) {
            $_SESSION['83x86'] = $chua;
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
                <script>
                    window.location.href = "../index.php?act=profile";
                </script>
            ';
        } else {
            $check = "notImg";
            $account->update_info_account($Fullname, $sex, $address, $duongdan, $username, $email, $phone, $position, $_SESSION['83x86']['account_id'], $check);
            echo '
                <script>
                    window.location.href = "../index.php?act=profile";
                </script>
            ';
        }
    } else if(isset($account_id_up_auto)) {
        $_SESSION['83x86'] = $account->update_cookie_ses($_COOKIE['accountsave']);
    } else if(isset($saveinfoPay)) {
        $account_number_pay = $account_number_pay_one . $account_number_pay_two . $account_number_pay_three . $account_number_pay_four;
        if($account_pay_other != "") {
            $account->change_info_pay($account_number_pay, $account_pay_other);
        } else {
            $account->change_info_pay($account_number_pay, $account_pay);
        }
        header('location: ../index.php?act=profile');
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
                    <script>
                        alert("Đã gửi mã!");
                        window.location.href = "../index.php?act=forgot_pass";
                    </script>
                ';
            } else {
                echo '
                    <script>
                        alert("Email không trùng khớp!");
                        window.location.href = "../index.php?act=forgot_pass";
                    </script>
                ';
            }
        }
    } else if(isset($send_code_forgot)) {
        if($_SESSION['forgot_pass']['code'] == $code) {
            $_SESSION['forgot_pass']['done'] = "True";
            echo '
                <script>
                    alert("Xác thực thành công!");
                    window.location.href = "../index.php?act=forgot_pass";
                </script>
            ';
        } else {
            echo '
                <script>
                    alert("Mã xác thực không trùng khớp!");
                    window.location.href = "../index.php?act=forgot_pass";
                </script>
            ';
        }
    } else if(isset($send_pass_forgot)) {
        $account->forgot_pass_account($pass, $_SESSION['forgot_pass']['email']);
        unset($_SESSION['forgot_pass']);
        echo '
            <script>
                alert("Đổi mật khẩu thành công!");
                window.location.href = "../index.php";
            </script>
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
            <script>
                alert("Gửi mã thành công!");
                window.location.href = "../index.php?act=profile";
            </script>
        ';
    } else if(isset($btn_verified_mail)) {
        $status = "Đã xác thực";
        if($code_verified == $_SESSION['verified_mail']['code']) {
            $account->verified_mail($status, $_SESSION['verified_mail']['email']);
            unset($_SESSION['verified_mail']);
            echo '
                <script>
                    alert("Xác minh thành công!");
                    window.location.href = "../index.php?act=profile";
                </script>
            ';
        } else {
            echo '
                <script>
                    alert("Mã không đúng!");
                    window.location.href = "../index.php?act=profile";
                </script>
            ';
        }
    }

    if(isset($check) && $check == "change_pass") {
        $account->change_pass_account($pass_new, $pass_old);
    }
?>