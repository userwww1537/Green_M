<!DOCTYPE html>
<html lang="en">

<head>
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Quản Trị - Admin</title>

   <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
   <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
   <link rel="stylesheet" href="view/layout/style.css?v=<?php echo time(); ?>">
</head>

<body>
   <div class="sidebar" id="sidebar">
      <div class="logo">
         <img src="view/layout/Images/logo-1.webp" alt="">
      </div>
      <?php
      if (isset($act) && $act == 'user') {
         echo '
               <div class="sidebar-menu">
                  <ul>
                     <li>
                        <i class="fas fa-chart-line"></i>
                        <a href="index.php"><span>Tổng quan</span></a>
                     </li>
                     <li class="active">
                        <i class="fas fa-users"></i>
                        <a href="index.php?act=user"><span>Quản lý người dùng</span></a>
                     </li>
                     <li>
                        <i class="fas fa-store-alt"></i>
                        <a href="index.php?act=shop"><span>Quản lý Shop</span></a>
                     </li>
                     <li>
                        <i class="fas fa-folder-minus"></i>
                        <a href="index.php?act=cate"><span>Quản lý danh mục</span></a>
                     </li>
                     <li>
                        <i class="uil uil-clipboard-notes"></i>
                        <a href="index.php?act=order"><span>Quản lý doanh thu</span></a>
                     </li>
                     <li>
                        <i class="uil uil-signin"></i>
                        <a href="../../public/index.php"><span>Về trang chủ</span></a>
                     </li>
                  </ul>
               </div>
            ';
      } else if (isset($act) && $act == 'shop') {
         echo '
               <div class="sidebar-menu">
                  <ul>
                     <li>
                        <i class="fas fa-chart-line"></i>
                        <a href="index.php"><span>Tổng quan</span></a>
                     </li>
                     <li>
                        <i class="fas fa-users"></i>
                        <a href="index.php?act=user"><span>Quản lý người dùng</span></a>
                     </li>
                     <li class="active">
                        <i class="fas fa-store-alt"></i>
                        <a href="index.php?act=shop"><span>Quản lý Shop</span></a>
                     </li>
                     <li>
                        <i class="fas fa-folder-minus"></i>
                        <a href="index.php?act=cate"><span>Quản lý danh mục</span></a>
                     </li>
                     <li>
                        <i class="uil uil-clipboard-notes"></i>
                        <a href="index.php?act=order"><span>Quản lý doanh thu</span></a>
                     </li>
                     <li>
                        <i class="uil uil-signin"></i>
                        <a href="../../public/index.php"><span>Về trang chủ</span></a>
                     </li>
                  </ul>
               </div>
            ';
      } else if (isset($act) && $act == 'cate') {
         echo '
               <div class="sidebar-menu">
                  <ul>
                     <li>
                        <i class="fas fa-chart-line"></i>
                        <a href="index.php"><span>Tổng quan</span></a>
                     </li>
                     <li>
                        <i class="fas fa-users"></i>
                        <a href="index.php?act=user"><span>Quản lý người dùng</span></a>
                     </li>
                     <li>
                        <i class="fas fa-store-alt"></i>
                        <a href="index.php?act=shop"><span>Quản lý Shop</span></a>
                     </li>
                     <li class="active">
                        <i class="fas fa-folder-minus"></i>
                        <a href="index.php?act=cate"><span>Quản lý danh mục</span></a>
                     </li>
                     <li>
                        <i class="uil uil-clipboard-notes"></i>
                        <a href="index.php?act=order"><span>Quản lý doanh thu</span></a>
                     </li>
                     <li>
                        <i class="uil uil-signin"></i>
                        <a href="../../public/index.php"><span>Về trang chủ</span></a>
                     </li>
                  </ul>
               </div>
            ';
      } else if (isset($act) && $act == 'order') {
         echo '
               <div class="sidebar-menu">
                  <ul>
                     <li>
                        <i class="fas fa-chart-line"></i>
                        <a href="index.php"><span>Tổng quan</span></a>
                     </li>
                     <li>
                        <i class="fas fa-users"></i>
                        <a href="index.php?act=user"><span>Quản lý người dùng</span></a>
                     </li>
                     <li>
                        <i class="fas fa-store-alt"></i>
                        <a href="index.php?act=shop"><span>Quản lý Shop</span></a>
                     </li>
                     <li>
                        <i class="fas fa-folder-minus"></i>
                        <a href="index.php?act=cate"><span>Quản lý danh mục</span></a>
                     </li>
                     <li class="active">
                        <i class="uil uil-clipboard-notes"></i>
                        <a href="index.php?act=order"><span>Quản lý doanh thu</span></a>
                     </li>
                     <li>
                        <i class="uil uil-signin"></i>
                        <a href="../../public/index.php"><span>Về trang chủ</span></a>
                     </li>
                  </ul>
               </div>
            ';
      } else {
         echo '
               <div class="sidebar-menu">
                  <ul>
                     <li class="active">
                        <i class="fas fa-chart-line"></i>
                        <a href="index.php"><span>Tổng quan</span></a>
                     </li>
                     <li>
                        <i class="fas fa-users"></i>
                        <a href="index.php?act=user"><span>Quản lý người dùng</span></a>
                     </li>
                     <li>
                        <i class="fas fa-store-alt"></i>
                        <a href="index.php?act=shop"><span>Quản lý Shop</span></a>
                     </li>
                     <li>
                        <i class="fas fa-folder-minus"></i>
                        <a href="index.php?act=cate"><span>Quản lý danh mục</span></a>
                     </li>
                     <li>
                        <i class="uil uil-clipboard-notes"></i>
                        <a href="index.php?act=order"><span>Quản lý doanh thu</span></a>
                     </li>
                     <li>
                        <i class="uil uil-signin"></i>
                        <a href="../../public/index.php"><span>Về trang chủ</span></a>
                     </li>
                  </ul>
               </div>
            ';
      }
      ?>
   </div>
   <div class="main-content" id="main-content">
      <header class="flex">
         <h2>
            <i class="uil uil-bars" id="menu-icon"></i>
         </h2>

         <div class="search-box">
            <input type="text" placeholder="Tìm kiếm...">
         </div>

         <div class="admin-box flex">
            <img src="../../public/<?= $_SESSION['83x86']['account_avt'] ?>" width="30px" height="30px">
            <div>
               <h4><?= $_SESSION['83x86']['account_name'] ?></h4>
               <small><?= $_SESSION['83x86']['account_position'] ?></small>
            </div>
         </div>
      </header>
      <div class="success_noti">
         <span class="text_success_noti"></span>
      </div>
      <div class="error_noti">
         <span class="text_error_noti"></span>
      </div>