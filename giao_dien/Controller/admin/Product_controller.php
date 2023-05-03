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
        include_once 'Models/admin/Product_model.php';
        include_once 'View/admin/Product/product.php';
        break;
    case 'add':
        //Hiển thị danh sách các
        include_once 'Models/admin/Product_model.php';
        include_once 'View/admin/Product/add_product.php';
        break;
    case 'edit':
        //Hiển thị danh sách các
        include_once 'Models/admin/Product_model.php';
        include_once 'View/admin/Product/edit_product.php';
        break;
    case 'update':
        include_once 'Models/admin/Product_model.php';;
        if ($check == 0) {
            echo '<script>
                    location.href = "index.php?controller=productAdmin";
                </script>';
        } elseif ($check == 1) {
            echo '<script>
                    location.href = "index.php?controller=productAdmin&action=edit";
                </script>';
        }
        break;
    case 'create':
        include_once 'Models/admin/Product_model.php';;
        break;
    case 'store':
        include_once 'Models/admin/Product_model.php';
        if ($test == 0) {
            echo '<script>
                    location.href = "index.php?controller=productAdmin";
                </script>';
        } elseif ($test == 1) {
            echo '<script>
                    location.href = "index.php?controller=productAdmin&action=add";
                </script>';
        }
        break;
    case 'destroy':
        include_once 'Models/admin/Product_model.php';
        echo '<script>
        location.href = "index.php?controller=productAdmin";
            </script>';
        break;
    case 'detail':
        include_once 'Models/admin/Product_model.php';
        include_once 'View/admin/Product/edit_product.php';
        break;

}

include_once 'View/admin/Layout/Footer.php';