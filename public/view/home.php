<section class="home" id="home">
    <div class="box-container">
        <div class="left-col">
            <h2 class="title">Danh mục</h2>
            <div class="box">
                <?php
                foreach ($show_category_home as $items) {
                    extract($items);
                    echo '
                            <a href="?act=shop&check=cate&cate_id='. $category_id .'&page=1&start=0"><img src="' . $category_img . '" alt="">
                                <p>' . $category_name . '</p> <span>' . $so_luong_san_pham . '</span>
                            </a>
                        ';
                }
                ?>
            </div>
        </div>
        <div class="right-col">
            <img src="view/images/home-1.webp" alt="">
        </div>
    </div>
</section>

<section class="product">
    <div class="heading">
        <h2>Nổi bật hôm nay <span>Lượt xem</span></h2>
        <a href="index.php?act=shop&check=product&page=1&start=0"> Xem thêm</a>
    </div>
    <div class="box-container">
        <?php
        $i = 1;
        foreach ($show_product_home as $items) {
            extract($items);
            if ($product_del == 0.00) {
                $giamgia = 0;
            } else {
                $giamgia = (($product_price - $product_del) / $product_price) * 100;
            }
            if ($i == 8) {
                break;
            }
            $image = explode(',', $image_files);
            echo '
                    <div class="box">
                        <span class="discount">-' . intval($giamgia) . '%</span>
                        <div class="corner-box">'. $product_view .'<span><a href="?act=detail&product_id=' . $product_id . '&category='. $category_id .'" class="loadkkk"><i class="fas fa-eye"></i></a></span></div>
                        <img width="250px" height="250px" src="' . $image[0] . '" alt="">
                        <h3>' . $product_name . '</h3>
                        <p>Số lượng còn lại- <span>' . $product_qty . '</span>kg</p>
                        ';
            if ($giamgia == 0.00) {
                echo '<div class="price">$' . $product_price . '</div>';
            } else {
                echo '<div class="price"><span>$' . $product_price . '</span>$' . $product_del . '</div>';
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

<section class="container">
    <div class="box-container"></div>
</section>

<section class="last-product product">
    <div class="heading">
        <h2>Giảm giá sâu <span> Top SP Giảm</span></h2>
        <a href="index.php?act=shop&check=product&page=1&start=0"> Xem thêm</a>
    </div>
    <div class="box-container">
        <?php
        $i = 1;
        foreach ($show_product_top as $items) {
            extract($items);
            if ($product_del > 0.00) {
                if ($product_del == 0.00) {
                    $giamgia = 0;
                } else {
                    $giamgia = (($product_price - $product_del) / $product_price) * 100;
                }
                if ($i == 5) {
                    break;
                }
                $image = explode(',', $image_files);
                echo '
                        <div class="box">
                            <span class="discount">-' . intval($giamgia) . '%</span>
                            <div class="corner-box"><span><a href="?act=detail&product_id=' . $product_id . '&category='. $category_id .'" class="loadkkk"><i class="fas fa-eye"></i></a></span></div>
                            <img width="250px" height="250px" src="' . $image[0] . '" alt="">
                            <h3>' . $product_name . '</h3>
                            <p>Số lượng còn lại- <span>' . $product_qty . '</span>kg</p>
                            ';
                if ($giamgia == 0.00) {
                    echo '<div class="price">$' . $product_price . '</div>';
                } else {
                    echo '<div class="price"><span>$' . $product_price . '</span>$' . $product_del . '</div>';
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