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
    $sqlCount = "SELECT COUNT(*) AS count_record FROM product WHERE Product_name LIKE '%$search%'";
    $counts = mysqli_query($conn, $sqlCount);
    foreach ($counts as $each) {
        $countRecord = $each['count_record'];
    }
    $recordOnePage = 5;
    $countPage = ceil($countRecord / $recordOnePage);
    $start = ($page - 1) * $recordOnePage;
    $end = 5;
    $sql = "SELECT product.* , category.Category_name FROM product JOIN category ON product.id_category = category.id_category WHERE Product_name LIKE '%$search%' LIMIT $start, $end";
    $product = mysqli_query($conn, $sql);
    include_once 'config/closeDB.php';
    $array = array();
    $array['search'] = $search;
    $array['infor'] = $product;
    $array['page'] = $countPage;
    return $array;
}

function addProduct()
{
    include_once 'config/config.php';
    $sql = "SELECT * FROM category";
    $category = mysqli_query($conn, $sql);
    include_once 'config/closeDB.php';
    return $category;
}

function store()
{

    $name = $_POST['name'];
    $price = $_POST['price'];
    $img = $_POST['img'];
    $category = $_POST['id_category'];
    include_once 'config/config.php';
    $sql_check = "SELECT id_product FROM product WHERE Product_name = '$name'";
    $query_check = mysqli_query($conn, $sql_check);
    if (mysqli_num_rows($query_check) > 0) {
        // Product already exists
        $message = "Tên sản phẩm đã tồn tại, Vui lòng sửa lại!";
        echo "<script>alert('$message');</script>";
        return 1;
    } else {
        // Insert new product
        $sql = "INSERT INTO product (Product_name, img, Price, id_category)
                VALUES ('$name', '$img', '$price', '$category')";
        mysqli_query($conn, $sql);
        $message = "Thêm sản phẩm thành công!";
        echo "<script>alert('$message');</script>";
        return 0;
    }

}

function editProduct()
{
    //        Lấy id
    $id = $_GET['id'];
    include_once 'config/config.php';
    $sqlCategory = "SELECT * FROM category";
    $category = mysqli_query($conn, $sqlCategory);
    $sql = "SELECT * FROM product WHERE ID_product = '$id'";
    $products = mysqli_query($conn, $sql);
    include_once 'config/closeDB.php';
    $array1 = array();
    $array1['category'] = $category;
    $array1['products'] = $products;
    return $array1;
}

function updateProduct()
{
    $id = $_POST['id'];
    $name = $_POST['name'];
    $img = $_POST['img'];
    $price = $_POST['price'];
    $category_id = $_POST['id_category'];
    include_once 'config/config.php';
    $sql_check = "SELECT ID_product FROM product WHERE Product_name = '$name'";
    $query_check = mysqli_query($conn, $sql_check);
    if (mysqli_num_rows($query_check) > 1) {
        // Product already exists
        $message = "Tên sản phẩm đã tồn tại, Vui lòng sửa lại!";
        echo "<script>alert('$message');</script>";
        return 1;
    } else {
        // Insert new product
        $sql = "UPDATE product SET Product_name = '$name', img = '$img', Price = '$price', id_category = '$category_id' WHERE ID_product = '$id'";
        mysqli_query($conn, $sql);
        $message = "Sửa sản phẩm thành công!";
        echo "<script>alert('$message');</script>";
        return 0;
    }

    
}
function destroyProduct()
{
    $id = $_GET['id'];
    include_once 'config/config.php';
    $sql2 = "SELECT ID_product FROM product_detail  WHERE ID_product = '$id'";
    $check = mysqli_query($conn, $sql2);
    if (mysqli_num_rows($check) > 1) {
        $message = "Sản phẩm đang tồn tại trong mục sản phẩm chi tiết!";
        echo "<script>alert('$message');</script>";
    } else {
        $sql = "DELETE FROM product WHERE ID_product = '$id'";
        mysqli_query($conn, $sql);
        include_once 'config/closeDB.php';
        $message = "Xóa sản phẩm thành công!";
        echo "<script>alert('$message');</script>";
    }
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
    case 'add':
        $arr = addProduct();
        break;
    case 'store':
        //lưu dữ liệu lên db
        $test = store();
        break;
    case 'edit':
        $array1 = editProduct();
        break;
    case 'update':
        $check = updateProduct();
        break;
    case 'destroy':
        destroyProduct();
        break;
    // case 'detail':
    //     $product = detailProduct();
    //     break;
}