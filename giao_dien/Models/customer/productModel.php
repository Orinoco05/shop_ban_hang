<?php
//function lấy dữ liệu
function indexProduct()
{
    $search = '';
    if (isset($_POST['search'])) {
        $search = $_POST['search'];
    }
    include_once 'config/config.php';
    $sql = "SELECT * FROM product WHERE Product_name LIKE '%$search%'";
    $products = mysqli_query($conn, $sql);
    include_once 'config/closeDB.php';
    return $products;
}

// fix 1 phần
function product_detail()
{
    $id = $_GET['id'];

    include_once 'config/config.php';
    $sql = "SELECT product_detail.*,product.*, category.Category_name FROM ((product_detail JOIN product ON product_detail.ID_product = product.ID_product) JOIN category ON product.id_category = category.id_category)  WHERE product_detail.ID_product = $id";
    $result = mysqli_query($conn, $sql);
    $sql_size = "SELECT size.*, product_detail.ID_size FROM product_detail JOIN size ON product_detail.ID_size = size.ID_size WHERE ID_product = $id GROUP BY size.Size_name, product_detail.ID_size";
    $size = mysqli_query($conn, $sql_size);
    $sql_color = "SELECT color.*, product_detail.ID_color FROM product_detail JOIN color ON product_detail.ID_color = color.ID_color WHERE ID_product = $id GROUP BY color.Color_name, product_detail.ID_color";
    $color = mysqli_query($conn, $sql_color);
    $sql_total = "SELECT SUM(quantity) as total, ID_product FROM product_detail WHERE ID_product = $id GROUP BY ID_product";
    $total = mysqli_fetch_assoc(mysqli_query($conn, $sql_total));
    if ($result) {
        $product = mysqli_fetch_assoc($result);
        include_once 'config/closeDB.php';
        $data = array();
        $data['product'] = $product;
        $data['data'] = $result;
        $data['color'] = $color;
        $data['size'] = $size;
        $data['total'] = $total;

        return $data;
    } else {
        include_once 'config/closeDB.php';
        echo '<script language="javascript">';
        echo 'alert("Get product error");';
        echo 'window.location.href="?controller=shop"';
        echo '</script>';
    }
}

//    Kiểm tra hành động hiện tại
switch ($action) {
    case '':
        //        Lấy dữ liệu từ DB về
        $products = indexProduct();
        break;
    case 'product_detail':
        $data = product_detail();
        break;
}
?>