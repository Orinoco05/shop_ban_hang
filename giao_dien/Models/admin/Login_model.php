<?php
function Login_admin() {
    $username = $_POST ['username'];
    $password = $_POST ['password'];
    include_once 'Connect/open_connect.php';
    $sql = "SELECT * FROM staff WHERE username = '$username' AND password = '$password'";
    $result = mysqli_query($connect, $sql);
    if (isset ($result)) {
        if ($_POST['username'] == $username && $_POST['password'] == $password) {
            $_SESSION['username'] = $username;
            $_SESSION['password'] = $password;
            return 1;
        } else {
            return 0;
        }
}
}
switch ($action) {
    case '':
        $test = Login_admin();
        break;
    }
?>