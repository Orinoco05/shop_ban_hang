<?php


//Lấy hành động đang thực hiện
$action = '';
if (isset($_GET['action'])) {
    $action = $_GET['action'];
}
include_once 'View/admin/Layout/Header.php';
include_once 'View/admin/Layout/Navbar.php';

//Kiểm tra hành động đang thực hiện
switch ($action) {
    case '':
        //Hiển thị danh sách các
        include_once 'Models/admin/Product_detail_model.php';
        include_once 'View/admin/Product/product_detail.php';
        break;
    case 'add':
        //Hiển thị danh sách các
        include_once 'Models/admin/Product_detail_model.php';
        include_once 'View/admin/Product/add_detail.php';
        break;
    case 'edit':
        //Hiển thị danh sách các
        include_once 'Models/admin/Product_detail_model.php';
        include_once 'View/admin/Product/edit_detail.php';
        break;
    case 'update':
        include_once 'Models/admin/Product_detail_model.php';
       
            echo '<script>
                    location.href = "index.php?controller=detailAdmin";
                </script>';
        
        break;
    case 'create':
        include_once 'Models/admin/Product_detail_model.php';
        echo '<script>
                    location.href = "index.php?controller=detailAdmin";
                </script>';
        break;
    case 'store':
        include_once 'Models/admin/Product_detail_model.php';
            echo '<script>
                    location.href = "index.php?controller=detailAdmin";
                </script>';
       
        break;
    case 'destroy':
        include_once 'Models/admin/Product_detail_model.php';
        echo '<script>
        location.href = "index.php?controller=productAdmin";
            </script>';
        break;

}

include_once 'View/admin/Layout/Footer.php';