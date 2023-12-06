<?php
if(isset($_SESSION['delCookie']) && $_SESSION['delCookie'] == True) {
    setcookie("accountsave", "true", time() - (86000*7));
    unset($_COOKIE['accountsave']);
    unset($_SESSION['83x86']);
    unset($_SESSION['delCookie']);
}

if (isset($_COOKIE['accountsave']) && $_COOKIE['accountsave'] != "true" && !isset($_SESSION['83x86'])) {
    include_once "model_dao/account.php";
    $a = new account_lass();
    $_SESSION['83x86'] = $a->update_cookie_ses($_COOKIE['accountsave']);
}

if (isset($_SESSION['83x86']) && !isset($_COOKIE['accountsave'])) {
    $chua = $_SESSION['83x86']['account_id'];
    setcookie("accountsave", $chua, time() + (86400 * 7));
}

if (isset($_SESSION['83x86'])) {
    include_once "model_dao/account.php";
    $a = new account_lass();
    $_SESSION['83x86'] = $a->update_cookie_ses($_SESSION['83x86']['account_id']);
}
?>

<script>
    if ('Notification' in window) {
        if (Notification.permission !== 'granted') {
            Notification.requestPermission().then(function(permission) {
            if (permission === 'granted') {
                console.log('Quyền truy cập thông báo đã được cấp!');
            } else {
                console.log('Quyền truy cập thông báo không được cấp!');
            }
            });
        }
    }
</script>