<?php
//Lấy hành động hiện tại
    $action = '';
    if(isset($_GET['action'])){
        $action = $_GET['action'];
    }
//    Kiểm tra hành động hiện tại
    switch ($action){
        case '':
            include_once 'View/admin/Layout/Header.php';
            include_once 'View/admin/Layout/Navbar.php';
//            Lấy dữ liệu từ DB
            include_once 'Models/admin/Staff_model.php';
//            Đổ dữ liệu lên view
            include_once 'View/admin/Layout/Main.php';
            include_once 'View/admin/Layout/Footer.php';
            break;
    }
?>