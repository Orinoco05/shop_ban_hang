<?php
//function lấy dữ liệu
    function indexCart(){
        var_dump($_SESSION['cart']);
        die;
        
    }
    function add_to_cart(){
        function header_cart($product_id,$mode){
            if ($mode == 1){
                echo '<script language="javascript">';
                echo 'alert("Add successfull");';
                echo 'window.location.href="?controller=cartCustomer"';
                echo '</script>';
            } elseif ($mode == 2){
                echo '<script language="javascript">';
                echo 'alert("Add successfull");';
                echo 'window.location.href="?controller=productCustomer#' . $product_id . '"';
                echo '</script>';
            }                   
        }
        isset($_GET['mode'])? $mode = $_GET['mode'] :  $mode = 1 ;
        isset($_GET['color'])? $color = $_GET['color'] :  $color = 1 ;
        isset($_GET['size'])? $size = $_GET['size'] :  $size = 1 ;

        isset($_GET['amount'])? $amount = $_GET['amount'] :  $amount = 1 ;
                $product_id = $_GET['id'];
                // $sql = " "
                if(isset($_SESSION['cart'])){
                    if(isset($_SESSION['cart'][$product_id])){
                        $_SESSION['cart'][$product_id] = $_SESSION['cart'][$product_id] + $amount;
                        $_SESSION['cart'][$product_id]['color'] = $color; 
                        $_SESSION['cart'][$product_id]['size'] = $size; 
                        header_cart($product_id,$mode);
                    } else {
                        $_SESSION['cart'][$product_id] = $amount;
                        $_SESSION['cart'][$product_id]['color'] = $color; 
                        $_SESSION['cart'][$product_id]['size'] = $size; 
                        header_cart($product_id,$mode);
                    }
                } else {
                    $_SESSION['cart'] = array();
                    $_SESSION['cart'][$product_id] = $amount; 
                    header_cart($product_id,$mode);
                    
                
            }
    }

//    Kiểm tra hành động hiện tại
    switch ($action){
        case '':
    //        Lấy dữ liệu từ DB về
            indexCart();
            break;
        case 'add_to_cart':
            add_to_cart();
            break;
    
    }
?>