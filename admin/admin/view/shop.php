<style>
   .popup {
      position: fixed;
      top: -50%;
      left: 50%;
      transform: translate(-50%, -50%);
      background-color: #006eff;
      padding: 20px;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
      z-index: 9999;
      transition: all .5s ease;
   }
   
   .popup .close-noti-all {
      position: absolute;
      top: 10px;
      right: 10px;
      color: #fff;
      cursor: pointer;
   }
   
   .popup .form {
      display: flex;
      align-items: center;
      justify-content: center;
      margin-top: 20px;
   }
   
   .popup .form input[type="text"] {
      padding: 10px;
      border-radius: 5px;
      border: none;
      margin-right: 10px;
   }
   
   .popup .form button[type="submit"] {
      padding: 10px 20px;
      border-radius: 5px;
      border: none;
      background-color: #fff;
      color: #006eff;
      cursor: pointer;
   }
</style>
   
<div class="popup">
   <div class="close-noti-all">
   <i class="fal fa-times-hexagon"></i>
   </div>
   <div class="form">
   <input type="text" placeholder="Thông báo cần gửi" id="val-noti-all">
   <button type="submit" class="btn-noti-all">Gửi</button>
   </div>
</div>
<main>
         <div class="wrapper flex">
            <div class="projects-category">
               <div class="card-header flex flex-tinh2">
                  <h3>Quản lý shop</h3>
                  <button class="sent-noti-all">Gửi thông báo All Shop <i class="fas fa-plus"></i></button>
               </div>
               <script>
                  $(".sent-noti-all").on('click', function() {
                     $(".popup").css('top', '50%');
                  });

                  $(".close-noti-all").on('click', function() {
                     $(".popup").css('top', '-50%');
                  });

                  $(".btn-noti-all").on('click', function() {
                     var val = $("#val-noti-all").val();
                     if(val == '') {
                        $(".error_noti").text('Vui lòng nhập nội dung!');
                        show_error();
                     } else {
                        $.ajax({
                           url: "controllers/xuly_user.php",
                           method: "POST",
                           data: {
                              check: "notiShopAll",
                              value: val
                           },
                           success: function(data) {
                              $(".success_noti").text('Đã gửi thông báo!');
                              show_success();
                              $(".popup").css('top', '-50%');
                           }
                        });
                     }
                  });
               </script>
               <table>
                  <thead>
                     <th>
                        <tr>
                           <td>STT</td>
                           <td>Tên cửa hàng</td>
                           <td>Email</td>
                           <td>Số điện thoại</td>
                           <td>Địa chỉ</td>
                           <td>Trạng thái</td>
                           <td>Đơn hàng đã bán</td>
                           <td>Thao tác</td>
                        </tr>
                     </th>
                  </thead>

                  <tbody>
                     <?php
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
                                 <td>'. $soLuongDonHang .'</td>';
                                 if ($account_status == 'Khóa') {
                                    echo '
                                                         <td class="option-user-lock">Tùy chọn</td>
                                                      ';
                                 } else {
                                    echo '
                                                         <td class="option-user">Tùy chọn</td>
                                                      ';
                                 }
                                 echo '
                                             </tr>
                                          ';
                        }
                     ?>      
                    
                  </tbody>
               </table>
            </div>
         </div>
      </main>
   </div>
<div class="box-log">
   <i class="fas fa-times daux"></i>
   <input type="hidden" class="id-account-box">
   <input type="hidden" class="email-account-box">
   <div class="form-group">
      <label>Gửi thông báo</label>
      <input type="text" placeholder="Lời nhắn..." class="val-mess">
      <input type="submit" value="Gửi" class="sent-notify-user">
   </div>
   <hr>
   <div class="form-group">
      <label>Khóa tài khoản:</label>
      <input type="text" placeholder="Lí do..." class="val-lido">
      <input type="submit" value="Khoá tài khoản" class="sent-lock-user">
   </div>
</div>
<div class="box-log-lock">
   <i class="fas fa-times daux"></i>
   <input type="hidden" class="id-account-box">
   <input type="hidden" class="email-account-box">
   <div class="form-group">
      <label>Gửi thông báo</label>
      <input type="text" placeholder="Lời nhắn..." class="val-mess">
      <input type="submit" value="Gửi" class="sent-notify-user">
   </div>
   <hr>
   <div class="form-group">
      <label>Mở khóa tài khoản:</label>
      <input type="submit" value="Mở khóa tài khoản" class="unlock-lock-user">
   </div>
