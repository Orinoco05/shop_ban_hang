<?php
//fix
$action = '';
if (isset($_GET['action'])) {
    $action = $_GET['action'];
}
switch ($action) {
    case '':
        include_once 'View/customer/signin.php';
        break;
    case 'access_login':
        include_once 'Models/customer/userModel.php';
        if ($test == 0) {
            echo '<script language="javascript">';
            echo 'alert("Email or password wrong");';
            echo 'window.location.href="?controller=userCustomer";';
            echo '</script>';
        } elseif ($test == 1) {
            header('Location:index.php?controller=shop');
        }
        break;
    case 'signOut':
        if (isset($_SESSION['email']) && isset($_SESSION['password']) && $_SESSION['role'] == 2) {
            include_once 'Models/customer/userModel.php';
            header('Location:index.php?controller=userCustomer');
        } else {
            echo '<script>
            alert("ERROR");
            location.href = "index.php?controller=userCustomer";</script>';
        }
        break;
    case 'signUp':
        include_once 'View/customer/signin.php';
        break;
}
?>