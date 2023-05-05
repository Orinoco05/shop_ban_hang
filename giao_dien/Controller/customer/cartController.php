<?php
//Lấy hành động hiện tại
$action = '';
if (isset($_GET['action'])) {
    $action = $_GET['action'];
}
//    Kiểm tra hành động hiện tại
switch ($action) {
    case '':
        // index(controller) -> thư mục controoler (tạo controller) -> tạo model
        include_once 'Models/customer/cartModel.php';
        include_once 'View/customer/cart/cart.php';
        // include_once 'View/customer/cart/cart.php';
        break;
    case 'change_amount':
        include_once 'Models/customer/cartModel.php';
        break;
    case 'add_to_cart':
        include_once 'Models/customer/cartModel.php';
        break;
    case 'trashPr':
        include_once 'Models/customer/cartModel.php';
        header('Location: ?controller=cartCustomer');
        break;
}
?>