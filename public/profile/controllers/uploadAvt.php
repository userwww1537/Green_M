<?php
    require_once '../model/account.php';
    extract($_REQUEST);
    $acc = new acc_lass();
    $image = $_FILES['image']['name'];
    $tmp = $_FILES['image']['tmp_name'];
    $path = 'view/images/account/' . $image;
    move_uploaded_file($tmp, '../../' . $path);
    $acc->change_avt($path);
?>