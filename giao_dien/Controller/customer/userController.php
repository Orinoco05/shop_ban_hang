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
        include_once 'View/customer/signin.php';
        // include_once 'View/customer/cart/cart.php';
        break;
    case 'access_login':
        include_once 'Models/customer/userModel.php';
        if ($test == 0) {
            echo '<script language="javascript">';
            echo 'alert("Email or password wrong");';
            echo 'window.location.href="?controller=loginCustomer";';
            echo '</script>';
        } elseif ($test == 1) {
            header('Location:index.php?controller=shop');
        }
        break;

}
?>