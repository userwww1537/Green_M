
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
                        <td>Người mua</td>
                        <td>Địa chỉ</td>
                        <td>Số điện thoại</td>
                        <td>Tiền chiết khấu(-3%/Đơn)</td>
                        <td>Số đơn</td>
                        <td>Thao tác</td>
                     </tr>
                  </th>
               </thead>

               <tbody>
                  <?php
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
                  ?>
               </tbody>
            </table>
         </div>

         </table>
      </div>
   </div>

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