</div>
   <div class="test-bug" style="font-size: 100px;"></div>
   <script>
      $(".address-user").on('click', function() {
         var address = $(this).find('input').val();
         window.open("https://www.google.com/maps/place/" + address, "_blank");
      });

                     $(".option-user").on('click', function() {
                        var account_id = $(this).closest('tr').find(".account-id").val();
                        var account_email = $(this).closest('tr').find(".account-email").val();
                        var account_status = $(this).closest('tr').find(".account-status").val();
                        $(".id-account-box").val(account_id);
                        $(".email-account-box").val(account_email);
                        $(".box-log").css("right", "0px");
                     });

                     $(".daux").on('click', function() {
                        $(".box-log").css("right", "-100%");
                     });

                     $(".sent-notify-user").on('click', function() {
                        var account_id = $(".id-account-box").val();
                        var account_email = $(".email-account-box").val();
                        var mess = $(".val-mess").val();
                        if(mess == "") {
                           $(".error_noti").text('Vui lòng nhập thông báo!');
                           show_error();
                        } else {
                           $.ajax({
                              url: "controllers/xuly_user.php",
                              method: "POST",
                              data: {
                                 check: "sent_mess",
                                 account_id: account_id,
                                 account_email: account_email,
                                 mess: mess
                              },
                              success: function(data) {
                                 $(".val-mess").val("");
                                 $(".box-log").css("right", "-100%");                  
                              }
                           });
                        }
                     });

                     $(".sent-lock-user").on('click', function() {
                        var account_id = $(".id-account-box").val();
                        var lido = $(".val-lido").val();

                        if(lido == "") {
                           $(".error_noti").text('Vui lòng nhập lí do!');
                           show_error();
                        } else {
                           $.ajax({
                              url: "controllers/xuly_user.php",
                              method: "POST",
                              data: {
                                 check: "sent_lock",
                                 account_id: account_id,
                                 lido: lido
                              },
                              success: function(data) {
                                 $(".val-lido").val("");
                                 $(".box-log").css("right", "-100%");
                                 $(".success_noti").text('Đã khóa tài khoản!');
                                 show_success();    
                              }
                           });
                        }
                     });

                     $(".unlock-lock-user").on('click', function() {
                        var account_id = $(".id-account-box").val();
                        $.ajax({
                           url: "controllers/xuly_user.php",
                           method: "POST",
                           data: {
                              check: "unl_lock",
                              account_id: account_id
                           },
                           success: function(data) {
                              $(".box-log-lock").css("right", "-100%");
                              $(".success_noti").text('Đã mở khóa tài khoản!');
                              show_success();
                           }
                        });
                     });

                     $(".option-user-lock").on('click', function() {
                        var account_id = $(this).closest('tr').find(".account-id").val();
                        var account_email = $(this).closest('tr').find(".account-email").val();
                        var account_status = $(this).closest('tr').find(".account-status").val();
                        $(".id-account-box").val(account_id);
                        $(".email-account-box").val(account_email);
                        $(".box-log-lock").css("right", "0px");
                     });

                     $(".daux").on('click', function() {
                        $(".box-log").css("right", "-100%");
                        $(".box-log-lock").css("right", "-100%");
                     });

      $(".unlock-lock-user").on('click', function() {
         var account_id = $(".id-account-box").val();
         $.ajax({
            url: "controllers/xuly_user.php",
            method: "POST",
            data: {
               check: "unl_lock",
               account_id: account_id
            },
            success: function(data) {
               $(".box-log-lock").css("right", "-100%");
               $(".success_noti").text('Đã mở khóa tài khoản!');
               show_success();
            }
         });
      });

      $(".option-user-lock").on('click', function() {
         var account_id = $(this).closest('tr').find(".account-id").val();
         var account_email = $(this).closest('tr').find(".account-email").val();
         var account_status = $(this).closest('tr').find(".account-status").val();
         $(".id-account-box").val(account_id);
         $(".email-account-box").val(account_email);
         $(".box-log-lock").css("right", "0px");
      });

      $(".daux").on('click', function() {
         $(".box-log").css("right", "-100%");
         $(".box-log-lock").css("right", "-100%");
      });
      
   </script>
    
