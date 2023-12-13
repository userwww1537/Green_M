
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