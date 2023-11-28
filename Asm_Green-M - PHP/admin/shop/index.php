<?php 
    session_start();
    extract($_REQUEST);
    include_once 'view/header.php';
    include_once "model/account.php";
    include_once "model/message.php";
    include_once "model/order.php";
    include_once "model/rate.php";
    include_once "model/product.php";
    include_once "model/category.php";
    $product = new product_lass();
    $message = new mess_lass();
    $account = new account_lass();
    $order = new order_lass();
    $cate = new cate_lass();
    $rate = new rate_lass();
    if(isset($act)){
        switch ($act){
            case 'product':
                $show = $product->show_product();
                include_once 'view/product.php';
                break;
            case 'shop':
                $show = $account->show_shop();
                include_once 'view/shop.php';
                break;
            case 'review':
                $show = $rate->show_rate();
                include_once 'view/cate.php';
                break;
            case 'order':
                $show = $order->show__order();
                include_once 'view/order.php';
                break;
            case 'doanhthu':
                $count = $order->show_order();
                $show = $order->show_doanhthu();
                include_once 'view/doanhthu.php';
                break;
            default:
                $show_product = $product->show_product();
                $show_mess = $message->show_mess();
                $show_order = $order->show_order_home();
                $show_shop = $account->show_shop();
                $show_account = $account->show_account();
                include_once 'view/home.php';
                break;
        }
    } else {
        $show_product = $product->show_product();
        $show_order = $order->show_order_home();
        $show_mess = $message->show_mess();
        $show_shop = $account->show_shop();
        $show_account = $account->show_account();
        include_once 'view/home.php';
    }
    include_once 'view/footer.php';
?>