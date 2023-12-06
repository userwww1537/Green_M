<div class="box">
    <div class="box-header">
        <div><i class="fas fa-chevron-left"></i><a href="?brief=orderMe">TRỞ LẠI</a></div>
        <div class="madon">
            <p>Mã đơn hàng: ORDER-<?= $orderID ?> |</p>
            <p><?= $showOne['order_status'] ?></p>
        </div>
    </div>
    <div class="box-footer">
        <div>
            Cảm ơn bạn đã mua sắm tại GREEN-M!
        </div>
        <div>
            <a href="">LIÊN HỆ</a>
        </div>
    </div>
    <div class="vien"></div>
    <div class="box-2">
        <div class="content1">
            <div>
                <h3>Thông tin nhận hàng</h3>
            </div>
            <div class="name">
                <?= $_SESSION['83x86']['account_name'] ?>
            </div>
            <div class="phone">
                <small>
                    <?= $_SESSION['83x86']['account_phone'] ?>
                </small>
            </div>
            <div class="adress">
                <small><?= $_SESSION['83x86']['account_address'] ?></small>
            </div>
            <div class="adress">
                <small>Ghi chú: <?= $showOne['order_note'] ?></small>
            </div>
        </div>
        <div class="content2">
            <?php
            if ($showOne['order_status'] == 'Đang chờ duyệt') {
                echo '
                        <div class="reg">
                            <div class="reg-icon">
                                <i class="fas fa-check-circle" style="color:#26aa99;"></i>
                                <div class="light"></div>
                            </div>
                            <div class="reg-time">
                                <small>Giai đoạn 1</small>
                            </div>
                            <div class="reg-trangthai">
                                <small style="color: #26aa99;">Đang chờ duyệt <br> Đơn hàng chờ SHOP duyệt</small> <br>
                            </div>
                        </div>
                        <div class="reg">
                            <div class="reg-icon">
                            <i class="fad fa-times-circle" style="--fa-primary-color: #ffffff; --fa-secondary-color: #ff0000; --fa-secondary-opacity: 100;"></i>
                            </div>
                            <div class="reg-time">
                                <small>Giai đoạn 2</small>
                            </div>
                            <div class="reg-trangthai">
                                <small>Đã duyệt <br> Đơn hàng đã được duyệt, đang chờ đóng gói</small> <br>
                            </div>
                        </div>
                        <div class="reg">
                            <div class="reg-icon">
                            <i class="fad fa-times-circle" style="--fa-primary-color: #ffffff; --fa-secondary-color: #ff0000; --fa-secondary-opacity: 100;"></i>
                            </div>
                            <div class="reg-time">
                                <small>Giai đoạn 3</small>
                            </div>
                            <div class="reg-trangthai">
                                <small>Đang đóng gói <br> Đơn hàng đang được đóng gói</small> <br>
                            </div>
                        </div>
                        <div class="reg">
                            <div class="reg-icon">
                            <i class="fad fa-times-circle" style="--fa-primary-color: #ffffff; --fa-secondary-color: #ff0000; --fa-secondary-opacity: 100;"></i>
                            </div>
                            <div class="reg-time">
                                <small>Giai đoạn 4</small>
                            </div>
                            <div class="reg-trangthai">
                                <small>Đang giao hàng <br> Đơn hàng đang được vân chuyển</small> <br>
                            </div>
                        </div>
                        <div class="reg">
                            <div class="reg-icon">
                            <i class="fad fa-times-circle" style="--fa-primary-color: #ffffff; --fa-secondary-color: #ff0000; --fa-secondary-opacity: 100;"></i>
                            </div>
                            <div class="reg-time">
                                <small>Giai đoạn 5</small>
                            </div>
                            <div class="reg-trangthai">
                                <small>Giao hàng thành công <br> Đơn hàng đã giao thành công</small> <br>
                            </div>
                        </div>
                    ';
            } else if ($showOne['order_status'] == 'Đã duyệt') {
                echo '
                <div class="reg">
                <div class="reg-icon">
                    <i class="fas fa-check-circle" style="color:#26aa99;"></i>
                    <div class="light"></div>
                </div>
                <div class="reg-time">
                    <small>Giai đoạn 1</small>
                </div>
                <div class="reg-trangthai">
                    <small style="color: #26aa99;">Đang chờ duyệt <br> Đơn hàng chờ SHOP duyệt</small> <br>
                </div>
            </div>
            <div class="reg">
                <div class="reg-icon">
                <i class="fas fa-check-circle" style="color:#26aa99;"></i>
                </div>
                <div class="reg-time">
                    <small>Giai đoạn 2</small>
                </div>
                <div class="reg-trangthai">
                    <small style="color: #26aa99;">Đã duyệt <br> Đơn hàng đã được duyệt, đang chờ đóng gói</small> <br>
                </div>
            </div>
            <div class="reg">
                <div class="reg-icon">
                <i class="fad fa-times-circle" style="--fa-primary-color: #ffffff; --fa-secondary-color: #ff0000; --fa-secondary-opacity: 100;"></i>
                </div>
                <div class="reg-time">
                    <small>Giai đoạn 3</small>
                </div>
                <div class="reg-trangthai">
                    <small>Đang đóng gói <br> Đơn hàng đang được đóng gói</small> <br>
                </div>
            </div>
            <div class="reg">
                <div class="reg-icon">
                <i class="fad fa-times-circle" style="--fa-primary-color: #ffffff; --fa-secondary-color: #ff0000; --fa-secondary-opacity: 100;"></i>
                </div>
                <div class="reg-time">
                    <small>Giai đoạn 4</small>
                </div>
                <div class="reg-trangthai">
                    <small>Đang giao hàng <br> Đơn hàng đang được vân chuyển</small> <br>
                </div>
            </div>
            <div class="reg">
                <div class="reg-icon">
                <i class="fad fa-times-circle" style="--fa-primary-color: #ffffff; --fa-secondary-color: #ff0000; --fa-secondary-opacity: 100;"></i>
                </div>
                <div class="reg-time">
                    <small>Giai đoạn 5</small>
                </div>
                <div class="reg-trangthai">
                    <small>Giao hàng thành công <br> Đơn hàng đã giao thành công</small> <br>
                </div>
            </div>
                    ';
            } else if ($showOne['order_status'] == 'Đã đóng gói') {
                echo '
                <div class="reg">
                <div class="reg-icon">
                    <i class="fas fa-check-circle" style="color:#26aa99;"></i>
                    <div class="light"></div>
                </div>
                <div class="reg-time">
                    <small>Giai đoạn 1</small>
                </div>
                <div class="reg-trangthai">
                    <small style="color: #26aa99;">Đang chờ duyệt <br> Đơn hàng chờ SHOP duyệt</small> <br>
                </div>
            </div>
            <div class="reg">
                <div class="reg-icon">
                <i class="fas fa-check-circle" style="color:#26aa99;"></i>
                </div>
                <div class="reg-time">
                    <small>Giai đoạn 2</small>
                </div>
                <div class="reg-trangthai">
                    <small style="color: #26aa99;">Đã duyệt <br> Đơn hàng đã được duyệt, đang chờ đóng gói</small> <br>
                </div>
            </div>
            <div class="reg">
                <div class="reg-icon">
                <i class="fas fa-check-circle" style="color:#26aa99;"></i>
                </div>
                <div class="reg-time">
                    <small>Giai đoạn 3</small>
                </div>
                <div class="reg-trangthai">
                    <small style="color: #26aa99;">Đang đóng gói <br> Đơn hàng đang được đóng gói</small> <br>
                </div>
            </div>
            <div class="reg">
                <div class="reg-icon">
                <i class="fad fa-times-circle" style="--fa-primary-color: #ffffff; --fa-secondary-color: #ff0000; --fa-secondary-opacity: 100;"></i>
                </div>
                <div class="reg-time">
                    <small>Giai đoạn 4</small>
                </div>
                <div class="reg-trangthai">
                    <small>Đang giao hàng <br> Đơn hàng đang được vân chuyển</small> <br>
                </div>
            </div>
            <div class="reg">
                <div class="reg-icon">
                <i class="fad fa-times-circle" style="--fa-primary-color: #ffffff; --fa-secondary-color: #ff0000; --fa-secondary-opacity: 100;"></i>
                </div>
                <div class="reg-time">
                    <small>Giai đoạn 5</small>
                </div>
                <div class="reg-trangthai">
                    <small>Giao hàng thành công <br> Đơn hàng đã giao thành công</small> <br>
                </div>
            </div>
                    ';
            } else if ($showOne['order_status'] == 'Đang giao hàng') {
                echo '
                <div class="reg">
                <div class="reg-icon">
                    <i class="fas fa-check-circle" style="color:#26aa99;"></i>
                    <div class="light"></div>
                </div>
                <div class="reg-time">
                    <small>Giai đoạn 1</small>
                </div>
                <div class="reg-trangthai">
                    <small style="color: #26aa99;">Đang chờ duyệt <br> Đơn hàng chờ SHOP duyệt</small> <br>
                </div>
            </div>
            <div class="reg">
                <div class="reg-icon">
                <i class="fas fa-check-circle" style="color:#26aa99;"></i>
                </div>
                <div class="reg-time">
                    <small>Giai đoạn 2</small>
                </div>
                <div class="reg-trangthai">
                    <small style="color: #26aa99;">Đã duyệt <br> Đơn hàng đã được duyệt, đang chờ đóng gói</small> <br>
                </div>
            </div>
            <div class="reg">
                <div class="reg-icon">
                <i class="fas fa-check-circle" style="color:#26aa99;"></i>
                </div>
                <div class="reg-time">
                    <small>Giai đoạn 3</small>
                </div>
                <div class="reg-trangthai">
                    <small style="color: #26aa99;">Đang đóng gói <br> Đơn hàng đang được đóng gói</small> <br>
                </div>
            </div>
            <div class="reg">
                <div class="reg-icon">
                <i class="fas fa-check-circle" style="color:#26aa99;"></i>
                </div>
                <div class="reg-time">
                    <small>Giai đoạn 4</small>
                </div>
                <div class="reg-trangthai">
                    <small style="color: #26aa99;">Đang giao hàng <br> Đơn hàng đang được vân chuyển</small> <br>
                </div>
            </div>
            <div class="reg">
                <div class="reg-icon">
                <i class="fad fa-times-circle" style="--fa-primary-color: #ffffff; --fa-secondary-color: #ff0000; --fa-secondary-opacity: 100;"></i>
                </div>
                <div class="reg-time">
                    <small>Giai đoạn 5</small>
                </div>
                <div class="reg-trangthai">
                    <small>Giao hàng thành công <br> Đơn hàng đã giao thành công</small> <br>
                </div>
            </div>
                    ';
            } else if ($showOne['order_status'] == 'Giao thành công') {
                echo '
                <div class="reg">
                <div class="reg-icon">
                <i class="fad fa-times-circle" style="--fa-primary-color: #ffffff; --fa-secondary-color: #ff0000; --fa-secondary-opacity: 100;"></i>
                    <div class="light"></div>
                </div>
                <div class="reg-time">
                    <small>Giai đoạn 1</small>
                </div>
                <div class="reg-trangthai">
                    <small>Đang chờ duyệt <br> Đơn hàng chờ SHOP duyệt</small> <br>
                </div>
            </div>
            <div class="reg">
                <div class="reg-icon">
                <i class="fad fa-times-circle" style="--fa-primary-color: #ffffff; --fa-secondary-color: #ff0000; --fa-secondary-opacity: 100;"></i>
                </div>
                <div class="reg-time">
                    <small>Giai đoạn 2</small>
                </div>
                <div class="reg-trangthai">
                    <small>Đã duyệt <br> Đơn hàng đã được duyệt, đang chờ đóng gói</small> <br>
                </div>
            </div>
            <div class="reg">
                <div class="reg-icon">
                <i class="fad fa-times-circle" style="--fa-primary-color: #ffffff; --fa-secondary-color: #ff0000; --fa-secondary-opacity: 100;"></i>
                </div>
                <div class="reg-time">
                    <small>Giai đoạn 3</small>
                </div>
                <div class="reg-trangthai">
                    <small>Đang đóng gói <br> Đơn hàng đang được đóng gói</small> <br>
                </div>
            </div>
            <div class="reg">
                <div class="reg-icon">
                <i class="fad fa-times-circle" style="--fa-primary-color: #ffffff; --fa-secondary-color: #ff0000; --fa-secondary-opacity: 100;"></i>
                </div>
                <div class="reg-time">
                    <small>Giai đoạn 4</small>
                </div>
                <div class="reg-trangthai">
                    <small>Đang giao hàng <br> Đơn hàng đang được vân chuyển</small> <br>
                </div>
            </div>
            <div class="reg">
                <div class="reg-icon">
                <i class="fas fa-check-circle" style="color:#26aa99;"></i>
                </div>
                <div class="reg-time">
                    <small>Giai đoạn 5</small>
                </div>
                <div class="reg-trangthai">
                    <small style="color: #26aa99;">Giao hàng thành công <br> Đơn hàng đã giao thành công</small> <br>
                </div>
            </div>
                    ';
            } else {
                if ($showOne['order_cancel'] == 1) {
                    echo '
                            <div class="reg">
                                <div class="reg-icon">
                                <i class="fas fa-check-circle" style="color:#26aa99;"></i>
                                <div class="light2"></div>
                                </div>
                                <div class="reg-time">
                                    <small>Giai đoạn 1</small>
                                </div>
                                <div class="reg-trangthai">
                                    <small>Đang chờ duyệt <br> Đơn hàng chờ SHOP duyệt</small> <br>
                                </div>
                            </div>
                            <div class="reg">
                                <div class="reg-icon">
                                    <i class="fas fa-check-circle" style="color: red;"></i>
                                </div>
                                <div class="reg-time">
                                    <small>Giai đoạn 2</small>
                                </div>
                                <div class="reg-trangthai">
                                    <small style="color:red;">Đã hủy <br> Đơn hàng đã hủy do bạn</small> <br>
                                </div>
                            </div>                            
                        ';
                } else if ($showOne['order_cancel'] == 2) {
                    echo '
                    <div class="reg">
                    <div class="reg-icon">
                    <i class="fas fa-check-circle" style="color:#26aa99;"></i>
                    <div class="light2"></div>
                    </div>
                    <div class="reg-time">
                        <small>Giai đoạn 1</small>
                    </div>
                    <div class="reg-trangthai">
                        <small>Đang chờ duyệt <br> Đơn hàng chờ SHOP duyệt</small> <br>
                    </div>
                </div>
                <div class="reg">
                    <div class="reg-icon">
                        <i class="fas fa-check-circle" style="color: red;"></i>
                    </div>
                    <div class="reg-time">
                        <small>Giai đoạn 2</small>
                    </div>
                    <div class="reg-trangthai">
                        <small style="color:red;">Đã hủy <br> Đơn hàng đã hủy do Shop</small> <br>
                    </div>
                </div>                               
                        ';
                }
            }
            ?>
        </div>
    </div>
    <div class="box-3">
        <div class="box3-header">
            <a href=""><i class="fas fa-store-alt"></i></a>
            <p><?= $showOne['account_name'] ?></p>
            <a href="../?act=mess_chat&from=<?= $_SESSION['83x86']['account_id'] ?>&to=<?= $showOne['shop_id'] ?>"><i class="fas fa-envelope-open-text"></i>chat</a>
        </div>
        <div class="vien"></div>
        <div class="box-chitiet">
            <?php
            $tonghang = 0;
            foreach ($showAll as $items) {
                extract($items);
                $tonghang += $details_price * $details_qty;
                echo '
                        <div class="box_chitiet1">
                            <img src="../' . $details_img . '" alt="">
                            <div class="name">
                                <h5>' . $details_name . '</h5>
                                <span>X' . $details_qty . '</span>
                            </div>
                            <div class="price">$' . $details_price . '</div>
                            ';
                if ($showOne['order_status'] == 'Giao thành công') {
                    if ($details_feedback == 0) {
                        echo '<a href="../?act=detail&checkIfOrderCompleteSameRate=true&product_id=' . $product_id . '&category=' . $category_id . '&idOrder=' . $order_id . '"> Đánh giá ngay</a>';
                    } else {
                        echo '<a href=""> Đã đánh giá</a>';
                    }
                }
                echo '
                        </div>
                    ';
            }
            ?>
            <div class="box_chitiet2">
                <div class="label-name">
                    <div class="name">
                        <span>Tổng tiền hàng:</span>
                    </div>
                    <div>$<?= $tonghang ?></div>
                </div>
                <div class="label-name">
                    <div class="name">
                        <span>Phí vận chuyển:</span>
                    </div>
                    <div>0đ</div>
                </div>
                
                <div class="label-name">
                    <div class="name">
                        <span>Giảm giá:</span>
                    </div>
                    <div><?= $showOne['order_promo'] ?>%</div>
                </div>
                <br>
                <div class="label-name">
                    <div class="name">
                        <span>Thành tiền:</span>
                    </div>
                    <div>$<?= $showOne['order_total'] ?></div>
                </div>
            </div>

            <div class="please">
                <div class="pleases">
                    <i class="fas fa-bell" style="color: #ffea00;"></i>
                    <?php
                    if ($showOne['order_pay'] == 'Tiền mặt') {
                        echo '<smallabel>Vui lòng thanh toán <span>$' . $showOne['order_total'] . '</span> khi nhận hàng</smallabel>';
                    } else {
                        echo '<smallabel>Bạn đã thanh toán <span>$' . $showOne['order_total'] . '</span>, không cần thanh toán khi nhận hàng</smallabel>';
                    }
                    ?>
                </div>
        
                <div class="label-name">
                    <smallabel>Phương thức thanh toán:</smallabel>
                    <div><?= $showOne['order_pay'] ?></div>
                </div>
            </div>
        </div>
    </div>
</div>