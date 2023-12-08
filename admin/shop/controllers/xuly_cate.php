<?php

    ob_start();
    extract($_REQUEST);
    if(session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    if (file_exists('../model/category.php')) {
        require "../model/category.php";
    }

    if (file_exists('../model/rate.php')) {
        require "../model/rate.php";
    }

    if(isset($check) && $check == "del-cate") {
        $cate = new cate_lass();
        $cate->del_cate($id_cate);
    }

    if(isset($check)&& $check == "fill_danhgia"){
        $rate= new rate_lass();
        $show=$rate->show_rate();
       
        if($fill == "All"){
            $i = 0;
            foreach($show as $items) {
               extract($items);
               $date = new DateTime($time_reg);
               $formattedDate = $date->format('d-m-Y');
               $i++;
               echo '
                  <tr>
                     <td>'. $i .'</td>
                     <td>'. $account_name .'</td>
                     <td>'. $rate_comment .'</td>
                     <td>
                        '. $rate_star .'🌟
                     </td>
                     <td>
                        '. $formattedDate .'
                     </td>
                     <td class="kkk">
                           <a href="../../public/index.php?act=detail&product_id=' . $product_id . '&category='. $category_id .'"><i class="fad fa-eye"></i></a> |
                           <a href="../../public/index.php?act=mess_chat&from='.$_SESSION['83x86']['account_id'].'&to='.$account_id.'"><i class="fas fa-comment"></i></a>
                     </td>
                  </tr>
               ';
            }
        
    }else if($fill == "fivestar"){
        $show=$rate->show_fivetar();
            $i = 0;
            foreach($show as $items) {
               extract($items);
               $date = new DateTime($time_reg);
               $formattedDate = $date->format('d-m-Y');
               $i++;
               echo '
                  <tr>
                     <td>'. $i .'</td>
                     <td>'. $account_name .'</td>
                     <td>'. $rate_comment .'</td>
                     <td>
                        '. $rate_star .'🌟
                     </td>
                     <td>
                        '. $formattedDate .'
                     </td>
                     <td class="kkk">
                           <a href="../../public/index.php?act=detail&product_id=' . $product_id . '&category='. $category_id .'"><i class="fad fa-eye"></i></a> |
                           <a href="../../public/index.php?act=mess_chat&from='.$_SESSION['83x86']['account_id'].'&to='.$account_id.'"><i class="fas fa-comment"></i></a>
                     </td>
                  </tr>
               ';
            }
    }else if($fill  == "fourstar"){
        $i = 0;
        $show=$rate->show_fourstar();
        foreach($show as $items) {
           extract($items);
           $date = new DateTime($time_reg);
           $formattedDate = $date->format('d-m-Y');
           $i++;
           echo '
              <tr>
                 <td>'. $i .'</td>
                 <td>'. $account_name .'</td>
                 <td>'. $rate_comment .'</td>
                 <td>
                    '. $rate_star .'🌟
                 </td>
                 <td>
                    '. $formattedDate .'
                 </td>
                 <td class="kkk">
                       <a href="../../public/index.php?act=detail&product_id=' . $product_id . '&category='. $category_id .'"><i class="fad fa-eye"></i></a> |
                       <a href="../../public/index.php?act=mess_chat&from='.$_SESSION['83x86']['account_id'].'&to='.$account_id.'"><i class="fas fa-comment"></i></a>
                 </td>
              </tr>
           ';
        }
    }else if($fill == "threestar"){
        $i = 0;
        $show=$rate->show_threestar();
        foreach($show as $items) {
           extract($items);
           $date = new DateTime($time_reg);
           $formattedDate = $date->format('d-m-Y');
           $i++;
           echo '
              <tr>
                 <td>'. $i .'</td>
                 <td>'. $account_name .'</td>
                 <td>'. $rate_comment .'</td>
                 <td>
                    '. $rate_star .'🌟
                 </td>
                 <td>
                    '. $formattedDate .'
                 </td>
                 <td class="kkk">
                       <a href="../../public/index.php?act=detail&product_id=' . $product_id . '&category='. $category_id .'"><i class="fad fa-eye"></i></a> |
                       <a href="../../public/index.php?act=mess_chat&from='.$_SESSION['83x86']['account_id'].'&to='.$account_id.'"><i class="fas fa-comment"></i></a>
                 </td>
              </tr>
           ';
        }
    }else if($fill == "twostar"){
        $show=$rate->show_twostar();
        $i = 0;
        
        foreach($show as $items) {
           extract($items);
           $date = new DateTime($time_reg);
           $formattedDate = $date->format('d-m-Y');
           $i++;
           echo '
              <tr>
                 <td>'. $i .'</td>
                 <td>'. $account_name .'</td>
                 <td>'. $rate_comment .'</td>
                 <td>
                    '. $rate_star .'🌟
                 </td>
                 <td>
                    '. $formattedDate .'
                 </td>
                 <td class="kkk">
                       <a href="../../public/index.php?act=detail&product_id=' . $product_id . '&category='. $category_id .'"><i class="fad fa-eye"></i></a> |
                       <a href="../../public/index.php?act=mess_chat&from='.$_SESSION['83x86']['account_id'].'&to='.$account_id.'"><i class="fas fa-comment"></i></a>
                 </td>
              </tr>
           ';
        }
    }else if($fill == "onestar"){
        $show=$rate->show_onestar();
        $i = 0;
        foreach($show as $items) {
           extract($items);
           $date = new DateTime($time_reg);
           $formattedDate = $date->format('d-m-Y');
           $i++;
           echo '
              <tr>
                 <td>'. $i .'</td>
                 <td>'. $account_name .'</td>
                 <td>'. $rate_comment .'</td>
                 <td>
                    '. $rate_star .'🌟
                 </td>
                 <td>
                    '. $formattedDate .'
                 </td>
                 <td class="kkk">
                       <a href="../../public/index.php?act=detail&product_id=' . $product_id . '&category='. $category_id .'"><i class="fad fa-eye"></i></a> |
                       <a href="../../public/index.php?act=mess_chat&from='.$_SESSION['83x86']['account_id'].'&to='.$account_id.'"><i class="fas fa-comment"></i></a>
                 </td>
              </tr>
           ';
        }
}

    }



    if(isset($addcategory_submit)) {
        $cate = new cate_lass();
        $image = $_FILES['category_image']['name'];
        $path = '../../../public/view/images/' . $image;
        if(move_uploaded_file($_FILES['category_image']['tmp_name'], $path)) {
            $path = 'view/images/' . $image;
            $cate->add_cate($category_name, $path, $category_stautus);
            echo '
                <style>
                    .content {
                        position: absolute;
                        top: 50%;
                        left: 50%;
                        transform: translate(-50%, -50%);
                        width: 400px;
                        height: 200px;
                        border-radius: 10px;
                        background-color: white;
                    }
                    
                    .content {
                        animation: slide-in 1.5s ease-in-out;
                    }
                    
                    @keyframes slide-in {
                        0% {
                        top: -100%;
                        }
                    
                        100% {
                        top: 50%;
                        }
                    }
                    #popup {
                        position: fixed;
                        top: 0;
                        left: 0;
                        width: 100%;
                        height: 100%;
                        background-color: rgba(0, 0, 0, 0.6);
                        z-index: 1000;
                    }
                    
                    .content {
                        position: absolute;
                        top: 50%;
                        left: 50%;
                        transform: translate(-50%, -50%);
                        width: 400px;
                        height: 200px;
                        border-radius: 10px;
                        background-color: white;
                        text-align: center;
                    }
                
                    #popup .content span {
                        font-size: 40px;
                        line-height: 75px;
                        font-weight: 700;
                        color: rgb(44, 69, 7);
                    }
                    
                    h2 {
                        font-size: 24px;
                        text-align: center;
                    }
                    
                    p {
                        font-size: 16px;
                        text-align: center;
                    }
                    
                    .close {
                        position: absolute;
                        top: 10px;
                        right: 10px;
                        width: 30px;
                        height: 30px;
                        line-height: 30px;
                        border-radius: 50%;
                        background-color: red;
                        cursor: pointer;
                        text-decoration: none;
                        color: white;
                        font-weight: 600;
                    }
                      
                    .close:hover {
                        background-color: #000000;
                        color: white;
                    }                
                </style>
                <div id="popup">
                    <div class="content">
                    <h2>Green-M Thông Báo!</h2>
                    <p>Danh mục đã được thêm thành công.</p>
                    <span>- Success -</span>
                    <a href="../index.php?act=cate" class="close">X</a>
                    </div>
                </div>
            ';
        } else {
            echo '
                <style>
                    .content {
                        position: absolute;
                        top: 50%;
                        left: 50%;
                        transform: translate(-50%, -50%);
                        width: 400px;
                        height: 200px;
                        border-radius: 10px;
                        background-color: white;
                    }
                    
                    .content {
                        animation: slide-in 1.5s ease-in-out;
                    }
                    
                    @keyframes slide-in {
                        0% {
                        top: -100%;
                        }
                    
                        100% {
                        top: 50%;
                        }
                    }
                    #popup {
                        position: fixed;
                        top: 0;
                        left: 0;
                        width: 100%;
                        height: 100%;
                        background-color: rgba(0, 0, 0, 0.6);
                        z-index: 1000;
                    }
                    
                    .content {
                        position: absolute;
                        top: 50%;
                        left: 50%;
                        transform: translate(-50%, -50%);
                        width: 400px;
                        height: 200px;
                        border-radius: 10px;
                        background-color: white;
                        text-align: center;
                    }
                
                    #popup .content span {
                        font-size: 40px;
                        line-height: 75px;
                        font-weight: 700;
                        color: rgb(44, 69, 7);
                    }
                    
                    h2 {
                        font-size: 24px;
                        text-align: center;
                    }
                    
                    p {
                        font-size: 16px;
                        text-align: center;
                    }
                    
                    .close {
                        position: absolute;
                        top: 10px;
                        right: 10px;
                        width: 30px;
                        height: 30px;
                        line-height: 30px;
                        border-radius: 50%;
                        background-color: red;
                        cursor: pointer;
                        text-decoration: none;
                        color: white;
                        font-weight: 600;
                    }
                      
                    .close:hover {
                        background-color: #000000;
                        color: white;
                    }                
                </style>
                <div id="popup">
                    <div class="content">
                    <h2>Green-M Thông Báo!</h2>
                    <p>Danh mục thêm thất bại.</p>
                    <span>- Error -</span>
                    <a href="../index.php?act=cate" class="close">X</a>
                    </div>
                </div>
            ';
        }
    } else if(isset($upcategory_submit)) {
        $cate = new cate_lass();
        $image = $_FILES['category_image']['name'];
        $path = '../../../public/view/images/' . $image;
        if(move_uploaded_file($_FILES['category_image']['tmp_name'], $path)) {
            $path = 'view/images/' . $image;
            $cate->up_cate($category_name, $path, $category_status, $cate_id_up);
            echo '
                <style>
                    .content {
                        position: absolute;
                        top: 50%;
                        left: 50%;
                        transform: translate(-50%, -50%);
                        width: 400px;
                        height: 200px;
                        border-radius: 10px;
                        background-color: white;
                    }
                    
                    .content {
                        animation: slide-in 1.5s ease-in-out;
                    }
                    
                    @keyframes slide-in {
                        0% {
                        top: -100%;
                        }
                    
                        100% {
                        top: 50%;
                        }
                    }
                    #popup {
                        position: fixed;
                        top: 0;
                        left: 0;
                        width: 100%;
                        height: 100%;
                        background-color: rgba(0, 0, 0, 0.6);
                        z-index: 1000;
                    }
                    
                    .content {
                        position: absolute;
                        top: 50%;
                        left: 50%;
                        transform: translate(-50%, -50%);
                        width: 400px;
                        height: 200px;
                        border-radius: 10px;
                        background-color: white;
                        text-align: center;
                    }
                
                    #popup .content span {
                        font-size: 40px;
                        line-height: 75px;
                        font-weight: 700;
                        color: rgb(44, 69, 7);
                    }
                    
                    h2 {
                        font-size: 24px;
                        text-align: center;
                    }
                    
                    p {
                        font-size: 16px;
                        text-align: center;
                    }
                    
                    .close {
                        position: absolute;
                        top: 10px;
                        right: 10px;
                        width: 30px;
                        height: 30px;
                        line-height: 30px;
                        border-radius: 50%;
                        background-color: red;
                        cursor: pointer;
                        text-decoration: none;
                        color: white;
                        font-weight: 600;
                    }
                      
                    .close:hover {
                        background-color: #000000;
                        color: white;
                    }                
                </style>
                <div id="popup">
                    <div class="content">
                    <h2>Green-M Thông Báo!</h2>
                    <p>Danh mục đã được sửa thành công.</p>
                    <span>- Success -</span>
                    <a href="../index.php?act=cate" class="close">X</a>
                    </div>
                </div>
            ';
        } else {
            echo '
                <style>
                    .content {
                        position: absolute;
                        top: 50%;
                        left: 50%;
                        transform: translate(-50%, -50%);
                        width: 400px;
                        height: 200px;
                        border-radius: 10px;
                        background-color: white;
                    }
                    
                    .content {
                        animation: slide-in 1.5s ease-in-out;
                    }
                    
                    @keyframes slide-in {
                        0% {
                        top: -100%;
                        }
                    
                        100% {
                        top: 50%;
                        }
                    }
                    #popup {
                        position: fixed;
                        top: 0;
                        left: 0;
                        width: 100%;
                        height: 100%;
                        background-color: rgba(0, 0, 0, 0.6);
                        z-index: 1000;
                    }
                    
                    .content {
                        position: absolute;
                        top: 50%;
                        left: 50%;
                        transform: translate(-50%, -50%);
                        width: 400px;
                        height: 200px;
                        border-radius: 10px;
                        background-color: white;
                        text-align: center;
                    }
                
                    #popup .content span {
                        font-size: 40px;
                        line-height: 75px;
                        font-weight: 700;
                        color: rgb(44, 69, 7);
                    }
                    
                    h2 {
                        font-size: 24px;
                        text-align: center;
                    }
                    
                    p {
                        font-size: 16px;
                        text-align: center;
                    }
                    
                    .close {
                        position: absolute;
                        top: 10px;
                        right: 10px;
                        width: 30px;
                        height: 30px;
                        line-height: 30px;
                        border-radius: 50%;
                        background-color: red;
                        cursor: pointer;
                        text-decoration: none;
                        color: white;
                        font-weight: 600;
                    }
                      
                    .close:hover {
                        background-color: #000000;
                        color: white;
                    }                
                </style>
                <div id="popup">
                    <div class="content">
                    <h2>Green-M Thông Báo!</h2>
                    <p>Danh mục sửa thất bại.</p>
                    <span>- Error -</span>
                    <a href="../index.php?act=cate" class="close">X</a>
                    </div>
                </div>
            ';
        }
    }
?>