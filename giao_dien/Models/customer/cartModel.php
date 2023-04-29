<?php
//function lấy dữ liệu
function indexCart()
{
    include_once 'config/config.php';
    $cart = array();
    $infor = array();
    $totalPrice = 0;
    if (isset($_SESSION['cart'])) {
        foreach ($_SESSION['cart'] as $key => $value) {
            $product_id = (int) $value['product_id'];
            $id_size = (int) $value['size'];
            $id_color = (int) $value['color'];
            $amount = $value['amount'];
            $sql = "SELECT product_detail.img_2rd, product.Product_name, product.Price, size.Size_name, color.Color_name FROM (((product_detail JOIN product ON product.ID_product = product_detail.ID_product)
                 JOIN size ON size.ID_size = product_detail.ID_size)
                  JOIN color ON color.ID_color = product_detail.ID_color)
                   WHERE product_detail.ID_product = $product_id AND product_detail.ID_color = $id_color AND product_detail.ID_size = $id_size";
            $products = mysqli_query($conn, $sql);
            foreach ($products as $product) {
                $cart[$key]['img'] = $product['img_2rd'];
                $cart[$key]['product_name'] = $product['Product_name'];
                $cart[$key]['price'] = $product['Price'];
                $cart[$key]['amount'] = $amount;
                $cart[$key]['totalPrice'] = $product['Price'] * $amount;
                $cart[$key]['size'] = $product['Size_name'];
                $cart[$key]['color'] = $product['Color_name'];
            }
            $totalPrice += $cart[$key]['totalPrice'];
        }
    }
    include_once 'config/closeDB.php';
    $count = count($cart);
    $infor['cart'] = $cart;
    $infor['count'] = $count;
    $infor['totalPrice'] = $totalPrice;
    return $infor;
}
function add_to_cart()
{
    $product_id = $_POST['id'];
    if (isset($_POST['color'])) {
        $color = $_POST['color'];
    } else {
        echo '<script language="javascript">';
        echo 'alert("You not choose color");';
        echo 'window.location.href="?controller=shop&action=product_detail&id=' . $product_id . '"';
        echo '</script>';
    }
    if (isset($_POST['size'])) {
        $size = $_POST['size'];
    } else {
        echo '<script language="javascript">';
        echo 'alert("You not choose size");';
        echo 'window.location.href="?controller=shop&action=product_detail&id=' . $product_id . '"';
        echo '</script>';
    }
    if ($_POST['amount'] <= 0) {
        echo '<script language="javascript">';
        echo 'alert("Amount invalid");';
        echo 'window.location.href="?controller=shop&action=product_detail&id=' . $product_id . '"';
        echo '</script>';
    } else {
        $amount = $_POST['amount'];
    }
    if (! empty($amount) && ! empty($product_id) && ! empty($size) && ! empty($color)) {
        include_once 'config/config.php';
        $sql = "SELECT * FROM product_detail WHERE ID_product = $product_id AND ID_size = $size AND ID_color = $color";
        $data_check = mysqli_fetch_assoc(mysqli_query($conn, $sql));
        include_once 'config/closeDB.php';
        if ($data_check['Quantity'] > 0) {
            if (isset($_SESSION['cart'])) {
                if (isset($_SESSION['cart'][$product_id . '_' . $color . '_' . $size]) && $_SESSION['cart'][$product_id . '_' . $color . '_' . $size]['color'] == $color && $_SESSION['cart'][$product_id . '_' . $color . '_' . $size]['size'] == $size) {
                    if ($_SESSION['cart'][$product_id . '_' . $color . '_' . $size]['amount'] < $data_check['Quantity']) {
                        $_SESSION['cart'][$product_id . '_' . $color . '_' . $size]['amount'] += $amount;
                        echo '<script language="javascript">';
                        echo 'alert("Add to cart successfully");';
                        echo 'window.location.href="?controller=shop&action=product_detail&id=' . $product_id . '"';
                        echo '</script>';
                    } else {
                        echo '<script language="javascript">';
                        echo 'alert("out of stock");';
                        echo 'window.location.href="?controller=shop&action=product_detail&id=' . $product_id . '"';
                        echo '</script>';
                    }
                } else {

                    $_SESSION['cart'][$product_id . '_' . $color . '_' . $size] = array(
                        'product_id' => $product_id,
                        'amount' => $amount,
                        'color' => $color,
                        'size' => $size
                    );
                    echo '<script language="javascript">';
                    echo 'alert("Add to cart successfully");';
                    echo 'window.location.href="?controller=shop&action=product_detail&id=' . $product_id . '"';
                    echo '</script>';
                }
            } else {
                $_SESSION['cart'][$product_id . '_' . $color . '_' . $size] = array(
                    'product_id' => $product_id,
                    'amount' => $amount,
                    'color' => $color,
                    'size' => $size
                );
                echo '<script language="javascript">';
                echo 'alert("Add to cart successfully");';
                echo 'window.location.href="?controller=shop&action=product_detail&id=' . $product_id . '"';
                echo '</script>';
            }
        }
    } else {
        echo '<script language="javascript">';
        echo 'alert("Out of stock");';
        echo 'window.location.href="?controller=shop&action=product_detail&id=' . $product_id . '"';
        echo '</script>';
    }
}
function signout()
{
    session_unset();
    session_destroy();
    header('Location: ?controller=cartCustomer');
}
//    Kiểm tra hành động hiện tại
switch ($action) {
    case '':
        //        Lấy dữ liệu từ DB về
        $infor = indexCart();
        break;
    case 'add_to_cart':
        add_to_cart();
        break;
    case 'trashPr':
        indexCart();
        break;
    case 'signout':
        signout();
        break;
}
?>