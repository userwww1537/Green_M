

      <main>
         <div class="wrapper flex">
            <div class="projects-category">
               <div class="card-header flex flex-tinh">
                  <h3>Quản lý người dùng</h3>
                  <!-- <button>Thêm danh mục <i class="fas fa-plus"></i></button> -->
               </div>

               <table>
                  <thead>
                     <th>
                        <tr>
                           <td>STT</td>
                           <td>Tên người dùng</td>
                           <td>Email</td>
                           <td>Số điện thoại</td>
                           <td>Địa chỉ</td>
                           <td>Trạng thái</td>
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
   </script>