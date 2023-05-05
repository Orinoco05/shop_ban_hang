<?php
// fix 1 phần
function login_customer()
{
    $email = trim($_POST['username']);
    include_once 'config/config.php';
    $password = $_POST['password'];
    $sql = "SELECT * FROM customer WHERE Email = '$email' OR User_name = '$email' AND Password = '$password'";
    $result = mysqli_fetch_assoc(mysqli_query($conn, $sql));
    if (isset($result)) {
        if ($result['Email'] == $email && $result['Password'] == $_POST['password']) {
            $_SESSION['email'] = $result['Email'];
            $_SESSION['usernmae'] = $result['User_name'];
            $_SESSION['fullName'] = $result['Full_name'];
            $_SESSION['phone'] = $result['Phone_number'];
            $_SESSION['idCustomer'] = $result['ID_custumer'];
            $_SESSION['role'] = 2;
            $_SESSION['password'] = $_POST['password'];
            include_once 'config/closeDB.php';
            return 1;
        } else if ($result['User_name'] == $email && $result['Password'] == $_POST['password']) {
            $_SESSION['email'] = $result['Email'];
            $_SESSION['usernmae'] = $result['User_name'];
            $_SESSION['phone'] = $result['Phone_number'];
            $_SESSION['fullName'] = $result['Full_name'];
            $_SESSION['idCustomer'] = $result['ID_custumer'];
            $_SESSION['role'] = 2;
            $_SESSION['password'] = $_POST['password'];
            include_once 'config/closeDB.php';
            return 1;
        } else {
            include_once 'config/closeDB.php';
            return 0;
        }
    }
}
function signOut()
{
    session_unset();
    session_destroy();
}
switch ($action) {
    case 'access_login':
        $test = login_customer();
        break;
    case 'signOut':
        signOut();
        break;
}
?>