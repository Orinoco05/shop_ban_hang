<?php
//Lấy hành động hiện tại
$action = '';
if (isset($_GET['action'])) {
    $action = $_GET['action'];
}
include_once 'View/admin/Layout/Header.php';
include_once 'View/admin/Layout/Navbar.php';
//    Kiểm tra hành động hiện tại
switch ($action) {
    case '':
        include_once 'View/admin/Layout/Header.php';
        include_once 'View/admin/Layout/Navbar.php';
        //            Lấy dữ liệu từ DB
        include_once 'Models/admin/Oder_model.php';
        include_once 'View/admin/Order/order_admin.php';

        //            Đổ dữ liệu lên view
        break;
    case 'show_edit_order':
        include_once 'Models/admin/Oder_model.php';
        include_once 'View/admin/Order/edit_order.php';
        break;
    case 'update':
        include_once 'Models/admin/Oder_model.php';
        echo '<script>
                    location.href = "index.php?controller=billAdmin";
                </script>';
    case 'details':
        include_once 'Models/admin/Oder_model.php';
        include_once 'View/admin/Order/detail_order.php';
        break;
}

include_once 'View/admin/Layout/Footer.php';
?>