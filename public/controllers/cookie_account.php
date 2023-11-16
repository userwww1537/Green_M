<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<?php
if (isset($_SESSION['delCookie']) && $_SESSION['delCookie'] == True) {
    setcookie("accountsave", "false", time() + 1);
    unset($_COOKIE['accountsave']);
    unset($_SESSION['83x86']);
    unset($_SESSION['delCookie']);
}

if (isset($_COOKIE['accountsave']) && !isset($_SESSION['83x86'])) {
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
    $account = new account_lass();
    $_SESSION['83x86'] = $account->update_cookie_ses($_COOKIE['accountsave']);
}
?>