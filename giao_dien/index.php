<?php
// session_start();
// //Lấy controller đang làm việc
// $controller = '';
// if(isset($_GET['controller'])){
//     $controller = $_GET['controller'];
// }
// //Kiểm tra đó là controller nào
// switch ($controller){
//     case '':
//         include_once 'Controller/customer/productController.php';
//         break;
//     case 'shop_customer':
//         include_once 'Controller/customer/productController.php';
//         break;
//     case 'cart':
//         include_once 'Controller/customer/cartController.php';
//         break;
//     default:
//         echo "Chưa chọn controller nào";
//         break;
// }
?>



<!-- Admin -->
<?php
session_start();

$controller = '';
if (isset($_GET['controller'])) {
    $controller = $_GET['controller'];
}
switch ($controller) {
    case 'admin':

        if (isset ($_SESSION ['username']) && isset($_SESSION ['password'])){
        include_once 'Controller/admin/Staff_controller.php';
        } else {
            echo '<script>
                            location.href = "index.php?controller=Login";
                        </script>';
        }
              break;
              case 'Login':
                include_once 'Controller/Login_controller.php';
        break;
    case 'productAdmin':
        include_once 'Controller/admin/Product_controller.php';
        break;
    case 'categoryAdmin':
        include_once 'Controller/admin/Category_controller.php';
        break;
    case 'feedbackAdmin':
        include_once 'View/admin/Feedback/feedback.php';
        break;
    case 'paymentAdmin':
        include_once 'View/admin/payment/payment.php';
        break;

    case 'shop':
        // if (isset ($_SESSION ['username']) && isset($_SESSION ['password'])){
        include_once 'Controller/customer/productController.php';
        // } else {
        //     echo '<script>
        //                     location.href = "index.php?controller=Login";
        //                 </script>';
        // }
        //       break;
        //       case 'Login':
        //         include_once 'Controller/Login_controller.php';
        break;
    case 'productCustomer':
        include_once 'View/Product/product.php';
        break;
    case 'categoryCustomer':
        include_once 'View/Category/category.php';
        break;
    case 'feedbackCustomer':
        include_once 'View/Feedback/feedback.php';
        break;
    case 'paymentCustomer':
        include_once 'View/payment/payment.php';
        break;
    case 'cartCustomer': {
            include_once 'Controller/customer/cartController.php';
        }
        break;
    case 'loginCustomer':
        include_once 'Controller/customer/userController.php';
        break;
    case 'homepage':
        include_once 'Controller/customer/productController.php';
        break;
    case 'checkout':
        include_once 'Controller/customer/checkout_Controller.php';
        break;
    default:
        echo "Chưa chọn controller nào";
        break;


}
// include_once 'View/Layout/Footer.php';
?>