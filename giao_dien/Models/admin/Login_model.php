<?php
function Login_admin()
{
    $username = $_POST['username'];
    $password = $_POST['password'];
    include_once 'config/config.php';
    $sql = "SELECT * FROM staff WHERE User_name = '$username' OR Email = '$username' AND Password = '$password'";
    $result = mysqli_query($conn, $sql);
    include_once 'config/closeDB.php';
    
        foreach ($result as $re) {
            if ($re['User_name'] == $_POST['username'] && $re['Password'] == $_POST['password']) {
                $_SESSION['username'] = $username;
                $_SESSION['password'] = $password;
                $_SESSION['ID_staff'] = $re['ID_staff'];
                return 1;
            } else if ($re['Email'] == $_POST['username'] && $re['Password'] == $_POST['password']) {
                $_SESSION['username'] = $username;
                $_SESSION['password'] = $password;
                $_SESSION['ID_staff'] = $re['ID_staff'];
                return 1;
            } else {
                return 0;
            }

        }
    
}
switch ($action) {
    case 'login':
        $test = Login_admin();
        break;
}

?>