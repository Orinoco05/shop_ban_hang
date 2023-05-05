<?php
//function lấy dữ liệu từ db
function index()
{
    $check = 0;
    $search = '';
    if (isset($_POST['search'])) {
        $search = $_POST['search'];
    }
    $page = 1;
    if (isset($_GET['page'])) {
        $page = $_GET['page'];
    }
    include_once 'config/config.php';
    $sqlCount = "SELECT COUNT(*) AS count_record FROM orders WHERE status LIKE '%$search%'";
    //    $sql1 = "SELECT * FROM customer";
    //    $sqlCount = "SELECT count(name_customer) FROM customer WHERE name_customer = '$search'";

    $counts = mysqli_query($conn, $sqlCount);

    foreach ($counts as $each) {
        $countRecord = $each['count_record'];
    }
    $recordOnePage = 5;
    $countPage = ceil($countRecord / $recordOnePage);
    $start = ($page - 1) * $recordOnePage;
    $end = 5;
    $sql = "SELECT * FROM orders WHERE ID_order LIKE '%$search%' ORDER BY ID_order DESC LIMIT $start, $end";
    $bill = mysqli_query($conn, $sql);
    include_once 'config/closeDB.php';
    $array = array();
    $array['search'] = $search;
    $array['infor'] = $bill;
    $array['page'] = $countPage;
    $array['check'] = $check;
    return $array;
}

function update()
{
    $status = $_POST['status'];
    $id_bill = $_POST['id_bill'];
    include_once 'config/config.php';
    $sqls = "SELECT * FROM orders WHERE ID_order = '$id_bill'";
    $checks = mysqli_query($conn, $sqls);
    foreach ($checks as $check) {
        if ($check['Status'] == 4) {
            $message = "Đơn hàng đã hủy!";
            echo "<script>alert('$message');</script>";
            return 1;
        } elseif ($check['Status'] == 3) {
            $message = "Đơn hàng đã hoàn thành!";
            echo "<script>alert('$message');</script>";
            return 1;
        } elseif ($status < $check['Status']) {
            $message = "Đơn hàng không thể chuyển hổi trạng thái này!";
            echo "<script>alert('$message');</script>";
            return 1;
        } elseif ($status > $check['Status']) {
            $sql = "UPDATE `orders` SET `Status`='$status' WHERE ID_order = '$id_bill'";
            mysqli_query($conn, $sql);
            $message = "Đơn hàng cập nhật thành công!";
            echo "<script>alert('$message');</script>";
            return 0;
        }
    }
    include_once 'config/closeDB.php';
}

function details()
{
    $staff = $_SESSION['ID_staff'];

    $id_bill = $_GET['id'];
    include_once 'config/config.php';
    $sql = "UPDATE orders SET ID_staff = '$staff' WHERE ID_order = '$id_bill'";
    mysqli_query($conn, $sql);
    $sqlproduct = "SELECT order_detail.*, orders.*, product.*,product_detail.*, staff.*, payment_methods.Method_name as name_payment, delivery_methods.Method_name as name_deli FROM orders 
    JOIN order_detail ON orders.ID_order = order_detail.ID_order 
    JOIN staff ON orders.ID_staff = staff.ID_staff 
    JOIN payment_methods ON payment_methods.ID_payment = orders.ID_payment
    JOIN delivery_methods ON delivery_methods.ID_delivery = orders.ID_delivery
    JOIN product_detail ON product_detail.ID_product_detail = order_detail.ID_product_detail 
    JOIN product ON product_detail.ID_product = product.ID_product WHERE orders.ID_order = '$id_bill' ";
    $products = mysqli_query($conn, $sqlproduct);
    include_once 'config/closeDB.php';
    $bill = array();
    $bill['product'] = $products;
    return $bill;
}


//Lấy hành động đang thực hiện
$action = '';
if (isset($_GET['action'])) {
    $action = $_GET['action'];
}

switch ($action) {
    case '':
        //lấy dữ liệu từ db
        $array = index();
        break;

    case 'show_edit_order':

        $bill = details();
        break;
    case 'update':
        $check = update();
        break;
    case 'details':
        $bill = details();
        break;

}