
      <div class="wrapper flex">
         <div class="projects-category">
            <div class="card-header flex flex-tinh2">
               <h3>Đơn hàng</h3>
               <button>Xuất PDF<i class="uil uil-angle-right"></i></button>
            </div>

            <table>
               <thead>
                  <th>
                     <tr>
                        <td>ID</td>
                        <td>Tên người đặt</td>
                        <td>Địa chỉ</td>
                        <td>Số điện thoại</td>
                        <td>Tiền hàng(-3% chiết khấu)</td>
                        <td>Trạng thái</td>
                        <td>Ngày đặt</td>
                        <td>Thao tác</td>
                     </tr>
                  </th>
               </thead>

               <tbody>
                  <?php
                     foreach($show as $items) {
                        extract($items);
                        $address = substr($account_address, 0, 16) . '...';
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
                  ?>
               </tbody>
            </table>
         </div>

         </table>
      </div>
   </div>
<div class="details-order">
    <!-- <div class="close-order">
        X
    </div>
    <div class="title-order">
        <h3>Đơn hàng ORDER-1</h3>
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
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>Củ cải</td>
                    <td><img width="100px" src="https://www.rent.com/blog/wp-content/uploads/2023/05/Moving.png" alt=""></td>
                    <td>3</td>
                    <td>$84</td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>Củ cải</td>
                    <td><img width="100px" src="https://www.rent.com/blog/wp-content/uploads/2023/05/Moving.png" alt=""></td>
                    <td>3</td>
                    <td>$84</td>
                </tr>
            </tbody>
        </table>
    </div>
    <hr>
    <div class="bill-order">
        <div class="total-order">
            <h6>-Thành Tiền-</h6>
            <span>$86</span>
        </div>
    </div> -->
</div>
<div class="edit-order">
   <span class="close-edit-order">X</span>
   <div class="twoform-up">
      <form class="status-up-order" action="controllers/xuly_order.php" method="post">
         <input type="hidden" name="order_id" id="edit-order-id">
         <select name="status" id="status-edit">
            <option value="Đã đóng gói">Đã đóng gói</option>
            <option value="Đang giao hàng">Đang giao hàng</option>
            <option value="Giao thành công">Giao hàng thành công</option>
         </select>
         <input type="submit" value="Cập nhật" name="upOrder">
      </form>
      <span class="more-up-order">Xem Thêm</span>
      <form class="more-cancel-up" action="controllers/xuly_order.php" method="post">
         <input type="hidden" name="order_id" id="edit-order-id-up">
         <input type="text" placeholder="Lí do.." name="note">
         <input type="submit" value="Hủy đơn" name="cancel_order_up">
      </form>
   </div>
</div>
   <script>

   $(document).ready(function() {
      $("#proDmSearch").on('change', function() {
         var value = $(this).val();
         if(value === '') {
            $('.value-search-pro').prop('readonly', true);
            $('.value-search-pro').attr('placeholder', 'Chọn chế độ tìm...');
         } else {
            if(value == 'id') {
            $('.value-search-pro').prop('readonly', false);
            $('.value-search-pro').attr('placeholder', 'Điền ID đơn hàng cần tìm...');
            } else if(value == 'name') {
            $('.value-search-pro').prop('readonly', false);
            $('.value-search-pro').attr('placeholder', 'Điền tên KH cần tìm...');
            } else if(value == 'status') {
            $('.value-search-pro').prop('readonly', false);
            $('.value-search-pro').attr('placeholder', 'Điền trạng thái ĐH cần tìm...');
            } else {
            $('.value-search-pro').prop('readonly', false);
            $('.value-search-pro').attr('placeholder', 'Điền SĐT KH cần tìm...');
            }
         }
      });

      $(".value-search-pro").on('keyup', function() {
         var value = $(this).val();
         var check = $("#proDmSearch").val();
         if(value != '') {   
            if(check == "id") {
               $.ajax({
                  url: "controllers/xuly_order.php",
                  method: "POST",
                  data: {
                     check: "searchIdOrder",
                     value: value
                  },
                  success: function(data) {
                     $('tbody').html(data);
                  }
               });
            } else if(check == "name") {
               $.ajax({
                  url: "controllers/xuly_order.php",
                  method: "POST",
                  data: {
                     check: "searchNameOrder",
                     value: value
                  },
                  success: function(data) {
                     $('tbody').html(data);
                  }
               });
            } else if(check == "status") {
               $.ajax({
                  url: "controllers/xuly_order.php",
                  method: "POST",
                  data: {
                     check: "searchStatusOrder",
                     value: value
                  },
                  success: function(data) {
                     $('tbody').html(data);
                  }
               });
            } else {
               $.ajax({
                  url: "controllers/xuly_order.php",
                  method: "POST",
                  data: {
                     check: "searchPhoneOrder",
                     value: value
                  },
                  success: function(data) {
                     $('tbody').html(data);
                  }
               });
            }
         } else {
            $.ajax({
               url: "controllers/xuly_order.php",
               method: "POST",
               data: {
                  check: "searchAllOrder",
                  value: value
               },
               success: function(data) {
                  $('tbody').html(data);
               }
            });
         }
      });
   });


      $(".duyet-don").on('click', function() {
         var value = $(this).data('order-id');
         $.ajax({
            url: "controllers/xuly_order.php",
            method: "POST",
            data: {
               check: "duyetDon",
               value: value
            },
            success: function(data) {
               location.reload();
            }
         });
      });

      $(".more-up-order").on('click', function() {
         $(".more-cancel-up").css("display", "block");
         $(this).text("");
      });

      $(".edit-order-details").on('click', function() {
         var id = $(this).data("order-id");
         $(".edit-order").css("top", "10px");
         $("#edit-order-id-up").val(id);
         $("#edit-order-id").val(id);
      });

      $(".close-edit-order").on('click', function() {
         $(".edit-order").css("top", "-100%");
         $(".more-cancel-up").css("display", "none");
         $(".more-up-order").text("Xem thêm");
         $("#edit-order-id").val("");
         $("#edit-order-id-up").val("");
      });

      $(".view-order-details").click(function() {
         var orderID = $(this).data("order-id");
         var orderNote = $(this).data("order-note");
         $.ajax({
               url: "controllers/xuly_order.php",
               method: "POST",
               data: {
                  check: "ShowOrderDetails",
                  orderID: orderID,
                  orderNote: orderNote
               },
               success: function(data) {
                  $(".details-order").css("top", "50%");
                  $(".details-order").html(data);
                  $(".close-order").on('click', function() {
                     $(".details-order").css("top", "-50%");
                     $(".details-order").html('');
                  });
               }
         });
         $(".details-order").css("display", "block");
      });

      $(".address-user").on('click', function() {
         var address = $(this).find('input').val();
         window.open("https://www.google.com/maps/place/" + address, "_blank");
      });
   </script>