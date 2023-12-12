

<div class="main-content" id="main-content">
      <header class="flex">
         <h2>
            <i class="uil uil-bars" id="menu-icon"></i>
            Tổng quan
         </h2>

         <div class="search-box">
            <i class="uil uil-search"></i>
            <input type="text" placeholder="Search Here...">
         </div>

         <div class="admin-box flex" >
            <img src="view/layout/Images/user.jpeg" width="30px" height="30px">
            <div>
               <h4>Naseem Khan</h4>
               <small>Admin</small>
            </div>
         </div>
      </header>

      <main>
         <div class="cards">
            <div class="single-card">
               <div>
                  <span>Sản phẩm</span>
                  <h2>2</h2>
               </div>
               <i class="fas fa-users"></i>
            </div>
            <div class="single-card">
               <div>
                  <span>Đơn hàng</span>
                  <h2>3</h2>
               </div>
               <i class="fas fa-store-alt"></i>
            </div>
            <div class="single-card">
               <div>
                  <span>Tin nhắn</span>
                  <h2>500</h2>
               </div>
               <i class="fas fa-comment-dots"></i>

            </div>
            <div class="single-card">
               <div>
                  <span>Doanh thu/ Ngày</span>
                  <h2>180$</h2>
               </div>
               <i class="fas fa-dollar-sign"></i>
            </div>
         </div>


         <div class="wrapper flex">
            <div class="projects">
               <div class="card-header flex">
                  <h3>Đơn hàng gần nhất</h3>
                  <button>Xem thêm <i class="uil uil-angle-right"></i></button>
               </div>

               <table>
                  <thead>
                     <th>
                        <tr>
                           <td>Hình ảnh</td>
                           <td>Tên</td>
                           <td>Giá</td>
                           <td>Số lượng</td>
                           <td>Trạng thái</td>
                        </tr>
                     </th>
                  </thead>

                  <tbody>
                     <tr>
                        <td>img</td>
                        <td>Bắp mỹ</td>
                        <td>14000$</td>
                        <td>1</td>
                        <td class="status-box">
                           <span class="status review"></span>review
                        </td>
                     </tr>      
                     <tr>
                        <td>img</td>
                        <td>Bắp mỹ</td>
                        <td>14000$</td>
                        <td>1</td>
                        <td class="status-box">
                           <span class="status review"></span>review
                        </td>
                     </tr>      <tr>
                        <td>img</td>
                        <td>Bắp mỹ</td>
                        <td>14000$</td>
                        <td>1</td>
                        <td class="status-box">
                           <span class="status review"></span>review
                        </td>
                     </tr>      <tr>
                        <td>img</td>
                        <td>Bắp mỹ</td>
                        <td>14000$</td>
                        <td>1</td>
                        <td class="status-box">
                           <span class="status review"></span>review
                        </td>
                     </tr>      <tr>
                        <td>img</td>
                        <td>Bắp mỹ</td>
                        <td>14000$</td>
                        <td>1</td>
                        <td class="status-box">
                           <span class="status review"></span>review
                        </td>
                     </tr>        
                  </tbody>
               </table>
            </div>

            <div class="customers">
               <div class="card-header flex">
                  <h3>Sản phẩm nổi bật</h3>
                  <button>Xem thêm <i class="uil uil-angle-right"></i></button>
               </div>

               <table>
                  
                  <tr class="flex">
                     <td class="flex">
                        <img src="view/layout/Images/user.jpeg" width="30px" height="30px" alt="">
                        <div>
                           <h5>Tên sản phẩm</h5>
                           <small>2000$</small>
                        </div>
                     </td>

                     <td>Lượt xem
                        <span>2k</span>
                     </td>
                  </tr>
                  <tr class="flex">
                     <td class="flex">
                        <img src="view/layout/Images/user.jpeg" width="30px" height="30px" alt="">
                        <div>
                           <h5>Tên sản phẩm</h5>
                           <small>2000$</small>
                        </div>
                     </td>

                     <td>Lượt xem
                        <span>2k</span>
                     </td>
                  </tr> <tr class="flex">
                     <td class="flex">
                        <img src="view/layout/Images/user.jpeg" width="30px" height="30px" alt="">
                        <div>
                           <h5>Tên sản phẩm</h5>
                           <small>2000$</small>
                        </div>
                     </td>

                     <td>Lượt xem
                        <span>2k</span>
                     </td>
                  </tr> <tr class="flex">
                     <td class="flex">
                        <img src="view/layout/Images/user.jpeg" width="30px" height="30px" alt="">
                        <div>
                           <h5>Tên sản phẩm</h5>
                           <small>2000$</small>
                        </div>
                     </td>

                     <td>Lượt xem
                        <span>2k</span>
                     </td>
                  </tr> <tr class="flex">
                     <td class="flex">
                        <img src="view/layout/Images/user.jpeg" width="30px" height="30px" alt="">
                        <div>
                           <h5>Tên sản phẩm</h5>
                           <small>2000$</small>
                        </div>
                     </td>

                     <td>Lượt xem
                        <span>2k</span>
                     </td>
                  </tr>
                 
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