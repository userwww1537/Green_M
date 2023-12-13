<?php
    ob_start();
    extract($_REQUEST);
    if(session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    if (file_exists('../model/order.php')) {
        require "../model/order.php";
    }
    if (file_exists('../../app/mailer.php')) {
        require "../../app/mailer.php";
    }

    $mail = new Mailer();

    if(isset($check) && $check == "ShowOrderDetails") {
        $order = new order_lass();
        $show = $order->show_order_details($orderID);

        $i = 0;
        $total = 0;
        $ketqua = '
                <div class="close-order">
                    X
                </div>
                <div class="title-order">
                    <h3>Chi tiết đơn hàng ORDER-'. $orderID .'</h3>
                </div>
                <div class="table-order">
                    <table>
                        <thead>
                            <tr>
                                <th>Stt</th>
                                <th>Tên sản phẩm</th>
                                <th>Hình ảnh</th>
                                <th>Số lượng</th>
                                <th>Giá sản phẩm</th>
                                <th>Tổng giá</th>
                            </tr>
                        </thead>
                        <tbody>
        ';
        foreach($show as $items) {
            extract($items);
            $i++;
            $thanh_price = $details_price * $details_qty;
            $total += $thanh_price;
            $ketqua .= '
                <tr>
                    <td>'. $i .'</td>
                    <td>'. $details_name .'</td>
                    <td><img width="100px" src="../../public/'. $details_img .'" alt=""></td>
                    <td>'. $details_qty .'</td>
                    <td>$'. $details_price .'</td>
                    <td>$'. $thanh_price .'</td>
                </tr>
            ';
        }
        $ketqua .= '
                    </tbody>
                    </table>
                </div>
                <hr>
                <div class="bill-order">
                    <div class="total-order">
                        <h6>-Thành Tiền-</h6>
                        <span>$'. $total .'</span>
                    </div>
                    <div class="option-order">
                    <b>-Ghi Chú-</b>'. $orderNote .'
                    </div>
                </div>
        ';
        echo $ketqua;
    } else if(isset($check) && $check == "duyetDon") {
        $order = new order_lass();
        $order->duyetDon($value);
        $infoUser = $order->get_mail_user($value);
        $title = "Green-M -> Thông báo tới bạn trạng thái đơn hàng!";
        $content = "<h1>Đơn hàng có Id: Order-$value</h1> <br>
                     <h3>Đơn hàng đã được duyệt</h3>
                  ";
         $mail->sendMail($title, $content, $infoUser['account_email']);

    } else if(isset($check) && $check == "searchIdOrder") {
        $order = new order_lass();
        $show = $order->show_id_order($value);
        foreach($show as $items) {
           extract($items);
           $address = mb_substr($account_address, 0, 16, 'UTF-8') . '...';
           $order_total = $order_total * 0.97;
           echo '
              <tr>
                 <td>ORDER-'.  $order_id.'</td>
                 <td>'. $account_name .'</td>
                 <td class="address-user">'. $address .'.<input type="hidden" value="'. $account_address .'"></td>
                 <td>'. $account_phone .'</td>
                 <td>$'. $order_total .'</td>
                 '; if($order_status == "Đang chờ duyệt") {
                    echo '<td style="color: Yellow3; font-weight: 500;">'. $order_status .'</td>';
                } else if($order_status == "Đang giao hàng") {
                    echo '<td style="color: blue; font-weight: 500;">'. $order_status .'</td>';
                } else if($order_status == "Đã hủy") {
                    echo '<td style="color: red; font-weight: 500;">'. $order_status .'</td>';
                } else {
                    echo '<td style="color: green; font-weight: 500;">'. $order_status .'</td>';
                } echo '
                 <td>'. $time_reg .'</td>
                 <td class="kkk2">
                    <button class="view-order-details" data-order-id="'. $order_id .'" data-order-note="'. $order_note .'">
                       <i class="fas fa-eye"></i>
                    </button>';
                       if($order_status == "Đang chờ duyệt") {
                          echo '
                             <button class="duyet-don" data-order-id="'. $order_id .'">
                                <i class="fas">Duyệt</i></i>
                             </button>
                          ';
                       } else if($order_status == "Đã hủy") {
                          if($order_cancel == 1) {
                             echo '
                                <button>
                                   <i class="fas fa-window-close">Khách hủy</i>
                                </button>
                             ';
                          } else {
                             echo '
                                <button>
                                   <i class="fas fa-window-close">Shop hủy</i>
                                </button>
                             ';
                          }
                       } else if($order_status == "Giao thành công") {
                          echo '
                             <button class="">
                                <i class="fas fa-check">Hoàn thành</i>
                             </button>
                          ';
                       }  else {
                          echo '
                             <button class="edit-order-details" data-order-id="'. $order_id .'">
                                <i class="fas fa-pen"></i></i>
                             </button>
                          ';
                       }
                    echo '
                 </td>
              </tr>
           ';
        }
    } else if(isset($check) && $check == "searchNameOrder") {
        $order = new order_lass();
        $show = $order->show_name_order($value);
        foreach($show as $items) {
           extract($items);
           $address = mb_substr($account_address, 0, 16, 'UTF-8') . '...';
           $order_total = $order_total * 0.97;
           echo '
              <tr>
                 <td>ORDER-'.  $order_id.'</td>
                 <td>'. $account_name .'</td>
                 <td class="address-user">'. $address .'.<input type="hidden" value="'. $account_address .'"></td>
                 <td>'. $account_phone .'</td>
                 <td>$'. $order_total .'</td>
                 '; if($order_status == "Đang chờ duyệt") {
                    echo '<td style="color: Yellow3; font-weight: 500;">'. $order_status .'</td>';
                } else if($order_status == "Đang giao hàng") {
                    echo '<td style="color: blue; font-weight: 500;">'. $order_status .'</td>';
                } else if($order_status == "Đã hủy") {
                    echo '<td style="color: red; font-weight: 500;">'. $order_status .'</td>';
                } else {
                    echo '<td style="color: green; font-weight: 500;">'. $order_status .'</td>';
                } echo '
                 <td>'. $time_reg .'</td>
                 <td class="kkk2">
                    <button class="view-order-details" data-order-id="'. $order_id .'" data-order-note="'. $order_note .'">
                       <i class="fas fa-eye"></i>
                    </button>';
                       if($order_status == "Đang chờ duyệt") {
                          echo '
                             <button class="duyet-don" data-order-id="'. $order_id .'">
                                <i class="fas">Duyệt</i></i>
                             </button>
                          ';
                       } else if($order_status == "Đã hủy") {
                          if($order_cancel == 1) {
                             echo '
                                <button>
                                   <i class="fas fa-window-close">Khách hủy</i>
                                </button>
                             ';
                          } else {
                             echo '
                                <button>
                                   <i class="fas fa-window-close">Shop hủy</i>
                                </button>
                             ';
                          }
                       } else if($order_status == "Giao thành công") {
                          echo '
                             <button class="">
                                <i class="fas fa-check">Hoàn thành</i>
                             </button>
                          ';
                       }  else {
                          echo '
                             <button class="edit-order-details" data-order-id="'. $order_id .'">
                                <i class="fas fa-pen"></i></i>
                             </button>
                          ';
                       }
                    echo '
                 </td>
              </tr>
           ';
        }
    } else if(isset($check) && $check == "searchStatusOrder") {
        $order = new order_lass();
        $show = $order->show_status_order($value);
        foreach($show as $items) {
           extract($items);
           $address = mb_substr($account_address, 0, 16, 'UTF-8') . '...';
           $order_total = $order_total * 0.97;
           echo '
              <tr>
                 <td>ORDER-'.  $order_id.'</td>
                 <td>'. $account_name .'</td>
                 <td class="address-user">'. $address .'.<input type="hidden" value="'. $account_address .'"></td>
                 <td>'. $account_phone .'</td>
                 <td>$'. $order_total .'</td>
                 '; if($order_status == "Đang chờ duyệt") {
                    echo '<td style="color: Yellow3; font-weight: 500;">'. $order_status .'</td>';
                } else if($order_status == "Đang giao hàng") {
                    echo '<td style="color: blue; font-weight: 500;">'. $order_status .'</td>';
                } else if($order_status == "Đã hủy") {
                    echo '<td style="color: red; font-weight: 500;">'. $order_status .'</td>';
                } else {
                    echo '<td style="color: green; font-weight: 500;">'. $order_status .'</td>';
                } echo '
                 <td>'. $time_reg .'</td>
                 <td class="kkk2">
                    <button class="view-order-details" data-order-id="'. $order_id .'" data-order-note="'. $order_note .'">
                       <i class="fas fa-eye"></i>
                    </button>';
                       if($order_status == "Đang chờ duyệt") {
                          echo '
                             <button class="duyet-don" data-order-id="'. $order_id .'">
                                <i class="fas">Duyệt</i></i>
                             </button>
                          ';
                       } else if($order_status == "Đã hủy") {
                          if($order_cancel == 1) {
                             echo '
                                <button>
                                   <i class="fas fa-window-close">Khách hủy</i>
                                </button>
                             ';
                          } else {
                             echo '
                                <button>
                                   <i class="fas fa-window-close">Shop hủy</i>
                                </button>
                             ';
                          }
                       } else if($order_status == "Giao thành công") {
                          echo '
                             <button class="">
                                <i class="fas fa-check">Hoàn thành</i>
                             </button>
                          ';
                       }  else {
                          echo '
                             <button class="edit-order-details" data-order-id="'. $order_id .'">
                                <i class="fas fa-pen"></i></i>
                             </button>
                          ';
                       }
                    echo '
                 </td>
              </tr>
           ';
        }
    } else if(isset($check) && $check == "searchPhoneOrder") {
        $order = new order_lass();
        $show = $order->show_phone_order($value);
        foreach($show as $items) {
           extract($items);
           $address = mb_substr($account_address, 0, 16, 'UTF-8') . '...';
           $order_total = $order_total * 0.97;
           echo '
              <tr>
                 <td>ORDER-'.  $order_id.'</td>
                 <td>'. $account_name .'</td>
                 <td class="address-user">'. $address .'.<input type="hidden" value="'. $account_address .'"></td>
                 <td>'. $account_phone .'</td>
                 <td>$'. $order_total .'</td>
                 '; if($order_status == "Đang chờ duyệt") {
                    echo '<td style="color: Yellow3; font-weight: 500;">'. $order_status .'</td>';
                } else if($order_status == "Đang giao hàng") {
                    echo '<td style="color: blue; font-weight: 500;">'. $order_status .'</td>';
                } else if($order_status == "Đã hủy") {
                    echo '<td style="color: red; font-weight: 500;">'. $order_status .'</td>';
                } else {
                    echo '<td style="color: green; font-weight: 500;">'. $order_status .'</td>';
                } echo '
                 <td>'. $time_reg .'</td>
                 <td class="kkk2">
                    <button class="view-order-details" data-order-id="'. $order_id .'" data-order-note="'. $order_note .'">
                       <i class="fas fa-eye"></i>
                    </button>';
                       if($order_status == "Đang chờ duyệt") {
                          echo '
                             <button class="duyet-don" data-order-id="'. $order_id .'">
                                <i class="fas">Duyệt</i></i>
                             </button>
                          ';
                       } else if($order_status == "Đã hủy") {
                          if($order_cancel == 1) {
                             echo '
                                <button>
                                   <i class="fas fa-window-close">Khách hủy</i>
                                </button>
                             ';
                          } else {
                             echo '
                                <button>
                                   <i class="fas fa-window-close">Shop hủy</i>
                                </button>
                             ';
                          }
                       } else if($order_status == "Giao thành công") {
                          echo '
                             <button class="">
                                <i class="fas fa-check">Hoàn thành</i>
                             </button>
                          ';
                       }  else {
                          echo '
                             <button class="edit-order-details" data-order-id="'. $order_id .'">
                                <i class="fas fa-pen"></i></i>
                             </button>
                          ';
                       }
                    echo '
                 </td>
              </tr>
           ';
        }
    } else if(isset($check) && $check == "searchAllOrder") {
        $order = new order_lass();
        $show = $order->show__order();
        foreach($show as $items) {
           extract($items);
           $address = mb_substr($account_address, 0, 16, 'UTF-8') . '...';
           $order_total = $order_total * 0.97;
           echo '
              <tr>
                 <td>ORDER-'.  $order_id.'</td>
                 <td>'. $account_name .'</td>
                 <td class="address-user">'. $address .'.<input type="hidden" value="'. $account_address .'"></td>
                 <td>'. $account_phone .'</td>
                 <td>$'. $order_total .'</td>
                 '; if($order_status == "Đang chờ duyệt") {
                    echo '<td style="color: Yellow3; font-weight: 500;">'. $order_status .'</td>';
                } else if($order_status == "Đang giao hàng") {
                    echo '<td style="color: blue; font-weight: 500;">'. $order_status .'</td>';
                } else if($order_status == "Đã hủy") {
                    echo '<td style="color: red; font-weight: 500;">'. $order_status .'</td>';
                } else {
                    echo '<td style="color: green; font-weight: 500;">'. $order_status .'</td>';
                } echo '
                 <td>'. $time_reg .'</td>
                 <td class="kkk2">
                    <button class="view-order-details" data-order-id="'. $order_id .'" data-order-note="'. $order_note .'">
                       <i class="fas fa-eye"></i>
                    </button>';
                       if($order_status == "Đang chờ duyệt") {
                          echo '
                             <button class="duyet-don" data-order-id="'. $order_id .'">
                                <i class="fas">Duyệt</i></i>
                             </button>
                          ';
                       } else if($order_status == "Đã hủy") {
                          if($order_cancel == 1) {
                             echo '
                                <button>
                                   <i class="fas fa-window-close">Khách hủy</i>
                                </button>
                             ';
                          } else {
                             echo '
                                <button>
                                   <i class="fas fa-window-close">Shop hủy</i>
                                </button>
                             ';
                          }
                       } else if($order_status == "Giao thành công") {
                          echo '
                             <button class="">
                                <i class="fas fa-check">Hoàn thành</i>
                             </button>
                          ';
                       }  else {
                          echo '
                             <button class="edit-order-details" data-order-id="'. $order_id .'">
                                <i class="fas fa-pen"></i></i>
                             </button>
                          ';
                       }
                    echo '
                 </td>
              </tr>
           ';
        }
    }

    if(isset($upOrder)) {
        $order = new order_lass();
        $infoUser = $order->get_mail_user($order_id);
        if($status == "Giao thành công") {
            $order->up_order_success($status, $order_id);
            $title = "Green-M -> Thông báo tới bạn trạng thái đơn hàng!";
            $content = "<h1>Đơn hàng có Id: Order-$order_id</h1> <br>
                         <h3>Đơn hàng đã được: <b>$status</b></h3> <br>
                         <h6>Cảm ơn bạn đã tin tưởng và đặt hàng tại Green-M. Have A Good Day 😘😘😘😘</h6>
                      ";
        } else {
           $order->up_order($status, $order_id);
           $title = "Green-M -> Thông báo tới bạn trạng thái đơn hàng!";
           $content = "<h1>Đơn hàng có Id: Order-$order_id</h1> <br>
                        <h3>Đơn hàng đang trong quá trình: $status</h3>
                     ";
        }
        $mail->sendMail($title, $content, $infoUser['account_email']);
        echo '
            <style>
                .content {
                    position: absolute;
                    top: 50%;
                    left: 50%;
                    transform: translate(-50%, -50%);
                    width: 400px;
                    height: 200px;
                    border-radius: 10px;
                    background-color: white;
                }
                
                .content {
                    animation: slide-in 1.5s ease-in-out;
                }
                
                @keyframes slide-in {
                    0% {
                    top: -100%;
                    }
                
                    100% {
                    top: 50%;
                    }
                }
                #popup {
                    position: fixed;
                    top: 0;
                    left: 0;
                    width: 100%;
                    height: 100%;
                    background-color: rgba(0, 0, 0, 0.6);
                    z-index: 1000;
                }
                
                .content {
                    position: absolute;
                    top: 50%;
                    left: 50%;
                    transform: translate(-50%, -50%);
                    width: 400px;
                    height: 200px;
                    border-radius: 10px;
                    background-color: white;
                    text-align: center;
                }
            
                #popup .content span {
                    font-size: 40px;
                    line-height: 75px;
                    font-weight: 700;
                    color: rgb(44, 69, 7);
                }
                
                h2 {
                    font-size: 24px;
                    text-align: center;
                }
                
                p {
                    font-size: 16px;
                    text-align: center;
                }
                
                .close {
                    position: absolute;
                    top: 10px;
                    right: 10px;
                    width: 30px;
                    height: 30px;
                    line-height: 30px;
                    border-radius: 50%;
                    background-color: red;
                    cursor: pointer;
                    text-decoration: none;
                    color: white;
                    font-weight: 600;
                }
                
                .close:hover {
                    background-color: #000000;
                    color: white;
                }                
            </style>
            <div id="popup">
                <div class="content">
                <h2>Green-M Thông Báo!</h2>
                <p>Cập nhật trạng thái đơn hàng thành công!.</p>
                <span>- Success -</span>
                <a href="../index.php?act=order" class="close">X</a>
                </div>
            </div>
        ';
    } else if(isset($cancel_order_up)) {
        $order = new order_lass();
        if($note != "") {
            $order->up_order_cancel($note, 'Đã hủy', $order_id);
            echo '
                <style>
                    .content {
                        position: absolute;
                        top: 50%;
                        left: 50%;
                        transform: translate(-50%, -50%);
                        width: 400px;
                        height: 200px;
                        border-radius: 10px;
                        background-color: white;
                    }
                    
                    .content {
                        animation: slide-in 1.5s ease-in-out;
                    }
                    
                    @keyframes slide-in {
                        0% {
                        top: -100%;
                        }
                    
                        100% {
                        top: 50%;
                        }
                    }
                    #popup {
                        position: fixed;
                        top: 0;
                        left: 0;
                        width: 100%;
                        height: 100%;
                        background-color: rgba(0, 0, 0, 0.6);
                        z-index: 1000;
                    }
                    
                    .content {
                        position: absolute;
                        top: 50%;
                        left: 50%;
                        transform: translate(-50%, -50%);
                        width: 400px;
                        height: 200px;
                        border-radius: 10px;
                        background-color: white;
                        text-align: center;
                    }
                
                    #popup .content span {
                        font-size: 40px;
                        line-height: 75px;
                        font-weight: 700;
                        color: rgb(44, 69, 7);
                    }
                    
                    h2 {
                        font-size: 24px;
                        text-align: center;
                    }
                    
                    p {
                        font-size: 16px;
                        text-align: center;
                    }
                    
                    .close {
                        position: absolute;
                        top: 10px;
                        right: 10px;
                        width: 30px;
                        height: 30px;
                        line-height: 30px;
                        border-radius: 50%;
                        background-color: red;
                        cursor: pointer;
                        text-decoration: none;
                        color: white;
                        font-weight: 600;
                    }
                    
                    .close:hover {
                        background-color: #000000;
                        color: white;
                    }                
                </style>
                <div id="popup">
                    <div class="content">
                    <h2>Green-M Thông Báo!</h2>
                    <p>Bạn đã hủy đơn hàng thành công!.</p>
                    <span>- Success -</span>
                    <a href="../index.php?act=order" class="close">X</a>
                    </div>
                </div>
            ';
        } else {
            echo '
                <style>
                    .content {
                        position: absolute;
                        top: 50%;
                        left: 50%;
                        transform: translate(-50%, -50%);
                        width: 400px;
                        height: 200px;
                        border-radius: 10px;
                        background-color: white;
                    }
                    
                    .content {
                        animation: slide-in 1.5s ease-in-out;
                    }
                    
                    @keyframes slide-in {
                        0% {
                        top: -100%;
                        }
                    
                        100% {
                        top: 50%;
                        }
                    }
                    #popup {
                        position: fixed;
                        top: 0;
                        left: 0;
                        width: 100%;
                        height: 100%;
                        background-color: rgba(0, 0, 0, 0.6);
                        z-index: 1000;
                    }
                    
                    .content {
                        position: absolute;
                        top: 50%;
                        left: 50%;
                        transform: translate(-50%, -50%);
                        width: 400px;
                        height: 200px;
                        border-radius: 10px;
                        background-color: white;
                        text-align: center;
                    }
                
                    #popup .content span {
                        font-size: 40px;
                        line-height: 75px;
                        font-weight: 700;
                        color: rgb(44, 69, 7);
                    }
                    
                    h2 {
                        font-size: 24px;
                        text-align: center;
                    }
                    
                    p {
                        font-size: 16px;
                        text-align: center;
                    }
                    
                    .close {
                        position: absolute;
                        top: 10px;
                        right: 10px;
                        width: 30px;
                        height: 30px;
                        line-height: 30px;
                        border-radius: 50%;
                        background-color: red;
                        cursor: pointer;
                        text-decoration: none;
                        color: white;
                        font-weight: 600;
                    }
                    
                    .close:hover {
                        background-color: #000000;
                        color: white;
                    }                
                </style>
                <div id="popup">
                    <div class="content">
                    <h2>Green-M Thông Báo!</h2>
                    <p>Bạn đã hủy đơn hàng thất bại, do không điền lí do hủy!.</p>
                    <span>- Error -</span>
                    <a href="../index.php?act=order" class="close">X</a>
                    </div>
                </div>
            ';
        }
    }
?>