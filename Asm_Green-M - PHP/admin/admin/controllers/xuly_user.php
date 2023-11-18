<?php
    ob_start();
    extract($_REQUEST);
    if(session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    if (file_exists('../model/account.php')) {
        require "../model/account.php";
    }
    if (file_exists('../../app/mailer.php')) {
        require "../../app/mailer.php";
    }
    $mail = new Mailer();
    $account = new account_lass();

    if(isset($check) && $check == "sent_mess") {
        $title = "Green-M -> Thông báo tới bạn!";
        $content = "<h1>$mess</h1>";
        $mail->sendMail($title, $content, $account_email);
        $account->sent_notify($mess, $account_id);
    } else if(isset($check) && $check == "sent_lock") {
        $account->sent_lock("Khóa", $lido, $account_id);
    }
?>