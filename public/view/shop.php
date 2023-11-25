<section class="shop-product home">

<div class="box-container">
    
    <div class="left-col">
      
        <div class="left-col-1">
            <h2 class="title">Danh mục</h2>
            <?php
                foreach($show_category_shop as $items) {
                    extract($items);
                    echo '
                        <div class="box">
                            <div class="check">
                                <i class="fas fa-caret-right"></i>
                                <a href="?act=shop&check=cate&cate_id='. $category_id .'&page=1&start=0">'. $category_name .'</a> 
                            </div>
                        </div>
                    ';
                }
            ?>
        </div>

        <div id="col-2">
            <h2 class="title">Trạng thái sản phẩm</h2>
            <div class="box">
                <?php
                    $onl = 0;
                    $off = 0;
                    foreach($show_left_shop as $items) {
                        extract($items);
                        if($product_qty == 0) {
                            $off++;
                        } else {
                            $onl++;
                        }
                    }
                ?>
                <div class="check">
                    <i class="fas fa-caret-right"></i>
                    <a href="#">Sẵn hàng (<b style="color: green;"><?=$onl;?></b>sản phẩm)</a> 
                </div>
                <div class="check">
                    <i class="fas fa-caret-right"></i>
                    <a href="#">Hết hàng (<b style="color: red;"><?=$off;?></b>sản phẩm)</a> 
                </div>
            </div>
        </div>

        <div id="col-3">
            <h2 class="title">Sản phẩm</h2>
            <?php
                $i = 1;
                foreach($show_left_shop as $items) {
                    extract($items);
                    if($product_del > 0.00) {
                        $giamgia = (($product_price - $product_del) / $product_price) * 100;
                        if($i == 5) {
                            break;
                        }
                        $image = explode(',', $image_files);
                        echo '
                            <a href="?act=detail&product_id=' . $product_id . '&category='. $category_id .'">
                                <div class="box">
                                    <div class="image">
                                        <img src="'. $image[0] .'" alt="">
                                        <div class="content">
                                            <h3>'. $product_name .'</h3>
                                            <p><span>$'. $product_price .'</span>$'. $product_del .'</p>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        ';
                        $i++;
                    }
                }
            ?>
            
        </div>

    </div>

    <div class="right-col">
        <div class="logo">
            <a href="index.php"><img src="view/images/shop-1.webp" alt=""></a>
        </div>

        <div class="right-col-1">
            <div class="icons">
                <i class="fas fa-th-large"></i>
            </div>
            <div class="select">
                <td>
                    <select id="fillProduct">
                        <option selected value="fillnewtoour">Sắp xếp theo mới -> cũ</option>
                        <option value="fillreview">Sắp xếp theo lượt xem cao nhất -> thấp</option> 
                        <option value="fillourtonew">Sắp xếp theo cũ -> mới</option>
                        <option value="fillpriceasc">Sắp xếp giá thấp nhất -> cao</option>     
                        <option value="fillpricedesc">Sắp xếp giá cao nhất -> thấp</option>     
                    </select>
                  </td>
            </div>
        </div>
        

        <?php
            if(isset($check) && $check == "product") {
        ?>
            <div class="right-col-3">
                <section class="product">
                    <div class="box-container fullProductShop">
            
                    <?php
                        $i = 1;
                        foreach($show_product_shop as $items) {
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
                                    <div class="corner-box"><span><a href="?act=detail&product_id=' . $product_id . '&category='. $category_id .'" class="loadkkk"><i class="fas fa-eye"></i></a></span></div>
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
                    ?>
            
                    </div>
            
                </section>
            </div>

            
            <div class="next-page">
                <?php
                    $trang = 0;
                    foreach ($phantrang as $items) {
                        $trang++;
                    }
                    $chiatrang = $trang / 9;
                    $page = ceil($chiatrang);
                    $start = 0;
                    $show_offset = "";
                    $current_page = $_GET['page'];

                    for ($i = 1; $i <= $page; $i++) {
                        if ($i == $current_page) {
                            $show_offset .= '<a href="index.php?act=shop&check=product&page='. $i .'&start=' . $start . '" class="page loadkkk" id="active-page">' . $i . '</a>';
                        } else {
                            $show_offset .= '<a href="index.php?act=shop&check=product&page='. $i .'&start=' . $start . '" class="page loadkkk">' . $i . '</a>';
                        }
                        $start += 9;
                    }

                    echo $show_offset;
                ?>
            </div>
        <?php
            } else if(isset($check) && $check == "cate") {
        ?>
            <div class="right-col-3">
                <section class="product">
                    <div class="box-container fullProductShop">
            
                    <?php
                        $cate_id = $_GET['cate_id'];
                        $i = 1;
                        foreach($show_product_shop as $items) {
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
                            if($cate_id == $category_id) {
                                echo '
                                    <div class="box">
                                        <span class="discount">-'. intval($giamgia) .'%</span>
                                        <div class="corner-box"><span><a href="?act=detail&product_id=' . $product_id . '&category='. $category_id .'" class="loadkkk"><i class="fas fa-eye"></i></a></span></div>
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
                    ?>
            
                    </div>
            
                </section>
            </div>

            
            <div class="next-page">
                <?php
                    $trang = 0;
                    foreach ($phantrang as $items) {
                        if($cate_id == $items['category_id']) {
                            $trang++;
                        }
                    }
                    $chiatrang = $trang / 9;
                    $page = ceil($chiatrang);
                    $start = 0;
                    $show_offset = "";
                    $current_page = $_GET['page'];

                    for ($i = 1; $i <= $page; $i++) {
                        if ($i == $current_page) {
                            $show_offset .= '<a href="index.php?act=shop&check=cate&cate_id='. $cate_id .'&page='. $i .'&start=' . $start . '" class="page loadkkk" id="active-page">' . $i . '</a>';
                        } else {
                            $show_offset .= '<a href="index.php?act=shop&check=cate&cate_id='. $cate_id .'&page='. $i .'&start=' . $start . '" class="page loadkkk">' . $i . '</a>';
                        }
                        $start += 9;
                    }

                    echo $show_offset;
                ?>
            </div>
        <?php
            }
        ?>
    </div>

</div>
</section>


<script>
    $(".addtocart").click(function() {
        var product_id = $(this).data("product-id");
        var product_name = $(this).data("product-name");
        var product_img = $(this).data("product-img");
        var product_del = $(this).data("product-del");
        var product_price = $(this).data("product-price");
        var product_qty = $(this).data("product-qty");
        var shop_id = $(this).data("shop-id");
        if (product_del == "0.00") {
            $.ajax({
                url: "controllers/xuly_cart.php",
                method: "POST",
                data: {
                    product_id: product_id,
                    product_name: product_name,
                    product_img: product_img,
                    product_price: product_price,
                    product_qty: product_qty,
                    shop_id: shop_id,
                    check_del: "del"
                },
                success: function(data) {
                    $(".success_noti").text(data);
                    show_success();
                }
            });
        } else {
            $.ajax({
                url: "controllers/xuly_cart.php",
                method: "POST",
                data: {
                    product_id: product_id,
                    product_name: product_name,
                    product_img: product_img,
                    product_price: product_del,
                    product_qty: product_qty,
                    shop_id: shop_id,
                    check_del: "del"
                },
                success: function(data) {
                    $(".success_noti").text(data);
                    show_success();
                }
            });
        }
    });
</script>

<script>
    $(document).ready(function() {
        $("#fillProduct").change(function() {
            var fill = $(this).val();
            var url = window.location.href;
            var params = new URL(url).searchParams;
            var start = params.get("start");
            $.ajax({
                url: "controllers/xuly_product.php",
                method: "POST",
                data: {
                    fill: fill,
                    start: start
                },
                success: function(data) {
                    $(".fullProductShop").html(data);
                    $(".success_noti").text("Lọc thành công!");
                    show_success();
                }
            });
        });
    });
</script>
<script>
    $(".addtocart").click(function() {
        var product_id = $(this).data("product-id");
        var product_name = $(this).data("product-name");
        var product_img = $(this).data("product-img");
        var product_del = $(this).data("product-del");
        var product_price = $(this).data("product-price");
        var product_qty = $(this).data("product-qty");
        if (product_del == "0.00") {
            $.ajax({
                url: "controllers/xuly_cart.php",
                method: "POST",
                data: {
                    product_id: product_id,
                    product_name: product_name,
                    product_img: product_img,
                    product_price: product_price,
                    product_qty: product_qty,
                    shop_id: shop_id,
                    check_del: "del"
                },
                success: function(data) {
                    $(".success_noti").text(data);
                    show_success();
                }
            });
        } else {
            $.ajax({
                url: "controllers/xuly_cart.php",
                method: "POST",
                data: {
                    product_id: product_id,
                    product_name: product_name,
                    product_img: product_img,
                    product_price: product_del,
                    product_qty: product_qty,
                    shop_id: shop_id,
                    check_del: "del"
                },
                success: function(data) {
                    $(".success_noti").text(data);
                    show_success();
                }
            });
        }
    });
</script>