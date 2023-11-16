<?php 
    extract($_REQUEST);
    include_once 'view/header.php';
    if(isset($act)){
        switch ($act){
            case 'user':
                include_once 'view/user.php';
                break;
            case 'shop':
                include_once 'view/shop.php';
                break;
            case 'cate':
                include_once 'view/cate.php';
                break;
            case 'order':
                include_once 'view/order.php';
                break;
            case 'logout':
                break;
            default:
                include_once 'view/home.php';
                break;

        }

    }
    else{
        include_once 'view/home.php';
    }
    include_once 'view/footer.php';
?>