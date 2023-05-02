<?php
//function lấy dữ liệu từ db
function index()
{
    $search = '';
    if (isset($_POST['search'])) {
        $search = $_POST['search'];
    }
    $page = 1;
    if (isset($_GET['page'])) {
        $page = $_GET['page'];
    }
    include_once 'config/config.php';
    $sqlCount = "SELECT COUNT(*) AS count_record FROM category WHERE Category_name LIKE '%$search%'";
    $counts = mysqli_query($conn, $sqlCount);
    foreach ($counts as $each) {
        $countRecord = $each['count_record'];
    }
    $recordOnePage = 5;
    $countPage = ceil($countRecord / $recordOnePage);
    $start = ($page - 1) * $recordOnePage;
    $end = 5;
    $sql = "SELECT * FROM category WHERE Category_name LIKE '%$search%' LIMIT $start, $end";
    $category = mysqli_query($conn, $sql);
    include_once 'config/closeDB.php';
    $array = array();
    $array['search'] = $search;
    $array['infor'] = $category;
    $array['page'] = $countPage;
    return $array;
}
function edit()
{
    $id = $_GET['id'];
    include_once 'config/config.php';
    $sql = "SELECT * FROM category WHERE id_category = '$id'";
    $TL = mysqli_query($conn, $sql);
    include_once 'config/closeDB.php';
    return $TL;
}
function update()
{
    $id = $_POST['id'];
    $name = $_POST['tl'];
    include_once 'config/config.php';
    $sql_check = "SELECT id_category FROM category WHERE Category_name = '$name'";
    $query_check = mysqli_query($conn, $sql_check);
    if (mysqli_num_rows($query_check) >= 1) {
        // Payment already exists
        $message = "Thể loại đã tồn tại, Vui lòng sửa lại!";
        echo "<script>alert('$message');</script>";
        return 1;
    } else {
        // Insert new payment
        $sql = "UPDATE category SET Category_name = '$name' WHERE id_category = '$id'";
        mysqli_query($conn, $sql);
        $message = "Sửa thể loại thành công";
        echo "<script>alert('$message');</script>";
        return 0;
    }
    include_once 'config/closeDB.php';
}

//function lưu dữ liệu lên db
function store()
{
    $name = $_POST['tl'];
    include_once 'config/config.php';
    $sql_check = "SELECT id_category FROM category WHERE Category_name = '$name'";
    $query_check = mysqli_query($conn, $sql_check);
    if (mysqli_num_rows($query_check) > 0) {
        // Product already exists
        $message = "Thể loại đã tồn tại, Vui lòng sửa lại!";
        echo "<script>alert('$message');</script>";
        return 1;
    } else {
        // Insert new product
        $sql = "INSERT INTO category(Category_name) VALUES ('$name')";

        mysqli_query($conn, $sql);
        $message = "Thêm thể loại thành công";
        echo "<script>alert('$message');</script>";
        return 0;
        // echo "<script>alert('$message');</script>";
    }
    include_once 'config/closeDB.php';
}
function destroy()
{
    $id = $_GET['id'];
    include_once 'config/config.php';
    $sql = "DELETE FROM category WHERE id_category = '$id'";
    mysqli_query($conn, $sql);
    include_once 'config/closeDB.php';
    echo 'Xóa thành công thể loại';

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
    case 'store':
        //lưu dữ liệu lên db
        $check = store();
        break;
    case 'edit':
        //Lấy dữ liệu từ DB về dựa trên id
        $TL = edit();
        break;
    case 'update':
        //chỉnh sửa dữ liệu lên db
        $check = update();
        break;
    case 'destroy':
        // xóa dữ liệu trên db
        destroy();
        break;
}