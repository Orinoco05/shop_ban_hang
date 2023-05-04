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
    $sqlCount = "SELECT COUNT(*) AS count_record FROM product_detail JOIN product ON product.ID_product = product_detail.ID_product WHERE Product_name LIKE '%$search%'";
    $counts = mysqli_query($conn, $sqlCount);
    foreach ($counts as $each) {
        $countRecord = $each['count_record'];
    }
    $recordOnePage = 5;
    $countPage = ceil($countRecord / $recordOnePage);
    $start = ($page - 1) * $recordOnePage;
    $end = 5;
    $sql = "SELECT product_detail.* ,product.*, color.*, size.* FROM product JOIN product_detail ON product.ID_product = product_detail.ID_product JOIN size ON product_detail.ID_size = size.ID_size JOIN color ON product_detail.ID_color = color.ID_color WHERE Product_name LIKE '%$search%' LIMIT $start, $end";
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
    $sql = "SELECT * FROM size";
    $size = mysqli_query($conn, $sql);
    $sql1 = "SELECT * FROM color";
    $color = mysqli_query($conn, $sql1);
    $sql2 = "SELECT * FROM product";
    $product = mysqli_query($conn, $sql2);
    include_once 'config/closeDB.php';
    $arr = array();
    $arr['size'] = $size;
    $arr['color'] = $color;
    $arr['product'] = $product;
    return $arr;
}

function store()
{

    
    $des = $_POST['des'];
    $quantity = $_POST['quantity'];
    $img = $_POST['img'];
    $ID_product = $_POST['ID_product'];
    $ID_size = $_POST['ID_size'];
    $ID_color = $_POST['ID_color'];
    include_once 'config/config.php';
    
        // Insert new product
        $sql = "INSERT INTO product_detail (Quantity, Description, ID_product, ID_size, ID_color, img_2rd)
                VALUES ('$quantity', '$des', '$ID_product', '$ID_size', '$ID_color', '$img')";
        mysqli_query($conn, $sql);
        $message = "Thêm sản phẩm thành công!";
        echo "<script>alert('$message');</script>";
    

}

function editProduct()
{
    //        Lấy id
    $id = $_GET['id'];
    include_once 'config/config.php';
    $sql = "SELECT * FROM size";
    $size = mysqli_query($conn, $sql);
    $sql1 = "SELECT * FROM color";
    $color = mysqli_query($conn, $sql1);
    $sql2 = "SELECT * FROM product";
    $product = mysqli_query($conn, $sql2);
    $sql = "SELECT * FROM product_detail WHERE ID_product_detail = '$id'";
    $products = mysqli_query($conn, $sql);
    include_once 'config/closeDB.php';
    $array1 = array();
    $array1['size'] = $size;
    $array1['color'] = $color;
    $array1['product'] = $product;
    $array1['products'] = $products;
    return $array1;
}

function updateProduct()
{
    $id = $_POST['id'];
    $des = $_POST['des'];
    $quantity = $_POST['quantity'];
    $img = $_POST['img'];
    $ID_product = $_POST['ID_product'];
    $ID_size = $_POST['ID_size'];
    $ID_color = $_POST['ID_color'];
    include_once 'config/config.php';
    
        // Insert new product
        $sql = "UPDATE product_detail SET Quantity = '$quantity', Description = '$des', ID_product = '$ID_product', ID_size = '$ID_size', ID_color = '$ID_color' WHERE ID_product_detail = '$id'";
        mysqli_query($conn, $sql);
        $message = "Sửa sản phẩm thành công!";
        echo "<script>alert('$message');</script>";
 

}
function destroyProduct()
{
    $id = $_GET['id'];
    include_once 'config/config.php';
        $sql = "DELETE FROM product_detail WHERE ID_product_detail = '$id'";
        mysqli_query($conn, $sql);
        include_once 'config/closeDB.php';
        $message = "Xóa sản phẩm thành công!";
        echo "<script>alert('$message');</script>";

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
       store();
        break;
    case 'edit':
        $array1 = editProduct();
        break;
    case 'update':
     updateProduct();
        break;
    case 'destroy':
        destroyProduct();
        break;
    // case 'detail':
    //     $product = detailProduct();
    //     break;
}