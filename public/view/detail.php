<?php $image = explode(',', $show['image_files']); ?>
<section id="prodetails" class="section-p1">
    <div class="single-pro-image">
        <img src="<?=$image[0]?>" width="100%" height="400px" id="MainImg" alt>
        <div class="small-img-group">
            <?php
                $dem = count($image);
                for($i = 0; $i < $dem; $i++) {
                    echo '            
                        <div class="small-img-col">
                            <img src="'.$image[$i].'" height="130px" width="100%" class="small-img" alt>
                        </div>
                    ';
                }
            ?>
        </div>
    </div>

    <div class="left-shop-profile">
        <div class="boc-shop">
            <div class="avt-shop">
                <img width="80px" height="80px" src="<?=$show['account_avt']?>" alt="">
            </div>
            <div class="name-follow">
                <h3><?=$show['account_name']?> <i class="fad fa-store"></i></h3>
                <span><?=$show['total_orders']?><b> Đơn đã bán</b></span>
            </div>
        </div>
        <hr>
        <?php
            if(isset($_SESSION['83x86']['account_id'])) {
                echo '<a href="?act=mess_chat&from='.$_SESSION['83x86']['account_id'].'&to='.$show['account_id'].'"><button class="mess-shop">Nhắn tin</button></a>';
            } else {
                echo '<a><button class="mess-shop">Nhắn tin</button></a>';
            }
        ?>
        
    </div>

    <div class="single-pro-details">
        <h6>Trang Chủ / <?=$show['category_name']?></h6>
        <h4><?=$show['product_name']?></h4>
        <div class="stardetails">
        </div>
        <?php
            if($show['product_del'] == 0.00) {
                echo '<h2>$'.$show['product_price'].'</h2>';
            } else {
                echo '<h2>$'.$show['product_del'].'</h2>';
            }
        ?>
        <input type="number" value="0" min="0" max="<?=$show['product_qty']?>" name="qty" id="quantity-input"> Kg
        <?php
            if($show['product_qty'] == 0) {
                echo '<a class="normal loadkkk" id="add-to-cart-link" style="background-color: red;">Hết hàng</a>';
            } else {
                if($show['product_del'] == 0.00) {
                    echo '<a href="controllers/xuly_cart.php?add_cart_detail=true&shop_id='. $show['account_id'] .'&product_name='. $show['product_name'] .'&product_price='. $show['product_price'] .'&product_id='.$show['product_id'].'&product_img='.$image[0].'&product_qty=1" class="normal loadkkk" id="add-to-cart-link">Thêm giỏ hàng</a>';
                } else {
                    echo '<a href="controllers/xuly_cart.php?add_cart_detail=true&shop_id='. $show['account_id'] .'&product_name='. $show['product_name'] .'&product_price='. $show['product_del'] .'&product_id='.$show['product_id'].'&product_img='.$image[0].'&product_qty=1" class="normal loadkkk" id="add-to-cart-link">Thêm giỏ hàng</a>';
                }
            }
        ?>

        <script>
            document.getElementById('quantity-input').addEventListener('change', function() {
                var quantity = this.value;
                var addToCartLink = document.getElementById('add-to-cart-link');
                var currentURL = addToCartLink.href;
                var newURL = currentURL.replace(/qty=\d+/, 'qty=' + quantity);
                addToCartLink.href = newURL;
            });
        </script>
        <h4 style="font-size: 18px;">Thông Tin Sản Phẩm</h4>
        <span style="font-size: 16px;">
            Tên sản phẩm: <b><?=$show['product_name']?></b> <br>
            Danh mục: <b><?=$show['category_name']?></b> <br>
            <?php
                if($show['product_del'] != "0") {
            ?>
                Giá gốc: <b> $<?=$show['product_price']?></b> <br> Giảm còn: <b>$<?=$show['product_del']?></b><br> <br>
            <?php
                } else {
            ?>
                Giá gốc: $<?=$show['product_price']?><br> <br>
            <?php  
                }
            ?>
            Lượt tiếp cận sản phẩm: <b><?=$show['product_view']?> lượt xem</b>. <br> <br>

            Ngày đăng bán chính thức: <b><?=$show['time_reg']?></b>
        </span>
    </div>
</section>
<input type="hidden" id="product_id" value="<?=$show['product_id']?>">
<script>
    $(document).ready(function() {
        var product_id = $("#product_id").val();
        $.ajax({
            url: "controllers/xuly_product.php",
            method: "POST",
            data: {
                up_view: "true",
                product_id: product_id
            },
            success: function(data) {
                $(".testbug").html(data);
            }
        });
    });
