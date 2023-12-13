
      <div class="wrapper flex">
         <div class="projects-category">
            <div class="card-header flex flex-tinh2">
               <h3>Doanh thu</h3>
               <div class="fill-doanhthu">
                  <label for="fill-doanhthu">Lọc doanh thu</label>
                  <select name="fill-doanhthu" class="fill-doanhthu-btn">
                     <option value="All">Tất cả</option>
                     <option value="day">Ngày</option>
                     <option value="month">Tháng</option>
                     <option value="year">Năm</option>
                  </select>
               </div>
               <button>Xuất PDF<i class="uil uil-angle-right"></i></button>
            </div>

            <table>
               <thead>
                  <th>
                     <tr>
                        <td>STT</td>
                        <td>Tên cửa hàng</td>
                        <td>Địa chỉ</td>
                        <td>Số điện thoại</td>
                        <td>Tiền chiết khấu(3%/Đơn)</td>
                        <td>Số đơn</td>
                        <td>Thao tác</td>
                     </tr>
                  </th>
               </thead>

               <tbody>
                  <?php
                     $i = 0;
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
                           $address = substr($account_address, 0, 18) . '...';
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
                  ?>
               </tbody>
            </table>
         </div>

         </table>
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
             if(value == 'name') {
            $('.value-search-pro').prop('readonly', false);
            $('.value-search-pro').attr('placeholder', 'Điền tên KH cần tìm...');
            }  else {
            $('.value-search-pro').prop('readonly', false);
            $('.value-search-pro').attr('placeholder', 'Điền SĐT KH cần tìm...');
            }
         }
      });

      $(".value-search-pro").on('keyup', function() {
         var value = $(this).val();
         var check = $("#proDmSearch").val();
         if(value != '') {
          if(check == "name") {
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
   <script>
      $(".fill-doanhthu-btn").on('change', function() {
         var fill = $(this).val();
         $.ajax({
            url: "controllers/xuly_doanhthu.php",
            method: "POST",
            data: {
               check: "Fill_doanhthu",
               fill: fill
            },
            success: function(data) {
               $("tbody").html(data);
            }
         });
      });

      $(".address-user").on('click', function() {
         var address = $(this).find('input').val();
         window.open("https://www.google.com/maps/place/" + address, "_blank");
      });
   </script>