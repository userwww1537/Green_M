<?php
    extract($_REQUEST);
    session_start();
    ob_start();
    include_once "controllers/cookie_account.php";
    include_once "view/header.php";
    include_once "model_dao/new.php";
    include_once "model_dao/product.php";
    include_once "model_dao/category.php";
    include_once "model_dao/discount_code.php";
    $new = new new_lass();
    $product = new product_lass();
    $category = new category_lass();
?>
<?php
    if(isset($act)) {
        switch($act) {
            case 'shop':
                $phantrang = $product->show_product_home();
                $show_left_shop = $product->show_product_home();
                if(isset($start)) {
                    $show_product_shop = $product->show_product_shop($start);
                }
                $show_category_shop = $category->show_category_home();
                include_once "view/shop.php";
                break;
            case 'contact':
                include_once "view/contact.php";
                break;
            case 'about':
                include_once "view/about.php";
                break;
            case 'blog':
                $phantrang = $new->show_new();
                if(isset($start)) {
                    $show_page = $new->show_phantrang($start);
                }
                include_once "view/blog.php";
                break;
            case 'detail':
                if(isset($product_id) && isset($category)) {
                    $show_same = $product->show_product_home();
                    $show = $product->show_product_detail($product_id);
                } else {
                    header('location: index.php');
                }
                include_once "view/detail.php";
                break;
            case 'cart':
                if(isset($_SESSION['83x86'])) {
                    include_once "model_dao/cart.php";
                    $cart = new cart_lass();
                    $show_cart_log = $cart->show_cart($_SESSION['83x86']['account_id']);
                }
                include_once "view/cart.php";
                break;
            case 'profile':
                include_once "model_dao/order.php";
                $order = new order_lass();
                $show_order_me = $order->show_order_me();
                include_once "view/profile.php";
                break;
            case 'message':
                if(isset($_SESSION['83x86'])) {
                    include_once "model_dao/message.php";
                    $mess = new mess_lass();

                    $show_mess_to = $mess->show_mess_to($_SESSION['83x86']['account_id']);
                    $show_mess_from = $mess->show_mess_from($_SESSION['83x86']['account_id']);
                }
                include_once "view/message.php";
                break;
            case 'mess_chat':
                if(isset($_SESSION['83x86'])) {
                    include_once "model_dao/message.php";
                    $mess = new mess_lass();

                    $show_mess_info = $mess->show_mess_info($to);
                }
                include_once "view/mess_chat.php";
                break;
            case 'xuly_Cart':
                include_once "controllers/xuly_cart.php";
                break;
            case 'xuly_order':
                include_once "controllers/xuly_order.php";
                break;
            case 'logout':
                include_once "controllers/logout.php";
                break;
            case 'forgot_pass':
                include_once "view/forgot_pass.php";
                break;
            case 'noti':
                include_once "view/noti.php";
                break;
            case 'lock':
                include_once "view/lock.php";
                break;
            default:
                $show_product_home = $product->show_product_home();
                $show_product_top = $product->show_product_top();
                $show_category_home = $category->show_category_home();
                include_once "view/home.php";
                break;
        }
    } else {
        $show_product_home = $product->show_product_home();
        $show_product_top = $product->show_product_top();
        $show_category_home = $category->show_category_home();
        include_once "view/home.php";
    }
    include_once "view/footer.php";
?>