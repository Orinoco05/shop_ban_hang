<?php
$action = '';
if (isset($_GET['action'])){
    $action = $_GET['action'];
}
switch ($action) {
    case '':
        if (isset ($_SESSION['username']) && $_SESSION['password'])
        {
            echo '<script>
            location.href = "index.php?controller=";
        </script>';
        } else{
            include_once 'View/admin/Layout/Login.php';
        } 
        break;
    case 'login':
        include_once 'Models/Login_model.php';
        if ($test == 0){
            echo '<script>
                    location.href = "index.php?controller=Login";
                </script>';
        } elseif($test == 1){
            echo '<script>
                    location.href = "index.php?controller=";
                </script>';
        }
    }
?>