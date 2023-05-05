<?php
function cloneData()
{
    if (isset($_SESSION['cart']) && ! empty($_SESSION['cart'])) {
        if (isset($_SESSION['email']) && isset($_SESSION['password'])) {
            if ($_SESSION['role'] == 2) {
                $data = array();
                $nameCustomer = $_SESSION['fullName'];
                $email = $_SESSION['email'];
                $phone = $_SESSION['phone'];
                include_once 'config/config.php';
                $delivery = mysqli_query($conn, "SELECT * FROM delivery_methods");
                $payment = mysqli_query($conn, "SELECT * FROM payment_methods");
                $data = array();
                // cart
                $cart = array();
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
                $data['cart'] = $cart;
                $data['totalPrice'] = $totalPrice;

                $data['nameCustomer'] = $nameCustomer;
                $data['email'] = $email;
                $data['phone'] = $phone;
                $data['payment'] = $payment;
                $data['delivery'] = $delivery;
                include_once 'config/closeDB.php';
                return $data;
            } else {
                echo '<script language="javascript">';
                echo 'alert("Sign up customer account to cart");';
                echo 'window.location.href="?controller=cartCustomer"';
                echo '</script>';
            }

        } else {
            echo '<script language="javascript">';
            echo 'alert("Sign up to cart");';
            echo 'window.location.href="?controller=cartCustomer"';
            echo '</script>';
        }

    } else {
        echo '<script language="javascript">';
        echo 'alert("Cart empty");';
        echo 'window.location.href="?controller=cartCustomer"';
        echo '</script>';
    }

}
function checkout()
{
    $name = $_POST['nameCustomer'];
    $email = $_POST['emailCustomer'];
    $phone = $_POST['phoneCustomer'];
    $address = $_POST['address'];
    $idCustomer = $_SESSION['idCustomer'];
    $deliveryID = $_POST['deliveryID'];
    $paymentID = $_POST['paymentID'];
    if (empty($name) || empty($email) || empty($phone) || empty($address) || empty($deliveryID) || empty($paymentID)) {
        echo '<script language="javascript">';
        echo 'alert("Fill out all information before confirming the order");';
        echo 'window.location.href="?controller=checkout"';
        echo '</script>';
    } else {
        include_once 'config/config.php';

        $create_order = "INSERT INTO `orders`( `Purchase_date`, `Status`, `ID_custumer`, `ID_delivery`, `ID_payment`, 
        `nameCustomer`, `phoneCustomer`, `addressCustomer`) VALUES 
        (NOW(),'1','$idCustomer','$deliveryID',
        '$paymentID','$name','$phone','$address')";
        $result = mysqli_query($conn, $create_order);
        if ($result) {
            $id_order = mysqli_fetch_assoc(mysqli_query($conn, "SELECT ID_order FROM orders ORDER BY ID_order DESC LIMIT 1"));
            $id_order = intval($id_order['ID_order']);
            foreach ($_SESSION['cart'] as $key => $value) {
                $product_id = (int) $value['product_id'];
                $id_size = (int) $value['size'];
                $id_color = (int) $value['color'];
                $amount = $value['amount'];
                $id_product_detail = mysqli_fetch_assoc(mysqli_query($conn, "SELECT ID_product_detail  FROM `product_detail` WHERE ID_size = $id_size AND ID_color = $id_color AND ID_product = $product_id"));
                $id_product_detail = intval($id_product_detail['ID_product_detail']);
                $price = mysqli_fetch_assoc(mysqli_query($conn, "SELECT Price  FROM `product` WHERE  ID_product = $product_id"));
                $price = intval($price['Price']);
                $sql = "INSERT INTO `order_detail`(`Quantity`, `Save_price_order`, 
                 `ID_order`, `ID_product_detail`) VALUES ('$amount','$price','$id_order','$id_product_detail')";
                $result = mysqli_query($conn, $sql);
                $old_amount = "SELECT Quantity FROM product_detail WHERE ID_product_detail  = '$id_product_detail'";
                $amount_db = mysqli_fetch_assoc(mysqli_query($conn, $old_amount));
                $amount_new = $amount_db['Quantity'] - $amount;
                $sql_set_new = "UPDATE `product_detail` SET Quantity = '$amount_new' WHERE ID_product_detail  = '$id_product_detail'";
                $result_amount = mysqli_query($conn, $sql_set_new);
                unset($_SESSION['cart'][$key]);
            }
            include_once 'config/closeDB.php';
            echo '<script language="javascript">';
            echo 'alert("Order successfully");';
            echo 'window.location.href="?controller=cartCustomer"';
            echo '</script>';
        } else {
            include_once 'config/closeDB.php';
            echo '<script language="javascript">';
            echo 'alert("ERROR");';
            echo 'window.location.href="?controller=cartCustomer"';
            echo '</script>';
        }
    }

}
switch ($action) {
    case '':
        $data = cloneData();
        break;
    case 'checkout':
        checkout();
}
?>