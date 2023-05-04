<?php
//Lấy hành động hiện tại
$action = '';
if (isset($_GET['action'])) {
    $action = $_GET['action'];
}
//    Kiểm tra hành động hiện tại
switch ($action) {
    case '':
        //            Lấy dữ liệu từ DB
        include_once 'Models/customer/productModel.php';
        //            Đổ dữ liệu lên view
        include_once 'View/customer/product/index.php';
        break;
    case 'product_detail':
        include_once 'Models/customer/productModel.php';
        include_once 'View/customer/product/product_detail.php';
        break;
    // case 'homepage':
    //     include_once 'Models/customer/productModel.php';
    //     include_once 
}
?>