</script>
<div class="comment">
    <h3>Bình luận</h3>
    
    <?php
        if (isset($_SESSION['83x86'])) {
            if(isset($checkIfOrderCompleteSameRate)) { ?>
                <div class="rate">
                    <div class="star">
                        <i class="far fa-star" data-value="1"></i>
                        <i class="far fa-star" data-value="2"></i>
                        <i class="far fa-star" data-value="3"></i>
                        <i class="far fa-star" data-value="4"></i>
                        <i class="far fa-star" data-value="5"></i>
                    </div>
                    <div class="cmt">
                        <input style="border: 1px solid black;" type="text" placeholder="Bình luận..." id="userCmt">
                    </div>
                    <input type="hidden" value="<?=$_GET['idOrder']?>" class="idOrder-Rate">
                    <button class="btncmt" id="butCmt">Bình luận</button>
                </div>
    <?php
            }
        }
        ?>
    <div class="filer">
        <label for="loc">Lọc bình luận:</label>
        <select name="loc" id="loc">
            <option value="0" selected>Tất cả</option>
            <option value="5">5⭐</option>
            <option value="4">4⭐</option>
            <option value="3">3⭐</option>
            <option value="2">2⭐</option>
            <option value="1">1⭐</option>
        </select>
    </div>
    <div class="comment-box">
        <div id="comment"></div>
    </div>
</div>
<section class="product">
    <div class="heading">
        <h2>Sản phẩm tương tự <span>Danh mục</span></h2>
        <a class="loadkkk" href="index.php?act=shop&check=cate&cate_id=<?=$_GET['category']?>&page=1&start=0"> Xem thêm</a>
    </div>
    <div class="box-container">
        <?php
            $i = 0;
            foreach($show_same as $items) {
                extract($items);
                if($category_id == $_GET['category']) {
                    if($product_del == 0.00) {
                        $giamgia = 0;
                    } else {
                        $giamgia = (($product_price - $product_del) / $product_price) * 100;
                    }
                    if($i == 4) {
                        break;
                    }
                    $image = explode(',', $image_files);
                    echo '
                        <div class="box">
                            <span class="discount">-'. intval($giamgia) .'%</span>
                            <div class="corner-box"><span><a href="?act=detail&product_id=' . $product_id . '&category='. $category_id .'" class="loadkkk"><i class="fas fa-eye"></i></a></span></div>
                            <img width="250px" height="250px" src="'. $image[0] .'" alt="">
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
<div class="testbug" style="font-size: 15px; position: fixed"></div>
<input type="hidden" name="hiddenStarValue" id="hiddenStarValue" value="0">
<script>
    $('.star i').click(function() {
        var selectedValue = $(this).attr('data-value');
        $('.star i').each(function() {
            var starValue = $(this).attr('data-value');

            if (starValue <= selectedValue) {
                $(this).removeClass('far').addClass('fas');
            } else {
                $(this).removeClass('fas').addClass('far');
            }
        });

        $('#hiddenStarValue').val(selectedValue);
    });

    $("#butCmt").click(function() {
        var valueStar = $('#hiddenStarValue').val();
        var valueContent = $("#userCmt").val();
        var product_id = $("#product_id").val();
        var idOrder = $(".idOrder-Rate").val();

        if(valueStar == 0) {
            $(".success_noti").text("Vui lòng vote sao!");
            show_success();
        } else {
            $.ajax({
                url: "controllers/xuly_rate.php",
                method: "POST",
                data: {
                    valueStar: valueStar,            
                    id_product: product_id, 
                    idOrder: idOrder,         
                    valueContent: valueContent          
                },
                success: function() {
                    $('.rate').css('display', 'none');
                }
            });
        }
    });
    
    function showCMT() {
        var loc = $("#loc").val();
        var product_id = $("#product_id").val();
        $.ajax({
            url: "controllers/xuly_rate.php",
            method: "POST",
            data: {
                loc: loc,            
                id_product: product_id            
            },
            success: function(data) {
                $("#comment").html(data);
            }
        });
        $.ajax({
            url: "controllers/xuly_rate.php",
            method: "POST",
            data: {demRate: 0, id_product: product_id},
            success: function(data) {
                $(".stardetails").html(data);
            }
        });
    }

    setInterval(showCMT, 100);

    var mainImg = document.getElementById("MainImg");
    var smallImg = document.getElementsByClassName("small-img");

    smallImg[0].onclick = function() {
        mainImg.src = smallImg[0].src;
    }
    smallImg[1].onclick = function() {
        mainImg.src = smallImg[1].src;
    }
    smallImg[2].onclick = function() {
        mainImg.src = smallImg[2].src;
    }
    smallImg[3].onclick = function() {
        mainImg.src = smallImg[3].src;
    }
    function notLog() {
        alert("Vui lòng đăng nhập để bình luận!");
    }
</script>
