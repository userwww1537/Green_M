<?php
    ob_start();
    extract($_REQUEST);
    if(session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    if (file_exists('../model/account.php')) {
        require "../model/account.php";
    }
    if (file_exists('../../app/mailer.php')) {
        require "../../app/mailer.php";
    }

    $mail = new Mailer();
    $account = new account_lass();

    if(isset($check) && $check == "sent_mess") {
        $title = "Green-M -> Thông báo tới bạn!";
        $content = "<h1>$mess</h1>";
        $mail->sendMail($title, $content, $account_email);
        $account->sent_notify($mess, $account_id);
    } else if(isset($check) && $check == "sent_lock") {
        $account->sent_lock("Khóa", $lido, $account_id);
    } else if(isset($check)&& $check == "searchEmailshop"){
        $show=$account->searchemail($value);
        $i = 0;
        foreach($show as $items) {
           extract($items);
           $address = substr($account_address, 0, 12) . '...';
           $i++;
           echo '
           <tr>
                 <input type="hidden" value="'. $account_id .'" class="account-id">
                 <input type="hidden" value="'. $account_email .'" class="account-email">
                 <input type="hidden" value="'. $account_status .'" class="account-status">
                 <td>'. $i .'</td>
                 <td>'. $account_name .'</td> 
                 <td id="verified-mail">'; echo ($account_verified_mail == "Đã xác thực") ? $account_email : '<del class="not_verified">' . $account_email . '</del>'; echo '</td>
                 <td>'. $account_phone .'</td>
                 <td class="address-user">'. $address .'.<input type="hidden" value="'. $account_address .'"></td>
                 <td class="status-box">
                 '; if($account_status == "Khóa") {
                    echo '<span class="status pending"></span>Đã bị khóa';
                 }  else if($account_status == "Online") {
                    echo '<span class="status online"></span>'. $account_status .'';
                 } else {
                    echo '<span class="status offline"></span>'. $account_status .'';
                 } echo'
                 </td>
                 <td>'. $soLuongDonHang .'</td>
                 <td class="option-user">Tùy chọn</td>
              </tr>
           ';
        }
    } else if(isset($check)&& $check == "searchNameshop"){
      $show=$account->searchUSER($value);
      $i = 0;
      foreach($show as $items) {
         extract($items);
         $address = substr($account_address, 0, 12) . '...';
         $i++;
         echo '
         <tr>
               <input type="hidden" value="'. $account_id .'" class="account-id">
               <input type="hidden" value="'. $account_email .'" class="account-email">
               <input type="hidden" value="'. $account_status .'" class="account-status">
               <td>'. $i .'</td>
               <td>'. $account_name .'</td> 
               <td id="verified-mail">'; echo ($account_verified_mail == "Đã xác thực") ? $account_email : '<del class="not_verified">' . $account_email . '</del>'; echo '</td>
               <td>'. $account_phone .'</td>
               <td class="address-user">'. $address .'.<input type="hidden" value="'. $account_address .'"></td>
               <td class="status-box">
               '; if($account_status == "Khóa") {
                  echo '<span class="status pending"></span>Đã bị khóa';
               }  else if($account_status == "Online") {
                  echo '<span class="status online"></span>'. $account_status .'';
               } else {
                  echo '<span class="status offline"></span>'. $account_status .'';
               } echo'
               </td>
               <td>'. $soLuongDonHang .'</td>
               <td class="option-user">Tùy chọn</td>
            </tr>
         ';
      }
  }
    else if(isset($check)&& $check == "searchPhoneshop"){
        $show=$account->searchPhone($value);
        $i = 0;
        foreach($show as $items) {
           extract($items);
           $address = substr($account_address, 0, 12) . '...';
           $i++;
           echo '
           <tr>
                 <input type="hidden" value="'. $account_id .'" class="account-id">
                 <input type="hidden" value="'. $account_email .'" class="account-email">
                 <input type="hidden" value="'. $account_status .'" class="account-status">
                 <td>'. $i .'</td>
                 <td>'. $account_name .'</td> 
                 <td id="verified-mail">'; echo ($account_verified_mail == "Đã xác thực") ? $account_email : '<del class="not_verified">' . $account_email . '</del>'; echo '</td>
                 <td>'. $account_phone .'</td>
                 <td class="address-user">'. $address .'.<input type="hidden" value="'. $account_address .'"></td>
                 <td class="status-box">
                 '; if($account_status == "Khóa") {
                    echo '<span class="status pending"></span>Đã bị khóa';
                 }  else if($account_status == "Online") {
                    echo '<span class="status online"></span>'. $account_status .'';
                 } else {
                    echo '<span class="status offline"></span>'. $account_status .'';
                 } echo'
                 </td>
                 <td>'. $soLuongDonHang .'</td>
                 <td class="option-user">Tùy chọn</td>
              </tr>
           ';
        }
    }
    else if(isset($check)&& $check == "searchStatusshop"){
        $show=$account->searchStatus($value);
        $i = 0;
        foreach($show as $items) {
           extract($items);
           $address = substr($account_address, 0, 12) . '...';
           $i++;
           echo '
           <tr>
                 <input type="hidden" value="'. $account_id .'" class="account-id">
                 <input type="hidden" value="'. $account_email .'" class="account-email">
                 <input type="hidden" value="'. $account_status .'" class="account-status">
                 <td>'. $i .'</td>
                 <td>'. $account_name .'</td> 
                 <td id="verified-mail">'; echo ($account_verified_mail == "Đã xác thực") ? $account_email : '<del class="not_verified">' . $account_email . '</del>'; echo '</td>
                 <td>'. $account_phone .'</td>
                 <td class="address-user">'. $address .'.<input type="hidden" value="'. $account_address .'"></td>
                 <td class="status-box">
                 '; if($account_status == "Khóa") {
                    echo '<span class="status pending"></span>Đã bị khóa';
                 }  else if($account_status == "Online") {
                    echo '<span class="status online"></span>'. $account_status .'';
                 } else {
                    echo '<span class="status offline"></span>'. $account_status .'';
                 } echo'
                 </td>
                 <td>'. $soLuongDonHang .'</td>
                 <td class="option-user">Tùy chọn</td>
              </tr>
           ';
        }
    }else if(isset($check) && $check == "searchAllshop"){
      $show=$account->show_shop();
      $i = 0;
      foreach($show as $items) {
         extract($items);
         $address = substr($account_address, 0, 12) . '...';
         $i++;
         echo '
         <tr>
               <input type="hidden" value="'. $account_id .'" class="account-id">
               <input type="hidden" value="'. $account_email .'" class="account-email">
               <input type="hidden" value="'. $account_status .'" class="account-status">
               <td>'. $i .'</td>
               <td>'. $account_name .'</td> 
               <td id="verified-mail">'; echo ($account_verified_mail == "Đã xác thực") ? $account_email : '<del class="not_verified">' . $account_email . '</del>'; echo '</td>
               <td>'. $account_phone .'</td>
               <td class="address-user">'. $address .'.<input type="hidden" value="'. $account_address .'"></td>
               <td class="status-box">
               '; if($account_status == "Khóa") {
                  echo '<span class="status pending"></span>Đã bị khóa';
               }  else if($account_status == "Online") {
                  echo '<span class="status online"></span>'. $account_status .'';
               } else {
                  echo '<span class="status offline"></span>'. $account_status .'';
               } echo'
               </td>
               <td>'. $soLuongDonHang .'</td>
               <td class="option-user">Tùy chọn</td>
            </tr>
         ';
      }
      

    }
    
    
    
    
    //chức năng tìm kiếm của user
    if(isset($check)&& $check == "searchNameuser"){
      $show=$account->searchNameuser($value);
      $i = 0;
      foreach($show as $items) {
         extract($items);
         $address = substr($account_address, 0, 12) . '...';
         $i++;
         echo '
         <tr>
               <input type="hidden" value="'. $account_id .'" class="account-id">
               <input type="hidden" value="'. $account_email .'" class="account-email">
               <input type="hidden" value="'. $account_status .'" class="account-status">
               <td>'. $i .'</td>
               <td>'. $account_username .'</td> 
               <td id="verified-mail">'; echo ($account_verified_mail == "Đã xác thực") ? $account_email : '<del class="not_verified">' . $account_email . '</del>'; echo '</td>
               <td>'. $account_phone .'</td>
               <td class="address-user">'. $address .'.<input type="hidden" value="'. $account_address .'"></td>
               <td class="status-box">
               '; if($account_status == "Khóa") {
                  echo '<span class="status pending"></span>Đã bị khóa';
               }  else if($account_status == "Online") {
                  echo '<span class="status online"></span>'. $account_status .'';
               } else {
                  echo '<span class="status offline"></span>'. $account_status .'';
               } echo'
               </td>
               <td class="option-user">Tùy chọn</td>
            </tr>
         ';
      }
    }else if(isset($check)&& $check == "searchEmailuser"){
      $show=$account->searchEmailuser($value);
      $i = 0;
      foreach($show as $items) {
         extract($items);
         $address = substr($account_address, 0, 12) . '...';
         $i++;
         echo '
         <tr>
               <input type="hidden" value="'. $account_id .'" class="account-id">
               <input type="hidden" value="'. $account_email .'" class="account-email">
               <input type="hidden" value="'. $account_status .'" class="account-status">
               <td>'. $i .'</td>
               <td>'. $account_username .'</td> 
               <td id="verified-mail">'; echo ($account_verified_mail == "Đã xác thực") ? $account_email : '<del class="not_verified">' . $account_email . '</del>'; echo '</td>
               <td>'. $account_phone .'</td>
               <td class="address-user">'. $address .'.<input type="hidden" value="'. $account_address .'"></td>
               <td class="status-box">
               '; if($account_status == "Khóa") {
                  echo '<span class="status pending"></span>Đã bị khóa';
               }  else if($account_status == "Online") {
                  echo '<span class="status online"></span>'. $account_status .'';
               } else {
                  echo '<span class="status offline"></span>'. $account_status .'';
               } echo'
               </td>
               <td class="option-user">Tùy chọn</td>
            </tr>
         ';
      }
    }else if(isset($check)&& $check == "searchPhoneuser"){
      $show=$account->searchPhoneuser($value);
      $i = 0;
      foreach($show as $items) {
         extract($items);
         $address = substr($account_address, 0, 12) . '...';
         $i++;
         echo '
         <tr>
               <input type="hidden" value="'. $account_id .'" class="account-id">
               <input type="hidden" value="'. $account_email .'" class="account-email">
               <input type="hidden" value="'. $account_status .'" class="account-status">
               <td>'. $i .'</td>
               <td>'. $account_username .'</td> 
               <td id="verified-mail">'; echo ($account_verified_mail == "Đã xác thực") ? $account_email : '<del class="not_verified">' . $account_email . '</del>'; echo '</td>
               <td>'. $account_phone .'</td>
               <td class="address-user">'. $address .'.<input type="hidden" value="'. $account_address .'"></td>
               <td class="status-box">
               '; if($account_status == "Khóa") {
                  echo '<span class="status pending"></span>Đã bị khóa';
               }  else if($account_status == "Online") {
                  echo '<span class="status online"></span>'. $account_status .'';
               } else {
                  echo '<span class="status offline"></span>'. $account_status .'';
               } echo'
               </td>
               <td class="option-user">Tùy chọn</td>
            </tr>
         ';
      }
    }else if(isset($check)&& $check == "searchStatususer"){
      $show=$account->searchStatususer($value);
      $i = 0;
      foreach($show as $items) {
         extract($items);
         $address = substr($account_address, 0, 12) . '...';
         $i++;
         echo '
         <tr>
               <input type="hidden" value="'. $account_id .'" class="account-id">
               <input type="hidden" value="'. $account_email .'" class="account-email">
               <input type="hidden" value="'. $account_status .'" class="account-status">
               <td>'. $i .'</td>
               <td>'. $account_username .'</td> 
               <td id="verified-mail">'; echo ($account_verified_mail == "Đã xác thực") ? $account_email : '<del class="not_verified">' . $account_email . '</del>'; echo '</td>
               <td>'. $account_phone .'</td>
               <td class="address-user">'. $address .'.<input type="hidden" value="'. $account_address .'"></td>
               <td class="status-box">
               '; if($account_status == "Khóa") {
                  echo '<span class="status pending"></span>Đã bị khóa';
               }  else if($account_status == "Online") {
                  echo '<span class="status online"></span>'. $account_status .'';
               } else {
                  echo '<span class="status offline"></span>'. $account_status .'';
               } echo'
               </td>
               <td class="option-user">Tùy chọn</td>
            </tr>
         ';
      }
    }else if(isset($check)&& $check == "searchAlluser"){
      $show=$account->show_account();
      $i = 0;
      foreach($show as $items) {
         extract($items);
         $address = substr($account_address, 0, 12) . '...';
         $i++;
         echo '
         <tr>
               <input type="hidden" value="'. $account_id .'" class="account-id">
               <input type="hidden" value="'. $account_email .'" class="account-email">
               <input type="hidden" value="'. $account_status .'" class="account-status">
               <td>'. $i .'</td>
               <td>'. $account_username .'</td> 
               <td id="verified-mail">'; echo ($account_verified_mail == "Đã xác thực") ? $account_email : '<del class="not_verified">' . $account_email . '</del>'; echo '</td>
               <td>'. $account_phone .'</td>
               <td class="address-user">'. $address .'.<input type="hidden" value="'. $account_address .'"></td>
               <td class="status-box">
               '; if($account_status == "Khóa") {
                  echo '<span class="status pending"></span>Đã bị khóa';
               }  else if($account_status == "Online") {
                  echo '<span class="status online"></span>'. $account_status .'';
               } else {
                  echo '<span class="status offline"></span>'. $account_status .'';
               } echo'
               </td>
               <td class="option-user">Tùy chon</td>
            </tr>
         ';
      }
    }
  
    
?>