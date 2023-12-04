<?php
    ob_start();
    extract($_REQUEST);
    if(session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    if (file_exists('../model/order.php')) {
        require "../model/order.php";
    }

    if(!isset($_SESSION['83x86'])) {
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
                <p>Bạn không có quyền truy cập trang này!.</p>
                <span>- Error -</span>
                <a href="../../../public/index.php" class="close">X</a>
                </div>
            </div>
        ';
    }

    if(isset($check) && $check == "Fill_doanhthu") {
        $order = new order_lass();
        $count = $order->show_order();
        $show = $order->show_doanhthu();
        if($fill == "day") {
            $time_now = date("Y-m-d");
            foreach($show as $items) {
                extract($items);
                $total_revenue = 0;
                $count_revenue = 0;
                foreach ($count as $jtems) {
                    if($jtems['order_status'] == "Giao thành công") {
                        if($account_id == $jtems['account_id']) {
                            $time = strtotime($jtems['time_reg']);
                            $time_get = date("Y-m-d", $time);
                            if ($time_now == $time_get) {
                                $count_revenue += $jtems['order_total'];
                            }
                        }
                    }
                }
                $total_revenue = $count_revenue * 0.03;
                $address = substr($account_address, 0, 18) . '...';
                echo '
                   <tr>
                      <td>1</td>
                      <td>'. $account_name .'</td>
                      <td class="address-user">'. $address .'.<input type="hidden" value="'. $account_address .'"></td>
                      <td>'. $account_phone .'</td>
                      <td>$'. $total_revenue .'</td>
                      <td>'. $order_count .'</td>
                      <td class="kkk2">
                         <button>
                         <i class="fas fa-eye"></i>
                         </button>
                         <button>
                         <i class="fas fa-pen"></i></i>
                         </button>
                      </td>
                   </tr>
                ';
             }
        } else if($fill == "month") {
            $time_now = date("Y-m");
            foreach($show as $items) {
                extract($items);
                $total_revenue = 0;
                $count_revenue = 0;
                foreach ($count as $jtems) {
                    if($jtems['order_status'] == "Giao thành công") {
                        if($account_id == $jtems['account_id']) {
                            $time = strtotime($jtems['time_reg']);
                            $time_get = date("Y-m", $time);
                            if ($time_now == $time_get) {
                                $count_revenue += $jtems['order_total'];
                            }
                        }
                    }
                }
                $total_revenue = $count_revenue * 0.03;
                $address = substr($account_address, 0, 18) . '...';
                echo '
                   <tr>
                      <td>1</td>
                      <td>'. $account_name .'</td>
                      <td class="address-user">'. $address .'.<input type="hidden" value="'. $account_address .'"></td>
                      <td>'. $account_phone .'</td>
                      <td>$'. $total_revenue .'</td>
                      <td>'. $order_count .'</td>
                      <td class="kkk2">
                         <button>
                         <i class="fas fa-eye"></i>
                         </button>
                         <button>
                         <i class="fas fa-pen"></i></i>
                         </button>
                      </td>
                   </tr>
                ';
             }
        } else if($fill == "year") {
            $time_now = date("Y");
            foreach($show as $items) {
                extract($items);
                $total_revenue = 0;
                $count_revenue = 0;
                foreach ($count as $jtems) {
                    if($jtems['order_status'] == "Giao thành công") {
                        if($account_id == $jtems['account_id']) {
                            $time = strtotime($jtems['time_reg']);
                            $time_get = date("Y", $time);
                            if ($time_now == $time_get) {
                                $count_revenue += $jtems['order_total'];
                            }
                        }
                    }
                }
                $total_revenue = $count_revenue * 0.03;
                $address = substr($account_address, 0, 18) . '...';
                echo '
                   <tr>
                      <td>1</td>
                      <td>'. $account_name .'</td>
                      <td class="address-user">'. $address .'.<input type="hidden" value="'. $account_address .'"></td>
                      <td>'. $account_phone .'</td>
                      <td>$'. $total_revenue .'</td>
                      <td>'. $order_count .'</td>
                      <td class="kkk2">
                         <button>
                         <i class="fas fa-eye"></i>
                         </button>
                         <button>
                         <i class="fas fa-pen"></i></i>
                         </button>
                      </td>
                   </tr>
                ';
             }
        } else {
            foreach($show as $items) {
                extract($items);
                $total_revenue = 0;
                $count_revenue = 0;
                foreach ($count as $jtems) {
                    if($jtems['order_status'] == "Giao thành công") {
                        if($account_id == $jtems['account_id']) {
                            $count_revenue += $jtems['order_total'];
                        }
                    }
                }
                $total_revenue = $count_revenue * 0.03;
                $address = substr($account_address, 0, 18) . '...';
                echo '
                   <tr>
                      <td>1</td>
                      <td>'. $account_name .'</td>
                      <td class="address-user">'. $address .'.<input type="hidden" value="'. $account_address .'"></td>
                      <td>'. $account_phone .'</td>
                      <td>$'. $total_revenue .'</td>
                      <td>'. $order_count .'</td>
                      <td class="kkk2">
                         <button>
                         <i class="fas fa-eye"></i>
                         </button>
                         <button>
                         <i class="fas fa-pen"></i></i>
                         </button>
                      </td>
                   </tr>
                ';
            }
        }
    }
?>