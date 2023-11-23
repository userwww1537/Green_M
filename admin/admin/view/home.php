<main>
   <div class="cards">
      <div class="single-card">
         <?php
         $count_account = 0;
         $count_shop = 0;
         $count_order = 0;
         $count_revenue = 0;
         foreach ($show_account as $items) {
            $count_account++;
            if ($items['account_position'] == "Shop") {
               $count_shop++;
            }
         }
         $time_now = date("Y-m-d");
         foreach ($show_order as $items) {
            $count_order++;
            $time = strtotime($items['time_reg']);
            $time_get = date("Y-m-d", $time);
            if($items['order_status'] == "Giao thành công") {
               if ($time_now == $time_get) {
                  $count_revenue += $items['order_total'];
               }
            }
         }
         $total_revenue = $count_revenue * 0.03;
         ?>
         <div>
            <span>Người dùng</span>
            <h2><?= $count_account; ?></h2>
         </div>
         <i class="fas fa-users"></i>
      </div>
      <div class="single-card cc1">
         <div>
            <span>SHOP</span>
            <h2><?= $count_shop ?></h2>
         </div>
         <i class="fas fa-store-alt"></i>
      </div>
      <div class="single-card cc2">
         <div>
            <span>Đơn hàng</span>
            <h2><?= $count_order ?></h2>
         </div>
         <i class="uil uil-clipboard-notes"></i>

      </div>
      <div class="single-card cc3">
         <div>
            <span>Doanh thu/ Ngày</span>
            <h2>$<?= $total_revenue ?></h2>
         </div>
         <i class="fas fa-dollar-sign"></i>
      </div>
   </div>


   <div class="wrapper flex">
      <div class="projects projects-home">
         <div class="card-header card-header-home flex">
            <h3>SHOP XU HƯỚNG</h3>
            <!-- <button>Xem thêm <i class="uil uil-angle-right"></i></button> -->
         </div>

         <table>
            <thead>
               <th>
                  <tr>
                     <td class="cc">Tên Shop</td>
                     <td class="cc">Địa chỉ</td>
                     <td class="cc">Số điện thoại</td>
                     <td class="cc">Đơn hàng</td>
                     <td class="cc">Trạng thái</td>
                  </tr>
               </th>
            </thead>

            <tbody>
               <?php
               $i = 0;
               foreach ($show_shop as $items) {
                  $i++;
                  if ($i == 3) {
                     break;
                  }
                  extract($items);
                  echo '
                           <tr>
                              <td>' . $account_name . '</td>
                              <td>' . $account_address . '</td>
                              <td>' . $account_phone . '</td>
                              <td>' . $soLuongDonHang . '</td>
                              <td class="status-box">
                                 <span class="status review"></span>' . $account_status . '
                              </td>
                           </tr>
                        ';
               }
               ?>
            </tbody>
         </table>
      </div>

      <div class="customers">
         <div class="card-header card-header-home flex">
            <h3>Sản phẩm nổi bật</h3>
            <!-- <button>Xem thêm <i class="uil uil-angle-right"></i></button> -->
         </div>

         <table>
            <?php
            $i = 0;
            foreach ($show_product as $items) {
               extract($items);
               $image = explode(',', $image_files);
               $i++;
               if ($i == 6) {
                  break;
               }
               $name_product = substr($product_name, 0, 9) . '...';
               echo '
                  <tr class="flex">
                     <td class="flex">
                        <img src="../../public/' . $image[0] . '" width="30px" height="30px" alt="">
                        <div>
                           <h5>' . $name_product . '</h5>
                           <small>' . $product_price . '$</small>
                        </div>
                     </td>
      
                     <td>Lượt xem:
                        <span><b>' . $product_view . '</b></span>
                     </td>
                  </tr>
                  ';
            }
            ?>

         </table>
      </div>
   </div>
</main>
</div>