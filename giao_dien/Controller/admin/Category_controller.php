<?php
//Lấy hành động hiện tại
$action = '';
if (isset($_GET['action'])) {
    $action = $_GET['action'];
}
//    Kiểm tra hành động hiện tại
switch ($action) {
    case '':
        include_once 'Models/admin/Category_model.php';
        include_once 'View/admin/Category/category.php';
        break;
    case 'Add':
        include_once 'View/admin/Category/add_category.php';
        break;
    case 'edit':
        include_once 'Models/admin/Category_model.php';
        include_once 'View/admin/Category/edit_category.php';
        break;
    case 'update':
        include_once 'Models/admin/Category_model.php';
        // if ($check == 0) {
        echo '<script>   
                    location.href = "index.php?controller=categoryAdmin";
                </script>';
        // } elseif ($check == 1) {
        //     echo '<script>
        //             location.href = "index.php?controller=theloai";
        //         </script>';
        // }
        break;
    case 'store':
        include_once 'Models/admin/Category_model.php';
        
        // if ($check == 0) {
        echo '<script>   
                    location.href = "index.php?controller=categoryAdmin";
                </script>';
        // } elseif ($check == 1) {
        //     echo '<script>
        //             location.href = "index.php?controller=theloai&action=add";
        //         </script>';
        // }
        break;
    case 'destroy':
        include_once 'Models/admin/Category_model.php';
        break;
}