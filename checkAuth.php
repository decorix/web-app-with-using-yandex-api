<?
session_start();
require_once('connect_db.php');

// include 'connect_db.php';

// echo '<p>' .$_POST['titleOrg']. '</p>';
$login=$_POST['authLogin'];
$password=md5($_POST['authPassword']);
$statusAdmin = 'admin';
$statusUser = 'user';
$sql = mysqli_query($mysql, "SELECT * FROM user WHERE login='$login' AND password='$password'");
    if ($login!='' && $password!=''){
        if (mysqli_num_rows($sql) == 0) {
        header('Location: /polygon.php');
    }
    while ($result3 = mysqli_fetch_assoc($sql)){
        if ($result3['status'] == $statusAdmin){
            $_SESSION['user'] = [
                'login' => $result3['login'],
                'status' => $result3['status']
            ];
            header('Location: /admin.php');
        } else if ($result3['status'] == $statusUser){
            $_SESSION['user'] = [
                'login' => $result3['login'],
                'status' => $result3['status']
            ];
            header('Location: /user.php');
        };
    }
} else if (mysqli_num_rows($sql) == 0){
    header('Location: /polygon.php'); 
} else {
    header('Location: /polygon.php'); 
}


// } else if (mysqli_query($mysql, "SELECT * FROM user WHERE login='$login' AND password='$password' AND status='$statusUser'")){
//     include 'polygon.php';
// } else
?>
