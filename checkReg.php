<?
session_start();

include 'connect_db.php';

$login=$_POST['regLogin'];
$password=$_POST['regPassword'];
$passwordConfirm=$_POST['regConfirmPassword'];
// $result3 = mysqli_query($mysql, 'SELECT login FROM `user` WHERE login!=$login');
if ($password==$passwordConfirm){
    $password = md5($password);
    mysqli_query($mysql, "INSERT INTO user (status, login, password) VALUES ('user', '$login', '$password')");
    include 'polygon.php';
} else {
    $_SESSION['message'] = 'Пароли не совпадают';
    header('Location: /polygon.php');
}
?>