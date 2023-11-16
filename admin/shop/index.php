<?php

include_once("view/header.php");
extract($_REQUEST);
if(isset($act)){
    switch($act){
            case "list":
                include_once("view/home.php");
                    break;
            case "product":
                include_once("view/ql_product_shop.php");
                    break;
            case "order":
                include_once("view/ql_donhang_shop.php");
                    break;
            case "messenger":
                include_once("view/ql_tinnhan_shop.php");
                    break;
            case "rate":
                include_once("view/ql_danhgia_shop.php");
       default:
       include_once("view/home.php");
       break;
       
    }  
}else{
    include_once("view/home.php");

}
include_once("view/footer.php");


?>