<script>

   $(document).ready(function() {
      $("#proDmSearch").on('change', function() {
         var value = $(this).val();
         if(value === '') {
            $('.value-search-pro').prop('readonly', true);
            $('.value-search-pro').attr('placeholder', 'Chọn chế độ tìm...');
         } else {
            if(value == 'name') {
            $('.value-search-pro').prop('readonly', false);
            $('.value-search-pro').attr('placeholder', 'Điền Tên KH shop cần tìm...');
            } else if(value == 'email') {
            $('.value-search-pro').prop('readonly', false);
            $('.value-search-pro').attr('placeholder', 'Điền email cần tìm...');
            }  else if(value= 'phone'){
            $('.value-search-pro').prop('readonly', false);
            $('.value-search-pro').attr('placeholder', 'Điền SĐT KH cần tìm...');
            } else{
               $('.value-search-pro').prop('readonly', false);
            $('.value-search-pro').attr('placeholder', 'Điền trạng thái KH cần tìm...');
            }
         }
      });

      $(".value-search-pro").on('keyup', function() {
         var value = $(this).val();
         var check = $("#proDmSearch").val();
         if(value != '') {   
            if(check == "name") {
               $.ajax({
                  url: "controllers/xuly_user.php",
                  method: "POST",
                  data: {
                     check: "searchNameshop",
                     value: value
                  },
                  success: function(data) {
                     $('tbody').html(data);
                     $(".option-user").on('click', function() {
                        var account_id = $(this).closest('tr').find(".account-id").val();
                        var account_email = $(this).closest('tr').find(".account-email").val();
                        var account_status = $(this).closest('tr').find(".account-status").val();
                        $(".id-account-box").val(account_id);
                        $(".email-account-box").val(account_email);
                        $(".box-log").css("right", "0px");
                     });

                     $(".daux").on('click', function() {
                        $(".box-log").css("right", "-100%");
                     });

                     $(".sent-notify-user").on('click', function() {
                        var account_id = $(".id-account-box").val();
                        var account_email = $(".email-account-box").val();
                        var mess = $(".val-mess").val();
                        if(mess == "") {
                           $(".error_noti").text('Vui lòng nhập thông báo!');
                           show_error();
                        } else {
                           $.ajax({
                              url: "controllers/xuly_user.php",
                              method: "POST",
                              data: {
                                 check: "sent_mess",
                                 account_id: account_id,
                                 account_email: account_email,
                                 mess: mess
                              },
                              success: function(data) {
                                 $(".val-mess").val("");
                                 $(".box-log").css("right", "-100%");                  
                              }
                           });
                        }
                     });

                     $(".sent-lock-user").on('click', function() {
                        var account_id = $(".id-account-box").val();
                        var lido = $(".val-lido").val();

                        if(lido == "") {
                           $(".error_noti").text('Vui lòng nhập lí do!');
                           show_error();
                        } else {
                           $.ajax({
                              url: "controllers/xuly_user.php",
                              method: "POST",
                              data: {
                                 check: "sent_lock",
                                 account_id: account_id,
                                 lido: lido
                              },
                              success: function(data) {
                                 $(".val-lido").val("");
                                 $(".box-log").css("right", "-100%");
                                 $(".success_noti").text('Đã khóa tài khoản!');
                                 show_success();    
                              }
                           });
                        }
                     });

                     $(".unlock-lock-user").on('click', function() {
                        var account_id = $(".id-account-box").val();
                        $.ajax({
                           url: "controllers/xuly_user.php",
                           method: "POST",
                           data: {
                              check: "unl_lock",
                              account_id: account_id
                           },
                           success: function(data) {
                              $(".box-log-lock").css("right", "-100%");
                              $(".success_noti").text('Đã mở khóa tài khoản!');
                              show_success();
                           }
                        });
                     });

                     $(".option-user-lock").on('click', function() {
                        var account_id = $(this).closest('tr').find(".account-id").val();
                        var account_email = $(this).closest('tr').find(".account-email").val();
                        var account_status = $(this).closest('tr').find(".account-status").val();
                        $(".id-account-box").val(account_id);
                        $(".email-account-box").val(account_email);
                        $(".box-log-lock").css("right", "0px");
                     });

                     $(".daux").on('click', function() {
                        $(".box-log").css("right", "-100%");
                        $(".box-log-lock").css("right", "-100%");
                     });
                  }
               });
            } else if(check == "email") {
               $.ajax({
                  url: "controllers/xuly_user.php",
                  method: "POST",
                  data: {
                     check: "searchEmailshop",
                     value: value
                  },
                  success: function(data) {
                     $('tbody').html(data);
                     $(".option-user").on('click', function() {
                        var account_id = $(this).closest('tr').find(".account-id").val();
                        var account_email = $(this).closest('tr').find(".account-email").val();
                        var account_status = $(this).closest('tr').find(".account-status").val();
                        $(".id-account-box").val(account_id);
                        $(".email-account-box").val(account_email);
                        $(".box-log").css("right", "0px");
                     });

                     $(".daux").on('click', function() {
                        $(".box-log").css("right", "-100%");
                     });

                     $(".sent-notify-user").on('click', function() {
                        var account_id = $(".id-account-box").val();
                        var account_email = $(".email-account-box").val();
                        var mess = $(".val-mess").val();
                        if(mess == "") {
                           $(".error_noti").text('Vui lòng nhập thông báo!');
                           show_error();
                        } else {
                           $.ajax({
                              url: "controllers/xuly_user.php",
                              method: "POST",
                              data: {
                                 check: "sent_mess",
                                 account_id: account_id,
                                 account_email: account_email,
                                 mess: mess
                              },
                              success: function(data) {
                                 $(".val-mess").val("");
                                 $(".box-log").css("right", "-100%");                  
                              }
                           });
                        }
                     });

                     $(".sent-lock-user").on('click', function() {
                        var account_id = $(".id-account-box").val();
                        var lido = $(".val-lido").val();

                        if(lido == "") {
                           $(".error_noti").text('Vui lòng nhập lí do!');
                           show_error();
                        } else {
                           $.ajax({
                              url: "controllers/xuly_user.php",
                              method: "POST",
                              data: {
                                 check: "sent_lock",
                                 account_id: account_id,
                                 lido: lido
                              },
                              success: function(data) {
                                 $(".val-lido").val("");
                                 $(".box-log").css("right", "-100%");
                                 $(".success_noti").text('Đã khóa tài khoản!');
                                 show_success();    
                              }
                           });
                        }
                     });

                     $(".unlock-lock-user").on('click', function() {
                        var account_id = $(".id-account-box").val();
                        $.ajax({
                           url: "controllers/xuly_user.php",
                           method: "POST",
                           data: {
                              check: "unl_lock",
                              account_id: account_id
                           },
                           success: function(data) {
                              $(".box-log-lock").css("right", "-100%");
                              $(".success_noti").text('Đã mở khóa tài khoản!');
                              show_success();
                           }
                        });
                     });

                     $(".option-user-lock").on('click', function() {
                        var account_id = $(this).closest('tr').find(".account-id").val();
                        var account_email = $(this).closest('tr').find(".account-email").val();
                        var account_status = $(this).closest('tr').find(".account-status").val();
                        $(".id-account-box").val(account_id);
                        $(".email-account-box").val(account_email);
                        $(".box-log-lock").css("right", "0px");
                     });

                     $(".daux").on('click', function() {
                        $(".box-log").css("right", "-100%");
                        $(".box-log-lock").css("right", "-100%");
                     });
                  }
               });
            } else if(check == "phone") {
               $.ajax({
                  url: "controllers/xuly_user.php",
                  method: "POST",
                  data: {
                     check: "searchPhoneushop",
                     value: value
                  },
                  success: function(data) {
                     $('tbody').html(data);
                     $(".option-user").on('click', function() {
                        var account_id = $(this).closest('tr').find(".account-id").val();
                        var account_email = $(this).closest('tr').find(".account-email").val();
                        var account_status = $(this).closest('tr').find(".account-status").val();
                        $(".id-account-box").val(account_id);
                        $(".email-account-box").val(account_email);
                        $(".box-log").css("right", "0px");
                     });

                     $(".daux").on('click', function() {
                        $(".box-log").css("right", "-100%");
                     });

                     $(".sent-notify-user").on('click', function() {
                        var account_id = $(".id-account-box").val();
                        var account_email = $(".email-account-box").val();
                        var mess = $(".val-mess").val();
                        if(mess == "") {
                           $(".error_noti").text('Vui lòng nhập thông báo!');
                           show_error();
                        } else {
                           $.ajax({
                              url: "controllers/xuly_user.php",
                              method: "POST",
                              data: {
                                 check: "sent_mess",
                                 account_id: account_id,
                                 account_email: account_email,
                                 mess: mess
                              },
                              success: function(data) {
                                 $(".val-mess").val("");
                                 $(".box-log").css("right", "-100%");                  
                              }
                           });
                        }
                     });

                     $(".sent-lock-user").on('click', function() {
                        var account_id = $(".id-account-box").val();
                        var lido = $(".val-lido").val();

                        if(lido == "") {
                           $(".error_noti").text('Vui lòng nhập lí do!');
                           show_error();
                        } else {
                           $.ajax({
                              url: "controllers/xuly_user.php",
                              method: "POST",
                              data: {
                                 check: "sent_lock",
                                 account_id: account_id,
                                 lido: lido
                              },
                              success: function(data) {
                                 $(".val-lido").val("");
                                 $(".box-log").css("right", "-100%");
                                 $(".success_noti").text('Đã khóa tài khoản!');
                                 show_success();    
                              }
                           });
                        }
                     });

                     $(".unlock-lock-user").on('click', function() {
                        var account_id = $(".id-account-box").val();
                        $.ajax({
                           url: "controllers/xuly_user.php",
                           method: "POST",
                           data: {
                              check: "unl_lock",
                              account_id: account_id
                           },
                           success: function(data) {
                              $(".box-log-lock").css("right", "-100%");
                              $(".success_noti").text('Đã mở khóa tài khoản!');
                              show_success();
                           }
                        });
                     });

                     $(".option-user-lock").on('click', function() {
                        var account_id = $(this).closest('tr').find(".account-id").val();
                        var account_email = $(this).closest('tr').find(".account-email").val();
                        var account_status = $(this).closest('tr').find(".account-status").val();
                        $(".id-account-box").val(account_id);
                        $(".email-account-box").val(account_email);
                        $(".box-log-lock").css("right", "0px");
                     });

                     $(".daux").on('click', function() {
                        $(".box-log").css("right", "-100%");
                        $(".box-log-lock").css("right", "-100%");
                     });
                  }
               });
            } 
            else if(check == "status") {
               $.ajax({
                  url: "controllers/xuly_user.php",
                  method: "POST",
                  data: {
                     check: "searchStatusshop",
                     value: value
                  },
                  success: function(data) {
                     $('tbody').html(data);
                     $(".option-user").on('click', function() {
                        var account_id = $(this).closest('tr').find(".account-id").val();
                        var account_email = $(this).closest('tr').find(".account-email").val();
                        var account_status = $(this).closest('tr').find(".account-status").val();
                        $(".id-account-box").val(account_id);
                        $(".email-account-box").val(account_email);
                        $(".box-log").css("right", "0px");
                     });

                     $(".daux").on('click', function() {
                        $(".box-log").css("right", "-100%");
                     });

                     $(".sent-notify-user").on('click', function() {
                        var account_id = $(".id-account-box").val();
                        var account_email = $(".email-account-box").val();
                        var mess = $(".val-mess").val();
                        if(mess == "") {
                           $(".error_noti").text('Vui lòng nhập thông báo!');
                           show_error();
                        } else {
                           $.ajax({
                              url: "controllers/xuly_user.php",
                              method: "POST",
                              data: {
                                 check: "sent_mess",
                                 account_id: account_id,
                                 account_email: account_email,
                                 mess: mess
                              },
                              success: function(data) {
                                 $(".val-mess").val("");
                                 $(".box-log").css("right", "-100%");                  
                              }
                           });
                        }
                     });

                     $(".sent-lock-user").on('click', function() {
                        var account_id = $(".id-account-box").val();
                        var lido = $(".val-lido").val();

                        if(lido == "") {
                           $(".error_noti").text('Vui lòng nhập lí do!');
                           show_error();
                        } else {
                           $.ajax({
                              url: "controllers/xuly_user.php",
                              method: "POST",
                              data: {
                                 check: "sent_lock",
                                 account_id: account_id,
                                 lido: lido
                              },
                              success: function(data) {
                                 $(".val-lido").val("");
                                 $(".box-log").css("right", "-100%");
                                 $(".success_noti").text('Đã khóa tài khoản!');
                                 show_success();    
                              }
                           });
                        }
                     });

                     $(".unlock-lock-user").on('click', function() {
                        var account_id = $(".id-account-box").val();
                        $.ajax({
                           url: "controllers/xuly_user.php",
                           method: "POST",
                           data: {
                              check: "unl_lock",
                              account_id: account_id
                           },
                           success: function(data) {
                              $(".box-log-lock").css("right", "-100%");
                              $(".success_noti").text('Đã mở khóa tài khoản!');
                              show_success();
                           }
                        });
                     });

                     $(".option-user-lock").on('click', function() {
                        var account_id = $(this).closest('tr').find(".account-id").val();
                        var account_email = $(this).closest('tr').find(".account-email").val();
                        var account_status = $(this).closest('tr').find(".account-status").val();
                        $(".id-account-box").val(account_id);
                        $(".email-account-box").val(account_email);
                        $(".box-log-lock").css("right", "0px");
                     });

                     $(".daux").on('click', function() {
                        $(".box-log").css("right", "-100%");
                        $(".box-log-lock").css("right", "-100%");
                     });
                  }
               });
            } 
         } else {
            $.ajax({
               url: "controllers/xuly_user.php",
               method: "POST",
               data: {
                  check: "searchAllshop",
                  value: value
               },
               success: function(data) {
                  $('tbody').html(data);
                     $(".option-user").on('click', function() {
                        var account_id = $(this).closest('tr').find(".account-id").val();
                        var account_email = $(this).closest('tr').find(".account-email").val();
                        var account_status = $(this).closest('tr').find(".account-status").val();
                        $(".id-account-box").val(account_id);
                        $(".email-account-box").val(account_email);
                        $(".box-log").css("right", "0px");
                     });

                     $(".daux").on('click', function() {
                        $(".box-log").css("right", "-100%");
                     });

                     $(".sent-notify-user").on('click', function() {
                        var account_id = $(".id-account-box").val();
                        var account_email = $(".email-account-box").val();
                        var mess = $(".val-mess").val();
                        if(mess == "") {
                           $(".error_noti").text('Vui lòng nhập thông báo!');
                           show_error();
                        } else {
                           $.ajax({
                              url: "controllers/xuly_user.php",
                              method: "POST",
                              data: {
                                 check: "sent_mess",
                                 account_id: account_id,
                                 account_email: account_email,
                                 mess: mess
                              },
                              success: function(data) {
                                 $(".val-mess").val("");
                                 $(".box-log").css("right", "-100%");                  
                              }
                           });
                        }
                     });

                     $(".sent-lock-user").on('click', function() {
                        var account_id = $(".id-account-box").val();
                        var lido = $(".val-lido").val();

                        if(lido == "") {
                           $(".error_noti").text('Vui lòng nhập lí do!');
                           show_error();
                        } else {
                           $.ajax({
                              url: "controllers/xuly_user.php",
                              method: "POST",
                              data: {
                                 check: "sent_lock",
                                 account_id: account_id,
                                 lido: lido
                              },
                              success: function(data) {
                                 $(".val-lido").val("");
                                 $(".box-log").css("right", "-100%");
                                 $(".success_noti").text('Đã khóa tài khoản!');
                                 show_success();    
                              }
                           });
                        }
                     });

                     $(".unlock-lock-user").on('click', function() {
                        var account_id = $(".id-account-box").val();
                        $.ajax({
                           url: "controllers/xuly_user.php",
                           method: "POST",
                           data: {
                              check: "unl_lock",
                              account_id: account_id
                           },
                           success: function(data) {
                              $(".box-log-lock").css("right", "-100%");
                              $(".success_noti").text('Đã mở khóa tài khoản!');
                              show_success();
                           }
                        });
                     });

                     $(".option-user-lock").on('click', function() {
                        var account_id = $(this).closest('tr').find(".account-id").val();
                        var account_email = $(this).closest('tr').find(".account-email").val();
                        var account_status = $(this).closest('tr').find(".account-status").val();
                        $(".id-account-box").val(account_id);
                        $(".email-account-box").val(account_email);
                        $(".box-log-lock").css("right", "0px");
                     });

                     $(".daux").on('click', function() {
                        $(".box-log").css("right", "-100%");
                        $(".box-log-lock").css("right", "-100%");
                     });
               }
            });
         }
      });
   });

</script>