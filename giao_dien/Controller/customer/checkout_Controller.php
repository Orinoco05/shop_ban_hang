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
        include_once 'View/customer/order/checkout.php';
        // include_once 'View/customer/cart/cart.php';
        break;
    case 'checkout':

        break;

}
?>