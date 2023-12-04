<style>
    .box {
        position: relative;
        left: 125px;
        max-width: 85%;
        height: 90%;
        margin: 0 auto;
        background-color: rgb(255, 255, 255);
        overflow-y: scroll;
    }

    .box-header {
        height: 60px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        border-bottom: 1px solid black;
    }

    .box-header div:nth-child(1) {
        margin-left: 25px;
    }

    .box-header div:nth-child(2) {
        margin-right: 25px;
    }

    .box-header div:nth-child(1) a {
        background-color: inherit;
        border: none;
        text-decoration: none;
        color: black;
    }

    .madon {
        display: flex;
    }

    .madon p:nth-child(2) {
        margin-left: 10px;
        color: rgb(8, 0, 255);
    }

    .box-content {
        margin: 70px 0;
        display: grid;
        grid-template-columns: auto auto auto auto auto;
        justify-content: space-around;

    }

    .box-content .cart .cart-icon i {
        color: rgb(0, 186, 43);
        border: 5px solid rgb(0, 186, 43);
        border-radius: 50%;
        width: 50px;
        height: 50px;
        margin-bottom: 2px;
        font-size: 25px;
        line-height: 50px;
    }


    .cart {
        text-align: center;

    }

    .box-footer {
        height: 60px;
        background-color: rgba(255, 228, 196, 0.438);
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .box-footer div:nth-child(1) {
        margin-left: 20px;
    }

    .box-footer div:nth-child(2) {
        margin-right: 20px;
    }

    .box-footer div a {
        border: none;
        background-color: #d73211;
        color: white;
        padding: 10px 30px;
        border-radius: 5px;
        z-index: 1;
        cursor: pointer;
        position: relative;
        text-decoration: none;
    }

    .box-footer div a::before {
        content: " ";
        position: absolute;
        height: 35px;
        top: 0;
        width: 0;
        left: 0;
        border-radius: 5px;
        transition: all .5s ease;
    }

    .box-footer div a:hover::before {
        background-color: #ff2a008c;
        width: 100%;
        color: white;
        z-index: -1;
    }

    .vien {
        height: 0.1875rem;
        width: 100%;
        background-position-x: -1.875rem;
        background-size: 7.25rem 0.1875rem;
        background-image: repeating-linear-gradient(45deg, #6fa6d6, #6fa6d6 33px, transparent 0, transparent 41px, #f18d9b 0, #f18d9b 74px, transparent 0, transparent 82px);
    }

    /*box 2*/
    .box-2 {
        display: grid;
        grid-template-columns: 38% 58%;
        border-bottom: 1px solid black;
    }

    .content1 {
        padding: 20px;
    }

    .content2 {
        margin: 20px 0;
        transform: translateX(20px);
    }

    .content2 .reg {
        padding: 0 10px;
        display: flex;

    }

    .content2 .reg div {
        margin: 10px 10px;
    }

    .content2 .reg div:nth-child(1) i {
        /* background-color: rgb(0, 187, 255); */
        /* color: white; */
        padding: 10px;
        border-radius: 100%;
    }

    /*box3*/
    .box3-header {
        background-color: rgb(239, 239, 239);
        height: 50px;
        display: flex;
    }

    .box3-header a:nth-child(1) {
        height: 20px;
        border-radius: 5px;
        background-color: #d73211;
        color: white;
        border: none;
        margin: 15px 20px;
        z-index: 1;
        position: relative;
        cursor: pointer;
    }

    .box3-header a:nth-child(1)::before {
        content: " ";
        position: absolute;
        height: 20px;
        top: 0;
        width: 0;
        left: 0;
        border-radius: 5px;
        transition: all .5s ease;
    }

    .box3-header a:nth-child(1):hover::before {
        background-color: #ff2a008c;
        width: 100%;
        color: white;
        z-index: -1;
    }

    .box3-header a:nth-child(3),
    .box3-header a:nth-child(4) {
        height: 25px;
        border-radius: 5px;
        background-color: #d73211;
        color: white;
        border: none;
        margin: 12px 5px;
        padding: 0 10px;
        position: relative;
        z-index: 1;
        cursor: pointer;
    }

    .box3-header a:nth-child(3)::before,
    .box3-header a:nth-child(4)::before {
        content: " ";
        position: absolute;
        height: 25px;
        top: 0;
        width: 0;
        left: 0;
        border-radius: 5px;
        transition: all .5s ease;
    }

    .box3-header a:nth-child(3):hover::before,
    .box3-header a:nth-child(4):hover::before {
        background-color: #ff2a008c;
        width: 100%;
        color: white;
        z-index: -1;
    }

    .box3-header a i {
        padding: 0 5px;
    }

    .box3-header p {
        font-weight: bold;
        margin-left: -10px;
    }

    .box3-header {
        border-bottom: -1px solid black;
    }

    .box-chitiet {
        height: 500px;
    }

    .box_chitiet1 {
        display: flex;
        align-items: center;
        padding: 10px;
        border-bottom: 1px solid #ddd;
        margin-bottom: 20px;
    }

    .box_chitiet1 img {
        width: 100px;
        height: 100px;
        margin-right: 10px;
    }

    .box_chitiet1 .name {
        flex-grow: 1;
    }

    .box_chitiet1 .name h3 {
        margin: 0;
    }

    .box_chitiet1 .name span {
        font-size: 14px;
        color: #888;
    }

    .box_chitiet1 .price {
        font-weight: bold;
        padding: 0 50px;
    }

    .box_chitiet1 .price del {
        margin: 0 10px;
        color: #888;
        text-decoration: line-through;
    }

    .box_chitiet1 a {
        padding: 10px;
        background-color: #d73211;
        border: none;
        border-radius: 5px;
        color: white;
        position: relative;
        cursor: pointer;
        z-index: 1;

    }

    .box_chitiet1 a::before {
        content: " ";
        position: absolute;
        height: 36px;
        top: 0;
        width: 0;
        left: 0;
        border-radius: 5px;
        transition: all .5s ease;
    }

    .box_chitiet1 a:hover::before {
        background-color: #ff2a008c;
        width: 100%;
        color: white;
        z-index: -1;
    }

    .box_chitiet2 {
        display: flex;
        flex-direction: column;
        padding: 10px;
    }

    .label-name {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 10px;
        border-bottom: 1px solid #ddd;
    }

    .label-name .name {
        margin-left: 50%;
    }

    .label-name .name span {
        font-size: 14px;
        color: #888;
        line-height: 30px;
    }

    .label-name .name div {
        font-weight: bold;
    }

    .please {
        padding: 15px;
        border: 1px solid rgb(255, 200, 0);
    }

    .please span {
        color: red;
    }
</style>
<div class="box">
    <div class="box-header">
        <div><i class="fas fa-chevron-left"></i><a href="?brief=orderMe">TRỞ LẠI</a></div>
        <div class="madon">
            <p>Mã đơn hàng: ORDER-<?=$orderID?> |</p>
            <p><?=$showOne['order_status']?></p>
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
                <?=$_SESSION['83x86']['account_name']?>
            </div>
            <div class="phone">
                <small>
                    <?=$_SESSION['83x86']['account_phone']?>
                </small>
            </div>
            <div class="adress">
                <small><?=$_SESSION['83x86']['account_address']?></small>
            </div>
            <div class="adress">
                <small>Ghi chú: <?=$showOne['order_note']?></small>
            </div>
        </div>
        <div class="content2">
            <?php
                if($showOne['order_status'] == 'Đang chờ duyệt') {
                    echo '
                        <div class="reg">
                            <div class="reg-icon">
                                <i class="fas fa-check-circle" style="color: #00ff88;"></i>
                            </div>
                            <div class="reg-time">
                                <small>Giai đoạn</small>
                            </div>
                            <div class="reg-trangthai">
                                <b style="color: rgb(0, 187, 255);">Đang chờ duyệt <br> Đơn hàng chờ SHOP duyệt</b> <br>
                            </div>
                        </div>
                        <div class="reg">
                            <div class="reg-icon">
                                <i class="fas fa-check-circle" style="color: #00ff88;"></i>
                            </div>
                            <div class="reg-time">
                                <small>Giai đoạn</small>
                            </div>
                            <div class="reg-trangthai">
                                <b style="color: rgb(0, 187, 255);">Đã duyệt <br> Đơn hàng đã được duyệt, đang chờ đóng gói</b> <br>
                            </div>
                        </div>
                        <div class="reg">
                            <div class="reg-icon">
                                <i class="fas fa-check-circle" style="color: #00ff88;"></i>
                            </div>
                            <div class="reg-time">
                                <small>Giai đoạn</small>
                            </div>
                            <div class="reg-trangthai">
                                <b style="color: rgb(0, 187, 255);">Đang đóng gói <br> Đơn hàng đang được đóng gói</b> <br>
                            </div>
                        </div>
                        <div class="reg">
                            <div class="reg-icon">
                                <i class="fas fa-check-circle" style="color: #00ff88;"></i>
                            </div>
                            <div class="reg-time">
                                <small>Giai đoạn</small>
                            </div>
                            <div class="reg-trangthai">
                                <b style="color: rgb(0, 187, 255);">Đang giao hàng <br> Đơn hàng đang được vân chuyển</b> <br>
                            </div>
                        </div>
                        <div class="reg">
                            <div class="reg-icon">
                                <i class="fas fa-check-circle" style="color: #00ff88;"></i>
                            </div>
                            <div class="reg-time">
                                <small>Giai đoạn</small>
                            </div>
                            <div class="reg-trangthai">
                                <b style="color: rgb(0, 187, 255);">Giao hàng thành công <br> Đơn hàng đã giao thành công</b> <br>
                            </div>
                        </div>
                    ';
                } else if($showOne['order_status'] == 'Đã duyệt') {
                    echo '
                        <div class="reg">
                            <div class="reg-icon">
                                <i class="fas fa-check-circle" style="color: #00ff88;"></i>
                            </div>
                            <div class="reg-time">
                                <small>Giai đoạn</small>
                            </div>
                            <div class="reg-trangthai">
                                <b style="color: rgb(0, 187, 255);">Đang chờ duyệt <br> Đơn hàng chờ SHOP duyệt</b> <br>
                            </div>
                        </div>
                        <div class="reg">
                            <div class="reg-icon">
                                <i class="fas fa-check-circle" style="color: #00ff88;"></i>
                            </div>
                            <div class="reg-time">
                                <small>Giai đoạn</small>
                            </div>
                            <div class="reg-trangthai">
                                <b style="color: rgb(0, 187, 255);">Đã duyệt <br> Đơn hàng đã được duyệt, đang chờ đóng gói</b> <br>
                            </div>
                        </div>
                        <div class="reg">
                            <div class="reg-icon">
                                <i class="fas fa-check-circle" style="color: #00ff88;"></i>
                            </div>
                            <div class="reg-time">
                                <small>Giai đoạn</small>
                            </div>
                            <div class="reg-trangthai">
                                <b style="color: rgb(0, 187, 255);">Đang đóng gói <br> Đơn hàng đang được đóng gói</b> <br>
                            </div>
                        </div>
                        <div class="reg">
                            <div class="reg-icon">
                                <i class="fas fa-check-circle" style="color: #00ff88;"></i>
                            </div>
                            <div class="reg-time">
                                <small>Giai đoạn</small>
                            </div>
                            <div class="reg-trangthai">
                                <b style="color: rgb(0, 187, 255);">Đang giao hàng <br> Đơn hàng đang được vân chuyển</b> <br>
                            </div>
                        </div>
                        <div class="reg">
                            <div class="reg-icon">
                                <i class="fas fa-check-circle" style="color: #00ff88;"></i>
                            </div>
                            <div class="reg-time">
                                <small>Giai đoạn</small>
                            </div>
                            <div class="reg-trangthai">
                                <b style="color: rgb(0, 187, 255);">Giao hàng thành công <br> Đơn hàng đã giao thành công</b> <br>
                            </div>
                        </div>
                    ';
                } else if($showOne['order_status'] == 'Đã đóng gói') {
                    echo '
                        <div class="reg">
                            <div class="reg-icon">
                                <i class="fas fa-check-circle" style="color: #00ff88;"></i>
                            </div>
                            <div class="reg-time">
                                <small>Giai đoạn</small>
                            </div>
                            <div class="reg-trangthai">
                                <b style="color: rgb(0, 187, 255);">Đang chờ duyệt <br> Đơn hàng chờ SHOP duyệt</b> <br>
                            </div>
                        </div>
                        <div class="reg">
                            <div class="reg-icon">
                                <i class="fas fa-check-circle" style="color: #00ff88;"></i>
                            </div>
                            <div class="reg-time">
                                <small>Giai đoạn</small>
                            </div>
                            <div class="reg-trangthai">
                                <b style="color: rgb(0, 187, 255);">Đã duyệt <br> Đơn hàng đã được duyệt, đang chờ đóng gói</b> <br>
                            </div>
                        </div>
                        <div class="reg">
                            <div class="reg-icon">
                                <i class="fas fa-check-circle" style="color: #00ff88;"></i>
                            </div>
                            <div class="reg-time">
                                <small>Giai đoạn</small>
                            </div>
                            <div class="reg-trangthai">
                                <b style="color: rgb(0, 187, 255);">Đang đóng gói <br> Đơn hàng đang được đóng gói</b> <br>
                            </div>
                        </div>
                        <div class="reg">
                            <div class="reg-icon">
                                <i class="fas fa-check-circle" style="color: #00ff88;"></i>
                            </div>
                            <div class="reg-time">
                                <small>Giai đoạn</small>
                            </div>
                            <div class="reg-trangthai">
                                <b style="color: rgb(0, 187, 255);">Đang giao hàng <br> Đơn hàng đang được vân chuyển</b> <br>
                            </div>
                        </div>
                        <div class="reg">
                            <div class="reg-icon">
                                <i class="fas fa-check-circle" style="color: #00ff88;"></i>
                            </div>
                            <div class="reg-time">
                                <small>Giai đoạn</small>
                            </div>
                            <div class="reg-trangthai">
                                <b style="color: rgb(0, 187, 255);">Giao hàng thành công <br> Đơn hàng đã giao thành công</b> <br>
                            </div>
                        </div>
                    ';
                } else if($showOne['order_status'] == 'Đang giao hàng') {
                    echo '
                        <div class="reg">
                            <div class="reg-icon">
                                <i class="fas fa-check-circle" style="color: #00ff88;"></i>
                            </div>
                            <div class="reg-time">
                                <small>Giai đoạn</small>
                            </div>
                            <div class="reg-trangthai">
                                <b style="color: rgb(0, 187, 255);">Đang chờ duyệt <br> Đơn hàng chờ SHOP duyệt</b> <br>
                            </div>
                        </div>
                        <div class="reg">
                            <div class="reg-icon">
                                <i class="fas fa-check-circle" style="color: #00ff88;"></i>
                            </div>
                            <div class="reg-time">
                                <small>Giai đoạn</small>
                            </div>
                            <div class="reg-trangthai">
                                <b style="color: rgb(0, 187, 255);">Đã duyệt <br> Đơn hàng đã được duyệt, đang chờ đóng gói</b> <br>
                            </div>
                        </div>
                        <div class="reg">
                            <div class="reg-icon">
                                <i class="fas fa-check-circle" style="color: #00ff88;"></i>
                            </div>
                            <div class="reg-time">
                                <small>Giai đoạn</small>
                            </div>
                            <div class="reg-trangthai">
                                <b style="color: rgb(0, 187, 255);">Đang đóng gói <br> Đơn hàng đang được đóng gói</b> <br>
                            </div>
                        </div>
                        <div class="reg">
                            <div class="reg-icon">
                                <i class="fas fa-check-circle" style="color: #00ff88;"></i>
                            </div>
                            <div class="reg-time">
                                <small>Giai đoạn</small>
                            </div>
                            <div class="reg-trangthai">
                                <b style="color: rgb(0, 187, 255);">Đang giao hàng <br> Đơn hàng đang được vân chuyển</b> <br>
                            </div>
                        </div>
                        <div class="reg">
                            <div class="reg-icon">
                                <i class="fas fa-check-circle" style="color: #00ff88;"></i>
                            </div>
                            <div class="reg-time">
                                <small>Giai đoạn</small>
                            </div>
                            <div class="reg-trangthai">
                                <b style="color: rgb(0, 187, 255);">Giao hàng thành công <br> Đơn hàng đã giao thành công</b> <br>
                            </div>
                        </div>
                    ';
                } else if($showOne['order_status'] == 'Giao thành công') {
                    echo '
                        <div class="reg">
                            <div class="reg-icon">
                                <i class="fas fa-check-circle" style="color: #00ff88;"></i>
                            </div>
                            <div class="reg-time">
                                <small>Giai đoạn</small>
                            </div>
                            <div class="reg-trangthai">
                                <b style="color: rgb(0, 187, 255);">Đang chờ duyệt <br> Đơn hàng chờ SHOP duyệt</b> <br>
                            </div>
                        </div>
                        <div class="reg">
                            <div class="reg-icon">
                                <i class="fas fa-check-circle" style="color: #00ff88;"></i>
                            </div>
                            <div class="reg-time">
                                <small>Giai đoạn</small>
                            </div>
                            <div class="reg-trangthai">
                                <b style="color: rgb(0, 187, 255);">Đã duyệt <br> Đơn hàng đã được duyệt, đang chờ đóng gói</b> <br>
                            </div>
                        </div>
                        <div class="reg">
                            <div class="reg-icon">
                                <i class="fas fa-check-circle" style="color: #00ff88;"></i>
                            </div>
                            <div class="reg-time">
                                <small>Giai đoạn</small>
                            </div>
                            <div class="reg-trangthai">
                                <b style="color: rgb(0, 187, 255);">Đang đóng gói <br> Đơn hàng đang được đóng gói</b> <br>
                            </div>
                        </div>
                        <div class="reg">
                            <div class="reg-icon">
                                <i class="fas fa-check-circle" style="color: #00ff88;"></i>
                            </div>
                            <div class="reg-time">
                                <small>Giai đoạn</small>
                            </div>
                            <div class="reg-trangthai">
                                <b style="color: rgb(0, 187, 255);">Đang giao hàng <br> Đơn hàng đang được vân chuyển</b> <br>
                            </div>
                        </div>
                        <div class="reg">
                            <div class="reg-icon">
                                <i class="fas fa-check-circle" style="color: #00ff88;"></i>
                            </div>
                            <div class="reg-time">
                                <small>Giai đoạn</small>
                            </div>
                            <div class="reg-trangthai">
                                <b style="color: rgb(0, 187, 255);">Giao hàng thành công <br> Đơn hàng đã giao thành công</b> <br>
                            </div>
                        </div>
                    ';
                } else {
                    if($showOne['order_cancel'] == 1) {
                        echo '
                            <div class="reg">
                                <div class="reg-icon">
                                    <i class="fas fa-check-circle" style="color: #00ff88;"></i>
                                </div>
                                <div class="reg-time">
                                    <small>Giai đoạn</small>
                                </div>
                                <div class="reg-trangthai">
                                    <b style="color: rgb(0, 187, 255);">Đang chờ duyệt <br> Đơn hàng chờ SHOP duyệt</b> <br>
                                </div>
                            </div>
                            <div class="reg">
                                <div class="reg-icon">
                                    <i class="fas fa-check-circle" style="color: #00ff88;"></i>
                                </div>
                                <div class="reg-time">
                                    <small>Giai đoạn</small>
                                </div>
                                <div class="reg-trangthai">
                                    <b style="color: rgb(0, 187, 255);">Đã duyệt <br> Đơn hàng đã được duyệt, đang chờ đóng gói</b> <br>
                                </div>
                            </div>
                            <div class="reg">
                                <div class="reg-icon">
                                    <i class="fas fa-check-circle" style="color: #00ff88;"></i>
                                </div>
                                <div class="reg-time">
                                    <small>Giai đoạn</small>
                                </div>
                                <div class="reg-trangthai">
                                    <b style="color: rgb(0, 187, 255);">Đang đóng gói <br> Đơn hàng đang được đóng gói</b> <br>
                                </div>
                            </div>
                            <div class="reg">
                                <div class="reg-icon">
                                    <i class="fas fa-check-circle" style="color: #00ff88;"></i>
                                </div>
                                <div class="reg-time">
                                    <small>Giai đoạn</small>
                                </div>
                                <div class="reg-trangthai">
                                    <b style="color: rgb(0, 187, 255);">Đang giao hàng <br> Đơn hàng đang được vân chuyển</b> <br>
                                </div>
                            </div>
                            <div class="reg">
                                <div class="reg-icon">
                                    <i class="fas fa-check-circle" style="color: #00ff88;"></i>
                                </div>
                                <div class="reg-time">
                                    <small>Giai đoạn</small>
                                </div>
                                <div class="reg-trangthai">
                                    <b style="color: rgb(0, 187, 255);">Giao hàng thành công <br> Đơn hàng đã giao thành công</b> <br>
                                </div>
                            </div>
                            <div class="reg">
                                <div class="reg-icon">
                                    <i class="fas fa-check-circle" style="color: #00ff88;"></i>
                                </div>
                                <div class="reg-time">
                                    <small>Giai đoạn</small>
                                </div>
                                <div class="reg-trangthai">
                                    <b style="color: rgb(0, 187, 255);">Đã hủy <br> Đơn hàng đã hủy do bạn</b> <br>
                                </div>
                            </div>                            
                        ';
                    } else if($showOne['order_cancel'] == 2) {
                        echo '
                            <div class="reg">
                                <div class="reg-icon">
                                    <i class="fas fa-check-circle" style="color: #00ff88;"></i>
                                </div>
                                <div class="reg-time">
                                    <small>Giai đoạn</small>
                                </div>
                                <div class="reg-trangthai">
                                    <b style="color: rgb(0, 187, 255);">Đang chờ duyệt <br> Đơn hàng chờ SHOP duyệt</b> <br>
                                </div>
                            </div>
                            <div class="reg">
                                <div class="reg-icon">
                                    <i class="fas fa-check-circle" style="color: #00ff88;"></i>
                                </div>
                                <div class="reg-time">
                                    <small>Giai đoạn</small>
                                </div>
                                <div class="reg-trangthai">
                                    <b style="color: rgb(0, 187, 255);">Đã duyệt <br> Đơn hàng đã được duyệt, đang chờ đóng gói</b> <br>
                                </div>
                            </div>
                            <div class="reg">
                                <div class="reg-icon">
                                    <i class="fas fa-check-circle" style="color: #00ff88;"></i>
                                </div>
                                <div class="reg-time">
                                    <small>Giai đoạn</small>
                                </div>
                                <div class="reg-trangthai">
                                    <b style="color: rgb(0, 187, 255);">Đang đóng gói <br> Đơn hàng đang được đóng gói</b> <br>
                                </div>
                            </div>
                            <div class="reg">
                                <div class="reg-icon">
                                    <i class="fas fa-check-circle" style="color: #00ff88;"></i>
                                </div>
                                <div class="reg-time">
                                    <small>Giai đoạn</small>
                                </div>
                                <div class="reg-trangthai">
                                    <b style="color: rgb(0, 187, 255);">Đang giao hàng <br> Đơn hàng đang được vân chuyển</b> <br>
                                </div>
                            </div>
                            <div class="reg">
                                <div class="reg-icon">
                                    <i class="fas fa-check-circle" style="color: #00ff88;"></i>
                                </div>
                                <div class="reg-time">
                                    <small>Giai đoạn</small>
                                </div>
                                <div class="reg-trangthai">
                                    <b style="color: rgb(0, 187, 255);">Giao hàng thành công <br> Đơn hàng đã giao thành công</b> <br>
                                </div>
                            </div>
                            <div class="reg">
                                <div class="reg-icon">
                                    <i class="fas fa-check-circle" style="color: #00ff88;"></i>
                                </div>
                                <div class="reg-time">
                                    <small>Giai đoạn</small>
                                </div>
                                <div class="reg-trangthai">
                                    <b style="color: rgb(0, 187, 255);">Đã hủy <br> Đơn hàng đã hủy do Shop</b> <br>
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
            <a href="">Shop </a>
            <p><?=$showOne['account_name']?></p>
            <a href="../?act=mess_chat&from=<?=$_SESSION['83x86']['account_id']?>&to=<?=$showOne['shop_id']?>"><i class="fas fa-envelope-open-text"></i>chat</a>
        </div>
        <div class="box-chitiet">
            <?php
                $tonghang = 0;
                foreach($showAll as $items) {
                    extract($items);
                    $tonghang += $details_price * $details_qty;
                    echo '
                        <div class="box_chitiet1">
                            <img src="../'. $details_img .'" alt="">
                            <div class="name">
                                <h3>'. $details_name .'</h3>
                                <span>X'. $details_qty .'</span>
                            </div>
                            <div class="price">$'. $details_price .'</div>
                            ';
                                if($showOne['order_status'] == 'Giao thành công') {
                                    if($details_feedback == 0) {
                                        echo '<a href="../?act=detail&checkIfOrderCompleteSameRate=true&product_id='. $product_id .'&category='. $category_id .'&idOrder='. $order_id .'"> Đánh giá ngay</a>';
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
                    <div>$<?=$tonghang?></div>
                </div>  
                <br>
                <div class="label-name">
                    <div class="name">
                        <span>Phí vận chuyển:</span>
                    </div>
                    <div>0đ</div>
                </div>
                <br>
                <div class="label-name">
                    <div class="name">
                        <span>Giảm giá:</span>
                    </div>
                    <div><?=$showOne['order_promo']?>%</div>
                </div>
                <br>
                <br>
                <div class="label-name">
                    <div class="name">
                        <span>Thành tiền:</span>
                    </div>
                    <div>$<?=$showOne['order_total']?></div>
                </div>
            </div>
            <div class="please">
                <i class="fas fa-bell" style="color: #ffea00;"></i>
                <?php
                    if($showOne['order_pay'] == 'Tiền mặt') {
                        echo '<label>Vui lòng thanh toán <span>$'. $showOne['order_total'] .'</span> khi nhận hàng</label>';
                    } else {
                        echo '<label>Bạn đã thanh toán <span>$'. $showOne['order_total'] .'</span>, không cần thanh toán khi nhận hàng</label>';
                    }
                ?>
            </div>
            <div class="label-name">
                <div class="name">
                    <span>Phương thức thanh toán:</span>
                </div>
                <div style="padding: 15px;"><?=$showOne['order_pay']?></div>
            </div>
        </div>
    </div>
</div>