<div class="box-order">

    <div class="header-order">
        <div class="head-link" id="active-link-order">
            <a href="">Tất cả <?php if($countOrder['total_orders'] > 0) {
                echo ' <span style="color: red;">('. $countOrder['total_orders'] .')</span>';
            } ?></a>
        </div>
        <div class="head-link">
            <a href="">Đang chờ duyệt<?php 
                $countOrderSelect = $order->countOrderSelect('Đang chờ duyệt');
                if($countOrderSelect['total_orders'] > 0) {
                echo ' <span style="color: red;">('. $countOrderSelect['total_orders'] .')</span>';
            } ?></a>
        </div>
        <div class="head-link">
            <a href="">Đã duyệt<?php 
                $countOrderSelect = $order->countOrderSelect('Đã duyệt');
                if($countOrderSelect['total_orders'] > 0) {
                echo ' <span style="color: red;">('. $countOrderSelect['total_orders'] .')</span>';
            } ?></a>
        </div>
        <div class="head-link">
            <a href="">Đang đóng gói<?php 
                $countOrderSelect = $order->countOrderSelect('Đang đóng gói');
                if($countOrderSelect['total_orders'] > 0) {
                echo ' <span style="color: red;">('. $countOrderSelect['total_orders'] .')</span>';
            } ?></a>
        </div>
        <div class="head-link">
            <a href="">Đang giao hàng<?php 
                $countOrderSelect = $order->countOrderSelect('Đang giao hàng');
                if($countOrderSelect['total_orders'] > 0) {
                echo ' <span style="color: red;">('. $countOrderSelect['total_orders'] .')</span>';
            } ?></a>
        </div>
        <div class="head-link">
            <a href="">Giao hàng thành công<?php 
                $countOrderSelect = $order->countOrderSelect('Giao thành công');
                if($countOrderSelect['total_orders'] > 0) {
                echo ' <span style="color: red;">('. $countOrderSelect['total_orders'] .')</span>';
            } ?></a>
        </div>
        <div class="head-link">
            <a href="">Đã hủy<?php 
                $countOrderSelect = $order->countOrderSelect('Đã hủy');
                if($countOrderSelect['total_orders'] > 0) {
                echo ' <span style="color: red;">('. $countOrderSelect['total_orders'] .')</span>';
            } ?></a>
        </div>
    </div>

    <div class="search-order">
        <form action="" method="post">
            <input type="text" id="search-input-order" placeholder="Bạn có thể tìm kiếm theo tên shop, ID đơn hàng hoặc Tên sản phẩm" name="search">
            <button type="submit"><i class="far fa-search"></i></button>
        </form>
    </div>

    <div class="box-orders">
        <?php 
            foreach($show as $items) {
                extract($items);
                echo '
                    <div class="show-orders">
                        <div class="order-phandau">
                            <div class="show-info-shop">
                                <i class="fas fa-store-alt"></i>
                                <div id="parent-info">'. $account_name .'</div>
                                <div id="parent-info"><a href="../?act=mess_chat&from='.$_SESSION['83x86']['account_id'].'&to='.$shop_id.'">Chat</a></div>
                            </div>
                            <div class="show-status-shop">
                                <i class="fas fa-box-open"></i>
                                <div id="parent-status">
                                    <span>ORDER-'. $order_id .'</span>
                                </div>
                                <div id="parent-status">|</div>
                                <div id="parent-status">'. $order_status .'</div>
                            </div>
                        </div>
                        <hr align="center">
                            '; $showDetails = $order->showOrderDetails($order_id); 
                                foreach($showDetails as $jtems) {
                                    extract($jtems);
                                    echo '
                                        <div class="order-phanthan">
                                            <a href="?brief=orderDetails&orderID='. $order_id .'">
                                                <div class="order-item">
                                                    <div class="item-part1">
                                                        <div class="item-img"><img width="50px" src="../'. $details_img .'" alt=""></div>
                                                        <div class="content">
                                                            <div class="concept parent-content">
                                                                <span style="font-size: 17px;">'. $details_name .'</span>
                                                                <div style="font-size: 15px;" class="qty parent-content">x'. $details_qty .'</div>
                                                            </div>
                                                            <div class="return parent-content">7 ngày trả hàng</div>
                                                        </div>
                                                    </div>
                                                    <div class="item-part2">$'. $details_price .'</div>
                                                </div>
                                            </a>
                                            <hr align="center">
                                        </div>
                                    ';
                                }
                            echo '
                        <div class="order-phancuoi">
                            <div class="total-order">Thành tiền: <span>$'. $order_total .'</span></div>
                            <div class="tongquan">
                                <div class="status-cuoi">';
                                    if($order_status == 'Đang chờ duyệt') {
                                        echo 'Bạn vui lòng đợi shop duyệt đơn nhé!';
                                    } else if($order_status == 'Đã duyệt') {
                                        echo 'Shop đã duyệt, đang trong quá trình đóng đơn!';
                                    } else if($order_status == 'Đang đóng gói') {
                                        echo 'Đang đóng gói sản phẩm!';
                                    } else if($order_status == 'Đang giao hàng') {
                                        echo 'Đơn hàng đã được giao đi, thời gian từ 1-5 ngày!';
                                    }  else if($order_status == 'Giao thành công') {
                                        echo 'Bạn có cảm thấy hài lòng? <a href="?brief=orderDetails&orderID='. $order_id .'">Đánh giá ngay</a>!';
                                    } else {
                                        if($order_cancel == 1) {
                                            echo 'Đã bị hủy bởi bạn';
                                        } else if($order_cancel == 2) {
                                            echo 'Đã bị hủy bởi Shop';
                                        }
                                    }
                                echo '</div>
                                <div class="right">
                                    <div class="parent-right"><a href="?brief=orderDetails&orderID='. $order_id .'">Chi tiết</a></div>
                                    <div class="parent-right"><a href="../?act=mess_chat&from='.$_SESSION['83x86']['account_id'].'&to='.$shop_id.'">Liên hệ người bán</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                ';
            }
        ?>
    </div>
</div>