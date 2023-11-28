<?php
    if(session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    if (file_exists('../model_dao/product.php')) {
        require "../model_dao/product.php";
    }

    extract($_REQUEST);

    if(isset($fill)) {
        $fillProduct = new product_lass();
        $show_product_fill = $fillProduct->show_product_fill($fill, $start);
        $i = 1;
        foreach($show_product_fill as $items) {
            extract($items);
            if($product_del == 0.00) {
                $giamgia = 0;
            } else {
                $giamgia = (($product_price - $product_del) / $product_price) * 100;
            }
            if($i == 10) {
                break;
            }
            $image = explode(',', $image_files);
            echo '
                <div class="box">
                    <span class="discount">-'. intval($giamgia) .'%</span>
                    <div class="corner-box"><span><a href="?act=detail&product_id='. $product_id .'" class="loadkkk"><i class="fas fa-eye"></i></a></span></div>
                    <div class="box-img-product"><img src="'. $image[0] .'" alt=""></div>
                    <h3>'. $product_name .'</h3>
                    <p>Số lượng còn lại- <span>'. $product_qty .'</span>kg</p>
                    '; if($giamgia == 0.00) {
                        echo '<div class="price">$'. $product_price .'</div>';
                    } else {
                        echo '<div class="price"><span>$'. $product_price .'</span>$'. $product_del .'</div>';
                    }
                    if($product_qty != 0) {
                        echo '
                                <button type="button" class="btn addtocart" data-shop-id="'. $account_id .'" data-product-id="' . $product_id . '" data-product-name="' . $product_name . '" data-product-img="' . $image[0] . '" data-product-del="' . $product_del . '" data-product-price="' . $product_price . '" data-product-qty="1">Thêm giỏ hàng</button>
                            </div>
                        ';
                    } else {
                        echo '
                                <button type="button" style="background: red; font-size: 19px; color: whitesmoke;">Hết hàng</button>
                            </div>
                        ';
                    }
            $i++;
        }
    }
    if(isset($up_view)) {
        $product = new product_lass();
        $product->up_view($product_id);
    }
    if(isset($check) && $check == "search") {
        $product = new product_lass();
        $ketqua = $product->show_search($value);
        if(count($ketqua) > 0) {
            foreach($ketqua as $items) {
                extract($items);
                echo '
                    <a href="?act=detail&product_id=' . $product_id . '&category='. $category_id .'" class="result-show">
                        <i class="fad fa-search"></i>
                        <span>'. $product_name .'</span>
                        <label>$'. $product_price .'</label>
                    </a>
                ';
            }
        } else {
            echo '
                <h3 align="center">Không có kết quả phù hợp!</h3>
            ';
        }
    }
?>