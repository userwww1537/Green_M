<?php 
    session_start();
    extract($_REQUEST);
    include_once 'view/header.php';
    include_once "model/account.php";
    include_once "model/order.php";
    include_once "model/product.php";
    $product = new product_lass();
    $account = new account_lass();
    $order = new order_lass();
    if(isset($act)){
        switch ($act){
            case 'user':
                $show = $account->show_account();
                include_once 'view/user.php';
                break;
            case 'shop':
                $show = $account->show_shop();
                include_once 'view/shop.php';
                break;
            case 'cate':
                include_once 'view/cate.php';
                break;
            case 'order':
                $show = $order->show_order();
                include_once 'view/order.php';
                break;
            case 'logout':
                break;
            default:
                $show_product = $product->show_product();
                $show_order = $order->show_order();
                $show_shop = $account->show_shop();
                $show_account = $account->show_account();
                include_once 'view/home.php';
                break;
        }
    } else {
        $show_product = $product->show_product();
        $show_order = $order->show_order();
        $show_shop = $account->show_shop();
        $show_account = $account->show_account();
        include_once 'view/home.php';
    }
    include_once 'view/footer.php';
?>