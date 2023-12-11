<?php
    session_start();
    ob_start();
    extract($_REQUEST);
    require_once 'model/order.php';
    include 'view/header.php';
    
    if(isset($_SESSION['83x86']) && $_SESSION['83x86']['account_status'] != 'Khóa') {
        echo '
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <script>
            function checkOnlineStatus() {
            if (navigator.onLine) {
                $.ajax({
                    url: "controllers/xuly_account.php",
                    method: "POST",
                    data: {
                        check: "Online"
                    }
                });
            } else {
                $.ajax({
                    url: "controllers/xuly_account.php",
                    method: "POST",
                    data: {
                        check: "Offline"
                    }
                });
            }
            }

            window.addEventListener("load", checkOnlineStatus);

            window.addEventListener("beforeunload", function () {
                $.ajax({
                    url: "controllers/xuly_account.php",
                    method: "POST",
                    data: {
                        check: "Offline"
                    }
                });
            });
        </script>
        ';
    }

    $order = new order_lass();

    if(isset($brief)) {
        switch($brief) {
            case 'changePass':
                include 'view/changePass.php';
                break;
            case 'settings':
                include 'view/settings.php';
                break;
            case 'orderDetails':
                if(isset($orderID)) {
                    $showAll = $order->showOrderDetails($orderID);
                    $showOne = $order->showOrderDetail($orderID);
                } else {
                    header('location: ?brief=orderMe');
                }
                include 'view/orderDetails.php';
                break;
            case 'orderMe':
                $countOrder = $order->countOrder();
                $show = $order->showOrder();
                if(isset($timKiem)) {
                    $showSearch = $order->showSearch($search);
                }
                include 'view/orderMe.php';
                break;
            default:
                $countOrder = $order->countOrder();
                include 'view/home.php';
                break;
        }
    } else {
        $countOrder = $order->countOrder();
        include 'view/home.php';
    }
    include 'view/footer.php';
?>