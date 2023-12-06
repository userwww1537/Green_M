<?php
    ob_start();
    extract($_REQUEST);
    if(session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    if (file_exists('../model/product.php')) {
        require "../model/product.php";
    }
    $product = new product_lass();

    if(isset($check) && $check == "del-pro") {
        $product->del_pro($id_pro);
    } else if(isset($check) && $check == "addProductPartOne") {
        if($del != "") {
            $product->add_p1($name, $price, $del, $qty, $status);
        } else {
            $product->add_p1($name, $price, '0.00', $qty, $status);
        }
    } else if(isset($check) && $check == "upProductPartOne") {
        if($del != 0 || $del != 0.00) {
            $product->up_p1($name, $price, $del, $qty, $status, $id);
        } else {
            $product->up_p1($name, $price, '0.00', $qty, $status, $id);
        }
    }

    if(isset($doneProductFull)) {
        $images = $_FILES['images'];
        
        foreach($images['tmp_name'] as $key => $tmp_name) {
            $tmp = $images['tmp_name'][$key];
            $duong_dan = "../../../public/view/images/" . $images['name'][$key];
            move_uploaded_file($tmp, $duong_dan);
            $duong_dan = "view/images/" . $images['name'][$key];
            $product->add_p2($duong_dan);
        }
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
                <p>Sản phẩm đã được thêm thành công.</p>
                <span>- Success -</span>
                <a href="../index.php?act=product" class="close">X</a>
                </div>
            </div>
        ';
    } else if(isset($upProductFull)) {
        $images = $_FILES['images'];
        
        foreach($images['tmp_name'] as $key => $tmp_name) {
            $tmp = $images['tmp_name'][$key];
            $duong_dan = "../../../public/view/images/" . $images['name'][$key];
            move_uploaded_file($tmp, $duong_dan);
            $duong_dan = "view/images/" . $images['name'][$key];
            $product->up_p2($duong_dan, $id);
        }
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
                <p>Sản phẩm đã được cập nhật thành công.</p>
                <span>- Success -</span>
                <a href="../index.php?act=product" class="close">X</a>
                </div>
            </div>
        ';
    }
?>