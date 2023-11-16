
   <div class="main-content" id="main-content">
      <header class="flex">
         <h2>
            <i class="uil uil-bars" id="menu-icon"></i>
         </h2>

         <div class="search-box">
            <i class="uil uil-search"></i>
            <input type="text" placeholder="Tìm kiếm...">
         </div>

         <div class="admin-box flex">
            <img src="view/layout/Images/user.jpeg" width="30px" height="30px">
            <div>
               <h4>Nguyễn Tấn Ý</h4>
               <small>Admin</small>
            </div>
         </div>
      </header>
      <div class="wrapper flex">
         <div class="projects-category">
            <div class="card-header flex">
               <h3>Đơn hàng</h3>
               <button>Xuất PDF<i class="uil uil-angle-right"></i></button>
            </div>

            <table>
               <thead>
                  <th>
                     <tr>
                        <td>STT</td>
                        <td>Mã đơn</td>
                        <td>Tên người dùng</td>
                        <td>Địa chỉ</td>
                        <td>Số điện thoại</td>
                        <td>Tổng tiền</td>
                        <td>Trạng thái giao hàng</td>
                        <td>Ngày đặt</td>
                        <td>Thao tác</td>

                     </tr>
                  </th>
               </thead>

               <tbody>
                  <tr>
                     <td>1</td>
                     <td>2204</td>
                     <td>Nguyễn Tấn Ý</td>
                     <td>34HCM</td>
                     <td>034543253</td>
                     <td>50000</td>
                     <td>Chưa vận chuyển</td>
                     <td>12/2/2018</td>
                     <td>
                        <i class="fas fa-eye"></i>/
                        <i class="fas fa-pen"></i></i>
                     </td>
                  </tr>
                  <tr>
                     <td>1</td>
                     <td>2204</td>
                     <td>Nguyễn Tấn Ý</td>
                     <td>34HCM</td>
                     <td>034543253</td>
                     <td>50000</td>
                     <td>Chưa vận chuyển</td>
                     <td>12/2/2018</td>
                     <td>
                        <i class="fas fa-eye"></i>/
                        <i class="fas fa-pen"></i></i>
                     </td>
                  </tr>

               </tbody>
            </table>
         </div>

         </table>
      </div>
   </div>
   </main>
   </div>

   <script>
      let sideBar = document.getElementById('sidebar');
      let menuIcon = document.getElementById('menu-icon');
      let mainContent = document.getElementById('main-content');

      menuIcon.onclick = () => {
         sideBar.classList.toggle('toggleMenu');
         mainContent.classList.toggle('toggleContent');
      }
   </script>