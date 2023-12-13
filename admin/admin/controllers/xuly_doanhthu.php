<?php
    ob_start();
    extract($_REQUEST);
    if(session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    if (file_exists('../model/order.php')) {
        require "../model/order.php";
    }
    if(isset($check)&& $check == "searchNameOrder"){
    $order = new order_lass();
      $show=$order->searchNameorder($value);
      foreach($show as $items) {
        extract($items);
        $total_revenue = 0;
        $count_revenue = 0;
           foreach ($count as $jtems) {
              if($jtems['order_status'] == "Giao thành công") {
                 if ($account_id == $jtems['account_id']) {
                    $count_revenue += $jtems['order_total'];
                 }
              }
           }
           $total_revenue = $count_revenue * 0.03;
           $address = mb_substr($account_address, 0, 18, 'UTF-8') . '...';
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
                    <a href="../../public/index.php?act=mess_chat&from='.$_SESSION['83x86']['account_id'].'&to='.$account_id.'"><i class="fab fa-facebook-messenger"></i></a>
                    </button>
                 </td>
              </tr>
           ';
     }

    }else if(isset($check)&& $check == "searchPhoneOrder"){
        $order = new order_lass();
        $show=$order->searchPhoneorder($value);
        foreach($show as $items) {
          extract($items);
          $total_revenue = 0;
          $count_revenue = 0;
             foreach ($count as $jtems) {
                if($jtems['order_status'] == "Giao thành công") {
                   if ($account_id == $jtems['account_id']) {
                      $count_revenue += $jtems['order_total'];
                   }
                }
             }
             $total_revenue = $count_revenue * 0.03;
             $address = mb_substr($account_address, 0, 18, 'UTF-8') . '...';
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
                      <a href="../../public/index.php?act=mess_chat&from='.$_SESSION['83x86']['account_id'].'&to='.$account_id.'"><i class="fab fa-facebook-messenger"></i></a>
                      </button>
                   </td>
                </tr>
             ';
       }
  
    }else if(isset($check)&& $check == "searchAllOrder"){
        $order = new order_lass();
        $show=$order->show_order();
        foreach($show as $items) {
          extract($items);
          $total_revenue = 0;
          $count_revenue = 0;
             foreach ($count as $jtems) {
                if($jtems['order_status'] == "Giao thành công") {
                   if ($account_id == $jtems['account_id']) {
                      $count_revenue += $jtems['order_total'];
                   }
                }
             }
             $total_revenue = $count_revenue * 0.03;
             $address = mb_substr($account_address, 0, 18, 'UTF-8') . '...';
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
                      <a href="../../public/index.php?act=mess_chat&from='.$_SESSION['83x86']['account_id'].'&to='.$account_id.'"><i class="fab fa-facebook-messenger"></i></a>
                      </button>
                   </td>
                </tr>
             ';
       }
  
    }
    if(isset($check) && $check == "Fill_doanhthu") {
        $order = new order_lass();
        $count = $order->show_order();
        $show = $order->show_doanhthu();
        if($fill == "day") {
            $i = 0;
            $time_now = date("Y-m-d");
            foreach($show as $items) {
                extract($items);
                $total_revenue = 0;
                $count_revenue = 0;
                foreach ($count as $jtems) {
                    if($jtems['order_status'] == "Giao thành công") {
                        if ($account_id == $jtems['account_id']) {
                            $time = strtotime($jtems['time_reg']);
                            $time_get = date("Y-m-d", $time);
                            if ($time_now == $time_get) {
                                $count_revenue += $jtems['order_total'];
                            }
                        }
                    }
                }
                $total_revenue = $count_revenue * 0.03;
                $address = mb_substr($account_address, 0, 18, 'UTF-8') . '...';
                $i++;
                echo '
                   <tr>
                      <td>'. $i .'</td>
                      <td>'. $account_name .'</td>
                      <td class="address-user">'. $address .'.<input type="hidden" value="'. $account_address .'"></td>
                      <td>'. $account_phone .'</td>
                      <td>$'. $total_revenue .'</td>
                      <td>'. $order_count .'</td>
                      <td class="kkk2">
                         <button>
                         <a href="../../public/index.php?act=mess_chat&from='.$_SESSION['83x86']['account_id'].'&to='.$account_id.'"><i class="fab fa-facebook-messenger"></i></a>
                         </button>
                      </td>
                   </tr>
                ';
             }
        } else if($fill == "month") {
            $time_now = date("Y-m");
            $i = 0;
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
                $address = mb_substr($account_address, 0, 18, 'UTF-8') . '...';
                $i++;
                echo '
                   <tr>
                      <td>'. $i .'</td>
                      <td>'. $account_name .'</td>
                      <td class="address-user">'. $address .'.<input type="hidden" value="'. $account_address .'"></td>
                      <td>'. $account_phone .'</td>
                      <td>$'. $total_revenue .'</td>
                      <td>'. $order_count .'</td>
                      <td class="kkk2">
                         <button>
                         <a href="../../public/index.php?act=mess_chat&from='.$_SESSION['83x86']['account_id'].'&to='.$account_id.'"><i class="fab fa-facebook-messenger"></i></a>
                         </button>
                      </td>
                   </tr>
                ';
             }
        } else if($fill == "year") {
            $time_now = date("Y");
            $i = 0;
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
                $address = mb_substr($account_address, 0, 18, 'UTF-8') . '...';
                $i++;
                echo '
                   <tr>
                      <td>'. $i .'</td>
                      <td>'. $account_name .'</td>
                      <td class="address-user">'. $address .'.<input type="hidden" value="'. $account_address .'"></td>
                      <td>'. $account_phone .'</td>
                      <td>$'. $total_revenue .'</td>
                      <td>'. $order_count .'</td>
                      <td class="kkk2">
                         <button>
                         <a href="../../public/index.php?act=mess_chat&from='.$_SESSION['83x86']['account_id'].'&to='.$account_id.'"><i class="fab fa-facebook-messenger"></i></a>
                         </button>
                      </td>
                   </tr>
                ';
             }
        } else {
            $i = 0;
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
                $address = mb_substr($account_address, 0, 18, 'UTF-8') . '...';
                $i++;
                echo '
                   <tr>
                      <td>'. $i .'</td>
                      <td>'. $account_name .'</td>
                      <td class="address-user">'. $address .'.<input type="hidden" value="'. $account_address .'"></td>
                      <td>'. $account_phone .'</td>
                      <td>$'. $total_revenue .'</td>
                      <td>'. $order_count .'</td>
                      <td class="kkk2">
                         <button>
                         <a href="../../public/index.php?act=mess_chat&from='.$_SESSION['83x86']['account_id'].'&to='.$account_id.'"><i class="fab fa-facebook-messenger"></i></a>
                         </button>
                      </td>
                   </tr>
                ';
            }
        }
    }
?>